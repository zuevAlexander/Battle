<?php

namespace CoreBundle\Model\Request\Battle;

use CoreBundle\Entity\BattleStatus;
use NorseDigital\Symfony\RestBundle\Request\ListRequestInterface;
use NorseDigital\Symfony\RestBundle\Request\ListRequestTrait;
use NorseDigital\Symfony\RestBundle\Request\AbstractRequest;

/**
 * Class BattleListRequest
 */
class BattleListRequest extends AbstractRequest implements ListRequestInterface
{
    use ListRequestTrait;

    /**
     * @var BattleStatus
     */
    protected $battleStatus;

    /**
     * @return BattleStatus
     */
    public function getBattleStatus(): BattleStatus
    {
        return $this->battleStatus;
    }

    /**
     * @param BattleStatus $battleStatus
     */
    public function setBattleStatus(BattleStatus $battleStatus)
    {
        $this->battleStatus = $battleStatus;
    }

}
