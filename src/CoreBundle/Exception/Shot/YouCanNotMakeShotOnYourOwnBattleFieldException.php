<?php
namespace CoreBundle\Exception\Shot;

use Exception;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class CandidateNotFoundException.
 */
class YouCanNotMakeShotOnYourOwnBattleFieldException extends \RuntimeException
{
    public function __construct($message = 'You can not make shot on your own battleField', $code = Response::HTTP_FORBIDDEN, Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
