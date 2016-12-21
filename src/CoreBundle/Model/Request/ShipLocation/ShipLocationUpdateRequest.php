<?php

namespace CoreBundle\Model\Request\ShipLocation;

use NorseDigital\Symfony\RestBundle\Request\AbstractRequest;

/**
 * Class ShipLocationUpdateRequest
 *
 * @method bool hasShipLocation()
 * @method bool hasShip()
 * @method bool hasMap()
 */
class ShipLocationUpdateRequest extends AbstractRequest implements ShipLocationSingleRequestInterface, ShipLocationAllRequestInterface
{
    use ShipLocationSingleRequestTrait {
        ShipLocationSingleRequestTrait::__construct as private constructTraitShipLocationSingleType;
    }
    use ShipLocationAllRequestTrait {
        ShipLocationAllRequestTrait::__construct as private constructTraitShipLocationAllType;
    }

    public function __construct()
    {
        $this->constructTraitShipLocationSingleType();
        $this->constructTraitShipLocationAllType();
    }
}
