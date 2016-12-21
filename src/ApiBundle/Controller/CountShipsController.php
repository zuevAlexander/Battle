<?php

namespace ApiBundle\Controller;

use CoreBundle\Form\CountShips\CountShipsListType;
use CoreBundle\Form\CountShips\CountShipsCreateType;
use CoreBundle\Form\CountShips\CountShipsReadType;
use CoreBundle\Form\CountShips\CountShipsUpdateType;
use CoreBundle\Form\CountShips\CountShipsDeleteType;
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
     *       "class" = "CoreBundle\Form\CountShips\CountShips",
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
     * @ApiDoc(
     *  resource=true,
     *  section="CountShips",
     *  description="Create new CountShips",
     *  input={
     *       "class" = "CoreBundle\Form\CountShips\CountShipsCreateType",
     *       "name" = ""
     *  },
     *  statusCodes={
     *      200 = "Ok",
     *      204 = "Positions not found",
     *      400 = "Bad format",
     *      403 = "Forbidden"
     *  }
     *)
     *
     * @param Request $request
     *
     * @return Response
     */
    public function postAction(Request $request) : Response
    {
        return $this->process($request, CountShipsCreateType::class, Response::HTTP_CREATED);
    }

    /**
     * @ApiDoc(
     *  resource=true,
     *  section="CountShips",
     *  description="Get CountShips",
     *  input={
     *       "class" = "CoreBundle\Form\CountShips\CountShipsReadType",
     *       "name" = ""
     *  },
     *  statusCodes={
     *      200 = "Ok",
     *      204 = "Positions not found",
     *      400 = "Bad format",
     *      403 = "Forbidden"
     *  }
     *)
     *
     * @param Request $request
     * @param int $countShips
     *
     * @return Response
     */
    public function getAction(Request $request, int $countShips) : Response
    {
        return $this->process($request, CountShipsReadType::class);
    }

    /**
     * @ApiDoc(
     *  resource=true,
     *  section="CountShips",
     *  description="Update all fields in CountShips",
     *  input={
     *       "class" = "CoreBundle\Form\CountShips\CountShipsUpdateType",
     *       "name" = ""
     *  },
     *  statusCodes={
     *      200 = "Ok",
     *      204 = "Positions not found",
     *      400 = "Bad format",
     *      403 = "Forbidden"
     *  }
     *)
     *
     * @param Request $request
     * @param int $countShips
     *
     * @return Response
     */
    public function putAction(Request $request, int $countShips) : Response
    {
        return $this->process($request, CountShipsUpdateType::class);
    }

    /**
     * @ApiDoc(
     *  resource=true,
     *  section="CountShips",
     *  description="Update certain fields in CountShips",
     *  input={
     *       "class" = "CoreBundle\Form\CountShips\CountShipsUpdateType",
     *       "name" = ""
     *  },
     *  statusCodes={
     *      200 = "Ok",
     *      204 = "Positions not found",
     *      400 = "Bad format",
     *      403 = "Forbidden"
     *  }
     *)
     *
     * @param Request $request
     * @param int $countShips
     *
     * @return Response
     */
    public function patchAction(Request $request, int $countShips) : Response
    {
        return $this->process($request, CountShipsUpdateType::class);
    }

    /**
     * @ApiDoc(
     *  resource=true,
     *  section="CountShips",
     *  description="Delete CountShips",
     *  input={
     *       "class" = "CoreBundle\Form\CountShips\CountShipsDeleteType",
     *       "name" = ""
     *  },
     *  statusCodes={
     *      200 = "Ok",
     *      204 = "Positions not found",
     *      400 = "Bad format",
     *      403 = "Forbidden"
     *  }
     *)
     *
     * @param Request $request
     * @param int $countShips
     *
     * @return Response
     */
    public function deleteAction(Request $request, int $countShips) : Response
    {
        return $this->process($request, CountShipsDeleteType::class);
    }

    /**
     * {@inheritdoc}
     */
    protected function getProcessor() : ProcessorInterface
    {
        return $this->get('core.handler.count_ships');
    }
}
