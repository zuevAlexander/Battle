<?php
namespace CoreBundle\DataFixtures\ORM;

use CoreBundle\Service\BattleStatus\BattleStatusService;
use NorseDigital\Symfony\RestBundle\Entity\EntityInterface;
use NorseDigital\Symfony\RestBundle\Service\AbstractService;

/**
 * Class CandidateStatusFixtures.
 */
class BattleStatusFixtures extends BattleFixtures
{
    protected function createEntity(array $data) : EntityInterface
    {
        $status = $this->getService()->createEntity();

        $status->setStatusName($data['statusName']);

        return $status;
    }

    /**
     * @return AbstractService|BattleStatusService
     */
    protected function getService(): AbstractService
    {
        return $this->container->get('core.service.battle_status');
    }

    public function getOrder()
    {
        return 1;
    }
}
