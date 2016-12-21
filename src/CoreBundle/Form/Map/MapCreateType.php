<?php

namespace CoreBundle\Form\Map;

use CoreBundle\Model\Request\Map\MapCreateRequest;
use NorseDigital\Symfony\RestBundle\Form\AbstractFormType;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * Class MapCreateType
 */
class MapCreateType extends AbstractFormType
{
    use MapAllTypeTrait {
        MapAllTypeTrait::buildForm as private buildFormTraitMapAllType;
    }

    const DATA_CLASS = MapCreateRequest::class;

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $this->buildFormTraitMapAllType($builder, $options);
        $this->registerPreSubmitEventListener($builder);
    }
}
