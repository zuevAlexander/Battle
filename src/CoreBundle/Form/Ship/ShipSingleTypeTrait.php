<?php

namespace CoreBundle\Form\Ship;

use CoreBundle\Entity\Ship;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\FormEvent;

/**
 * Trait ShipSingleTypeTrait;
 */
trait ShipSingleTypeTrait
{
    /**
     * @param FormEvent $event
     */
    public function preSubmit(FormEvent $event)
    {
        $event
            ->getForm()
            ->add('ship', EntityType::class, [
                'class' => Ship::class,
                'required' => true,
                'invalid_message' => 'Ship identifier is required and should be integer',
            ]);
    }
}
