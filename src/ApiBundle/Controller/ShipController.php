<?php

namespace ApiBundle\Controller;

use CoreBundle\Form\Ship\ShipListType;
use CoreBundle\Form\Ship\ShipCreateType;
use CoreBundle\Form\Ship\ShipReadType;
use CoreBundle\Form\Ship\ShipUpdateType;
use CoreBundle\Form\Ship\ShipDeleteType;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use NorseDigital\Symfony\RestBundle\Controller\BaseController;
use NorseDigital\Symfony\RestBundle\Handler\ProcessorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\Annotations\RouteResource;

/**
 * Class ShipController
 *
 * @RouteResource("Ship")
 */
class ShipController extends BaseController
{
    /**
     * @ApiDoc(
     *  resource=true,
     *  section="Ship",
     *  description="Create new Ship",
     *  input={
     *       "class" = "CoreBundle\Form\Ship\ShipCreateType",
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
        return $this->process($request, ShipCreateType::class, Response::HTTP_CREATED);
    }

    /**
     * @ApiDoc(
     *  resource=true,
     *  section="Ship",
     *  description="Get Ship",
     *  input={
     *       "class" = "CoreBundle\Form\Ship\ShipReadType",
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
     * @param int $ship
     *
     * @return Response
     */
    public function getAction(Request $request, int $ship) : Response
    {
        return $this->process($request, ShipReadType::class);
    }

    /**
     * @ApiDoc(
     *  resource=true,
     *  section="Ship",
     *  description="Update all fields in Ship",
     *  input={
     *       "class" = "CoreBundle\Form\Ship\ShipUpdateType",
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
     * @param int $ship
     *
     * @return Response
     */
    public function putAction(Request $request, int $ship) : Response
    {
        return $this->process($request, ShipUpdateType::class);
    }

    /**
     * @ApiDoc(
     *  resource=true,
     *  section="Ship",
     *  description="Update certain fields in Ship",
     *  input={
     *       "class" = "CoreBundle\Form\Ship\ShipUpdateType",
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
     * @param int $ship
     *
     * @return Response
     */
    public function patchAction(Request $request, int $ship) : Response
    {
        return $this->process($request, ShipUpdateType::class);
    }

    /**
     * @ApiDoc(
     *  resource=true,
     *  section="Ship",
     *  description="Delete Ship",
     *  input={
     *       "class" = "CoreBundle\Form\Ship\ShipDeleteType",
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
     * @param int $ship
     *
     * @return Response
     */
    public function deleteAction(Request $request, int $ship) : Response
    {
        return $this->process($request, ShipDeleteType::class);
    }

    /**
     * {@inheritdoc}
     */
    protected function getProcessor() : ProcessorInterface
    {
        return $this->get('core.handler.ship');
    }
}
