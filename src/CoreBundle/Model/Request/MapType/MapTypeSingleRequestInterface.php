<?php

namespace CoreBundle\Model\Request\MapType;

use CoreBundle\Entity\MapType;

/**
 * Interface MapTypeSingleRequestInterface
 * * @method bool hasMapType()
 */
interface MapTypeSingleRequestInterface
{
    /**
     * @return MapType
     */
    public function getMapType(): MapType;

    /**
     * @param MapType $mapType
     */
    public function setMapType(MapType $mapType);
}
