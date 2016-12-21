<?php

namespace CoreBundle\Model\Request\ShipLocation;

use NorseDigital\Symfony\RestBundle\Request\AbstractRequest;

/**
 * Class ShipLocationReadRequest
 *
 * @method bool hasShipLocation()
 */
class ShipLocationReadRequest extends AbstractRequest implements ShipLocationSingleRequestInterface
{
    use ShipLocationSingleRequestTrait;
}
