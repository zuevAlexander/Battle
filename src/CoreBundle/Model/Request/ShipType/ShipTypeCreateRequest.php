<?php

namespace CoreBundle\Model\Request\ShipType;

use NorseDigital\Symfony\RestBundle\Request\AbstractRequest;

/**
 * Class ShipTypeCreateRequest
 *
 * @method bool hasTypeName()
 */
class ShipTypeCreateRequest extends AbstractRequest implements ShipTypeAllRequestInterface
{
    use ShipTypeAllRequestTrait;
}
