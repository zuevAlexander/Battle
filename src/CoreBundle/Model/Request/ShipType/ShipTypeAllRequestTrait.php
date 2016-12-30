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

    /**
     * @var int
     */
    protected $deckCount;

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
    public function getDeckCount(): int
    {
        return $this->deckCount;
    }

    /**
     * @param int $deckCount
     */
    public function setDeckCount(int $deckCount)
    {
        $this->deckCount = $deckCount;
    }
}
