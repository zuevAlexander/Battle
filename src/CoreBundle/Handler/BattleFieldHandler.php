<?php

namespace CoreBundle\Handler;

use CoreBundle\Entity\BattleField;
use CoreBundle\Model\Request\BattleField\BattleFieldReadRequest;
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
     * @var BattleFieldService
     */
    private $battleFieldService;

    /**
     * BattleFieldHandler constructor.
     * @param ContainerInterface $container
     * @param BattleFieldService $battleFieldService
     */
    public function __construct(
        ContainerInterface $container,
        BattleFieldService $battleFieldService
    ) {
        $this->setContainer($container);
        $this->battleFieldService = $battleFieldService;
    }

    /**
     * @param BattleFieldReadRequest $request
     * @return BattleField
     */
    public function processGet(BattleFieldReadRequest $request): BattleField
    {
        return $this->battleFieldService->getBattleField($request);
    }
}
