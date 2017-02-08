<?php
namespace CoreBundle\DataFixtures\ORM;

use CoreBundle\Service\Map\MapService;
use NorseDigital\Symfony\RestBundle\Entity\EntityInterface;
use NorseDigital\Symfony\RestBundle\Service\AbstractService;

/**
 * Class MapService.
 */
class MapFixtures extends BattleFixtures
{
    protected function createEntity(array $data) : EntityInterface
    {
        $status = $this->getService()->createEntity();

        $status->setLatitude($data['latitude'])
        ->setLongitude($data['longitude']);

        return $status;
    }

    /**
     * @return AbstractService|MapService
     */
    protected function getService(): AbstractService
    {
        return $this->container->get('core.service.map');
    }

    public function getOrder()
    {
        return 5;
    }
}
