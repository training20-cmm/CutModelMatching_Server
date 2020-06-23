<?php

namespace App\Http\Controllers;

use App\Model;
use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;

class WebSocketController extends Controller implements MessageComponentInterface
{
    // private $connectionsIndexedByResourceId = [];
    private $connections = [];

    function onOpen(ConnectionInterface $conn)
    {
        info("********************************************");
        info("onOpen");
        // $this->connectionsIndexedByResourceId[$conn->resourceId] = $conn;
    }

    function onClose(ConnectionInterface $conn)
    {
        info("********************************************");
        info("onClose");
        $this->unsetConnection($conn);
    }

    function onError(ConnectionInterface $conn, \Exception $e)
    {
        info("********************************************");
        info("onError");
        $this->unsetConnection($conn);
    }

    function onMessage(ConnectionInterface $conn, $msg)
    {
        info("********************************************");
        info("onMessage");
        info($msg);
        $msgObject = json_decode($msg);
        if (isset($this->connections[$msgObject->myUserId])) {
            info("IS SET");
            if (!array_key_exists($msgObject->partnerUserId, $this->connections)) {
                info("KEY DOES NOT EXIST");
                return;
            }
            info("KEY EXISTS");
            // info(json_encode($this->connections));
            // info(json_encode($this->connections[$msgObject->partnerUserId]));
            // info(get_class($this->connections[$msgObject->partnerUserId]));
            // $receiverConn = $this->connections[$msgObject->partnerUserId]->conn;
            $receiverConn = $this->connections[$msgObject->partnerUserId]["conn"];
            $receiverConn->send($msgObject->text);
            info("SEND MESSAGE OK!!!!");
        } else {
            info("IS NOT SET");
            $this->connections[$msgObject->myUserId] =
                compact("conn") +
                ["partnerUserId" => $msgObject->partnerUserId];
        }
    }

    function unsetConnection(ConnectionInterface $conn)
    {
        info("********************************************");
        info("unsetConnection");
        // $disconnectedId = $conn->resourceId;
        // unset($this->connectionsIndexedByResourceId[$disconnectedId]);
        foreach ($this->connections as $myUserId => $connection) {
            if ($conn->resourceId !== $connection->conn->resourceId) {
                continue;
            }
            unset($this->connections[$myUserId]);
            break;
        }
        info("unsetConnection OK!!!!");
    }
}
