<?php

namespace CoreBundle\Model\Request\BattleField;

use CoreBundle\Entity\BattleField;

/**
 * Trait BattleFieldSingleRequestTrait;
 */
trait BattleFieldSingleRequestTrait
{
    /**
     * @var BattleField
     */
    protected $battleField;

    /**
     * {@inheritdoc}
     */
    public function __construct()
    {
        $this->battleField = new BattleField();
    }

    /**
     * @return BattleField
     */
    public function getBattleField(): BattleField
    {
        return $this->battleField;
    }

    /**
     * @param BattleField $battleField
     */
    public function setBattleField(BattleField $battleField)
    {
        $this->battleField = $battleField;
    }
}
