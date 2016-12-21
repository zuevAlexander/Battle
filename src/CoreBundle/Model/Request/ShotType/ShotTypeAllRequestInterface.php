<?php

namespace CoreBundle\Model\Request\ShotType;


/**
 * Interface ShotTypeAllRequestInterface
 *
 * @method bool hasTypeName()
 */
interface ShotTypeAllRequestInterface
{
    

    /**
     * @return string
     */
    public function getTypeName(): string;

    /**
     * @param string $typeName
     */
    public function setTypeName(string $typeName);
}
