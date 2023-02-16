<?php
    //require_once 'DataSource.php';
    require_once 'conexion.php';

    class Animal extends Conexion {
        private $id, $nombre, $especie, $raza, $genero, $color, $edad, $conexión;
        static $TABLA = 'animal';

        function __construct ($id, $nombre, $especie, $raza, $genero, $color, $edad, $conexion){
            parent::__construct(self::$TABLA, $conexion);
            $this->id=$id;
            $this->nombre=$nombre;
            $this->especie=$especie;
            $this->raza=$raza;
            $this->$genero=$genero;
            $this->color=$color;
            $this->edad=$edad;
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

    }
?>