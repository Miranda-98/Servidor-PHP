<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina Inicio</title>
</head>
<style>
    table {
        display: flex;
        align-items: center;
        justify-content: center;
    }
</style>
<?php
// $expire = time() + (30 * 24 * 60 * 60); 
// $date2 = date("Y-m-d H:i:s");
// setCookie('datosUltimaConexion', $date2, $expire);//expira en 30 días
session_start();
if(!isset($_SESSION['user'])){
    header('location: ../Vista/loginUsuarios.html');
}
?>

<body>
    <table>
        <form method="post">
            <tr>
                <td><input type="image" src="../img/logo.jpg" href="../Vista/paginaInicio.php" style="width: 80px; height: 80px;"></td>
                <td>Bienvenido <?php echo $_SESSION['user'] ?></td>
                <?php echo "";
                    if ($_SESSION['user'] == 'admin')
                        echo "<td><div><button name='botonUsuarios'>Usuario</button></div></td>";
                    echo "";
                ?>
                <td>
                    <div><button name='añadirPublicacion'>Añadir Publicaciones</button></div>
                </td>
                <td>
                    <div><button name='botonFiltrar'>Filtrar Publicaciones</button></div>
                </td>
                <td>
                    <div><button name='botonTablas'>Publicaciones</button></div>
                </td>
                
                <td><a href="../Modelo/logOut.php">Cerrar Sesion</a></td>
                <td><?php
                        if(isset($_COOKIE[$_SESSION['user']]))
                            echo 'Ultima conexion: ' . $_COOKIE[$_SESSION['user']]; 
                        else 
                        echo 'Ultima conexion: primera conexion'; 
                    ?></td>
            </tr>
<?php
                include '../Controlador/controlador_vista.php';
            ?>
        </form>
        
    </table>

    

</body>

</html>