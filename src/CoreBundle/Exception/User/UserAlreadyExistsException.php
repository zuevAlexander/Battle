<?php
/**
 * Created by PhpStorm.
 * User: stas
 * Date: 04.10.16
 * Time: 23:51.
 */
namespace CoreBundle\Exception\User;

use Exception;
use Symfony\Component\HttpFoundation\Response;

class UserAlreadyExistsException extends \RuntimeException
{
    public function __construct($message = 'User already exists', $code = Response::HTTP_FORBIDDEN, Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
