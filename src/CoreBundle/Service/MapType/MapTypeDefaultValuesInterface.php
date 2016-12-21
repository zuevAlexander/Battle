<?php

namespace CoreBundle\Service\MapType;


/**
 * Interface MapTypeDefaultValuesInterface
 */
interface MapTypeDefaultValuesInterface
{
    

    /**
     * @return string
     */
    public function getDefaultTypeName(): string;

    /**
     * @return int
     */
    public function getDefaultSize(): int;
}
