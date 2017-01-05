<?php

namespace CoreBundle\Model\Request\User;


/**
 * Interface UserAllRequestInterface
 *
 * @method bool hasUsername()
 * @method bool hasPassword()
 * @method bool hasToken()
 * @method bool hasApiKey()
 */
interface UserAllRequestInterface
{
    

    /**
     * @return string
     */
    public function getUsername(): string;

    /**
     * @param string $username
     */
    public function setUsername(string $username);

    /**
     * @return string
     */
    public function getPassword(): string;

    /**
     * @param string $password
     */
    public function setPassword(string $password);

    /**
     * @return string
     */
    public function getApiKey(): string;

    /**
     * @param string $apiKey
     */
    public function setApiKey(string $apiKey);
}
