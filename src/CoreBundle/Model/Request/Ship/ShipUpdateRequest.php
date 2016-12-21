<?php

namespace CoreBundle\Model\Request\Ship;

use NorseDigital\Symfony\RestBundle\Request\AbstractRequest;

/**
 * Class ShipUpdateRequest
 *
 * @method bool hasShip()
 * @method bool hasShipType()
 * @method bool hasBattleField()
 * @method bool hasLocation()
 */
class ShipUpdateRequest extends AbstractRequest implements ShipSingleRequestInterface, ShipAllRequestInterface
{
    use ShipSingleRequestTrait {
        ShipSingleRequestTrait::__construct as private constructTraitShipSingleType;
    }
    use ShipAllRequestTrait {
        ShipAllRequestTrait::__construct as private constructTraitShipAllType;
    }

    public function __construct()
    {
        $this->constructTraitShipSingleType();
        $this->constructTraitShipAllType();
    }
}
