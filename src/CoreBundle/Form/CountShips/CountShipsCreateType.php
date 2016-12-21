<?php

namespace CoreBundle\Form\CountShips;

use CoreBundle\Model\Request\CountShips\CountShipsCreateRequest;
use NorseDigital\Symfony\RestBundle\Form\AbstractFormType;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * Class CountShipsCreateType
 */
class CountShipsCreateType extends AbstractFormType
{
    use CountShipsAllTypeTrait {
        CountShipsAllTypeTrait::buildForm as private buildFormTraitCountShipsAllType;
    }

    const DATA_CLASS = CountShipsCreateRequest::class;

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
