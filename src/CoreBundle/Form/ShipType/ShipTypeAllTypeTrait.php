<?php

namespace CoreBundle\Form\ShipType;

use Symfony\Component\Form\FormBuilderInterface;
use NorseDigital\Symfony\RestBundle\Form\TextType;

/**
 * Trait ShipTypeAllTypeTrait;
 */
trait ShipTypeAllTypeTrait
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
