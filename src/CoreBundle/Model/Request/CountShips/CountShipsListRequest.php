<?php

namespace CoreBundle\Model\Request\CountShips;

use CoreBundle\Entity\CountShips;
use NorseDigital\Symfony\RestBundle\Request\ListRequestInterface;
use NorseDigital\Symfony\RestBundle\Request\ListRequestTrait;
use NorseDigital\Symfony\RestBundle\Request\AbstractRequest;

/**
 * Class CountShipsListRequest
 */
class CountShipsListRequest extends AbstractRequest implements ListRequestInterface
{
    use ListRequestTrait;

    /**
     * @var CountShips
     */
    protected $countShips;

    /**
     * @return CountShips
     */
    public function getCountShips(): CountShips
    {
        return $this->countShips;
    }

    /**
     * @param CountShips $countShips
     */
    public function setCountShips(CountShips $countShips): CountShips
    {
        $this->countShips = $countShips;
    }

}
