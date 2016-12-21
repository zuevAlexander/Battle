<?php

namespace CoreBundle\Model\Request\User;

use NorseDigital\Symfony\RestBundle\Request\AbstractRequest;

/**
 * Class UserDeleteRequest
 *
 * @method bool hasUser()
 */
class UserDeleteRequest extends AbstractRequest implements UserSingleRequestInterface
{
    use UserSingleRequestTrait;
}
