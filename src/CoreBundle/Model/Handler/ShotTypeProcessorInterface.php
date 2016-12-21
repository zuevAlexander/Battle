<?php

namespace CoreBundle\Model\Handler;

use CoreBundle\Entity\ShotType;
use CoreBundle\Model\Request\ShotType\ShotTypeListRequest;
use CoreBundle\Model\Request\ShotType\ShotTypeCreateRequest;
use CoreBundle\Model\Request\ShotType\ShotTypeReadRequest;
use CoreBundle\Model\Request\ShotType\ShotTypeUpdateRequest;
use CoreBundle\Model\Request\ShotType\ShotTypeDeleteRequest;
use NorseDigital\Symfony\RestBundle\Handler\ProcessorInterface;

/**
 * Interface ShotTypeProcessorInterface
 */
interface ShotTypeProcessorInterface extends ProcessorInterface
{
    /**
     * @param ShotTypeListRequest $request
     * @return array
     */
    public function processGetC(ShotTypeListRequest $request): array;

    /**
     * @param ShotTypeCreateRequest $request
     * @return ShotType
     */
    public function processPost(ShotTypeCreateRequest $request): ShotType;

    /**
     * @param ShotTypeReadRequest $request
     * @return ShotType
     */
    public function processGet(ShotTypeReadRequest $request): ShotType;

    /**
     * @param ShotTypeUpdateRequest $request
     * @return ShotType
     */
    public function processPut(ShotTypeUpdateRequest $request): ShotType;

    /**
     * @param ShotTypeUpdateRequest $request
     * @return ShotType
     */
    public function processPatch(ShotTypeUpdateRequest $request): ShotType;

    /**
     * @param ShotTypeDeleteRequest $request
     * @return ShotType
     */
    public function processDelete(ShotTypeDeleteRequest $request): ShotType;
}
