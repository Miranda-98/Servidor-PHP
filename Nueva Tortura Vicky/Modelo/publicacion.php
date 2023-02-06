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

        function crearAnuncio($tipo, $zona, $direccion, $ndormitorios, $precio, $tamano, $extras, $observaciones, $fecha_anuncio, $foto)
        {
            try{
                $cone = $this->conexion;
                
                //obtener el ultimo id existente para que la nueva publicacion vaya a continucacion de este
                $sqlID="SELECT MAX(id) from " . self::$TABLA;
                $stmtID = $cone->prepare($sqlID);
                $stmtID->execute();
                $ultimoID=$stmtID->fetch();
                $id = $ultimoID[0]+1;
                echo "pepe ".$ultimoID[0];

                //obtener el ultimo id de fotos existentes para que la nueva foto vaya a continuacion de este
                $sqlID2="SELECT MAX(id) from fotos";
                $stmtID2 = $cone->prepare($sqlID2);
                $stmtID2->execute();
                $ultimoID2=$stmtID2->fetch();
                $id2 = $ultimoID2[0]+1;
                echo "pepe2 ".$ultimoID2[0];
                
                
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

                $sqlFotos = "INSERT INTO fotos(id, id_vivienda, foto) VALUES ('$id2','$id','$foto')";
                $cone->query($sqlFotos);
                // $stmt2 = $cone->prepare($sqlFotos);
                // $stmt2->bindParam(':A', $id2);
                // $stmt2->bindParam(':B', $id);
                // $stmt2->bindParam(':C', $foto);
                // $stmt2->execute();

                echo "<br/>nueva publicacion creada";
                echo "<script>alert('Publicacion creada');</script>";
                return true;
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
                echo "<script>alert('Publicacion eliminada correctamente')</script>";
            } catch (PDOException $e) {
                echo "<br/>ERROR AL BORRAR PUBLICACION " . $e;
            }
            

        }

        function modificarAnuncio($id,$tipo,$zona,$direccion,$dormitorios,$precio,$tamaño,$extras,$observaciones,$fecha)
        {
            try{
                $b = false;
                $cone = $this->conexion;
                $sql = "UPDATE viviendas SET tipo='$tipo',zona='$zona',direccion='$direccion',ndormitorios='$dormitorios',
                precio='$precio',tamano='$tamaño',extras='$extras',observaciones='$observaciones',fecha_anuncio='$fecha' WHERE id='$id'";
                
                if($cone->query($sql) ){
                    echo "<script>alert('Publicacion modificada correctamente')</script>";
                    // header('location: ../Vista/paginaInicio.php');
                    header('location: ../Vista/paginaInicio.php');
                
                    $b = true;
                }
                echo $b;
                if($b==true){
                    include('location: ../Vista/paginaPublicaciones.php');
                }
            } catch (PDOException $e) {
                echo "<br/>ERROR AL MODIFICAR PUBLICACION " . $e;
            }
        }

        function mostraDatosPublicaciones()
        {
            $cone = $this->conexion;

            $limite = 10;

            /*
                Si pgnActual no existe mostramos la primera pagina de registros
                Si pgnActual si existe mostramos la pagina de registros correspondiente
            */
            if(isset($_GET['pgnActual'])){
                if($_GET['pgnActual']==1){
                    header("Location:paginaInicio.php");
                } else {
                    $paginaActual = $_GET['pgnActual'];
                }
            } else {
                $paginaActual = 1;
            }

            // formula para la páginacino
            $paginacion = ($paginaActual-1) * $limite;


            /*  
                SELECT viviendas.*, GROUP_CONCAT(fotos.foto) AS fotos
                    FROM viviendas
                    LEFT OUTER JOIN fotos ON viviendas.id = fotos.id_vivienda
                    GROUP BY viviendas.id;
            */
            $sql = "SELECT viviendas.id as total_id, tipo, zona, direccion, ndormitorios, precio, tamano, extras, observaciones,
                     fecha_anuncio, GROUP_CONCAT(fotos.foto SEPARATOR ',') AS fotos
                    FROM " . self::$TABLA . " LEFT OUTER JOIN fotos on viviendas.id = fotos.id_vivienda GROUP BY viviendas.id
                    ORDER BY viviendas.fecha_anuncio DESC LIMIT $paginacion,$limite";

            $sqlCantidad = "SELECT COUNT(*) as cantidad FROM (SELECT viviendas.*, GROUP_CONCAT(fotos.foto) AS fotos
              FROM viviendas LEFT OUTER JOIN fotos ON viviendas.id = fotos.id_vivienda GROUP BY viviendas.id ) AS subconsulta";


            $publicaciones = $cone->query($sql);

            // en num se guardan la cantidad de registros para luego crear la cantidad de páginas necesarioas
            $nRegistros = $cone->query($sqlCantidad);
            $num = $nRegistros->fetch();

                    foreach($publicaciones as $fila) {
                    

                    $idSeleccionado = $fila['total_id'];
                    $tipoSeleccionado = $fila['tipo'];
                    $zonaSleccionado = $fila['zona'];
                    $direccionSeleccionada = $fila['direccion'];
                    $nDormitoriosSeleccionados = $fila['ndormitorios'];
                    $precioSeleccionado = $fila['precio'];
                    $tamañoSeleccionado = $fila['tamano'];
                    $extrasSeleccionados = $fila['extras'];
                    $observacionesSeleccionadas = $fila['observaciones'];
                    $fechaSeleccionada = $fila['fecha_anuncio'];

                 
                    $aFotos = explode(',',$fila['fotos']);
                    
                    echo "<tr>
                            <td>
                                <a href='../Controlador/cont_publicaciones.php?id=$idSeleccionado&valor=borrar'>Borrar</a><br/>
                                <a href='../Vista/modificarPublicacion.php?id=$idSeleccionado&tipo=$tipoSeleccionado&zona=$zonaSleccionado
                                &direccion=$direccionSeleccionada&dormitorios=$nDormitoriosSeleccionados&precio=$precioSeleccionado
                                &tamaño=$tamañoSeleccionado&extras=$extrasSeleccionados&observaciones=$observacionesSeleccionadas
                                &fecha=$fechaSeleccionada'>Modificar</a>
                            </td>
                            <td>" . $fila['total_id'] . "</td>
                            <td>" . $fila['tipo'] . "</td>
                            <td>" . $fila['zona'] . "</td>
                            <td>" . $fila['direccion'] . "</td>
                            <td>" . $fila['ndormitorios'] . "</td>
                            <td>" . $fila['precio'] . "</td>
                            <td>" . $fila['tamano'] . "</td>
                            <td>" . $fila['extras'] . "</td>";
                            echo "<td>"; 
                            for($i=0;$i<count($aFotos);$i++){
                                echo "<a href='../img/".$aFotos[$i]."'>" . $aFotos[$i] . "</a><br/>";
                            }
                            echo "</td>";
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
            for ($i=1; $i <= ceil($num['cantidad']/$limite); $i++) { 
                if($i<ceil($num['cantidad']/$limite))
                    echo "<a href='?pgnActual=".$i."'>".$i."</a> - ";
                else 
                    echo "<a href='?pgnActual=".$i."'>".$i."</a> ";
            }  

            return $publicaciones;

        }

        function filtrarPublicaciones()
        {
                try{
            
    
                    if(isset($_REQUEST['buscar'])) {
                        /*
                            la mamalona
            
                            (SELECT viviendas.*, GROUP_CONCAT(fotos.foto) AS fotos
                            FROM viviendas LEFT OUTER JOIN fotos ON viviendas.id = fotos.id_vivienda GROUP BY viviendas.id )
                        */
            
                        $sql = "SELECT viviendas.id as total_id, tipo, zona, direccion, ndormitorios, precio, tamano, extras, observaciones,
                        fecha_anuncio, GROUP_CONCAT(fotos.foto  SEPARATOR ',') AS fotos
                        FROM viviendas LEFT OUTER JOIN fotos ON viviendas.id = fotos.id_vivienda ";
            
                        $sql = $sql . " WHERE ";
            
                        //recoger el tipo de piso del formulario
                        if(isset($_REQUEST['tipo']))
                            $sql = $sql . " tipo = '" . $_REQUEST['tipo'] ."'";
            
                        //recoger la zona del formulario
                        if(isset($_REQUEST['zona']))
                            $sql = $sql . " AND zona = '" . $_REQUEST['zona'] ."'";
            
                        //recoger el número de habitaciones del formulario
                        if(isset($_REQUEST['nHabitaciones']))
                            $sql = $sql . " AND ndormitorios = '" . $_REQUEST['nHabitaciones'] ."'";
            
                        //recoger el precio del formulario
                        if(isset($_REQUEST['precio']))
                            if($_REQUEST['precio'] < 100000)
                                $sql = $sql . " AND precio < 100000";
                            else if($_REQUEST['precio'] >= 100000 && $_REQUEST['precio'] < 200000)
                                $sql = $sql . " AND precio BETWEEN 100000 AND 200000";
                            else if($_REQUEST['precio'] >= 200000 && $_REQUEST['precio'] < 300000)
                                $sql = $sql . " AND precio BETWEEN 200000 AND 300000";
                            else    
                                $sql = $sql . " AND precio > 300000";
            
                        //recoger los extras del formulario
                        if(!isset($_REQUEST['garage']) && !isset($_REQUEST['piscina']) && !isset($_REQUEST['jardin'])){
                             // echo "NO HAY EXTRAS";
            
                        } else {
                            $ex = '';
                            // if(isset($_REQUEST['piscina'])){
                            //     $ex = $_REQUEST['piscina'];
                            // } 
            
                            // if(isset($_REQUEST['piscina']) && isset($_REQUEST['jardin'])){
                            //     $ex = $ex . "," . $_REQUEST['jardin'];
                            // } else {
                            //     $ex = $ex . "". $_REQUEST['jardin'];
                            // }
            
                            // if((isset($_REQUEST['garage']) && (isset($_GET['piscina'])) || isset($_GET['jardin'])) && isset($_GET['garage'])){
                            //     $ex = $ex . "," . $_REQUEST['garage'];
                            // } else {
                            //     $ex = $ex . "". $_REQUEST['garage'];
                            // }
                            // if(!empty($_REQUEST['piscina']) && empty($_REQUEST['jardin'])  && empty($_REQUEST['garaje'])) {
                            //     $ex = $_REQUEST['piscina'];
                            // } else if
            
                            if(isset($_REQUEST['piscina'])){
                                $ex = $_REQUEST['piscina'];
                            } 
                            if(isset($_REQUEST['piscina']) && isset($_REQUEST['jardin'])){
                                $ex = $ex . "," . $_REQUEST['jardin'];
                            } else {
                                $ex = $ex . "". $_REQUEST['jardin'];
                            }
                            if(isset($_REQUEST['garage']) && (isset($_REQUEST['piscina']) || isset($_REQUEST['jardin']))){
                                $ex = $ex . "," . $_REQUEST['garage'];
                            } else {
                                $ex = $ex . "". $_REQUEST['garage'];
                            }
                        
                            $sql = $sql . " AND extras = '$ex'";
                            
                        }
                        $sql = $sql . " GROUP BY viviendas.id ";
                        // echo "<br/><br/> " . $sql ;
            
            
                        $c = new Conexion('inmobiliaria');
                    $conecta = $c->conectar();
                    $conecta->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    // echo '<h1>pepepepepepepepepe</h1>';
                    // echo $sql;
                    $result = $conecta->query($sql);
                
                
                    echo "<style>table,tr,td{border:solid black 1px}img{width: 40px; height: 40px}td{width:100px;}</style>
                    <table>
                        <tr>
                            <td></td>
                            <td></td>
                            <td>id</td>
                            <td>tipo</td>
                            <td>zona</td>
                            <td>nDormitorios</td>
                            <td>precio</td>
                            <td>tamaño</td>
                            <td>extras</td>
                            <td>foto</td>
                            <td>observaciones</td>
                            <td>fecha anuncio</td>
                        </tr>";
                
                        foreach($result as $fila) {
            
                            $idSeleccionado = $fila['total_id'];
            
                        
                            $aFotos = explode(',',$fila['fotos']);
                            
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
                                    echo "<td>"; 
                                    for($i=0;$i<count($aFotos);$i++){
                                        echo "<a href='../img/".$aFotos[$i]."'>" . $aFotos[$i] . "</a><br/>";
                                    }
                                    echo "</td>";
                                    echo "<td>" . $fila['observaciones'] . "</td>
                                    <td>" . $fila['fecha_anuncio'] . "</td>
                                </tr>";    
            
                        }
            
                echo "</table>";
            
                    echo "</table>";
                    
                    }
            
        
                } catch (PDOException $e) {
                    echo "<br/> ERROR AL BUSCAR VIVIENDA " . $e->getMessage();
                }
            
        }


        


    }

































    //$tipo, $zona, $direccion, $ndormitorios, $precio, $tamano, $extras, $observaciones, $fecha_anuncio
    $publi = new Publicacion('inmobiliaria');
    // $publi->mostraDatosPublicaciones();

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