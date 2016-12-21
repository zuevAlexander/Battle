<?php

namespace CoreBundle\Model\Request\CountShips;

use CoreBundle\Entity\CountShips;

/**
 * Trait CountShipsSingleRequestTrait;
 */
trait CountShipsSingleRequestTrait
{
    /**
     * @var CountShips
     */
    protected $countShips;

    /**
     * {@inheritdoc}
     */
    public function __construct()
    {
        $this->countShips = new CountShips();
    }

    /**
     * @return CountShips
     */
    public function getCountShips(): CountShips
    {
        return $this->countShips;
    }

    /**
     * @param CountShips $countShips
     */
    public function setCountShips(CountShips $countShips)
    {
        $this->countShips = $countShips;
    }
}
