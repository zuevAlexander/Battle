<?php

namespace CoreBundle\Model\Handler;

use CoreBundle\Entity\Map;
use CoreBundle\Model\Request\Map\MapListRequest;
use CoreBundle\Model\Request\Map\MapCreateRequest;
use CoreBundle\Model\Request\Map\MapReadRequest;
use CoreBundle\Model\Request\Map\MapUpdateRequest;
use CoreBundle\Model\Request\Map\MapDeleteRequest;
use NorseDigital\Symfony\RestBundle\Handler\ProcessorInterface;

/**
 * Interface MapProcessorInterface
 */
interface MapProcessorInterface extends ProcessorInterface
{
    /**
     * @param MapListRequest $request
     * @return array
     */
    public function processGetC(MapListRequest $request): array;

    /**
     * @param MapCreateRequest $request
     * @return Map
     */
    public function processPost(MapCreateRequest $request): Map;

    /**
     * @param MapReadRequest $request
     * @return Map
     */
    public function processGet(MapReadRequest $request): Map;

    /**
     * @param MapUpdateRequest $request
     * @return Map
     */
    public function processPut(MapUpdateRequest $request): Map;

    /**
     * @param MapUpdateRequest $request
     * @return Map
     */
    public function processPatch(MapUpdateRequest $request): Map;

    /**
     * @param MapDeleteRequest $request
     * @return Map
     */
    public function processDelete(MapDeleteRequest $request): Map;
}
