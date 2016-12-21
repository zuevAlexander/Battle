<?php

namespace CoreBundle\Model\Request\Map;

use NorseDigital\Symfony\RestBundle\Request\AbstractRequest;

/**
 * Class MapReadRequest
 *
 * @method bool hasMap()
 */
class MapReadRequest extends AbstractRequest implements MapSingleRequestInterface
{
    use MapSingleRequestTrait;
}
