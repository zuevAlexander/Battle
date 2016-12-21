<?php

namespace CoreBundle\Model\Request\BattleStatus;

use NorseDigital\Symfony\RestBundle\Request\AbstractRequest;

/**
 * Class BattleStatusUpdateRequest
 *
 * @method bool hasBattleStatus()
 * @method bool hasStatusName()
 */
class BattleStatusUpdateRequest extends AbstractRequest implements BattleStatusSingleRequestInterface, BattleStatusAllRequestInterface
{
    use BattleStatusSingleRequestTrait {
        BattleStatusSingleRequestTrait::__construct as private constructTraitBattleStatusSingleType;
    }
    use BattleStatusAllRequestTrait {
        BattleStatusAllRequestTrait::__construct as private constructTraitBattleStatusAllType;
    }

    public function __construct()
    {
        $this->constructTraitBattleStatusSingleType();
        $this->constructTraitBattleStatusAllType();
    }
}
