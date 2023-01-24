<?php 
    //echo "<link rel='stylesheet' type='text/css' href='estilosBotonera.css' />";
    require "conexionClase.php";
    $datosCorrectos = false;
    /*
        2 formularios
        1 recibe lo que quiero cambiar -> lo busco en la base de datos
            si esta devuelvo sus valores al formulario 2, si no esta
            le aviso de que no se encuentra en la base de datos
        formulario 2 muestra los valores de la base de datos con un value 
        o placeholder los modifico y aplico los cambios en la base de datos
    */

    if(!$datosCorrectos){
        echo "<div id='buscaUsuario'><form action='' method='post'><fieldset>
            <legend>Completa los campos:</legend>
            <input type='text' name='codigo' placeholder='Codigo'>
            <p><input id='botonEnviar' type='submit' name='botonEnviar' value='Enviar datos'></p>
            </fieldset></form></div>";
    } else {
        echo "<div id='insertaUsuario'><form action='modificarUsuarios2.php' method='post'>
            <fieldset>
            <legend>Completa los campos:</legend>
            <input type='text' name='codigo' value= ".$resultado['CODIGO'].">
            <input type='text' name='nombre' value=".$resultado['NOMBRE'].">
            <input type='text' name='apellido' value=".$resultado['APELLIDOS'].">
            <input type='text' name='telefono' value=".$resultado['TELEFONO'].">
            <input type='text' name='correo' value=".$resultado['CORREO'].">
            <p><input type='submit' id='botonEnviar2' name='botonEnviar' value='Enviar datos'></p>
            </fieldset></form></div>";
    }

    
    if(isset($_POST['botonEnviar'])){
        $codigoR = $_POST['codigo'];
    }


    try{
        $conecta = conectar();
        $conecta->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sqlP = $conecta->prepare("SELECT * FROM alumnos WHERE CODIGO = :codigo");
        $sqlP->bindParam(':codigo',$codigoR);
        $sqlP->execute();

        $resultado = $sqlP->fetch(PDO::FETCH_ASSOC);
        echo var_dump("array datos alumno: ".$resultado);
        if($resultado <= 0){
            echo "el alumno no esta en la base de datos, no lo puedes modificar";
            $datosCorrectos = false;
            echo $datosCorrectos."peeeeeeeeeeeeeeeeeeeeeeee!";
        } else {
            $datosCorrectos = true;
            echo "<div id='insertaUsuario'><form action='modificarUsuarios2.php' method='post'>
            <fieldset>
            <legend>Completa los campos:</legend>
            <input type='text' name='codigo' value=".$resultado['CODIGO'].">
            <input type='text' name='nombre' value=".$resultado['NOMBRE'].">
            <input type='text' name='apellido' value=".$resultado['APELLIDOS'].">
            <input type='text' name='telefono' value=".$resultado['TELEFONO'].">
            <input type='text' name='correo' value=".$resultado['CORREO'].">
            <p><input type='submit' id='botonEnviar2' name='botonEnviar' value='Enviar datos'></p>
            </fieldset></form></div>";
            //  $url = "modificarUsuarios2.php";
            //  echo "<SCRIPT>window.location='$url';</SCRIPT>";
        }


        
    } catch (PDOException $e) {
        echo "error: ".$e->getMessage;
    }

    

    
?>