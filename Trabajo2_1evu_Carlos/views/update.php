<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>pagina de insercion</title>
</head>
<body>
    <h1>Pagina de insercion de datos.</h1>
    <hr>
    <h2>Insertar un nuevo contacto tipo persona</h2>
    <form action="home.php" method="post">
    <p>
        <label for="nuevousu">Nuevo Usuario:</label>
        <input type="text" name="nuevousu" id="nuevousu">
    </p>
    <p>
        <label for="newpassword">Nueva Constraseña:</label>
        <input type="password" name="newpassword" id="newpassword">
    </p>
        <input type="submit" value="Insertar">
    </form>
</body>
</html>