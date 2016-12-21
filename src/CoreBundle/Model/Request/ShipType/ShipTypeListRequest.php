<?php

namespace CoreBundle\Model\Request\ShipType;

use NorseDigital\Symfony\RestBundle\Request\ListRequestInterface;
use NorseDigital\Symfony\RestBundle\Request\ListRequestTrait;
use NorseDigital\Symfony\RestBundle\Request\AbstractRequest;

/**
 * Class ShipTypeListRequest
 */
class ShipTypeListRequest extends AbstractRequest implements ListRequestInterface
{
    use ListRequestTrait;
}
