<?php

namespace CoreBundle\Model\Request\MapType;


/**
 * Interface MapTypeAllRequestInterface
 *
 * @method bool hasTypeName()
 * @method bool hasSize()
 */
interface MapTypeAllRequestInterface
{
    

    /**
     * @return string
     */
    public function getTypeName(): string;

    /**
     * @param string $typeName
     */
    public function setTypeName(string $typeName);

    /**
     * @return int
     */
    public function getSize(): int;

    /**
     * @param int $size
     */
    public function setSize(int $size);
}
