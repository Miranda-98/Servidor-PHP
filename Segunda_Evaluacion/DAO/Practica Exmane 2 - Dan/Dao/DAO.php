<?php
/*
    ===================
    Datta Access Object
    ===================

    - Esta clase realiza las consultas con la base de datos.
    - Sus mÃ©todos son llamados por el "Business Object" y los datos los saca del "Transfer Object".
*/

class DAO {
    // == ATRIBUTOS DE CLASE ==
    private $server = 'localhost';
    private $nombreDB = 'protectora2';
    private $usuario = 'root';
    private $conn;


    // == FUNCIONES ==
    // public function __construct() {
    //     try {
    //         $this->conn = new PDO('mysql:host='.$this->server.';dbname='.$this->nombreDB.';charset=utf8', $this->usuario);
    //         $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //     }
    //     catch (PDOException $err) {
    //         echo $err->getMessage();
    //     }
    // }


    public function conectar () {
        try {
            $this->conn = new PDO('mysql:host='.$this->server.';dbname='.$this->nombreDB.';charset=utf8', $this->usuario);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->conn;
        }
        catch (PDOException $err) {
            echo $err->getMessage();
        }
    }

    public function obtenerID($to,$tabla) {
        try {
            $sql = 'SELECT * FROM '.$tabla.' WHERE id = :id';
            $consulta = $this->conn->prepare($sql);
            $consulta->bindValue(':id', $to->__get('id'));
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_ASSOC);
        }
        catch (PDOException $err) {
            echo $err->getMessage();
        }
    }

    public function obtenerTODO($tabla) {
        try {
            $sql = "SELECT * FROM ".$tabla."  ";
            $statement = $this->conn->prepare($sql);
            if ($statement->execute()) {
                return $statement->fetchAll(PDO::FETCH_OBJ);
            }

        }
        catch (PDOException $err) {
            echo $err->getMessage();
        }
    }


}

?>