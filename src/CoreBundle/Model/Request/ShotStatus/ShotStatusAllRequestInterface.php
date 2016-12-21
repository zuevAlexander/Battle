<?php

namespace CoreBundle\Model\Request\ShotStatus;


/**
 * Interface ShotStatusAllRequestInterface
 *
 * @method bool hasStatusName()
 */
interface ShotStatusAllRequestInterface
{
    

    /**
     * @return string
     */
    public function getStatusName(): string;

    /**
     * @param string $statusName
     */
    public function setStatusName(string $statusName);
}
