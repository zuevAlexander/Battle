<?php

namespace CoreBundle\Form\MapType;

use CoreBundle\Model\Request\MapType\MapTypeCreateRequest;
use NorseDigital\Symfony\RestBundle\Form\AbstractFormType;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * Class MapTypeCreateType
 */
class MapTypeCreateType extends AbstractFormType
{
    use MapTypeAllTypeTrait {
        MapTypeAllTypeTrait::buildForm as private buildFormTraitMapTypeAllType;
    }

    const DATA_CLASS = MapTypeCreateRequest::class;

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
