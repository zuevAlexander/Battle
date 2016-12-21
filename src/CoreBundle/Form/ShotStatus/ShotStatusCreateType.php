<?php

namespace CoreBundle\Form\ShotStatus;

use CoreBundle\Model\Request\ShotStatus\ShotStatusCreateRequest;
use NorseDigital\Symfony\RestBundle\Form\AbstractFormType;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * Class ShotStatusCreateType
 */
class ShotStatusCreateType extends AbstractFormType
{
    use ShotStatusAllTypeTrait {
        ShotStatusAllTypeTrait::buildForm as private buildFormTraitShotStatusAllType;
    }

    const DATA_CLASS = ShotStatusCreateRequest::class;

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $this->buildFormTraitShotStatusAllType($builder, $options);
        $this->registerPreSubmitEventListener($builder);
    }
}
