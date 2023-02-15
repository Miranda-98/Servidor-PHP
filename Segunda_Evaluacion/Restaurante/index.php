<?php

    class Cerebro{
        function comprobarExisteBaseDatos(){
            try {
                // $conn = new PDO ("mysql:host=localhost;dbname=$cone;charset=utf8",'root','');
                            
                $conn = new PDO("mysql:host=localhost", 'root', '');
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
                $dbname = "restaurante";
                $stmt = $conn->query("SELECT COUNT(*) FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = '$dbname'");
                if ($stmt->fetchColumn() > 0) {
                    echo "La base de datos $dbname existe";
                    return true;
                } else {
                    echo "La base de datos $dbname no existe";
                    return false;
                }
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
        }


        function agregaUsuario($nombre,$contraseña) 
        {
            
            try {
                $conexion = new PDO("mysql:host=localhost", 'root', '');
                $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $conexion->exec("USE restaurante");

                //obtener el ultimo id existente para que la nueva publicacion vaya a continucacion de este
                $sqlID="SELECT MAX(id) from usuarios";
                $stmtID = $conexion->prepare($sqlID);
                $stmtID->execute();
                $ultimoID=$stmtID->fetch();
                $idMax = $ultimoID[0]+1;

                ///////////////////////////////////////////////////////////////////////////////////////////

                //$pass = password_hash($contraseña, PASSWORD_DEFAULT);
                $pass = $contraseña;
                
                $sql = "INSERT INTO usuarios (id, nombre, contrasena) VALUES (:A, :B, :C)";
                $stmt = $conexion->prepare($sql);
                $stmt->bindParam(':A', $idMax);
                $stmt->bindParam(':B', $nombre);
                $stmt->bindParam(':C', $pass);
                $stmt->execute();
                // echo '<br/>usuarios insertado';
            } catch (PDOException $e) {
                echo "<br/>EL USUARIO YA ESTA REGISTRADO EN LA BASE DE DATOS ".$e;
            }
        }

        function agregaPlatos($nombre, $precio, $categoria)
        {
            try{
                
                
                $conexion = new PDO("mysql:host=localhost", 'root', '');
                $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $conexion->exec("USE restaurante");
                //obtener el ultimo id existente para que la nueva publicacion vaya a continucacion de este
                
                $sqlID="SELECT MAX(id) from platos";
                $stmtID = $conexion->prepare($sqlID); 
                $stmtID->execute();
                $ultimoID=$stmtID->fetch();
                $idMax = $ultimoID[0]+1;

                ////////////////////////////////////////////////////////////////////////////////////


                $sql = "INSERT INTO platos (id, nombre, precio, categoria) VALUES (:A, :B, :C, :D)";
                $stmt = $conexion->prepare($sql);
                $stmt->bindParam(':A', $idMax);
                $stmt->bindParam(':B', $nombre);
                $stmt->bindParam(':C', $precio);
                $stmt->bindParam(':D', $categoria);
                $stmt->execute();
                // echo '<br/>plato insertado';

            } catch (PDOException $e) {
                echo "<br/>EL PLATO YA ESTA REGISTRADO EN LA BASE DE DATOS ".$e;
            }
        }
    }
    
    

    $x = new Cerebro();
    $c = $x->comprobarExisteBaseDatos();
    if($c == true){
        //si existe la base de datos redirige a la página principal
        echo "todo va bacano";
        header('location: Vista/login.html');

    } else {
        // si no existe la base de datos la crea y redirige a la página principal
        try {
            $conn = new PDO("mysql:host=localhost", 'root', '');
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // Crear la base de datos "restaurante"
            $sql = "CREATE DATABASE IF NOT EXISTS restaurante";
            $conn->exec($sql);

            // Seleccionar la base de datos "restaurante"
            $conn->exec("USE restaurante");

            // Crear la tabla "usuarios"
            $sql = "CREATE TABLE usuarios (
                id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                nombre VARCHAR(50) NOT NULL,
                contrasena VARCHAR(50) NOT NULL
            )";
            $conn->exec($sql);

            // Crear la tabla "platos"
            $sql = "CREATE TABLE platos (
                id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
                nombre VARCHAR(30) NOT NULL,
                precio INT(10) NOT NULL,
                categoria SET ('vegano', 'sin gluten', 'sin lactosa', 'normal')
                
            )";
            $conn->exec($sql);

            echo "Base de datos y tablas creadas correctamente";

            $x->agregaUsuario('pepe','pepe');
            $x->agregaUsuario('pepa','pepa');

            $x->agregaPlatos('chaufa',10,"normal");
            $x->agregaPlatos('arepa',10,'normal');
            $x->agregaPlatos('bandeja paisa',10,'vegano');
            $x->agregaPlatos('causa',10,'normal');
            $x->agregaPlatos('cachapa',10,'normal');
            $x->agregaPlatos('juanes',10,'vegano');
            $x->agregaPlatos('entrecot',10,'vegano');
            $x->agregaPlatos('aeropuerto',10,'normal');
            $x->agregaPlatos('panetone',10,'sin gluten');
            $x->agregaPlatos('tamal',10,'sin lactosa');



            header('location: index.php');

        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
?>