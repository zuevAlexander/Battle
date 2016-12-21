<?php

namespace CoreBundle\Service\Shot;

use CoreBundle\Entity\Shot;
use CoreBundle\Model\Request\Shot\ShotAllRequestInterface;
use CoreBundle\Model\Request\Shot\ShotCreateRequest;
use CoreBundle\Model\Request\Shot\ShotUpdateRequest;
use NorseDigital\Symfony\RestBundle\Service\AbstractService;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use NorseDigital\Symfony\RestBundle\Entity\EntityInterface;

/** @noinspection PhpHierarchyChecksInspection */

/**
 * Class ShotService
 *
 * @method Shot createEntity()
 * @method Shot getEntity(int $id)
 * @method Shot getEntityBy(array $criteria)
 * @method Shot deleteEntity(EntityInterface $entity, bool $flush = true)
 */
class ShotService extends AbstractService implements EventSubscriberInterface, ShotDefaultValuesInterface
{
    use ShotDefaultValuesTrait;

    /**
     * @var EventDispatcherInterface
     */
    private $eventDispatcher;

    /**
     * ShotHandler constructor.
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
     * @param ShotCreateRequest $request
     * @return Shot
     */
    public function updatePost(ShotCreateRequest $request): Shot
    {
        $shot = $this->createEntity();
        $this->setGeneralFields($request, $shot, true);
        $this->saveEntity($shot);
        return $shot;
    }

    /**
     * @param ShotUpdateRequest $request
     * @return Shot
     */
    public function updatePut(ShotUpdateRequest $request): Shot
    {
        $shot = $request->getShot();
        $this->setGeneralFields($request, $shot, true);
        $this->saveEntity($shot);
        return $shot;
    }

    /**
     * @param ShotUpdateRequest $request
     * @return Shot
     */
    public function updatePatch(ShotUpdateRequest $request): Shot
    {
        $shot = $request->getShot();
        $this->setGeneralFields($request, $shot);
        $this->saveEntity($shot);
        return $shot;
    }

    /**
     * @param ShotAllRequestInterface $request
     * @param Shot $shot
     * @param bool $fullUpdate
     * @return Shot
     */
    public function setGeneralFields(ShotAllRequestInterface $request, Shot $shot, $fullUpdate = false)
    {
        if ($request->hasUser()) {
            $shot->setUser($request->getUser());
        } elseif ($fullUpdate) {
            $shot->setUser($this->getDefaultUser());
        }

        if ($request->hasMap()) {
            $shot->setMap($request->getMap());
        } elseif ($fullUpdate) {
            $shot->setMap($this->getDefaultMap());
        }

        if ($request->hasShotStatus()) {
            $shot->setShotStatus($request->getShotStatus());
        } elseif ($fullUpdate) {
            $shot->setShotStatus($this->getDefaultShotStatus());
        }

        if ($request->hasBattleField()) {
            $shot->setBattleField($request->getBattleField());
        } elseif ($fullUpdate) {
            $shot->setBattleField($this->getDefaultBattleField());
        }
        return $shot;
    }
}
