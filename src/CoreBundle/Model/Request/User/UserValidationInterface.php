<?php
/**
 * Created by PhpStorm.
 * User: ib
 * Date: 19.10.16
 * Time: 17:16
 */

namespace CoreBundle\Model\Request\User;

interface UserValidationInterface
{
    /**
     * @return string
     */
    public function getName(): string;

    /**
     * @return string
     */
    public function getPassword(): string;

}