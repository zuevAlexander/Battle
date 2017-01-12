<?php

namespace CoreBundle\Handler;

use CoreBundle\Entity\User;
use CoreBundle\Model\Request\User\UserListRequest;
use CoreBundle\Model\Request\User\UserLoginRequest;
use CoreBundle\Model\Request\User\UserRegisterRequest;
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
     * @param UserListRequest $request
     * @return array
     */
    public function processGetC(UserListRequest $request): array
    {
        return $this->userService->getEntitiesByWithListRequestAndTotal(
            [],
            $request
        );
    }

    /**
     * @param UserLoginRequest $request
     * @return User
     */
    public function processPostLogin(UserLoginRequest $request) : User
    {
        $user = $this->container->get('security.token_storage')->getToken()->getUser();
        $this->userService->generateApiKey($user);

        return $user;
    }

    /**
     * @param UserRegisterRequest $request
     * @return User
     */
    public function processPostRegister(UserRegisterRequest $request) : User
    {
        return $this->userService->createUser($request);
    }
}
