<?php

namespace CoreBundle\Service\Shot;

use CoreBundle\Entity\User;
use CoreBundle\Entity\Map;
use CoreBundle\Entity\ShotStatus;
use CoreBundle\Entity\BattleField;

/**
 * Trait ShotDefaultValuesTrait;
 */
trait ShotDefaultValuesTrait
{
    /**
     * @return User
     */
    public function getDefaultUser(): User
    {
        return $this->currentUser;
    }

    /**
     * @return Map
     */
    public function getDefaultMap(): Map
    {
        //TODO some default value
    }

    /**
     * @return ShotStatus
     */
    public function getDefaultShotStatus(): ShotStatus
    {
        //TODO some default value
    }

    /**
     * @return BattleField
     */
    public function getDefaultBattleField(): BattleField
    {
        //TODO some default value
    }
}
