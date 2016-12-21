<?php

namespace CoreBundle\Model\Request\User;

use NorseDigital\Symfony\RestBundle\Request\AbstractRequest;

/**
 * Class UserUpdateRequest
 *
 * @method bool hasUser()
 * @method bool hasUsername()
 * @method bool hasPassword()
 * @method bool hasToken()
 * @method bool hasApiKey()
 */
class UserUpdateRequest extends AbstractRequest implements UserSingleRequestInterface, UserAllRequestInterface
{
    use UserSingleRequestTrait {
        UserSingleRequestTrait::__construct as private constructTraitUserSingleType;
    }
    use UserAllRequestTrait {
        UserAllRequestTrait::__construct as private constructTraitUserAllType;
    }

    public function __construct()
    {
        $this->constructTraitUserSingleType();
        $this->constructTraitUserAllType();
    }
}
