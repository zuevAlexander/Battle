<?php

namespace CoreBundle\Model\Handler;

use CoreBundle\Entity\BattleField;
use CoreBundle\Model\Request\BattleField\BattleFieldReadRequest;
use NorseDigital\Symfony\RestBundle\Handler\ProcessorInterface;

/**
 * Interface BattleFieldProcessorInterface
 */
interface BattleFieldProcessorInterface extends ProcessorInterface
{
    /**
     * @param BattleFieldReadRequest $request
     * @return BattleField
     */
    public function processGet(BattleFieldReadRequest $request): BattleField;
}
