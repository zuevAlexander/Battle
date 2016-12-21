<?php

namespace CoreBundle\Model\Handler;

use CoreBundle\Entity\BattleField;
use CoreBundle\Model\Request\BattleField\BattleFieldListRequest;
use CoreBundle\Model\Request\BattleField\BattleFieldCreateRequest;
use CoreBundle\Model\Request\BattleField\BattleFieldReadRequest;
use CoreBundle\Model\Request\BattleField\BattleFieldUpdateRequest;
use CoreBundle\Model\Request\BattleField\BattleFieldDeleteRequest;
use NorseDigital\Symfony\RestBundle\Handler\ProcessorInterface;

/**
 * Interface BattleFieldProcessorInterface
 */
interface BattleFieldProcessorInterface extends ProcessorInterface
{
    /**
     * @param BattleFieldListRequest $request
     * @return array
     */
    public function processGetC(BattleFieldListRequest $request): array;

    /**
     * @param BattleFieldCreateRequest $request
     * @return BattleField
     */
    public function processPost(BattleFieldCreateRequest $request): BattleField;

    /**
     * @param BattleFieldReadRequest $request
     * @return BattleField
     */
    public function processGet(BattleFieldReadRequest $request): BattleField;

    /**
     * @param BattleFieldUpdateRequest $request
     * @return BattleField
     */
    public function processPut(BattleFieldUpdateRequest $request): BattleField;

    /**
     * @param BattleFieldUpdateRequest $request
     * @return BattleField
     */
    public function processPatch(BattleFieldUpdateRequest $request): BattleField;

    /**
     * @param BattleFieldDeleteRequest $request
     * @return BattleField
     */
    public function processDelete(BattleFieldDeleteRequest $request): BattleField;
}
