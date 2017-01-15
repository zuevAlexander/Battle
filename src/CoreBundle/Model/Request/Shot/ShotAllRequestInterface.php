<?php

namespace CoreBundle\Model\Request\Shot;

use CoreBundle\Entity\Map;
use CoreBundle\Entity\ShotStatus;
use CoreBundle\Entity\BattleField;

/**
 * Interface ShotAllRequestInterface
 *
 * @method bool hasUser()
 * @method bool hasMap()
 * @method bool hasShotStatus()
 * @method bool hasBattleField()
 */
interface ShotAllRequestInterface
{
    /**
     * @return Map
     */
    public function getMap();

    /**
     * @param Map $map
     */
    public function setMap(Map $map);

    /**
     * @return ShotStatus
     */
    public function getShotStatus(): ShotStatus;

    /**
     * @param ShotStatus $shotStatus
     */
    public function setShotStatus(ShotStatus $shotStatus);

    /**
     * @return BattleField
     */
    public function getBattleField();

    /**
     * @param BattleField $battleField
     */
    public function setBattleField(BattleField $battleField);
}
