<?php

namespace CoreBundle\Form\Map;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;

/**
 * Trait MapAllTypeTrait;
 */
trait MapAllTypeTrait
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('latitude', IntegerType::class, [
                'by_reference' => false
            ])
            ->add('longitude', IntegerType::class, [
                'by_reference' => false
            ]);
    }
}
