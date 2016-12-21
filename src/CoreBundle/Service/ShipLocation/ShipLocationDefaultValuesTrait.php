<?php

namespace CoreBundle\Service\ShipLocation;

use CoreBundle\Entity\Ship;
use CoreBundle\Entity\Map;

/**
 * Trait ShipLocationDefaultValuesTrait;
 */
trait ShipLocationDefaultValuesTrait
{
    /**
     * @return Ship
     */
    public function getDefaultShip(): Ship
    {
        //TODO some default value
    }

    /**
     * @return Map
     */
    public function getDefaultMap(): Map
    {
        //TODO some default value
    }
}
