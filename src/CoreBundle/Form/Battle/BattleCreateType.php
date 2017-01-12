<?php

namespace CoreBundle\Form\Battle;

use CoreBundle\Entity\MapType;
use CoreBundle\Model\Request\Battle\BattleCreateRequest;
use NorseDigital\Symfony\RestBundle\Form\AbstractFormType;
use NorseDigital\Symfony\RestBundle\Form\TextType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * Class BattleCreateType
 */
class BattleCreateType extends AbstractFormType
{
    const DATA_CLASS = BattleCreateRequest::class;

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [
                'by_reference' => false
            ])
            ->add('mapType', EntityType::class, [
                'class' => MapType::class,
                'by_reference' => false
            ]);
        $this->registerPreSubmitEventListener($builder);
    }
}
