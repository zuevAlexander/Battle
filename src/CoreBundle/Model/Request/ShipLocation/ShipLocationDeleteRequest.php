<?php

namespace CoreBundle\Model\Request\ShipLocation;

use NorseDigital\Symfony\RestBundle\Request\AbstractRequest;

/**
 * Class ShipLocationDeleteRequest
 *
 * @method bool hasShipLocation()
 */
class ShipLocationDeleteRequest extends AbstractRequest implements ShipLocationSingleRequestInterface
{
    use ShipLocationSingleRequestTrait;
}
