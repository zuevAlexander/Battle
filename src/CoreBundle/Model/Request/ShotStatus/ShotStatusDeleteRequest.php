<?php

namespace CoreBundle\Model\Request\ShotStatus;

use NorseDigital\Symfony\RestBundle\Request\AbstractRequest;

/**
 * Class ShotStatusDeleteRequest
 *
 * @method bool hasShotStatus()
 */
class ShotStatusDeleteRequest extends AbstractRequest implements ShotStatusSingleRequestInterface
{
    use ShotStatusSingleRequestTrait;
}
