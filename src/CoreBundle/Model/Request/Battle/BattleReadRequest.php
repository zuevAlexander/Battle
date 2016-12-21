<?php

namespace CoreBundle\Model\Request\Battle;

use NorseDigital\Symfony\RestBundle\Request\AbstractRequest;

/**
 * Class BattleReadRequest
 *
 * @method bool hasBattle()
 */
class BattleReadRequest extends AbstractRequest implements BattleSingleRequestInterface
{
    use BattleSingleRequestTrait;
}
