<?php

namespace CoreBundle\Service\Battle;

use CoreBundle\Entity\Battle;
use CoreBundle\Entity\BattleField;
use CoreBundle\Exception\Battle\BattleIsNotInOpenOrPreparationStatusException;
use CoreBundle\Exception\Battle\ThisBattleIsNotInActiveStatusException;
use CoreBundle\Exception\Battle\YouAreNotOwnerOfThisBattleException;
use CoreBundle\Exception\Battle\YouCanDelereOnlyOpenOrClosedBattleException;
use CoreBundle\Model\Request\Battle\BattleCreateRequest;
use CoreBundle\Model\Request\Battle\BattleDeleteRequest;
use CoreBundle\Model\Request\Battle\BattleListRequest;
use CoreBundle\Model\Request\Battle\BattleUpdateRequest;
use CoreBundle\Service\BattleFieldStatus\BattleFieldStatusService;
use CoreBundle\Service\BattleStatus\BattleStatusService;
use CoreBundle\Service\ShotStatus\ShotStatusService;
use Doctrine\Common\Collections\ArrayCollection;
use NorseDigital\Symfony\RestBundle\Service\AbstractService;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use NorseDigital\Symfony\RestBundle\Entity\EntityInterface;
use CoreBundle\Service\BattleField\BattleFieldService;
use CoreBundle\Exception\Battle\YouAreAlreadyAttachedToThisBattleException;
use CoreBundle\Exception\BattleStatus\ThisBattleStatusIsDeniedException;
use CoreBundle\Model\Request\Battle\BattleReadRequest;
use CoreBundle\Exception\Battle\YouAreNotParticipantInThisBattleException;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorage;

/** @noinspection PhpHierarchyChecksInspection */

/**
 * Class BattleService
 *
 * @method Battle createEntity()
 * @method Battle getEntity(int $id)
 * @method Battle getEntityBy(array $criteria)
 * @method Battle deleteEntity(EntityInterface $entity, bool $flush = true)
 */
class BattleService extends AbstractService implements EventSubscriberInterface
{
    /**
     * @var TokenStorage
     */
    private $tokenStorage;

    /**
     * @var BattleFieldService
     */
    private $battleFieldService;

    /**
     * @var BattleFieldStatusService
     */
    private $battleFieldStatusService;

    /**
     * @var BattleStatusService
     */
    private $battleStatusService;

