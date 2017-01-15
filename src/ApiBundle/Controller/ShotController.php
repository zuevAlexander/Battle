<?php

namespace ApiBundle\Controller;

use CoreBundle\Form\Shot\ShotCreateType;
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
     * {@inheritdoc}
     */
    protected function getProcessor() : ProcessorInterface
    {
        return $this->get('core.handler.shot');
    }
}
