<?php

namespace CoreBundle\Form\BattleStatus;

use CoreBundle\Entity\BattleStatus;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\FormEvent;

/**
 * Trait BattleStatusSingleTypeTrait;
 */
trait BattleStatusSingleTypeTrait
{
    /**
     * @param FormEvent $event
     */
    public function preSubmit(FormEvent $event)
    {
        $event
            ->getForm()
            ->add('battleStatus', EntityType::class, [
                'class' => BattleStatus::class,
                'required' => true,
                'invalid_message' => 'BattleStatus identifier is required and should be integer',
            ]);
    }
}
