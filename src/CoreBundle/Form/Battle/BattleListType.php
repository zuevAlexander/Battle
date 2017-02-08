<?php

namespace CoreBundle\Form\Battle;

use CoreBundle\Entity\BattleStatus;
use CoreBundle\Model\Request\Battle\BattleListRequest;
use NorseDigital\Symfony\RestBundle\Form\AbstractFormGetListType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

/**
 * Class BattleListType
 */
class BattleListType extends AbstractFormGetListType
{
    const DATA_CLASS = BattleListRequest::class;

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('battleStatus', EntityType::class, [
                'class' => BattleStatus::class,
                'by_reference' => false
            ]);
    }
}
