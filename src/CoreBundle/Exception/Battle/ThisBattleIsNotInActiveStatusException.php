<?php
namespace CoreBundle\Exception\Battle;

use Exception;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class CandidateNotFoundException.
 */
class ThisBattleIsNotInActiveStatusException extends \RuntimeException
{
    public function __construct($message = 'This battle is not in active status', $code = Response::HTTP_FORBIDDEN, Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
