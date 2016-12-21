<?php

namespace CoreBundle\Form\Battle;

use CoreBundle\Entity\Battle;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\FormEvent;

/**
 * Trait BattleSingleTypeTrait;
 */
trait BattleSingleTypeTrait
{
    /**
     * @param FormEvent $event
     */
    public function preSubmit(FormEvent $event)
    {
        $event
            ->getForm()
            ->add('battle', EntityType::class, [
                'class' => Battle::class,
                'required' => true,
                'invalid_message' => 'Battle identifier is required and should be integer',
            ]);
    }
}
