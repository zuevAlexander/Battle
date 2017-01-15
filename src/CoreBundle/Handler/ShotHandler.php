<?php

namespace CoreBundle\Handler;

use CoreBundle\Entity\Shot;
use CoreBundle\Model\Request\Shot\ShotCreateRequest;
use CoreBundle\Model\Handler\ShotProcessorInterface;
use CoreBundle\Service\Shot\ShotService;

/**
 * Class ShotHandler
 */
class ShotHandler implements ShotProcessorInterface
{
    /**
     * @var ShotService
     */
    private $shotService;

    /**
     * ShotHandler constructor.
     * @param ShotService $shotService
     */
    public function __construct(
        ShotService $shotService
    ) {
        $this->shotService = $shotService;
    }

    /**
     * @param ShotCreateRequest $request
     * @return Shot
     */
    public function processPost(ShotCreateRequest $request): Shot
    {
        return $this->shotService->createShot($request);
    }

}
