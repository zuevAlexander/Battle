<?php

namespace CoreBundle\Handler;

use CoreBundle\Entity\MapType;
use CoreBundle\Model\Request\MapType\MapTypeListRequest;
use CoreBundle\Model\Request\MapType\MapTypeCreateRequest;
use CoreBundle\Model\Request\MapType\MapTypeReadRequest;
use CoreBundle\Model\Request\MapType\MapTypeUpdateRequest;
use CoreBundle\Model\Request\MapType\MapTypeDeleteRequest;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerAwareTrait;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use CoreBundle\Model\Handler\MapTypeProcessorInterface;
use CoreBundle\Service\MapType\MapTypeService;

/**
 * Class MapTypeHandler
 */
class MapTypeHandler implements ContainerAwareInterface, MapTypeProcessorInterface
{
    use ContainerAwareTrait;

    /**
     * @var EventDispatcherInterface
     */
    private $eventDispatcher;

    /**
     * @var MapTypeService
     */
    private $mapTypeService;

    /**
     * MapTypeHandler constructor.
     * @param ContainerInterface $container
     * @param EventDispatcherInterface $eventDispatcher
     * @param MapTypeService $mapTypeService
     */
    public function __construct(
        ContainerInterface $container,
        EventDispatcherInterface $eventDispatcher,
        MapTypeService $mapTypeService
    ) {
        $this->setContainer($container);
        $this->eventDispatcher = $eventDispatcher;
        $this->mapTypeService = $mapTypeService;
    }

    /**
     * @inheritdoc
     */
    public function processGetC(MapTypeListRequest $request): array
    {
        return $this->mapTypeService->getEntitiesByWithListRequestAndTotal(
            [],
            $request
        );
    }

    /**
     * @inheritdoc
     */
    public function processPost(MapTypeCreateRequest $request): MapType
    {
        return $this->mapTypeService->updatePost($request);
    }

    /**
     * @inheritdoc
     */
    public function processGet(MapTypeReadRequest $request): MapType
    {
        return $request->getMapType();
    }

    /**
     * @inheritdoc
     */
    public function processPut(MapTypeUpdateRequest $request): MapType
    {
        return $this->mapTypeService->updatePut($request);
    }

    /**
     * @inheritdoc
     */
    public function processPatch(MapTypeUpdateRequest $request): MapType
    {
        return $this->mapTypeService->updatePatch($request);
    }

    /**
     * @inheritdoc
     */
    public function processDelete(MapTypeDeleteRequest $request): MapType
    {
        return $this->mapTypeService->deleteEntity($request->getMapType());
    }
}
