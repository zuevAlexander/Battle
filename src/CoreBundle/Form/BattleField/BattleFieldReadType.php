<?php

namespace CoreBundle\Form\BattleField;

use CoreBundle\Model\Request\BattleField\BattleFieldReadRequest;
use NorseDigital\Symfony\RestBundle\Form\AbstractFormType;

/**
 * Class BattleFieldReadType
 */
class BattleFieldReadType extends AbstractFormType
{
    use BattleFieldSingleTypeTrait;

    const DATA_CLASS = BattleFieldReadRequest::class;
}
