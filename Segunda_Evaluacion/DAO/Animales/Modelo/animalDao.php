<?php
    // require '../Modelo/DataSource.php';
    require '../Modelo/conexion.php';
    require_once 'animal.php';

    class AnimalDao extends Conexion{
        private $conexion;

        function __construct($conexion)
        {
            // $this->conexion = new Conexion('protectora_animales');
            parent::__construct($conexion);
            $this->conexion = parent::conectar();
        }

        function obtenerTodo()
        {   
            $stmt = $this->conexion->prepare("SELECT * FROM animal");
            $stmt->execute();
            $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $animales = [];

            foreach ($resultado as $row) {
                $animal = new Animal($row['id'],$row['nombre'],$row['especie'],$row['raza'],$row['genero'],$row['color'],$row['edad'],'');
                $animales[] = $animal;
            }

            echo "pepe2 ".$animales[0]->__get('genero');
            return $animales;
        }

        function insertar($animal)
        {
            try {
                $a = $animal->__get('id');
                $b = $animal->__get('nombre');
                $c = $animal->__get('especie');
                $d = $animal->__get('raza');
                $e = "HEmbra";
                $f = $animal->__get('color');
                $g = $animal->__get('edad');
                echo "pepe -> " . $g;
                $sql = "INSERT INTO animal (id, nombre, especie, raza, genero, color, edad) 
                    VALUES (:A,:B,:C,:D,:E,:F,:G)";
                $stmt = $this->conexion->prepare($sql);
                $stmt->bindParam(':A',$a);
                $stmt->bindParam(':B',$b);
                $stmt->bindParam(':C',$c);
                $stmt->bindParam(':D',$d);
                $stmt->bindParam(':E',$e);
                $stmt->bindParam(':F',$f);
                $stmt->bindParam(':G',$g);
                if($stmt->execute())
                    echo "Animal insertado correctamente";
            } catch (PDOException $w) {
                echo "<br/> ERROR AL AÑADIR ANIMAL " . $w;
            }
            
        }
    }

    $x = new AnimalDao('protectora_animales');
    $x->obtenerTodo();
    // echo "<pre>"; 
    // print_r($x->obtenerTodo());
    // echo "</pre>";
    // echo $animales[1]->__get('nombre');
?>