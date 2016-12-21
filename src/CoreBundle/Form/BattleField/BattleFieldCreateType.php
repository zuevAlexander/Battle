<?php

namespace CoreBundle\Form\BattleField;

use CoreBundle\Model\Request\BattleField\BattleFieldCreateRequest;
use NorseDigital\Symfony\RestBundle\Form\AbstractFormType;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * Class BattleFieldCreateType
 */
class BattleFieldCreateType extends AbstractFormType
{
    use BattleFieldAllTypeTrait {
        BattleFieldAllTypeTrait::buildForm as private buildFormTraitBattleFieldAllType;
    }

    const DATA_CLASS = BattleFieldCreateRequest::class;

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $this->buildFormTraitBattleFieldAllType($builder, $options);
        $this->registerPreSubmitEventListener($builder);
    }
}
