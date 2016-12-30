<?php
namespace CoreBundle\Exception\Ship;

use Exception;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class CandidateNotFoundException.
 */
class CountOfDecksDoesNotCorrespondToTypeOfShip extends \RuntimeException
{
    public function __construct($message = 'Count of decks does not correspond to the type of ship', $code = Response::HTTP_BAD_REQUEST, Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
