<?php

namespace CoreBundle\Model\Request\Map;


/**
 * Trait MapAllRequestTrait;
 */
trait MapAllRequestTrait
{
    

    /**
     * @var integer
     */
    protected $latitude;

    /**
     * @var integer
     */
    protected $longitude;

    public function __construct()
    {
    }

    /**
     * @return int
     */
    public function getLatitude(): int
    {
        return $this->latitude;
    }

    /**
     * @param int $latitude
     */
    public function setLatitude(int $latitude)
    {
        $this->latitude = $latitude;
    }

    /**
     * @return int
     */
    public function getLongitude(): int
    {
        return $this->longitude;
    }

    /**
     * @param int $longitude
     */
    public function setLongitude(int $longitude)
    {
        $this->longitude = $longitude;
    }
}
