<?php

namespace ApiBundle\Controller;

use CoreBundle\Form\ShipLocation\ShipLocationListType;
use CoreBundle\Form\ShipLocation\ShipLocationCreateType;
use CoreBundle\Form\ShipLocation\ShipLocationReadType;
use CoreBundle\Form\ShipLocation\ShipLocationUpdateType;
use CoreBundle\Form\ShipLocation\ShipLocationDeleteType;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use NorseDigital\Symfony\RestBundle\Controller\BaseController;
use NorseDigital\Symfony\RestBundle\Handler\ProcessorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\Annotations\RouteResource;

/**
 * Class ShipLocationController
 *
 * @RouteResource("ShipLocation")
 */
class ShipLocationController extends BaseController
{
    /**
     * @ApiDoc(
     *  resource=true,
     *  section="ShipLocation",
     *  description="Get a list of ShipLocation",
     *  input={
     *       "class" = "CoreBundle\Form\ShipLocation\ShipLocation",
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
        return $this->process($request, ShipLocationListType::class);
    }

    /**
     * @ApiDoc(
     *  resource=true,
     *  section="ShipLocation",
     *  description="Create new ShipLocation",
     *  input={
     *       "class" = "CoreBundle\Form\ShipLocation\ShipLocationCreateType",
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
        return $this->process($request, ShipLocationCreateType::class, Response::HTTP_CREATED);
    }

    /**
     * @ApiDoc(
     *  resource=true,
     *  section="ShipLocation",
     *  description="Get ShipLocation",
     *  input={
     *       "class" = "CoreBundle\Form\ShipLocation\ShipLocationReadType",
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
     * @param int $shipLocation
     *
     * @return Response
     */
    public function getAction(Request $request, int $shipLocation) : Response
    {
        return $this->process($request, ShipLocationReadType::class);
    }

    /**
     * @ApiDoc(
     *  resource=true,
     *  section="ShipLocation",
     *  description="Update all fields in ShipLocation",
     *  input={
     *       "class" = "CoreBundle\Form\ShipLocation\ShipLocationUpdateType",
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
     * @param int $shipLocation
     *
     * @return Response
     */
    public function putAction(Request $request, int $shipLocation) : Response
    {
        return $this->process($request, ShipLocationUpdateType::class);
    }

    /**
     * @ApiDoc(
     *  resource=true,
     *  section="ShipLocation",
     *  description="Update certain fields in ShipLocation",
     *  input={
     *       "class" = "CoreBundle\Form\ShipLocation\ShipLocationUpdateType",
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
     * @param int $shipLocation
     *
     * @return Response
     */
    public function patchAction(Request $request, int $shipLocation) : Response
    {
        return $this->process($request, ShipLocationUpdateType::class);
    }

    /**
     * @ApiDoc(
     *  resource=true,
     *  section="ShipLocation",
     *  description="Delete ShipLocation",
     *  input={
     *       "class" = "CoreBundle\Form\ShipLocation\ShipLocationDeleteType",
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
     * @param int $shipLocation
     *
     * @return Response
     */
    public function deleteAction(Request $request, int $shipLocation) : Response
    {
        return $this->process($request, ShipLocationDeleteType::class);
    }

    /**
     * {@inheritdoc}
     */
    protected function getProcessor() : ProcessorInterface
    {
        return $this->get('core.handler.ship_location');
    }
}
