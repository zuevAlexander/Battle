<?php

namespace CoreBundle\Form\BattleField;

use CoreBundle\Model\Request\BattleField\BattleFieldUpdateRequest;
use NorseDigital\Symfony\RestBundle\Form\AbstractFormType;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * Class BattleFieldUpdateType
 */
class BattleFieldUpdateType extends AbstractFormType
{
    use BattleFieldSingleTypeTrait;
    use BattleFieldAllTypeTrait {
        BattleFieldAllTypeTrait::buildForm as private buildFormTraitBattleFieldAllType;
    }

    const DATA_CLASS = BattleFieldUpdateRequest::class;

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
