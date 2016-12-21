<?php

namespace CoreBundle\Form\ShotType;

use CoreBundle\Model\Request\ShotType\ShotTypeReadRequest;
use NorseDigital\Symfony\RestBundle\Form\AbstractFormType;

/**
 * Class ShotTypeReadType
 */
class ShotTypeReadType extends AbstractFormType
{
    use ShotTypeSingleTypeTrait;

    const DATA_CLASS = ShotTypeReadRequest::class;
}
