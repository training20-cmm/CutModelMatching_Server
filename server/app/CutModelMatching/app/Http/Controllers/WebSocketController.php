<?php

namespace App\Http\Controllers;

use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;

class WebSocketController extends Controller implements MessageComponentInterface
{
    private $connectionsIndexedByResourceId = [];
    private $connectionsIndexedByUserId = [];

    function onOpen(ConnectionInterface $conn)
    {
        $this->connectionsIndexedByResourceId[$conn->resourceId] = $conn;
    }

    function onClose(ConnectionInterface $conn)
    {
        info("onClose");
        $disconnectedId = $conn->resourceId;
        unset($this->connections[$disconnectedId]);
    }

    function onError(ConnectionInterface $conn, \Exception $e)
    {
        unset($this->connections[$conn->resourceId]);
        $conn->close();
    }

    function onMessage(ConnectionInterface $conn, $msg)
    {
        // $msgObject = json_decode($msg);
        // if (isset($this->connectionsIndexedByUserId[$msgObject->userId])) {
        //     $receiverConn = $this->connectionsIndexedByUserId[$msgObject->to];
        //     $receiverConn->send($msgObject->text);
        // } else {
        //     $this->connectionsIndexedByUserId[$msgObject->userId] = $conn;
        //     // foreach ($this->connections as $connection) {
        //     //     if ($connection->resourceId === $conn->resourceId) {
        //     //         continue;
        //     //     }
        //     //     $connection->send($msg);
        //     // }
        // }
    }
}
