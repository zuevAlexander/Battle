<?php

namespace CoreBundle\Model\Request\Ship;

use CoreBundle\Entity\Ship;

/**
 * Interface ShipSingleRequestInterface
 * * @method bool hasShip()
 */
interface ShipSingleRequestInterface
{
    /**
     * @return Ship
     */
    public function getShip(): Ship;

    /**
     * @param Ship $ship
     */
    public function setShip(Ship $ship);
}
