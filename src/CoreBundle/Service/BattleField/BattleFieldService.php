<?php

namespace CoreBundle\Service\BattleField;

use CoreBundle\Entity\BattleField;
use CoreBundle\Model\Request\BattleField\BattleFieldReadRequest;
use CoreBundle\Exception\BattleField\YouAreNotOwnerOfThisBattleFieldException;
use NorseDigital\Symfony\RestBundle\Service\AbstractService;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use NorseDigital\Symfony\RestBundle\Entity\EntityInterface;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorage;

/** @noinspection PhpHierarchyChecksInspection */

/**
 * Class BattleFieldService
 *
 * @method BattleField createEntity()
 * @method BattleField getEntity(int $id)
 * @method BattleField getEntityBy(array $criteria)
 * @method BattleField deleteEntity(EntityInterface $entity, bool $flush = true)
 */
class BattleFieldService extends AbstractService implements EventSubscriberInterface
{
    /**
     * @var EventDispatcherInterface
     */
    private $eventDispatcher;

    /**
     * @var TokenStorage
     */
    private $tokenStorage;

    /**
     * BattleFieldHandler constructor.
     * @param ContainerInterface $container
     * @param string $entityClass
     * @param EventDispatcherInterface $eventDispatcher
     * @param TokenStorage $tokenStorage
     */
    public function __construct(
        ContainerInterface $container,
        string $entityClass,
        EventDispatcherInterface $eventDispatcher,
        TokenStorage $tokenStorage
    ) {
        parent::__construct($container, $entityClass);
        $this->setContainer($container);
        $this->eventDispatcher = $eventDispatcher;
        $this->tokenStorage = $tokenStorage;
    }

    /**
     * @return array
     */
    public static function getSubscribedEvents()
    {
        return [];
    }

    /**
     * @param BattleFieldReadRequest $request
     * @return BattleField
     */
    public function getBattleField(BattleFieldReadRequest $request): BattleField
    {
        $this->isUserOwnerOfBattleField($request->getBattleField());
        $battleField = $request->getBattleField();
//        $battleField->setShips([]);
        return $battleField;
    }

    /**
     * @param BattleField $battleField
     *
     * @throws YouAreNotOwnerOfThisBattleFieldException
     */
    public function isUserOwnerOfBattleField(BattleField $battleField)
    {
        if ($battleField->getUser() != $this->tokenStorage->getToken()->getUser()) {
            throw new YouAreNotOwnerOfThisBattleFieldException();
        }
    }
}
