<?php


require_once 'DatabaseRepository.php';
require_once 'Model/Response.php';

class ResponseDAO
{

    private $insert = "INSERT INTO T_RESPUESTAS (TEXTO_RESPUESTA, PUBLICADO, ID_USUARIO, ID_MENSAJE) VALUES (?,?,?,?)";
    private $getAllWithId = "SELECT * FROM T_RESPUESTAS WHERE ID_MENSAJE=?";
    private $pdo;

    public function __construct()
    {
        $this->pdo = DatabaseRepository::getConnection();
    }

    public function insert($response)
    {

        $this->pdo->prepare($this->insert)->execute([
            $response->getContent(),
            $response->getPublished(),
            $response->getUser(),
            $response->getMessageId()
        ]);
        return;
    }

    public function getAllWithMessageId($msgId)
    {
        $responses = array();
        $select = $this->pdo->prepare($this->getAllWithId);
        $select->execute([$msgId]);
        $rs = $select->fetchAll();
        foreach ($rs as $row){
            $response = new Response(
                $row['ID_RESPUESTA'],
                $row['TEXTO_RESPUESTA'],
                $row['PUBLICADO'],
                $row['ID_USUARIO'],
                $msgId
            );
            array_push($responses, $response);
        }
        return $responses;
    }
}