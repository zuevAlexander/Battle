<?php

namespace CoreBundle\Model\Request\MapType;

use NorseDigital\Symfony\RestBundle\Request\AbstractRequest;

/**
 * Class MapTypeDeleteRequest
 *
 * @method bool hasMapType()
 */
class MapTypeDeleteRequest extends AbstractRequest implements MapTypeSingleRequestInterface
{
    use MapTypeSingleRequestTrait;
}
