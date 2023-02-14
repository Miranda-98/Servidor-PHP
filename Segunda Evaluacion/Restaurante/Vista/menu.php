<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    #tabla, td {
        border: solid black 1px;
    }
</style>
<body>
    <h3>Lista de platos</h3>
    <?php
        require '../Modelo/platos.php';
        if(session_status() == PHP_SESSION_NONE)
            session_start();

        $platos = new Platos('restaurante');
        $menu = $platos->mostrarPlatos();

        echo "<table id='tabla'>
                <tr>
                    <td></td><td></td><td></td><td>ID</td><td>NOMBRE</td><td>PRECIO</td><td>CATEGORIA</td>
                </tr>";
            echo "<form method='post' >";
            foreach($menu as $m) {
                echo "<tr>
                            <td><input type='checkbox' name='añadir' value=".$m['id']." ></td>
                            <td><a href='../Controlador/cont_platos.php?msg=añadir&id=".$m['id']."'>Añadir</a></td>
                            <td><a href='../Controlador/cont_platos.php?msg=borrar&id=".$m['id']."'>Borrar</a></td>
                            <td>".$m['id']."</td>
                            <td>".$m['nombre']."</td>
                            <td>".$m['precio']."</td>
                            <td>".$m['categoria']."</td>
                        
                    </tr>";
            }
            
        
        echo"</table><input type='submit' name='botonEnviar' value='Añadir al pedido'></form>";
        echo "";
    ?>

    <h3>Pedido actual</h3>
    <?php
        include '../Controlador/cont_platos.php';
        
    ?>
    
</body>
</html>
