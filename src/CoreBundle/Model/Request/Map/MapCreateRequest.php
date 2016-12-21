<?php

namespace CoreBundle\Model\Request\Map;

use NorseDigital\Symfony\RestBundle\Request\AbstractRequest;

/**
 * Class MapCreateRequest
 *
 * @method bool hasLatitude()
 * @method bool hasLongitude()
 */
class MapCreateRequest extends AbstractRequest implements MapAllRequestInterface
{
    use MapAllRequestTrait;
}
