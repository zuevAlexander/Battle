<?php

namespace CoreBundle\Service\Battle;

use CoreBundle\Entity\Battle;
use CoreBundle\Entity\BattleField;
use CoreBundle\Model\Request\Battle\BattleAllRequestInterface;
use CoreBundle\Model\Request\Battle\BattleCreateRequest;
use CoreBundle\Model\Request\Battle\BattleUpdateRequest;
use CoreBundle\Service\BattleStatus\BattleStatusService;
use NorseDigital\Symfony\RestBundle\Service\AbstractService;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use NorseDigital\Symfony\RestBundle\Entity\EntityInterface;
use CoreBundle\Service\BattleField\BattleFieldService;
use CoreBundle\Security\WebserviceUserProvider;
use CoreBundle\Exception\Battle\YouAreAlreadyAttachedToThisBattleException;
use CoreBundle\Model\Request\Battle\BattleReadRequest;
use CoreBundle\Entity\User;
use CoreBundle\Exception\Battle\YouAreNotParticipantInThisBattleException;

/** @noinspection PhpHierarchyChecksInspection */

/**
 * Class BattleService
 *
 * @method Battle createEntity()
 * @method Battle getEntity(int $id)
 * @method Battle getEntityBy(array $criteria)
 * @method Battle deleteEntity(EntityInterface $entity, bool $flush = true)
 */
class BattleService extends AbstractService implements EventSubscriberInterface, BattleDefaultValuesInterface
{
    use BattleDefaultValuesTrait;

    /**
     * @var EventDispatcherInterface
     */
    private $eventDispatcher;

    /**
     * @var WebserviceUserProvider
     */
    private $userProvider;

    /**
     * @var User
     */
    private $currentUser;

    /**
     * @var BattleFieldService
     */
    private $battleFieldService;

    /**
     * @var BattleStatusService
     */
    private $battleStatusService;

    /**
     * BattleHandler constructor.
     * @param ContainerInterface $container
     * @param string $entityClass
     * @param EventDispatcherInterface $eventDispatcher
     * @param BattleFieldService $battleFieldService
     * @param WebserviceUserProvider $userProvider
     * @param BattleStatusService $battleStatusService
     */
    public function __construct(
        ContainerInterface $container,
        string $entityClass,
        EventDispatcherInterface $eventDispatcher,
        BattleFieldService $battleFieldService,
        WebserviceUserProvider $userProvider,
        BattleStatusService $battleStatusService
    ) {
        parent::__construct($container, $entityClass);
        $this->setContainer($container);
        $this->eventDispatcher = $eventDispatcher;
        $this->battleFieldService = $battleFieldService;
        $this->userProvider = $userProvider;
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
     * @param BattleReadRequest $request
     * @return Battle
     */
    public function getBattle(BattleReadRequest $request): Battle
    {
        $battleFields = $request->getBattle()->getBattleFields();
        foreach ($battleFields as $battleField) {
            if ($this->ownBattle($battleField->getBattle())) {

                $battle = $request->getBattle();

                return $this->prepareBattleToResponse($battle);
            }
        }

        throw new YouAreNotParticipantInThisBattleException();
    }

    /**
     * @return array
     */
    public function getOpenBattles(): array
    {
        $battles = [];

        $openBattleStatus = $this->battleStatusService->getEntityBy(['statusName' => BattleStatusService::OPEN_BATTLE]);
        $parentBattles = $this->getEntitiesBy(['battleStatus' => $openBattleStatus]);
        foreach ($parentBattles as $key=>$battle) {
            /** @var Battle $battle */
            $battles[] = $this->prepareBattleToResponse($battle);
        }

        return $battles;
    }

    /**
     * @return array
     */
    public function getOwnBattles(): array
    {
        $battles = [];

        if ($battleFields = $this->battleFieldService->getEntitiesBy(['user' => $this->currentUser])) {
            foreach ($battleFields as $battleField) {
                /** @var BattleField $battleField */
                $battles[] = $this->prepareBattleToResponse($battleField->getBattle());
            }
        }

        return $battles;
    }

    /**
     * @param BattleCreateRequest $request
     * @return Battle
     */
    public function updatePost(BattleCreateRequest $request): Battle
    {
        $battle = $this->createEntity();
        $this->setGeneralFields($request, $battle, true);
        $this->saveEntity($battle);

        $battleField = $this->battleFieldService->createEntity();
        $battleField->setBattle($battle);
        $battleField->setUser($this->currentUser);
        $this->battleFieldService->saveEntity($battleField);

        return $battle;
    }

    /**
     * @param BattleUpdateRequest $request
     * @return Battle
     */
    public function updatePut(BattleUpdateRequest $request): Battle
    {
        $battle = $request->getBattle();
        $this->setGeneralFields($request, $battle, true);
        $this->saveEntity($battle);
        return $battle;
    }

    /**
     * @param BattleUpdateRequest $request
     * @return Battle
     */
    public function updatePatch(BattleUpdateRequest $request): Battle
    {
        $battle = $request->getBattle();
        $this->setGeneralFields($request, $battle);

        if ($request->getBattle()->getBattleStatus()->getStatusName() == BattleStatusService::PREPARATION_BATTLE) {

            $battleFields = $battle->getBattleFields();
            foreach ($battleFields as $battleField) {
                if ($this->ownBattle($battleField->getBattle())) {
                    throw new YouAreAlreadyAttachedToThisBattleException();
                }
            }

            $battleField = $this->battleFieldService->createEntity();
            $battleField->setBattle($battle);
            $battleField->setUser($this->container->get('security.token_storage')->getToken()->getUser());
            $this->battleFieldService->saveEntity($battleField);
        }

        $this->saveEntity($battle);
        return $battle;
    }

    /**
     * @param BattleAllRequestInterface $request
     * @param Battle $battle
     * @param bool $fullUpdate
     * @return Battle
     */
    public function setGeneralFields(BattleAllRequestInterface $request, Battle $battle, $fullUpdate = false)
    {
        if ($request->hasBattleStatus()) {
            $battle->setBattleStatus($request->getBattleStatus());
        } elseif ($fullUpdate) {
            $battle->setBattleStatus($this->getDefaultBattleStatus());
        }

        if ($request->hasMapType()) {
            $battle->setMapType($request->getMapType());
        } elseif ($fullUpdate) {
            $battle->setMapType($this->getDefaultMapType());
        }

        if ($request->hasName()) {
            $battle->setName($request->getName());
        } elseif ($fullUpdate) {
            $battle->setName($this->getDefaultName());
        }
        return $battle;
    }

    /**
     * @param Battle $battle
     * @return Battle
     */
    public function prepareBattleToResponse(Battle $battle): Battle
    {
        $battleFields = $battle->getBattleFields();

        foreach ($battleFields as $key=>$battleField) {
            if ($battleField->getUser() != $this->currentUser) {
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
            if ($battleField->getUser() == $this->currentUser) {
                return true;
            }
        }
        return false;
    }
}
