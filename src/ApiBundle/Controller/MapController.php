<?php

namespace ApiBundle\Controller;

use CoreBundle\Form\Map\MapListType;
use CoreBundle\Form\Map\MapCreateType;
use CoreBundle\Form\Map\MapReadType;
use CoreBundle\Form\Map\MapUpdateType;
use CoreBundle\Form\Map\MapDeleteType;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use NorseDigital\Symfony\RestBundle\Controller\BaseController;
use NorseDigital\Symfony\RestBundle\Handler\ProcessorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\Annotations\RouteResource;

/**
 * Class MapController
 *
 * @RouteResource("Map")
 */
class MapController extends BaseController
{
    /**
     * @ApiDoc(
     *  resource=true,
     *  section="Map",
     *  description="Get a list of Map",
     *  input={
     *       "class" = "CoreBundle\Form\Map\Map",
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
        return $this->process($request, MapListType::class);
    }

    /**
     * @ApiDoc(
     *  resource=true,
     *  section="Map",
     *  description="Create new Map",
     *  input={
     *       "class" = "CoreBundle\Form\Map\MapCreateType",
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
        return $this->process($request, MapCreateType::class, Response::HTTP_CREATED);
    }

    /**
     * @ApiDoc(
     *  resource=true,
     *  section="Map",
     *  description="Get Map",
     *  input={
     *       "class" = "CoreBundle\Form\Map\MapReadType",
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
     * @param int $map
     *
     * @return Response
     */
    public function getAction(Request $request, int $map) : Response
    {
        return $this->process($request, MapReadType::class);
    }

    /**
     * @ApiDoc(
     *  resource=true,
     *  section="Map",
     *  description="Update all fields in Map",
     *  input={
     *       "class" = "CoreBundle\Form\Map\MapUpdateType",
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
     * @param int $map
     *
     * @return Response
     */
    public function putAction(Request $request, int $map) : Response
    {
        return $this->process($request, MapUpdateType::class);
    }

    /**
     * @ApiDoc(
     *  resource=true,
     *  section="Map",
     *  description="Update certain fields in Map",
     *  input={
     *       "class" = "CoreBundle\Form\Map\MapUpdateType",
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
     * @param int $map
     *
     * @return Response
     */
    public function patchAction(Request $request, int $map) : Response
    {
        return $this->process($request, MapUpdateType::class);
    }

    /**
     * @ApiDoc(
     *  resource=true,
     *  section="Map",
     *  description="Delete Map",
     *  input={
     *       "class" = "CoreBundle\Form\Map\MapDeleteType",
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
     * @param int $map
     *
     * @return Response
     */
    public function deleteAction(Request $request, int $map) : Response
    {
        return $this->process($request, MapDeleteType::class);
    }

    /**
     * {@inheritdoc}
     */
    protected function getProcessor() : ProcessorInterface
    {
        return $this->get('core.handler.map');
    }
}
