<?php

namespace CoreBundle\Model\Request\BattleField;

use NorseDigital\Symfony\RestBundle\Request\AbstractRequest;

/**
 * Class BattleFieldDeleteRequest
 *
 * @method bool hasBattleField()
 */
class BattleFieldDeleteRequest extends AbstractRequest implements BattleFieldSingleRequestInterface
{
    use BattleFieldSingleRequestTrait;
}
