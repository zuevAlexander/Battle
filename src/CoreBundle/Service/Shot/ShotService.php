<?php

namespace CoreBundle\Service\Shot;

use CoreBundle\Entity\Battle;
use CoreBundle\Entity\Map;
use CoreBundle\Entity\Ship;
use CoreBundle\Entity\Shot;
use CoreBundle\Entity\User;
use CoreBundle\Model\Request\Shot\ShotAllRequestInterface;
use CoreBundle\Model\Request\Shot\ShotCreateRequest;
use CoreBundle\Model\Request\Shot\ShotUpdateRequest;
use CoreBundle\Model\Request\Battle\BattleUpdateRequest;
use CoreBundle\Service\Battle\BattleService;
use CoreBundle\Service\BattleStatus\BattleStatusService;
use CoreBundle\Service\Ship\ShipService;
use CoreBundle\Service\ShotStatus\ShotStatusService;
use CoreBundle\Service\ShipType\ShipTypeService;
use NorseDigital\Symfony\RestBundle\Service\AbstractService;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use NorseDigital\Symfony\RestBundle\Entity\EntityInterface;
use CoreBundle\Exception\Shot\YouCanNotMakeShotOnYourOwnBattleFieldException;
use CoreBundle\Exception\Shot\YouHaveAlreadyShotOnThisMapException;
use CoreBundle\Exception\Battle\YouAreNotParticipantInThisBattleException;
use CoreBundle\Exception\Shot\YouDidNotSpecifyBattleFieldException;
use CoreBundle\Exception\Shot\YouDidNotSpecifyLocationForShotException;

/** @noinspection PhpHierarchyChecksInspection */

/**
 * Class ShotService
 *
 * @method Shot createEntity()
 * @method Shot getEntity(int $id)
 * @method Shot getEntityBy(array $criteria)
 * @method Shot deleteEntity(EntityInterface $entity, bool $flush = true)
 */
class ShotService extends AbstractService implements EventSubscriberInterface, ShotDefaultValuesInterface
{
    use ShotDefaultValuesTrait;

    /**
     * @var EventDispatcherInterface
     */
    private $eventDispatcher;

    /**
     * @var ShipService
     */
    private $shipService;

