<?php

namespace CoreBundle\Service\ShotStatus;

use CoreBundle\Entity\BattleField;
use CoreBundle\Entity\Map;
use CoreBundle\Entity\ShotStatus;
use CoreBundle\Service\ShipType\ShipTypeService;
use NorseDigital\Symfony\RestBundle\Service\AbstractService;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use NorseDigital\Symfony\RestBundle\Entity\EntityInterface;

/** @noinspection PhpHierarchyChecksInspection */

/**
 * Class ShotStatusService
 *
 * @method ShotStatus createEntity()
 * @method ShotStatus getEntity(int $id)
 * @method ShotStatus getEntityBy(array $criteria)
 * @method ShotStatus deleteEntity(EntityInterface $entity, bool $flush = true)
 */
class ShotStatusService extends AbstractService implements EventSubscriberInterface
{
    const SHOT_PASS = 'Pass';
    const SHOT_HIT = 'Hit';
    const SHOT_DESTROY = 'Destroy';

    /**
     * @var EventDispatcherInterface
     */
    private $eventDispatcher;

    /**
     * ShotStatusHandler constructor.
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
     * @param BattleField $battleField
     * @param Map $shotMap
     * @param array $shotsMap
     * @return ShotStatus
     */
    public function checkShotStatus(BattleField $battleField, Map $shotMap, array $shotsMap)
    {
        $shotStatusName =  self::SHOT_PASS;

        $rivalShips = $battleField->getShips();

        foreach ($rivalShips as $rivalShip) {
            foreach ($rivalShip->getLocation() as $location) {
                if ($shotMap == $location->getMap()) {
                    $shotStatusName = ShotStatusService::SHOT_DESTROY;
                    if ($rivalShip->getShipType()->getTypeName() != ShipTypeService::SINGLE_TIER) {
                        foreach ($rivalShip->getLocation() as $shipLocation) {
                            if (!in_array($shipLocation->getMap(), $shotsMap) && $shipLocation->getMap() != $shotMap) {
                                $shotStatusName = ShotStatusService::SHOT_HIT;
                            }
                        }
                    }
                    break 2;
                }
            }
        }

        $shotStatus = $this->getEntityBy(['statusName' => $shotStatusName]);

        return $shotStatus;
    }
}
