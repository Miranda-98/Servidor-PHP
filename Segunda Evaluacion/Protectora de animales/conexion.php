<?php 
    class Conexion{
        //coger desde fichero
        private $bbdd;
        private $servidor;
        private $usuario;
        private $contraseña;

        function __construct($bbdd, $servidor, $usuario, $contraseña) 
        {
            $this->bbdd=$bbdd;
            $this->servidor=$servidor;
            $this->usuario=$usuario;
            $this->contraseña=$contraseña;
        }

        function get_bbdd(){
            return $this->bbdd;
        }

        function set_bbdd($bbdd){
            $this->bbdd=$bbdd;
        }

        function get_servidor(){
            return $this->servidor;
        }

        function set_servidor($servidor){
            $this->servidor=$servidor;
        }

        function get_usuario(){
            return $this->usuario;
        }

        function set_usuario($usuario){
            $this->usuario=$usuario;
        }

        function get_contraseña(){
            return $this->contraseña;
        }

        function set_contraseña($contraseña){
            $this->contraseña=$contraseña;
        }


        protected function conectar(){
            try {
                $conecta = new PDO("mysql:host=".$this->get_servidor().";dbname=".$this->get_bbdd()."", $this->get_usuario(), $this->get_contraseña());
                $conecta->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                 echo "conexion exitosa";
                // print_r($conecta);
                return $conecta;

            } catch (PDOException $e) {
                echo "conexion fallida: ".$e->getMessage();
            }
            
        }
        
    }

    class PruebaConexion extends Conexion{
        function con(){
            $this->conectar();
        }
    }
    
    $obj = new PruebaConexion("animales", "localhost", "root", "");
    echo "<pre>"; 
    print_r($obj);
    echo "</pre>";

    
    $obj->con();
    echo "<br/>scrip conexion.php<br/>";


    $obj = new PDO("mysql:host=localhost;dbname=animales", 'root', '');
    $obj->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM animales;";

    $result = $obj->query($sql);//almaceno en result lo que devuelve la query 
    foreach($result as $row){
        echo $row[0],
                    $row[1],
                    $row[2],
                    $row[3],
                    $row[4].'<br/>';
    }

    echo "<pre>"; 
    print_r($obj);
    echo "</pre>";
?>