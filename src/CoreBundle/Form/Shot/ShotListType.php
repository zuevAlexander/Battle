<?php

namespace CoreBundle\Form\Shot;

use CoreBundle\Model\Request\Shot\ShotListRequest;
use NorseDigital\Symfony\RestBundle\Form\AbstractFormGetListType;

/**
 * Class ShotListType
 */
class ShotListType extends AbstractFormGetListType
{
    const DATA_CLASS = ShotListRequest::class;
}
