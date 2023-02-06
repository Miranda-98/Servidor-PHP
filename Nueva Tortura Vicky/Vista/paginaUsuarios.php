<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    table, td{
        border: solid black 1px;
    }
</style>
<body>
    <br/>

    <table>
    
        <th colspan="2">Usuario</th>
    
        
        <tr>
            <td>Acciones</td>
            <td>Usuario</td>
        </tr>

        <?php
            include '../Controlador/cont_usuarios.php';
            $user0 = new Controlador_Usuarios();
            $user0->mostrar();
        ?>
    </table>

</body>
</html>