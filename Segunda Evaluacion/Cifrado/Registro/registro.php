<?php 
    require "conexionBD.php";

    if(isset($_POST['registro'])){
        $nombre = $_POST['nombre'];
        $usuario = $_POST['usuario'];
        $contraseña =password_hash($_POST['contraseña'], PASSWORD_DEFAULT);

        echo $nombre, $usuario, $contraseña;

        try{
            $conecta = conectar();
            $conecta->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            
            $sql="INSERT INTO usuarios (nombre, user, pass) VALUES (:A,:B,:C); ";

            $stmt = $conecta->prepare($sql);
            $stmt->bindParam(':A', $nombre);
            $stmt->bindParam(':B',$usuario);
            $stmt->bindParam(':C', $contraseña);

            $stmt->execute();

            echo "usuario registrado correctamente";
        

        } catch (PDOException $e){
            echo "error al ingresar usuario".$e->getMessage();
        }
    }
?>