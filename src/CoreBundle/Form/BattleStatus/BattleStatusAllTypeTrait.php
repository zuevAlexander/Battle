<?php

namespace CoreBundle\Form\BattleStatus;

use Symfony\Component\Form\FormBuilderInterface;
use NorseDigital\Symfony\RestBundle\Form\TextType;

/**
 * Trait BattleStatusAllTypeTrait;
 */
trait BattleStatusAllTypeTrait
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('statusName', TextType::class, [
                'by_reference' => false
            ]);
    }
}
