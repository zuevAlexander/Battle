<?php

namespace CoreBundle\Model\Request\Ship;

use NorseDigital\Symfony\RestBundle\Request\AbstractRequest;

/**
 * Class ShipReadRequest
 *
 * @method bool hasShip()
 */
class ShipReadRequest extends AbstractRequest implements ShipSingleRequestInterface
{
    use ShipSingleRequestTrait;
}
