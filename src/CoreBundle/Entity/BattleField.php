<?php
/**
 * Created by PhpStorm.
 * User: aaz
 * Date: 06.12.16
 * Time: 0:43
 */
namespace CoreBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as JMS;
use NorseDigital\Symfony\RestBundle\Entity\EntityInterface;
use NorseDigital\Symfony\RestBundle\Entity\EntityTrait;

/**
 * Class BattleField.
 *
 * @ORM\Entity()
 */
class BattleField implements EntityInterface
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
     * @var User
     *
     * @JMS\Type("CoreBundle\Entity\User")
     *
     * @ORM\ManyToOne(targetEntity="User", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id", nullable=false)
     */
    private $user;

    /**
     * @var Battle
     *
     * @JMS\Type("CoreBundle\Entity\Battle")
     *
     * @ORM\ManyToOne(targetEntity="Battle", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="battle_id", referencedColumnName="id", nullable=false)
     */
    private $battle;

    /**
     * @var ArrayCollection|Ship[]
     *
     * @JMS\Type("array<CoreBundle\Entity\Ship>")
     *
     * @ORM\OrderBy({"id" = "DESC"})
     * @ORM\OneToMany(targetEntity="Ship", mappedBy="battleField", cascade={"persist", "remove"})
     */
    private $ships;

    /**
     * @var ArrayCollection|Shot[]
     *
     * @JMS\Type("array<CoreBundle\Entity\Shot>")
     *
     * @ORM\OrderBy({"id" = "DESC"})
     * @ORM\OneToMany(targetEntity="Shot", mappedBy="battleField", cascade={"persist", "remove"})
     */
    private $shots;

    public function __construct()
    {
        $this->ships = new ArrayCollection();
        $this->shots = new ArrayCollection();
    }

    /**
     * @return int|null
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return User
     */
    public function getUser(): User
    {
        return $this->user;
    }

    /**
     * @param User $user
     *
     * @return BattleField
     */
    public function setUser(User $user): self
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return Battle
     */
    public function getBattle(): Battle
    {
        return $this->battle;
    }

    /**
     * @param Battle $battle
     *
     * @return BattleField
     */
    public function setBattle(Battle $battle): self
    {
        $this->battle = $battle;

        return $this;
    }

    /**
     * @return Ship[]|ArrayCollection
     */
    public function getShips()
    {
        return $this->ships;
    }

    /**
     * @param Ship[]|ArrayCollection $ships
     *
     * @return BattleField
     */
    public function setShips($ships): self
    {
        $this->ships = $ships;

        return $this;
    }

    /**
     * @return Shot[]|ArrayCollection
     */
    public function getShots()
    {
        return $this->shots;
    }

    /**
     * @param Shot[]|ArrayCollection $shots
     *
     * @return BattleField
     */
    public function setShots($shots): self
    {
        $this->shots = $shots;

        return $this;
    }
}