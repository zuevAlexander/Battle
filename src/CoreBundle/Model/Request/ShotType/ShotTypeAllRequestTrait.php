<?php

namespace CoreBundle\Model\Request\ShotType;


/**
 * Trait ShotTypeAllRequestTrait;
 */
trait ShotTypeAllRequestTrait
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
