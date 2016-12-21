<?php

namespace CoreBundle\Model\Handler;

use CoreBundle\Entity\ShipLocation;
use CoreBundle\Model\Request\ShipLocation\ShipLocationListRequest;
use CoreBundle\Model\Request\ShipLocation\ShipLocationCreateRequest;
use CoreBundle\Model\Request\ShipLocation\ShipLocationReadRequest;
use CoreBundle\Model\Request\ShipLocation\ShipLocationUpdateRequest;
use CoreBundle\Model\Request\ShipLocation\ShipLocationDeleteRequest;
use NorseDigital\Symfony\RestBundle\Handler\ProcessorInterface;

/**
 * Interface ShipLocationProcessorInterface
 */
interface ShipLocationProcessorInterface extends ProcessorInterface
{
    /**
     * @param ShipLocationListRequest $request
     * @return array
     */
    public function processGetC(ShipLocationListRequest $request): array;

    /**
     * @param ShipLocationCreateRequest $request
     * @return ShipLocation
     */
    public function processPost(ShipLocationCreateRequest $request): ShipLocation;

    /**
     * @param ShipLocationReadRequest $request
     * @return ShipLocation
     */
    public function processGet(ShipLocationReadRequest $request): ShipLocation;

    /**
     * @param ShipLocationUpdateRequest $request
     * @return ShipLocation
     */
    public function processPut(ShipLocationUpdateRequest $request): ShipLocation;

    /**
     * @param ShipLocationUpdateRequest $request
     * @return ShipLocation
     */
    public function processPatch(ShipLocationUpdateRequest $request): ShipLocation;

    /**
     * @param ShipLocationDeleteRequest $request
     * @return ShipLocation
     */
    public function processDelete(ShipLocationDeleteRequest $request): ShipLocation;
}
