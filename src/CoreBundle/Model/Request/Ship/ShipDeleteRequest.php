<?php

namespace CoreBundle\Model\Request\Ship;

use NorseDigital\Symfony\RestBundle\Request\AbstractRequest;

/**
 * Class ShipDeleteRequest
 *
 * @method bool hasShip()
 */
class ShipDeleteRequest extends AbstractRequest implements ShipSingleRequestInterface
{
    use ShipSingleRequestTrait;
}
