<?php

namespace CoreBundle\Service\BattleStatus;

use CoreBundle\Entity\BattleStatus;
use CoreBundle\Model\Request\BattleStatus\BattleStatusAllRequestInterface;
use CoreBundle\Model\Request\BattleStatus\BattleStatusCreateRequest;
use CoreBundle\Model\Request\BattleStatus\BattleStatusUpdateRequest;
use NorseDigital\Symfony\RestBundle\Service\AbstractService;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use NorseDigital\Symfony\RestBundle\Entity\EntityInterface;

/** @noinspection PhpHierarchyChecksInspection */

/**
 * Class BattleStatusService
 *
 * @method BattleStatus createEntity()
 * @method BattleStatus getEntity(int $id)
 * @method BattleStatus getEntityBy(array $criteria)
 * @method BattleStatus deleteEntity(EntityInterface $entity, bool $flush = true)
 */
class BattleStatusService extends AbstractService implements EventSubscriberInterface, BattleStatusDefaultValuesInterface
{
    use BattleStatusDefaultValuesTrait;

    /**
     * @var EventDispatcherInterface
     */
    private $eventDispatcher;

    /**
     * BattleStatusHandler constructor.
     * @param ContainerInterface $container
     * @param string $entityClass
     * @param EventDispatcherInterface $eventDispatcher
     */
    public function __construct(
        ContainerInterface $container,
        string $entityClass,
        EventDispatcherInterface $eventDispatcher
    ) {
        parent::__construct($container, $entityClass);
        $this->setContainer($container);
        $this->eventDispatcher = $eventDispatcher;
    }

    /**
     * @return array
     */
    public static function getSubscribedEvents()
    {
        return [];
    }

    /**
     * @param BattleStatusCreateRequest $request
     * @return BattleStatus
     */
    public function updatePost(BattleStatusCreateRequest $request): BattleStatus
    {
        $battleStatus = $this->createEntity();
        $this->setGeneralFields($request, $battleStatus, true);
        $this->saveEntity($battleStatus);
        return $battleStatus;
    }

    /**
     * @param BattleStatusUpdateRequest $request
     * @return BattleStatus
     */
    public function updatePut(BattleStatusUpdateRequest $request): BattleStatus
    {
        $battleStatus = $request->getBattleStatus();
        $this->setGeneralFields($request, $battleStatus, true);
        $this->saveEntity($battleStatus);
        return $battleStatus;
    }

    /**
     * @param BattleStatusUpdateRequest $request
     * @return BattleStatus
     */
    public function updatePatch(BattleStatusUpdateRequest $request): BattleStatus
    {
        $battleStatus = $request->getBattleStatus();
        $this->setGeneralFields($request, $battleStatus);
        $this->saveEntity($battleStatus);
        return $battleStatus;
    }

    /**
     * @param BattleStatusAllRequestInterface $request
     * @param BattleStatus $battleStatus
     * @param bool $fullUpdate
     * @return BattleStatus
     */
    public function setGeneralFields(BattleStatusAllRequestInterface $request, BattleStatus $battleStatus, $fullUpdate = false)
    {
        if ($request->hasStatusName()) {
            $battleStatus->setStatusName($request->getStatusName());
        } elseif ($fullUpdate) {
            $battleStatus->setStatusName($this->getDefaultStatusName());
        }
        return $battleStatus;
    }
}
