<?php

namespace ApiBundle\Controller;

use CoreBundle\Form\BattleField\BattleFieldReadType;
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
class BattleFieldController extends BaseController
{
    /**
     * @ApiDoc(
     *  resource=true,
     *  section="BattleField",
     *  description="Get BattleField",
     *  input={
     *       "class" = "CoreBundle\Form\BattleField\BattleFieldReadType",
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
     * @param int $battleField
     *
     * @return Response
     */
    public function getAction(Request $request, int $battleField) : Response
    {
        return $this->process($request, BattleFieldReadType::class);
    }

    /**
     * {@inheritdoc}
     */
    protected function getProcessor() : ProcessorInterface
    {
        return $this->get('core.handler.battle_field');
    }
}
