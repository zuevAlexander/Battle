<?php

namespace CoreBundle\Model\Request\Shot;

use NorseDigital\Symfony\RestBundle\Request\ListRequestInterface;
use NorseDigital\Symfony\RestBundle\Request\ListRequestTrait;
use NorseDigital\Symfony\RestBundle\Request\AbstractRequest;

/**
 * Class ShotListRequest
 */
class ShotListRequest extends AbstractRequest implements ListRequestInterface
{
    use ListRequestTrait;
}
