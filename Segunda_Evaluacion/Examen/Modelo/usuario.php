<?php
    class Usuario {
        private $nombre, $apellidos, $domicilio, $telefono, $email, $contraseña;

        function __construct($nombre, $apellidos, $domicilio, $telefono, $email, $contraseña)
        {
            $this->nombre = $nombre;
            $this->apellidos = $apellidos;
            $this->domicilio = $domicilio;
            $this->telefono = $telefono;
            $this->email = $email;
            $this->contraseña = $contraseña;
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