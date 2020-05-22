<!-- Vista de la pantalla de la salida del sistema -->
<?php
//validacion de sesion iniciada si es falso manda a la pagina de login para ingresar
session_start();
    if (!$_SESSION["validar"]) {
        header("location: index.php");
        exit();
    }
session_destroy();
//Se destruye la sesion actual
?>
<div class="container">
    <div class="jumbotron">
        <h1>Haz Salido</h1>
    </div>
    <a href="index.php">Inicio</a>
</div>