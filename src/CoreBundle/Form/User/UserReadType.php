<?php

namespace CoreBundle\Form\User;

use CoreBundle\Model\Request\User\UserReadRequest;
use NorseDigital\Symfony\RestBundle\Form\AbstractFormType;

class UserReadType extends AbstractFormType
{
    const DATA_CLASS = UserReadRequest::class;
}
