<?php

namespace CoreBundle\Form\CountShips;

use CoreBundle\Model\Request\CountShips\CountShipsUpdateRequest;
use NorseDigital\Symfony\RestBundle\Form\AbstractFormType;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * Class CountShipsUpdateType
 */
class CountShipsUpdateType extends AbstractFormType
{
    use CountShipsSingleTypeTrait;
    use CountShipsAllTypeTrait {
        CountShipsAllTypeTrait::buildForm as private buildFormTraitCountShipsAllType;
    }

    const DATA_CLASS = CountShipsUpdateRequest::class;

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $this->buildFormTraitCountShipsAllType($builder, $options);
        $this->registerPreSubmitEventListener($builder);
    }
}
