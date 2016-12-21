<?php

namespace CoreBundle\Model\Request\Shot;

use CoreBundle\Entity\Shot;

/**
 * Interface ShotSingleRequestInterface
 * * @method bool hasShot()
 */
interface ShotSingleRequestInterface
{
    /**
     * @return Shot
     */
    public function getShot(): Shot;

    /**
     * @param Shot $shot
     */
    public function setShot(Shot $shot);
}
