<?php

namespace CoreBundle\Service\Ship;

use CoreBundle\Entity\ShipType;
use CoreBundle\Entity\BattleField;
use CoreBundle\Model\Request\ShipLocation\ShipLocationCreateRequest;

/**
 * Trait ShipDefaultValuesTrait;
 */
trait ShipDefaultValuesTrait
{
    /**
     * @return ShipType
     */
    public function getDefaultShipType(): ShipType
    {
        //TODO some default value
    }

    /**
     * @return BattleField
     */
    public function getDefaultBattleField(): BattleField
    {
        //TODO some default value
    }

    /**
     * @return ShipLocationCreateRequest[]
     */
    public function getDefaultLocation(): array
    {
        //TODO some default value
    }
}
