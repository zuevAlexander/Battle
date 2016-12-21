<?php

namespace CoreBundle\Model\Request\Shot;

use CoreBundle\Entity\User;
use CoreBundle\Entity\Map;
use CoreBundle\Entity\ShotStatus;
use CoreBundle\Entity\BattleField;

/**
 * Trait ShotAllRequestTrait;
 */
trait ShotAllRequestTrait
{
    /**
     * @var User
     */
    protected $user;

    /**
     * @var Map
     */
    protected $map;

    /**
     * @var ShotStatus
     */
    protected $shotStatus;

    /**
     * @var BattleField
     */
    protected $battleField;

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
     * @return Map
     */
    public function getMap(): Map
    {
        return $this->map;
    }

    /**
     * @param Map $map
     */
    public function setMap(Map $map)
    {
        $this->map = $map;
    }

    /**
     * @return ShotStatus
     */
    public function getShotStatus(): ShotStatus
    {
        return $this->shotStatus;
    }

    /**
     * @param ShotStatus $shotStatus
     */
    public function setShotStatus(ShotStatus $shotStatus)
    {
        $this->shotStatus = $shotStatus;
    }

    /**
     * @return BattleField
     */
    public function getBattleField(): BattleField
    {
        return $this->battleField;
    }

    /**
     * @param BattleField $battleField
     */
    public function setBattleField(BattleField $battleField)
    {
        $this->battleField = $battleField;
    }
}
