<?php

namespace CoreBundle\Form\Battle;

use CoreBundle\Model\Request\Battle\BattleListRequest;
use NorseDigital\Symfony\RestBundle\Form\AbstractFormGetListType;

/**
 * Class BattleListType
 */
class BattleListType extends AbstractFormGetListType
{
    const DATA_CLASS = BattleListRequest::class;
}
