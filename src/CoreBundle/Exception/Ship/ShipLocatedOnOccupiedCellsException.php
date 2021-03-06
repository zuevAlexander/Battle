<?php
namespace CoreBundle\Exception\Ship;

use Exception;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class CandidateNotFoundException.
 */
class ShipLocatedOnOccupiedCellsException extends \RuntimeException
{
    public function __construct($message = 'Ship located on occupied cells', $code = Response::HTTP_BAD_REQUEST, Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
