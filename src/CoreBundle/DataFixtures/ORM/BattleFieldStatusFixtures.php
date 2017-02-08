<?php
namespace CoreBundle\DataFixtures\ORM;

use CoreBundle\Service\BattleFieldStatus\BattleFieldStatusService;
use NorseDigital\Symfony\RestBundle\Entity\EntityInterface;
use NorseDigital\Symfony\RestBundle\Service\AbstractService;

/**
 * Class BattleFieldStatusFixtures.
 */
class BattleFieldStatusFixtures extends BattleFixtures
{
    protected function createEntity(array $data) : EntityInterface
    {
        $status = $this->getService()->createEntity();

        $status->setStatusName($data['statusName']);

        return $status;
    }

    /**
     * @return AbstractService|BattleFieldStatusService
     */
    protected function getService(): AbstractService
    {
        return $this->container->get('core.service.battle_field_status');
    }

    public function getOrder()
    {
        return 2;
    }
}
