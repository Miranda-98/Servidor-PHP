<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscador</title>
</head>
<body>
    <form method="get" action="">
        <fieldset>
            <legend>Introduzca los datos de las viviendas a buscar</legend>
            <label>Tipo de vivienda: </label>
            <select name="tipo">
                <option name="piso" value="piso">Piso</option>
                <option name="adosado" value="adosado">Adosado</option>
                <option name="chalet" value="chalet">Chalet</option>
                <option name="casa" value="casa">Casa</option>
            </select><br>

            <label>Zona:</label>
            <select name="zona">
                <option name="centro" value="centro">Centro</option>
                <option name="norte" value="norte">Norte</option>
                <option name="sur" value="sur">Sur</option>
                <option name="este" value="este">Este</option>
                <option name="oeste" value="oeste">Oeste</option>
            </select><br>

            <label>Número de dormitorios:</label>
            <input type="radio" id="1" name="nHabitaciones" value="1">
            <label>1</label>
            <input type="radio" id="2" name="nHabitaciones" value="2">
            <label>2</label>
            <input type="radio" id="3" name="nHabitaciones" value="3">
            <label>3</label>
            <input type="radio" id="4" name="nHabitaciones" value="4">
            <label>4</label><br>

            <label>Precio:</label>
            <input type="radio" id="precio1" name="precio" value="&lt100000">
            <label>&lt100000</label>
            <input type="radio" id="precio2" name="precio" value="100000-200000">
            <label>100000-200000</label>
            <input type="radio" id="precio3" name="precio" value="200000-300000">
            <label>200000-300000</label>
            <input type="radio" id="precio4" name="precio" value="&gt300000">
            <label>&gt300000</label><br>    


            <label>Extras:</label>
            <input type="checkbox" id="piscina" name="piscina" value="Piscina">
            <label>Piscina</label>
            <input type="checkbox" id="jardin" name="jardin" value="Jardin">
            <label>Jardin</label>
            <input type="checkbox" id="garage" name="garage" value="Garage">
            <label>Garage</label><br>

            <input type="submit" name="buscar" value="Buscar">
        </fieldset>
    </form>
</body>
</html>
<?php
require '../Modelo/conexion.php';
    try{

    if(isset($_GET['buscar'])) {
        $sql = "SELECT * FROM viviendas WHERE ";
        //recoger el tipo de piso del formulario
        if(isset($_GET['tipo']))
            $sql = $sql . " tipo = '" . $_GET['tipo'] ."'";

        //recoger la zona del formulario
        if(isset($_GET['zona']))
            $sql = $sql . " AND zona = '" . $_GET['zona'] ."'";

        //recoger el número de habitaciones del formulario
        if(isset($_GET['nHabitaciones']))
            $sql = $sql . " AND ndormitorios = '" . $_GET['nHabitaciones'] ."'";

        //recoger el precio del formulario
        if(isset($_GET['precio']))
            if($_GET['precio'] < 100000)
                $sql = $sql . " AND precio < 100000";
            else if($_GET['precio'] >= 100000 && $_GET['precio'] < 200000)
                $sql = $sql . " AND precio BETWEEN 100000 AND 200000";
            else if($_GET['precio'] >= 200000 && $_GET['precio'] < 300000)
                $sql = $sql . " AND precio BETWEEN 200000 AND 300000";
            else    
                $sql = $sql . " AND precio > 100000";

        //recoger los extras del formulario
        if(!isset($_GET['garage']) && !isset($_GET['piscina']) && !isset($_GET['jardin'])){
            echo "NO HAY EXTRAS";

        } else {
            if(isset($_GET['piscina'])){
                $ex = $_GET['piscina'];
            } 
            if(isset($_GET['piscina']) && isset($_GET['jardin'])){
                $ex = $ex . "," . $_GET['jardin'];
            } else {
                $ex = $ex . "". $_GET['jardin'];
            }
            if(isset($_GET['garage']) && (isset($_GET['piscina']) || isset($_GET['jardin']))){
                $ex = $ex . "," . $_GET['garage'];
            } else {
                $ex = $ex . "". $_GET['garage'];
            }
        
            $sql = $sql . " AND extras = '$ex";
            $sql = $sql . "'";
        }
       
    }



    $c = new Conexion('inmobiliaria');
    $conecta = $c->conectar();
    $conecta->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo $sql;
    $result = $conecta  ->query($sql);


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