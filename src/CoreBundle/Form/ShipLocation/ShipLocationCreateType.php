<?php

namespace CoreBundle\Form\ShipLocation;

use CoreBundle\Model\Request\ShipLocation\ShipLocationCreateRequest;
use NorseDigital\Symfony\RestBundle\Form\AbstractFormType;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * Class ShipLocationCreateType
 */
class ShipLocationCreateType extends AbstractFormType
{
    use ShipLocationAllTypeTrait {
        ShipLocationAllTypeTrait::buildForm as private buildFormTraitShipLocationAllType;
    }

    const DATA_CLASS = ShipLocationCreateRequest::class;

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $this->buildFormTraitShipLocationAllType($builder, $options);
        $this->registerPreSubmitEventListener($builder);
    }
}
