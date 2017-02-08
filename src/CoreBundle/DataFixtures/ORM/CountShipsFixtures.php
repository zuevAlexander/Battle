<?php
namespace CoreBundle\DataFixtures\ORM;

use CoreBundle\Entity\MapType;
use CoreBundle\Entity\ShipType;
use CoreBundle\Service\CountShips\CountShipsService;
use NorseDigital\Symfony\RestBundle\Entity\EntityInterface;
use NorseDigital\Symfony\RestBundle\Service\AbstractService;

/**
 * Class CountShipsFixtures.
 */
class CountShipsFixtures extends BattleFixtures
{
    protected function createEntity(array $data) : EntityInterface
    {
        $status = $this->getService()->createEntity();

        /** @var ShipType $shipType */
        $shipType = $this->getReference($data['shipType']);

        /** @var MapType $mapType */
        $mapType = $this->getReference($data['mapType']);

        $status->setShipType($shipType)
            ->setMapType($mapType)
            ->setCount($data['count']);

        return $status;
    }

    /**
     * @return AbstractService|CountShipsService
     */
    protected function getService(): AbstractService
    {
        return $this->container->get('core.service.count_ships');
    }

    public function getOrder()
    {
        return 10;
    }
}
