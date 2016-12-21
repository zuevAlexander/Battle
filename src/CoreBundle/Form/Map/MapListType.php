<?php

namespace CoreBundle\Form\Map;

use CoreBundle\Model\Request\Map\MapListRequest;
use NorseDigital\Symfony\RestBundle\Form\AbstractFormGetListType;

/**
 * Class MapListType
 */
class MapListType extends AbstractFormGetListType
{
    const DATA_CLASS = MapListRequest::class;
}
