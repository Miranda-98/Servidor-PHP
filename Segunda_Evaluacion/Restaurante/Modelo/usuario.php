<?php
    require 'conexion.php';
    
    class Usuario extends Conexion {
        private $conexion;

        function __construct($conexion)
        {
            parent::__construct($conexion);
            $this->conexion = parent::conectar();
        }

        function comprobarUsuario($id_login,$pass_login)
        {
            try {
                $cone = $this->conexion;
                $sql = "SELECT contrasena as 'pepe' FROM usuarios WHERE nombre = '" . $id_login . "'";
                $resultado = $cone->query($sql);
                $num = $resultado->fetch();
                // echo $num['pepe'];
                
                //if( password_verify( $pass_login, $num['pepe'])  ){
                if($pass_login == $num['pepe']){
                    echo "true";
                    // return true;
                    header('location: ../Vista/menu.php');
                }
                
                else{
                    echo "false";
                    // return false;
                    header('location: ../Vista/login.html');
                }
                    
            } catch (PDOException $e) {
                echo "<br/>ERROR AL COMPROBAR EL USUARIO";
            }
        }
    }
?>