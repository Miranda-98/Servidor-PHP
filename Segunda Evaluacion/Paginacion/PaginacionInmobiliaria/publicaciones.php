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
            viviendas.tamano, viviendas.extras, fotos.foto, viviendas.observaciones, viviendas.fecha_anuncio FROM " . self::$TABLA . " INNER JOIN fotos WHERE viviendas.id = fotos.id_vivienda
            ORDER BY viviendas.fecha_anuncio DESC LIMIT $paginacion,$limite";
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
                        <td>" . $fila['extras'] . "</td>";
                        // <td> <img src=../img/" . $fila['foto'] ."></td>
                        echo "<td>" . $fila['observaciones'] . "</td>
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

    
        function mostraDatosPublicacionesPaginacionSI2()
        {
            $cone = $this->conexion;

            $limite = 5;

            /*
                Si pgnActual no existe mostramos la primera pagina de registros
                Si pgnActual si existe mostramos la pagina de registros correspondiente
            */
            if(isset($_GET['pgnActual'])){
                if($_GET['pgnActual']==1){
                    header("Location:publicacion.php");
                } else {
                    $paginaActual = $_GET['pgnActual'];
                }
            } else {
                $paginaActual = 1;
            }

             // formula para la páginacino
            $paginacion = ($paginaActual-1) * $limite;

            
            // sql con fotos 
            $sql = "SELECT viviendas.id as total_id, viviendas.tipo, viviendas.zona, viviendas.direccion, viviendas.ndormitorios, viviendas.precio, 
            viviendas.tamano, viviendas.extras, fotos.foto, viviendas.observaciones, viviendas.fecha_anuncio FROM viviendas INNER JOIN fotos 
            WHERE viviendas.id = fotos.id_vivienda/* ORDER BY viviendas.fecha_anuncio DESC LIMIT $paginacion,$limite*/";

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

        


    }

































    //$tipo, $zona, $direccion, $ndormitorios, $precio, $tamano, $extras, $observaciones, $fecha_anuncio
    $publi = new Publicacion('inmobiliaria');
    $publi->mostraDatosPublicacionesPaginacionSI2();
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