<?php
/**
 * Created by PhpStorm.
 * User: stas
 * Date: 04.10.16
 * Time: 23:42.
 */
namespace CoreBundle\Model\Request\User;

//use CoreBundle\Entity\UserType;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class UserRegisterRequest.
 */
class UserRegisterRequest implements UserValidationInterface
{

    use UserValidationTrait;


    /**
     * @var string
     *
     */
    private $passwordRepeat = '';

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }
}
