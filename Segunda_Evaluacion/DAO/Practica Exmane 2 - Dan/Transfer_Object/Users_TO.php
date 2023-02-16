<?php
class Users_TO
{
    private $nombre;
    private $contraseña;
    private static $TABLA="usuarios";

    

    public function __get($propiedad){
        return $this->$propiedad;
    }

    public function __set($propiedad,$nuevoValor)
    {
        $this->$propiedad=$nuevoValor;
    }

}
?>