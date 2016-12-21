<?php

namespace CoreBundle\Model\Request\MapType;

use CoreBundle\Entity\MapType;

/**
 * Trait MapTypeSingleRequestTrait;
 */
trait MapTypeSingleRequestTrait
{
    /**
     * @var MapType
     */
    protected $mapType;

    /**
     * {@inheritdoc}
     */
    public function __construct()
    {
        $this->mapType = new MapType();
    }

    /**
     * @return MapType
     */
    public function getMapType(): MapType
    {
        return $this->mapType;
    }

    /**
     * @param MapType $mapType
     */
    public function setMapType(MapType $mapType)
    {
        $this->mapType = $mapType;
    }
}
