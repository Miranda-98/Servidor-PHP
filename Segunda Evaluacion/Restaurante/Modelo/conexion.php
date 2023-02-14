<?php 
    class Conexion {

        private $nombre;

        function __construct($nombreBD)
        {
            $this->nombre = $nombreBD;
        }

        function conectar(){
            $cone=$this->nombre;
                try {
                    $conn = new PDO ("mysql:host=localhost;dbname=$cone;charset=utf8",'root','');
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    // echo "conexion exitosa<br/>";
                    return $conn;
                }catch (PDOException $e){
                    echo "Error al conectar a la base de datos: " . $e->getMessage();
                }
            
        }
        
    }
    $x = new Conexion('restaurante');
    $x->conectar();

?>