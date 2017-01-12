<?php
namespace CoreBundle\Security;

use Symfony\Component\Security\Core\Exception\TokenNotFoundException;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use CoreBundle\Entity\User;

class WebserviceUserProvider implements UserProviderInterface
{
    /**
     * @var \Symfony\Bridge\Doctrine\RegistryInterface
     */
    protected $doctrine;


    /**
     * WebserviceUserProvider constructor.
     * @param \Symfony\Bridge\Doctrine\RegistryInterface $doctrine
     */
    public function __construct(\Symfony\Bridge\Doctrine\RegistryInterface $doctrine)
    {
        $this->doctrine = $doctrine;
    }

    /**
     * @param $apiKey
     * @return User
     */
    public function getUserForApiKey($apiKey)
    {
        try {
            $userData = $this->doctrine->getRepository('CoreBundle:User')->findOneBy(array('apiKey' => $apiKey));
        } catch (\Exception $e) {
            throw new TokenNotFoundException();
        }

        return $userData;
    }

    /**
     * @param string $username
     * @return User
     */
    public function loadUserByUsername($username)
    {
        try {
            $userData = $this->doctrine->getRepository('CoreBundle:User')->findOneBy(array('username' => $username));
        } catch (\Exception $e) {
            throw new UsernameNotFoundException();
        }

        return $userData;
    }

    /**
     * @param UserInterface $user
     * @return User
     */
    public function refreshUser(UserInterface $user)
    {
        if (!$user instanceof User) {
            throw new UnsupportedUserException(
                sprintf('Instances of "%s" are not supported.', get_class($user))
            );
        }
        return $this->loadUserByUsername($user->getUsername());
    }

    /**
     * @param string $class
     * @return bool
     */
    public function supportsClass($class)
    {
        return User::class === $class;
    }
}