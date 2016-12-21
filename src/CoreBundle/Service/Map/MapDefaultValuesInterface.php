<?php

namespace CoreBundle\Service\Map;


/**
 * Interface MapDefaultValuesInterface
 */
interface MapDefaultValuesInterface
{
    

    /**
     * @return int
     */
    public function getDefaultLatitude(): int;

    /**
     * @return int
     */
    public function getDefaultLongitude(): int;
}
