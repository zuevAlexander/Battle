<?php

namespace CoreBundle\Form\CountShips;

use CoreBundle\Entity\CountShips;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\FormEvent;

/**
 * Trait CountShipsSingleTypeTrait;
 */
trait CountShipsSingleTypeTrait
{
    /**
     * @param FormEvent $event
     */
    public function preSubmit(FormEvent $event)
    {
        $event
            ->getForm()
            ->add('countShip', EntityType::class, [
                'class' => CountShips::class,
                'required' => true,
                'invalid_message' => 'CountShips identifier is required and should be integer',
            ]);
    }
}
