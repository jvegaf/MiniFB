<?php
require_once 'Model/User.php';
require_once 'Model/UserType.php';
require_once 'Database/UserDAO.php';


class UserController
{
    public function checkUser($credentials)
    {
        $udao = new UserDAO();
        $result = $udao->getWithAlias($credentials['alias']);
        if (!empty($result)){
            $id = $result['ID_USUARIO'];
            $user = $udao->getUser($id);
            if ($credentials['password'] == $user->getPassword()){
                return $id;
            }
        }
        return -1;
    }

    public function checkIdentifier($identifier)
    {
        $udao = new UserDAO();
        $result = $udao->getWithIdentifier($identifier);
        if (!empty($result)){
            $id = $result['ID_USUARIO'];
            return $id;
        }
        return -1;
    }

    public function getUser($id)
    {
        $udao = new UserDAO();
        $user = $udao->getUser($id);
        return $user;
    }

    public function createIdentifier($id)
    {
        $valor = date("YmdHi") . $id;
        $udao = new UserDAO();
        $codCookie = hash('sha1', $valor);
        $udao->changeUserIdentifier($id, $codCookie);
        return $codCookie;
    }

    public function getAll()
    {
        $udao = new UserDAO();
        return $udao->getAll();
    }

    public function registraNuevoUsuario(array $prop)
    {
        $user = new User(
            null,
            $prop['alias'],
            $prop['password'],
            $prop['name'],
            $prop['surname'],
            $prop['email'],
            UserType::USER
        );
        $udao = new UserDAO();
        $udao->insert($user);
        return;
    }












}