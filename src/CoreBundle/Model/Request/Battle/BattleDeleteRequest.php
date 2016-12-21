<?php

namespace CoreBundle\Model\Request\Battle;

use NorseDigital\Symfony\RestBundle\Request\AbstractRequest;

/**
 * Class BattleDeleteRequest
 *
 * @method bool hasBattle()
 */
class BattleDeleteRequest extends AbstractRequest implements BattleSingleRequestInterface
{
    use BattleSingleRequestTrait;
}
