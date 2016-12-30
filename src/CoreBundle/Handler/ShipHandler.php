<?php

namespace CoreBundle\Handler;

use CoreBundle\Entity\Ship;
use CoreBundle\Model\Request\Ship\ShipListRequest;
use CoreBundle\Model\Request\Ship\ShipCreateRequest;
use CoreBundle\Model\Request\Ship\ShipReadRequest;
use CoreBundle\Model\Request\Ship\ShipUpdateRequest;
use CoreBundle\Model\Request\Ship\ShipDeleteRequest;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerAwareTrait;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use CoreBundle\Model\Handler\ShipProcessorInterface;
use CoreBundle\Service\Ship\ShipService;

/**
 * Class ShipHandler
 */
class ShipHandler implements ContainerAwareInterface, ShipProcessorInterface
{
    use ContainerAwareTrait;

    /**
     * @var EventDispatcherInterface
     */
    private $eventDispatcher;

    /**
     * @var ShipService
     */
    private $shipService;

    /**
     * ShipHandler constructor.
     * @param ContainerInterface $container
     * @param EventDispatcherInterface $eventDispatcher
     * @param ShipService $shipService
     */
    public function __construct(
        ContainerInterface $container,
        EventDispatcherInterface $eventDispatcher,
        ShipService $shipService
    ) {
        $this->setContainer($container);
        $this->eventDispatcher = $eventDispatcher;
        $this->shipService = $shipService;
    }

    /**
     * @inheritdoc
     */
    public function processGetC(ShipListRequest $request): array
    {
        return $this->shipService->getEntitiesByWithListRequestAndTotal(
            [],
            $request
        );
    }

    /**
     * @inheritdoc
     */
    public function processPost(ShipCreateRequest $request): Ship
    {
//        return $this->shipService->updatePost($request);
        return $this->shipService->createShip($request, $this->shipService->createEntity());
    }

    /**
     * @inheritdoc
     */
    public function processGet(ShipReadRequest $request): Ship
    {
        return $request->getShip();
    }

    /**
     * @inheritdoc
     */
    public function processPut(ShipUpdateRequest $request): Ship
    {
        return $this->shipService->updatePut($request);
    }

    /**
     * @inheritdoc
     */
    public function processPatch(ShipUpdateRequest $request): Ship
    {
        return $this->shipService->updatePatch($request);
    }

    /**
     * @inheritdoc
     */
    public function processDelete(ShipDeleteRequest $request): Ship
    {
        return $this->shipService->deleteEntity($request->getShip());
    }
}
