<?php

namespace CoreBundle\Service\CountShips;

use CoreBundle\Entity\ShipType;
use CoreBundle\Entity\MapType;

/**
 * Trait CountShipsDefaultValuesTrait;
 */
trait CountShipsDefaultValuesTrait
{
    /**
     * @return ShipType
     */
    public function getDefaultShipType(): ShipType
    {
        //TODO some default value
    }

    /**
     * @return MapType
     */
    public function getDefaultMapType(): MapType
    {
        //TODO some default value
    }

    /**
     * @return int
     */
    public function getDefaultCount(): int
    {
        //TODO some default value
    }
}
