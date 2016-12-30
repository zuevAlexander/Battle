<?php
namespace CoreBundle\Exception\Shot;

use Exception;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class CandidateNotFoundException.
 */
class YouDidNotSpecifyBattleFieldException extends \RuntimeException
{
    public function __construct($message = 'You did not specify battle field', $code = Response::HTTP_BAD_REQUEST, Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
