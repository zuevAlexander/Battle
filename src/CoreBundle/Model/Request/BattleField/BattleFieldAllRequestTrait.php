<?php

namespace CoreBundle\Model\Request\BattleField;

use CoreBundle\Entity\User;
use CoreBundle\Entity\Battle;
use CoreBundle\Model\Request\Ship\ShipCreateRequest;
use CoreBundle\Model\Request\Shot\ShotCreateRequest;

/**
 * Trait BattleFieldAllRequestTrait;
 */
trait BattleFieldAllRequestTrait
{
    /**
     * @var User
     */
    protected $user;

    /**
     * @var Battle
     */
    protected $battle;

    /**
     * @var ShipCreateRequest[]
     */
    protected $ships;

    /**
     * @var ShotCreateRequest[]
     */
    protected $shots;

    public function __construct()
    {
    }

    /**
     * @return User
     */
    public function getUser(): User
    {
        return $this->user;
    }

    /**
     * @param User $user
     */
    public function setUser(User $user)
    {
        $this->user = $user;
    }

    /**
     * @return Battle
     */
    public function getBattle(): Battle
    {
        return $this->battle;
    }

    /**
     * @param Battle $battle
     */
    public function setBattle(Battle $battle)
    {
        $this->battle = $battle;
    }

    /**
     * @return ShipCreateRequest[]
     */
    public function getShips(): array
    {
        return $this->ships;
    }

    /**
     * @param ShipCreateRequest[] $ships
     */
    public function setShips(array $ships)
    {
        $this->ships = $ships;
    }

    /**
     * @return ShotCreateRequest[]
     */
    public function getShots(): array
    {
        return $this->shots;
    }

    /**
     * @param ShotCreateRequest[] $shots
     */
    public function setShots(array $shots)
    {
        $this->shots = $shots;
    }
}
