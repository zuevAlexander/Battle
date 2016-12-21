<?php

namespace CoreBundle\Service\Ship;

use CoreBundle\Entity\ShipType;
use CoreBundle\Entity\BattleField;
use CoreBundle\Model\Request\ShipLocation\ShipLocationCreateRequest;

/**
 * Interface ShipDefaultValuesInterface
 */
interface ShipDefaultValuesInterface
{
    /**
     * @return ShipType
     */
    public function getDefaultShipType(): ShipType;

    /**
     * @return BattleField
     */
    public function getDefaultBattleField(): BattleField;

    /**
     * @return ShipLocationCreateRequest[]
     */
    public function getDefaultLocation(): array;
}
