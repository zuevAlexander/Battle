<?php

namespace CoreBundle\Form\Battle;

use CoreBundle\Model\Request\Battle\BattleDeleteRequest;
use NorseDigital\Symfony\RestBundle\Form\AbstractFormType;

/**
 * Class BattleDeleteType
 */
class BattleDeleteType extends AbstractFormType
{
    use BattleSingleTypeTrait;

    const DATA_CLASS = BattleDeleteRequest::class;
}
