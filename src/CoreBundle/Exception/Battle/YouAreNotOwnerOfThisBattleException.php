<?php
namespace CoreBundle\Exception\Battle;

use Exception;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class CandidateNotFoundException.
 */
class YouAreNotOwnerOfThisBattleException extends \RuntimeException
{
    public function __construct($message = 'You are not the owner of this battle', $code = Response::HTTP_FORBIDDEN, Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
