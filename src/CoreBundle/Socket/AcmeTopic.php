<?php

namespace CoreBundle\Socket;

use CoreBundle\Service\Battle\BattleService;
use Gos\Bundle\WebSocketBundle\Topic\TopicInterface;
use Gos\Bundle\WebSocketBundle\Topic\ConnectionPeriodicTimer;
use Ratchet\ConnectionInterface;
use Ratchet\Wamp\Topic;
use Gos\Bundle\WebSocketBundle\Router\WampRequest;


class AcmeTopic implements TopicInterface
{
    /**
     * @var BattleService
     */
    private $battleService;

    /**
     * AcmeTopic constructor.
     * @param BattleService $battleService
     */
    public function __construct(BattleService $battleService)
    {
        $this->battleService = $battleService;
    }


    /**
     * This will receive any Subscription requests for this topic.
     *
     * @param ConnectionInterface $connection
     * @param Topic $topic
     * @param WampRequest $request
     * @return void
     */
    public function onSubscribe(ConnectionInterface $connection, Topic $topic, WampRequest $request)
    {
        //this will broadcast the message to ALL subscribers of this topic.
        $topic->broadcast(['msg' => $connection->resourceId . " has joined " . $topic->getId()]);
    }

    /**
     * This will receive any UnSubscription requests for this topic.
     *
     * @param ConnectionInterface $connection
     * @param Topic $topic
     * @param WampRequest $request
     * @return void
     */
    public function onUnSubscribe(ConnectionInterface $connection, Topic $topic, WampRequest $request)
    {
        //this will broadcast the message to ALL subscribers of this topic.
        $topic->broadcast(['msg' => $connection->resourceId . " has leave " . $topic->getId()]);
    }


    /**
     * This will receive any Publish requests for this topic.
     *
     * @param ConnectionInterface $connection
     * @param Topic $topic
     * @param WampRequest $request
     * @param $event
     * @param array $exclude
     * @param array $eligible
     */
    public function onPublish(ConnectionInterface $connection, Topic $topic, WampRequest $request, $event, array $exclude, array $eligible)
    {
        //$topic->getId() will contain the FULL requested uri, so you can proceed based on that

        preg_match("/[0-9]+/", $topic->getId(),$matches);
        $battle = $this->battleService->getEntityBy(['id' => $matches[0]]);
        $battleStatusName = $battle->getBattleStatus()->getStatusName();

        if (preg_match('/battle\/ship/i', $topic->getId())) {
            $topic->broadcast([
                'battleStatus' => $battleStatusName,
            ]);
        } elseif (preg_match('/battle\/shot/i', $topic->getId())) {
            $topic->broadcast([
                'newShot' => $event,
                'battleStatus' => $battleStatusName,
            ]);
        }
    }

    /**
     * Like RPC is will use to prefix the channel
     * @return string
     */
    public function getName()
    {
        return 'acme.topic';
    }
}