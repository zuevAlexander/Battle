<?php

namespace CoreBundle\Model\Request\ShotType;

use NorseDigital\Symfony\RestBundle\Request\AbstractRequest;

/**
 * Class ShotTypeDeleteRequest
 *
 * @method bool hasShotType()
 */
class ShotTypeDeleteRequest extends AbstractRequest implements ShotTypeSingleRequestInterface
{
    use ShotTypeSingleRequestTrait;
}
