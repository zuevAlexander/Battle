<?php

namespace ApiBundle\Controller;

use CoreBundle\Form\User\UserLoginType;
use CoreBundle\Form\User\UserRegisterType;
use NorseDigital\Symfony\RestBundle\Controller\BaseController;
use NorseDigital\Symfony\RestBundle\Handler\ProcessorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\Annotations;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use FOS\RestBundle\Controller\Annotations\RouteResource;

/**
 * Class UserController.
 *
 * @RouteResource("User")
 */
class UserController extends BaseController
{
    /**
     * @ApiDoc(
     *  resource=true,
     *  section="Login",
     *  description="Login user",
     *  input={
     *       "class" = "CoreBundle\Form\User\UserLoginType",
     *       "name" = ""
     *  },
     *  statusCodes={
     *      200 = "Ok",
     *      400 = "Bad format",
     *      403 = "Access denied"
     *  }
     *)
     * @Annotations\Post("/login")
     *
     * @param Request $request
     *
     * @return Response
     *
     * @throws \Exception
     */
    public function postLoginAction(Request $request) : Response
    {
        return $this->process($request, UserLoginType::class);
    }

    /**
     * @ApiDoc(
     *  resource=true,
     *  section="Registration",
     *  description="Register user",
     *  input={
     *       "class" = "CoreBundle\Form\User\UserRegisterType",
     *       "name" = ""
     *  },
     *  statusCodes={
     *      200 = "Ok",
     *      400 = "Bad format"
     *  }
     *)
     * @Annotations\Post("/register")
     *
     * @param Request $request
     *
     * @return Response
     *
     * @throws \Exception
     */
    public function postRegisterAction(Request $request) : Response
    {
        return $this->process($request, UserRegisterType::class, Response::HTTP_CREATED);
    }

    /**
     * @return ProcessorInterface
     */
    protected function getProcessor() : ProcessorInterface
    {
        return $this->get('core.handler.user');
    }
}
