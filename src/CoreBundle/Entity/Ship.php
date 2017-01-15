<?php
/**
 * Created by PhpStorm.
 * User: aaz
 * Date: 05.12.16
 * Time: 16:54
 */
namespace CoreBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as JMS;
use NorseDigital\Symfony\RestBundle\Entity\EntityInterface;
use NorseDigital\Symfony\RestBundle\Entity\EntityTrait;

/**
 * Class Ship.
 *
 * @ORM\Entity()
 */
class Ship implements EntityInterface
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
     * @var ShipType
     *
     * @JMS\Type("CoreBundle\Entity\ShipType")
     *
     * @ORM\ManyToOne(targetEntity="ShipType", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="ship_type_id", referencedColumnName="id", nullable=false)
     */
    private $shipType;

    /**
     * @var BattleField
     *
     * @JMS\Type("CoreBundle\Entity\BattleField")
     * @JMS\Exclude()
     *
     * @ORM\ManyToOne(targetEntity="BattleField", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="battle_field_id", referencedColumnName="id", nullable=false)
     */
    private $battleField;

    /**
     * @var ArrayCollection|ShipLocation[]
     *
     * @JMS\Type("array<CoreBundle\Entity\ShipLocation>")
     *
     * @ORM\OneToMany(targetEntity="ShipLocation", mappedBy="ship", cascade={"all"})
     */
    private $location;

    /**
     * {@inheritdoc}
     */
    public function __construct() {
        $this->location = new ArrayCollection();
    }

    /**
     * @return int|null
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return ShipType
     */
    public function getShipType(): ShipType
    {
        return $this->shipType;
    }

    /**
     * @param ShipType $shipType
     *
     * @return Ship
     */
    public function setShipType(ShipType $shipType): self
    {
        $this->shipType = $shipType;

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
     * @return Ship
     */
    public function setBattleField(BattleField $battleField): self
    {
        $this->battleField = $battleField;

        return $this;
    }

    /**
     * @return ShipLocation[]|ArrayCollection
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * @param ShipLocation[]|ArrayCollection $location
     *
     * @return Ship
     */
    public function setLocation($location): self
    {
        $this->location = $location;

        return $this;
    }
}