<?php

namespace CoreBundle\Model\Request\BattleStatus;

use NorseDigital\Symfony\RestBundle\Request\AbstractRequest;

/**
 * Class BattleStatusReadRequest
 *
 * @method bool hasBattleStatus()
 */
class BattleStatusReadRequest extends AbstractRequest implements BattleStatusSingleRequestInterface
{
    use BattleStatusSingleRequestTrait;
}
