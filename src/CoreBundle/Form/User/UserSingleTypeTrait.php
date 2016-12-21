<?php

namespace CoreBundle\Form\User;

use CoreBundle\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\FormEvent;

/**
 * Trait UserSingleTypeTrait;
 */
trait UserSingleTypeTrait
{
    /**
     * @param FormEvent $event
     */
    public function preSubmit(FormEvent $event)
    {
        $event
            ->getForm()
            ->add('user', EntityType::class, [
                'class' => User::class,
                'required' => true,
                'invalid_message' => 'User identifier is required and should be integer',
            ]);
    }
}
