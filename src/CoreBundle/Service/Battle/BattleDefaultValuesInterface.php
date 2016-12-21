<?php

namespace CoreBundle\Service\Battle;

use CoreBundle\Entity\BattleStatus;
use CoreBundle\Entity\MapType;

/**
 * Interface BattleDefaultValuesInterface
 */
interface BattleDefaultValuesInterface
{
    /**
     * @return BattleStatus
     */
    public function getDefaultBattleStatus(): BattleStatus;

    /**
     * @return MapType
     */
    public function getDefaultMapType(): MapType;

    /**
     * @return string
     */
    public function getDefaultName(): string;
}
