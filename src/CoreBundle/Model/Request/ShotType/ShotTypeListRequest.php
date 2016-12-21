<?php

namespace CoreBundle\Model\Request\ShotType;

use NorseDigital\Symfony\RestBundle\Request\ListRequestInterface;
use NorseDigital\Symfony\RestBundle\Request\ListRequestTrait;
use NorseDigital\Symfony\RestBundle\Request\AbstractRequest;

/**
 * Class ShotTypeListRequest
 */
class ShotTypeListRequest extends AbstractRequest implements ListRequestInterface
{
    use ListRequestTrait;
}
