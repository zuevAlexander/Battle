<?php
namespace CoreBundle\Exception\User;

use Exception;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Exception\AuthenticationException;

class UnauthorizedException extends AuthenticationException
{
    /**
     * {@inheritdoc}
     */
    public function __construct($message = 'You are unauthorized', $code = Response::HTTP_UNAUTHORIZED, Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

    /**
     *
     * @return string
     */
    public function getMessageKey()
    {
        return $this->getMessage();
    }
}
