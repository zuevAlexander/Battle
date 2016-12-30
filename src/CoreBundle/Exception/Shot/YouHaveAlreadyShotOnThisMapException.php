<?php
namespace CoreBundle\Exception\Shot;

use Exception;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class CandidateNotFoundException.
 */
class YouHaveAlreadyShotOnThisMapException extends \RuntimeException
{
    public function __construct($message = 'You have already shot on this map', $code = Response::HTTP_BAD_REQUEST, Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
