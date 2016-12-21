<?php

namespace CoreBundle\Model\Request\Battle;

use CoreBundle\Entity\BattleStatus;
use CoreBundle\Entity\MapType;

/**
 * Trait BattleAllRequestTrait;
 */
trait BattleAllRequestTrait
{
    /**
     * @var BattleStatus
     */
    protected $battleStatus;

    /**
     * @var MapType
     */
    protected $mapType;

    /**
     * @var string
     */
    protected $name;

    public function __construct()
    {
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

    /**
     * @return MapType
     */
    public function getMapType(): MapType
    {
        return $this->mapType;
    }

    /**
     * @param MapType $mapType
     */
    public function setMapType(MapType $mapType)
    {
        $this->mapType = $mapType;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name)
    {
        $this->name = $name;
    }
}
