<?php

namespace CoreBundle\Model\Request\Shot;

use CoreBundle\Entity\Shot;

/**
 * Trait ShotSingleRequestTrait;
 */
trait ShotSingleRequestTrait
{
    /**
     * @var Shot
     */
    protected $shot;

    /**
     * {@inheritdoc}
     */
    public function __construct()
    {
        $this->shot = new Shot();
    }

    /**
     * @return Shot
     */
    public function getShot(): Shot
    {
        return $this->shot;
    }

    /**
     * @param Shot $shot
     */
    public function setShot(Shot $shot)
    {
        $this->shot = $shot;
    }
}
