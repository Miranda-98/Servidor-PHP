<?php 

    require "repetidor.php";

    class Alumno {
        private $nombre;
        private $apellido;
        CONST CICLO = "DAW";//su valor no se puede modificar
        private static $curso = "primero";//su valor se puede modificar

        function __construct($nom, $ape) 
        {
            $this->nombre=$nom;
            $this->apellido=$ape;
        }

        /*function __toString()
        {
            return self::class . ": " . $this->nombre . " " . $this->apellido;
        }*/

        function get_nombre(){
            return $this->nombre;
        }

        function set_nombre($nom){
            $this->nombre=$nom;
        }

        public static function get_curso(){
            return self::$curso;
        }

        public static function set_curso($cur){
            self::$curso=$cur;
        }
    }

    $alumno1 = new Alumno("victoria", "gonzales");
    print_r($alumno1);
    //echo "<br>el nombre del alumno es: ".$alumno1->nombre; -> para variables public
    //echo "<br>el nombre del alumno es: ".$alumno1->get_nombre()." y esta matriculado en ". Alumno::CICLO . " en curso ". Alumno::$curso; -> para public static
    echo "<br>el nombre del alumno es: ".$alumno1->get_nombre()." y esta matriculado en ". Alumno::CICLO . " en curso ". Alumno::get_curso();
    Alumno::set_curso("segundo");//modificar el valor de una variable static
    echo "<br>el nombre del alumno es: ".$alumno1->get_nombre()." y esta matriculado en ". Alumno::CICLO . " en curso ". Alumno::get_curso();

    echo "<br><br><br>";
    $alumno2 = new Repetidor("BBDD","Manuel","Velasco");
    print_r($alumno2);
    
    echo "<br><br><br>";
    var_dump($alumno2);


    echo "<br><br><br>";
    $alumno2->set_nombre("pepe");
    var_dump($alumno2);



?>