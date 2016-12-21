<?php

namespace CoreBundle\Form\ShotStatus;

use CoreBundle\Model\Request\ShotStatus\ShotStatusReadRequest;
use NorseDigital\Symfony\RestBundle\Form\AbstractFormType;

/**
 * Class ShotStatusReadType
 */
class ShotStatusReadType extends AbstractFormType
{
    use ShotStatusSingleTypeTrait;

    const DATA_CLASS = ShotStatusReadRequest::class;
}
