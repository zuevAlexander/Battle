<?php
namespace CoreBundle\DataFixtures\ORM;

use CoreBundle\Service\ShipType\ShipTypeService;
use NorseDigital\Symfony\RestBundle\Entity\EntityInterface;
use NorseDigital\Symfony\RestBundle\Service\AbstractService;

/**
 * Class ShipTypeService.
 */
class ShipTypeFixtures extends BattleFixtures
{
    protected function createEntity(array $data) : EntityInterface
    {
        $status = $this->getService()->createEntity();

        $status->setTypeName($data['typeName'])
        ->setDeckCount($data['descCount']);

        return $status;
    }

    /**
     * @return AbstractService|ShipTypeService
     */
    protected function getService(): AbstractService
    {
        return $this->container->get('core.service.ship_type');
    }

    public function getOrder()
    {
        return 5;
    }
}
