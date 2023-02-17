<?php
    class Producto {
        private $codigo, $nombre, $pvp, $descripcion;

        function __construct($codigo, $nombre, $pvp, $descripcion)
        {
            $this->codigo = $codigo;
            $this->nombre = $nombre;
            $this->pvp = $pvp;
            $this->descripcion = $descripcion;
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