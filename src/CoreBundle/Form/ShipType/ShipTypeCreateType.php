<?php

namespace CoreBundle\Form\ShipType;

use CoreBundle\Model\Request\ShipType\ShipTypeCreateRequest;
use NorseDigital\Symfony\RestBundle\Form\AbstractFormType;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * Class ShipTypeCreateType
 */
class ShipTypeCreateType extends AbstractFormType
{
    use ShipTypeAllTypeTrait {
        ShipTypeAllTypeTrait::buildForm as private buildFormTraitShipTypeAllType;
    }

    const DATA_CLASS = ShipTypeCreateRequest::class;

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $this->buildFormTraitShipTypeAllType($builder, $options);
        $this->registerPreSubmitEventListener($builder);
    }
}
