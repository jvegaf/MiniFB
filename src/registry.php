<?php
$error = '';
if (isset($_REQUEST['error'])) {
    $error = $_REQUEST['error'];
}
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MiniFB - Registro</title>
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
    <script>
        $(document).ready(function(){
            document.getElementById("enviarBtn").disabled = true;
            $('#inputPassword, #inputConfirmPassword').on('keyup', function () {
                if ($('#inputPassword').val() == $('#inputConfirmPassword').val()) {
                    $('#message').html('Coinciden').css('color', 'green');
                    document.getElementById("enviarBtn").disabled = false;
                } else{
                    $('#message').html('No coinciden').css('color', 'red');
                    document.getElementById("enviarBtn").disabled = true;
                }
            });
        });
    </script>
</head>
<body>
<div class="container col-lg-4">
    <header class="main-bg">
        <div class="ml-5 d-flex align-items-center h-100">
            <div class="title main-text"><h1>MiniFB</h1></div>
        </div>
    </header>
    <div class="section main-text d-flex align-items-center">
        <span class="ml-3"><h3>Nuevo Usuario</h3></span>
    </div>
    <?= $error ?>
    <form class="mt-4" action="main_controller.php" method="get">
        <div class="form-row">
            <div class="form-group col-md-12">
                <input type="hidden" name="action" value="registry">
                <label for="inputAlias">Alias</label>
                <input type="text" class="form-control" id="inputAlias" name="alias" placeholder="Escribe tu Alias" required>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-12">
                <label for="inputPassword">Contraseña</label>
                <input type="password" class="form-control" name="password" id="inputPassword"
                       placeholder="Escribe tu contraseña" required>
                <input type="password" class="form-control mt-2" id="inputConfirmPassword"
                       placeholder="Vuelve a escribir tu contraseña" required>
                <span id="message"></span>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-12">
                <label for="inputName">Nombre</label>
                <input type="text" class="form-control" name="name" id="inputName" placeholder="Escribe tu nombre" required>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-12">
                <label for="inputSurname">Apellidos</label>
                <input type="text" class="form-control" name="surname" id="inputSurname" placeholder="Escribe tus apellidos">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-12">
                <label for="inputEmail">Correo Electronico</label>
                <input type="email" class="form-control" name="email" id="inputEmail"
                       placeholder="Escribe tu correo electronico" required>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-12 d-flex justify-content-around">
                <button type="submit" id="enviarBtn" class="btn btn-primary">Registrar</button>
                <a href="index.php" class="btn btn-primary">Cancelar</a>
            </div>
        </div>
    </form>
</div>
</body>
</html>

