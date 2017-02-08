<?php
namespace CoreBundle\DataFixtures\ORM;

use CoreBundle\Service\MapType\MapTypeService;
use NorseDigital\Symfony\RestBundle\Entity\EntityInterface;
use NorseDigital\Symfony\RestBundle\Service\AbstractService;

/**
 * Class MapTypeService.
 */
class MapTypeFixtures extends BattleFixtures
{
    protected function createEntity(array $data) : EntityInterface
    {
        $status = $this->getService()->createEntity();

        $status->setTypeName($data['typeName'])
        ->setSize($data['size']);

        return $status;
    }

    /**
     * @return AbstractService|MapTypeService
     */
    protected function getService(): AbstractService
    {
        return $this->container->get('core.service.map_type');
    }

    public function getOrder()
    {
        return 5;
    }
}
