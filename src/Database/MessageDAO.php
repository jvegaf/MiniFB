<?php

require_once 'DatabaseRepository.php';
require_once 'Model/Message.php';


class MessageDAO
{

    private $insert = "INSERT INTO T_MENSAJES (TEXTO_MENSAJE, DESTACADO, PINEADO, PUBLICADO, ID_USUARIO) VALUES (?,?,?,?,?)";
    private $getOneWithId = "SELECT * FROM T_MENSAJES WHERE ID_MENSAJE=?";
    private $allWithoutPin = "SELECT * FROM T_MENSAJES WHERE PINEADO=0 ORDER BY ID_MENSAJE DESC ";
    private $allWithPin = "SELECT * FROM T_MENSAJES WHERE PINEADO=1 ORDER BY ID_MENSAJE DESC";
    private $pdo;


    public function __construct()
    {
        $this->pdo = DatabaseRepository::getConnection();
    }

    public function insert($msg)
    {
        $this->pdo->prepare($this->insert)->execute([
            $msg->getContent(),
            $msg->getImportant(),
            $msg->getPinned(),
            $msg->getPublished(),
            $msg->getUser()
        ]);
    }

    public function getAllWithoutPin()
    {
        $messages = array();
        $select = $this->pdo->prepare($this->allWithoutPin);
        $select->execute();
        $rs = $select->fetchAll();
        foreach ($rs as $row){
            $msg = new Message(
                $row['ID_MENSAJE'],
                $row['TEXTO_MENSAJE'],
                $row['DESTACADO'],
                $row['PINEADO'],
                $row['PUBLICADO'],
                $row['ID_USUARIO']
            );
            array_push($messages, $msg);
        }
        return $messages;
    }

    public function get_all_with_pin()
    {
        $messages = array();
        $select = $this->pdo->prepare($this->allWithPin);
        $select->execute();
        $rs = $select->fetchAll();
        foreach ($rs as $row){
            $msg = new Message(
                $row['ID_MENSAJE'],
                $row['TEXTO_MENSAJE'],
                $row['DESTACADO'],
                $row['PINEADO'],
                $row['PUBLICADO'],
                $row['ID_USUARIO']
            );
            array_push($messages, $msg);
        }
        return $messages;
    }

    public function getWithId($id)
    {
        $select = $this->pdo->prepare($this->getOneWithId);
        $select->execute([$id]);
        $rs = $select->fetch();
        $msg = new Message(
            $rs['ID_MENSAJE'],
            $rs['TEXTO_MENSAJE'],
            $rs['DESTACADO'],
            $rs['PINEADO'],
            $rs['PUBLICADO'],
            $rs['ID_USUARIO']
        );
        return $msg;
    }
}