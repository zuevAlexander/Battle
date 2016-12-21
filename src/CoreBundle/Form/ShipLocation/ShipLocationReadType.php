<?php

namespace CoreBundle\Form\ShipLocation;

use CoreBundle\Model\Request\ShipLocation\ShipLocationReadRequest;
use NorseDigital\Symfony\RestBundle\Form\AbstractFormType;

/**
 * Class ShipLocationReadType
 */
class ShipLocationReadType extends AbstractFormType
{
    use ShipLocationSingleTypeTrait;

    const DATA_CLASS = ShipLocationReadRequest::class;
}
