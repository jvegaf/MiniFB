<?php

require_once 'Controller/UserController.php';
require_once 'Controller/MessageController.php';

session_start();
$userController = new UserController();
$users = $userController->getAll();
$me = $userController->getUser($_SESSION['user-id']);
$messController = new MessageController();
$msg = $messController->getMessageWithId($_REQUEST['msg-id']);

?>

<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MiniFB - Muro</title>
    <link rel="stylesheet" href="css/style.css">
    <!--Bootstrap-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
            crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
            crossorigin="anonymous"></script>
    <!--Bootstrap End-->
</head>
<body>

<div class="container col-xl-5 col-lg-6 col-md-8 col-sm-12">
    <header class="main-bg">
        <div class="ml-5 d-flex align-items-center h-100">
            <span class="title main-text"><h1>MiniFB</h1></span>
        </div>
    </header>
    <div class=" d-flex section justify-content-between align-items-center">
        <div class="ml-3">
            <span class="main-text"><h3>Respuesta</h3></span>
        </div>
        <div class="sesion mr-3">
            <span class="text-primary mr-2"><?= $me->getName() ?></span>
            <a class="darkblue-txt" href="logout.php">Cerrar Sesion</a>
        </div>
    </div>
    <div class="mensaje">
        <div class="card mt-2">
            <div class="card-header text-white">
                <h5><?= $users[($msg->getUser()) - 1]->getName() ?></h5>
            </div>
            <div class="card-body">
                <?php
                if ($msg->getImportant()) {
                    ?>
                    <p class="card-text font-weight-bold"><?= $msg->getContent() ?></p>
                <?php } else { ?>
                    <p class="card-text"><?= $msg->getContent() ?></p>
                <?php } ?>
            </div>
        </div>
    </div>
    <div class="responseform">
        <div class="card mt-2">
            <div class="card-header text-white">
                <span>Respuesta</span>
            </div>
            <div class="card-body">
                <form action="main_controller.php">
                    <div class="form-group">
                        <input type="hidden" name="action" value="publish-rsp">
                        <input type="hidden" name="msg-id" value="<?=$msg->getId()?>">
                        <textarea class="form-control" name="content" id="contentTA"
                                  placeholder="¿ Que estas pensando <?= $me->getName() ?> ?" rows="3"></textarea>
                        <div class="form-group row ml-3">
                            <button type="submit" class="btn btn-primary mt-2">Publicar Respuesta</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>