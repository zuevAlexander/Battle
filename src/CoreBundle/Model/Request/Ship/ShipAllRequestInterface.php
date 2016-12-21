<?php

namespace CoreBundle\Model\Request\Ship;

use CoreBundle\Entity\ShipType;
use CoreBundle\Entity\BattleField;
use CoreBundle\Model\Request\ShipLocation\ShipLocationCreateRequest;

/**
 * Interface ShipAllRequestInterface
 *
 * @method bool hasShipType()
 * @method bool hasBattleField()
 * @method bool hasLocation()
 */
interface ShipAllRequestInterface
{
    /**
     * @return ShipType
     */
    public function getShipType(): ShipType;

    /**
     * @param ShipType $shipType
     */
    public function setShipType(ShipType $shipType);

    /**
     * @return BattleField
     */
    public function getBattleField(): BattleField;

    /**
     * @param BattleField $battleField
     */
    public function setBattleField(BattleField $battleField);

    /**
     * @return ShipLocationCreateRequest[]
     */
    public function getLocation(): array;

    /**
     * @param ShipLocationCreateRequest[] $location
     */
    public function setLocation(array $location);
}
