<?php

namespace CoreBundle\Form\User;

use CoreBundle\Model\Request\User\UserReadRequest;
use NorseDigital\Symfony\RestBundle\Form\AbstractFormType;

/**
 * Class UserReadType
 */
class UserReadType extends AbstractFormType
{
    use UserSingleTypeTrait;

    const DATA_CLASS = UserReadRequest::class;
}
