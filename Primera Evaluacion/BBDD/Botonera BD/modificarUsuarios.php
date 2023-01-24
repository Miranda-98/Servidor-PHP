<?php 
    //echo "<link rel='stylesheet' type='text/css' href='estilosBotonera.css' />";
    require 'conexionClase.php';
    $datosCorrectos = 0;
   

    if(isset($_POST['botonEnviar'])){
        $codigoR = $_POST['codigo'];
    }

    if(isset($_POST['botonEnviar2'])){
        $codigoR2 = $_POST['codigo'];
        $nombreR2 = $_POST['nombre'];
        $apellidoR2 = $_POST['apellido'];
        $telefonoR2 = $_POST['telefono'];
        $correoR2 = $_POST['correo'];

    }


    //actualizar los datos del alumno
    try{
        $conecta = conectar();
        $conecta->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        //sentencia sql preparada
        $sqlP = $conecta->prepare("UPDATE alumnos SET NOMBRE=:nom, APELLIDOS=:ape, TELEFONO=:tlf, CORREO=:cor WHERE CODIGO=:cod;");

        
        //paso del valor
        $sqlP->bindParam(":cod", $codigoR2);
        $sqlP->bindParam(":nom", $nombreR2);
        $sqlP->bindParam(":ape", $apellidosR2);
        $sqlP->bindParam(":tlf", $telefonoR2);
        $sqlP->bindParam(":cor", $correoR2);

        
        

    
        //ejecutamos la inserccion
        $sqlP->execute();

        echo "usuario actualizado correctamente";
 

    } catch (PDOException $e){
        echo "error al ingresar usuario".$e->getMessage();
    }


    //comprobar que existe el alumno
    try{    

        $conecta = conectar();
        $conecta->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sqlP = $conecta->prepare("SELECT * FROM alumnos WHERE CODIGO = :codigo");
        $sqlP->bindParam(':codigo',$codigoR);
        $sqlP->execute();


        $resultado = $sqlP->fetch(PDO::FETCH_ASSOC);
        if($resultado <= 0){
            echo "el alumno no esta en la base de datos, no lo puedes modificar";
            
        } else {
            $datosCorrectos = 1;
            
        }


        
    } catch (PDOException $e) {
        echo 'error: '.$e->getMessage;
    }

    
        if($datosCorrectos == 0 ){
            echo "<div id='buscaUsuario'><form action='' method='post'><fieldset>
                <legend>Completa los campos:</legend>
                <input type='text' name='codigo' placeholder='Codigo'>
                <p><input id='botonEnviar' type='submit' name='botonEnviar' value='Enviar datos'></p>
                </fieldset></form></div>";
        } else if($datosCorrectos == 1){
            echo "<div id='insertaUsuario'><form action='' method='post'>
                <fieldset>
                <legend>Completa los campos:</legend>
                <input type='text' name='codigo' value=".$resultado['CODIGO'].">
                <input type='text' name='nombre' value=".$resultado['NOMBRE'].">
                <input type='text' name='apellido' value=".$resultado['APELLIDOS'].">
                <input type='text' name='telefono' value=".$resultado['TELEFONO'].">
                <input type='text' name='correo' value=".$resultado['CORREO'].">
                <p><input type='submit' id='botonEnviar2' name='botonEnviar' value='Enviar datos'></p>
                </fieldset></form></div>";
        }
    
?>