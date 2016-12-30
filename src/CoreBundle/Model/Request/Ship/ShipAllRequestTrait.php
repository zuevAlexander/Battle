<?php

namespace CoreBundle\Model\Request\Ship;

use CoreBundle\Entity\ShipType;
use CoreBundle\Entity\BattleField;
use CoreBundle\Model\Request\ShipLocation\ShipLocationCreateRequest;

/**
 * Trait ShipAllRequestTrait;
 */
trait ShipAllRequestTrait
{
    /**
     * @var ShipType
     */
    protected $shipType;

    /**
     * @var BattleField
     */
    protected $battleField;

    /**
     * @var ShipLocationCreateRequest[]
     */
    protected $location;

    public function __construct()
    {
    }

    /**
     * @return ShipType
     */
    public function getShipType(): ShipType
    {
        return $this->shipType;
    }

    /**
     * @param ShipType $shipType
     */
    public function setShipType(ShipType $shipType)
    {
        $this->shipType = $shipType;
    }

    /**
     * @return BattleField
     */
    public function getBattleField(): BattleField
    {
        return $this->battleField;
    }

    /**
     * @param BattleField $battleField
     */
    public function setBattleField(BattleField $battleField)
    {
        $this->battleField = $battleField;
    }

    /**
     * @return ShipLocationCreateRequest[]
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * @param ShipLocationCreateRequest[] $location
     */
    public function setLocation(array $location)
    {
        $this->location = $location;
    }
}
