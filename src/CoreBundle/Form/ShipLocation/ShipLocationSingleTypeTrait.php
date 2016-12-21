<?php

namespace CoreBundle\Form\ShipLocation;

use CoreBundle\Entity\ShipLocation;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\FormEvent;

/**
 * Trait ShipLocationSingleTypeTrait;
 */
trait ShipLocationSingleTypeTrait
{
    /**
     * @param FormEvent $event
     */
    public function preSubmit(FormEvent $event)
    {
        $event
            ->getForm()
            ->add('shipLocation', EntityType::class, [
                'class' => ShipLocation::class,
                'required' => true,
                'invalid_message' => 'ShipLocation identifier is required and should be integer',
            ]);
    }
}
