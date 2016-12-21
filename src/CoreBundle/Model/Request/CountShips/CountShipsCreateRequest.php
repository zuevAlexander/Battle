<?php

namespace CoreBundle\Model\Request\CountShips;

use NorseDigital\Symfony\RestBundle\Request\AbstractRequest;

/**
 * Class CountShipsCreateRequest
 *
 * @method bool hasShipType()
 * @method bool hasMapType()
 * @method bool hasCount()
 */
class CountShipsCreateRequest extends AbstractRequest implements CountShipsAllRequestInterface
{
    use CountShipsAllRequestTrait;
}
