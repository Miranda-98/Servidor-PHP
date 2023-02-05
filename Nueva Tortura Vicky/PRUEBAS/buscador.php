<?php
//     class Buscador
//     {
//         private $tipo, $zona, $nHabitaciones, $precio, $extras;

//         public function __construct($tipo, $zona, $nHabitaciones, $precio, $extras)
//         {
//             $this->tipo = $tipo;
//             $this->zona = $zona;
//             $this->nHabitaciones = $nHabitaciones;
//             $this->precio = $precio;
//             $this->extras = $extras;
//         }

//         public function getTipo()
//         {
//             return $this->tipo;
//         }

//         public function getZona()
//         {
//             return $this->zona;
//         }

//         public function getnHabitaciones()
//         {
//             return $this->nHabitaciones;
//         }

//         public function getPrecio()
//         {
//             return $this->precio;
//         }

//         public function getExtras()
//         {
//             return $this->extras;
//         }
//     }

//     class Builder_Buscador
//     {
//         private $tipo, $zona, $nHabitaciones, $precio, $extras;

//         public function setTipo($tipo)
//         {
//             $this->tipo = $tipo;
//             return $this;
//         }

//         public function setZona($zona)
//         {
//             $this->zona = $zona;
//             return $this;
//         }

//         public function setHabitaciones($nHabitaciones)
//         {
//             $this->nHabitaciones = $nHabitaciones;
//             return $this;
//         }

//         public function setPrecio($precio)
//         {
//             $this->precio = $precio;
//             return $this;
//         }

//         public function setExtras($extras)
//         {
//             $this->extras = $extras;
//             return $this;
//         }


//         public function build()
//         {
//             return new Buscador($this->tipo, $this->zona, $this->nHabitaciones, $this->precio, $this->extras);
//         }
//     }

//     if (isset($_GET['tipo']) && !empty($_GET['tipo']))
//         $tipo =  $_GET['tipo'];

//     if (isset($_GET['zona']))
//         $zona =  $_GET['zona'];

//     if (isset($_GET['nHabitaciones']))
//         $nHabitaciones = $_GET['nHabitaciones'];

//     if (isset($_GET['precio']))
//         $precio = $_GET['precio'];

//     if (isset($_GET['extras']) && empty($_GET['extras'])){
//         $extras =  $_GET['extras'];

//     }

// echo $extras;

//     $busqueda = (new Builder_Buscador())->setTipo($tipo)->setZona($zona)->setHabitaciones($nHabitaciones)->setPrecio($precio)->setExtras($extras);

//     echo "<pre>";
//     var_dump($busqueda);
//     echo "</pre>";

require '../Modelo/conexion.php';
    try{


// $sql = "SELECT * FROM viviendas WHERE";

// if (isset($_GET['tipo'])) {

//     $tipo =  $_GET['tipo'];

//     $sql = $sql . " tipo = '$tipo'";
// }


// if (isset($_GET['zona'])) {
//     $zona =  $_GET['zona'];
//     $sql = $sql . " AND zona = '$zona'";
// }

// if (isset($_GET['nHabitaciones'])) {
//     $nHabitaciones = $_GET['nHabitaciones'];
//     $sql = $sql . " AND ndormitorios = '$nHabitaciones'";
// }


// if (isset($_GET['precio'])) {
//     $precio = $_GET['precio'];
//     $sql = $sql . " AND precio = '$precio'";
//     // $sql = $sql . " AND precio = 10000";
// }

// echo "<br/><br/><br/>";

// if(isset($_GET['buscar'])){
    
//     if(isset($_GET['piscina'])){
//         $ex = $_GET['piscina'];
//     } 
//     if(isset($_GET['jardin'])){
//         $ex = $ex . "," . $_GET['jardin'];
//     }
//     if(isset($_GET['garage'])){
//         $ex = $ex . "," . $_GET['garage'];
//     }

//     $sql = $sql . " AND extras = '$ex";
//     $sql = $sql . "'";
// }

// if (isset($_GET['extras'])) {
//     $extras =  $_GET['extras'];
//     $sql = $sql . " AND extras = '$extras'";
// }

    if(isset($_GET['buscar'])) {
        $sql = "SELECT * FROM viviendas WHERE ";
        //comprobar el tipo de piso
        if(isset($_GET['tipo']))
            $sql = $sql . " tipo = '" . $_GET['tipo'] ."'";
    }



    $c = new Conexion('inmobiliaria');
    $conecta = $c->conectar();
    $conecta->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo $sql;
    $result = $conecta ->query($sql);
    

    echo "<table border=solid black 1px>
        <th colspan=11>TABLA CLIENTE</th>
                    <tr>
                        <td>ID</td>
                        <td>TIPO</td>
                        <td>ZONA</td>
                        <td>DIRECCION</td>
                        <td>DORMITORIOS</td>
                        <td>PRECIO</td>
                        <td>TAMAÑO</td>
                        <td>EXTRAS</td>
                        <td>OBSERVACIONES</td>
                        <td>FECHA ANUNCIO</td>
                    </tr>";

    foreach ($result as $fila) {
        echo " <tr>
            <td>" . $fila['id'] . "</td>",
            "<td>" . $fila['tipo'] . "</td>",
            "<td>" . $fila['zona'] . "</td>",
            "<td>" . $fila['direccion'] . "</td>",
            "<td>" . $fila['ndormitorios'] . "</td>",
            "<td>" . $fila['precio'] . "</td>",
            "<td>" . $fila['tamano'] . "</td>",
            "<td>" . $fila['extras'] . "</td>",
            "<td>" . $fila['observaciones'] . "</td>",
            "<td>" . $fila['fecha_anuncio'] . "</td></tr>";
    }

    echo "</table>";
} catch (PDOException $e) {
    echo "<br/> ERROR AL BUSCAR VIVIENDA " . $e->getMessage();
}
?>