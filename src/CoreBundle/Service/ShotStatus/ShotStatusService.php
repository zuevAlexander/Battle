<?php

namespace CoreBundle\Service\ShotStatus;

use CoreBundle\Entity\ShotStatus;
use CoreBundle\Model\Request\ShotStatus\ShotStatusAllRequestInterface;
use CoreBundle\Model\Request\ShotStatus\ShotStatusCreateRequest;
use CoreBundle\Model\Request\ShotStatus\ShotStatusUpdateRequest;
use NorseDigital\Symfony\RestBundle\Service\AbstractService;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use NorseDigital\Symfony\RestBundle\Entity\EntityInterface;

/** @noinspection PhpHierarchyChecksInspection */

/**
 * Class ShotStatusService
 *
 * @method ShotStatus createEntity()
 * @method ShotStatus getEntity(int $id)
 * @method ShotStatus getEntityBy(array $criteria)
 * @method ShotStatus deleteEntity(EntityInterface $entity, bool $flush = true)
 */
class ShotStatusService extends AbstractService implements EventSubscriberInterface, ShotStatusDefaultValuesInterface
{
    use ShotStatusDefaultValuesTrait;

    /**
     * @var EventDispatcherInterface
     */
    private $eventDispatcher;

    /**
     * ShotStatusHandler constructor.
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
     * @param ShotStatusCreateRequest $request
     * @return ShotStatus
     */
    public function updatePost(ShotStatusCreateRequest $request): ShotStatus
    {
        $shotStatus = $this->createEntity();
        $this->setGeneralFields($request, $shotStatus, true);
        $this->saveEntity($shotStatus);
        return $shotStatus;
    }

    /**
     * @param ShotStatusUpdateRequest $request
     * @return ShotStatus
     */
    public function updatePut(ShotStatusUpdateRequest $request): ShotStatus
    {
        $shotStatus = $request->getShotStatus();
        $this->setGeneralFields($request, $shotStatus, true);
        $this->saveEntity($shotStatus);
        return $shotStatus;
    }

    /**
     * @param ShotStatusUpdateRequest $request
     * @return ShotStatus
     */
    public function updatePatch(ShotStatusUpdateRequest $request): ShotStatus
    {
        $shotStatus = $request->getShotStatus();
        $this->setGeneralFields($request, $shotStatus);
        $this->saveEntity($shotStatus);
        return $shotStatus;
    }

    /**
     * @param ShotStatusAllRequestInterface $request
     * @param ShotStatus $shotStatus
     * @param bool $fullUpdate
     * @return ShotStatus
     */
    public function setGeneralFields(ShotStatusAllRequestInterface $request, ShotStatus $shotStatus, $fullUpdate = false)
    {
        if ($request->hasStatusName()) {
            $shotStatus->setStatusName($request->getStatusName());
        } elseif ($fullUpdate) {
            $shotStatus->setStatusName($this->getDefaultStatusName());
        }
        return $shotStatus;
    }
}
