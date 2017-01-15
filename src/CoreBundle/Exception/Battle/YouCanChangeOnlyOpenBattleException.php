<?php
namespace CoreBundle\Exception\Battle;

use Exception;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class CandidateNotFoundException.
 */
class YouCanChangeOnlyOpenBattleException extends \RuntimeException
{
    public function __construct($message = 'You can change only open battle', $code = Response::HTTP_FORBIDDEN, Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
