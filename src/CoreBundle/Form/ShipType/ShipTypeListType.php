<?php

namespace CoreBundle\Form\ShipType;

use CoreBundle\Model\Request\ShipType\ShipTypeListRequest;
use NorseDigital\Symfony\RestBundle\Form\AbstractFormGetListType;

/**
 * Class ShipTypeListType
 */
class ShipTypeListType extends AbstractFormGetListType
{
    const DATA_CLASS = ShipTypeListRequest::class;
}
