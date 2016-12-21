<?php

namespace CoreBundle\Form\ShotType;

use Symfony\Component\Form\FormBuilderInterface;
use NorseDigital\Symfony\RestBundle\Form\TextType;

/**
 * Trait ShotTypeAllTypeTrait;
 */
trait ShotTypeAllTypeTrait
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
            ]);
    }
}
