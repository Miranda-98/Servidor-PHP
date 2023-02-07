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
session_start();
?>

<body>
    <table >

        <tr>
            <td>Añadir Usuario</td>
            <td>Mostdar Usuarios</td>
            <td>Añadir Publicacion</td>
            <td>Mostdar Publicaciones</td>
            <td>Cerrar Sesion</td>
            <td>Bienvenido <?php echo $_SESSION['user']?></td>
            <td><a href="../Modelo/logOut.php">Cerrar Sesion</a></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <!-- <td>
                <?php echo $_COOKIE[$_SESSION['user']]; ?>
            </td> -->
            <td><?php echo $_COOKIE[$_SESSION['user']]; ?></td>
        </tr>
     </table>

     <table>



        <div>
            <form method="post">
                <div><button name='botonTablas'>Publicaciones</button></div>
                <?php 
                    if( $_SESSION['user'] == 'admin')
                        echo "<div><button name='botonUsuarios'>Usuario</button></div>";
                ?>
                
                <div><button name='botonFiltrar'>Filtrar Publicaciones</button></div>
                <div><button name='añadirPublicacion'>Añadir Publicaciones</button></div>

            </form>

        </div>

        <?php
            include '../Controlador/controlador_vista.php';
        ?>
        </table>
        </body>

</html>