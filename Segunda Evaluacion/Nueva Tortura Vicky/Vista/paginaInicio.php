<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina Inicio</title>
</head>
<style>
    table, td {
        border: solid black 1px;
    }
</style>
<?php
    // $expire = time() + (30 * 24 * 60 * 60); 
    // $date2 = date("Y-m-d H:i:s");
    // setCookie('datosUltimaConexion', $date2, $expire);//expira en 30 días
?>

<body>
    <table style="border: solid black 1px">

        <tr>
            <td>Añadir Usuario</td>
            <td>Mostdar Usuarios</td>
            <td>Añadir Publicacion</td>
            <td>Mostdar Publicaciones</td>
            <td>Cerrar Sesion</td>
            <td>Bienvenido @adminitdador</td>
            <td><a href="loginUsuarios.html">Cerrar Sesion</a></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <!-- <td>
                <?php echo $_COOKIE['datosUltimaConexion']; ?>
            </td> -->
            <td><?php echo $_GET['cookie'];?></td>
        </tr>

    </table>

</body>

</html>