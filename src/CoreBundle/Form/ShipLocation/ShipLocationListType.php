<?php

namespace CoreBundle\Form\ShipLocation;

use CoreBundle\Model\Request\ShipLocation\ShipLocationListRequest;
use NorseDigital\Symfony\RestBundle\Form\AbstractFormGetListType;

/**
 * Class ShipLocationListType
 */
class ShipLocationListType extends AbstractFormGetListType
{
    const DATA_CLASS = ShipLocationListRequest::class;
}
