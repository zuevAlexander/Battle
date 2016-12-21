<?php

namespace CoreBundle\Model\Request\BattleField;

use CoreBundle\Entity\User;
use CoreBundle\Entity\Battle;
use CoreBundle\Model\Request\Ship\ShipCreateRequest;
use CoreBundle\Model\Request\Shot\ShotCreateRequest;

/**
 * Interface BattleFieldAllRequestInterface
 *
 * @method bool hasUser()
 * @method bool hasBattle()
 * @method bool hasShips()
 * @method bool hasShots()
 */
interface BattleFieldAllRequestInterface
{
    /**
     * @return User
     */
    public function getUser(): User;

    /**
     * @param User $user
     */
    public function setUser(User $user);

    /**
     * @return Battle
     */
    public function getBattle(): Battle;

    /**
     * @param Battle $battle
     */
    public function setBattle(Battle $battle);

    /**
     * @return ShipCreateRequest[]
     */
    public function getShips(): array;

    /**
     * @param ShipCreateRequest[] $ships
     */
    public function setShips(array $ships);

    /**
     * @return ShotCreateRequest[]
     */
    public function getShots(): array;

    /**
     * @param ShotCreateRequest[] $shots
     */
    public function setShots(array $shots);
}
