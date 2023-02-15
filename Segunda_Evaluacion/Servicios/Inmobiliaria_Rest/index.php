<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="GET">
        <select name="zona" id="zona">
            <option name="zona" value="Norte">Norte</option>
            <option name="zona" value="Sur">Sur</option>
            <option name="zona" value="Este">Este</option>
            <option name="zona" value="Oeste">Oeste</option>
        </select>

        <input type="submit" name="enviar" value="Enviar">
    </form>
</body>
</html>

<?php
    $url = "http://localhost/practicas_clase/Servidor-PHP/Segunda%20Evaluacion/Servicios/Inmobiliaria_Rest/post.php?zona=".$_GET['zona'];

    $json = file_get_contents($url);
    // echo "<br/>".$json;
    // echo "<br/>----------------------<br/>";
    $data = json_decode($json,true);
    // echo "<pre>";
    // var_dump($data);
    // echo "</pre>";


    echo "<table>"; 
    foreach($data as $d) {
        echo "<tr>
                <td>".$d['id']."</td>
                <td>".$d['tipo']."</td>
                <td>".$d['zona']."</td>
                <td>".$d['direccion']."</td>
                <td>".$d['ndormitorios']."</td>
                <td>".$d['precio']."</td>
                <td>".$d['tamano']."</td>
                <td>".$d['extras']."</td>
                <td>".$d['observaciones']."</td>
                <td>".$d['fecha_anuncio']."</td>
            </tr>";
    }
    echo "</table>";










    
?>