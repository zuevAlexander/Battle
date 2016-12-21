<?php

namespace ApiBundle\Controller;

use CoreBundle\Form\ShipType\ShipTypeListType;
use CoreBundle\Form\ShipType\ShipTypeCreateType;
use CoreBundle\Form\ShipType\ShipTypeReadType;
use CoreBundle\Form\ShipType\ShipTypeUpdateType;
use CoreBundle\Form\ShipType\ShipTypeDeleteType;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use NorseDigital\Symfony\RestBundle\Controller\BaseController;
use NorseDigital\Symfony\RestBundle\Handler\ProcessorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\Annotations\RouteResource;

/**
 * Class ShipTypeController
 *
 * @RouteResource("ShipType")
 */
class ShipTypeController extends BaseController
{
    /**
     * @ApiDoc(
     *  resource=true,
     *  section="ShipType",
     *  description="Get a list of ShipType",
     *  input={
     *       "class" = "CoreBundle\Form\ShipType\ShipType",
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
        return $this->process($request, ShipTypeListType::class);
    }

    /**
     * @ApiDoc(
     *  resource=true,
     *  section="ShipType",
     *  description="Create new ShipType",
     *  input={
     *       "class" = "CoreBundle\Form\ShipType\ShipTypeCreateType",
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
        return $this->process($request, ShipTypeCreateType::class, Response::HTTP_CREATED);
    }

    /**
     * @ApiDoc(
     *  resource=true,
     *  section="ShipType",
     *  description="Get ShipType",
     *  input={
     *       "class" = "CoreBundle\Form\ShipType\ShipTypeReadType",
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
     * @param int $shipType
     *
     * @return Response
     */
    public function getAction(Request $request, int $shipType) : Response
    {
        return $this->process($request, ShipTypeReadType::class);
    }

    /**
     * @ApiDoc(
     *  resource=true,
     *  section="ShipType",
     *  description="Update all fields in ShipType",
     *  input={
     *       "class" = "CoreBundle\Form\ShipType\ShipTypeUpdateType",
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
     * @param int $shipType
     *
     * @return Response
     */
    public function putAction(Request $request, int $shipType) : Response
    {
        return $this->process($request, ShipTypeUpdateType::class);
    }

    /**
     * @ApiDoc(
     *  resource=true,
     *  section="ShipType",
     *  description="Update certain fields in ShipType",
     *  input={
     *       "class" = "CoreBundle\Form\ShipType\ShipTypeUpdateType",
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
     * @param int $shipType
     *
     * @return Response
     */
    public function patchAction(Request $request, int $shipType) : Response
    {
        return $this->process($request, ShipTypeUpdateType::class);
    }

    /**
     * @ApiDoc(
     *  resource=true,
     *  section="ShipType",
     *  description="Delete ShipType",
     *  input={
     *       "class" = "CoreBundle\Form\ShipType\ShipTypeDeleteType",
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
     * @param int $shipType
     *
     * @return Response
     */
    public function deleteAction(Request $request, int $shipType) : Response
    {
        return $this->process($request, ShipTypeDeleteType::class);
    }

    /**
     * {@inheritdoc}
     */
    protected function getProcessor() : ProcessorInterface
    {
        return $this->get('core.handler.ship_type');
    }
}
