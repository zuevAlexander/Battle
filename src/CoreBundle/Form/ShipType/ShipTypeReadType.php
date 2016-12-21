<?php

namespace CoreBundle\Form\ShipType;

use CoreBundle\Model\Request\ShipType\ShipTypeReadRequest;
use NorseDigital\Symfony\RestBundle\Form\AbstractFormType;

/**
 * Class ShipTypeReadType
 */
class ShipTypeReadType extends AbstractFormType
{
    use ShipTypeSingleTypeTrait;

    const DATA_CLASS = ShipTypeReadRequest::class;
}
