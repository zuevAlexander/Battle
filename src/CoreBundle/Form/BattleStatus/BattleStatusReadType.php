<?php

namespace CoreBundle\Form\BattleStatus;

use CoreBundle\Model\Request\BattleStatus\BattleStatusReadRequest;
use NorseDigital\Symfony\RestBundle\Form\AbstractFormType;

/**
 * Class BattleStatusReadType
 */
class BattleStatusReadType extends AbstractFormType
{
    use BattleStatusSingleTypeTrait;

    const DATA_CLASS = BattleStatusReadRequest::class;
}
