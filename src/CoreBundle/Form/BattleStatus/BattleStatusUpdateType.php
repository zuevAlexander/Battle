<?php

namespace CoreBundle\Form\BattleStatus;

use CoreBundle\Model\Request\BattleStatus\BattleStatusUpdateRequest;
use NorseDigital\Symfony\RestBundle\Form\AbstractFormType;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * Class BattleStatusUpdateType
 */
class BattleStatusUpdateType extends AbstractFormType
{
    use BattleStatusSingleTypeTrait;
    use BattleStatusAllTypeTrait {
        BattleStatusAllTypeTrait::buildForm as private buildFormTraitBattleStatusAllType;
    }

    const DATA_CLASS = BattleStatusUpdateRequest::class;

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
