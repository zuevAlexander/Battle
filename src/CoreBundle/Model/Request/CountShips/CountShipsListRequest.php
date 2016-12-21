<?php

namespace CoreBundle\Model\Request\CountShips;

use NorseDigital\Symfony\RestBundle\Request\ListRequestInterface;
use NorseDigital\Symfony\RestBundle\Request\ListRequestTrait;
use NorseDigital\Symfony\RestBundle\Request\AbstractRequest;

/**
 * Class CountShipsListRequest
 */
class CountShipsListRequest extends AbstractRequest implements ListRequestInterface
{
    use ListRequestTrait;
}
