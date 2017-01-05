<?php

namespace ApiBundle\Controller;

use CoreBundle\Entity\User;
use CoreBundle\Form\User\UserLoginType;
use CoreBundle\Form\User\UserRegisterType;
use FOS\RestBundle\Controller\FOSRestController;
use NorseDigital\Symfony\RestBundle\Controller\BaseController;
use NorseDigital\Symfony\RestBundle\Handler\ProcessorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\Annotations;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use FOS\RestBundle\Controller\Annotations\RouteResource;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * Class UserController.
 *
 * @RouteResource("User")
 */
//class UserController extends BaseController
class UserController extends FOSRestController
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
        $user = $this->getUser();
        if ($user instanceof UserInterface) {
            return $this->get('security.token_storage')->getToken()->getUser();
        }

        /** @var AuthenticationException $exception */
        $exception = $this->get('security.authentication_utils')
            ->getLastAuthenticationError();

        $view = $this->view($exception->getMessage(), 403);
        return $this->handleView($view);

//        return $this->process($request, UserLoginType::class);
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
        $user = new User();
        $form =  $this->createForm('CoreBundle\Form\User\UserRegisterType', $user);
        $form->submit($request->request->all());

        if (!$form->get('password')->isValid()) {
            $view = $this->view($form->get('password')->getErrors('first')->getChildren()->getMessage(), 403);
            return $this->handleView($view);
        }

        try {
            $this->get('core.handler.user')->createUser($user);
        }
        catch(\Exception $e) {
            $view = $this->view($e->getMessage(), 403);
            return $this->handleView($view);
        }

        $view = $this->view($user, 200);

        return $this->handleView($view);

//        return $this->process($request, UserRegisterType::class, Response::HTTP_CREATED);
    }

    /**
     * @return ProcessorInterface
     */
    protected function getProcessor() : ProcessorInterface
    {
        return $this->get('core.handler.user');
    }
}
