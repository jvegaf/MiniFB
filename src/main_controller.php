<?php

require_once 'Controller/UserController.php';
require_once 'Controller/MessageController.php';
session_start();


switch ($_REQUEST['action']){
    case 'login':
        login();
        break;
    case 'check-ident':
        identCheck();
        break;
    case 'registry':
        registry();
        break;
    case 'publish-msg':
        publishMSG();
        break;
    case 'publish-rsp':
        publishRSP();
        break;
}

function login()
{
    $credentials = [
        'alias' => $_REQUEST['alias'],
        'password' => $_REQUEST['password']
    ];
    $userC = new UserController();
    $id = $userC->checkUser($credentials);
    if ( $id == -1){ // login wrong
        header('Location: login.php?error=true');
        exit();
    }else{ //login success
        $_SESSION['sesion-started'] = true;
        $_SESSION['user-id'] = $id;
        if (isset($_REQUEST['remember'])){
            $codCookie = $userC->createIdentifier($id);
            setcookie('identifier', $codCookie, strtotime( '+30 days' ));
        }
        header('Location: main.php');
        exit();
    }
}

function identCheck()
{
    $userC = new UserController();
    $id = $userC->checkIdentifier($_REQUEST['identifier']);
    if ( $id == -1){ // login wrong
        header('Location: login.php');
        exit();
    }else{ //login success
        $_SESSION['sesion-started'] = true;
        $_SESSION['user-id'] = $id;
        $codCookie = $userC->createIdentifier($id);
        setcookie('identifier', $codCookie, strtotime( '+30 days' ));
        header('Location: main.php');
        exit();
    }
}

function registry()
{
    $email =  str_replace("%40", "@", $_REQUEST['email']);
    $propertys = [
        'alias' => $_REQUEST['alias'],
        'password' => $_REQUEST['password'],
        'name' => $_REQUEST['name'],
        'surname' => $_REQUEST['surname'],
        'email' => $email
    ];
    $userC = new UserController();
    $userC->registraNuevoUsuario($propertys);
    header("Location: main_controller.php?action=login&alias=" .
        $propertys['alias'] .
        "&password=" . $propertys['password']);
    exit();
}

function publishMSG()
{
    $propertys = [
        'userId' => $_SESSION['user-id'],
        'content' => $_REQUEST['content'],
        'important' => $_REQUEST['important'],
        'pinned' => $_REQUEST['pinned']
    ];
    $mesCtl = new MessageController();
    $mesCtl->publishMessage($propertys);
    header("Location: main.php");
    exit();
}

function publishRSP()
{
    $propertys = [
        'userId' => $_SESSION['user-id'],
        'content' => $_REQUEST['content'],
        'msg-id' => $_REQUEST['msg-id']
    ];
    $mesCtl = new MessageController();
    $mesCtl->publishResponse($propertys);
    header("Location: main.php");
    exit();
}









