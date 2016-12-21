<?php

namespace CoreBundle\Model\Request\MapType;

use NorseDigital\Symfony\RestBundle\Request\ListRequestInterface;
use NorseDigital\Symfony\RestBundle\Request\ListRequestTrait;
use NorseDigital\Symfony\RestBundle\Request\AbstractRequest;

/**
 * Class MapTypeListRequest
 */
class MapTypeListRequest extends AbstractRequest implements ListRequestInterface
{
    use ListRequestTrait;
}