    /**
     * @var ShotStatusService
     */
    private $shotStatusService;

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
     * ShotHandler constructor.
     * @param ContainerInterface $container
     * @param string $entityClass
     * @param EventDispatcherInterface $eventDispatcher
     * @param ShipService $shipService
     * @param ShotStatusService $shotStatusService
     * @param BattleService $battleService
     * @param BattleStatusService $battleStatusService
     */
    public function __construct(
        ContainerInterface $container,
        string $entityClass,
        EventDispatcherInterface $eventDispatcher,
        ShipService $shipService,
        ShotStatusService $shotStatusService,
        BattleService $battleService,
        BattleStatusService $battleStatusService
    ) {
        parent::__construct($container, $entityClass);
        $this->setContainer($container);
        $this->eventDispatcher = $eventDispatcher;
        $this->shipService = $shipService;
        $this->shotStatusService = $shotStatusService;
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
     * @param ShotCreateRequest $request
     * @return Shot
     */
    public function createShot(ShotCreateRequest $request): Shot
    {

        if (!$request->getBattleField()) {
            throw new YouDidNotSpecifyBattleFieldException();
        }

        if (!$request->getMap()) {
            throw new YouDidNotSpecifyLocationForShotException();
        }

        if($request->getBattleField()->getUser() ==  $this->currentUser) {
            throw new YouCanNotMakeShotOnYourOwnBattleFieldException();
        }

        $partyBattle = false;
        $battleFields = $request->getBattleField()->getBattle()->getBattleFields();
        foreach ($battleFields as $battleField) {
            if ($battleField->getUser() == $this->currentUser) {
                $partyBattle = true;
                break;
            }
        }

        if(!$partyBattle) {
            throw new YouAreNotParticipantInThisBattleException();
        }

        try {
            /** @var Shot[] $shotsHistory */
            $shotsHistory = $this->getEntitiesBy(['battleField' => $request->getBattleField()]);
            $shotsMap = [];
            foreach ($shotsHistory as $singleShot) {
                $shotsMap[] = $singleShot->getMap();
            }
        } catch (\Exception $e) {
            $shotsMap = [];
        }

        if (in_array($request->getMap(), $shotsMap)) {
            throw new YouHaveAlreadyShotOnThisMapException();
        }

        $shot = $this->createEntity();
        $shotStatusName =  ShotStatusService::SHOT_PASS;


        /** @var Ship[] $rivalShips */
        $rivalShips = $this->shipService->getEntitiesBy(['battleField' => $request->getBattleField()]);
        foreach ($rivalShips as $rivalShip) {
            foreach ($rivalShip->getLocation() as $location) {
                if ($request->getMap() == $location->getMap()) {
                    $shotStatusName = ShotStatusService::SHOT_DESTROY;
                    $strickenShip = $rivalShip;
                    break 2;
                }
            }
        }

        /** @var Ship $strickenShip */
        if ($shotStatusName == ShotStatusService::SHOT_DESTROY && $strickenShip->getShipType()->getTypeName() != ShipTypeService::SINGLE_TIER) {
            foreach ($strickenShip->getLocation() as $location) {
                if (!in_array($location->getMap(), $shotsMap) && $location->getMap() != $request->getMap()) {
                    $shotStatusName = ShotStatusService::SHOT_HIT;
                }
            }
        }

        $shotStatus = $this->shotStatusService->getEntityBy(['statusName' => $shotStatusName]);
        $shot->setShotStatus($shotStatus);
        $this->setGeneralFields($request, $shot, true);
        $this->saveEntity($shot);

        if ($shotStatusName == ShotStatusService::SHOT_DESTROY) {
            $this->isBattleFinished($request->getBattleField()->getBattle(), $shotsMap);
        }

        return $shot;
    }

    /**
     * @param ShotUpdateRequest $request
     * @return Shot
     */
    public function updatePut(ShotUpdateRequest $request): Shot
    {
        $shot = $request->getShot();
        $this->setGeneralFields($request, $shot, true);
        $this->saveEntity($shot);
        return $shot;
    }

    /**
     * @param ShotUpdateRequest $request
     * @return Shot
     */
    public function updatePatch(ShotUpdateRequest $request): Shot
    {
        $shot = $request->getShot();
        $this->setGeneralFields($request, $shot);
        $this->saveEntity($shot);
        return $shot;
    }

    /**
     * @param ShotAllRequestInterface $request
     * @param Shot $shot
     * @param bool $fullUpdate
     * @return Shot
     */
    public function setGeneralFields(ShotAllRequestInterface $request, Shot $shot, $fullUpdate = false)
    {
        if ($request->hasUser()) {
            $shot->setUser($request->getUser());
        } elseif ($fullUpdate) {
            $shot->setUser($this->getDefaultUser());
        }

        if ($request->hasMap()) {
            $shot->setMap($request->getMap());
        } elseif ($fullUpdate) {
            $shot->setMap($this->getDefaultMap());
        }

//        if ($request->hasShotStatus()) {
//            $shot->setShotStatus($request->getShotStatus());
//        } elseif ($fullUpdate) {
//            $shot->setShotStatus($this->getDefaultShotStatus());
//        }

        if ($request->hasBattleField()) {
            $shot->setBattleField($request->getBattleField());
        } elseif ($fullUpdate) {
            $shot->setBattleField($this->getDefaultBattleField());
        }
        return $shot;
    }

    /**
     * @param Battle $battle
     *
     */
    private function isBattleFinished(Battle $battle)
    {
        $battleFields = $battle->getBattleFields();
        foreach ($battleFields as $battleField) {

            try {
                /** @var Shot[] $shotsHistory */
                $shotsHistory = $this->getEntitiesBy(['battleField' => $battleField]);
                $shotsMap = [];
                foreach ($shotsHistory as $singleShot) {
                    $shotsMap[] = $singleShot->getMap();
                }
            } catch (\Exception $e) {
                $shotsMap = [];
            }

            $battleFinished = true;
            $allShips = $battleField->getShips();
            foreach ($allShips as $ship) {
                foreach ($ship->getLocation() as $location) {
                    if (!in_array($location->getMap(), $shotsMap)) {
                        $battleFinished = false;
                        break;
                    }
                }
            }
        }

        /** @var bool $battleFinished */
        if ($battleFinished) {
            $battleUpdateRequest = new BattleUpdateRequest();
            $battleUpdateRequest->setBattle($battle);
            $battleStatus = $this->battleStatusService->getEntityBy(['statusName' => BattleStatusService::FINISHED_BATTLE]);
            $battleUpdateRequest->setBattleStatus($battleStatus);
            $this->battleService->updatePatch($battleUpdateRequest);
        }
    }
}
