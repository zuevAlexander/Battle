<?php
namespace CoreBundle\Exception\BattleField;

use Exception;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class CandidateNotFoundException.
 */
class YouAreNotOwnerOfThisBattleFieldException extends \RuntimeException
{
    public function __construct($message = 'You are not the owner of this battlefield', $code = Response::HTTP_FORBIDDEN, Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
