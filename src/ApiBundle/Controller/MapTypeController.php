<?php

namespace ApiBundle\Controller;

use CoreBundle\Form\MapType\MapTypeListType;
use CoreBundle\Form\MapType\MapTypeCreateType;
use CoreBundle\Form\MapType\MapTypeReadType;
use CoreBundle\Form\MapType\MapTypeUpdateType;
use CoreBundle\Form\MapType\MapTypeDeleteType;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use NorseDigital\Symfony\RestBundle\Controller\BaseController;
use NorseDigital\Symfony\RestBundle\Handler\ProcessorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\Annotations\RouteResource;

/**
 * Class MapTypeController
 *
 * @RouteResource("MapType")
 */
class MapTypeController extends BaseController
{
    /**
     * @ApiDoc(
     *  resource=true,
     *  section="MapType",
     *  description="Get a list of MapType",
     *  input={
     *       "class" = "CoreBundle\Form\MapType\MapType",
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
        return $this->process($request, MapTypeListType::class);
    }

    /**
     * @ApiDoc(
     *  resource=true,
     *  section="MapType",
     *  description="Create new MapType",
     *  input={
     *       "class" = "CoreBundle\Form\MapType\MapTypeCreateType",
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
        return $this->process($request, MapTypeCreateType::class, Response::HTTP_CREATED);
    }

    /**
     * @ApiDoc(
     *  resource=true,
     *  section="MapType",
     *  description="Get MapType",
     *  input={
     *       "class" = "CoreBundle\Form\MapType\MapTypeReadType",
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
     * @param int $mapType
     *
     * @return Response
     */
    public function getAction(Request $request, int $mapType) : Response
    {
        return $this->process($request, MapTypeReadType::class);
    }

    /**
     * @ApiDoc(
     *  resource=true,
     *  section="MapType",
     *  description="Update all fields in MapType",
     *  input={
     *       "class" = "CoreBundle\Form\MapType\MapTypeUpdateType",
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
     * @param int $mapType
     *
     * @return Response
     */
    public function putAction(Request $request, int $mapType) : Response
    {
        return $this->process($request, MapTypeUpdateType::class);
    }

    /**
     * @ApiDoc(
     *  resource=true,
     *  section="MapType",
     *  description="Update certain fields in MapType",
     *  input={
     *       "class" = "CoreBundle\Form\MapType\MapTypeUpdateType",
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
     * @param int $mapType
     *
     * @return Response
     */
    public function patchAction(Request $request, int $mapType) : Response
    {
        return $this->process($request, MapTypeUpdateType::class);
    }

    /**
     * @ApiDoc(
     *  resource=true,
     *  section="MapType",
     *  description="Delete MapType",
     *  input={
     *       "class" = "CoreBundle\Form\MapType\MapTypeDeleteType",
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
     * @param int $mapType
     *
     * @return Response
     */
    public function deleteAction(Request $request, int $mapType) : Response
    {
        return $this->process($request, MapTypeDeleteType::class);
    }

    /**
     * {@inheritdoc}
     */
    protected function getProcessor() : ProcessorInterface
    {
        return $this->get('core.handler.map_type');
    }
}
