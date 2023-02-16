<?php
class Adopciones_TO
{
    private $id;
    private $idAnimal;
    private $fecha;
    private $razon ;
    private $conexion ;
    private static $TABLA="adopcion";

    

    public function __get($propiedad){
        return $this->$propiedad;
    }

    public function __set($propiedad,$nuevoValor)
    {
        $this->$propiedad=$nuevoValor;
    }

}
?>