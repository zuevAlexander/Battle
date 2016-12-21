<?php

namespace CoreBundle\Model\Request\BattleStatus;

use CoreBundle\Entity\BattleStatus;

/**
 * Interface BattleStatusSingleRequestInterface
 * * @method bool hasBattleStatus()
 */
interface BattleStatusSingleRequestInterface
{
    /**
     * @return BattleStatus
     */
    public function getBattleStatus(): BattleStatus;

    /**
     * @param BattleStatus $battleStatus
     */
    public function setBattleStatus(BattleStatus $battleStatus);
}
