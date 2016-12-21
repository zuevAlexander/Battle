<?php

namespace CoreBundle\Form\Shot;

use CoreBundle\Entity\Shot;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\FormEvent;

/**
 * Trait ShotSingleTypeTrait;
 */
trait ShotSingleTypeTrait
{
    /**
     * @param FormEvent $event
     */
    public function preSubmit(FormEvent $event)
    {
        $event
            ->getForm()
            ->add('shot', EntityType::class, [
                'class' => Shot::class,
                'required' => true,
                'invalid_message' => 'Shot identifier is required and should be integer',
            ]);
    }
}
