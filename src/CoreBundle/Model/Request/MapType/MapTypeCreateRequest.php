<?php

namespace CoreBundle\Model\Request\MapType;

use NorseDigital\Symfony\RestBundle\Request\AbstractRequest;

/**
 * Class MapTypeCreateRequest
 *
 * @method bool hasTypeName()
 * @method bool hasSize()
 */
class MapTypeCreateRequest extends AbstractRequest implements MapTypeAllRequestInterface
{
    use MapTypeAllRequestTrait;
}
