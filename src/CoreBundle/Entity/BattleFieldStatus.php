<?php
/**
 * Created by PhpStorm.
 * User: aaz
 * Date: 05.12.16
 * Time: 16:55
 */
namespace CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as JMS;
use NorseDigital\Symfony\RestBundle\Entity\EntityInterface;
use NorseDigital\Symfony\RestBundle\Entity\EntityTrait;

/**
 * Class BattleFieldStatus.
 *
 * @ORM\Entity()
 */
class BattleFieldStatus implements EntityInterface
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
     * @JMS\Type("string")
     * @JMS\SerializedName("name")
     *
     * @ORM\Column(name="name", type="string")
     */
    private $statusName;

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
    public function getStatusName(): string
    {
        return $this->statusName;
    }

    /**
     * @param string $statusName
     *
     * @return BattleFieldStatus
     */
    public function setStatusName(string $statusName): self
    {
        $this->statusName = $statusName;

        return $this;
    }
}
