<?php

namespace CoreBundle\Form\Ship;

use CoreBundle\Model\Request\Ship\ShipCreateRequest;
use NorseDigital\Symfony\RestBundle\Form\AbstractFormType;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * Class ShipCreateType
 */
class ShipCreateType extends AbstractFormType
{
    use ShipAllTypeTrait {
        ShipAllTypeTrait::buildForm as private buildFormTraitShipAllType;
    }

    const DATA_CLASS = ShipCreateRequest::class;

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $this->buildFormTraitShipAllType($builder, $options);
        $this->registerPreSubmitEventListener($builder);
    }
}
