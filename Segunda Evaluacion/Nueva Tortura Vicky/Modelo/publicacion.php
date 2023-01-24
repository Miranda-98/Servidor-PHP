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
        {
            $cone = $this->conexion;

            //obtener todas las publicaciones
            $sql = "SELECT id, tipo, zona, direccion, ndormitorios, precio, tamano, extras, observaciones, fecha_anuncio FROM ".self::$TABLA;
            $publicaciones = $cone->query($sql);
            foreach($publicaciones as $fila) {
                echo "<tr>
                        <td><a href=''>Borrar</a><br/><a href=''>Modificar</a></td>
                        <td>" . $fila['id'] . "</td>
                        <td>" . $fila['tipo'] . "</td>
                        <td>" . $fila['zona'] . "</td>
                        <td>" . $fila['direccion'] . "</td>
                        <td>" . $fila['ndormitorios'] . "</td>
                        <td>" . $fila['precio'] . "</td>
                        <td>" . $fila['tamano'] . "</td>
                        <td>" . $fila['extras'] . "</td>
                        <td>" . $fila['observaciones'] . "</td>
                        <td>" . $fila['fecha_anuncio'] . "</td>
                    </tr>";
            }


        }
    }


    $publi = new Publicacion('inmobiliaria');
    $publi->crearAnuncio('Piso', 'Centro', 'artesanos', '2', 200000, 150, 'Garage', 'no hay observaciones', '2023-01-23');
    // $publi->crearAnuncio(11,"Piso","Centro","artesanos","2",20000,150,"Garage","no hay observaciones","2023-01-23");
?>