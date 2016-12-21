<?php

namespace CoreBundle\Model\Request\Ship;

use NorseDigital\Symfony\RestBundle\Request\ListRequestInterface;
use NorseDigital\Symfony\RestBundle\Request\ListRequestTrait;
use NorseDigital\Symfony\RestBundle\Request\AbstractRequest;

/**
 * Class ShipListRequest
 */
class ShipListRequest extends AbstractRequest implements ListRequestInterface
{
    use ListRequestTrait;
}
