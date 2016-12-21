<?php

namespace CoreBundle\Form\Battle;

use Symfony\Component\Form\FormBuilderInterface;
use NorseDigital\Symfony\RestBundle\Form\TextType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use CoreBundle\Entity\BattleStatus;
use CoreBundle\Entity\MapType;

/**
 * Trait BattleAllTypeTrait;
 */
trait BattleAllTypeTrait
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [
                'by_reference' => false
            ])
//            ->add('battleStatus', EntityType::class, [
//                'class' => BattleStatus::class,
//                'by_reference' => false
//            ])
            ->add('mapType', EntityType::class, [
                'class' => MapType::class,
                'by_reference' => false
            ]);
    }
}
