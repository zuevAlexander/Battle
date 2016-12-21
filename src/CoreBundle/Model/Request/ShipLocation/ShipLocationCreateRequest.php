<?php

namespace CoreBundle\Model\Request\ShipLocation;

use NorseDigital\Symfony\RestBundle\Request\AbstractRequest;

/**
 * Class ShipLocationCreateRequest
 *
 * @method bool hasShip()
 * @method bool hasMap()
 */
class ShipLocationCreateRequest extends AbstractRequest implements ShipLocationAllRequestInterface
{
    use ShipLocationAllRequestTrait;
}
