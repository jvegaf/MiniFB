<?php

require_once 'Controller/UserController.php';

if (isset($_REQUEST['email'])){
    $email = $_REQUEST['email'];
    $userC = new UserController();
    $result = $userC->checkEmail($email);
    echo $result;
    die();
}