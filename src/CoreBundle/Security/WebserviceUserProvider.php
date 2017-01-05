<?php
namespace CoreBundle\Security;

use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use CoreBundle\Entity\User;
use CoreBundle\Exception\User\UnauthorizedException;

class WebserviceUserProvider implements UserProviderInterface
{
    /**
     * @var \Symfony\Bridge\Doctrine\RegistryInterface
     */
    protected $doctrine;
    /**
     * @var \CoreBundle\Entity\User
     */
    private $currentUser;
    /**
     * WebserviceUserProvider constructor.
     * @param \Symfony\Bridge\Doctrine\RegistryInterface $doctrine
     */
    public function __construct(\Symfony\Bridge\Doctrine\RegistryInterface $doctrine)
    {
        $this->doctrine = $doctrine;
    }

    public function getUserForApiKey($apiKey)
    {
        try {
            $userData = $this->doctrine->getRepository('CoreBundle:User')->findOneBy(array('token' => $apiKey));
        } catch (\Exception $e) {
            throw new UnauthorizedException();
        }

        if ($userData) {
            $this->currentUser = $userData;
            return $this->currentUser;
        }

        throw new UsernameNotFoundException(
            sprintf('ApiKey "%s" does not exist.', $apiKey)
        );
    }

    public function loadUserByUsername($username)
    {
        try {
            $userData = $this->doctrine->getRepository('CoreBundle:User')->findOneBy(array('username' => $username));
        } catch (\Exception $e) {
            throw new UnauthorizedException();
        }

        if ($userData) {
            $this->currentUser = $userData;
            return $this->currentUser;
        }

        throw new UsernameNotFoundException(
            sprintf('UserName "%s" does not exist.', $username)
        );
    }

    public function getCurrentUser() {
        return $this->currentUser;
    }

    public function refreshUser(UserInterface $user)
    {
        if (!$user instanceof User) {
            throw new UnsupportedUserException(
                sprintf('Instances of "%s" are not supported.', get_class($user))
            );
        }

        return $this->loadUserByUsername($user->getUsername());
    }

    public function supportsClass($class)
    {
        return User::class === $class;
    }
}