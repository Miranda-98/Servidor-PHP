<?php

/*
    ===============
    Transfer Object
    ===============

    - Esta clase representa la informaciÃ³n que pasa desde en "Business Object" al "Data Access Object".
    - Su funcion es encapsular los datos de transferencia.
    - Solo contiene atributos, getters y setters.
*/

class Animales_TO {
    // == ATRIBUTOS DE CLASE ==
    private $id;
    private $nombre ;
    private $raza;
    private $genero;
    private $color;
    private $edad;
    private static $TABLA="animales";

    // == GETTERS - SETTERS ==
    public function __get($attr) {
        return $this->$attr;
    }

    public function __getTabla () {
        return $this->TABLA;
    }

    public function __set($attr, $val) {
        $this->$attr = $val;
    }
}
?>