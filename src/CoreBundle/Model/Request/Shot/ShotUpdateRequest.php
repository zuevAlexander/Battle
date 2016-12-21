<?php

namespace CoreBundle\Model\Request\Shot;

use NorseDigital\Symfony\RestBundle\Request\AbstractRequest;

/**
 * Class ShotUpdateRequest
 *
 * @method bool hasShot()
 * @method bool hasUser()
 * @method bool hasMap()
 * @method bool hasShotStatus()
 * @method bool hasBattleField()
 */
class ShotUpdateRequest extends AbstractRequest implements ShotSingleRequestInterface, ShotAllRequestInterface
{
    use ShotSingleRequestTrait {
        ShotSingleRequestTrait::__construct as private constructTraitShotSingleType;
    }
    use ShotAllRequestTrait {
        ShotAllRequestTrait::__construct as private constructTraitShotAllType;
    }

    public function __construct()
    {
        $this->constructTraitShotSingleType();
        $this->constructTraitShotAllType();
    }
}
