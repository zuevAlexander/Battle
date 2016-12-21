<?php

namespace CoreBundle\Model\Request\ShipType;

use NorseDigital\Symfony\RestBundle\Request\AbstractRequest;

/**
 * Class ShipTypeUpdateRequest
 *
 * @method bool hasShipType()
 * @method bool hasTypeName()
 */
class ShipTypeUpdateRequest extends AbstractRequest implements ShipTypeSingleRequestInterface, ShipTypeAllRequestInterface
{
    use ShipTypeSingleRequestTrait {
        ShipTypeSingleRequestTrait::__construct as private constructTraitShipTypeSingleType;
    }
    use ShipTypeAllRequestTrait {
        ShipTypeAllRequestTrait::__construct as private constructTraitShipTypeAllType;
    }

    public function __construct()
    {
        $this->constructTraitShipTypeSingleType();
        $this->constructTraitShipTypeAllType();
    }
}
