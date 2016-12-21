<?php

namespace CoreBundle\Model\Handler;

use CoreBundle\Entity\BattleStatus;
use CoreBundle\Model\Request\BattleStatus\BattleStatusListRequest;
use CoreBundle\Model\Request\BattleStatus\BattleStatusCreateRequest;
use CoreBundle\Model\Request\BattleStatus\BattleStatusReadRequest;
use CoreBundle\Model\Request\BattleStatus\BattleStatusUpdateRequest;
use CoreBundle\Model\Request\BattleStatus\BattleStatusDeleteRequest;
use NorseDigital\Symfony\RestBundle\Handler\ProcessorInterface;

/**
 * Interface BattleStatusProcessorInterface
 */
interface BattleStatusProcessorInterface extends ProcessorInterface
{
    /**
     * @param BattleStatusListRequest $request
     * @return array
     */
    public function processGetC(BattleStatusListRequest $request): array;

    /**
     * @param BattleStatusCreateRequest $request
     * @return BattleStatus
     */
    public function processPost(BattleStatusCreateRequest $request): BattleStatus;

    /**
     * @param BattleStatusReadRequest $request
     * @return BattleStatus
     */
    public function processGet(BattleStatusReadRequest $request): BattleStatus;

    /**
     * @param BattleStatusUpdateRequest $request
     * @return BattleStatus
     */
    public function processPut(BattleStatusUpdateRequest $request): BattleStatus;

    /**
     * @param BattleStatusUpdateRequest $request
     * @return BattleStatus
     */
    public function processPatch(BattleStatusUpdateRequest $request): BattleStatus;

    /**
     * @param BattleStatusDeleteRequest $request
     * @return BattleStatus
     */
    public function processDelete(BattleStatusDeleteRequest $request): BattleStatus;
}
