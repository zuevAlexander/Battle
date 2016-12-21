<?php

namespace CoreBundle\Model\Request\ShotStatus;

use NorseDigital\Symfony\RestBundle\Request\ListRequestInterface;
use NorseDigital\Symfony\RestBundle\Request\ListRequestTrait;
use NorseDigital\Symfony\RestBundle\Request\AbstractRequest;

/**
 * Class ShotStatusListRequest
 */
class ShotStatusListRequest extends AbstractRequest implements ListRequestInterface
{
    use ListRequestTrait;
}
