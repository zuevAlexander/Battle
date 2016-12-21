<?php

namespace CoreBundle\Model\Request\ShotType;

use CoreBundle\Entity\ShotType;

/**
 * Trait ShotTypeSingleRequestTrait;
 */
trait ShotTypeSingleRequestTrait
{
    /**
     * @var ShotType
     */
    protected $shotType;

    /**
     * {@inheritdoc}
     */
    public function __construct()
    {
        $this->shotType = new ShotType();
    }

    /**
     * @return ShotType
     */
    public function getShotType(): ShotType
    {
        return $this->shotType;
    }

    /**
     * @param ShotType $shotType
     */
    public function setShotType(ShotType $shotType)
    {
        $this->shotType = $shotType;
    }
}
