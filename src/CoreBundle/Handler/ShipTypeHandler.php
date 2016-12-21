<?php

namespace CoreBundle\Handler;

use CoreBundle\Entity\ShipType;
use CoreBundle\Model\Request\ShipType\ShipTypeListRequest;
use CoreBundle\Model\Request\ShipType\ShipTypeCreateRequest;
use CoreBundle\Model\Request\ShipType\ShipTypeReadRequest;
use CoreBundle\Model\Request\ShipType\ShipTypeUpdateRequest;
use CoreBundle\Model\Request\ShipType\ShipTypeDeleteRequest;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerAwareTrait;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use CoreBundle\Model\Handler\ShipTypeProcessorInterface;
use CoreBundle\Service\ShipType\ShipTypeService;

/**
 * Class ShipTypeHandler
 */
class ShipTypeHandler implements ContainerAwareInterface, ShipTypeProcessorInterface
{
    use ContainerAwareTrait;

    /**
     * @var EventDispatcherInterface
     */
    private $eventDispatcher;

    /**
     * @var ShipTypeService
     */
    private $shipTypeService;

    /**
     * ShipTypeHandler constructor.
     * @param ContainerInterface $container
     * @param EventDispatcherInterface $eventDispatcher
     * @param ShipTypeService $shipTypeService
     */
    public function __construct(
        ContainerInterface $container,
        EventDispatcherInterface $eventDispatcher,
        ShipTypeService $shipTypeService
    ) {
        $this->setContainer($container);
        $this->eventDispatcher = $eventDispatcher;
        $this->shipTypeService = $shipTypeService;
    }

    /**
     * @inheritdoc
     */
    public function processGetC(ShipTypeListRequest $request): array
    {
        return $this->shipTypeService->getEntitiesByWithListRequestAndTotal(
            [],
            $request
        );
    }

    /**
     * @inheritdoc
     */
    public function processPost(ShipTypeCreateRequest $request): ShipType
    {
        return $this->shipTypeService->updatePost($request);
    }

    /**
     * @inheritdoc
     */
    public function processGet(ShipTypeReadRequest $request): ShipType
    {
        return $request->getShipType();
    }

    /**
     * @inheritdoc
     */
    public function processPut(ShipTypeUpdateRequest $request): ShipType
    {
        return $this->shipTypeService->updatePut($request);
    }

    /**
     * @inheritdoc
     */
    public function processPatch(ShipTypeUpdateRequest $request): ShipType
    {
        return $this->shipTypeService->updatePatch($request);
    }

    /**
     * @inheritdoc
     */
    public function processDelete(ShipTypeDeleteRequest $request): ShipType
    {
        return $this->shipTypeService->deleteEntity($request->getShipType());
    }
}
