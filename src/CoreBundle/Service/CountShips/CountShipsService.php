<?php

namespace CoreBundle\Service\CountShips;

use CoreBundle\Entity\CountShips;
use NorseDigital\Symfony\RestBundle\Service\AbstractService;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use NorseDigital\Symfony\RestBundle\Entity\EntityInterface;

/** @noinspection PhpHierarchyChecksInspection */

/**
 * Class CountShipsService
 *
 * @method CountShips createEntity()
 * @method CountShips getEntity(int $id)
 * @method CountShips getEntityBy(array $criteria)
 * @method CountShips deleteEntity(EntityInterface $entity, bool $flush = true)
 */
class CountShipsService extends AbstractService implements EventSubscriberInterface
{
    /**
     * @var EventDispatcherInterface
     */
    private $eventDispatcher;

    /**
     * CountShipsHandler constructor.
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
