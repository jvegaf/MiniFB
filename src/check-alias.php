<?php
require_once 'Controller/UserController.php';

if (isset($_REQUEST['alias'])){
    $alias = $_REQUEST['alias'];
    $userC = new UserController();
    $result = $userC->checkAlias($alias);
    $response = resolvBuilder($result);
    echo $response;
    die();
}

function resolvBuilder($res){
    if ($res == false){
        return "<span style='color: green;'>Disponible</span>";
    }else{
        return "<span style='color: red;'>No disponible</span>";
    }
}
