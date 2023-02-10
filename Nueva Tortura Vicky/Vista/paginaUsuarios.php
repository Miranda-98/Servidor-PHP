<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    .mostrar td{
        border: solid black 1px;
    }
</style>
<?php
    if(session_status() == PHP_SESSION_NONE)
    session_start();

    echo $_SESSION['user'];
    if(isset($_SESSION['user']) ){
        $valor = $_SESSION['user'];
        if($valor == 'admin'){
    
?>
<body>
    <br/>

    <table class="mostrar">
    
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
        <div id="crearUsuario">
            <form method="Get">
                <label>Nombre del usuario</label>
                <input type="text" name="nombre" id="nombre">

                <input type="submit" name="enviarUsuario" value="Generar Contraseña">
            </form>
        </div>
            
        <?php
            $user = new Controlador_Usuarios();

            if(isset($_GET['nombre']))
                $user->añadirUsuario($_GET['nombre']);
        ?>
    </table>

</body>
</html>
<?php
    } else {
        header('location: ../Vista/paginaInicio.php');
     }
    }
?>