<?php

namespace CoreBundle\Service\Map;

use CoreBundle\Entity\Map;
use NorseDigital\Symfony\RestBundle\Service\AbstractService;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use NorseDigital\Symfony\RestBundle\Entity\EntityInterface;

/** @noinspection PhpHierarchyChecksInspection */

/**
 * Class MapService
 *
 * @method Map createEntity()
 * @method Map getEntity(int $id)
 * @method Map getEntityBy(array $criteria)
 * @method Map deleteEntity(EntityInterface $entity, bool $flush = true)
 */
class MapService extends AbstractService implements EventSubscriberInterface
{
    /**
     * @var EventDispatcherInterface
     */
    private $eventDispatcher;

    /**
     * MapHandler constructor.
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
