<?php

namespace CoreBundle\Model\Request\Battle;

use NorseDigital\Symfony\RestBundle\Request\AbstractRequest;

/**
 * Class BattleCreateRequest
 *
 * @method bool hasBattleStatus()
 * @method bool hasMapType()
 * @method bool hasName()
 */
class BattleCreateRequest extends AbstractRequest implements BattleAllRequestInterface
{
    use BattleAllRequestTrait;
}
