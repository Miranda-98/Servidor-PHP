<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito</title>
</head>
<style>
    table,
    th,
    td {
        border: solid black 1px;
    }
</style>
<?php
if (session_status() != PHP_SESSION_NONE)
    session_start();

?>

        <body>
            <h1>CARRITO</h1>
            <a href="../Modelo/logOut.php">Cerrar Sesion</a>
            <table>
                <tr>
                    <th></th>
                    <th>Código Producto</th>
                    <th>Nombre</th>
                    <th>PVP</th>
                    <th>Descripcion</th>
                </tr>

                
                    <?php
                    include '../Modelo/productoDAO.php';
                    include '../Controlador/controladorCarrito.php';

                    $x = new ProductoDAO();
                    $productos = $x->recuperarProductos();
                    echo "<form metho='post'>"; 
                    foreach ($productos as $fila) {
                        echo "<tr>
                            <td><input type=checkbox name='producto' value=".$fila['Nombre']."></input></td>
                            <td>" . $fila['codProd'] . "</td>
                            <td>" . $fila['Nombre'] . "</td>
                            <td>" . $fila['PVP'] . "</td>
                            <td>" . $fila['Descripcion'] . "</td>
                        </tr>";
                    }
                    
                    ?>
                
            </table>
        </body>

</html>

<?php

?>
