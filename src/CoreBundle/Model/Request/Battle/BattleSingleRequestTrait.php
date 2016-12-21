<?php

namespace CoreBundle\Model\Request\Battle;

use CoreBundle\Entity\Battle;

/**
 * Trait BattleSingleRequestTrait;
 */
trait BattleSingleRequestTrait
{
    /**
     * @var Battle
     */
    protected $battle;

    /**
     * {@inheritdoc}
     */
    public function __construct()
    {
        $this->battle = new Battle();
    }

    /**
     * @return Battle
     */
    public function getBattle(): Battle
    {
        return $this->battle;
    }

    /**
     * @param Battle $battle
     */
    public function setBattle(Battle $battle)
    {
        $this->battle = $battle;
    }
}
