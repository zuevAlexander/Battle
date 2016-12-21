<?php

namespace CoreBundle\Form\Battle;

use CoreBundle\Model\Request\Battle\BattleReadRequest;
use NorseDigital\Symfony\RestBundle\Form\AbstractFormType;

/**
 * Class BattleReadType
 */
class BattleReadType extends AbstractFormType
{
    use BattleSingleTypeTrait;

    const DATA_CLASS = BattleReadRequest::class;
}
