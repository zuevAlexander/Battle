<?php

namespace CoreBundle\Form\ShotStatus;

use CoreBundle\Entity\ShotStatus;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\FormEvent;

/**
 * Trait ShotStatusSingleTypeTrait;
 */
trait ShotStatusSingleTypeTrait
{
    /**
     * @param FormEvent $event
     */
    public function preSubmit(FormEvent $event)
    {
        $event
            ->getForm()
            ->add('shotStatus', EntityType::class, [
                'class' => ShotStatus::class,
                'required' => true,
                'invalid_message' => 'ShotStatus identifier is required and should be integer',
            ]);
    }
}
