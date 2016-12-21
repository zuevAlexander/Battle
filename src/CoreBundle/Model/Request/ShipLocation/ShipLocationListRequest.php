<?php

namespace CoreBundle\Model\Request\ShipLocation;

use NorseDigital\Symfony\RestBundle\Request\ListRequestInterface;
use NorseDigital\Symfony\RestBundle\Request\ListRequestTrait;
use NorseDigital\Symfony\RestBundle\Request\AbstractRequest;

/**
 * Class ShipLocationListRequest
 */
class ShipLocationListRequest extends AbstractRequest implements ListRequestInterface
{
    use ListRequestTrait;
}
