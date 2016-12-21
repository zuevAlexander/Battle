<?php

namespace CoreBundle\Form\Battle;

use CoreBundle\Model\Request\Battle\BattleUpdateRequest;
use NorseDigital\Symfony\RestBundle\Form\AbstractFormType;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * Class BattleUpdateType
 */
class BattleUpdateType extends AbstractFormType
{
    use BattleSingleTypeTrait;
    use BattleAllTypeTrait {
        BattleAllTypeTrait::buildForm as private buildFormTraitBattleAllType;
    }

    const DATA_CLASS = BattleUpdateRequest::class;

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
