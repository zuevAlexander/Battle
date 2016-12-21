<?php

namespace CoreBundle\Form\ShipLocation;

use CoreBundle\Model\Request\ShipLocation\ShipLocationDeleteRequest;
use NorseDigital\Symfony\RestBundle\Form\AbstractFormType;

/**
 * Class ShipLocationDeleteType
 */
class ShipLocationDeleteType extends AbstractFormType
{
    use ShipLocationSingleTypeTrait;

    const DATA_CLASS = ShipLocationDeleteRequest::class;
}
