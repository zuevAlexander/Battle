<?php

namespace CoreBundle\Model\Request\ShotStatus;

use NorseDigital\Symfony\RestBundle\Request\AbstractRequest;

/**
 * Class ShotStatusReadRequest
 *
 * @method bool hasShotStatus()
 */
class ShotStatusReadRequest extends AbstractRequest implements ShotStatusSingleRequestInterface
{
    use ShotStatusSingleRequestTrait;
}
