<?php

namespace CoreBundle\Handler;

use CoreBundle\Entity\CountShips;
use CoreBundle\Model\Request\CountShips\CountShipsListRequest;
use CoreBundle\Model\Request\CountShips\CountShipsCreateRequest;
use CoreBundle\Model\Request\CountShips\CountShipsReadRequest;
use CoreBundle\Model\Request\CountShips\CountShipsUpdateRequest;
use CoreBundle\Model\Request\CountShips\CountShipsDeleteRequest;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerAwareTrait;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use CoreBundle\Model\Handler\CountShipsProcessorInterface;
use CoreBundle\Service\CountShips\CountShipsService;

/**
 * Class CountShipsHandler
 */
class CountShipsHandler implements ContainerAwareInterface, CountShipsProcessorInterface
{
    use ContainerAwareTrait;

    /**
     * @var EventDispatcherInterface
     */
    private $eventDispatcher;

    /**
     * @var CountShipsService
     */
    private $countShipsService;

    /**
     * CountShipsHandler constructor.
     * @param ContainerInterface $container
     * @param EventDispatcherInterface $eventDispatcher
     * @param CountShipsService $countShipsService
     */
    public function __construct(
        ContainerInterface $container,
        EventDispatcherInterface $eventDispatcher,
        CountShipsService $countShipsService
    ) {
        $this->setContainer($container);
        $this->eventDispatcher = $eventDispatcher;
        $this->countShipsService = $countShipsService;
    }

    /**
     * @inheritdoc
     */
    public function processGetC(CountShipsListRequest $request): array
    {
        return $this->countShipsService->getEntitiesByWithListRequestAndTotal(
            [],
            $request
        );
    }

    /**
     * @inheritdoc
     */
    public function processPost(CountShipsCreateRequest $request): CountShips
    {
        return $this->countShipsService->updatePost($request);
    }

    /**
     * @inheritdoc
     */
    public function processGet(CountShipsReadRequest $request): CountShips
    {
        return $request->getCountShips();
    }

    /**
     * @inheritdoc
     */
    public function processPut(CountShipsUpdateRequest $request): CountShips
    {
        return $this->countShipsService->updatePut($request);
    }

    /**
     * @inheritdoc
     */
    public function processPatch(CountShipsUpdateRequest $request): CountShips
    {
        return $this->countShipsService->updatePatch($request);
    }

    /**
     * @inheritdoc
     */
    public function processDelete(CountShipsDeleteRequest $request): CountShips
    {
        return $this->countShipsService->deleteEntity($request->getCountShips());
    }
}
