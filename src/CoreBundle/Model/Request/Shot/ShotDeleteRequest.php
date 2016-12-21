<?php

namespace CoreBundle\Model\Request\Shot;

use NorseDigital\Symfony\RestBundle\Request\AbstractRequest;

/**
 * Class ShotDeleteRequest
 *
 * @method bool hasShot()
 */
class ShotDeleteRequest extends AbstractRequest implements ShotSingleRequestInterface
{
    use ShotSingleRequestTrait;
}
