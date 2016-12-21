<?php

namespace CoreBundle\Form\BattleStatus;

use CoreBundle\Model\Request\BattleStatus\BattleStatusListRequest;
use NorseDigital\Symfony\RestBundle\Form\AbstractFormGetListType;

/**
 * Class BattleStatusListType
 */
class BattleStatusListType extends AbstractFormGetListType
{
    const DATA_CLASS = BattleStatusListRequest::class;
}
