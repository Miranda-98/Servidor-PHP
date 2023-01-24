<?php
    class Repetidor extends Alumno {
        private $asignatura;

        function __construct($asig, $nom, $ape)
        {
            $this->asignatura = $asig;
            parent::__construct($nom,$ape);
        }


        function get_asignatura(){
            return $this->asignatura;
        }

        function set_asignatura($asigna){
            $this->asignatura=$asigna;
        }

    }


?>