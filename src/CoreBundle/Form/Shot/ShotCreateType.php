<?php

namespace CoreBundle\Form\Shot;

use CoreBundle\Model\Request\Shot\ShotCreateRequest;
use NorseDigital\Symfony\RestBundle\Form\AbstractFormType;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * Class ShotCreateType
 */
class ShotCreateType extends AbstractFormType
{
    use ShotAllTypeTrait {
        ShotAllTypeTrait::buildForm as private buildFormTraitShotAllType;
    }

    const DATA_CLASS = ShotCreateRequest::class;

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $this->buildFormTraitShotAllType($builder, $options);
        $this->registerPreSubmitEventListener($builder);
    }
}
