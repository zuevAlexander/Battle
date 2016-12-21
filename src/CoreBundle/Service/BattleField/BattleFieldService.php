<?php

namespace CoreBundle\Service\BattleField;

use CoreBundle\Entity\BattleField;
use CoreBundle\Model\Request\BattleField\BattleFieldAllRequestInterface;
use CoreBundle\Model\Request\BattleField\BattleFieldCreateRequest;
use CoreBundle\Model\Request\BattleField\BattleFieldUpdateRequest;
use NorseDigital\Symfony\RestBundle\Service\AbstractService;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use NorseDigital\Symfony\RestBundle\Entity\EntityInterface;

/** @noinspection PhpHierarchyChecksInspection */

/**
 * Class BattleFieldService
 *
 * @method BattleField createEntity()
 * @method BattleField getEntity(int $id)
 * @method BattleField getEntityBy(array $criteria)
 * @method BattleField deleteEntity(EntityInterface $entity, bool $flush = true)
 */
class BattleFieldService extends AbstractService implements EventSubscriberInterface, BattleFieldDefaultValuesInterface
{
    use BattleFieldDefaultValuesTrait;

    /**
     * @var EventDispatcherInterface
     */
    private $eventDispatcher;

    /**
     * BattleFieldHandler constructor.
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
     * @param BattleFieldCreateRequest $request
     * @return BattleField
     */
    public function updatePost(BattleFieldCreateRequest $request): BattleField
    {
        $battleField = $this->createEntity();
        $this->setGeneralFields($request, $battleField, true);
        $this->saveEntity($battleField);
        return $battleField;
    }

    /**
     * @param BattleFieldUpdateRequest $request
     * @return BattleField
     */
    public function updatePut(BattleFieldUpdateRequest $request): BattleField
    {
        $battleField = $request->getBattleField();
        $this->setGeneralFields($request, $battleField, true);
        $this->saveEntity($battleField);
        return $battleField;
    }

    /**
     * @param BattleFieldUpdateRequest $request
     * @return BattleField
     */
    public function updatePatch(BattleFieldUpdateRequest $request): BattleField
    {
        $battleField = $request->getBattleField();
        $this->setGeneralFields($request, $battleField);
        $this->saveEntity($battleField);
        return $battleField;
    }

    /**
     * @param BattleFieldAllRequestInterface $request
     * @param BattleField $battleField
     * @param bool $fullUpdate
     * @return BattleField
     */
    public function setGeneralFields(BattleFieldAllRequestInterface $request, BattleField $battleField, $fullUpdate = false)
    {
        if ($request->hasUser()) {
            $battleField->setUser($request->getUser());
        } elseif ($fullUpdate) {
            $battleField->setUser($this->getDefaultUser());
        }

        if ($request->hasBattle()) {
            $battleField->setBattle($request->getBattle());
        } elseif ($fullUpdate) {
            $battleField->setBattle($this->getDefaultBattle());
        }

        //TODO: list of requests - $request->getShips()
        //if ($request->hasShips()) {
        //    $battleField->setShips(new ArrayCollection());
        //} elseif ($fullUpdate) {
        //    $battleField->setShips($this->getDefaultShips());
        //}

        //TODO: list of requests - $request->getShots()
        //if ($request->hasShots()) {
        //    $battleField->setShots(new ArrayCollection());
        //} elseif ($fullUpdate) {
        //    $battleField->setShots($this->getDefaultShots());
        //}
        return $battleField;
    }
}
