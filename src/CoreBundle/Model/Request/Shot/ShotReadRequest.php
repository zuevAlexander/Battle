<?php

namespace CoreBundle\Model\Request\Shot;

use NorseDigital\Symfony\RestBundle\Request\AbstractRequest;

/**
 * Class ShotReadRequest
 *
 * @method bool hasShot()
 */
class ShotReadRequest extends AbstractRequest implements ShotSingleRequestInterface
{
    use ShotSingleRequestTrait;
}
