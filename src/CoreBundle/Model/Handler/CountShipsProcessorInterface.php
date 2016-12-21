<?php

namespace CoreBundle\Model\Handler;

use CoreBundle\Entity\CountShips;
use CoreBundle\Model\Request\CountShips\CountShipsListRequest;
use CoreBundle\Model\Request\CountShips\CountShipsCreateRequest;
use CoreBundle\Model\Request\CountShips\CountShipsReadRequest;
use CoreBundle\Model\Request\CountShips\CountShipsUpdateRequest;
use CoreBundle\Model\Request\CountShips\CountShipsDeleteRequest;
use NorseDigital\Symfony\RestBundle\Handler\ProcessorInterface;

/**
 * Interface CountShipsProcessorInterface
 */
interface CountShipsProcessorInterface extends ProcessorInterface
{
    /**
     * @param CountShipsListRequest $request
     * @return array
     */
    public function processGetC(CountShipsListRequest $request): array;

    /**
     * @param CountShipsCreateRequest $request
     * @return CountShips
     */
    public function processPost(CountShipsCreateRequest $request): CountShips;

    /**
     * @param CountShipsReadRequest $request
     * @return CountShips
     */
    public function processGet(CountShipsReadRequest $request): CountShips;

    /**
     * @param CountShipsUpdateRequest $request
     * @return CountShips
     */
    public function processPut(CountShipsUpdateRequest $request): CountShips;

    /**
     * @param CountShipsUpdateRequest $request
     * @return CountShips
     */
    public function processPatch(CountShipsUpdateRequest $request): CountShips;

    /**
     * @param CountShipsDeleteRequest $request
     * @return CountShips
     */
    public function processDelete(CountShipsDeleteRequest $request): CountShips;
}
