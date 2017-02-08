<?php

namespace ApiBundle\Controller;

use CoreBundle\Form\CountShips\CountShipsListType;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use NorseDigital\Symfony\RestBundle\Controller\BaseController;
use NorseDigital\Symfony\RestBundle\Handler\ProcessorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\Annotations\RouteResource;

/**
 * Class CountShipsController
 *
 * @RouteResource("CountShips")
 */
class CountShipsController extends BaseController
{
    /**
     * @ApiDoc(
     *  resource=true,
     *  section="CountShips",
     *  description="Get a list of CountShips",
     *  input={
     *       "class" = "CoreBundle\Form\CountShips\CountShipsListType",
     *       "name" = ""
     *  },
     *  statusCodes={
     *      200 = "Ok",
     *      204 = "Positions not found",
     *      400 = "Bad format",
     *      403 = "Forbidden"
     *  }
     * )
     *
     * @param Request $request
     *
     * @return Response
     */
    public function cgetAction(Request $request) : Response
    {
        return $this->process($request, CountShipsListType::class);
    }

    /**
     * {@inheritdoc}
     */
    protected function getProcessor() : ProcessorInterface
    {
        return $this->get('core.handler.count_ships');
    }
}
