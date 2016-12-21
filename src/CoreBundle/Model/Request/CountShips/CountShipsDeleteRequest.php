<?php

namespace CoreBundle\Model\Request\CountShips;

use NorseDigital\Symfony\RestBundle\Request\AbstractRequest;

/**
 * Class CountShipsDeleteRequest
 *
 * @method bool hasCountShips()
 */
class CountShipsDeleteRequest extends AbstractRequest implements CountShipsSingleRequestInterface
{
    use CountShipsSingleRequestTrait;
}
