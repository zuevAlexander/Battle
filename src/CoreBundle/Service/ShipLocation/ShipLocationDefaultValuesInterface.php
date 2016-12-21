<?php

namespace CoreBundle\Service\ShipLocation;

use CoreBundle\Entity\Ship;
use CoreBundle\Entity\Map;

/**
 * Interface ShipLocationDefaultValuesInterface
 */
interface ShipLocationDefaultValuesInterface
{
    /**
     * @return Ship
     */
    public function getDefaultShip(): Ship;

    /**
     * @return Map
     */
    public function getDefaultMap(): Map;
}
