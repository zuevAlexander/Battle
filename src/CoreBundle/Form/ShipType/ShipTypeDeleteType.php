<?php

namespace CoreBundle\Form\ShipType;

use CoreBundle\Model\Request\ShipType\ShipTypeDeleteRequest;
use NorseDigital\Symfony\RestBundle\Form\AbstractFormType;

/**
 * Class ShipTypeDeleteType
 */
class ShipTypeDeleteType extends AbstractFormType
{
    use ShipTypeSingleTypeTrait;

    const DATA_CLASS = ShipTypeDeleteRequest::class;
}
