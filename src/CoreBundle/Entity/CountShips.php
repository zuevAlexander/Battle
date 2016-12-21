<?php
/**
 * Created by PhpStorm.
 * User: aaz
 * Date: 05.12.16
 * Time: 17:13
 */
namespace CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as JMS;
use NorseDigital\Symfony\RestBundle\Entity\EntityInterface;
use NorseDigital\Symfony\RestBundle\Entity\EntityTrait;

/**
 * Class CountShips.
 *
 * @ORM\Entity()
 */
class CountShips implements EntityInterface
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
     * @var int
     *
     * @JMS\Type("integer")
     *
     * @ORM\Column(type="integer")
     */
    private $count;

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
     * @return ShipType
     */
    public function getShipType(): ShipType
    {
        return $this->shipType;
    }

    /**
     * @param ShipType $shipType
     *
     * @return CountShips
     */
    public function setShipType(ShipType $shipType): self
    {
        $this->shipType = $shipType;

        return $this;
    }

    /**
     * @return int
     */
    public function getCount()
    {
        return $this->count;
    }

    /**
     * @param int $count
     *
     * @return CountShips
     */
    public function setCount(int $count): self
    {
        $this->count = $count;

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
     * @return CountShips
     */
    public function setMapType(MapType $mapType): self
    {
        $this->mapType = $mapType;

        return $this;
    }
}