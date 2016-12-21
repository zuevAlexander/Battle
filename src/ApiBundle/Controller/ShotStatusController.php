<?php

namespace ApiBundle\Controller;

use CoreBundle\Form\ShotStatus\ShotStatusListType;
use CoreBundle\Form\ShotStatus\ShotStatusCreateType;
use CoreBundle\Form\ShotStatus\ShotStatusReadType;
use CoreBundle\Form\ShotStatus\ShotStatusUpdateType;
use CoreBundle\Form\ShotStatus\ShotStatusDeleteType;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use NorseDigital\Symfony\RestBundle\Controller\BaseController;
use NorseDigital\Symfony\RestBundle\Handler\ProcessorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\Annotations\RouteResource;

/**
 * Class ShotStatusController
 *
 * @RouteResource("ShotStatus")
 */
class ShotStatusController extends BaseController
{
    /**
     * @ApiDoc(
     *  resource=true,
     *  section="ShotStatus",
     *  description="Get a list of ShotStatus",
     *  input={
     *       "class" = "CoreBundle\Form\ShotStatus\ShotStatus",
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
        return $this->process($request, ShotStatusListType::class);
    }

    /**
     * @ApiDoc(
     *  resource=true,
     *  section="ShotStatus",
     *  description="Create new ShotStatus",
     *  input={
     *       "class" = "CoreBundle\Form\ShotStatus\ShotStatusCreateType",
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
        return $this->process($request, ShotStatusCreateType::class, Response::HTTP_CREATED);
    }

    /**
     * @ApiDoc(
     *  resource=true,
     *  section="ShotStatus",
     *  description="Get ShotStatus",
     *  input={
     *       "class" = "CoreBundle\Form\ShotStatus\ShotStatusReadType",
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
     * @param int $shotStatus
     *
     * @return Response
     */
    public function getAction(Request $request, int $shotStatus) : Response
    {
        return $this->process($request, ShotStatusReadType::class);
    }

    /**
     * @ApiDoc(
     *  resource=true,
     *  section="ShotStatus",
     *  description="Update all fields in ShotStatus",
     *  input={
     *       "class" = "CoreBundle\Form\ShotStatus\ShotStatusUpdateType",
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
     * @param int $shotStatus
     *
     * @return Response
     */
    public function putAction(Request $request, int $shotStatus) : Response
    {
        return $this->process($request, ShotStatusUpdateType::class);
    }

    /**
     * @ApiDoc(
     *  resource=true,
     *  section="ShotStatus",
     *  description="Update certain fields in ShotStatus",
     *  input={
     *       "class" = "CoreBundle\Form\ShotStatus\ShotStatusUpdateType",
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
     * @param int $shotStatus
     *
     * @return Response
     */
    public function patchAction(Request $request, int $shotStatus) : Response
    {
        return $this->process($request, ShotStatusUpdateType::class);
    }

    /**
     * @ApiDoc(
     *  resource=true,
     *  section="ShotStatus",
     *  description="Delete ShotStatus",
     *  input={
     *       "class" = "CoreBundle\Form\ShotStatus\ShotStatusDeleteType",
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
     * @param int $shotStatus
     *
     * @return Response
     */
    public function deleteAction(Request $request, int $shotStatus) : Response
    {
        return $this->process($request, ShotStatusDeleteType::class);
    }

    /**
     * {@inheritdoc}
     */
    protected function getProcessor() : ProcessorInterface
    {
        return $this->get('core.handler.shot_status');
    }
}
