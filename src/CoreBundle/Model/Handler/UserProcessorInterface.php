<?php

namespace CoreBundle\Model\Handler;

use CoreBundle\Entity\User;
use CoreBundle\Model\Request\User\UserListRequest;
use CoreBundle\Model\Request\User\UserCreateRequest;
use CoreBundle\Model\Request\User\UserReadRequest;
use CoreBundle\Model\Request\User\UserUpdateRequest;
use CoreBundle\Model\Request\User\UserDeleteRequest;
use NorseDigital\Symfony\RestBundle\Handler\ProcessorInterface;

/**
 * Interface UserProcessorInterface
 */
interface UserProcessorInterface extends ProcessorInterface
{
    /**
     * @param UserListRequest $request
     * @return array
     */
    public function processGetC(UserListRequest $request): array;

    /**
     * @param UserCreateRequest $request
     * @return User
     */
    public function processPost(UserCreateRequest $request): User;

    /**
     * @param UserReadRequest $request
     * @return User
     */
    public function processGet(UserReadRequest $request): User;

    /**
     * @param UserUpdateRequest $request
     * @return User
     */
    public function processPut(UserUpdateRequest $request): User;

    /**
     * @param UserUpdateRequest $request
     * @return User
     */
    public function processPatch(UserUpdateRequest $request): User;

    /**
     * @param UserDeleteRequest $request
     * @return User
     */
    public function processDelete(UserDeleteRequest $request): User;
}
