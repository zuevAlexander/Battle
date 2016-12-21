<?php
/**
 * Created by PhpStorm.
 * User: aaz
 * Date: 05.12.16
 * Time: 17:29
 */
namespace CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as JMS;
use NorseDigital\Symfony\RestBundle\Entity\EntityInterface;
use NorseDigital\Symfony\RestBundle\Entity\EntityTrait;

/**
 * Class Map.
 *
 * @ORM\Entity()
 */
class Map implements EntityInterface
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
     * @var integer
     *
     * @JMS\Type("integer")
     * @JMS\SerializedName("latitude")
     *
     * @ORM\Column(name="latitude", type="integer")
     */
    private $latitude;

    /**
     * @var integer
     *
     * @JMS\Type("integer")
     * @JMS\SerializedName("longitude")
     *
     * @ORM\Column(name="longitude", type="integer")
     */
    private $longitude;

    /**
     * @return int|null
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getLatitude(): int
    {
        return $this->latitude;
    }

    /**
     * @param int $latitude
     *
     * @return Map
     */
    public function setLatitude(int $latitude): self
    {
        $this->latitude = $latitude;

        return $this;
    }

    /**
     * @return int
     */
    public function getLongitude(): int
    {
        return $this->longitude;
    }

    /**
     * @param int $latitude
     *
     * @return Map
     */
    public function setLongitude(int $longitude): self
    {
        $this->longitude = $longitude;

        return $this;
    }
}