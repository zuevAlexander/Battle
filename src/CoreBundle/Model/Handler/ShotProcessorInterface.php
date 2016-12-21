<?php

namespace CoreBundle\Model\Handler;

use CoreBundle\Entity\Shot;
use CoreBundle\Model\Request\Shot\ShotListRequest;
use CoreBundle\Model\Request\Shot\ShotCreateRequest;
use CoreBundle\Model\Request\Shot\ShotReadRequest;
use CoreBundle\Model\Request\Shot\ShotUpdateRequest;
use CoreBundle\Model\Request\Shot\ShotDeleteRequest;
use NorseDigital\Symfony\RestBundle\Handler\ProcessorInterface;

/**
 * Interface ShotProcessorInterface
 */
interface ShotProcessorInterface extends ProcessorInterface
{
    /**
     * @param ShotListRequest $request
     * @return array
     */
    public function processGetC(ShotListRequest $request): array;

    /**
     * @param ShotCreateRequest $request
     * @return Shot
     */
    public function processPost(ShotCreateRequest $request): Shot;

    /**
     * @param ShotReadRequest $request
     * @return Shot
     */
    public function processGet(ShotReadRequest $request): Shot;

    /**
     * @param ShotUpdateRequest $request
     * @return Shot
     */
    public function processPut(ShotUpdateRequest $request): Shot;

    /**
     * @param ShotUpdateRequest $request
     * @return Shot
     */
    public function processPatch(ShotUpdateRequest $request): Shot;

    /**
     * @param ShotDeleteRequest $request
     * @return Shot
     */
    public function processDelete(ShotDeleteRequest $request): Shot;
}
