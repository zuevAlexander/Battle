<?php
namespace CoreBundle\Exception\Battle;

use Exception;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class CandidateNotFoundException.
 */
class BattleIsNotInOpenOrPreparationStatusException extends \RuntimeException
{
    public function __construct($message = 'Battle is not in open or preparation status. You can not create ship.', $code = Response::HTTP_FORBIDDEN, Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
