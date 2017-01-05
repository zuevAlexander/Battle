<?php
/**
 * Created by PhpStorm.
 * User: stas
 * Date: 04.10.16
 * Time: 23:43.
 */
namespace CoreBundle\Form\User;

use CoreBundle\Entity\User;
//use CoreBundle\Entity\UserType;
use CoreBundle\Model\Request\User\UserRegisterRequest;
use NorseDigital\Symfony\RestBundle\Form\AbstractFormType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;

class UserRegisterType extends AbstractType
{

    /**
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('username', TextType::class, [
            'required' => true,
        ])->add('password', RepeatedType::class, array(
            'type' => PasswordType::class,
            'invalid_message' => 'The password fields must match',
            'required' => true,
            'first_options'  => array('label' => 'Password'),
            'second_options' => array('label' => 'Repeat Password')
        ));
    }
}
