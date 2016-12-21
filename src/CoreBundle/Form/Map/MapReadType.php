<?php

namespace CoreBundle\Form\Map;

use CoreBundle\Model\Request\Map\MapReadRequest;
use NorseDigital\Symfony\RestBundle\Form\AbstractFormType;

/**
 * Class MapReadType
 */
class MapReadType extends AbstractFormType
{
    use MapSingleTypeTrait;

    const DATA_CLASS = MapReadRequest::class;
}
