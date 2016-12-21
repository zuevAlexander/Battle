<?php

namespace CoreBundle\Model\Request\BattleField;

use NorseDigital\Symfony\RestBundle\Request\AbstractRequest;

/**
 * Class BattleFieldUpdateRequest
 *
 * @method bool hasBattleField()
 * @method bool hasUser()
 * @method bool hasBattle()
 * @method bool hasShips()
 * @method bool hasShots()
 */
class BattleFieldUpdateRequest extends AbstractRequest implements BattleFieldSingleRequestInterface, BattleFieldAllRequestInterface
{
    use BattleFieldSingleRequestTrait {
        BattleFieldSingleRequestTrait::__construct as private constructTraitBattleFieldSingleType;
    }
    use BattleFieldAllRequestTrait {
        BattleFieldAllRequestTrait::__construct as private constructTraitBattleFieldAllType;
    }

    public function __construct()
    {
        $this->constructTraitBattleFieldSingleType();
        $this->constructTraitBattleFieldAllType();
    }
}
