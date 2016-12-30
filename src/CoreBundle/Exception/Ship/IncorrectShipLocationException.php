<?php
namespace CoreBundle\Exception\Ship;

use Exception;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class CandidateNotFoundException.
 */
class IncorrectShipLocationException extends \RuntimeException
{
    public function __construct($message = 'Incorrect location of ship', $code = Response::HTTP_BAD_REQUEST, Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
