<?php

namespace CoreBundle\Model\Request\ShipLocation;

use CoreBundle\Entity\Ship;
use CoreBundle\Entity\Map;

/**
 * Interface ShipLocationAllRequestInterface
 *
 * @method bool hasShip()
 * @method bool hasMap()
 */
interface ShipLocationAllRequestInterface
{
    /**
     * @return Ship
     */
    public function getShip(): Ship;

    /**
     * @param Ship $ship
     */
    public function setShip(Ship $ship);

    /**
     * @return Map
     */
    public function getMap(): Map;

    /**
     * @param Map $map
     */
    public function setMap(Map $map);
}
