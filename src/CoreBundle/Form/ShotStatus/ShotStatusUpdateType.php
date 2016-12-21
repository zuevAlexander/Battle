<?php

namespace CoreBundle\Form\ShotStatus;

use CoreBundle\Model\Request\ShotStatus\ShotStatusUpdateRequest;
use NorseDigital\Symfony\RestBundle\Form\AbstractFormType;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * Class ShotStatusUpdateType
 */
class ShotStatusUpdateType extends AbstractFormType
{
    use ShotStatusSingleTypeTrait;
    use ShotStatusAllTypeTrait {
        ShotStatusAllTypeTrait::buildForm as private buildFormTraitShotStatusAllType;
    }

    const DATA_CLASS = ShotStatusUpdateRequest::class;

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
