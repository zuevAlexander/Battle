<?php
namespace CoreBundle\DataFixtures\ORM;

use CoreBundle\Service\ShotStatus\ShotStatusService;
use NorseDigital\Symfony\RestBundle\Entity\EntityInterface;
use NorseDigital\Symfony\RestBundle\Service\AbstractService;

/**
 * Class ShotStatusFixtures.
 */
class ShotStatusFixtures extends BattleFixtures
{
    protected function createEntity(array $data) : EntityInterface
    {
        $status = $this->getService()->createEntity();

        $status->setStatusName($data['statusName']);

        return $status;
    }

    /**
     * @return AbstractService|ShotStatusService
     */
    protected function getService(): AbstractService
    {
        return $this->container->get('core.service.shot_status');
    }

    public function getOrder()
    {
        return 1;
    }
}
