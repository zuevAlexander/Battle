<?php

namespace CoreBundle\Model\Request\ShipType;

use CoreBundle\Entity\ShipType;

/**
 * Interface ShipTypeSingleRequestInterface
 * * @method bool hasShipType()
 */
interface ShipTypeSingleRequestInterface
{
    /**
     * @return ShipType
     */
    public function getShipType(): ShipType;

    /**
     * @param ShipType $shipType
     */
    public function setShipType(ShipType $shipType);
}
