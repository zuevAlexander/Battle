<?php

namespace CoreBundle\Handler;

use CoreBundle\Entity\Battle;
use CoreBundle\Model\Request\Battle\BattleListRequest;
use CoreBundle\Model\Request\Battle\BattleCreateRequest;
use CoreBundle\Model\Request\Battle\BattleReadRequest;
use CoreBundle\Model\Request\Battle\BattleUpdateRequest;
use CoreBundle\Model\Request\Battle\BattleDeleteRequest;
use CoreBundle\Service\BattleStatus\BattleStatusService;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerAwareTrait;
use Symfony\Component\DependencyInjection\ContainerInterface;
use CoreBundle\Model\Handler\BattleProcessorInterface;
use CoreBundle\Service\Battle\BattleService;
use CoreBundle\Exception\Battle\YouCanChangeOnlyOpenBattleException;

/**
 * Class BattleHandler
 */
class BattleHandler implements ContainerAwareInterface, BattleProcessorInterface
{
    use ContainerAwareTrait;

    /**
     * @var BattleService
     */
    private $battleService;

    /**
     * BattleHandler constructor.
     * @param ContainerInterface $container
     * @param BattleService $battleService
     */
    public function __construct(
        ContainerInterface $container,
        BattleService $battleService
    ) {
        $this->setContainer($container);
        $this->battleService = $battleService;
    }

    /**
     * @param BattleReadRequest $request
     * @return Battle
     */
    public function processGet(BattleReadRequest $request): Battle
    {
        return $this->battleService->getBattle($request);
    }

    /**
     * @param BattleListRequest $request
     * @return array
     */
    public function processGetCOwn(BattleListRequest $request): array
    {
        return $this->battleService->getOwnBattles();
    }

    /**
     * @param BattleListRequest $request
     * @return array
     */
    public function processGetCOpen(BattleListRequest $request): array
    {
        return $this->battleService->getOpenBattles($request);
    }

    /**
     * @param BattleCreateRequest $request
     * @return Battle
     */
    public function processPost(BattleCreateRequest $request): Battle
    {
        return $this->battleService->updatePost($request);
    }

    /**
     * @param BattleUpdateRequest $request
     * @return Battle
     */
    public function processPatch(BattleUpdateRequest $request): Battle
    {
        if ($request->getBattle()->getBattleStatus()->getStatusName() != BattleStatusService::OPEN_BATTLE) {
        throw new YouCanChangeOnlyOpenBattleException();
        }
        return $this->battleService->updatePatch($request);
    }

    /**
     * @param BattleDeleteRequest $request
     * @return Battle
     */
    public function processDelete(BattleDeleteRequest $request): Battle
    {
        return $this->battleService->deleteBattle($request);
    }
}
