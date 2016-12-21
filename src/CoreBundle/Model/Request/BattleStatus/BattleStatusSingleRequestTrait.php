<?php

namespace CoreBundle\Model\Request\BattleStatus;

use CoreBundle\Entity\BattleStatus;

/**
 * Trait BattleStatusSingleRequestTrait;
 */
trait BattleStatusSingleRequestTrait
{
    /**
     * @var BattleStatus
     */
    protected $battleStatus;

    /**
     * {@inheritdoc}
     */
    public function __construct()
    {
        $this->battleStatus = new BattleStatus();
    }

    /**
     * @return BattleStatus
     */
    public function getBattleStatus(): BattleStatus
    {
        return $this->battleStatus;
    }

    /**
     * @param BattleStatus $battleStatus
     */
    public function setBattleStatus(BattleStatus $battleStatus)
    {
        $this->battleStatus = $battleStatus;
    }
}
