<?php

namespace CoreBundle\Model\Request\Shot;

use NorseDigital\Symfony\RestBundle\Request\AbstractRequest;

/**
 * Class ShotCreateRequest
 *
 * @method bool hasUser()
 * @method bool hasMap()
 * @method bool hasShotStatus()
 * @method bool hasBattleField()
 */
class ShotCreateRequest extends AbstractRequest implements ShotAllRequestInterface
{
    use ShotAllRequestTrait;
}
