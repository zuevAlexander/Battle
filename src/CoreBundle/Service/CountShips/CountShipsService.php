<?php

namespace CoreBundle\Service\CountShips;

use CoreBundle\Entity\CountShips;
use CoreBundle\Model\Request\CountShips\CountShipsAllRequestInterface;
use CoreBundle\Model\Request\CountShips\CountShipsCreateRequest;
use CoreBundle\Model\Request\CountShips\CountShipsUpdateRequest;
use NorseDigital\Symfony\RestBundle\Service\AbstractService;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use NorseDigital\Symfony\RestBundle\Entity\EntityInterface;

/** @noinspection PhpHierarchyChecksInspection */

/**
 * Class CountShipsService
 *
 * @method CountShips createEntity()
 * @method CountShips getEntity(int $id)
 * @method CountShips getEntityBy(array $criteria)
 * @method CountShips deleteEntity(EntityInterface $entity, bool $flush = true)
 */
class CountShipsService extends AbstractService implements EventSubscriberInterface, CountShipsDefaultValuesInterface
{
    use CountShipsDefaultValuesTrait;

    /**
     * @var EventDispatcherInterface
     */
    private $eventDispatcher;

    /**
     * CountShipsHandler constructor.
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
     * @param CountShipsCreateRequest $request
     * @return CountShips
     */
    public function updatePost(CountShipsCreateRequest $request): CountShips
    {
        $countShips = $this->createEntity();
        $this->setGeneralFields($request, $countShips, true);
        $this->saveEntity($countShips);
        return $countShips;
    }

    /**
     * @param CountShipsUpdateRequest $request
     * @return CountShips
     */
    public function updatePut(CountShipsUpdateRequest $request): CountShips
    {
        $countShips = $request->getCountShips();
        $this->setGeneralFields($request, $countShips, true);
        $this->saveEntity($countShips);
        return $countShips;
    }

    /**
     * @param CountShipsUpdateRequest $request
     * @return CountShips
     */
    public function updatePatch(CountShipsUpdateRequest $request): CountShips
    {
        $countShips = $request->getCountShips();
        $this->setGeneralFields($request, $countShips);
        $this->saveEntity($countShips);
        return $countShips;
    }

    /**
     * @param CountShipsAllRequestInterface $request
     * @param CountShips $countShips
     * @param bool $fullUpdate
     * @return CountShips
     */
    public function setGeneralFields(CountShipsAllRequestInterface $request, CountShips $countShips, $fullUpdate = false)
    {
        if ($request->hasShipType()) {
            $countShips->setShipType($request->getShipType());
        } elseif ($fullUpdate) {
            $countShips->setShipType($this->getDefaultShipType());
        }

        if ($request->hasMapType()) {
            $countShips->setMapType($request->getMapType());
        } elseif ($fullUpdate) {
            $countShips->setMapType($this->getDefaultMapType());
        }

        if ($request->hasCount()) {
            $countShips->setCount($request->getCount());
        } elseif ($fullUpdate) {
            $countShips->setCount($this->getDefaultCount());
        }
        return $countShips;
    }
}
