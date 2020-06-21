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
        $this->connections[$conn->resourceId] = compact("conn") + ["userId" => null];
    }

    function onClose(ConnectionInterface $conn)
    {
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
        if (is_null($this->connectionsIndexedByResourceId[$conn->resourceId]->userId)) {
            // $msg = json_decode($msg, true);
            // $this->connectionsIndexedByUserId[$msg]
        } else {
            foreach ($this->connections as $connection) {
                if ($connection->resourceId === $conn->resourceId) {
                    continue;
                }
                $connection->send($msg);
            }
        }
    }
}
