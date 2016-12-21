<?php

namespace CoreBundle\Service\Battle;

use CoreBundle\Entity\BattleStatus;
use CoreBundle\Entity\MapType;

/**
 * Trait BattleDefaultValuesTrait;
 */
trait BattleDefaultValuesTrait
{
    /**
     * @return BattleStatus
     */
    public function getDefaultBattleStatus(): BattleStatus
    {
        return $this->container->get('doctrine')->getRepository('CoreBundle:BattleStatus')->findOneBy(array('id' => '1'));
    }

    /**
     * @return MapType
     */
    public function getDefaultMapType(): MapType
    {
        //TODO some default value
    }

    /**
     * @return string
     */
    public function getDefaultName(): string
    {
        //TODO some default value
    }
}
