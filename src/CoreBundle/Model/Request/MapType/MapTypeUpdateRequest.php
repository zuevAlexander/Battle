<?php

namespace CoreBundle\Model\Request\MapType;

use NorseDigital\Symfony\RestBundle\Request\AbstractRequest;

/**
 * Class MapTypeUpdateRequest
 *
 * @method bool hasMapType()
 * @method bool hasTypeName()
 * @method bool hasSize()
 */
class MapTypeUpdateRequest extends AbstractRequest implements MapTypeSingleRequestInterface, MapTypeAllRequestInterface
{
    use MapTypeSingleRequestTrait {
        MapTypeSingleRequestTrait::__construct as private constructTraitMapTypeSingleType;
    }
    use MapTypeAllRequestTrait {
        MapTypeAllRequestTrait::__construct as private constructTraitMapTypeAllType;
    }

    public function __construct()
    {
        $this->constructTraitMapTypeSingleType();
        $this->constructTraitMapTypeAllType();
    }
}
