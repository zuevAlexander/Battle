<?php

namespace CoreBundle\Model\Request\BattleStatus;


/**
 * Interface BattleStatusAllRequestInterface
 *
 * @method bool hasStatusName()
 */
interface BattleStatusAllRequestInterface
{
    

    /**
     * @return string
     */
    public function getStatusName(): string;

    /**
     * @param string $statusName
     */
    public function setStatusName(string $statusName);
}
