<?php

namespace CoreBundle\Form\BattleField;

use CoreBundle\Entity\BattleField;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\FormEvent;

/**
 * Trait BattleFieldSingleTypeTrait;
 */
trait BattleFieldSingleTypeTrait
{
    /**
     * @param FormEvent $event
     */
    public function preSubmit(FormEvent $event)
    {
        $event
            ->getForm()
            ->add('battleField', EntityType::class, [
                'class' => BattleField::class,
                'required' => true,
                'invalid_message' => 'BattleField identifier is required and should be integer',
            ]);
    }
}
