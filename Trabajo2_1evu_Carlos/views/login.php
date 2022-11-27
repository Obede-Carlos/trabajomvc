<?php

/**
 * login: el usuario se logea y se valida, para mayor seguridad
 * se usuara sesiones.
 * 
 * formulario en html, reenviar a si mismo y se coomprueba con php, de ahi se redirige a home.
 */

if (isset($_POST["envio"])) {
    //condicion para validar que no este vacio el campo y que este establecido.
    if (!empty($_POST["usuario"]) && !empty($_GET["passwd"]) && isset($_POST["usuario"]) && isset($_POST["passwd"])) {
        //inicamos sesion y mandamos al controlador para que lo verifique.
        session_start();
        $_SESSION["nombreusu"] = $_POST["usuario"];
        $_SESSION["passwd"] = $_POST["passwd"];
        header("Location:controlador.php/?method=auth");
    }
} else {
    header("Location: login.php");
}
?>
<!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Document</title>
            <style>
                
            </style>
        </head>
        <body>
            <form action="" method="POST">
                <p>
                    <label for="usuario">Introduce Usuario:</label>
                    <input type="text" name="usuario" id="usuario">
                </p>
                <p>
                    <label for="constraseña">Introduce Contraseña: </label>
                    <input type="password" name="passwd" id="passwd">
                </p>
                <input type="submit" name="envio" id="envio" value="Enviar Datos">
            </form>
        </body>
    </html>