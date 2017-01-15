<?php

namespace CoreBundle\Model\Handler;

use CoreBundle\Entity\Shot;
use CoreBundle\Model\Request\Shot\ShotCreateRequest;
use NorseDigital\Symfony\RestBundle\Handler\ProcessorInterface;

/**
 * Interface ShotProcessorInterface
 */
interface ShotProcessorInterface extends ProcessorInterface
{
    /**
     * @param ShotCreateRequest $request
     * @return Shot
     */
    public function processPost(ShotCreateRequest $request): Shot;
}
