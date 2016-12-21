<?php

namespace CoreBundle\Model\Request\Battle;

use NorseDigital\Symfony\RestBundle\Request\AbstractRequest;

/**
 * Class BattleUpdateRequest
 *
 * @method bool hasBattle()
 * @method bool hasBattleStatus()
 * @method bool hasMapType()
 * @method bool hasName()
 */
class BattleUpdateRequest extends AbstractRequest implements BattleSingleRequestInterface, BattleAllRequestInterface
{
    use BattleSingleRequestTrait {
        BattleSingleRequestTrait::__construct as private constructTraitBattleSingleType;
    }
    use BattleAllRequestTrait {
        BattleAllRequestTrait::__construct as private constructTraitBattleAllType;
    }

    public function __construct()
    {
        $this->constructTraitBattleSingleType();
        $this->constructTraitBattleAllType();
    }
}
