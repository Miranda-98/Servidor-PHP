<?php
    // require_once '../Controlador/controlador_vista.php'; 
    // $control_publicacion = new Controlador_Vistas();
    // echo "pepebusqueda22";
    // $control_publicacion->buscadorPublicaciones()

    // require_once '../Controlador/controlador_vista.php';
    // $control = new Controlador_Vistas();
    // if (isset($_REQUEST['valor'])) {
    //     if($_REQUEST['valor'] == 'filtrarResultados')
    //         $control->buscadorPublicaciones();
    // }

    include '../Modelo/conexion.php';
    class pepe{
        function filtrar(){
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
                         echo "NO HAY EXTRAS";
        
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
                    echo "<br/><br/> " . $sql ;
        
        
                    $c = new Conexion('inmobiliaria');
                $conecta = $c->conectar();
                $conecta->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                // echo '<h1>pepepepepepepepepe</h1>';
                // echo $sql;
                $result = $conecta->query($sql);
            
            
                echo "<style>table,tr,td{}img{width: 40px; height: 40px}td{width:100px;}</style>
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

    
    

 
?>