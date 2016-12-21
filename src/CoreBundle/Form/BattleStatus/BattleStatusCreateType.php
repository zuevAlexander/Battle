<?php

namespace CoreBundle\Form\BattleStatus;

use CoreBundle\Model\Request\BattleStatus\BattleStatusCreateRequest;
use NorseDigital\Symfony\RestBundle\Form\AbstractFormType;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * Class BattleStatusCreateType
 */
class BattleStatusCreateType extends AbstractFormType
{
    use BattleStatusAllTypeTrait {
        BattleStatusAllTypeTrait::buildForm as private buildFormTraitBattleStatusAllType;
    }

    const DATA_CLASS = BattleStatusCreateRequest::class;

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $this->buildFormTraitBattleStatusAllType($builder, $options);
        $this->registerPreSubmitEventListener($builder);
    }
}
