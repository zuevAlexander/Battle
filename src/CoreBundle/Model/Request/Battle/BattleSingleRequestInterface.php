<?php

namespace CoreBundle\Model\Request\Battle;

use CoreBundle\Entity\Battle;

/**
 * Interface BattleSingleRequestInterface
 * * @method bool hasBattle()
 */
interface BattleSingleRequestInterface
{
    /**
     * @return Battle
     */
    public function getBattle(): Battle;

    /**
     * @param Battle $battle
     */
    public function setBattle(Battle $battle);
}
