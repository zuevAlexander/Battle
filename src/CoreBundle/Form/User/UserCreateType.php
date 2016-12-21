<?php

namespace CoreBundle\Form\User;

use CoreBundle\Model\Request\User\UserCreateRequest;
use NorseDigital\Symfony\RestBundle\Form\AbstractFormType;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * Class UserCreateType
 */
class UserCreateType extends AbstractFormType
{
    use UserAllTypeTrait {
        UserAllTypeTrait::buildForm as private buildFormTraitUserAllType;
    }

    const DATA_CLASS = UserCreateRequest::class;

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $this->buildFormTraitUserAllType($builder, $options);
        $this->registerPreSubmitEventListener($builder);
    }
}
