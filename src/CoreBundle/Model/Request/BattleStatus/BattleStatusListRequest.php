<?php

namespace CoreBundle\Model\Request\BattleStatus;

use NorseDigital\Symfony\RestBundle\Request\ListRequestInterface;
use NorseDigital\Symfony\RestBundle\Request\ListRequestTrait;
use NorseDigital\Symfony\RestBundle\Request\AbstractRequest;

/**
 * Class BattleStatusListRequest
 */
class BattleStatusListRequest extends AbstractRequest implements ListRequestInterface
{
    use ListRequestTrait;
}
