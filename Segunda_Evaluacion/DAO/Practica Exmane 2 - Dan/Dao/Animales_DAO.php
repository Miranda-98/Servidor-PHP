<?php
require_once 'DAO.php';
class Animales_DAO extends DAO{

    private $conexion;

    public function __construct()
    {

        $this->conexion=parent::conectar();
        
    }

    public function insertarAnimal($instancia,$tabla) {
        try {
            $DateAndTime = date('Y-m-d h:i:s a', time());
            $sql = ("INSERT INTO " .$tabla." VALUES (:id,:nombre,:raza,:genero,:color,:edad,:fechaCreacion,:fechaModificacion)");
            $stmt = $this->conexion->prepare($sql);
            $stmt->bindParam(':id', $instancia->id);
            $stmt->bindParam(':nombre', $instancia->nombre);
            $stmt->bindParam(':raza', $instancia->raza);
            $stmt->bindParam(':genero', $instancia->genero);
            $stmt->bindParam(':color', $instancia->color);
            $stmt->bindParam(':edad', $instancia->edad);
            $stmt->bindParam(':fechaCreacion', $DateAndTime);
            $stmt->bindParam(':fechaModificacion', $DateAndTime);
            $stmt->execute();
            
        }catch (PDOException $e){
            echo "Error: " . $e->getMessage();
        }
    }

    public function modificarAnimal($instancia,$tabla) {
        try {
          
        }catch (PDOException $e){
            echo "Error: " . $e->getMessage();
        }
    }


}

?>