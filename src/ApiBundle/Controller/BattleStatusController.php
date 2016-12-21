<?php

namespace ApiBundle\Controller;

use CoreBundle\Form\BattleStatus\BattleStatusListType;
use CoreBundle\Form\BattleStatus\BattleStatusCreateType;
use CoreBundle\Form\BattleStatus\BattleStatusReadType;
use CoreBundle\Form\BattleStatus\BattleStatusUpdateType;
use CoreBundle\Form\BattleStatus\BattleStatusDeleteType;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use NorseDigital\Symfony\RestBundle\Controller\BaseController;
use NorseDigital\Symfony\RestBundle\Handler\ProcessorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\Annotations\RouteResource;

/**
 * Class BattleStatusController
 *
 * @RouteResource("BattleStatus")
 */
class BattleStatusController extends BaseController
{
    /**
     * @ApiDoc(
     *  resource=true,
     *  section="BattleStatus",
     *  description="Get a list of BattleStatus",
     *  input={
     *       "class" = "CoreBundle\Form\BattleStatus\BattleStatus",
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
        return $this->process($request, BattleStatusListType::class);
    }

    /**
     * @ApiDoc(
     *  resource=true,
     *  section="BattleStatus",
     *  description="Create new BattleStatus",
     *  input={
     *       "class" = "CoreBundle\Form\BattleStatus\BattleStatusCreateType",
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
        return $this->process($request, BattleStatusCreateType::class, Response::HTTP_CREATED);
    }

    /**
     * @ApiDoc(
     *  resource=true,
     *  section="BattleStatus",
     *  description="Get BattleStatus",
     *  input={
     *       "class" = "CoreBundle\Form\BattleStatus\BattleStatusReadType",
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
     * @param int $battleStatus
     *
     * @return Response
     */
    public function getAction(Request $request, int $battleStatus) : Response
    {
        return $this->process($request, BattleStatusReadType::class);
    }

    /**
     * @ApiDoc(
     *  resource=true,
     *  section="BattleStatus",
     *  description="Update all fields in BattleStatus",
     *  input={
     *       "class" = "CoreBundle\Form\BattleStatus\BattleStatusUpdateType",
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
     * @param int $battleStatus
     *
     * @return Response
     */
    public function putAction(Request $request, int $battleStatus) : Response
    {
        return $this->process($request, BattleStatusUpdateType::class);
    }

    /**
     * @ApiDoc(
     *  resource=true,
     *  section="BattleStatus",
     *  description="Update certain fields in BattleStatus",
     *  input={
     *       "class" = "CoreBundle\Form\BattleStatus\BattleStatusUpdateType",
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
     * @param int $battleStatus
     *
     * @return Response
     */
    public function patchAction(Request $request, int $battleStatus) : Response
    {
        return $this->process($request, BattleStatusUpdateType::class);
    }

    /**
     * @ApiDoc(
     *  resource=true,
     *  section="BattleStatus",
     *  description="Delete BattleStatus",
     *  input={
     *       "class" = "CoreBundle\Form\BattleStatus\BattleStatusDeleteType",
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
     * @param int $battleStatus
     *
     * @return Response
     */
    public function deleteAction(Request $request, int $battleStatus) : Response
    {
        return $this->process($request, BattleStatusDeleteType::class);
    }

    /**
     * {@inheritdoc}
     */
    protected function getProcessor() : ProcessorInterface
    {
        return $this->get('core.handler.battle_status');
    }
}
