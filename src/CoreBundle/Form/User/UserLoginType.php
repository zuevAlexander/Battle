<?php

namespace CoreBundle\Form\User;

use CoreBundle\Model\Request\User\UserLoginRequest;
use NorseDigital\Symfony\RestBundle\Form\AbstractFormType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * Class UserLoginType.
 */
class UserLoginType extends AbstractFormType
{
    const DATA_CLASS = UserLoginRequest::class;

    /**
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name', TextType::class, [
            'required' => true,
        ])->add('password', TextType::class, [
            'required' => true,
        ]);
    }
}
