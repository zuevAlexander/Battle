<?php

namespace CoreBundle\Service\CountShips;

use CoreBundle\Entity\ShipType;
use CoreBundle\Entity\MapType;

/**
 * Interface CountShipsDefaultValuesInterface
 */
interface CountShipsDefaultValuesInterface
{
    /**
     * @return ShipType
     */
    public function getDefaultShipType(): ShipType;

    /**
     * @return MapType
     */
    public function getDefaultMapType(): MapType;

    /**
     * @return int
     */
    public function getDefaultCount(): int;
}
