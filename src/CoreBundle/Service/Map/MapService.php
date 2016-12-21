<?php

namespace CoreBundle\Service\Map;

use CoreBundle\Entity\Map;
use CoreBundle\Model\Request\Map\MapAllRequestInterface;
use CoreBundle\Model\Request\Map\MapCreateRequest;
use CoreBundle\Model\Request\Map\MapUpdateRequest;
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
class MapService extends AbstractService implements EventSubscriberInterface, MapDefaultValuesInterface
{
    use MapDefaultValuesTrait;

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

    /**
     * @param MapCreateRequest $request
     * @return Map
     */
    public function updatePost(MapCreateRequest $request): Map
    {
        $map = $this->createEntity();
        $this->setGeneralFields($request, $map, true);
        $this->saveEntity($map);
        return $map;
    }

    /**
     * @param MapUpdateRequest $request
     * @return Map
     */
    public function updatePut(MapUpdateRequest $request): Map
    {
        $map = $request->getMap();
        $this->setGeneralFields($request, $map, true);
        $this->saveEntity($map);
        return $map;
    }

    /**
     * @param MapUpdateRequest $request
     * @return Map
     */
    public function updatePatch(MapUpdateRequest $request): Map
    {
        $map = $request->getMap();
        $this->setGeneralFields($request, $map);
        $this->saveEntity($map);
        return $map;
    }

    /**
     * @param MapAllRequestInterface $request
     * @param Map $map
     * @param bool $fullUpdate
     * @return Map
     */
    public function setGeneralFields(MapAllRequestInterface $request, Map $map, $fullUpdate = false)
    {
        if ($request->hasLatitude()) {
            $map->setLatitude($request->getLatitude());
        } elseif ($fullUpdate) {
            $map->setLatitude($this->getDefaultLatitude());
        }

        if ($request->hasLongitude()) {
            $map->setLongitude($request->getLongitude());
        } elseif ($fullUpdate) {
            $map->setLongitude($this->getDefaultLongitude());
        }
        return $map;
    }
}
