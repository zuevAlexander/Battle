<?php

namespace CoreBundle\Service\User;

use CoreBundle\Entity\User;
use CoreBundle\Model\Request\User\UserAllRequestInterface;
use CoreBundle\Model\Request\User\UserCreateRequest;
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
     * @var EventDispatcherInterface
     */
    private $eventDispatcher;

    /**
     * UserHandler constructor.
     * @param ContainerInterface $container
     * @param string $entityClass
     * @param EventDispatcherInterface $eventDispatcher
     */
    public function __construct(
        ContainerInterface $container,
        string $entityClass,
        EventDispatcherInterface $eventDispatcher
    ) {
        parent::__construct($container, $entityClass);
        $this->setContainer($container);
        $this->eventDispatcher = $eventDispatcher;
    }

    /**
     * @return array
     */
    public static function getSubscribedEvents()
    {
        return [];
    }

    /**
     * @param UserCreateRequest $request
     * @return User
     */
    public function updatePost(UserCreateRequest $request): User
    {
        $user = $this->createEntity();
        $this->setGeneralFields($request, $user, true);
        $this->saveEntity($user);
        return $user;
    }

    /**
     * @param UserUpdateRequest $request
     * @return User
     */
    public function updatePut(UserUpdateRequest $request): User
    {
        $user = $request->getUser();
        $this->setGeneralFields($request, $user, true);
        $this->saveEntity($user);
        return $user;
    }

    /**
     * @param UserUpdateRequest $request
     * @return User
     */
    public function updatePatch(UserUpdateRequest $request): User
    {
        $user = $request->getUser();
        $this->setGeneralFields($request, $user);
        $this->saveEntity($user);
        return $user;
    }

    /**
     * @param UserAllRequestInterface $request
     * @param User $user
     * @param bool $fullUpdate
     * @return User
     */
    public function setGeneralFields(UserAllRequestInterface $request, User $user, $fullUpdate = false)
    {
        if ($request->hasUsername()) {
            $user->setUsername($request->getUsername());
        } elseif ($fullUpdate) {
            $user->setUsername($this->getDefaultUsername());
        }

        if ($request->hasPassword()) {
            $user->setPassword($request->getPassword());
        } elseif ($fullUpdate) {
            $user->setPassword($this->getDefaultPassword());
        }

        if ($request->hasApiKey()) {
            $user->setApiKey($request->getApiKey());
        } elseif ($fullUpdate) {
            $user->setApiKey($this->getDefaultApiKey());
        }
        return $user;
    }

    /**
     * @param User $user
     * @return User
     */
    public function saveUser(User $user): User
    {
        try {
            $this->getEntityBy(['username' => $user->getUsername()]);
            throw new UserAlreadyExistsException();
        } catch (EntityNotFoundException $e) {
            // we haven't found user - that's ok
        }

        // TODO: make this validation in entity
        if (!$user->getUsername()) {
            throw new EmptyUsernameException();
        }
        
        $password = $this->container->get('security.password_encoder')
            ->encodePassword($user, $user->getPassword());
        $user->setPassword($password);
        
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
        $user->setApiKey(sha1(
            md5(
                microtime().mt_rand(0, 9999999)
            )
        ));

        $this->saveEntity($user);

        return $user;
    }
}
