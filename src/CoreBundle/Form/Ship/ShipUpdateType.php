<?php

namespace CoreBundle\Form\Ship;

use CoreBundle\Model\Request\Ship\ShipUpdateRequest;
use NorseDigital\Symfony\RestBundle\Form\AbstractFormType;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * Class ShipUpdateType
 */
class ShipUpdateType extends AbstractFormType
{
    use ShipSingleTypeTrait;
    use ShipAllTypeTrait {
        ShipAllTypeTrait::buildForm as private buildFormTraitShipAllType;
    }

    const DATA_CLASS = ShipUpdateRequest::class;

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
