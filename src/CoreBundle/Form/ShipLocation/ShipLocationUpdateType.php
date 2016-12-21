<?php

namespace CoreBundle\Form\ShipLocation;

use CoreBundle\Model\Request\ShipLocation\ShipLocationUpdateRequest;
use NorseDigital\Symfony\RestBundle\Form\AbstractFormType;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * Class ShipLocationUpdateType
 */
class ShipLocationUpdateType extends AbstractFormType
{
    use ShipLocationSingleTypeTrait;
    use ShipLocationAllTypeTrait {
        ShipLocationAllTypeTrait::buildForm as private buildFormTraitShipLocationAllType;
    }

    const DATA_CLASS = ShipLocationUpdateRequest::class;

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
