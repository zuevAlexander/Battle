<?php

namespace CoreBundle\Model\Request\ShotStatus;

use CoreBundle\Entity\ShotStatus;

/**
 * Interface ShotStatusSingleRequestInterface
 * * @method bool hasShotStatus()
 */
interface ShotStatusSingleRequestInterface
{
    /**
     * @return ShotStatus
     */
    public function getShotStatus(): ShotStatus;

    /**
     * @param ShotStatus $shotStatus
     */
    public function setShotStatus(ShotStatus $shotStatus);
}
