<?php

namespace CoreBundle\Form\Ship;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use CoreBundle\Entity\ShipType;
use CoreBundle\Entity\BattleField;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use CoreBundle\Form\ShipLocation\ShipLocationCreateType;

/**
 * Trait ShipAllTypeTrait;
 */
trait ShipAllTypeTrait
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('shipType', EntityType::class, [
                'class' => ShipType::class,
                'by_reference' => false
            ])
            ->add('battleField', EntityType::class, [
                'class' => BattleField::class,
                'by_reference' => false
            ])
            ->add('location', CollectionType::class, [
                'by_reference' => false,
                'entry_type' => ShipLocationCreateType::class,
                'allow_add' => true,
            ]);
    }
}
