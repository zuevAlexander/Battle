<?php

namespace CoreBundle\Model\Request\ShotType;

use NorseDigital\Symfony\RestBundle\Request\AbstractRequest;

/**
 * Class ShotTypeCreateRequest
 *
 * @method bool hasTypeName()
 */
class ShotTypeCreateRequest extends AbstractRequest implements ShotTypeAllRequestInterface
{
    use ShotTypeAllRequestTrait;
}
