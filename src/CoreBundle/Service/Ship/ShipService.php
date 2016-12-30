<?php

namespace CoreBundle\Service\Ship;

use NorseDigital\Symfony\RestBundle\Service\AbstractService;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use NorseDigital\Symfony\RestBundle\Entity\EntityInterface;
use CoreBundle\Entity\BattleField;
use CoreBundle\Entity\CountShips;
use CoreBundle\Entity\Map;
use CoreBundle\Entity\Ship;
use CoreBundle\Entity\ShipLocation;
use CoreBundle\Entity\Battle;
use CoreBundle\Entity\User;
use CoreBundle\Model\Request\Ship\ShipAllRequestInterface;
use CoreBundle\Model\Request\Ship\ShipCreateRequest;
use CoreBundle\Model\Request\Ship\ShipUpdateRequest;
use CoreBundle\Model\Request\Battle\BattleUpdateRequest;
use CoreBundle\Service\Battle\BattleService;
use CoreBundle\Service\CountShips\CountShipsService;
use CoreBundle\Service\Map\MapService;
use CoreBundle\Service\ShipLocation\ShipLocationService;
use CoreBundle\Service\BattleStatus\BattleStatusService;
use CoreBundle\Service\ShipType\ShipTypeService;
use CoreBundle\Exception\Ship\EmptyShipLocationException;
use CoreBundle\Exception\Ship\CountOfDecksDoesNotCorrespondToTypeOfShip;
use CoreBundle\Exception\Ship\ExhaustedLimitOfThisTypeOfShips;
use CoreBundle\Exception\Ship\ShipLocatedOnOccupiedCellsException;
use CoreBundle\Exception\Ship\IncorrectShipLocationException;
use CoreBundle\Exception\Ship\YourBattleFieldIsReadyException;
use CoreBundle\Exception\BattleField\YouAreNotOwnerOfThisBattleField;
use \CoreBundle\Exception\Battle\BattleIsNotInOpenOrPreparationStatusException;

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
     * @var ShipLocationService
     */
    private $shipLocationService;

    /**
     * @var CountShipsService
     */
    private $countShipsService;

    /**
     * @var MapService
     */
    private $mapService;

    /**
     * @var BattleService
     */
    private $battleService;

    /**
     * @var BattleStatusService
     */
    private $battleStatusService;

    /**
     * @var User
     */
    private $currentUser;

    /**
     * ShipHandler constructor.
     * @param ContainerInterface $container
     * @param string $entityClass
     * @param EventDispatcherInterface $eventDispatcher
     * @param ShipLocationService $shipLocationService
     * @param CountShipsService $countShipsService
     * @param MapService $mapService
     * @param BattleService $battleService
     * @param BattleStatusService $battleStatusService
     */
    public function __construct(
        ContainerInterface $container,
        string $entityClass,
        EventDispatcherInterface $eventDispatcher,
        ShipLocationService $shipLocationService,
        CountShipsService $countShipsService,
        MapService $mapService,
        BattleService $battleService,
        BattleStatusService $battleStatusService
    ) {
        parent::__construct($container, $entityClass);
        $this->setContainer($container);
        $this->eventDispatcher = $eventDispatcher;
        $this->shipLocationService = $shipLocationService;
        $this->countShipsService = $countShipsService;
        $this->mapService = $mapService;
        $this->battleService = $battleService;
        $this->battleStatusService = $battleStatusService;
        $this->currentUser = $this->container->get('security.token_storage')->getToken()->getUser();
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
        if($request->getBattleField()->getUser() !=  $this->currentUser) {
            throw new YouAreNotOwnerOfThisBattleField();
        }

        $battleStatus = $request->getBattleField()->getBattle()->getBattleStatus()->getStatusName();
        if ($battleStatus != BattleStatusService::OPEN_BATTLE || $battleStatus != BattleStatusService::PREPARATION_BATTLE) {
            throw new BattleIsNotInOpenOrPreparationStatusException();
        }

        $ownBattleFieldReady = $this->isBattleFieldReady($request->getBattleField(), true);

        $this->isCorrectCountOfDecks($request);

        $this->checkLimitForCurrentTypeOfShips($request);

        if($request->getShipType()->getDeckCount() != ShipTypeService::SINGLE_TIER) {
            $this->isCorrectShipLocation($request);
        }

        $this->checkEmptyCellsForShipLocation($request);

        $ship = $this->createEntity();

        $shipLocations = $request->getLocation();
        foreach ($shipLocations as $shipLocation) {
            $this->addLocationToShip($shipLocation->getMap(), $ship);
        }

        $this->setGeneralFields($request, $ship, true);
        $this->saveEntity($ship);

        if ($ownBattleFieldReady && $battleStatus == BattleStatusService::PREPARATION_BATTLE) {
            $this->isBattleReady($request->getBattleField()->getBattle());
        }

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

    /**
     * @param Map     $map
     * @param Ship    $ship
     */
    private function addLocationToShip(Map $map, Ship $ship)
    {
        $ship->getLocation()->add($this->shipLocationService->createEntity()->setMap($map)->setShip($ship));
    }

    /**
     * @param ShipAllRequestInterface     $request
     *
     * @throws EmptyShipLocationException|CountOfDecksDoesNotCorrespondToTypeOfShip
     */
    private function isCorrectCountOfDecks(ShipAllRequestInterface $request)
    {
        $deckCount = count($request->getLocation());

        if ($deckCount == 0) {
            throw new EmptyShipLocationException();
        }

        if ($deckCount != $request->getShipType()->getDeckCount()) {
            throw new CountOfDecksDoesNotCorrespondToTypeOfShip();
        }
    }

    /**
     * @param ShipAllRequestInterface     $request
     *
     * @throws IncorrectShipLocationException
     */
    private function isCorrectShipLocation(ShipAllRequestInterface $request)
    {
        $map = [];
        $cells = $this->mapService->getEntities();
        foreach ($cells as $cell) {
            /** @var Map $cell */
            $map[$cell->getLatitude()][$cell->getLongitude()] = $cell;
        }

        $prohibitedMap = [];
        $maxCells = count($map);
        $shipLocations = $request->getLocation();
        $maxDistance = $request->getShipType()->getDeckCount();

        foreach ($shipLocations as $shipLocation) {

            /** @var shipLocation $shipLocation */
            $x = $shipLocation->getMap()->getLatitude();
            $y = $shipLocation->getMap()->getLongitude();

            /* define maximum distance between decks */
            $latitudes[] = $x;
            $longitudes[] = $y;
            $maxLatitudeDistance = max($latitudes) - min($latitudes);
            $maxLongitudeDistance = max($longitudes) - min($longitudes);

            if (in_array($shipLocation->getMap(), $prohibitedMap) ||
                $maxLatitudeDistance >= $maxDistance || $maxLongitudeDistance >= $maxDistance ||
                ($maxLatitudeDistance > 0 && $maxLongitudeDistance > 0)) {

                throw new IncorrectShipLocationException();
            }

            /* collect prohibited cells for location of decks */
            $prohibitedMap[] = $map[$x][$y];
            if ($x != 1 && $y != 1) {
                $prohibitedMap[] = $map[$x - 1][$y - 1];
            }
            if ($x != 1 && $y != $maxCells) {
                $prohibitedMap[] = $map[$x - 1][$y + 1];
            }
            if ($x != $maxCells && $y != 1) {
                $prohibitedMap[] = $map[$x + 1][$y - 1];
            }
            if ($x != $maxCells && $y != $maxCells) {
                $prohibitedMap[] = $map[$x + 1][$y + 1];
            }
        }
    }

    /**
     * @param ShipAllRequestInterface     $request
     *
     * @throws ExhaustedLimitOfThisTypeOfShips
     */
    private function checkLimitForCurrentTypeOfShips(ShipAllRequestInterface $request)
    {
        try {
            $ownShips = $this->getEntitiesBy([
                'shipType' => $request->getShipType(),
                'battleField' => $request->getBattleField()
            ]);
        } catch (\Exception $e) {
            $ownShips = [];
        }

        $countShips = $this->countShipsService->getEntityBy([
            'shipType' => $request->getShipType(),
            'mapType' => $request->getBattleField()->getBattle()->getMapType()
        ]);

        if (count($ownShips) >= $countShips->getCount()) {
            throw new ExhaustedLimitOfThisTypeOfShips();
        }
    }

    /**
     * @param ShipAllRequestInterface     $request
     *
     * @throws ShipLocatedOnOccupiedCellsException
     */
    private function checkEmptyCellsForShipLocation(ShipAllRequestInterface $request)
    {
        try {
            $allOwnShips = $this->getEntitiesBy([
                'battleField' => $request->getBattleField()
            ]);
        } catch (\Exception $e) {
            $allOwnShips = [];
        }

        $map = [];
        $cells = $this->mapService->getEntities();
        foreach ($cells as $cell) {
            /** @var Map $cell */
            $map[$cell->getLatitude()][$cell->getLongitude()] = $cell;
        }

        $occupiedMap = [];
        $maxCells = count($map);
        foreach ($allOwnShips as $ownShip) {
            $shipLocations = $ownShip->getLocation();
            foreach ($shipLocations as $shipLocation) {
                /** @var shipLocation $shipLocation */
                $x = $shipLocation->getMap()->getLatitude();
                $y = $shipLocation->getMap()->getLongitude();
                $occupiedMap[] = $map[$x][$y];
                if ($x != 1) {
                    $occupiedMap[] = $map[$x - 1][$y];
                }
                if ($x != $maxCells) {
                    $occupiedMap[] = $map[$x + 1][$y];
                }
                if ($y != 1) {
                    $occupiedMap[] = $map[$x][$y - 1];
                }
                if ($y != $maxCells) {
                    $occupiedMap[] = $map[$x][$y + 1];
                }
                if ($x != 1 && $y != 1) {
                    $occupiedMap[] = $map[$x - 1][$y - 1];
                }
                if ($x != 1 && $y != $maxCells) {
                    $occupiedMap[] = $map[$x - 1][$y + 1];
                }
                if ($x != $maxCells && $y != 1) {
                    $occupiedMap[] = $map[$x + 1][$y - 1];
                }
                if ($x != $maxCells && $y != $maxCells) {
                    $occupiedMap[] = $map[$x + 1][$y + 1];
                }
            }
        }

        $newShipLocations = $request->getLocation();

        foreach ($newShipLocations as $newShipLocation) {
            if (in_array($newShipLocation->getMap(), $occupiedMap)) {
                throw new ShipLocatedOnOccupiedCellsException();
            }
        }
    }

    /**
     * @param BattleField     $battleField
     * @param bool            $creationShip
     *
     * @throws YourBattleFieldIsReadyException
     *
     * @return boolean
     */
    private function isBattleFieldReady(BattleField $battleField, $creationShip = false)
    {
        try {
            $allOwnShips = $this->getEntitiesBy([
                'battleField' => $battleField
            ]);
        } catch (\Exception $e) {
            $allOwnShips = [];
        }

        $allCountShips = $this->countShipsService->getEntitiesBy([
            'mapType' => $battleField->getBattle()->getMapType()
        ]);

        $maxCount = 0;
        foreach ($allCountShips as $countShips) {
            /** @var CountShips $countShips */
            $maxCount += $countShips->getCount();
        }

        if ($creationShip && count($allOwnShips) >= $maxCount) {
            throw new YourBattleFieldIsReadyException();
        }

        if (($creationShip && count($allOwnShips) + 1 == $maxCount) ||
            (!$creationShip && count($allOwnShips) == $maxCount)) {
            return true;
        }

        return false;
    }

    /**
     * @param Battle $battle
     *
     */
    private function isBattleReady(Battle $battle)
    {
        $battleReady = true;
        $battleFields = $battle->getBattleFields();
        foreach ($battleFields as $battleField) {
            if(!$this->isBattleFieldReady($battleField)) {
                $battleReady = false;
                break;
            }
        }

        if ($battleReady) {
            $battleUpdateRequest = new BattleUpdateRequest();
            $battleUpdateRequest->setBattle($battle);
            $battleStatus = $this->battleStatusService->getEntityBy(['statusName' => BattleStatusService::PROCESS_BATTLE]);
            $battleUpdateRequest->setBattleStatus($battleStatus);
            $this->battleService->updatePatch($battleUpdateRequest);
        }
    }
}
