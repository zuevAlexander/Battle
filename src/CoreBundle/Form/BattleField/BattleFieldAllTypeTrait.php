<?php

namespace CoreBundle\Form\BattleField;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use CoreBundle\Entity\User;
use CoreBundle\Entity\Battle;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use CoreBundle\Form\Ship\ShipCreateType;
use CoreBundle\Form\Shot\ShotCreateType;

/**
 * Trait BattleFieldAllTypeTrait;
 */
trait BattleFieldAllTypeTrait
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('user', EntityType::class, [
                'class' => User::class,
                'by_reference' => false
            ])
            ->add('battle', EntityType::class, [
                'class' => Battle::class,
                'by_reference' => false
            ])
            ->add('ships', CollectionType::class, [
                'by_reference' => false,
                'entry_type' => ShipCreateType::class,
                'allow_add' => true,
            ])
            ->add('shots', CollectionType::class, [
                'by_reference' => false,
                'entry_type' => ShotCreateType::class,
                'allow_add' => true,
            ]);
    }
}
