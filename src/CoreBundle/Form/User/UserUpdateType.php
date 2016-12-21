<?php

namespace CoreBundle\Form\User;

use CoreBundle\Model\Request\User\UserUpdateRequest;
use NorseDigital\Symfony\RestBundle\Form\AbstractFormType;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * Class UserUpdateType
 */
class UserUpdateType extends AbstractFormType
{
    use UserSingleTypeTrait;
    use UserAllTypeTrait {
        UserAllTypeTrait::buildForm as private buildFormTraitUserAllType;
    }

    const DATA_CLASS = UserUpdateRequest::class;

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
