<?php

require_once 'DatabaseRepository.php';
require_once 'Model/User.php';

class UserDAO
{
    private $insert = "INSERT INTO T_USUARIOS (ALIAS_USUARIO, PASSWORD_USUARIO, NOMBRE_USUARIO, APELLIDOS_USUARIO, EMAIL, TIPO_USUARIO) VALUES (?,?,?,?,?,?)";
    private $getUserWithId = "SELECT * FROM T_USUARIOS WHERE ID_USUARIO=?";
    private $getAll = "SELECT * FROM T_USUARIOS";
    private $getWithAlias = "SELECT * FROM T_USUARIOS WHERE ALIAS_USUARIO=?";
    private $getWithIdentifier = "SELECT * FROM T_USUARIOS WHERE CODIGO_COOKIE=?";
    private $changeIdentifier = "UPDATE T_USUARIOS SET CODIGO_COOKIE=? WHERE ID_USUARIO=?";
    private $getEmail= "SELECT EMAIL FROM T_USUARIOS WHERE EMAIL=?;";
    private $getAlias= "SELECT ALIAS_USUARIO FROM T_USUARIOS WHERE ALIAS_USUARIO=?";

    private $pdo;

    public function __construct()
    {
        $this->pdo = DatabaseRepository::getConnection();
    }

    public function insert($user)
    {

        $this->pdo->prepare($this->insert)->execute([
            $user->getAlias(),
            $user->getPassword(),
            $user->getName(),
            $user->getSurname(),
            $user->getEmail(),
            $user->getUserType()
        ]);
        return;
    }

    public function getAll()
    {
        $users = array();
        $select = $this->pdo->prepare($this->getAll);
        $select->execute();
        $rs = $select->fetchAll();
        foreach ($rs as $row){
            $user = new User(
                $row['ID_USUARIO'],
                $row['ALIAS_USUARIO'],
                $row['PASSWORD_USUARIO'],
                $row['NOMBRE_USUARIO'],
                $row['APELLIDOS_USUARIO'],
                $row['EMAIL'],
                $row['TIPO_USUARIO']
            );
            array_push($users, $user);
        }
        return $users;
    }

    public function getUser($id)
    {
        $select = $this->pdo->prepare($this->getUserWithId);
        $select->execute([$id]);
        $rs = $select->fetch();
        $user = new User(
            $id,
            $rs['ALIAS_USUARIO'],
            $rs['PASSWORD_USUARIO'],
            $rs['NOMBRE_USUARIO'],
            $rs['APELLIDOS_USUARIO'],
            $rs['EMAIL'],
            $rs['TIPO_USUARIO']
        );
        return $user;
    }

    public function getWithAlias($alias)
    {
        $select = $this->pdo->prepare($this->getWithAlias);
        $select->execute([$alias]);
        $rs = $select->fetch();
        return $rs;
    }

    public function getWithIdentifier($identifier)
    {
        $select = $this->pdo->prepare($this->getWithIdentifier);
        $select->execute([$identifier]);
        $rs = $select->fetch();
        return $rs;
    }

    public function changeUserIdentifier($id, $codCookie){
        $this->pdo->prepare($this->changeIdentifier)->execute([$codCookie, $id]);
    }

    public function checkUserEmail($email)
    {
        $select = $this->pdo->prepare($this->getEmail);
        $select->execute([$email]);
        $rs = $select->fetch();
        return $rs;
    }

    public function checkAlias($alias)
    {
        $select = $this->pdo->prepare($this->getAlias);
        $select->execute([$alias]);
        $rs = $select->fetch();
        return $rs;
    }
}