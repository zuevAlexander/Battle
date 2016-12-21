<?php

namespace CoreBundle\Form\ShotType;

use CoreBundle\Model\Request\ShotType\ShotTypeListRequest;
use NorseDigital\Symfony\RestBundle\Form\AbstractFormGetListType;

/**
 * Class ShotTypeListType
 */
class ShotTypeListType extends AbstractFormGetListType
{
    const DATA_CLASS = ShotTypeListRequest::class;
}
