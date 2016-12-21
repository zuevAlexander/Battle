<?php

namespace CoreBundle\Form\CountShips;

use CoreBundle\Model\Request\CountShips\CountShipsReadRequest;
use NorseDigital\Symfony\RestBundle\Form\AbstractFormType;

/**
 * Class CountShipsReadType
 */
class CountShipsReadType extends AbstractFormType
{
    use CountShipsSingleTypeTrait;

    const DATA_CLASS = CountShipsReadRequest::class;
}
