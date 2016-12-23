<?php

namespace CoreBundle\Model\Request\Battle;

use CoreBundle\Entity\BattleStatus;
use CoreBundle\Entity\MapType;

/**
 * Interface BattleAllRequestInterface
 *
 * @method bool hasBattleStatus()
 * @method bool hasMapType()
 * @method bool hasName()
 */
interface BattleAllRequestInterface
{
    /**
     * @return BattleStatus
     */
    public function getBattleStatus();

    /**
     * @param BattleStatus $battleStatus
     */
    public function setBattleStatus(BattleStatus $battleStatus);

    /**
     * @return MapType
     */
    public function getMapType(): MapType;

    /**
     * @param MapType $mapType
     */
    public function setMapType(MapType $mapType);

    /**
     * @return string
     */
    public function getName(): string;

    /**
     * @param string $name
     */
    public function setName(string $name);
}
