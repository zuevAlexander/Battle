<?php

namespace CoreBundle\Handler;

use CoreBundle\Entity\ShipLocation;
use CoreBundle\Model\Request\ShipLocation\ShipLocationListRequest;
use CoreBundle\Model\Request\ShipLocation\ShipLocationCreateRequest;
use CoreBundle\Model\Request\ShipLocation\ShipLocationReadRequest;
use CoreBundle\Model\Request\ShipLocation\ShipLocationUpdateRequest;
use CoreBundle\Model\Request\ShipLocation\ShipLocationDeleteRequest;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerAwareTrait;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use CoreBundle\Model\Handler\ShipLocationProcessorInterface;
use CoreBundle\Service\ShipLocation\ShipLocationService;

/**
 * Class ShipLocationHandler
 */
class ShipLocationHandler implements ContainerAwareInterface, ShipLocationProcessorInterface
{
    use ContainerAwareTrait;

    /**
     * @var EventDispatcherInterface
     */
    private $eventDispatcher;

    /**
     * @var ShipLocationService
     */
    private $shipLocationService;

    /**
     * ShipLocationHandler constructor.
     * @param ContainerInterface $container
     * @param EventDispatcherInterface $eventDispatcher
     * @param ShipLocationService $shipLocationService
     */
    public function __construct(
        ContainerInterface $container,
        EventDispatcherInterface $eventDispatcher,
        ShipLocationService $shipLocationService
    ) {
        $this->setContainer($container);
        $this->eventDispatcher = $eventDispatcher;
        $this->shipLocationService = $shipLocationService;
    }

    /**
     * @inheritdoc
     */
    public function processGetC(ShipLocationListRequest $request): array
    {
        return $this->shipLocationService->getEntitiesByWithListRequestAndTotal(
            [],
            $request
        );
    }

    /**
     * @inheritdoc
     */
    public function processPost(ShipLocationCreateRequest $request): ShipLocation
    {
        return $this->shipLocationService->updatePost($request);
    }

    /**
     * @inheritdoc
     */
    public function processGet(ShipLocationReadRequest $request): ShipLocation
    {
        return $request->getShipLocation();
    }

    /**
     * @inheritdoc
     */
    public function processPut(ShipLocationUpdateRequest $request): ShipLocation
    {
        return $this->shipLocationService->updatePut($request);
    }

    /**
     * @inheritdoc
     */
    public function processPatch(ShipLocationUpdateRequest $request): ShipLocation
    {
        return $this->shipLocationService->updatePatch($request);
    }

    /**
     * @inheritdoc
     */
    public function processDelete(ShipLocationDeleteRequest $request): ShipLocation
    {
        return $this->shipLocationService->deleteEntity($request->getShipLocation());
    }
}
