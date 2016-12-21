<?php

namespace CoreBundle\Form\MapType;

use CoreBundle\Model\Request\MapType\MapTypeListRequest;
use NorseDigital\Symfony\RestBundle\Form\AbstractFormGetListType;

/**
 * Class MapTypeListType
 */
class MapTypeListType extends AbstractFormGetListType
{
    const DATA_CLASS = MapTypeListRequest::class;
}
