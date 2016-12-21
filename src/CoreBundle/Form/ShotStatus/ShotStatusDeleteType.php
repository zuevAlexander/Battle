<?php

namespace CoreBundle\Form\ShotStatus;

use CoreBundle\Model\Request\ShotStatus\ShotStatusDeleteRequest;
use NorseDigital\Symfony\RestBundle\Form\AbstractFormType;

/**
 * Class ShotStatusDeleteType
 */
class ShotStatusDeleteType extends AbstractFormType
{
    use ShotStatusSingleTypeTrait;

    const DATA_CLASS = ShotStatusDeleteRequest::class;
}
