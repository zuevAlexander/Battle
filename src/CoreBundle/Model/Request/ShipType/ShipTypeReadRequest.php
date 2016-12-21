<?php

namespace CoreBundle\Model\Request\ShipType;

use NorseDigital\Symfony\RestBundle\Request\AbstractRequest;

/**
 * Class ShipTypeReadRequest
 *
 * @method bool hasShipType()
 */
class ShipTypeReadRequest extends AbstractRequest implements ShipTypeSingleRequestInterface
{
    use ShipTypeSingleRequestTrait;
}
