<?php

namespace CoreBundle\Model\Request\ShotType;

use NorseDigital\Symfony\RestBundle\Request\AbstractRequest;

/**
 * Class ShotTypeReadRequest
 *
 * @method bool hasShotType()
 */
class ShotTypeReadRequest extends AbstractRequest implements ShotTypeSingleRequestInterface
{
    use ShotTypeSingleRequestTrait;
}
