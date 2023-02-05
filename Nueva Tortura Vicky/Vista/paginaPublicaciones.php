<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Publicaciones</title>
</head>
<style>
    table, td {
        border: solid black 1px;
    }
    img {
        width: 100px;
        height: 100px;
    }
</style>
<body>
    <table>
        <th colspan=12>Tabla Viviendas</th>
        <tr>
            <td> </td>
            <td>ID</td>
            <td>TIPO</td>
            <td>ZONA</td>
            <td>DIRECCION</td>
            <td>Nº Dormitorios</td>
            <td>Precio</td>
            <td>Tamaño</td>
            <td>Extras</td>
            <td>Fotos</td>
            <td>Observaciones</td>
            <td>Fecha anuncio</td>
        </tr>

        <!-- <a href="busquedaPublicaciones.php">Filtrar resultados</a> -->
       

        <?php 
            require_once "../Modelo/publicacion.php";
            $publicacion = new Publicacion('inmobiliaria');
            $publicacion->mostraDatosPublicaciones();

        ?>
            <!-- mostrarTabla()->controlador -->
    </table>
</body>
</html>