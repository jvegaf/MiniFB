<?php
require_once 'Model/User.php';
require_once 'Model/UserType.php';
require_once 'Database/UserDAO.php';


class UserController
{

    private $userDAO;

    public function __construct()
    {
        $this->userDAO = new UserDAO();
    }


    public function checkUser($credentials)
    {
        $result = $this->userDAO->getWithAlias($credentials['alias']);
        if (!empty($result)){
            $id = $result['ID_USUARIO'];
            $user = $this->userDAO->getUser($id);
            if ($credentials['password'] == $user->getPassword()){
                return $id;
            }
        }
        return -1;
    }

    public function checkIdentifier($identifier)
    {
        $result = $this->userDAO->getWithIdentifier($identifier);
        if (!empty($result)){
            $id = $result['ID_USUARIO'];
            return $id;
        }
        return -1;
    }

    public function getUser($id)
    {
        $user = $this->userDAO->getUser($id);
        return $user;
    }

    public function createIdentifier($id)
    {
        $valor = date("YmdHi") . $id;
        $codCookie = hash('sha1', $valor);
        $this->userDAO->changeUserIdentifier($id, $codCookie);
        return $codCookie;
    }

    public function getAll()
    {
        return $this->userDAO->getAll();
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
        $this->userDAO->insert($user);
        return;
    }

    public function checkEmail($email)
    {
        $response = $this->userDAO->checkUserEmail($email);
        if ($response == null){
            return false;
        }
        return true;
    }

    public function checkAlias($alias)
    {
        $response = $this->userDAO->checkAlias($alias);
        if ($response == null){
            return false;
        }
        return true;
    }


}