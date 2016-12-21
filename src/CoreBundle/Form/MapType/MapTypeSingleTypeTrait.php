<?php

namespace CoreBundle\Form\MapType;

use CoreBundle\Entity\MapType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\FormEvent;

/**
 * Trait MapTypeSingleTypeTrait;
 */
trait MapTypeSingleTypeTrait
{
    /**
     * @param FormEvent $event
     */
    public function preSubmit(FormEvent $event)
    {
        $event
            ->getForm()
            ->add('mapType', EntityType::class, [
                'class' => MapType::class,
                'required' => true,
                'invalid_message' => 'MapType identifier is required and should be integer',
            ]);
    }
}
