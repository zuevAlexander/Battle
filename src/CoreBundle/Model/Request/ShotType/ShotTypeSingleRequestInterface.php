<?php

namespace CoreBundle\Model\Request\ShotType;

use CoreBundle\Entity\ShotType;

/**
 * Interface ShotTypeSingleRequestInterface
 * * @method bool hasShotType()
 */
interface ShotTypeSingleRequestInterface
{
    /**
     * @return ShotType
     */
    public function getShotType(): ShotType;

    /**
     * @param ShotType $shotType
     */
    public function setShotType(ShotType $shotType);
}
