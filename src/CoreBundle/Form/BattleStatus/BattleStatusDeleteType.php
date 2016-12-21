<?php

namespace CoreBundle\Form\BattleStatus;

use CoreBundle\Model\Request\BattleStatus\BattleStatusDeleteRequest;
use NorseDigital\Symfony\RestBundle\Form\AbstractFormType;

/**
 * Class BattleStatusDeleteType
 */
class BattleStatusDeleteType extends AbstractFormType
{
    use BattleStatusSingleTypeTrait;

    const DATA_CLASS = BattleStatusDeleteRequest::class;
}
