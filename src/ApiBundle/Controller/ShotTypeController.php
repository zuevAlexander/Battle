<?php

namespace ApiBundle\Controller;

use CoreBundle\Form\ShotType\ShotTypeListType;
use CoreBundle\Form\ShotType\ShotTypeCreateType;
use CoreBundle\Form\ShotType\ShotTypeReadType;
use CoreBundle\Form\ShotType\ShotTypeUpdateType;
use CoreBundle\Form\ShotType\ShotTypeDeleteType;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use NorseDigital\Symfony\RestBundle\Controller\BaseController;
use NorseDigital\Symfony\RestBundle\Handler\ProcessorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\Annotations\RouteResource;

/**
 * Class ShotTypeController
 *
 * @RouteResource("ShotType")
 */
class ShotTypeController extends BaseController
{
    /**
     * @ApiDoc(
     *  resource=true,
     *  section="ShotType",
     *  description="Get a list of ShotType",
     *  input={
     *       "class" = "CoreBundle\Form\ShotType\ShotType",
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
        return $this->process($request, ShotTypeListType::class);
    }

    /**
     * @ApiDoc(
     *  resource=true,
     *  section="ShotType",
     *  description="Create new ShotType",
     *  input={
     *       "class" = "CoreBundle\Form\ShotType\ShotTypeCreateType",
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
        return $this->process($request, ShotTypeCreateType::class, Response::HTTP_CREATED);
    }

    /**
     * @ApiDoc(
     *  resource=true,
     *  section="ShotType",
     *  description="Get ShotType",
     *  input={
     *       "class" = "CoreBundle\Form\ShotType\ShotTypeReadType",
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
     * @param int $shotType
     *
     * @return Response
     */
    public function getAction(Request $request, int $shotType) : Response
    {
        return $this->process($request, ShotTypeReadType::class);
    }

    /**
     * @ApiDoc(
     *  resource=true,
     *  section="ShotType",
     *  description="Update all fields in ShotType",
     *  input={
     *       "class" = "CoreBundle\Form\ShotType\ShotTypeUpdateType",
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
     * @param int $shotType
     *
     * @return Response
     */
    public function putAction(Request $request, int $shotType) : Response
    {
        return $this->process($request, ShotTypeUpdateType::class);
    }

    /**
     * @ApiDoc(
     *  resource=true,
     *  section="ShotType",
     *  description="Update certain fields in ShotType",
     *  input={
     *       "class" = "CoreBundle\Form\ShotType\ShotTypeUpdateType",
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
     * @param int $shotType
     *
     * @return Response
     */
    public function patchAction(Request $request, int $shotType) : Response
    {
        return $this->process($request, ShotTypeUpdateType::class);
    }

    /**
     * @ApiDoc(
     *  resource=true,
     *  section="ShotType",
     *  description="Delete ShotType",
     *  input={
     *       "class" = "CoreBundle\Form\ShotType\ShotTypeDeleteType",
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
     * @param int $shotType
     *
     * @return Response
     */
    public function deleteAction(Request $request, int $shotType) : Response
    {
        return $this->process($request, ShotTypeDeleteType::class);
    }

    /**
     * {@inheritdoc}
     */
    protected function getProcessor() : ProcessorInterface
    {
        return $this->get('core.handler.shot_type');
    }
}
