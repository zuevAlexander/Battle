<?php

namespace CoreBundle\Form\ShotType;

use CoreBundle\Model\Request\ShotType\ShotTypeUpdateRequest;
use NorseDigital\Symfony\RestBundle\Form\AbstractFormType;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * Class ShotTypeUpdateType
 */
class ShotTypeUpdateType extends AbstractFormType
{
    use ShotTypeSingleTypeTrait;
    use ShotTypeAllTypeTrait {
        ShotTypeAllTypeTrait::buildForm as private buildFormTraitShotTypeAllType;
    }

    const DATA_CLASS = ShotTypeUpdateRequest::class;

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $this->buildFormTraitShotTypeAllType($builder, $options);
        $this->registerPreSubmitEventListener($builder);
    }
}
