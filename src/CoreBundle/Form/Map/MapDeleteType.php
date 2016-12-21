<?php

namespace CoreBundle\Form\Map;

use CoreBundle\Model\Request\Map\MapDeleteRequest;
use NorseDigital\Symfony\RestBundle\Form\AbstractFormType;

/**
 * Class MapDeleteType
 */
class MapDeleteType extends AbstractFormType
{
    use MapSingleTypeTrait;

    const DATA_CLASS = MapDeleteRequest::class;
}
