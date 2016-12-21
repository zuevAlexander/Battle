<?php

namespace CoreBundle\Form\Ship;

use CoreBundle\Model\Request\Ship\ShipDeleteRequest;
use NorseDigital\Symfony\RestBundle\Form\AbstractFormType;

/**
 * Class ShipDeleteType
 */
class ShipDeleteType extends AbstractFormType
{
    use ShipSingleTypeTrait;

    const DATA_CLASS = ShipDeleteRequest::class;
}
