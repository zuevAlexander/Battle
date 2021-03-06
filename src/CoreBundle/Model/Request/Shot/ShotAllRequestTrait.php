<?php

namespace CoreBundle\Model\Request\Shot;

use CoreBundle\Entity\Map;
use CoreBundle\Entity\ShotStatus;
use CoreBundle\Entity\BattleField;

/**
 * Trait ShotAllRequestTrait;
 */
trait ShotAllRequestTrait
{
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
     * @return Map
     */
    public function getMap()
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
    public function getBattleField()
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
