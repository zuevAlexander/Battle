<?php
/**
 * Created by PhpStorm.
 * User: aaz
 * Date: 05.12.16
 * Time: 17:50
 */
namespace CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as JMS;
use NorseDigital\Symfony\RestBundle\Entity\EntityInterface;
use NorseDigital\Symfony\RestBundle\Entity\EntityTrait;
use Gedmo\Mapping\Annotation as Gedmo;
use Gedmo\SoftDeleteable\Traits\SoftDeleteableEntity;

/**
 * Class Battle.
 *
 * @ORM\Entity()
 * @Gedmo\SoftDeleteable(fieldName="deletedAt", timeAware=false)
 */
class Battle implements EntityInterface
{
    use SoftDeleteableEntity, EntityTrait;

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
     * @JMS\Type("string")
     * @JMS\SerializedName("name")
     *
     * @ORM\Column(name="name", type="string")
     */
    private $name;

    /**
     * @var BattleStatus
     *
     * @JMS\Type("CoreBundle\Entity\BattleStatus")
     *
     * @ORM\ManyToOne(targetEntity="BattleStatus", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="battle_status_id", referencedColumnName="id", nullable=false)
     */
    private $battleStatus;

    /**
     * @var MapType
     *
     * @JMS\Type("CoreBundle\Entity\MapType")
     *
     * @ORM\ManyToOne(targetEntity="MapType", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="map_type_id", referencedColumnName="id", nullable=false)
     */
    private $mapType;

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
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     *
     * @return Battle
     */
    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return BattleStatus
     */
    public function getBattleStatus(): BattleStatus
    {
        return $this->battleStatus;
    }

    /**
     * @param BattleStatus $battleStatus
     *
     * @return Battle
     */
    public function setBattleStatus(BattleStatus $battleStatus): self
    {
        $this->battleStatus = $battleStatus;

        return $this;
    }

    /**
     * @return MapType
     */
    public function getMapType(): MapType
    {
        return $this->mapType;
    }

    /**
     * @param MapType $mapType
     *
     * @return Battle
     */
    public function setMapType(MapType $mapType): self
    {
        $this->mapType = $mapType;

        return $this;
    }
}