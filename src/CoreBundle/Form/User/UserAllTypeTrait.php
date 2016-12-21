<?php

namespace CoreBundle\Form\User;

use Symfony\Component\Form\FormBuilderInterface;
use NorseDigital\Symfony\RestBundle\Form\TextType;

/**
 * Trait UserAllTypeTrait;
 */
trait UserAllTypeTrait
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username', TextType::class, [
                'by_reference' => false
            ])
            ->add('password', TextType::class, [
                'by_reference' => false
            ])
            ->add('token', TextType::class, [
                'by_reference' => false
            ])
            ->add('apiKey', TextType::class, [
                'by_reference' => false
            ]);
    }
}
