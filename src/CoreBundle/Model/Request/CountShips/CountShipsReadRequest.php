<?php

namespace CoreBundle\Model\Request\CountShips;

use NorseDigital\Symfony\RestBundle\Request\AbstractRequest;

/**
 * Class CountShipsReadRequest
 *
 * @method bool hasCountShips()
 */
class CountShipsReadRequest extends AbstractRequest implements CountShipsSingleRequestInterface
{
    use CountShipsSingleRequestTrait;
}
