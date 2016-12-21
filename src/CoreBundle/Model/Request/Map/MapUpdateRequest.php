<?php

namespace CoreBundle\Model\Request\Map;

use NorseDigital\Symfony\RestBundle\Request\AbstractRequest;

/**
 * Class MapUpdateRequest
 *
 * @method bool hasMap()
 * @method bool hasLatitude()
 * @method bool hasLongitude()
 */
class MapUpdateRequest extends AbstractRequest implements MapSingleRequestInterface, MapAllRequestInterface
{
    use MapSingleRequestTrait {
        MapSingleRequestTrait::__construct as private constructTraitMapSingleType;
    }
    use MapAllRequestTrait {
        MapAllRequestTrait::__construct as private constructTraitMapAllType;
    }

    public function __construct()
    {
        $this->constructTraitMapSingleType();
        $this->constructTraitMapAllType();
    }
}
