<?php

namespace CoreBundle\Form\Ship;

use CoreBundle\Model\Request\Ship\ShipReadRequest;
use NorseDigital\Symfony\RestBundle\Form\AbstractFormType;

/**
 * Class ShipReadType
 */
class ShipReadType extends AbstractFormType
{
    use ShipSingleTypeTrait;

    const DATA_CLASS = ShipReadRequest::class;
}
