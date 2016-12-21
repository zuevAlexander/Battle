<?php

namespace CoreBundle\Form\ShipType;

use CoreBundle\Model\Request\ShipType\ShipTypeUpdateRequest;
use NorseDigital\Symfony\RestBundle\Form\AbstractFormType;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * Class ShipTypeUpdateType
 */
class ShipTypeUpdateType extends AbstractFormType
{
    use ShipTypeSingleTypeTrait;
    use ShipTypeAllTypeTrait {
        ShipTypeAllTypeTrait::buildForm as private buildFormTraitShipTypeAllType;
    }

    const DATA_CLASS = ShipTypeUpdateRequest::class;

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
