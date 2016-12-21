<?php

namespace CoreBundle\Handler;

use CoreBundle\Entity\ShotStatus;
use CoreBundle\Model\Request\ShotStatus\ShotStatusListRequest;
use CoreBundle\Model\Request\ShotStatus\ShotStatusCreateRequest;
use CoreBundle\Model\Request\ShotStatus\ShotStatusReadRequest;
use CoreBundle\Model\Request\ShotStatus\ShotStatusUpdateRequest;
use CoreBundle\Model\Request\ShotStatus\ShotStatusDeleteRequest;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerAwareTrait;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use CoreBundle\Model\Handler\ShotStatusProcessorInterface;
use CoreBundle\Service\ShotStatus\ShotStatusService;

/**
 * Class ShotStatusHandler
 */
class ShotStatusHandler implements ContainerAwareInterface, ShotStatusProcessorInterface
{
    use ContainerAwareTrait;

    /**
     * @var EventDispatcherInterface
     */
    private $eventDispatcher;

    /**
     * @var ShotStatusService
     */
    private $shotStatusService;

    /**
     * ShotStatusHandler constructor.
     * @param ContainerInterface $container
     * @param EventDispatcherInterface $eventDispatcher
     * @param ShotStatusService $shotStatusService
     */
    public function __construct(
        ContainerInterface $container,
        EventDispatcherInterface $eventDispatcher,
        ShotStatusService $shotStatusService
    ) {
        $this->setContainer($container);
        $this->eventDispatcher = $eventDispatcher;
        $this->shotStatusService = $shotStatusService;
    }

    /**
     * @inheritdoc
     */
    public function processGetC(ShotStatusListRequest $request): array
    {
        return $this->shotStatusService->getEntitiesByWithListRequestAndTotal(
            [],
            $request
        );
    }

    /**
     * @inheritdoc
     */
    public function processPost(ShotStatusCreateRequest $request): ShotStatus
    {
        return $this->shotStatusService->updatePost($request);
    }

    /**
     * @inheritdoc
     */
    public function processGet(ShotStatusReadRequest $request): ShotStatus
    {
        return $request->getShotStatus();
    }

    /**
     * @inheritdoc
     */
    public function processPut(ShotStatusUpdateRequest $request): ShotStatus
    {
        return $this->shotStatusService->updatePut($request);
    }

    /**
     * @inheritdoc
     */
    public function processPatch(ShotStatusUpdateRequest $request): ShotStatus
    {
        return $this->shotStatusService->updatePatch($request);
    }

    /**
     * @inheritdoc
     */
    public function processDelete(ShotStatusDeleteRequest $request): ShotStatus
    {
        return $this->shotStatusService->deleteEntity($request->getShotStatus());
    }
}
