<?php

namespace CoreBundle\Model\Handler;

use CoreBundle\Entity\CountShips;
use CoreBundle\Model\Request\CountShips\CountShipsListRequest;
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
}
