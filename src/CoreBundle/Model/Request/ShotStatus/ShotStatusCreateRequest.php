<?php

namespace CoreBundle\Model\Request\ShotStatus;

use NorseDigital\Symfony\RestBundle\Request\AbstractRequest;

/**
 * Class ShotStatusCreateRequest
 *
 * @method bool hasStatusName()
 */
class ShotStatusCreateRequest extends AbstractRequest implements ShotStatusAllRequestInterface
{
    use ShotStatusAllRequestTrait;
}
