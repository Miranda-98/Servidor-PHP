<?php
    require "crud.php";

    class Adopcion extends Crud{

        private $Id, $idAnimal, $idUsuario, $fecha, $razon, $conexion;
        static $TABLA = 'adopciones';

        function __construct ($Id, $idAnimal, $idUsuario, $fecha, $razon, $conexion){
            parent::__construct(self::$TABLA, $conexion);
            $this->Id = $Id;
            $this->idAnimal = $idAnimal;
            $this->idUsuario = $idUsuario;
            $this->fecha = $fecha;
            $this->razon = $razon;
            $this->conexion=$conexion;
        }

        function __get($valor)
        {
            return $this->$valor;
        }

        function __set($valor, $nuevoValor)
        {
            $this->$valor = $nuevoValor;
        }

        function crear()
        {
            try{
                $conn = parent::conectar();
                $sql = "INSERT INTO adopciones (id, idAnimal, idUsuario, fecha, razon) VALUES (:A, :B, :C, :D, :E)";
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(':A', $this->Id);
                $stmt->bindParam(':B', $this->idAnimal);
                $stmt->bindParam(':C', $this->idUsuario);
                $stmt->bindParam(':D', $this->fecha);
                $stmt->bindParam(':E', $this->razon);

                if($stmt->execute())
                    echo 'adopción registrada correctamente ' . $this->get_tabla();
                else 
                    echo 'error al registrar adopción ' . $this->get_tabla();
            } catch (PDOException $e) {
                return "Error: " . $e->getMessage();
            }
        }

        function actualizar()
        {
            $fechaUpd = date('d/m/y h:i:s');
            $conn = parent::conectar();
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE adopciones SET idAnimal = :A,
                                          idUsuario = :B,
                                          fecha = '2022-12-07',
                                          razon = :C
                                          WHERE id = :D";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':A', $this->idAnimal);
            $stmt->bindParam(':B', $this->idUsuario);
            $stmt->bindParam(':C', $this->razon);
            $stmt->bindParam(':D', $this->Id);

            if($stmt->execute()){
                echo  "<br/><br/>Adopción actualizada correctamente";
            } else {
                echo  "<br/><br/>Adopción no actualizado";
            }
        }
    }

    $adopcion = new Adopcion(2, 1, 1, '07-12-2022', 'le gustan los perros chuscos', 'adopcion');
    echo "<pre>";
    print_r($adopcion);
    echo "</pre>";

    //$adopcion->crear();
    $adopcion->actualizar();
?>