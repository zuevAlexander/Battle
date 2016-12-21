<?php

namespace CoreBundle\Model\Request\User;

use CoreBundle\Entity\User;

/**
 * Interface UserSingleRequestInterface
 * * @method bool hasUser()
 */
interface UserSingleRequestInterface
{
    /**
     * @return User
     */
    public function getUser(): User;

    /**
     * @param User $user
     */
    public function setUser(User $user);
}
