<?php
/**
 * Created by PhpStorm.
 * User: aaz
 * Date: 05.12.16
 * Time: 16:41.
 */
namespace CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as JMS;
use NorseDigital\Symfony\RestBundle\Entity\EntityTrait;
use NorseDigital\Symfony\RestBundle\Oauth\UserOauthInterface;
use NorseDigital\Symfony\RestBundle\Oauth\UserOauthTrait;
use NorseDigital\Symfony\RestBundle\User\UserInterface as NDUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;
use Symfony\Component\Security\Core\Authentication\AuthenticationProviderManager;
use Symfony\Component\Validator\Constraints as Assert;
/**
 * Class User.
 *
 * @ORM\Entity(repositoryClass="CoreBundle\Repository\UserRepository")
 */
class User implements  UserInterface, NDUserInterface
{
    use EntityTrait;
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     *
     * @JMS\Expose
     * @JMS\SerializedName("id")
     * @JMS\Type("integer")
     */
    private $id;

    /**
     * @var string
     *
     * @Assert\Length(
     *     min="4",
     *     max="255"
     * )
     * @Assert\NotBlank()
     *
     * @JMS\Exclude()
     *
     * @ORM\Column(name="name", type="string", unique=true)
     */
    private $username;

    /**
     * @var string
     *
     * @Assert\Length(
     *     min="4",
     *     max="255"
     * )
     * @Assert\NotBlank()
     *
     * @JMS\Exclude()
     *
     * @ORM\Column(name="password", type="string")
     */
    private $password;

    /**
     * @var string
     *
     * @JMS\Type("string")
     * @JMS\Groups({"post_user_login", "post_user_register"})
     *
     * @ORM\Column(type="string", unique=true)
     */
    private $apiKey;

    /**
     * @return mixed
     */
    public function getApiKey()
    {
        return $this->apiKey;
    }

    /**
     * @param mixed $apiKey
     */
    public function setApiKey($apiKey)
    {
        $this->apiKey = $apiKey;
    }

    /**
     * @return int|null
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param string $username
     *
     * @return User
     */
    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param string $password
     *
     * @return User
     */
    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getRoles()
    {
        return array('ROLE_USER');
    }

    public function getSalt()
    {
    }

    public function eraseCredentials()
    {
    }
}
