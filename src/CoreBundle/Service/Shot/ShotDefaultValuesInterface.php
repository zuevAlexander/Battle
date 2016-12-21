<?php

namespace CoreBundle\Service\Shot;

use CoreBundle\Entity\User;
use CoreBundle\Entity\Map;
use CoreBundle\Entity\ShotStatus;
use CoreBundle\Entity\BattleField;

/**
 * Interface ShotDefaultValuesInterface
 */
interface ShotDefaultValuesInterface
{
    /**
     * @return User
     */
    public function getDefaultUser(): User;

    /**
     * @return Map
     */
    public function getDefaultMap(): Map;

    /**
     * @return ShotStatus
     */
    public function getDefaultShotStatus(): ShotStatus;

    /**
     * @return BattleField
     */
    public function getDefaultBattleField(): BattleField;
}
