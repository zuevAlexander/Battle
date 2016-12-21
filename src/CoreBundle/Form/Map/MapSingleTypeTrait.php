<?php

namespace CoreBundle\Form\Map;

use CoreBundle\Entity\Map;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\FormEvent;

/**
 * Trait MapSingleTypeTrait;
 */
trait MapSingleTypeTrait
{
    /**
     * @param FormEvent $event
     */
    public function preSubmit(FormEvent $event)
    {
        $event
            ->getForm()
            ->add('map', EntityType::class, [
                'class' => Map::class,
                'required' => true,
                'invalid_message' => 'Map identifier is required and should be integer',
            ]);
    }
}
