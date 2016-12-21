<?php

namespace CoreBundle\Model\Request\Shot;

use CoreBundle\Entity\User;
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
     * @return User
     */
    public function getUser(): User;

    /**
     * @param User $user
     */
    public function setUser(User $user);

    /**
     * @return Map
     */
    public function getMap(): Map;

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
    public function getBattleField(): BattleField;

    /**
     * @param BattleField $battleField
     */
    public function setBattleField(BattleField $battleField);
}
