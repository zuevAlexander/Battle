<?php

namespace CoreBundle\Service\ShipType;


/**
 * Interface ShipTypeDefaultValuesInterface
 */
interface ShipTypeDefaultValuesInterface
{
    

    /**
     * @return string
     */
    public function getDefaultTypeName(): string;

    /**
     * @return int
     */
    public function getDefaultDeckCount(): int;
}
