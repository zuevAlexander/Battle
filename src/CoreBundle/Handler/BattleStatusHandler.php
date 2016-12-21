<?php

namespace CoreBundle\Handler;

use CoreBundle\Entity\BattleStatus;
use CoreBundle\Model\Request\BattleStatus\BattleStatusListRequest;
use CoreBundle\Model\Request\BattleStatus\BattleStatusCreateRequest;
use CoreBundle\Model\Request\BattleStatus\BattleStatusReadRequest;
use CoreBundle\Model\Request\BattleStatus\BattleStatusUpdateRequest;
use CoreBundle\Model\Request\BattleStatus\BattleStatusDeleteRequest;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerAwareTrait;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use CoreBundle\Model\Handler\BattleStatusProcessorInterface;
use CoreBundle\Service\BattleStatus\BattleStatusService;

/**
 * Class BattleStatusHandler
 */
class BattleStatusHandler implements ContainerAwareInterface, BattleStatusProcessorInterface
{
    use ContainerAwareTrait;

    /**
     * @var EventDispatcherInterface
     */
    private $eventDispatcher;

    /**
     * @var BattleStatusService
     */
    private $battleStatusService;

    /**
     * BattleStatusHandler constructor.
     * @param ContainerInterface $container
     * @param EventDispatcherInterface $eventDispatcher
     * @param BattleStatusService $battleStatusService
     */
    public function __construct(
        ContainerInterface $container,
        EventDispatcherInterface $eventDispatcher,
        BattleStatusService $battleStatusService
    ) {
        $this->setContainer($container);
        $this->eventDispatcher = $eventDispatcher;
        $this->battleStatusService = $battleStatusService;
    }

    /**
     * @inheritdoc
     */
    public function processGetC(BattleStatusListRequest $request): array
    {
        return $this->battleStatusService->getEntitiesByWithListRequestAndTotal(
            [],
            $request
        );
    }

    /**
     * @inheritdoc
     */
    public function processPost(BattleStatusCreateRequest $request): BattleStatus
    {
        return $this->battleStatusService->updatePost($request);
    }

    /**
     * @inheritdoc
     */
    public function processGet(BattleStatusReadRequest $request): BattleStatus
    {
        return $request->getBattleStatus();
    }

    /**
     * @inheritdoc
     */
    public function processPut(BattleStatusUpdateRequest $request): BattleStatus
    {
        return $this->battleStatusService->updatePut($request);
    }

    /**
     * @inheritdoc
     */
    public function processPatch(BattleStatusUpdateRequest $request): BattleStatus
    {
        return $this->battleStatusService->updatePatch($request);
    }

    /**
     * @inheritdoc
     */
    public function processDelete(BattleStatusDeleteRequest $request): BattleStatus
    {
        return $this->battleStatusService->deleteEntity($request->getBattleStatus());
    }
}
