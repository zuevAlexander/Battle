<?php

namespace CoreBundle\Model\Request\BattleStatus;

use NorseDigital\Symfony\RestBundle\Request\AbstractRequest;

/**
 * Class BattleStatusDeleteRequest
 *
 * @method bool hasBattleStatus()
 */
class BattleStatusDeleteRequest extends AbstractRequest implements BattleStatusSingleRequestInterface
{
    use BattleStatusSingleRequestTrait;
}
