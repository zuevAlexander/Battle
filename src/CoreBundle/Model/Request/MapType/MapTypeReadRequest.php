<?php

namespace CoreBundle\Model\Request\MapType;

use NorseDigital\Symfony\RestBundle\Request\AbstractRequest;

/**
 * Class MapTypeReadRequest
 *
 * @method bool hasMapType()
 */
class MapTypeReadRequest extends AbstractRequest implements MapTypeSingleRequestInterface
{
    use MapTypeSingleRequestTrait;
}
