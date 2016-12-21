<?php

namespace CoreBundle\Form\ShotStatus;

use CoreBundle\Model\Request\ShotStatus\ShotStatusListRequest;
use NorseDigital\Symfony\RestBundle\Form\AbstractFormGetListType;

/**
 * Class ShotStatusListType
 */
class ShotStatusListType extends AbstractFormGetListType
{
    const DATA_CLASS = ShotStatusListRequest::class;
}
