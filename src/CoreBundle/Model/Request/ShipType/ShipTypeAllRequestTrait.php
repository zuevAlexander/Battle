<?php

namespace CoreBundle\Model\Request\ShipType;


/**
 * Trait ShipTypeAllRequestTrait;
 */
trait ShipTypeAllRequestTrait
{
    

    /**
     * @var string
     */
    protected $typeName;

    public function __construct()
    {
    }

    /**
     * @return string
     */
    public function getTypeName(): string
    {
        return $this->typeName;
    }

    /**
     * @param string $typeName
     */
    public function setTypeName(string $typeName)
    {
        $this->typeName = $typeName;
    }
}
