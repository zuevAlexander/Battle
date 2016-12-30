<?php
namespace CoreBundle\Exception\Ship;

use Exception;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class CandidateNotFoundException.
 */
class ExhaustedLimitOfThisTypeOfShips extends \RuntimeException
{
    public function __construct($message = 'Exhausted the limit of this type of ships', $code = Response::HTTP_FORBIDDEN, Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
