<!DOCTYPE html>
<html lang="es">

<head>

    <?Php
    /*si en el $_POST pongo el boton, el formulario se carga en la misma pagina
    si pongo nombre se carga en una nueva ventana
    el formulario es el mensaje de bienvenida*/
    if (isset($_POST['botonEnviar'])) {

        $nombre = (int)$_POST['nombre'];

        if(is_integer($nombre))
            echo "admitido";
        else    
            echo "no admitido";

        echo "bienvenida $nombre";
    }
    ?>
</head>

<body>
    <form method="post" action="">
        <label for="nombre"> Nombre </label>
        <input type="number" name="nombre" required>
        <p><input type="submit" name="botonEnviar" value="Enviar datos"></p>
    </form>
</body>

</html>