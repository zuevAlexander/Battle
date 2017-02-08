<?php

namespace CoreBundle\Form\CountShips;

use CoreBundle\Model\Request\CountShips\CountShipsListRequest;
use NorseDigital\Symfony\RestBundle\Form\AbstractFormGetListType;

/**
 * Class CountShipsListType
 */
class CountShipsListType extends AbstractFormGetListType
{
    const DATA_CLASS = CountShipsListRequest::class;
}
