<?php

namespace CoreBundle\Form\ShotType;

use CoreBundle\Model\Request\ShotType\ShotTypeCreateRequest;
use NorseDigital\Symfony\RestBundle\Form\AbstractFormType;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * Class ShotTypeCreateType
 */
class ShotTypeCreateType extends AbstractFormType
{
    use ShotTypeAllTypeTrait {
        ShotTypeAllTypeTrait::buildForm as private buildFormTraitShotTypeAllType;
    }

    const DATA_CLASS = ShotTypeCreateRequest::class;

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
