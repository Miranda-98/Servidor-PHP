<?php
    require '../Modelo/DataSource.php';
    class AnimalDao {
        private $conexion;

        function __construct()
        {
            $this->conexion = new DataSource();
        }

        function obtenerTodo()
        {
            $stmt = $this->conexion->conex()->prepare("SELECT * FROM animal");
            $stmt->execute();
            $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $animales = [];

            foreach ($resultado as $row) {
                $animal = new Animal($row['id'],$row['nombre'],$row['especie'],$row['raza'],$row['genero'],$row['color'],$row['edad']);
                $animales[] = $animal;
            }

            return $animales;
        }
    }
?>