<?php
// clas que ofrece el metodo que ofrecemos como servicio

class Inmobiliaria
{
    function mostrar($a)
    {
        try {
            $conn = new PDO("mysql:host=localhost;dbname=inmobiliaria;charset=utf8", 'root', '');
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //echo "conexion exitosa";

            $sql = "SELECT id, tipo, zona, direccion, ndormitorios, precio, tamano, extras, observaciones, fecha_anuncio FROM viviendas WHERE zona = :A";

            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':A', $a);
            $stmt->execute();
            $registros=$stmt->fetchAll(PDO::FETCH_OBJ);

            // $publicaciones = $conn->query($sql);
            echo "<style> table, td{border:solid black 1px;}</style>";
            echo "<table>";
            

            return $registros;
        } catch (PDOException $e) {
            echo "Error al conectar a la base de datos: " . $e->getMessage();
        }
    }

    function cantidad($a)
    {
        $conn = new PDO("mysql:host=localhost;dbname=inmobiliaria;charset=utf8", 'root', '');
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //echo "conexion exitosa";

        $sql = "SELECT count(id) as 'cantidad' FROM viviendas WHERE zona = :A";

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':A', $a);
        $stmt->execute();
        $registros=$stmt->fetch();

        // $publicaciones = $conn->query($sql);
        echo "<style> table, td{border:solid black 1px;}</style>";
        echo "<table>";
        

        return $registros;
    }
}
