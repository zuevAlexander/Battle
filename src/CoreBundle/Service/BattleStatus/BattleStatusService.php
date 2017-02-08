<?php

namespace CoreBundle\Service\BattleStatus;

use CoreBundle\Entity\BattleStatus;
use NorseDigital\Symfony\RestBundle\Service\AbstractService;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use NorseDigital\Symfony\RestBundle\Entity\EntityInterface;

/** @noinspection PhpHierarchyChecksInspection */

/**
 * Class BattleStatusService
 *
 * @method BattleStatus createEntity()
 * @method BattleStatus getEntity(int $id)
 * @method BattleStatus getEntityBy(array $criteria)
 * @method BattleStatus deleteEntity(EntityInterface $entity, bool $flush = true)
 */
class BattleStatusService extends AbstractService implements EventSubscriberInterface
{

    const OPEN_BATTLE = 'Open';
    const PREPARATION_BATTLE = 'Preparation';
    const ACTIVE_BATTLE = 'Active';
    const FINISHED_BATTLE = 'Finished';
    const CLOSED_BATTLE = 'Closed';

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
