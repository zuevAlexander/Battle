<?php

namespace CoreBundle\Model\Request\ShipLocation;

use CoreBundle\Entity\Ship;
use CoreBundle\Entity\Map;

/**
 * Trait ShipLocationAllRequestTrait;
 */
trait ShipLocationAllRequestTrait
{
    /**
     * @var Ship
     */
    protected $ship;

    /**
     * @var Map
     */
    protected $map;

    public function __construct()
    {
    }

    /**
     * @return Ship
     */
    public function getShip(): Ship
    {
        return $this->ship;
    }

    /**
     * @param Ship $ship
     */
    public function setShip(Ship $ship)
    {
        $this->ship = $ship;
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
}
