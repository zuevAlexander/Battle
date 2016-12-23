<?php

namespace ApiBundle\Controller;

use CoreBundle\Form\BattleField\BattleFieldListType;
use CoreBundle\Form\BattleField\BattleFieldCreateType;
use CoreBundle\Form\BattleField\BattleFieldReadType;
use CoreBundle\Form\BattleField\BattleFieldUpdateType;
use CoreBundle\Form\BattleField\BattleFieldDeleteType;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use NorseDigital\Symfony\RestBundle\Controller\BaseController;
use NorseDigital\Symfony\RestBundle\Handler\ProcessorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\Annotations\RouteResource;

/**
 * Class BattleFieldController
 *
 * @RouteResource("BattleField")
 */
class BattleFieldController
//class BattleFieldController extends BaseController
{
//    /**
//     * @ApiDoc(
//     *  resource=true,
//     *  section="BattleField",
//     *  description="Get a list of BattleField",
//     *  input={
//     *       "class" = "CoreBundle\Form\BattleField\BattleField",
//     *       "name" = ""
//     *  },
//     *  statusCodes={
//     *      200 = "Ok",
//     *      204 = "Positions not found",
//     *      400 = "Bad format",
//     *      403 = "Forbidden"
//     *  }
//     * )
//     *
//     * @param Request $request
//     *
//     * @return Response
//     */
//    public function cgetAction(Request $request) : Response
//    {
//        return $this->process($request, BattleFieldListType::class);
//    }
//
//    /**
//     * @ApiDoc(
//     *  resource=true,
//     *  section="BattleField",
//     *  description="Create new BattleField",
//     *  input={
//     *       "class" = "CoreBundle\Form\BattleField\BattleFieldCreateType",
//     *       "name" = ""
//     *  },
//     *  statusCodes={
//     *      200 = "Ok",
//     *      204 = "Positions not found",
//     *      400 = "Bad format",
//     *      403 = "Forbidden"
//     *  }
//     *)
//     *
//     * @param Request $request
//     *
//     * @return Response
//     */
//    public function postAction(Request $request) : Response
//    {
//        return $this->process($request, BattleFieldCreateType::class, Response::HTTP_CREATED);
//    }
//
//    /**
//     * @ApiDoc(
//     *  resource=true,
//     *  section="BattleField",
//     *  description="Get BattleField",
//     *  input={
//     *       "class" = "CoreBundle\Form\BattleField\BattleFieldReadType",
//     *       "name" = ""
//     *  },
//     *  statusCodes={
//     *      200 = "Ok",
//     *      204 = "Positions not found",
//     *      400 = "Bad format",
//     *      403 = "Forbidden"
//     *  }
//     *)
//     *
//     * @param Request $request
//     * @param int $battleField
//     *
//     * @return Response
//     */
//    public function getAction(Request $request, int $battleField) : Response
//    {
//        return $this->process($request, BattleFieldReadType::class);
//    }
//
//    /**
//     * @ApiDoc(
//     *  resource=true,
//     *  section="BattleField",
//     *  description="Update all fields in BattleField",
//     *  input={
//     *       "class" = "CoreBundle\Form\BattleField\BattleFieldUpdateType",
//     *       "name" = ""
//     *  },
//     *  statusCodes={
//     *      200 = "Ok",
//     *      204 = "Positions not found",
//     *      400 = "Bad format",
//     *      403 = "Forbidden"
//     *  }
//     *)
//     *
//     * @param Request $request
//     * @param int $battleField
//     *
//     * @return Response
//     */
//    public function putAction(Request $request, int $battleField) : Response
//    {
//        return $this->process($request, BattleFieldUpdateType::class);
//    }
//
//    /**
//     * @ApiDoc(
//     *  resource=true,
//     *  section="BattleField",
//     *  description="Update certain fields in BattleField",
//     *  input={
//     *       "class" = "CoreBundle\Form\BattleField\BattleFieldUpdateType",
//     *       "name" = ""
//     *  },
//     *  statusCodes={
//     *      200 = "Ok",
//     *      204 = "Positions not found",
//     *      400 = "Bad format",
//     *      403 = "Forbidden"
//     *  }
//     *)
//     *
//     * @param Request $request
//     * @param int $battleField
//     *
//     * @return Response
//     */
//    public function patchAction(Request $request, int $battleField) : Response
//    {
//        return $this->process($request, BattleFieldUpdateType::class);
//    }
//
//    /**
//     * @ApiDoc(
//     *  resource=true,
//     *  section="BattleField",
//     *  description="Delete BattleField",
//     *  input={
//     *       "class" = "CoreBundle\Form\BattleField\BattleFieldDeleteType",
//     *       "name" = ""
//     *  },
//     *  statusCodes={
//     *      200 = "Ok",
//     *      204 = "Positions not found",
//     *      400 = "Bad format",
//     *      403 = "Forbidden"
//     *  }
//     *)
//     *
//     * @param Request $request
//     * @param int $battleField
//     *
//     * @return Response
//     */
//    public function deleteAction(Request $request, int $battleField) : Response
//    {
//        return $this->process($request, BattleFieldDeleteType::class);
//    }
//
//    /**
//     * {@inheritdoc}
//     */
//    protected function getProcessor() : ProcessorInterface
//    {
//        return $this->get('core.handler.battle_field');
//    }
}
