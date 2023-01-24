<?php
    require "conexionBDPufosa.php";


    if(isset($_POST['botonRegistro'])){
        $nombreR = $_POST['user'];
        $contraseñaR = $_POST['password'];

        echo $nombreR.' - '.$contraseñaR.'</br>';
    }


    try{
        $usuario = "root";
        $contraseña = "";

        $conexion = conectar();

        //sentencia sql
        $sql = "SELECT * FROM empleados WHERE empleado_ID LIKE $nombreR;";
        $pass = "";
        $id;

        $result = $conexion->query($sql);//almaceno en result lo que devuelve la query 
            
        
        foreach($result as $fila){
            $fila['empleado_ID'];
            $fila['Inicial_del_segundo_apellido'];
            $fila['Trabajo_ID'];

            $usuario = $fila['empleado_ID'];
            $pass = $fila['Inicial_del_segundo_apellido']."".$fila['empleado_ID'];
            $id = $fila['Trabajo_ID'];
        }

        if ($pass == $contraseñaR) {
            echo "usuario valido";

            if (($id == 671 )) {
                $archivo = fopen("PUFOSA.txt", "a+b");
                if (!$archivo) {
                    echo "error al abrir el fichero";
                } else {
                    echo "pufosa.txt";
                    fwrite($archivo, $usuario."\ ");
                }


                fclose($archivo);


                header("location:paginaManager.php");
                die();


            } else if($id == 672) {
                $archivo = fopen("PUFOSA.txt", "a+b");
                if (!$archivo) {
                    echo "error al abrir el fichero";
                } else {
                    echo "pufosa.txt";
                    fwrite($archivo, $usuario."\ ");
                }


                fclose($archivo);


                header("location:paginaPresidente.php");
                die();

            } else {
                $archivo = fopen("PUFOSA.txt", "a+b");
                if (!$archivo) {
                    echo "error al abrir el fichero";
                } else {
                    echo "pufosa.txt";
                    fwrite($archivo, $usuario."\ ");
                }


                fclose($archivo);
                

                header("location:paginaNoAdmin.php");
                die();

            }
        } else {
            header("location:index-login.php ? msg='<script language='javascript'>alert('los datos introducidos no son correctos')</script>';");
            die();
        }
    


    } catch (PDOException $e){
        echo "error ".$e->getMessage();
    }
?>