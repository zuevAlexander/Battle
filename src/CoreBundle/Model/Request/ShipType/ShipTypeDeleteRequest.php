<?php

namespace CoreBundle\Model\Request\ShipType;

use NorseDigital\Symfony\RestBundle\Request\AbstractRequest;

/**
 * Class ShipTypeDeleteRequest
 *
 * @method bool hasShipType()
 */
class ShipTypeDeleteRequest extends AbstractRequest implements ShipTypeSingleRequestInterface
{
    use ShipTypeSingleRequestTrait;
}
