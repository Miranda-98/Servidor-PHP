<?php
    require 'conexion.php';
    class Publicacion extends Conexion
    {
        private $conexion, $id, $tipo, $zona, $direccion, $ndormitorios, $precio, $tamano, $extras, $observaciones, $fecha_anuncio;
        public static $TABLA = 'viviendas';

        function __construct($conexion)
        {
            // $this->id = $id;
            // $this->tipo = $tipo;
            // $this->zona = $zona;
            // $this->direccion = $direccion;
            // $this->ndormitorios = $ndormitorios;
            // $this->precio = $precio;
            // $this->tamano = $tamano;
            // $this->extras = $extras;
            // $this->observaciones = $observaciones;
            // $this->fecha_anuncio = $fecha_anuncio;
            parent::__construct($conexion);
            $this->conexion = parent::conectar();
        }

        function crearAnuncio($tipo, $zona, $direccion, $ndormitorios, $precio, $tamano, $extras, $observaciones, $fecha_anuncio){
            try{
                $cone = $this->conexion;
                
                //obtener el ultimo id existente para que la nueva publicacion vaya a continucacion de este
                $sqlID="SELECT MAX(id) from " . self::$TABLA;
                $stmtID = $cone->prepare($sqlID);
                $stmtID->execute();
                $ultimoID=$stmtID->fetch();
                $id = $ultimoID[0]+1;
                echo "pepe ".$ultimoID[0];
                
                
                //ahora que ya tenemos el ultimo id, se crea la nueva publicacion
                $sqlPublicacion = "INSERT INTO viviendas (id, tipo, zona, direccion, ndormitorios, precio, tamano, extras, observaciones, fecha_anuncio) 
                    VALUES (:A, :B, :C, :D, :E, :F, :G, :H, :I, :J)";
                $stmt = $cone->prepare($sqlPublicacion);
                $stmt->bindParam(':A', $id);
                $stmt->bindParam(':B', $tipo);
                $stmt->bindParam(':C', $zona);
                $stmt->bindParam(':D', $direccion);
                $stmt->bindParam(':E', $ndormitorios);
                $stmt->bindParam(':F', $precio);
                $stmt->bindParam(':G', $tamano);
                $stmt->bindParam(':H', $extras);
                $stmt->bindParam(':I', $observaciones);
                $stmt->bindParam(':J', $fecha_anuncio);
                $stmt->execute();
                echo "<br/>nueva publicacion creada";
            } catch (PDOException $e) {
                echo "<br/>ERROR AL CREAR PUBLICACION " . $e;
            }
        }

        function eliminarAnuncio($id)
        {
            try{
                $cone = $this->conexion;
                $sql = "DELETE FROM " . self::$TABLA . " WHERE id = :A";
                $stmt = $cone->prepare($sql);
                $stmt->bindParam(':A', $id);
                $stmt->execute();
            } catch (PDOException $e) {
                echo "<br/>ERROR AL BORRAR PUBLICACION " . $e;
            }
            

        }

        function mostraDatosPublicaciones()
        {// mostrar datos publicaciones sin foto pero con paginacion
            $cone = $this->conexion;

            $limite = 5;

            /*
                Si pgnActual no existe mostramos la primera pagina de registros
                Si pgnActual si existe mostramos la pagina de registros correspondiente
            */
            if(isset($_GET['pgnActual'])){
                if($_GET['pgnActual']==1){
                    header("Location:../Vista/paginaPublicaciones.php");
                } else {
                    $paginaActual = $_GET['pgnActual'];
                }
            } else {
                $paginaActual = 1;
            }

             // formula para la páginacino
            $paginacion = ($paginaActual-1) * $limite;


            // sql con fotos
            /*
            $sql = "SELECT viviendas.id as total_id, viviendas.tipo, viviendas.zona, viviendas.direccion, viviendas.ndormitorios, viviendas.precio, 
            viviendas.tamano, viviendas.extras, fotos.foto, viviendas.observaciones, viviendas.fecha_anuncio FROM " . self::$TABLA . " INNER JOIN fotos WHERE viviendas.id = fotos.id_vivienda
            ORDER BY viviendas.fecha_anuncio DESC";
            */
            
            // sql sin fotos
            $sql = "SELECT viviendas.id as total_id, viviendas.tipo, viviendas.zona, viviendas.direccion, viviendas.ndormitorios, viviendas.precio, 
            viviendas.tamano, viviendas.extras, viviendas.observaciones, viviendas.fecha_anuncio FROM " . self::$TABLA . " LIMIT $paginacion,$limite";
            echo $sql;
            // en num se guardan la cantidad de registros para luego crear la cantidad de páginas necesarioas
            $nRegistros = $cone->query($sql);
            $num = $nRegistros->fetch();

            // se almacena los registros
            $publicaciones = $cone->query($sql);


            foreach($publicaciones as $fila) {
                $idSeleccionado = $fila['total_id'];

                echo "<tr>
                        <td><button id='borrar'>BORRAR</button></td>
                        <td><a href='../Controlador/cont_publicaciones.php?id=$idSeleccionado&valor=borrar'>Borrar</a><br/><a href=''>Modificar</a></td>
                        <td>" . $fila['total_id'] . "</td>
                        <td>" . $fila['tipo'] . "</td>
                        <td>" . $fila['zona'] . "</td>
                        <td>" . $fila['ndormitorios'] . "</td>
                        <td>" . $fila['precio'] . "</td>
                        <td>" . $fila['tamano'] . "</td>
                        <td>" . $fila['extras'] . "</td>";
                        // <td> <img src=../img/" . $fila['foto'] ."></td>
                        echo "<td>" . $fila['observaciones'] . "</td>
                        <td>" . $fila['fecha_anuncio'] . "</td>
                    </tr>";
            }

            /*
                crear las páginas según la cantidad de registros existentes y la cantidad
                de datos a mostrar por página, el ceil redondea a la alza(para que cuando
                no se lleguen a la cantidad de registos minimo por pagina se muestren los
                sobrantes para no perderlos)
                el if es pura mariconada para estetica
            */
            for ($i=1; $i <= ceil($num['total_id']/$limite); $i++) { 
                if($i<ceil($num['total_id']/$limite))
                    echo "<a href='?pgnActual=".$i."'>".$i."</a> - ";
                else 
                    echo "<a href='?pgnActual=".$i."'>".$i."</a> ";
            } 

        }

        function mostraDatosPublicacionesPaginacionSI()
        {
            $cone = $this->conexion;

            $limite = 5;

            /*
                Si pgnActual no existe mostramos la primera pagina de registros
                Si pgnActual si existe mostramos la pagina de registros correspondiente
            */
            if(isset($_GET['pgnActual'])){
                if($_GET['pgnActual']==1){
                    header("Location:publicaciones.php");
                } else {
                    $paginaActual = $_GET['pgnActual'];
                }
            } else {
                $paginaActual = 1;
            }

             // formula para la páginacino
            $paginacion = ($paginaActual-1) * $limite;

            // sql para obtener los registros
            //$sqlPaginacion = "SELECT * FROM viviendas LIMIT $paginacion,$limite";
            
            // sql con fotos 
            /*
            $sql = "SELECT viviendas.id as total_id, viviendas.tipo, viviendas.zona, viviendas.direccion, viviendas.ndormitorios, viviendas.precio, 
            viviendas.tamano, viviendas.extras, fotos.foto, viviendas.observaciones, viviendas.fecha_anuncio FROM viviendas INNER JOIN fotos WHERE viviendas.id = fotos.id_vivienda ORDER BY viviendas.fecha_anuncio DESC LIMIT $paginacion,$limite";
            */

            // sql sin fotos
            
                $sql = "SELECT viviendas.id as total_id, viviendas.tipo, viviendas.zona, viviendas.direccion, viviendas.ndormitorios, viviendas.precio, 
                viviendas.tamano, viviendas.extras, viviendas.observaciones, viviendas.fecha_anuncio FROM " . self::$TABLA . " LIMIT $paginacion,$limite";
            
            echo $sql;

            // sql cantidad de registros
            $sqlPaginacion = "SELECT COUNT(*) AS 'total_id' from viviendas /*INNER JOIN fotos WHERE viviendas.id = fotos.id_vivienda*/";
            

            //obtener todas las publicaciones
            // SELECT * FROM viviendas
	        // INNER JOIN fotos WHERE viviendas.id = fotos.id_vivienda
            // $sql = "SELECT id, tipo, zona, direccion, ndormitorios, precio, tamano, extras, observaciones, fecha_anuncio FROM ".self::$TABLA;
            /*$sql = "SELECT viviendas.id as total_id, viviendas.tipo, viviendas.zona, viviendas.direccion, viviendas.ndormitorios, viviendas.precio, 
                viviendas.tamano, viviendas.extras, fotos.foto, viviendas.observaciones, viviendas.fecha_anuncio FROM " . self::$TABLA . " INNER JOIN fotos WHERE viviendas.id = fotos.id_vivienda
                ORDER BY viviendas.fecha_anuncio DESC";*/
            $publicaciones = $cone->query($sql);

            // en num se guardan la cantidad de registros para luego crear la cantidad de páginas necesarioas
            $nRegistros = $cone->query($sqlPaginacion);
            $num = $nRegistros->fetch();
            echo "<br/> " . $num['total_id'];

            echo "<table border=solid black 1px>
                <th colspan=11>TABLA VIVIENDAS</th>
                            <tr>
                                <td>ID</td>
                                <td>TIPO</td>
                                <td>ZONA</td>
                                <td>DIRECCION</td>
                                <td>DORMITORIOS</td>
                                <td>PRECIO</td>
                                <td>TAMAÑO</td>
                                <td>EXTRAS</td>
                                <td>FOTOS</td>
                                <td>OBSERVACIONES</td>
                                <td>FECHA ANUNCIO</td>
                            </tr>";
            foreach($publicaciones as $fila) {
                $idSeleccionado = $fila['total_id'];

                echo "<tr>
                        <td><button id='borrar'>BORRAR</button></td>
                        <td><a href='../Controlador/cont_publicaciones.php?id=$idSeleccionado&valor=borrar'>Borrar</a><br/><a href=''>Modificar</a></td>
                        <td>" . $fila['total_id'] . "</td>
                        <td>" . $fila['tipo'] . "</td>
                        <td>" . $fila['zona'] . "</td>
                        <td>" . $fila['ndormitorios'] . "</td>
                        <td>" . $fila['precio'] . "</td>
                        <td>" . $fila['tamano'] . "</td>
                        <td>" . $fila['extras'] . "</td>
                        <td> <img src=../img/" . $fila['foto'] ."></td>
                        <td>" . $fila['observaciones'] . "</td>
                        <td>" . $fila['fecha_anuncio'] . "</td>
                    </tr>";
            }
            echo "<table/>";
            /*
                crear las páginas según la cantidad de registros existentes y la cantidad
                de datos a mostrar por página, el ceil redondea a la alza(para que cuando
                no se lleguen a la cantidad de registos minimo por pagina se muestren los
                sobrantes para no perderlos)
                el if es pura mariconada para estetica
            */
            for ($i=1; $i <= ceil($num['total_id']/$limite); $i++) { 
                if($i<ceil($num['total_id']/$limite))
                    echo "<a href='?pgnActual=".$i."'>".$i."</a> - ";
                else 
                    echo "<a href='?pgnActual=".$i."'>".$i."</a> ";
            } 


        }

        function filtrarPublicaciones()
        {
            try{
                $sql = '-';

                if(isset($_GET['buscar'])) {
                    $sql = "SELECT * FROM viviendas INNER JOIN fotos
                    WHERE viviendas.id = fotos.id_vivienda AND ";
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
                            $sql = $sql . " AND precio > 300000";
        
                    //recoger los extras del formulario
                    if(!isset($_GET['garage']) && !isset($_GET['piscina']) && !isset($_GET['jardin'])){
                        echo "NO HAY EXTRAS";
        
                    } else {
                        $ex = '';
                        if(isset($_GET['piscina'])){
                            $ex = $_GET['piscina'];
                        } 

                        if(isset($_GET['piscina']) && isset($_GET['jardin'])){
                            $ex = $ex . "," . $_GET['jardin'];
                        } else {
                            $ex = $ex . "". $_GET['jardin'];
                        }

                        if(isset($_GET['garage']) && (isset($_GET['piscina']) || isset($_GET['jardin'])) || isset($_GET['garage'])){
                            $ex = $ex . "," . $_GET['garage'];
                        } else {
                            $ex = $ex . "". $_GET['garage'];
                        }
                    
                        $sql = $sql . " AND extras = '$ex";
                        $sql = $sql . "' ";
                    }
                
                }
        
        
        
            $c = new Conexion('inmobiliaria');
            $conecta = $c->conectar();
            $conecta->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo $sql;
            $result = $conecta->query($sql);
        
        
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
        }


        function tablaFotos(){
            $cone = $this->conexion;
            $sql = "SELECT * FROM fotos ORDER BY id_vivienda";
            $publicaciones = $cone->query($sql);
            $array = $publicaciones->fetchAll(PDO::FETCH_ASSOC);
            echo "<pre>";
            print_r($array);
            echo "</pre>";
            // echo "<table border: solid black 1px>";
            // foreach($publicaciones as $fila) {
            //     echo "s<style>img{width:100px;heigth:100px}</style>";
            //     echo "<tr>
            //             <td>" . $fila['id'] . "</td>
            //             <td>" . $fila['id_vivienda'] . "</td>
            //             <td> <img src=../img/" . $fila['foto'] ."></td>
            //         </tr>";
            // }
            // echo "<table/>";
        }


    }

































    //$tipo, $zona, $direccion, $ndormitorios, $precio, $tamano, $extras, $observaciones, $fecha_anuncio
    $publi = new Publicacion('inmobiliaria');
    $publi->tablaFotos();
    //$publi->mostraDatosPublicacionesPaginacionSI();
    //$publi->mostraDatosPublicaciones();
    // $publi->crearAnuncio('Piso', 'Centro', 'aaaa', '1', 90000, 150, 'Piscina', 'no hay observaciones', '2023-01-23');
    // $publi->crearAnuncio('Piso', 'Centro', 'aaaa', '1', 100000, 150, 'Piscina', 'no hay observaciones', '2023-01-23');
    // $publi->crearAnuncio('Piso', 'Centro', 'aaaa', '1', 120000, 150, 'Garage', 'no hay observaciones', '2023-01-23');
    // $publi->crearAnuncio('Piso', 'Centro', 'aaaa', '1', 140000, 150, 'Garage', 'no hay observaciones', '2023-01-23');
    // $publi->crearAnuncio('Piso', 'Centro', 'aaaa', '1', 160000, 150, 'Jardin', 'no hay observaciones', '2023-01-23');
    // $publi->crearAnuncio('Piso', 'Centro', 'aaaa', '1', 200000, 150, 'Jardin', 'no hay observaciones', '2023-01-23');
    // $publi->crearAnuncio('Piso', 'Centro', 'aaaa', '1', 220000, 150, 'Piscina,Garage', 'no hay observaciones', '2023-01-23');
    // $publi->crearAnuncio('Piso', 'Centro', 'aaaa', '1', 250000, 150, 'Piscina,Garage', 'no hay observaciones', '2023-01-23');
    // $publi->crearAnuncio('Piso', 'Centro', 'aaaa', '1', 300000, 150, 'Piscina,Jardin', 'no hay observaciones', '2023-01-23');
    
    
    // $publi->crearAnuncio('Piso', 'Centro', 'aaaa', '1', 250000, 150, 'Piscina,Garage,Jardin', 'no hay observaciones', '2023-01-23');
    // $publi->crearAnuncio('Piso', 'Centro', 'aaaa', '1', 300000, 150, 'Piscina,Jardin', 'no hay observaciones', '2023-01-23');
    // $publi->crearAnuncio('Piso', 'Centro', 'aaaa', '1', 300000, 150, 'Jardin,Garage', 'no hay observaciones', '2023-01-23');


    // $publi->crearAnuncio('Piso', 'Centro', 'aaaa', '1', 320000, 150, 'Piscina,Jardin', 'no hay observaciones', '2023-01-23');
    // $publi->crearAnuncio('Piso', 'Centro', 'aaaa', '1', 350000, 150, 'Garage,Jardin', 'no hay observaciones', '2023-01-23');
    // $publi->crearAnuncio('Piso', 'Centro', 'aaaa', '1', 340000, 150, 'Garage,Jardin', 'no hay observaciones', '2023-01-23');
    // $publi->crearAnuncio(11,"Piso","Centro","artesanos","2",20000,150,"Garage","no hay observaciones","2023-01-23");
?>