<?php

namespace CoreBundle\Model\Handler;

use CoreBundle\Entity\Battle;
use CoreBundle\Model\Request\Battle\BattleListRequest;
use CoreBundle\Model\Request\Battle\BattleCreateRequest;
use CoreBundle\Model\Request\Battle\BattleReadRequest;
use CoreBundle\Model\Request\Battle\BattleUpdateRequest;
use CoreBundle\Model\Request\Battle\BattleDeleteRequest;
use NorseDigital\Symfony\RestBundle\Handler\ProcessorInterface;

/**
 * Interface BattleProcessorInterface
 */
interface BattleProcessorInterface extends ProcessorInterface
{
    /**
     * @param BattleCreateRequest $request
     * @return Battle
     */
    public function processPost(BattleCreateRequest $request): Battle;

    /**
     * @param BattleReadRequest $request
     * @return Battle
     */
    public function processGet(BattleReadRequest $request): Battle;

    /**
     * @param BattleListRequest $request
     * @return array
     */
    public function processGetC(BattleListRequest $request): array;

    /**
     * @param BattleUpdateRequest $request
     * @return Battle
     */
    public function processPatch(BattleUpdateRequest $request): Battle;

    /**
     * @param BattleDeleteRequest $request
     * @return Battle
     */
    public function processDelete(BattleDeleteRequest $request): Battle;
}
