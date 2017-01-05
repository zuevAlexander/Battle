<?php

namespace CoreBundle\Exception\User;

use Exception;
use Symfony\Component\HttpFoundation\Response;

class EmptyUsernameException extends \RuntimeException
{
    public function __construct($message = 'Username can not be empty', $code = Response::HTTP_BAD_REQUEST, Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
