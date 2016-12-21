<?php

namespace CoreBundle\Service\Battle;

use CoreBundle\Entity\Battle;
use CoreBundle\Model\Request\Battle\BattleAllRequestInterface;
use CoreBundle\Model\Request\Battle\BattleCreateRequest;
use CoreBundle\Model\Request\Battle\BattleUpdateRequest;
use NorseDigital\Symfony\RestBundle\Service\AbstractService;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use NorseDigital\Symfony\RestBundle\Entity\EntityInterface;

/** @noinspection PhpHierarchyChecksInspection */

/**
 * Class BattleService
 *
 * @method Battle createEntity()
 * @method Battle getEntity(int $id)
 * @method Battle getEntityBy(array $criteria)
 * @method Battle deleteEntity(EntityInterface $entity, bool $flush = true)
 */
class BattleService extends AbstractService implements EventSubscriberInterface, BattleDefaultValuesInterface
{
    use BattleDefaultValuesTrait;

    /**
     * @var EventDispatcherInterface
     */
    private $eventDispatcher;

    /**
     * BattleHandler constructor.
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
     * @param BattleCreateRequest $request
     * @return Battle
     */
    public function updatePost(BattleCreateRequest $request): Battle
    {
        $battle = $this->createEntity();
        $this->setGeneralFields($request, $battle, true);
        $this->saveEntity($battle);
        return $battle;
    }

    /**
     * @param BattleUpdateRequest $request
     * @return Battle
     */
    public function updatePut(BattleUpdateRequest $request): Battle
    {
        $battle = $request->getBattle();
        $this->setGeneralFields($request, $battle, true);
        $this->saveEntity($battle);
        return $battle;
    }

    /**
     * @param BattleUpdateRequest $request
     * @return Battle
     */
    public function updatePatch(BattleUpdateRequest $request): Battle
    {
        $battle = $request->getBattle();
        $this->setGeneralFields($request, $battle);
        $this->saveEntity($battle);
        $em = $this->container->get('doctrine')->getEntityManager();
        $em->getRepository('...')->find($id);
        return $battle;
    }

    /**
     * @param BattleAllRequestInterface $request
     * @param Battle $battle
     * @param bool $fullUpdate
     * @return Battle
     */
    public function setGeneralFields(BattleAllRequestInterface $request, Battle $battle, $fullUpdate = false)
    {
        if ($request->hasBattleStatus()) {
            $battle->setBattleStatus($request->getBattleStatus());
        } elseif ($fullUpdate) {
            $battle->setBattleStatus($this->getDefaultBattleStatus());
        }

        if ($request->hasMapType()) {
            $battle->setMapType($request->getMapType());
        } elseif ($fullUpdate) {
            $battle->setMapType($this->getDefaultMapType());
        }

        if ($request->hasName()) {
            $battle->setName($request->getName());
        } elseif ($fullUpdate) {
            $battle->setName($this->getDefaultName());
        }
        return $battle;
    }
}
