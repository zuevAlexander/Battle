<?php

namespace CoreBundle\Handler;

use CoreBundle\Entity\ShotType;
use CoreBundle\Model\Request\ShotType\ShotTypeListRequest;
use CoreBundle\Model\Request\ShotType\ShotTypeCreateRequest;
use CoreBundle\Model\Request\ShotType\ShotTypeReadRequest;
use CoreBundle\Model\Request\ShotType\ShotTypeUpdateRequest;
use CoreBundle\Model\Request\ShotType\ShotTypeDeleteRequest;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerAwareTrait;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use CoreBundle\Model\Handler\ShotTypeProcessorInterface;
use CoreBundle\Service\ShotType\ShotTypeService;

/**
 * Class ShotTypeHandler
 */
class ShotTypeHandler implements ContainerAwareInterface, ShotTypeProcessorInterface
{
    use ContainerAwareTrait;

    /**
     * @var EventDispatcherInterface
     */
    private $eventDispatcher;

    /**
     * @var ShotTypeService
     */
    private $shotTypeService;

    /**
     * ShotTypeHandler constructor.
     * @param ContainerInterface $container
     * @param EventDispatcherInterface $eventDispatcher
     * @param ShotTypeService $shotTypeService
     */
    public function __construct(
        ContainerInterface $container,
        EventDispatcherInterface $eventDispatcher,
        ShotTypeService $shotTypeService
    ) {
        $this->setContainer($container);
        $this->eventDispatcher = $eventDispatcher;
        $this->shotTypeService = $shotTypeService;
    }

    /**
     * @inheritdoc
     */
    public function processGetC(ShotTypeListRequest $request): array
    {
        return $this->shotTypeService->getEntitiesByWithListRequestAndTotal(
            [],
            $request
        );
    }

    /**
     * @inheritdoc
     */
    public function processPost(ShotTypeCreateRequest $request): ShotType
    {
        return $this->shotTypeService->updatePost($request);
    }

    /**
     * @inheritdoc
     */
    public function processGet(ShotTypeReadRequest $request): ShotType
    {
        return $request->getShotType();
    }

    /**
     * @inheritdoc
     */
    public function processPut(ShotTypeUpdateRequest $request): ShotType
    {
        return $this->shotTypeService->updatePut($request);
    }

    /**
     * @inheritdoc
     */
    public function processPatch(ShotTypeUpdateRequest $request): ShotType
    {
        return $this->shotTypeService->updatePatch($request);
    }

    /**
     * @inheritdoc
     */
    public function processDelete(ShotTypeDeleteRequest $request): ShotType
    {
        return $this->shotTypeService->deleteEntity($request->getShotType());
    }
}
