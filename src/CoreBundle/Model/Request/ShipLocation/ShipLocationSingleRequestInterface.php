<?php

namespace CoreBundle\Model\Request\ShipLocation;

use CoreBundle\Entity\ShipLocation;

/**
 * Interface ShipLocationSingleRequestInterface
 * * @method bool hasShipLocation()
 */
interface ShipLocationSingleRequestInterface
{
    /**
     * @return ShipLocation
     */
    public function getShipLocation(): ShipLocation;

    /**
     * @param ShipLocation $shipLocation
     */
    public function setShipLocation(ShipLocation $shipLocation);
}
