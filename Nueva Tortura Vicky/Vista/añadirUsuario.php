<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir Usuario</title>
</head>
<body>
    <form method="POST">
        <label>Nombre del usuario</label>
        <input type="text" name="nombre" id="nombre">

        <input type="submit" name="enviar" value="Generar Contraseña">
    </form>

    <?php
        if(isset($_POST['nombre']))
            $user0->crearUsuario($_POST['nombre']);
    ?>
</body>
</html>