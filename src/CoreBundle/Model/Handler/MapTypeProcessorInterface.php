<?php

namespace CoreBundle\Model\Handler;

use CoreBundle\Entity\MapType;
use CoreBundle\Model\Request\MapType\MapTypeListRequest;
use CoreBundle\Model\Request\MapType\MapTypeCreateRequest;
use CoreBundle\Model\Request\MapType\MapTypeReadRequest;
use CoreBundle\Model\Request\MapType\MapTypeUpdateRequest;
use CoreBundle\Model\Request\MapType\MapTypeDeleteRequest;
use NorseDigital\Symfony\RestBundle\Handler\ProcessorInterface;

/**
 * Interface MapTypeProcessorInterface
 */
interface MapTypeProcessorInterface extends ProcessorInterface
{
    /**
     * @param MapTypeListRequest $request
     * @return array
     */
    public function processGetC(MapTypeListRequest $request): array;

    /**
     * @param MapTypeCreateRequest $request
     * @return MapType
     */
    public function processPost(MapTypeCreateRequest $request): MapType;

    /**
     * @param MapTypeReadRequest $request
     * @return MapType
     */
    public function processGet(MapTypeReadRequest $request): MapType;

    /**
     * @param MapTypeUpdateRequest $request
     * @return MapType
     */
    public function processPut(MapTypeUpdateRequest $request): MapType;

    /**
     * @param MapTypeUpdateRequest $request
     * @return MapType
     */
    public function processPatch(MapTypeUpdateRequest $request): MapType;

    /**
     * @param MapTypeDeleteRequest $request
     * @return MapType
     */
    public function processDelete(MapTypeDeleteRequest $request): MapType;
}
