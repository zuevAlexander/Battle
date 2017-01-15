<?php

namespace CoreBundle\Service\BattleFieldStatus;

use CoreBundle\Entity\BattleFieldStatus;
use NorseDigital\Symfony\RestBundle\Service\AbstractService;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use NorseDigital\Symfony\RestBundle\Entity\EntityInterface;

/** @noinspection PhpHierarchyChecksInspection */

/**
 * Class BattleFieldStatusService
 *
 * @method BattleFieldStatus createEntity()
 * @method BattleFieldStatus getEntity(int $id)
 * @method BattleFieldStatus getEntityBy(array $criteria)
 * @method BattleFieldStatus deleteEntity(EntityInterface $entity, bool $flush = true)
 */
class BattleFieldStatusService extends AbstractService implements EventSubscriberInterface
{
    const BATTLE_FIELD_ACCESSIBLE = 'Accessible';
    const BATTLE_FIELD_BLOCKED = 'Blocked';

    /**
     * @var EventDispatcherInterface
     */
    private $eventDispatcher;

    /**
     * BattleStatusHandler constructor.
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

}
