<?php

namespace CoreBundle\Form\MapType;

use CoreBundle\Model\Request\MapType\MapTypeDeleteRequest;
use NorseDigital\Symfony\RestBundle\Form\AbstractFormType;

/**
 * Class MapTypeDeleteType
 */
class MapTypeDeleteType extends AbstractFormType
{
    use MapTypeSingleTypeTrait;

    const DATA_CLASS = MapTypeDeleteRequest::class;
}
