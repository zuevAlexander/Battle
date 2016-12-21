<?php

namespace CoreBundle\Model\Request\User;

use NorseDigital\Symfony\RestBundle\Request\AbstractRequest;

/**
 * Class UserReadRequest
 *
 * @method bool hasUser()
 */
class UserReadRequest extends AbstractRequest implements UserSingleRequestInterface
{
    use UserSingleRequestTrait;
}
