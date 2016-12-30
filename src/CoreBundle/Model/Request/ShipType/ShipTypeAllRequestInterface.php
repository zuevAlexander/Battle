<?php

namespace CoreBundle\Model\Request\ShipType;


/**
 * Interface ShipTypeAllRequestInterface
 *
 * @method bool hasTypeName()
 */
interface ShipTypeAllRequestInterface
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
    public function getDeckCount(): int;

    /**
     * @param int $deckCount
     */
    public function setDeckCount(int $deckCount);
}
