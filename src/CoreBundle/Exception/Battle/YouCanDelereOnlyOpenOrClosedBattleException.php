<?php
namespace CoreBundle\Exception\Battle;

use Exception;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class CandidateNotFoundException.
 */
class YouCanDelereOnlyOpenOrClosedBattleException extends \RuntimeException
{
    public function __construct($message = 'You can delete only open or closed battle', $code = Response::HTTP_FORBIDDEN, Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
