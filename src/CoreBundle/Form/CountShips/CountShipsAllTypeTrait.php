<?php

namespace CoreBundle\Form\CountShips;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use CoreBundle\Entity\ShipType;
use CoreBundle\Entity\MapType;

/**
 * Trait CountShipsAllTypeTrait;
 */
trait CountShipsAllTypeTrait
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('count', IntegerType::class, [
                'by_reference' => false
            ])
            ->add('shipType', EntityType::class, [
                'class' => ShipType::class,
                'by_reference' => false
            ])
            ->add('mapType', EntityType::class, [
                'class' => MapType::class,
                'by_reference' => false
            ]);
    }
}
