<?php

namespace CoreBundle\Model\Request\ShipType;

use CoreBundle\Entity\ShipType;

/**
 * Trait ShipTypeSingleRequestTrait;
 */
trait ShipTypeSingleRequestTrait
{
    /**
     * @var ShipType
     */
    protected $shipType;

    /**
     * {@inheritdoc}
     */
    public function __construct()
    {
        $this->shipType = new ShipType();
    }

    /**
     * @return ShipType
     */
    public function getShipType(): ShipType
    {
        return $this->shipType;
    }

    /**
     * @param ShipType $shipType
     */
    public function setShipType(ShipType $shipType)
    {
        $this->shipType = $shipType;
    }
}
