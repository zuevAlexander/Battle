<?php

namespace CoreBundle\Service\Ship;

use CoreBundle\Entity\Ship;
use CoreBundle\Model\Request\Ship\ShipAllRequestInterface;
use CoreBundle\Model\Request\Ship\ShipCreateRequest;
use CoreBundle\Model\Request\Ship\ShipUpdateRequest;
use NorseDigital\Symfony\RestBundle\Service\AbstractService;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use NorseDigital\Symfony\RestBundle\Entity\EntityInterface;

/** @noinspection PhpHierarchyChecksInspection */

/**
 * Class ShipService
 *
 * @method Ship createEntity()
 * @method Ship getEntity(int $id)
 * @method Ship getEntityBy(array $criteria)
 * @method Ship deleteEntity(EntityInterface $entity, bool $flush = true)
 */
class ShipService extends AbstractService implements EventSubscriberInterface, ShipDefaultValuesInterface
{
    use ShipDefaultValuesTrait;

    /**
     * @var EventDispatcherInterface
     */
    private $eventDispatcher;

    /**
     * ShipHandler constructor.
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
     * @param ShipCreateRequest $request
     * @return Ship
     */
    public function updatePost(ShipCreateRequest $request): Ship
    {
        $ship = $this->createEntity();
        $this->setGeneralFields($request, $ship, true);
        $this->saveEntity($ship);
        return $ship;
    }

    /**
     * @param ShipUpdateRequest $request
     * @return Ship
     */
    public function updatePut(ShipUpdateRequest $request): Ship
    {
        $ship = $request->getShip();
        $this->setGeneralFields($request, $ship, true);
        $this->saveEntity($ship);
        return $ship;
    }

    /**
     * @param ShipUpdateRequest $request
     * @return Ship
     */
    public function updatePatch(ShipUpdateRequest $request): Ship
    {
        $ship = $request->getShip();
        $this->setGeneralFields($request, $ship);
        $this->saveEntity($ship);
        return $ship;
    }

    /**
     * @param ShipAllRequestInterface $request
     * @param Ship $ship
     * @param bool $fullUpdate
     * @return Ship
     */
    public function setGeneralFields(ShipAllRequestInterface $request, Ship $ship, $fullUpdate = false)
    {
        if ($request->hasShipType()) {
            $ship->setShipType($request->getShipType());
        } elseif ($fullUpdate) {
            $ship->setShipType($this->getDefaultShipType());
        }

        if ($request->hasBattleField()) {
            $ship->setBattleField($request->getBattleField());
        } elseif ($fullUpdate) {
            $ship->setBattleField($this->getDefaultBattleField());
        }

        //TODO: list of requests - $request->getLocation()
        //if ($request->hasLocation()) {
        //    $ship->setLocation(new ArrayCollection());
        //} elseif ($fullUpdate) {
        //    $ship->setLocation($this->getDefaultLocation());
        //}
        return $ship;
    }
}
