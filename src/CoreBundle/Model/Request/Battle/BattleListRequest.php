<?php

namespace CoreBundle\Model\Request\Battle;

use NorseDigital\Symfony\RestBundle\Request\ListRequestInterface;
use NorseDigital\Symfony\RestBundle\Request\ListRequestTrait;
use NorseDigital\Symfony\RestBundle\Request\AbstractRequest;

/**
 * Class BattleListRequest
 */
class BattleListRequest extends AbstractRequest implements ListRequestInterface
{
    use ListRequestTrait;
}
