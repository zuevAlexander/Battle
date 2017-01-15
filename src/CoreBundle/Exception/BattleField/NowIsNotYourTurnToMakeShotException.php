<?php
namespace CoreBundle\Exception\BattleField;

use Exception;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class CandidateNotFoundException.
 */
class NowIsNotYourTurnToMakeShotException extends \RuntimeException
{
    public function __construct($message = 'Now is not your turn to make a shot', $code = Response::HTTP_FORBIDDEN, Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
