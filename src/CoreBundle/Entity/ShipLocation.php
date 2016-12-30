<?php
/**
 * Created by PhpStorm.
 * User: aaz
 * Date: 06.12.16
 * Time: 0:06
 */
namespace CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as JMS;
use NorseDigital\Symfony\RestBundle\Entity\EntityInterface;
use NorseDigital\Symfony\RestBundle\Entity\EntityTrait;

/**
 * Class ShipLocation.
 *
 * @ORM\Entity()
 */
class ShipLocation implements EntityInterface
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
     * @var Ship
     *
     * @JMS\Expose
     * @JMS\Type("CoreBundle\Entity\Ship")
     * @JMS\Exclude()
     *
     * @ORM\ManyToOne(targetEntity="Ship", fetch="EAGER", cascade={"persist", "remove"}, inversedBy="location")
     * @ORM\JoinColumn(name="ship_id", referencedColumnName="id", nullable=false)
     */
    private $ship;

    /**
     * @var Map
     *
     * @JMS\Type("CoreBundle\Entity\Map")
     *
     * @ORM\ManyToOne(targetEntity="Map", fetch="EAGER", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="map_id", referencedColumnName="id", nullable=false)
     */
    private $map;

    /**
     * @return int|null
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return Ship
     */
    public function getShip(): Ship
    {
        return $this->ship;
    }

    /**
     * @param Ship $ship
     *
     * @return ShipLocation
     */
    public function setShip(Ship $ship): self
    {
        $this->ship = $ship;

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
     * @return ShipLocation
     */
    public function setMap(Map $map): self
    {
        $this->map = $map;

        return $this;
    }
}