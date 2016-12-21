<?php

namespace CoreBundle\Handler;

use CoreBundle\Entity\Map;
use CoreBundle\Model\Request\Map\MapListRequest;
use CoreBundle\Model\Request\Map\MapCreateRequest;
use CoreBundle\Model\Request\Map\MapReadRequest;
use CoreBundle\Model\Request\Map\MapUpdateRequest;
use CoreBundle\Model\Request\Map\MapDeleteRequest;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerAwareTrait;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use CoreBundle\Model\Handler\MapProcessorInterface;
use CoreBundle\Service\Map\MapService;

/**
 * Class MapHandler
 */
class MapHandler implements ContainerAwareInterface, MapProcessorInterface
{
    use ContainerAwareTrait;

    /**
     * @var EventDispatcherInterface
     */
    private $eventDispatcher;

    /**
     * @var MapService
     */
    private $mapService;

    /**
     * MapHandler constructor.
     * @param ContainerInterface $container
     * @param EventDispatcherInterface $eventDispatcher
     * @param MapService $mapService
     */
    public function __construct(
        ContainerInterface $container,
        EventDispatcherInterface $eventDispatcher,
        MapService $mapService
    ) {
        $this->setContainer($container);
        $this->eventDispatcher = $eventDispatcher;
        $this->mapService = $mapService;
    }

    /**
     * @inheritdoc
     */
    public function processGetC(MapListRequest $request): array
    {
        return $this->mapService->getEntitiesByWithListRequestAndTotal(
            [],
            $request
        );
    }

    /**
     * @inheritdoc
     */
    public function processPost(MapCreateRequest $request): Map
    {
        return $this->mapService->updatePost($request);
    }

    /**
     * @inheritdoc
     */
    public function processGet(MapReadRequest $request): Map
    {
        return $request->getMap();
    }

    /**
     * @inheritdoc
     */
    public function processPut(MapUpdateRequest $request): Map
    {
        return $this->mapService->updatePut($request);
    }

    /**
     * @inheritdoc
     */
    public function processPatch(MapUpdateRequest $request): Map
    {
        return $this->mapService->updatePatch($request);
    }

    /**
     * @inheritdoc
     */
    public function processDelete(MapDeleteRequest $request): Map
    {
        return $this->mapService->deleteEntity($request->getMap());
    }
}
