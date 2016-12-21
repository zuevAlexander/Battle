<?php

namespace CoreBundle\Form\Ship;

use CoreBundle\Model\Request\Ship\ShipListRequest;
use NorseDigital\Symfony\RestBundle\Form\AbstractFormGetListType;

/**
 * Class ShipListType
 */
class ShipListType extends AbstractFormGetListType
{
    const DATA_CLASS = ShipListRequest::class;
}
