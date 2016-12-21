<?php

namespace CoreBundle\Model\Request\Map;

use CoreBundle\Entity\Map;

/**
 * Trait MapSingleRequestTrait;
 */
trait MapSingleRequestTrait
{
    /**
     * @var Map
     */
    protected $map;

    /**
     * {@inheritdoc}
     */
    public function __construct()
    {
        $this->map = new Map();
    }

    /**
     * @return Map
     */
    public function getMap(): Map
    {
        return $this->map;
    }

    /**
     * @param Map $map
     */
    public function setMap(Map $map)
    {
        $this->map = $map;
    }
}
