<?php

namespace CoreBundle\Handler;

use CoreBundle\Entity\Shot;
use CoreBundle\Model\Request\Shot\ShotListRequest;
use CoreBundle\Model\Request\Shot\ShotCreateRequest;
use CoreBundle\Model\Request\Shot\ShotReadRequest;
use CoreBundle\Model\Request\Shot\ShotUpdateRequest;
use CoreBundle\Model\Request\Shot\ShotDeleteRequest;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerAwareTrait;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use CoreBundle\Model\Handler\ShotProcessorInterface;
use CoreBundle\Service\Shot\ShotService;

/**
 * Class ShotHandler
 */
class ShotHandler implements ContainerAwareInterface, ShotProcessorInterface
{
    use ContainerAwareTrait;

    /**
     * @var EventDispatcherInterface
     */
    private $eventDispatcher;

    /**
     * @var ShotService
     */
    private $shotService;

    /**
     * ShotHandler constructor.
     * @param ContainerInterface $container
     * @param EventDispatcherInterface $eventDispatcher
     * @param ShotService $shotService
     */
    public function __construct(
        ContainerInterface $container,
        EventDispatcherInterface $eventDispatcher,
        ShotService $shotService
    ) {
        $this->setContainer($container);
        $this->eventDispatcher = $eventDispatcher;
        $this->shotService = $shotService;
    }

    /**
     * @inheritdoc
     */
    public function processGetC(ShotListRequest $request): array
    {
        return $this->shotService->getEntitiesByWithListRequestAndTotal(
            [],
            $request
        );
    }

    /**
     * @inheritdoc
     */
    public function processPost(ShotCreateRequest $request): Shot
    {
        return $this->shotService->createShot($request);
    }

    /**
     * @inheritdoc
     */
    public function processGet(ShotReadRequest $request): Shot
    {
        return $request->getShot();
    }

    /**
     * @inheritdoc
     */
    public function processPut(ShotUpdateRequest $request): Shot
    {
        return $this->shotService->updatePut($request);
    }

    /**
     * @inheritdoc
     */
    public function processPatch(ShotUpdateRequest $request): Shot
    {
        return $this->shotService->updatePatch($request);
    }

    /**
     * @inheritdoc
     */
    public function processDelete(ShotDeleteRequest $request): Shot
    {
        return $this->shotService->deleteEntity($request->getShot());
    }
}
