<?php
/**
 * Created by PhpStorm.
 * User: aaz
 * Date: 06.12.16
 * Time: 0:29
 */
namespace CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as JMS;
use NorseDigital\Symfony\RestBundle\Entity\EntityInterface;
use NorseDigital\Symfony\RestBundle\Entity\EntityTrait;

/**
 * Class Shot.
 *
 * @ORM\Entity()
 */
class Shot implements EntityInterface
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
     * @var Map
     *
     * @JMS\Type("CoreBundle\Entity\Map")
     *
     * @ORM\ManyToOne(targetEntity="Map", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="map_id", referencedColumnName="id", nullable=false)
     */
    private $map;

    /**
     * @var ShotStatus
     *
     * @JMS\Type("CoreBundle\Entity\ShotStatus")
     *
     * @ORM\ManyToOne(targetEntity="ShotStatus", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="shot_status_id", referencedColumnName="id", nullable=false)
     */
    private $shotStatus;

    /**
     * @var BattleField
     *
     * @JMS\Type("CoreBundle\Entity\BattleField")
     *
     * @ORM\ManyToOne(targetEntity="BattleField", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="battle_field_id", referencedColumnName="id", nullable=false)
     */
    private $battleField;

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
     * @return Shot
     */
    public function setUser(User $user): self
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return Map
     */
    public function getMap(): Map
    {
        return $this->map;
    }

    /**
     * @param Map $map
     *
     * @return Shot
     */
    public function setMap(Map $map): self
    {
        $this->map = $map;

        return $this;
    }

    /**
     * @return ShotStatus
     */
    public function getShotStatus(): ShotStatus
    {
        return $this->shotStatus;
    }

    /**
     * @param ShotStatus $shotStatus
     *
     * @return Shot
     */
    public function setShotStatus(ShotStatus $shotStatus): self
    {
        $this->shotStatus = $shotStatus;

        return $this;
    }

    /**
     * @return BattleField
     */
    public function getBattleField(): BattleField
    {
        return $this->battleField;
    }

    /**
     * @param BattleField $battleField
     *
     * @return Shot
     */
    public function setBattleField(BattleField $battleField): self
    {
        $this->battleField = $battleField;

        return $this;
    }
}