<?php

namespace CoreBundle\Service\ShipLocation;

use CoreBundle\Entity\ShipLocation;
use NorseDigital\Symfony\RestBundle\Service\AbstractService;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use NorseDigital\Symfony\RestBundle\Entity\EntityInterface;

/** @noinspection PhpHierarchyChecksInspection */

/**
 * Class ShipLocationService
 *
 * @method ShipLocation createEntity()
 * @method ShipLocation getEntity(int $id)
 * @method ShipLocation getEntityBy(array $criteria)
 * @method ShipLocation deleteEntity(EntityInterface $entity, bool $flush = true)
 */
class ShipLocationService extends AbstractService implements EventSubscriberInterface
{
    /**
     * @var EventDispatcherInterface
     */
    private $eventDispatcher;

    /**
     * ShipLocationHandler constructor.
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
