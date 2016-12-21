<?php

namespace CoreBundle\Service\MapType;

use CoreBundle\Entity\MapType;
use CoreBundle\Model\Request\MapType\MapTypeAllRequestInterface;
use CoreBundle\Model\Request\MapType\MapTypeCreateRequest;
use CoreBundle\Model\Request\MapType\MapTypeUpdateRequest;
use NorseDigital\Symfony\RestBundle\Service\AbstractService;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use NorseDigital\Symfony\RestBundle\Entity\EntityInterface;

/** @noinspection PhpHierarchyChecksInspection */

/**
 * Class MapTypeService
 *
 * @method MapType createEntity()
 * @method MapType getEntity(int $id)
 * @method MapType getEntityBy(array $criteria)
 * @method MapType deleteEntity(EntityInterface $entity, bool $flush = true)
 */
class MapTypeService extends AbstractService implements EventSubscriberInterface, MapTypeDefaultValuesInterface
{
    use MapTypeDefaultValuesTrait;

    /**
     * @var EventDispatcherInterface
     */
    private $eventDispatcher;

    /**
     * MapTypeHandler constructor.
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
     * @param MapTypeCreateRequest $request
     * @return MapType
     */
    public function updatePost(MapTypeCreateRequest $request): MapType
    {
        $mapType = $this->createEntity();
        $this->setGeneralFields($request, $mapType, true);
        $this->saveEntity($mapType);
        return $mapType;
    }

    /**
     * @param MapTypeUpdateRequest $request
     * @return MapType
     */
    public function updatePut(MapTypeUpdateRequest $request): MapType
    {
        $mapType = $request->getMapType();
        $this->setGeneralFields($request, $mapType, true);
        $this->saveEntity($mapType);
        return $mapType;
    }

    /**
     * @param MapTypeUpdateRequest $request
     * @return MapType
     */
    public function updatePatch(MapTypeUpdateRequest $request): MapType
    {
        $mapType = $request->getMapType();
        $this->setGeneralFields($request, $mapType);
        $this->saveEntity($mapType);
        return $mapType;
    }

    /**
     * @param MapTypeAllRequestInterface $request
     * @param MapType $mapType
     * @param bool $fullUpdate
     * @return MapType
     */
    public function setGeneralFields(MapTypeAllRequestInterface $request, MapType $mapType, $fullUpdate = false)
    {
        if ($request->hasTypeName()) {
            $mapType->setTypeName($request->getTypeName());
        } elseif ($fullUpdate) {
            $mapType->setTypeName($this->getDefaultTypeName());
        }

        if ($request->hasSize()) {
            $mapType->setSize($request->getSize());
        } elseif ($fullUpdate) {
            $mapType->setSize($this->getDefaultSize());
        }
        return $mapType;
    }
}
