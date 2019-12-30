<?php

require_once 'Database/MessageDAO.php';
require_once 'Database/ResponseDAO.php';
require_once 'Model/Message.php';
require_once 'Model/Response.php';

class MessageController
{

    public function getAllMessagesWithoutPin()
    {

        $mDAO = new MessageDAO();
        $rDAO = new ResponseDAO();
        $messagesSet = array();
        $msgWithoutPin = $mDAO->getAllWithoutPin();
        foreach ($msgWithoutPin as $msg){
            $responses = $rDAO->getAllWithMessageId($msg->getId());
            $msgEntire = [
                'message' => $msg,
                'responses' => $responses
            ];
            array_push($messagesSet, $msgEntire);
        }
        return $messagesSet;
    }

    public function getAllMessagesWithPin(){
        $mDAO = new MessageDAO();
        return $mDAO->get_all_with_pin();
    }

    // agregar mensaje
    public function publishMessage(array $propertys)
    {
        $now = date("Y-m-d H:i:s");
        $mDao = new MessageDAO();
        $important = $propertys['important'] == null ? 0 : 1;
        $pinned = $propertys['pinned'] == null ? 0 : 1;
        $msg = new Message(
            null,
            $propertys['content'],
            $important,
            $pinned,
            $now,
            $propertys['userId']
        );
        $mDao->insert($msg);
        return;
    }

    public function getMessageWithId($id)
    {
        $mDAO = new MessageDAO();
        return $mDAO->getWithId($id);
    }

    public function publishResponse(array $propertys)
    {
        $now = date("Y-m-d H:i:s");
        $rDao = new ResponseDAO();
        $msg = new Response(
            null,
            $propertys['content'],
            $now,
            $propertys['userId'],
            $propertys['msg-id']
        );
        $rDao->insert($msg);
        return;
    }
}