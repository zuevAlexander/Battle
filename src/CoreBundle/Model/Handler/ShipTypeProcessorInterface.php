<?php

namespace CoreBundle\Model\Handler;

use CoreBundle\Entity\ShipType;
use CoreBundle\Model\Request\ShipType\ShipTypeListRequest;
use CoreBundle\Model\Request\ShipType\ShipTypeCreateRequest;
use CoreBundle\Model\Request\ShipType\ShipTypeReadRequest;
use CoreBundle\Model\Request\ShipType\ShipTypeUpdateRequest;
use CoreBundle\Model\Request\ShipType\ShipTypeDeleteRequest;
use NorseDigital\Symfony\RestBundle\Handler\ProcessorInterface;

/**
 * Interface ShipTypeProcessorInterface
 */
interface ShipTypeProcessorInterface extends ProcessorInterface
{
    /**
     * @param ShipTypeListRequest $request
     * @return array
     */
    public function processGetC(ShipTypeListRequest $request): array;

    /**
     * @param ShipTypeCreateRequest $request
     * @return ShipType
     */
    public function processPost(ShipTypeCreateRequest $request): ShipType;

    /**
     * @param ShipTypeReadRequest $request
     * @return ShipType
     */
    public function processGet(ShipTypeReadRequest $request): ShipType;

    /**
     * @param ShipTypeUpdateRequest $request
     * @return ShipType
     */
    public function processPut(ShipTypeUpdateRequest $request): ShipType;

    /**
     * @param ShipTypeUpdateRequest $request
     * @return ShipType
     */
    public function processPatch(ShipTypeUpdateRequest $request): ShipType;

    /**
     * @param ShipTypeDeleteRequest $request
     * @return ShipType
     */
    public function processDelete(ShipTypeDeleteRequest $request): ShipType;
}
