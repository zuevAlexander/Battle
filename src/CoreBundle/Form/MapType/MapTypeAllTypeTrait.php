<?php

namespace CoreBundle\Form\MapType;

use Symfony\Component\Form\FormBuilderInterface;
use NorseDigital\Symfony\RestBundle\Form\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;

/**
 * Trait MapTypeAllTypeTrait;
 */
trait MapTypeAllTypeTrait
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('typeName', TextType::class, [
                'by_reference' => false
            ])
            ->add('size', IntegerType::class, [
                'by_reference' => false
            ]);
    }
}
