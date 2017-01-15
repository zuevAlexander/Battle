<?php

namespace CoreBundle\Service\Shot;

use CoreBundle\Entity\BattleField;
use CoreBundle\Entity\BattleFieldStatus;
use CoreBundle\Entity\Map;
use CoreBundle\Entity\Shot;
use CoreBundle\Entity\User;
use CoreBundle\Exception\BattleField\NowIsNotYourTurnToMakeShotException;
use CoreBundle\Model\Request\Shot\ShotCreateRequest;
use CoreBundle\Service\Battle\BattleService;
use CoreBundle\Service\BattleFieldStatus\BattleFieldStatusService;
use CoreBundle\Service\ShotStatus\ShotStatusService;
use NorseDigital\Symfony\RestBundle\Service\AbstractService;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use CoreBundle\Exception\Shot\YouCanNotMakeShotOnYourOwnBattleFieldException;
use CoreBundle\Exception\Shot\YouHaveAlreadyShotOnThisMapException;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorage;

/** @noinspection PhpHierarchyChecksInspection */

/**
 * Class ShotService
 *
 * @method Shot createEntity()
 */
class ShotService extends AbstractService implements EventSubscriberInterface
{
    /**
     * @var ShotStatusService
     */
    private $shotStatusService;

    /**
     * @var BattleService
     */
    private $battleService;

    /**
     * @var TokenStorage
     */
    private $tokenStorage;

    /**
     * ShotHandler constructor.
     * @param ContainerInterface $container
     * @param string $entityClass
     * @param ShotStatusService $shotStatusService
     * @param BattleService $battleService
     * @param TokenStorage $tokenStorage
     */
    public function __construct(
        ContainerInterface $container,
        string $entityClass,
        ShotStatusService $shotStatusService,
        BattleService $battleService,
        TokenStorage $tokenStorage
    )
    {
        parent::__construct($container, $entityClass);
        $this->setContainer($container);
        $this->shotStatusService = $shotStatusService;
        $this->battleService = $battleService;
        $this->tokenStorage = $tokenStorage;
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
        $this->battleService->isUserParticipantInBattle($request->getBattleField()->getBattle());

        $this->battleService->isBattleInProcessStatus($request->getBattleField()->getBattle());

        $this->isShotMakesInOwnBattleField($request->getBattleField()->getUser());

        $this->whoseTurnToMakeShot($request->getBattleField()->getBattleFieldStatus());

        $this->isMapAlreadyShot($request->getBattleField(), $request->getMap());

        $shot = $this->createEntity();

        $shotStatus = $this->shotStatusService->checkShotStatus($request->getBattleField(), $request->getMap(), $this->getShotsMap($request->getBattleField()));

        $shot->setShotStatus($shotStatus);
        $shot->setMap($request->getMap());
        $shot->setBattleField($request->getBattleField());
        $this->saveEntity($shot);

        if ($shotStatus->getStatusName() == ShotStatusService::SHOT_PASS) {
            $this->changeTurnOfShots($shot);
        } elseif ($shotStatus->getStatusName() == ShotStatusService::SHOT_DESTROY) {
            $this->battleService->isBattleFinished($request->getBattleField());
        }

        return $shot;
    }

    /**
     * @param User $user
     *
     * @throws YouCanNotMakeShotOnYourOwnBattleFieldException
     */
    private function isShotMakesInOwnBattleField(User $user)
    {
        if ($user == $this->tokenStorage->getToken()->getUser()) {
            throw new YouCanNotMakeShotOnYourOwnBattleFieldException();
        }
    }

    /**
     * @param BattleFieldStatus $battleFieldStatus
     *
     * @throws NowIsNotYourTurnToMakeShotException
     */
    private function whoseTurnToMakeShot(BattleFieldStatus $battleFieldStatus)
    {
        if ($battleFieldStatus->getStatusName() == BattleFieldStatusService::BATTLE_FIELD_ACCESSIBLE) {
            throw new NowIsNotYourTurnToMakeShotException();
        }
    }

    /**
     * @param Shot $shot
     */
    private function changeTurnOfShots(Shot $shot)
    {
        $battleFieldRival = $shot->getBattleField();
        $battleFieldStatusAccessible = $battleFieldRival->getBattleFieldStatus();

        $battleFields = $shot->getBattleField()->getBattle()->getBattleFields();

        foreach ($battleFields as $battleField) {
            if ($battleField != $battleFieldRival) {
                $battleFieldRival->setBattleFieldStatus($battleField->getBattleFieldStatus());
                $battleField->setBattleFieldStatus($battleFieldStatusAccessible);
                break;
            }
        }

        $battle = $shot->getBattleField()->getBattle();
        $this->battleService->saveEntity($battle);
    }

    /**
     * @param BattleField $battleField
     * @param Map $shotMap
     *
     * @throws YouHaveAlreadyShotOnThisMapException
     */
    private function isMapAlreadyShot(BattleField $battleField, Map $shotMap)
    {
        $shotsMap = $this->getShotsMap($battleField);

        if (in_array($shotMap, $shotsMap)) {
            throw new YouHaveAlreadyShotOnThisMapException();
        }
    }

    /**
     * @param BattleField $battleField
     * @return array
     */
    private function getShotsMap(BattleField $battleField)
    {
        $shotsMap = [];
        $shotsHistory = $battleField->getShots();
        foreach ($shotsHistory as $singleShot) {
            $shotsMap[] = $singleShot->getMap();
        }

        return $shotsMap;
    }
}
