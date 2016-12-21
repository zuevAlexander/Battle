<?php

namespace CoreBundle\Service\BattleField;

use CoreBundle\Entity\User;
use CoreBundle\Entity\Battle;
use CoreBundle\Model\Request\Ship\ShipCreateRequest;
use CoreBundle\Model\Request\Shot\ShotCreateRequest;

/**
 * Interface BattleFieldDefaultValuesInterface
 */
interface BattleFieldDefaultValuesInterface
{
    /**
     * @return User
     */
    public function getDefaultUser(): User;

    /**
     * @return Battle
     */
    public function getDefaultBattle(): Battle;

    /**
     * @return ShipCreateRequest[]
     */
    public function getDefaultShips(): array;

    /**
     * @return ShotCreateRequest[]
     */
    public function getDefaultShots(): array;
}
