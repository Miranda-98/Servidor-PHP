<?php
require_once 'DAO.php';
class Users_DAO extends DAO{

    private $conexion;
    
    public function __construct()
    {

        $this->conexion=parent::conectar();
        
    }

    public function registroUser($instancia) {
        try {


            //$contraseña = password_hash($instancia->contraseña, PASSWORD_DEFAULT);
            $sql = ("INSERT INTO users (name,password)
                     VALUES (:nombre,:password)");
            $stmt = $this->conexion->prepare($sql);
            $constra = $instancia->contraseña;
            $stmt->bindParam(':nombre', $constra);
            $stmt->bindParam(':password',$contraseña );
    
            return $stmt->execute();
            
        }catch (PDOException $e){
            echo "Error: " . $e->getMessage();
        }
    }

    public function login ($instancia) {
    try{
        $sql = "SELECT name, password FROM users WHERE name = ?";
        $stmt = $this->conexion->prepare($sql);
        $constra = $instancia->contraseña;
        $stmt->bindParam(1, $constra);
        $stmt->execute();
        $registros = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $registros;

    }catch (PDOException $e){
        echo "Error: " . $e->getMessage();
    }
    }

}

?>