<?php
    class Conexion {
        private $nombre;
        private $usuario ="root";
        private $clave ="";

        function __construct ($nombre){
            $this->nombre=$nombre;
        }

        protected function conectar (){
            $cone=$this->nombre;
                try {
                    $conn = new PDO ("mysql:host=localhost;dbname=$cone;charset=utf8",$this->usuario,$this->clave);
                    //asignamos el modo excepción
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    echo "conexion realizada";
                    return $conn;
                }catch (PDOException $e){
                    echo "No conecta la base";
                    echo "Error: " . $e->getMessage();
                }
            }
    }

    class PruebaConexion extends Conexion{
        function conecta()
        {
            $this->conectar();
        }
    }

// $conxion = new PruebaConexion('pufosa');
// //print_r($conxion);
// $conxion->conecta();
?>