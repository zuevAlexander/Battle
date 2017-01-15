<?php

namespace CoreBundle\Model\Handler;

use CoreBundle\Entity\Ship;
use CoreBundle\Model\Request\Ship\ShipListRequest;
use CoreBundle\Model\Request\Ship\ShipCreateRequest;
use CoreBundle\Model\Request\Ship\ShipReadRequest;
use CoreBundle\Model\Request\Ship\ShipUpdateRequest;
use CoreBundle\Model\Request\Ship\ShipDeleteRequest;
use NorseDigital\Symfony\RestBundle\Handler\ProcessorInterface;

/**
 * Interface ShipProcessorInterface
 */
interface ShipProcessorInterface extends ProcessorInterface
{
    /**
     * @param ShipCreateRequest $request
     * @return Ship
     */
    public function processPost(ShipCreateRequest $request): Ship;

    /**
     * @param ShipReadRequest $request
     * @return Ship
     */
    public function processGet(ShipReadRequest $request): Ship;

    /**
     * @param ShipUpdateRequest $request
     * @return Ship
     */
    public function processPut(ShipUpdateRequest $request): Ship;

    /**
     * @param ShipUpdateRequest $request
     * @return Ship
     */
    public function processPatch(ShipUpdateRequest $request): Ship;

    /**
     * @param ShipDeleteRequest $request
     * @return Ship
     */
    public function processDelete(ShipDeleteRequest $request): Ship;
}
