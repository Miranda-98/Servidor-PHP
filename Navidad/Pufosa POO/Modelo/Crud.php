<?php 
    class Crud extends conexion{
        
        private $tabla;
        private $conexion;

        function __construct($con,$tabla)
        {
            parent::__construct($con);
            $this->tabla = $tabla;
            $this->conexion = parent::conectar();
        }

        function obtieneTodos()
        {
            try{
                $conn=$this->conexion;
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql= "SELECT * FROM $this->tabla ";
                $stmt = $conn->prepare($sql);
                $stmt->execute();
                $registros=$stmt->fetchAll(PDO::FETCH_OBJ);
                return($registros);
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
        }
    }
?>