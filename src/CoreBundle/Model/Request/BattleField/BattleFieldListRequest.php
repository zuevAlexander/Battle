<?php

namespace CoreBundle\Model\Request\BattleField;

use NorseDigital\Symfony\RestBundle\Request\ListRequestInterface;
use NorseDigital\Symfony\RestBundle\Request\ListRequestTrait;
use NorseDigital\Symfony\RestBundle\Request\AbstractRequest;

/**
 * Class BattleFieldListRequest
 */
class BattleFieldListRequest extends AbstractRequest implements ListRequestInterface
{
    use ListRequestTrait;
}
