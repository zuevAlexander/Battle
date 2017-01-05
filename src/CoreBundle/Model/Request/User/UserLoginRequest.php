<?php

namespace CoreBundle\Model\Request\User;

use CoreBundle\Entity\UserType;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class UserLoginRequest.
 */
class UserLoginRequest
{
    /**
     * @var string
     *
     */
    private $name = '';

    /**
     * @var string
     *
     */
    private $password = '';

    /**
     * @return string
     */
    public function getName(): string
    {
        return (string)$this->name;
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
        return (string)$this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }
}
