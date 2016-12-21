<?php

namespace CoreBundle\Service\BattleField;

use CoreBundle\Entity\User;
use CoreBundle\Entity\Battle;
use CoreBundle\Model\Request\Ship\ShipCreateRequest;
use CoreBundle\Model\Request\Shot\ShotCreateRequest;

/**
 * Trait BattleFieldDefaultValuesTrait;
 */
trait BattleFieldDefaultValuesTrait
{
    /**
     * @return User
     */
    public function getDefaultUser(): User
    {
        //TODO some default value
    }

    /**
     * @return Battle
     */
    public function getDefaultBattle(): Battle
    {
        //TODO some default value
    }

    /**
     * @return ShipCreateRequest[]
     */
    public function getDefaultShips(): array
    {
        //TODO some default value
    }

    /**
     * @return ShotCreateRequest[]
     */
    public function getDefaultShots(): array
    {
        //TODO some default value
    }
}
