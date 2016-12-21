<?php

namespace CoreBundle\Form\Battle;

use CoreBundle\Model\Request\Battle\BattleCreateRequest;
use NorseDigital\Symfony\RestBundle\Form\AbstractFormType;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * Class BattleCreateType
 */
class BattleCreateType extends AbstractFormType
{
    use BattleAllTypeTrait {
        BattleAllTypeTrait::buildForm as private buildFormTraitBattleAllType;
    }

    const DATA_CLASS = BattleCreateRequest::class;

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $this->buildFormTraitBattleAllType($builder, $options);
        $this->registerPreSubmitEventListener($builder);
    }
}
