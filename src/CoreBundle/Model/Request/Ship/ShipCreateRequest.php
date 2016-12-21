<?php

namespace CoreBundle\Model\Request\Ship;

use NorseDigital\Symfony\RestBundle\Request\AbstractRequest;

/**
 * Class ShipCreateRequest
 *
 * @method bool hasShipType()
 * @method bool hasBattleField()
 * @method bool hasLocation()
 */
class ShipCreateRequest extends AbstractRequest implements ShipAllRequestInterface
{
    use ShipAllRequestTrait;
}
