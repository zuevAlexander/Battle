<?php

namespace CoreBundle\Form\ShotType;

use CoreBundle\Entity\ShotType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\FormEvent;

/**
 * Trait ShotTypeSingleTypeTrait;
 */
trait ShotTypeSingleTypeTrait
{
    /**
     * @param FormEvent $event
     */
    public function preSubmit(FormEvent $event)
    {
        $event
            ->getForm()
            ->add('shotType', EntityType::class, [
                'class' => ShotType::class,
                'required' => true,
                'invalid_message' => 'ShotType identifier is required and should be integer',
            ]);
    }
}
