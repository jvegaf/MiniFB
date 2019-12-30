<?php

session_start();

if (isset($_SESSION['sesion-started'])){
    header('Location: main.php');
    exit();
}

if (isset($_COOKIE['identifier'])){
    header("Location: main_controller.php?action=check-ident&identifier=" . $_COOKIE['identifier']);
    exit();
}

header('Location: login.php');


