<?php
    require 'conexion.php';

    class Platos extends Conexion {
        private $conexion;
    
        function __construct($conexion)
        {
            parent::__construct($conexion);
            $this->conexion = parent::conectar();
        }

        function obtenerDatosId($id)
        {
            try {
                $cone = $this -> conexion;
                $sql = "SELECT * FROM platos WHERE id IN ($id)";
                $platos = $cone->query($sql);

                // echo "<pre>"; 
                // print_r($platos);
                // echo"</pre>";
                return $platos;
            } catch (PDOException $e) {
                echo "<br/> ERROR AL BUSCAR USUARIO POR ID";
            }
        }

        function mostrarPlatos()
        {
            try{
                $cone = $this -> conexion;
                $sql = "SELECT * FROM platos";
                $platos = $cone->query($sql);
                

                return $platos;
            } catch (PDOException $e) {
                echo "<br/> ERROR AL MOSTRAR LISTA DE PLATOS ".$e;
            }
        }
    }

    $x = new Platos('restaurante');
    $x->mostrarPlatos();
?>