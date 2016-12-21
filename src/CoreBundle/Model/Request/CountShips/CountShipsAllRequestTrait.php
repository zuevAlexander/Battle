<?php

namespace CoreBundle\Model\Request\CountShips;

use CoreBundle\Entity\ShipType;
use CoreBundle\Entity\MapType;

/**
 * Trait CountShipsAllRequestTrait;
 */
trait CountShipsAllRequestTrait
{
    /**
     * @var ShipType
     */
    protected $shipType;

    /**
     * @var MapType
     */
    protected $mapType;

    /**
     * @var integer
     */
    protected $count;

    public function __construct()
    {
    }

    /**
     * @return ShipType
     */
    public function getShipType(): ShipType
    {
        return $this->shipType;
    }

    /**
     * @param ShipType $shipType
     */
    public function setShipType(ShipType $shipType)
    {
        $this->shipType = $shipType;
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
     * @return int
     */
    public function getCount(): int
    {
        return $this->count;
    }

    /**
     * @param int $count
     */
    public function setCount(int $count)
    {
        $this->count = $count;
    }
}
