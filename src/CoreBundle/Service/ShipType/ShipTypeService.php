<?php

namespace CoreBundle\Service\ShipType;

use CoreBundle\Entity\ShipType;
use NorseDigital\Symfony\RestBundle\Service\AbstractService;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use NorseDigital\Symfony\RestBundle\Entity\EntityInterface;

/** @noinspection PhpHierarchyChecksInspection */

/**
 * Class ShipTypeService
 *
 * @method ShipType createEntity()
 * @method ShipType getEntity(int $id)
 * @method ShipType getEntityBy(array $criteria)
 * @method ShipType deleteEntity(EntityInterface $entity, bool $flush = true)
 */
class ShipTypeService extends AbstractService implements EventSubscriberInterface
{
    const SINGLE_TIER = 1;
    const TWO_TIER = 2;
    const THREE_TIER = 3;
    const FOUR_TIER = 4;

    /**
     * @var EventDispatcherInterface
     */
    private $eventDispatcher;

    /**
     * ShipTypeHandler constructor.
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
