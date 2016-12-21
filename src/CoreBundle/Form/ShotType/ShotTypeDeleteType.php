<?php

namespace CoreBundle\Form\ShotType;

use CoreBundle\Model\Request\ShotType\ShotTypeDeleteRequest;
use NorseDigital\Symfony\RestBundle\Form\AbstractFormType;

/**
 * Class ShotTypeDeleteType
 */
class ShotTypeDeleteType extends AbstractFormType
{
    use ShotTypeSingleTypeTrait;

    const DATA_CLASS = ShotTypeDeleteRequest::class;
}
