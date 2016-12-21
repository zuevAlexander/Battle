<?php

namespace CoreBundle\Model\Request\CountShips;

use CoreBundle\Entity\ShipType;
use CoreBundle\Entity\MapType;

/**
 * Interface CountShipsAllRequestInterface
 *
 * @method bool hasShipType()
 * @method bool hasMapType()
 * @method bool hasCount()
 */
interface CountShipsAllRequestInterface
{
    /**
     * @return ShipType
     */
    public function getShipType(): ShipType;

    /**
     * @param ShipType $shipType
     */
    public function setShipType(ShipType $shipType);

    /**
     * @return MapType
     */
    public function getMapType(): MapType;

    /**
     * @param MapType $mapType
     */
    public function setMapType(MapType $mapType);

    /**
     * @return int
     */
    public function getCount(): int;

    /**
     * @param int $count
     */
    public function setCount(int $count);
}
