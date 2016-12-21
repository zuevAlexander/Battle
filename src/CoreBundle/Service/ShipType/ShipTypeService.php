<?php

namespace CoreBundle\Service\ShipType;

use CoreBundle\Entity\ShipType;
use CoreBundle\Model\Request\ShipType\ShipTypeAllRequestInterface;
use CoreBundle\Model\Request\ShipType\ShipTypeCreateRequest;
use CoreBundle\Model\Request\ShipType\ShipTypeUpdateRequest;
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
class ShipTypeService extends AbstractService implements EventSubscriberInterface, ShipTypeDefaultValuesInterface
{
    use ShipTypeDefaultValuesTrait;

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

    /**
     * @param ShipTypeCreateRequest $request
     * @return ShipType
     */
    public function updatePost(ShipTypeCreateRequest $request): ShipType
    {
        $shipType = $this->createEntity();
        $this->setGeneralFields($request, $shipType, true);
        $this->saveEntity($shipType);
        return $shipType;
    }

    /**
     * @param ShipTypeUpdateRequest $request
     * @return ShipType
     */
    public function updatePut(ShipTypeUpdateRequest $request): ShipType
    {
        $shipType = $request->getShipType();
        $this->setGeneralFields($request, $shipType, true);
        $this->saveEntity($shipType);
        return $shipType;
    }

    /**
     * @param ShipTypeUpdateRequest $request
     * @return ShipType
     */
    public function updatePatch(ShipTypeUpdateRequest $request): ShipType
    {
        $shipType = $request->getShipType();
        $this->setGeneralFields($request, $shipType);
        $this->saveEntity($shipType);
        return $shipType;
    }

    /**
     * @param ShipTypeAllRequestInterface $request
     * @param ShipType $shipType
     * @param bool $fullUpdate
     * @return ShipType
     */
    public function setGeneralFields(ShipTypeAllRequestInterface $request, ShipType $shipType, $fullUpdate = false)
    {
        if ($request->hasTypeName()) {
            $shipType->setTypeName($request->getTypeName());
        } elseif ($fullUpdate) {
            $shipType->setTypeName($this->getDefaultTypeName());
        }
        return $shipType;
    }
}
