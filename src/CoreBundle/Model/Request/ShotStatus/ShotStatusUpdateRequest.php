<?php

namespace CoreBundle\Model\Request\ShotStatus;

use NorseDigital\Symfony\RestBundle\Request\AbstractRequest;

/**
 * Class ShotStatusUpdateRequest
 *
 * @method bool hasShotStatus()
 * @method bool hasStatusName()
 */
class ShotStatusUpdateRequest extends AbstractRequest implements ShotStatusSingleRequestInterface, ShotStatusAllRequestInterface
{
    use ShotStatusSingleRequestTrait {
        ShotStatusSingleRequestTrait::__construct as private constructTraitShotStatusSingleType;
    }
    use ShotStatusAllRequestTrait {
        ShotStatusAllRequestTrait::__construct as private constructTraitShotStatusAllType;
    }

    public function __construct()
    {
        $this->constructTraitShotStatusSingleType();
        $this->constructTraitShotStatusAllType();
    }
}
