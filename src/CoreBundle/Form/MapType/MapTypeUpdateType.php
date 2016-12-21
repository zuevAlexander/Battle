<?php

namespace CoreBundle\Form\MapType;

use CoreBundle\Model\Request\MapType\MapTypeUpdateRequest;
use NorseDigital\Symfony\RestBundle\Form\AbstractFormType;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * Class MapTypeUpdateType
 */
class MapTypeUpdateType extends AbstractFormType
{
    use MapTypeSingleTypeTrait;
    use MapTypeAllTypeTrait {
        MapTypeAllTypeTrait::buildForm as private buildFormTraitMapTypeAllType;
    }

    const DATA_CLASS = MapTypeUpdateRequest::class;

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $this->buildFormTraitMapTypeAllType($builder, $options);
        $this->registerPreSubmitEventListener($builder);
    }
}
