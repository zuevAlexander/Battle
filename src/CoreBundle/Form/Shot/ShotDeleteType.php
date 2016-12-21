<?php

namespace CoreBundle\Form\Shot;

use CoreBundle\Model\Request\Shot\ShotDeleteRequest;
use NorseDigital\Symfony\RestBundle\Form\AbstractFormType;

/**
 * Class ShotDeleteType
 */
class ShotDeleteType extends AbstractFormType
{
    use ShotSingleTypeTrait;

    const DATA_CLASS = ShotDeleteRequest::class;
}
