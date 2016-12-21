<?php

namespace CoreBundle\Form\CountShips;

use CoreBundle\Model\Request\CountShips\CountShipsDeleteRequest;
use NorseDigital\Symfony\RestBundle\Form\AbstractFormType;

/**
 * Class CountShipsDeleteType
 */
class CountShipsDeleteType extends AbstractFormType
{
    use CountShipsSingleTypeTrait;

    const DATA_CLASS = CountShipsDeleteRequest::class;
}
