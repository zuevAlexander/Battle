<?php

namespace CoreBundle\Form\Shot;

use CoreBundle\Model\Request\Shot\ShotReadRequest;
use NorseDigital\Symfony\RestBundle\Form\AbstractFormType;

/**
 * Class ShotReadType
 */
class ShotReadType extends AbstractFormType
{
    use ShotSingleTypeTrait;

    const DATA_CLASS = ShotReadRequest::class;
}
