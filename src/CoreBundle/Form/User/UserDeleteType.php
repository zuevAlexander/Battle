<?php

namespace CoreBundle\Form\User;

use CoreBundle\Model\Request\User\UserDeleteRequest;
use NorseDigital\Symfony\RestBundle\Form\AbstractFormType;

/**
 * Class UserDeleteType
 */
class UserDeleteType extends AbstractFormType
{
    use UserSingleTypeTrait;

    const DATA_CLASS = UserDeleteRequest::class;
}
