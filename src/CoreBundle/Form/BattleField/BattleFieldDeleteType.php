<?php

namespace CoreBundle\Form\BattleField;

use CoreBundle\Model\Request\BattleField\BattleFieldDeleteRequest;
use NorseDigital\Symfony\RestBundle\Form\AbstractFormType;

/**
 * Class BattleFieldDeleteType
 */
class BattleFieldDeleteType extends AbstractFormType
{
    use BattleFieldSingleTypeTrait;

    const DATA_CLASS = BattleFieldDeleteRequest::class;
}
