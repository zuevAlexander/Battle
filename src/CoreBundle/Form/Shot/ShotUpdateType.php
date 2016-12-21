<?php

namespace CoreBundle\Form\Shot;

use CoreBundle\Model\Request\Shot\ShotUpdateRequest;
use NorseDigital\Symfony\RestBundle\Form\AbstractFormType;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * Class ShotUpdateType
 */
class ShotUpdateType extends AbstractFormType
{
    use ShotSingleTypeTrait;
    use ShotAllTypeTrait {
        ShotAllTypeTrait::buildForm as private buildFormTraitShotAllType;
    }

    const DATA_CLASS = ShotUpdateRequest::class;

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
