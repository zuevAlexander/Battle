<?php

namespace CoreBundle\Model\Request\BattleField;

use NorseDigital\Symfony\RestBundle\Request\AbstractRequest;

/**
 * Class BattleFieldCreateRequest
 *
 * @method bool hasUser()
 * @method bool hasBattle()
 * @method bool hasShips()
 * @method bool hasShots()
 */
class BattleFieldCreateRequest extends AbstractRequest implements BattleFieldAllRequestInterface
{
    use BattleFieldAllRequestTrait;
}
