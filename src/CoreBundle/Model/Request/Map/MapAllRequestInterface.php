<?php

namespace CoreBundle\Model\Request\Map;


/**
 * Interface MapAllRequestInterface
 *
 * @method bool hasLatitude()
 * @method bool hasLongitude()
 */
interface MapAllRequestInterface
{
    

    /**
     * @return int
     */
    public function getLatitude(): int;

    /**
     * @param int $latitude
     */
    public function setLatitude(int $latitude);

    /**
     * @return int
     */
    public function getLongitude(): int;

    /**
     * @param int $longitude
     */
    public function setLongitude(int $longitude);
}
