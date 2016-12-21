<?php

namespace CoreBundle\Form\MapType;

use CoreBundle\Model\Request\MapType\MapTypeReadRequest;
use NorseDigital\Symfony\RestBundle\Form\AbstractFormType;

/**
 * Class MapTypeReadType
 */
class MapTypeReadType extends AbstractFormType
{
    use MapTypeSingleTypeTrait;

    const DATA_CLASS = MapTypeReadRequest::class;
}
