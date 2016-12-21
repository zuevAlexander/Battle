<?php

namespace CoreBundle\Model\Request\BattleStatus;

use NorseDigital\Symfony\RestBundle\Request\AbstractRequest;

/**
 * Class BattleStatusCreateRequest
 *
 * @method bool hasStatusName()
 */
class BattleStatusCreateRequest extends AbstractRequest implements BattleStatusAllRequestInterface
{
    use BattleStatusAllRequestTrait;
}
