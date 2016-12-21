<?php

namespace CoreBundle\Model\Request\BattleStatus;


/**
 * Trait BattleStatusAllRequestTrait;
 */
trait BattleStatusAllRequestTrait
{
    

    /**
     * @var string
     */
    protected $statusName;

    public function __construct()
    {
    }

    /**
     * @return string
     */
    public function getStatusName(): string
    {
        return $this->statusName;
    }

    /**
     * @param string $statusName
     */
    public function setStatusName(string $statusName)
    {
        $this->statusName = $statusName;
    }
}
