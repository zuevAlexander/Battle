<?php

namespace CoreBundle\Model\Request\ShipLocation;

use CoreBundle\Entity\ShipLocation;

/**
 * Trait ShipLocationSingleRequestTrait;
 */
trait ShipLocationSingleRequestTrait
{
    /**
     * @var ShipLocation
     */
    protected $shipLocation;

    /**
     * {@inheritdoc}
     */
    public function __construct()
    {
        $this->shipLocation = new ShipLocation();
    }

    /**
     * @return ShipLocation
     */
    public function getShipLocation(): ShipLocation
    {
        return $this->shipLocation;
    }

    /**
     * @param ShipLocation $shipLocation
     */
    public function setShipLocation(ShipLocation $shipLocation)
    {
        $this->shipLocation = $shipLocation;
    }
}
