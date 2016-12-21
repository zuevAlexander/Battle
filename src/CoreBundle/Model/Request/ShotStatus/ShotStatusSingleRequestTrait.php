<?php

namespace CoreBundle\Model\Request\ShotStatus;

use CoreBundle\Entity\ShotStatus;

/**
 * Trait ShotStatusSingleRequestTrait;
 */
trait ShotStatusSingleRequestTrait
{
    /**
     * @var ShotStatus
     */
    protected $shotStatus;

    /**
     * {@inheritdoc}
     */
    public function __construct()
    {
        $this->shotStatus = new ShotStatus();
    }

    /**
     * @return ShotStatus
     */
    public function getShotStatus(): ShotStatus
    {
        return $this->shotStatus;
    }

    /**
     * @param ShotStatus $shotStatus
     */
    public function setShotStatus(ShotStatus $shotStatus)
    {
        $this->shotStatus = $shotStatus;
    }
}
