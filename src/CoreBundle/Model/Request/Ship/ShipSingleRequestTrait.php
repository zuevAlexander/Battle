<?php

namespace CoreBundle\Model\Request\Ship;

use CoreBundle\Entity\Ship;

/**
 * Trait ShipSingleRequestTrait;
 */
trait ShipSingleRequestTrait
{
    /**
     * @var Ship
     */
    protected $ship;

    /**
     * {@inheritdoc}
     */
    public function __construct()
    {
        $this->ship = new Ship();
    }

    /**
     * @return Ship
     */
    public function getShip(): Ship
    {
        return $this->ship;
    }

    /**
     * @param Ship $ship
     */
    public function setShip(Ship $ship)
    {
        $this->ship = $ship;
    }
}
