<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>pagina de insercion</title>
</head>
<body>
    <h2>formulario de insercion de personas.</h2>
    <form action="?method=insertPersona" method="post">
    <p>
        <label for="nombreusu">Nombre:</label>
        <input type="text" name="nombre" id="nombre">
    </p>
    <p>
        <label for="apellidos">Apellidos:</label>
        <input type="text" name="password" id="password">
    </p>
    <p>
        <label for="direccion">Direccion:</label>
        <input type="text" name="direccion" id="direccion">
    </p>
    <p>
        <label for="telefono">Telefono:</label>
        <input type="text" name="telefono" id="telefono">
    </p>
        <input type="submit" value="Insertar">
    </form>

    <hr>

    <h2>formulario de insercion de empresas.</h2>
    <form action="?method=insertEmpresa" method="post">
    <p>
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre">
    </p>
    <p>
        <label for="direccion">Direccion:</label>
        <input type="text" name="direccion" id="direccion">
    </p>
    <p>
        <label for="telefono">Telefono:</label>
        <input type="text" name="telefono" id="telefono">
    </p>
    <p>
        <label for="email">Email:</label>
        <input type="text" name="email" id="email">
    </p>
        <input type="submit" value="Insertar">
    </form>
</body>
</html>