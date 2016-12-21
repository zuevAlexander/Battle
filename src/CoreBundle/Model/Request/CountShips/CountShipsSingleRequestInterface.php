<?php

namespace CoreBundle\Model\Request\CountShips;

use CoreBundle\Entity\CountShips;

/**
 * Interface CountShipsSingleRequestInterface
 * * @method bool hasCountShips()
 */
interface CountShipsSingleRequestInterface
{
    /**
     * @return CountShips
     */
    public function getCountShips(): CountShips;

    /**
     * @param CountShips $countShips
     */
    public function setCountShips(CountShips $countShips);
}
