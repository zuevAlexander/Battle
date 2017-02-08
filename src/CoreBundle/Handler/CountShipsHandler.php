<?php

namespace CoreBundle\Handler;

use CoreBundle\Entity\CountShips;
use CoreBundle\Model\Request\CountShips\CountShipsListRequest;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerAwareTrait;
use Symfony\Component\DependencyInjection\ContainerInterface;
use CoreBundle\Model\Handler\CountShipsProcessorInterface;
use CoreBundle\Service\CountShips\CountShipsService;

/**
 * Class CountShipsHandler
 */
class CountShipsHandler implements ContainerAwareInterface, CountShipsProcessorInterface
{
    use ContainerAwareTrait;

    /**
     * @var CountShipsService
     */
    private $countShipsService;

    /**
     * CountShipsHandler constructor.
     * @param ContainerInterface $container
     * @param CountShipsService $countShipsService
     */
    public function __construct(
        ContainerInterface $container,
        CountShipsService $countShipsService
    ) {
        $this->setContainer($container);
        $this->countShipsService = $countShipsService;
    }

    /**
     * @param CountShipsListRequest $request
     * @return array
     */
    public function processGetC(CountShipsListRequest $request): array
    {
        return $this->countShipsService->getEntitiesByWithListRequestAndTotal([], $request);
    }
}
