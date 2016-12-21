<?php

namespace CoreBundle\Form\ShipType;

use CoreBundle\Entity\ShipType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\FormEvent;

/**
 * Trait ShipTypeSingleTypeTrait;
 */
trait ShipTypeSingleTypeTrait
{
    /**
     * @param FormEvent $event
     */
    public function preSubmit(FormEvent $event)
    {
        $event
            ->getForm()
            ->add('shipType', EntityType::class, [
                'class' => ShipType::class,
                'required' => true,
                'invalid_message' => 'ShipType identifier is required and should be integer',
            ]);
    }
}
