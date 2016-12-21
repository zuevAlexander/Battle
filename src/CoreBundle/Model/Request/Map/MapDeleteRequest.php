<?php

namespace CoreBundle\Model\Request\Map;

use NorseDigital\Symfony\RestBundle\Request\AbstractRequest;

/**
 * Class MapDeleteRequest
 *
 * @method bool hasMap()
 */
class MapDeleteRequest extends AbstractRequest implements MapSingleRequestInterface
{
    use MapSingleRequestTrait;
}
