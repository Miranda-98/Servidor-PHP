<?php
    require "conexionBD.php";

    if(isset($_POST['login'])){
        $usuario = $_POST['usuario'];
        $contraseña = $_POST['contraseña'];


        try{
            $conexion = conectar();
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            //comprobar que el usuario esta registrado 
            $sqlComprobar = "SELECT COUNT(*) AS 'cantidad', pass, user FROM usuarios WHERE user ='".$_REQUEST['usuario']."';";
            $resultado = $conexion->query($sqlComprobar);
            $num = $resultado->fetch();

            $pass = password_verify($num['pass'], $contraseña);

            if($num['cantidad']>0 && !$pass) {
                echo "puedes entrar";
            } else {
                echo "vales verga";
            }

        } catch (PDOException $e){
            echo "error al ingresar usuario".$e->getMessage();
        }
        
    }
?>