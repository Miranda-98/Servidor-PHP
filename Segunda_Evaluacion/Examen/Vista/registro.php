<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="stilosFormulario.css" />
    <title>REGISTRO NUEVOS USUARIOS</title>
</head>

<body>
    <div class="login-box">
        <h2>REGISTRO DE NUEVOS USUARIOS</h2>
        <form method="GET" >
            <fieldset>
                <legend>Datos de acceso</legend>
                    <div class="user-box">
                    <input type="text"      name="nombre" placeholder="Nombre" required>
                    <input type="text"      name="apellidos" placeholder="Apellidos" required>
                    <input type="text"      name="domicilio" placeholder="Domicilio" required>
                    <input type="text"      name="telefono" placeholder="Telefono" required>
                    <input type="text"      name="correo" placeholder="Email" required>
                    <input type="password"  name="contraseña" placeholder="Contraseña" required>
                    
                    </div>

                    <div class="button-form"><br/>
                        <!--<a id="submit" name="registro" href="#">Registrarme!</a>-->
                        <input id="submit" type="submit" name="registro" value="Registrarme!">
                    </div>
            </fieldset>
            
        </form>
    </div>

</body>

</html>
<?php
    // include '../Controlador/controller.php';
    // if(isset($_GET['registro'])){
    //     $c = new Controlador();
    //     $c->añadir($_GET['nombre'], $_GET['apellidos'], $_GET['domicilio'], $_GET['telefono'], $_GET['correo'], $_GET['contraseña']);
    // }
    include '../Modelo/Soap/Cliente/comprobarContrasenaSoap.php';
    if(isset($_GET['registro'])){
        $x = new Cliente;
        $x->compruebaContraseña($_GET['contraseña']);
    }
?>