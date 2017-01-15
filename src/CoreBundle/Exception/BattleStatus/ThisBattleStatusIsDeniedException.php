<?php
namespace CoreBundle\Exception\BattleStatus;

use Exception;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class CandidateNotFoundException.
 */
class ThisBattleStatusIsDeniedException extends \RuntimeException
{
    public function __construct($message = 'This battle status is denied', $code = Response::HTTP_FORBIDDEN, Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
