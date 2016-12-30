<?php
namespace CoreBundle\Exception\Ship;

use Exception;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class CandidateNotFoundException.
 */
class YourBattleFieldIsReadyException extends \RuntimeException
{
    public function __construct($message = 'Your battleField is ready. All ships have already been created.', $code = Response::HTTP_FORBIDDEN, Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