    /**
     * BattleHandler constructor.
     * @param ContainerInterface $container
     * @param string $entityClass
     * @param BattleFieldService $battleFieldService
     * @param BattleStatusService $battleStatusService
     * @param BattleFieldStatusService $battleFieldStatusService
     * @param TokenStorage $tokenStorage
     */
    public function __construct(
        ContainerInterface $container,
        string $entityClass,
        BattleFieldService $battleFieldService,
        BattleStatusService $battleStatusService,
        BattleFieldStatusService $battleFieldStatusService,
        TokenStorage $tokenStorage
    )
    {
        parent::__construct($container, $entityClass);
        $this->setContainer($container);
        $this->battleFieldService = $battleFieldService;
        $this->battleStatusService = $battleStatusService;
        $this->battleFieldStatusService = $battleFieldStatusService;
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
     * @param BattleReadRequest $request
     * @return Battle
     */
    public function getBattle(BattleReadRequest $request): Battle
    {
        $battleFields = $request->getBattle()->getBattleFields();
        foreach ($battleFields as $battleField) {
            if ($this->ownBattle($battleField->getBattle()) ||
                $request->getBattle()->getBattleStatus()->getStatusName() == BattleStatusService::OPEN_BATTLE
            ) {
                $battle = $request->getBattle();

                return $this->prepareBattleToResponse($battle);
            }
        }
        throw new YouAreNotParticipantInThisBattleException();
    }

    /**
     * @param BattleListRequest $request
     * @return array
     */
    public function getCBattles(BattleListRequest $request): array
    {
        $battles = $this->getEntitiesByWithListRequestAndTotal(
            ['battleStatus' => $request->getBattleStatus()],
            $request
        );

        $preparedBattles = [];
        foreach ($battles['items'] as $battle) {
            /** @var Battle $battle */
            $battleFields = $battle->getBattleFields();
            foreach ($battleFields as $battleField) {
                if ($battle->getBattleStatus()->getStatusName() == BattleStatusService::OPEN_BATTLE ||
                    $battleField->getUser() == $this->tokenStorage->getToken()->getUser()) {
                    $preparedBattles[] = $this->prepareBattleToResponse($battleField->getBattle());
                }
            }
        }

        $battles['total'] = count($preparedBattles);
        $battles['items'] = $preparedBattles;

        return $battles;
    }

    /**
     * @param BattleDeleteRequest $request
     * @return Battle
     */
    public function deleteBattle(BattleDeleteRequest $request): Battle
    {
        if (!$this->ownBattle($request->getBattle())) {
            throw new YouAreNotOwnerOfThisBattleException();
        }
        if ($request->getBattle()->getBattleStatus()->getStatusName() != BattleStatusService::OPEN_BATTLE &&
            $request->getBattle()->getBattleStatus()->getStatusName() != BattleStatusService::CLOSED_BATTLE
        ) {
            throw new YouCanDelereOnlyOpenOrClosedBattleException();
        }
        return $this->deleteEntity($request->getBattle());
    }

    /**
     * @param BattleCreateRequest $request
     * @return Battle
     */
    public function updatePost(BattleCreateRequest $request): Battle
    {
        $battle = $this->createEntity();
        $battleStatus = $this->battleStatusService->getEntityBy(['statusName' => BattleStatusService::OPEN_BATTLE]);

        $battle->setBattleStatus($battleStatus);
        $battle->setMapType($request->getMapType());
        $battle->setName($request->getName());

        $battleField = $this->battleFieldService->createEntity();
        $battleField->setBattle($battle);
        $battleField->setUser($this->tokenStorage->getToken()->getUser());

        $battleFieldStatus = $this->battleFieldStatusService->getEntityBy(['statusName' => BattleFieldStatusService::BATTLE_FIELD_BLOCKED]);
        $battleField->setBattleFieldStatus($battleFieldStatus);
        $this->battleFieldService->saveEntity($battleField);

        $battleFields = new ArrayCollection();
        $battleFields->add($battleField);
        $battle->setBattleFields($battleFields);
        return $battle;
    }

    /**
     * @param BattleUpdateRequest $request
     * @return Battle
     */
    public function updatePatch(BattleUpdateRequest $request): Battle
    {
        $battle = $request->getBattle();
        if ($request->hasBattleStatus()) {
            $battle->setBattleStatus($request->getBattleStatus());
        }
        if ($request->hasName()) {
            $battle->setName($request->getName());
        }
        if ($request->hasMapType()) {
            $battle->setMapType($request->getMapType());
        }

        if ($request->getBattle()->getBattleStatus()->getStatusName() == BattleStatusService::PREPARATION_BATTLE) {

            $battleFields = $battle->getBattleFields();
            foreach ($battleFields as $battleField) {
                if ($this->ownBattle($battleField->getBattle())) {
                    throw new YouAreAlreadyAttachedToThisBattleException();
                }
            }

            $battleField = $this->battleFieldService->createEntity();
            $battleField->setBattle($battle);
            $battleField->setUser($this->tokenStorage->getToken()->getUser());

            $battleFieldStatus = $this->battleFieldStatusService->getEntityBy(['statusName' => BattleFieldStatusService::BATTLE_FIELD_ACCESSIBLE]);
            $battleField->setBattleFieldStatus($battleFieldStatus);
            $this->battleFieldService->saveEntity($battleField);
        }

        $this->saveEntity($battle);
        return $battle;
    }

    /**
     * @param Battle $battle
     * @return Battle
     */
    public function prepareBattleToResponse(Battle $battle): Battle
    {
        $battleFields = $battle->getBattleFields();

        foreach ($battleFields as $key => $battleField) {
            if ($battleField->getUser() != $this->tokenStorage->getToken()->getUser()) {
                $battleFields[$key] = $battleField->setShips([]);
            }
        }
        $battle->setBattleFields($battleFields);

        return $battle;
    }

    /**
     * @param Battle $battle
     * @return bool
     */
    public function ownBattle(Battle $battle): bool
    {
        $battleFields = $battle->getBattleFields();
        foreach ($battleFields as $battleField) {
            if ($battleField->getUser() == $this->tokenStorage->getToken()->getUser()) {
                return true;
            }
        }
        return false;
    }

    /**
     * @param Battle $battle
     *
     * @throws ThisBattleIsNotInActiveStatusException
     */
    public function isBattleInActiveStatus(Battle $battle)
    {
        if ($battle->getBattleStatus()->getStatusName() != BattleStatusService::ACTIVE_BATTLE) {
            throw new ThisBattleIsNotInActiveStatusException();
        }
    }

    /**
     * @param Battle $battle
     *
     * @throws BattleIsNotInOpenOrPreparationStatusException
     */
    public function isBattleAccessibleToChange(Battle $battle)
    {
        if ($battle->getBattleStatus()->getStatusName() != BattleStatusService::OPEN_BATTLE &&
            $battle->getBattleStatus()->getStatusName() != BattleStatusService::PREPARATION_BATTLE
        ) {
            throw new BattleIsNotInOpenOrPreparationStatusException();
        }
    }

    /**
     * @param Battle $battle
     *
     * @throws YouAreNotParticipantInThisBattleException
     */
    public function isUserParticipantInBattle(Battle $battle)
    {
        $partyBattle = false;
        $battleFields = $battle->getBattleFields();
        foreach ($battleFields as $battleField) {
            if ($battleField->getUser() == $this->tokenStorage->getToken()->getUser()) {
                $partyBattle = true;
                break;
            }
        }

        if (!$partyBattle) {
            throw new YouAreNotParticipantInThisBattleException();
        }
    }

    /**
     * @param BattleField $battleField
     *
     */
    public function isBattleFinished(BattleField $battleField)
    {
        $countAllShips = count($battleField->getShips());

        $destroyShots = [];
        $shots = $battleField->getShots();
        foreach ($shots as $shot) {
            if ($shot->getShotStatus()->getStatusName() == ShotStatusService::SHOT_DESTROY) {
                $destroyShots[] = $shot;
            }
        }
        $countAlldestroyShots = count($destroyShots);

        if ($countAllShips == $countAlldestroyShots + 1) {
            $battleStatus = $this->battleStatusService->getEntityBy(['statusName' => BattleStatusService::FINISHED_BATTLE]);
            $battle = $battleField->getBattle();
            $battle->setBattleStatus($battleStatus);
            $this->saveEntity($battle);
        }
    }
}
