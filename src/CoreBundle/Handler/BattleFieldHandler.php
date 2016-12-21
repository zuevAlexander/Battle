<?php

namespace CoreBundle\Handler;

use CoreBundle\Entity\BattleField;
use CoreBundle\Model\Request\BattleField\BattleFieldListRequest;
use CoreBundle\Model\Request\BattleField\BattleFieldCreateRequest;
use CoreBundle\Model\Request\BattleField\BattleFieldReadRequest;
use CoreBundle\Model\Request\BattleField\BattleFieldUpdateRequest;
use CoreBundle\Model\Request\BattleField\BattleFieldDeleteRequest;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerAwareTrait;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use CoreBundle\Model\Handler\BattleFieldProcessorInterface;
use CoreBundle\Service\BattleField\BattleFieldService;

/**
 * Class BattleFieldHandler
 */
class BattleFieldHandler implements ContainerAwareInterface, BattleFieldProcessorInterface
{
    use ContainerAwareTrait;

    /**
     * @var EventDispatcherInterface
     */
    private $eventDispatcher;

    /**
     * @var BattleFieldService
     */
    private $battleFieldService;

    /**
     * BattleFieldHandler constructor.
     * @param ContainerInterface $container
     * @param EventDispatcherInterface $eventDispatcher
     * @param BattleFieldService $battleFieldService
     */
    public function __construct(
        ContainerInterface $container,
        EventDispatcherInterface $eventDispatcher,
        BattleFieldService $battleFieldService
    ) {
        $this->setContainer($container);
        $this->eventDispatcher = $eventDispatcher;
        $this->battleFieldService = $battleFieldService;
    }

    /**
     * @inheritdoc
     */
    public function processGetC(BattleFieldListRequest $request): array
    {
        return $this->battleFieldService->getEntitiesByWithListRequestAndTotal(
            [],
            $request
        );
    }

    /**
     * @inheritdoc
     */
    public function processPost(BattleFieldCreateRequest $request): BattleField
    {
        return $this->battleFieldService->updatePost($request);
    }

    /**
     * @inheritdoc
     */
    public function processGet(BattleFieldReadRequest $request): BattleField
    {
        return $request->getBattleField();
    }

    /**
     * @inheritdoc
     */
    public function processPut(BattleFieldUpdateRequest $request): BattleField
    {
        return $this->battleFieldService->updatePut($request);
    }

    /**
     * @inheritdoc
     */
    public function processPatch(BattleFieldUpdateRequest $request): BattleField
    {
        return $this->battleFieldService->updatePatch($request);
    }

    /**
     * @inheritdoc
     */
    public function processDelete(BattleFieldDeleteRequest $request): BattleField
    {
        return $this->battleFieldService->deleteEntity($request->getBattleField());
    }
}
