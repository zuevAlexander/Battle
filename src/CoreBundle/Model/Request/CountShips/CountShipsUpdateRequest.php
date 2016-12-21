<?php

namespace CoreBundle\Model\Request\CountShips;

use NorseDigital\Symfony\RestBundle\Request\AbstractRequest;

/**
 * Class CountShipsUpdateRequest
 *
 * @method bool hasCountShips()
 * @method bool hasShipType()
 * @method bool hasMapType()
 * @method bool hasCount()
 */
class CountShipsUpdateRequest extends AbstractRequest implements CountShipsSingleRequestInterface, CountShipsAllRequestInterface
{
    use CountShipsSingleRequestTrait {
        CountShipsSingleRequestTrait::__construct as private constructTraitCountShipsSingleType;
    }
    use CountShipsAllRequestTrait {
        CountShipsAllRequestTrait::__construct as private constructTraitCountShipsAllType;
    }

    public function __construct()
    {
        $this->constructTraitCountShipsSingleType();
        $this->constructTraitCountShipsAllType();
    }
}
