<?php

namespace CoreBundle\Form\Shot;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use CoreBundle\Entity\Map;
use CoreBundle\Entity\BattleField;

/**
 * Trait ShotAllTypeTrait;
 */
trait ShotAllTypeTrait
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('map', EntityType::class, [
                'class' => Map::class,
                'by_reference' => false
            ])
            ->add('battleField', EntityType::class, [
                'class' => BattleField::class,
                'by_reference' => false
            ]);
    }
}
