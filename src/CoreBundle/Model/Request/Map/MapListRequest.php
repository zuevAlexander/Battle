<?php

namespace CoreBundle\Model\Request\Map;

use NorseDigital\Symfony\RestBundle\Request\ListRequestInterface;
use NorseDigital\Symfony\RestBundle\Request\ListRequestTrait;
use NorseDigital\Symfony\RestBundle\Request\AbstractRequest;

/**
 * Class MapListRequest
 */
class MapListRequest extends AbstractRequest implements ListRequestInterface
{
    use ListRequestTrait;
}
