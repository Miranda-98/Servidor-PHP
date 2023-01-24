<?php 
echo "<link rel='stylesheet' type='text/css' href='estilosBotonera.css' />";
    require "conexionClase.php";
    $codigoR = '';
    $nombreR = '';
    $apellidoR = '';
    $telefonoR = '';
    $correoR = '';
    $_REQUEST['correo'] = '';

    echo "<div id='insertaUsuario'><form action='' method='post'>
    <fieldset>
        <legend>Completa los campos:</legend>
        <input type='text' name='codigo' placeholder='Codigo'>
        <input type='text' name='nombre' placeholder='Nombre'>
        <input type='text' name='apellido' placeholder='Apellido'>
        <input type='text' name='telefono' placeholder='Telefono'>
        <input type='text' name='correo' placeholder='Correo'>
        <p><input type='submit' id='botonEnviar' name='botonEnviar' value='Enviar datos'></p>
        </fieldset></form></div>";

        if(isset($_POST['botonEnviar'])){
            $codigoR = $_POST['codigo'];
            $nombreR = $_POST['nombre'];
            $apellidoR = $_POST['apellido'];
            $telefonoR = $_POST['telefono'];
            $correoR = $_POST['correo'];
        }

    try{
        $conecta = conectar();
        $conecta->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        //comprobar que el usuario no esta registrado 
        $sqlComprobar = "SELECT COUNT(*) AS 'cantidad' FROM ALUMNOS WHERE correo='".$_REQUEST['correo']."';";
        $resultado = $conecta->query($sqlComprobar);
        $num = $resultado->fetch();
        if($num['cantidad']>0) {
            echo "el alumno ya esta registrado en la base de datos";//quitarlo
        } else {
            //sentencia sql preparada
            $sqlP = $conecta->prepare("INSERT INTO alumnos (CODIGO, NOMBRE, APELLIDOS, TELEFONO, CORREO) VALUES (:codigo, :nombre, :apellidos, :telefono, :correo)");


            //paso del valor
            $sqlP->bindParam(":codigo", $codigo);
            $sqlP->bindParam(":nombre", $nombre);
            $sqlP->bindParam(":apellidos", $apellidos);
            $sqlP->bindParam(":telefono", $telefono);
            $sqlP->bindParam(":correo", $correo);

            //asignamos valor a los valores
            $codigo = $codigoR;
            $nombre = $nombreR;
            $apellidos = $apellidoR;
            $telefono = $telefonoR;
            $correo = $correoR;

            //ejecutamos la inserccion
            $sqlP->execute();

            echo "usuario registrado correctamente";
        }


        


    } catch (PDOException $e){
        echo "error al ingresar usuario".$e->getMessage();
    }
?>