<?php

namespace CoreBundle\Model\Request\Map;

use CoreBundle\Entity\Map;

/**
 * Interface MapSingleRequestInterface
 * * @method bool hasMap()
 */
interface MapSingleRequestInterface
{
    /**
     * @return Map
     */
    public function getMap(): Map;

    /**
     * @param Map $map
     */
    public function setMap(Map $map);
}
