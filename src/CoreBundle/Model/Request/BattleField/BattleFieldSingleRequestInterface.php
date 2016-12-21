<?php

namespace CoreBundle\Model\Request\BattleField;

use CoreBundle\Entity\BattleField;

/**
 * Interface BattleFieldSingleRequestInterface
 * * @method bool hasBattleField()
 */
interface BattleFieldSingleRequestInterface
{
    /**
     * @return BattleField
     */
    public function getBattleField(): BattleField;

    /**
     * @param BattleField $battleField
     */
    public function setBattleField(BattleField $battleField);
}
