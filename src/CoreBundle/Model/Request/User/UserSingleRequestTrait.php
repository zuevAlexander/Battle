<?php

namespace CoreBundle\Model\Request\User;

use CoreBundle\Entity\User;

/**
 * Trait UserSingleRequestTrait;
 */
trait UserSingleRequestTrait
{
    /**
     * @var User
     */
    protected $user;

    /**
     * {@inheritdoc}
     */
    public function __construct()
    {
        $this->user = new User();
    }

    /**
     * @return User
     */
    public function getUser(): User
    {
        return $this->user;
    }

    /**
     * @param User $user
     */
    public function setUser(User $user)
    {
        $this->user = $user;
    }
}
