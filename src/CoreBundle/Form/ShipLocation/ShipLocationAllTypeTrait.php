<?php

namespace CoreBundle\Form\ShipLocation;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use CoreBundle\Entity\Ship;
use CoreBundle\Entity\Map;

/**
 * Trait ShipLocationAllTypeTrait;
 */
trait ShipLocationAllTypeTrait
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('ship', EntityType::class, [
                'class' => Ship::class,
                'by_reference' => false
            ])
            ->add('map', EntityType::class, [
                'class' => Map::class,
                'by_reference' => false
            ]);
    }
}
