<?php

namespace CoreBundle\Service\User;


/**
 * Interface UserDefaultValuesInterface
 */
interface UserDefaultValuesInterface
{
    

    /**
     * @return string
     */
    public function getDefaultUsername(): string;

    /**
     * @return string
     */
    public function getDefaultPassword(): string;

    /**
     * @return string
     */
    public function getDefaultToken(): string;

    /**
     * @return string
     */
    public function getDefaultApiKey(): string;
}
