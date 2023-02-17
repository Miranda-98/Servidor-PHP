<?php
    require 'producto.php';

    class ProductoDAO {
        public function conexion()
        {
            try {
                $conn = new PDO ("mysql:host=localhost;dbname=tienda;charset=utf8",'root','');
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                //echo "conexion exitosa";
                return $conn;
            }catch (PDOException $e){
                echo "Error al conectar a la base de datos: " . $e->getMessage();
            }
        }

        function recuperarProductos()
        {
            try {
                $x = new ProductoDAO();
                $cone = $x->conexion();
                $sql = "SELECT * FROM producto";
                $productos = $cone->query($sql);

                return $productos;
            } catch (PDOException $e) {
                echo "<br/>ERROR AL RECUPERAR USUARIO " . $e->getMessage();
            }
        }

    }
?>