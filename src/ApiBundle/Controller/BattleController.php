<?php

namespace ApiBundle\Controller;

use CoreBundle\Form\Battle\BattleListType;
use CoreBundle\Form\Battle\BattleCreateType;
use CoreBundle\Form\Battle\BattleReadType;
use CoreBundle\Form\Battle\BattleUpdateType;
use CoreBundle\Form\Battle\BattleDeleteType;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use NorseDigital\Symfony\RestBundle\Controller\BaseController;
use NorseDigital\Symfony\RestBundle\Handler\ProcessorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\Annotations\RouteResource;

/**
 * Class BattleController
 *
 * @RouteResource("Battle")
 */
class BattleController extends BaseController
{
    /**
     * @ApiDoc(
     *  resource=true,
     *  section="Battle",
     *  description="Get a list of Battle",
     *  input={
     *       "class" = "CoreBundle\Form\Battle\Battle",
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
        return $this->process($request, BattleListType::class);
    }

    /**
     * @ApiDoc(
     *  resource=true,
     *  section="Battle",
     *  description="Create new Battle",
     *  input={
     *       "class" = "CoreBundle\Form\Battle\BattleCreateType",
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
        return $this->process($request, BattleCreateType::class, Response::HTTP_CREATED);
    }

    /**
     * @ApiDoc(
     *  resource=true,
     *  section="Battle",
     *  description="Get Battle",
     *  input={
     *       "class" = "CoreBundle\Form\Battle\BattleReadType",
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
     * @param int $battle
     *
     * @return Response
     */
    public function getAction(Request $request, int $battle) : Response
    {
        return $this->process($request, BattleReadType::class);
    }

    /**
     * @ApiDoc(
     *  resource=true,
     *  section="Battle",
     *  description="Update all fields in Battle",
     *  input={
     *       "class" = "CoreBundle\Form\Battle\BattleUpdateType",
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
     * @param int $battle
     *
     * @return Response
     */
    public function putAction(Request $request, int $battle) : Response
    {
        return $this->process($request, BattleUpdateType::class);
    }

    /**
     * @ApiDoc(
     *  resource=true,
     *  section="Battle",
     *  description="Update certain fields in Battle",
     *  input={
     *       "class" = "CoreBundle\Form\Battle\BattleUpdateType",
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
     * @param int $battle
     *
     * @return Response
     */
    public function patchAction(Request $request, int $battle) : Response
    {
        return $this->process($request, BattleUpdateType::class);
    }

    /**
     * @ApiDoc(
     *  resource=true,
     *  section="Battle",
     *  description="Delete Battle",
     *  input={
     *       "class" = "CoreBundle\Form\Battle\BattleDeleteType",
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
     * @param int $battle
     *
     * @return Response
     */
    public function deleteAction(Request $request, int $battle) : Response
    {
        return $this->process($request, BattleDeleteType::class);
    }

    /**
     * {@inheritdoc}
     */
    protected function getProcessor() : ProcessorInterface
    {
        return $this->get('core.handler.battle');
    }
}
