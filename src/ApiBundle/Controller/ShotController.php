<?php

namespace ApiBundle\Controller;

use CoreBundle\Form\Shot\ShotListType;
use CoreBundle\Form\Shot\ShotCreateType;
use CoreBundle\Form\Shot\ShotReadType;
use CoreBundle\Form\Shot\ShotUpdateType;
use CoreBundle\Form\Shot\ShotDeleteType;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use NorseDigital\Symfony\RestBundle\Controller\BaseController;
use NorseDigital\Symfony\RestBundle\Handler\ProcessorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\Annotations\RouteResource;

/**
 * Class ShotController
 *
 * @RouteResource("Shot")
 */
class ShotController extends BaseController
{
    /**
     * @ApiDoc(
     *  resource=true,
     *  section="Shot",
     *  description="Get a list of Shot",
     *  input={
     *       "class" = "CoreBundle\Form\Shot\Shot",
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
        return $this->process($request, ShotListType::class);
    }

    /**
     * @ApiDoc(
     *  resource=true,
     *  section="Shot",
     *  description="Create new Shot",
     *  input={
     *       "class" = "CoreBundle\Form\Shot\ShotCreateType",
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
        return $this->process($request, ShotCreateType::class, Response::HTTP_CREATED);
    }

    /**
     * @ApiDoc(
     *  resource=true,
     *  section="Shot",
     *  description="Get Shot",
     *  input={
     *       "class" = "CoreBundle\Form\Shot\ShotReadType",
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
     * @param int $shot
     *
     * @return Response
     */
    public function getAction(Request $request, int $shot) : Response
    {
        return $this->process($request, ShotReadType::class);
    }

    /**
     * @ApiDoc(
     *  resource=true,
     *  section="Shot",
     *  description="Update all fields in Shot",
     *  input={
     *       "class" = "CoreBundle\Form\Shot\ShotUpdateType",
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
     * @param int $shot
     *
     * @return Response
     */
    public function putAction(Request $request, int $shot) : Response
    {
        return $this->process($request, ShotUpdateType::class);
    }

    /**
     * @ApiDoc(
     *  resource=true,
     *  section="Shot",
     *  description="Update certain fields in Shot",
     *  input={
     *       "class" = "CoreBundle\Form\Shot\ShotUpdateType",
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
     * @param int $shot
     *
     * @return Response
     */
    public function patchAction(Request $request, int $shot) : Response
    {
        return $this->process($request, ShotUpdateType::class);
    }

    /**
     * @ApiDoc(
     *  resource=true,
     *  section="Shot",
     *  description="Delete Shot",
     *  input={
     *       "class" = "CoreBundle\Form\Shot\ShotDeleteType",
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
     * @param int $shot
     *
     * @return Response
     */
    public function deleteAction(Request $request, int $shot) : Response
    {
        return $this->process($request, ShotDeleteType::class);
    }

    /**
     * {@inheritdoc}
     */
    protected function getProcessor() : ProcessorInterface
    {
        return $this->get('core.handler.shot');
    }
}
