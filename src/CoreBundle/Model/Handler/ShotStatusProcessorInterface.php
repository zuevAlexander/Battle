<?php

namespace CoreBundle\Model\Handler;

use CoreBundle\Entity\ShotStatus;
use CoreBundle\Model\Request\ShotStatus\ShotStatusListRequest;
use CoreBundle\Model\Request\ShotStatus\ShotStatusCreateRequest;
use CoreBundle\Model\Request\ShotStatus\ShotStatusReadRequest;
use CoreBundle\Model\Request\ShotStatus\ShotStatusUpdateRequest;
use CoreBundle\Model\Request\ShotStatus\ShotStatusDeleteRequest;
use NorseDigital\Symfony\RestBundle\Handler\ProcessorInterface;

/**
 * Interface ShotStatusProcessorInterface
 */
interface ShotStatusProcessorInterface extends ProcessorInterface
{
    /**
     * @param ShotStatusListRequest $request
     * @return array
     */
    public function processGetC(ShotStatusListRequest $request): array;

    /**
     * @param ShotStatusCreateRequest $request
     * @return ShotStatus
     */
    public function processPost(ShotStatusCreateRequest $request): ShotStatus;

    /**
     * @param ShotStatusReadRequest $request
     * @return ShotStatus
     */
    public function processGet(ShotStatusReadRequest $request): ShotStatus;

    /**
     * @param ShotStatusUpdateRequest $request
     * @return ShotStatus
     */
    public function processPut(ShotStatusUpdateRequest $request): ShotStatus;

    /**
     * @param ShotStatusUpdateRequest $request
     * @return ShotStatus
     */
    public function processPatch(ShotStatusUpdateRequest $request): ShotStatus;

    /**
     * @param ShotStatusDeleteRequest $request
     * @return ShotStatus
     */
    public function processDelete(ShotStatusDeleteRequest $request): ShotStatus;
}
