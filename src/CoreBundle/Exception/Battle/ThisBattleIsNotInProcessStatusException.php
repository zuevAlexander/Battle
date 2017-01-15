<?php
namespace CoreBundle\Exception\Battle;

use Exception;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class CandidateNotFoundException.
 */
class ThisBattleIsNotInProcessStatusException extends \RuntimeException
{
    public function __construct($message = 'This battle is not in process status', $code = Response::HTTP_FORBIDDEN, Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
