<?php

    //Variables de configuración
    $servidor = "localhost";
    $usuario = "root";
    $clave = "";
    $sql = "";

    try
        {
        $conn = new PDO("mysql:host=$servidor;dbname=mibbdd;charset=utf8", $usuario, $clave);
        
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql= "SELECT count(*) as cantidad FROM alumnos;";
        $registros=$conn->query($sql);
        $fila =$registros->fetch();
        }
    catch(PDOException $ex)
        {
            echo"Error " . $ex->getMessage();
        }
	
?>