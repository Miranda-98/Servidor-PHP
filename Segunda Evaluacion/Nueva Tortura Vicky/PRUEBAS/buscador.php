<?php
    class Buscador
    {
        private $tipo, $zona, $nHabitaciones, $precio, $extras;

        public function __construct($tipo, $zona, $nHabitaciones, $precio, $extras)
        {
            $this->tipo = $tipo;
            $this->zona = $zona;
            $this->nHabitaciones = $nHabitaciones;
            $this->precio = $precio;
            $this->extras = $extras;
        }

        public function getTipo()
        {
            return $this->tipo;
        }

        public function getZona()
        {
            return $this->zona;
        }

        public function getnHabitaciones()
        {
            return $this->nHabitaciones;
        }

        public function getPrecio()
        {
            return $this->precio;
        }

        public function getExtras()
        {
            return $this->extras;
        }
    }

    class Builder_Buscador
    {
        private $tipo, $zona, $nHabitaciones, $precio, $extras;

        public function setTipo($tipo)
        {
            $this->tipo = $tipo;
            return $this;
        }

        public function setZona($zona)
        {
            $this->zona = $zona;
            return $this;
        }

        public function setHabitaciones($nHabitaciones)
        {
            $this->nHabitaciones = $nHabitaciones;
            return $this;
        }

        public function setPrecio($precio)
        {
            $this->precio = $precio;
            return $this;
        }

        public function setExtras($extras)
        {
            $this->extras = $extras;
            return $this;
        }


        public function build()
        {
            return new Buscador($this->tipo, $this->zona, $this->nHabitaciones, $this->precio, $this->extras);
        }
    }

    if (isset($_POST['tipo']) && !empty($_POST['tipo']))
        $tipo =  $_POST['tipo'];

    if (isset($_POST['zona']))
        $zona =  $_POST['zona'];

    if (isset($_POST['nHabitaciones']))
        $nHabitaciones = $_POST['nHabitaciones'];

    if (isset($_POST['precio']))
        $precio = $_POST['precio'];

    if (isset($_POST['extras']) && empty($_POST['extras'])){
        $extras =  $_POST['extras'];

    }

echo $extras;

    $busqueda = (new Builder_Buscador())->setTipo($tipo)->setZona($zona)->setHabitaciones($nHabitaciones)->setPrecio($precio)->setExtras($extras);

    echo "<pre>";
    var_dump($busqueda);
    echo "</pre>";

        














        // $tipo =  $_POST['tipo'];
        // $zona =  $_POST['zona'];
        // $nHabitaciones = $_POST['nHabitaciones'];
        // $precio = $_POST['precio'];
        // $extras =  $_POST['extras'];

        // $sql = "SELECT * FROM viviendas WHERE";

        // if(isset($tipo)) 
        //     $sql = $sql . " tipo = '$tipo'";


        // if(isset($zona)) 
        //     $sql = $sql . " zona = '$zona'";
        
        // if(isset($nHabitaciones)) 
        //     $sql = $sql . " ndormitorios = '$nHabitaciones'"; 
        
        // if(isset($precio)) 
        //     $sql = $sql . " precio = '$precio'";
        
        // if(isset($extras)) 
        //     $sql = $sql . " extras = '$extras'";

        // echo $sql;
?>