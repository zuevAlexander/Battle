<?php

namespace CoreBundle\Form\BattleField;

use CoreBundle\Model\Request\BattleField\BattleFieldListRequest;
use NorseDigital\Symfony\RestBundle\Form\AbstractFormGetListType;

/**
 * Class BattleFieldListType
 */
class BattleFieldListType extends AbstractFormGetListType
{
    const DATA_CLASS = BattleFieldListRequest::class;
}
