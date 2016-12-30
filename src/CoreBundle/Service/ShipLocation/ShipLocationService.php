<?php

namespace CoreBundle\Service\ShipLocation;

use CoreBundle\Entity\ShipLocation;
use CoreBundle\Model\Request\Ship\ShipAllRequestInterface;
use CoreBundle\Model\Request\ShipLocation\ShipLocationAllRequestInterface;
use CoreBundle\Model\Request\ShipLocation\ShipLocationCreateRequest;
use CoreBundle\Model\Request\ShipLocation\ShipLocationUpdateRequest;
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
class ShipLocationService extends AbstractService implements EventSubscriberInterface, ShipLocationDefaultValuesInterface
{
    use ShipLocationDefaultValuesTrait;

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

    /**
     * @param ShipLocationCreateRequest $request
     * @return ShipLocation
     */
    public function updatePost(ShipLocationCreateRequest $request): ShipLocation
    {
        $shipLocation = $this->createEntity();
        $this->setGeneralFields($request, $shipLocation, true);
        $this->saveEntity($shipLocation);
        return $shipLocation;
    }

    /**
     * @param ShipLocationUpdateRequest $request
     * @return ShipLocation
     */
    public function updatePut(ShipLocationUpdateRequest $request): ShipLocation
    {
        $shipLocation = $request->getShipLocation();
        $this->setGeneralFields($request, $shipLocation, true);
        $this->saveEntity($shipLocation);
        return $shipLocation;
    }

    /**
     * @param ShipLocationUpdateRequest $request
     * @return ShipLocation
     */
    public function updatePatch(ShipLocationUpdateRequest $request): ShipLocation
    {
        $shipLocation = $request->getShipLocation();
        $this->setGeneralFields($request, $shipLocation);
        $this->saveEntity($shipLocation);
        return $shipLocation;
    }

    /**
     * @param ShipLocationAllRequestInterface $request
     * @param ShipLocation $shipLocation
     * @param bool $fullUpdate
     * @return ShipLocation
     */
    public function setGeneralFields(ShipLocationAllRequestInterface $request, ShipLocation $shipLocation, $fullUpdate = false)
    {
        if ($request->hasShip()) {
            $shipLocation->setShip($request->getShip());
        } elseif ($fullUpdate) {
            $shipLocation->setShip($this->getDefaultShip());
        }

        if ($request->hasMap()) {
            $shipLocation->setMap($request->getMap());
        } elseif ($fullUpdate) {
            $shipLocation->setMap($this->getDefaultMap());
        }
        return $shipLocation;
    }

}
