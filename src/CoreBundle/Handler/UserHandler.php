<?php

namespace CoreBundle\Handler;

use CoreBundle\Entity\User;
use CoreBundle\Model\Request\User\UserListRequest;
use CoreBundle\Model\Request\User\UserCreateRequest;
use CoreBundle\Model\Request\User\UserReadRequest;
use CoreBundle\Model\Request\User\UserUpdateRequest;
use CoreBundle\Model\Request\User\UserDeleteRequest;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerAwareTrait;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use CoreBundle\Model\Handler\UserProcessorInterface;
use CoreBundle\Service\User\UserService;

/**
 * Class UserHandler
 */
class UserHandler implements ContainerAwareInterface, UserProcessorInterface
{
    use ContainerAwareTrait;

    /**
     * @var EventDispatcherInterface
     */
    private $eventDispatcher;

    /**
     * @var UserService
     */
    private $userService;

    /**
     * UserHandler constructor.
     * @param ContainerInterface $container
     * @param EventDispatcherInterface $eventDispatcher
     * @param UserService $userService
     */
    public function __construct(
        ContainerInterface $container,
        EventDispatcherInterface $eventDispatcher,
        UserService $userService
    ) {
        $this->setContainer($container);
        $this->eventDispatcher = $eventDispatcher;
        $this->userService = $userService;
    }

    /**
     * @inheritdoc
     */
    public function processGetC(UserListRequest $request): array
    {
        return $this->userService->getEntitiesByWithListRequestAndTotal(
            [],
            $request
        );
    }

    /**
     * @inheritdoc
     */
    public function processPost(UserCreateRequest $request): User
    {
        return $this->userService->updatePost($request);
    }

    /**
     * @inheritdoc
     */
    public function processGet(UserReadRequest $request): User
    {
        return $request->getUser();
    }

    /**
     * @inheritdoc
     */
    public function processPut(UserUpdateRequest $request): User
    {
        return $this->userService->updatePut($request);
    }

    /**
     * @inheritdoc
     */
    public function processPatch(UserUpdateRequest $request): User
    {
        return $this->userService->updatePatch($request);
    }

    /**
     * @inheritdoc
     */
    public function processDelete(UserDeleteRequest $request): User
    {
        return $this->userService->deleteEntity($request->getUser());
    }

    /**
     * @inheritdoc
     */
    public function createUser(User $user): User
    {
        return $this->userService->saveUser($user);
    }
}
