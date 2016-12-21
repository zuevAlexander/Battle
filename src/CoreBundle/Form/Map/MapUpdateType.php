<?php

namespace CoreBundle\Form\Map;

use CoreBundle\Model\Request\Map\MapUpdateRequest;
use NorseDigital\Symfony\RestBundle\Form\AbstractFormType;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * Class MapUpdateType
 */
class MapUpdateType extends AbstractFormType
{
    use MapSingleTypeTrait;
    use MapAllTypeTrait {
        MapAllTypeTrait::buildForm as private buildFormTraitMapAllType;
    }

    const DATA_CLASS = MapUpdateRequest::class;

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
