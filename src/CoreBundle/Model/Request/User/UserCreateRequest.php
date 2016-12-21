<?php

namespace CoreBundle\Model\Request\User;

use NorseDigital\Symfony\RestBundle\Request\AbstractRequest;

/**
 * Class UserCreateRequest
 *
 * @method bool hasUsername()
 * @method bool hasPassword()
 * @method bool hasToken()
 * @method bool hasApiKey()
 */
class UserCreateRequest extends AbstractRequest implements UserAllRequestInterface
{
    use UserAllRequestTrait;
}
