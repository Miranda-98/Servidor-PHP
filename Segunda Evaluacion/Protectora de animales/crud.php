<?php   
    require "conexion.php";

    abstract class Crud extends Conexion {
        private $tabla;
        private $con;

        function __construct($tabla, $con)
        {   
            $this->tabla = $tabla;
            $this->con = parent::__construct("animales","localhost","root","");
        }

        function get_tabla(){
            return $this->tabla;
        }

        function set_tabla($tabla){
            $this->tabla=$tabla;
        }

        function get_conexion(){
            return $this->conexion;
        }

        // no lo quiero para que no me puedan cambiar la conexion a la bbdd
        function set_conexion($conexion){
            $this->conexion=$conexion;
        }



        function obtieneTodos(){
            try{
                $conn=parent::conectar();
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql= "SELECT * FROM $this->tabla ";//concatenar con get_tabla
                $stmt = $conn->prepare($sql);
                $stmt->execute();
                $registros=$stmt->fetchAll(PDO::FETCH_OBJ);
                return($registros);

            } catch (PDOException $e) {
                echo "Error al obtener todos " . $e->getMessage();
            }

        }

        function obtieneID($id){
            try{
                $conn = parent::conectar();
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                //comprobar que el id existe
                //si existe se muestra la informacion relacionada
                $sqlComprobar = "SELECT COUNT(*) as 'cantidad' from $this->tabla where id = $id";//concatenar con get_tabla
                $resultado = $conn->query($sqlComprobar);
                $num = $resultado->fetch();
                if($num['cantidad']>0) {
                    $sql= "SELECT * FROM $this->tabla WHERE id = $id ";
                    $stmt = $conn->prepare($sql);
                    $stmt->execute();
                    $registros=$stmt->fetchAll(PDO::FETCH_OBJ);
                    return($registros);
                } else {//si no existe muestra un mensaje
                    echo "No existe el id indicado en la tabla " . $this->tabla;
                }
  
            } catch (PDOException $e) {
                echo "Error al obtener todos " . $e->getMessage();
            }
        }

        function borrarID($id){
            try{
                $conn = parent::conectar();
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                //comprobar que el id existe
                //si existe se muestra la informacion relacionada
                $sqlComprobar = "SELECT COUNT(*) as 'cantidad' from $this->tabla where id = $id";
                $resultado = $conn->query($sqlComprobar);
                $num = $resultado->fetch();
                if($num['cantidad']>0) {
                    $sql= "DELETE FROM $this->tabla WHERE id = $id";
                    $stmt = $conn->prepare($sql);
                    $stmt->execute();
                    echo $id ." eliminado correctamente de la tabla " .$this->tabla;
                } else {//si no existe muestra un mensaje
                    echo "No existe el id indicado en la tabla " . $this->tabla;
                }
  
            } catch (PDOException $e) {
                echo "Error al obtener todos " . $e->getMessage();
            }
        }

        abstract function crear();
        abstract function actualizar();

        function Create(){

        }

        function Update(){
            
        }

        function Read(){
            
        }

        function Delete(){
            
        }
    }

    class PruebaCrud extends Crud{
        function crear()
        {
            $this->crear();
        }

        function actualizar()
        {
            $this->actualizar();
        }
    }

    echo "<br/>script crud.php<br/>";
    $x = new Conexion("animales", "localhost", "root", "");
    $pruebaCrud = new PruebaCrud('animales', $x);
    $pruebaCrud2 = new PruebaCrud('adopciones', $x);

    echo "<pre>";
    print_r($pruebaCrud);
    echo "</pre>";
    
    echo "<h2>Obtiene Todos</h2>";
    $resultadoObitneTodos = $pruebaCrud->obtieneTodos();
    echo "<pre>";
    var_dump($resultadoObitneTodos);
    echo "</pre>";
    

    echo "<h2>Obtiene ID</h2>";
    $resultadoObtieneID = $pruebaCrud->obtieneID('1');
    echo "<pre>";
    var_dump($resultadoObtieneID);
    echo "</pre>";

    echo "<h2>Borrar ID</h2>";
    $resultadoBorrarID = $pruebaCrud->borrarID('9');
    echo "<pre>";
    var_dump($resultadoBorrarID);
    echo "</pre>";

    echo "<h2>Obtiene Todos Adopciones</h2>";
    $resultadoObitneTodos = $pruebaCrud2->obtieneTodos();
    echo "<pre>";
    var_dump($resultadoObitneTodos);
    echo "</pre>";

    echo "<h2>Borrar ID Adopciones</h2>";
    $resultadoBorrarID = $pruebaCrud2->borrarID('9');
    echo "<pre>";
    var_dump($resultadoBorrarID);
    echo "</pre>";

    echo "<h2>Obtiene Todos Adopciones</h2>";
    $resultadoObitneTodos = $pruebaCrud2->obtieneTodos();
    echo "<pre>";
    var_dump($resultadoObitneTodos);
    echo "</pre>";
?>