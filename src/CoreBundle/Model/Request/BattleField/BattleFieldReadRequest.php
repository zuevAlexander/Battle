<?php

namespace CoreBundle\Model\Request\BattleField;

use NorseDigital\Symfony\RestBundle\Request\AbstractRequest;

/**
 * Class BattleFieldReadRequest
 *
 * @method bool hasBattleField()
 */
class BattleFieldReadRequest extends AbstractRequest implements BattleFieldSingleRequestInterface
{
    use BattleFieldSingleRequestTrait;
}
