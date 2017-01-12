<?php
namespace CoreBundle\Service\User;
use CoreBundle\Entity\User;
use CoreBundle\Model\Request\User\UserAllRequestInterface;
use CoreBundle\Model\Request\User\UserRegisterRequest;
use CoreBundle\Model\Request\User\UserUpdateRequest;
use NorseDigital\Symfony\RestBundle\Service\AbstractService;
use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use NorseDigital\Symfony\RestBundle\Entity\EntityInterface;
use CoreBundle\Exception\User\UserAlreadyExistsException;
use Doctrine\ORM\EntityNotFoundException;
use CoreBundle\Exception\User\EmptyUsernameException;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

/** @noinspection PhpHierarchyChecksInspection */
/**
 * Class UserService
 *
 * @method User createEntity()
 * @method User getEntity(int $id)
 * @method User getEntityBy(array $criteria)
 * @method User deleteEntity(EntityInterface $entity, bool $flush = true)
 */
class UserService extends AbstractService implements EventSubscriberInterface, UserDefaultValuesInterface
{
    use UserDefaultValuesTrait;

    /**
     * @var UserPasswordEncoderInterface
     */
    private $encoder;

    /**
     * @var EventDispatcherInterface
     */
    private $eventDispatcher;

    /**
     * UserHandler constructor.
     * @param ContainerInterface $container
     * @param string $entityClass
     * @param EventDispatcherInterface $eventDispatcher
     * @param UserPasswordEncoderInterface $encoder
     */
    public function __construct(
        ContainerInterface $container,
        string $entityClass,
        EventDispatcherInterface $eventDispatcher,
        UserPasswordEncoderInterface $encoder
    ) {
        parent::__construct($container, $entityClass);
        $this->setContainer($container);
        $this->eventDispatcher = $eventDispatcher;
        $this->encoder = $encoder;
    }

    /**
     * @return array
     */
    public static function getSubscribedEvents()
    {
        return [];
    }

    /**
     * @param UserRegisterRequest $request
     * @return User
     */
    public function createUser(UserRegisterRequest $request): User
    {
        try {
            $this->getEntityBy(['username' => $request->getUsername()]);
            throw new UserAlreadyExistsException();
        } catch (EntityNotFoundException $e) {
            // we haven't found user - that's ok
        }

        $user = $this->createEntity();
        $user->setUsername($request->getUsername());
        $user->setPassword($this->encoder->encodePassword($user, $request->getPassword()));
        $user->setRoles(array('ROLE_USER'));
        $this->generateApiKey($user);

        return $user;
    }

    /**
     * @param User $user
     *
     * @return User
     */
    public function generateApiKey(User $user) : User
    {
        $user->setApiKey(bin2hex(random_bytes(20)));
        $this->saveEntity($user);
        return $user;
    }
}