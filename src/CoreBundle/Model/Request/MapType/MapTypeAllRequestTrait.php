<?php

namespace CoreBundle\Model\Request\MapType;


/**
 * Trait MapTypeAllRequestTrait;
 */
trait MapTypeAllRequestTrait
{
    

    /**
     * @var string
     */
    protected $typeName;

    /**
     * @var integer
     */
    protected $size;

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

    /**
     * @return int
     */
    public function getSize(): int
    {
        return $this->size;
    }

    /**
     * @param int $size
     */
    public function setSize(int $size)
    {
        $this->size = $size;
    }
}
