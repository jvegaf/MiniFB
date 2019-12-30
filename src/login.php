<?php
    $error = '';
    if (isset($_REQUEST['error'])){
        $error = "Error Usuario / Contraseña";
    }
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MiniFB Login</title>
    <link rel="stylesheet" href="css/style.css">
    <!--Bootstrap-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!--Bootstrap End-->
</head>
<body>
<div class="container col-lg-3">
    <header class="main-bg">
        <div class="ml-5 d-flex align-items-center h-100">
            <div class="title main-text"><h1>MiniFB</h1></div>
        </div>
    </header>

    <div class="section main-text d-flex align-items-center">
        <span class="ml-3"><h3>Iniciar sesión</h3></span>
    </div>
    <div id="error"><?=$error?></div>
    <form action="main_controller.php?" class="mt-3" method="GET">
        <input type="hidden" name="action" value="login">
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="input-alias">Alias</span>
            </div>
            <input type="text" class="form-control"
                   name="alias" aria-label="Alias" aria-describedby="input-alias" required>
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="input-pass">Contraseña</span>
            </div>
            <input type="password" class="form-control"
                   name="password" aria-label="Password" aria-describedby="input-pass" required>
        </div>
        <div class="form-check ml-3">
            <input type="checkbox" class="form-check-input" id="remember" name="remember">
            <label for="remember">Recordarme</label>
        </div>
        <div class="row d-flex justify-content-around align-items-center">
            <input type="submit" value="Entrar" class="btn btn-primary w-25 mt-2 ml-5">
            <div id="registro"><a href="registry.php">Registrarse</a></div>
        </div>
    </form>
</div>
</body>
</html>
