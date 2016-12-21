<?php

namespace CoreBundle\Service\ShotType;

use CoreBundle\Entity\ShotType;
use CoreBundle\Model\Request\ShotType\ShotTypeAllRequestInterface;
use CoreBundle\Model\Request\ShotType\ShotTypeCreateRequest;
use CoreBundle\Model\Request\ShotType\ShotTypeUpdateRequest;
use NorseDigital\Symfony\RestBundle\Service\AbstractService;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use NorseDigital\Symfony\RestBundle\Entity\EntityInterface;

/** @noinspection PhpHierarchyChecksInspection */

/**
 * Class ShotTypeService
 *
 * @method ShotType createEntity()
 * @method ShotType getEntity(int $id)
 * @method ShotType getEntityBy(array $criteria)
 * @method ShotType deleteEntity(EntityInterface $entity, bool $flush = true)
 */
class ShotTypeService extends AbstractService implements EventSubscriberInterface, ShotTypeDefaultValuesInterface
{
    use ShotTypeDefaultValuesTrait;

    /**
     * @var EventDispatcherInterface
     */
    private $eventDispatcher;

    /**
     * ShotTypeHandler constructor.
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
     * @param ShotTypeCreateRequest $request
     * @return ShotType
     */
    public function updatePost(ShotTypeCreateRequest $request): ShotType
    {
        $shotType = $this->createEntity();
        $this->setGeneralFields($request, $shotType, true);
        $this->saveEntity($shotType);
        return $shotType;
    }

    /**
     * @param ShotTypeUpdateRequest $request
     * @return ShotType
     */
    public function updatePut(ShotTypeUpdateRequest $request): ShotType
    {
        $shotType = $request->getShotType();
        $this->setGeneralFields($request, $shotType, true);
        $this->saveEntity($shotType);
        return $shotType;
    }

    /**
     * @param ShotTypeUpdateRequest $request
     * @return ShotType
     */
    public function updatePatch(ShotTypeUpdateRequest $request): ShotType
    {
        $shotType = $request->getShotType();
        $this->setGeneralFields($request, $shotType);
        $this->saveEntity($shotType);
        return $shotType;
    }

    /**
     * @param ShotTypeAllRequestInterface $request
     * @param ShotType $shotType
     * @param bool $fullUpdate
     * @return ShotType
     */
    public function setGeneralFields(ShotTypeAllRequestInterface $request, ShotType $shotType, $fullUpdate = false)
    {
        if ($request->hasTypeName()) {
            $shotType->setTypeName($request->getTypeName());
        } elseif ($fullUpdate) {
            $shotType->setTypeName($this->getDefaultTypeName());
        }
        return $shotType;
    }
}
