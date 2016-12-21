<?php

namespace CoreBundle\Model\Request\ShotType;

use NorseDigital\Symfony\RestBundle\Request\AbstractRequest;

/**
 * Class ShotTypeUpdateRequest
 *
 * @method bool hasShotType()
 * @method bool hasTypeName()
 */
class ShotTypeUpdateRequest extends AbstractRequest implements ShotTypeSingleRequestInterface, ShotTypeAllRequestInterface
{
    use ShotTypeSingleRequestTrait {
        ShotTypeSingleRequestTrait::__construct as private constructTraitShotTypeSingleType;
    }
    use ShotTypeAllRequestTrait {
        ShotTypeAllRequestTrait::__construct as private constructTraitShotTypeAllType;
    }

    public function __construct()
    {
        $this->constructTraitShotTypeSingleType();
        $this->constructTraitShotTypeAllType();
    }
}
