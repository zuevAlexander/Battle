<?php

namespace CoreBundle\Form\User;

use CoreBundle\Model\Request\User\UserListRequest;
use NorseDigital\Symfony\RestBundle\Form\AbstractFormGetListType;

/**
 * Class UserListType
 */
class UserListType extends AbstractFormGetListType
{
    const DATA_CLASS = UserListRequest::class;
}
