<?php
    require_once 'DataSource.php';
    
    class Animal extends DataSource {
        private $id, $nombre, $especie, $raza, $genero, $color, $edad, $conexion;

        function __construct($id, $nombre, $especie, $raza, $genero, $color, $edad)
        {
            parent::__construct($conexion);
            $this->id=$id;
            $this->nombre=$nombre;
            $this->especie=$especie;
            $this->raza=$raza;
            $this->$genero=$genero;
            $this->color=$color;
            $this->edad=$edad;
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