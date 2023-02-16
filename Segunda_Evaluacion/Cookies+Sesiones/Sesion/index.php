<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        session_start();

        // Crear un array y guardarlo en la sesión
        $mi_array = array('manzana', 'banana', 'naranja');
        $_SESSION['frutas'] = $mi_array;


        echo "array -> ";
        print_r($_SESSION['frutas']);
        echo "<br/>";
        
        // Convertir el array en una cadena de texto
        $cadena = serialize($_SESSION['frutas']);
        echo "<br/> serializado -> ";
        echo $cadena;
        echo "<br/>";

        // Convertir la cadena de texto en un array
        $mi_array = unserialize($cadena);
        echo "<br/> desserializado";
        print_r($mi_array);
        echo "<br/>";
        

        // Convertir el array en una cadena de texto JSON
        $cadena2 = json_encode($_SESSION['frutas']);
        echo "<br/> json_encode -> ";
        echo $cadena2;
        echo "<br/>";

        // Convertir la cadena de texto JSON en un array
        $mi_array2 = json_decode($cadena2, true);
        echo "<br/> json_decode -> ";
        print_r($mi_array2);
        echo "<br/>";

        // implode -> convierte array en cadena de texto separado por comas
        $string = implode(',', $_SESSION['frutas']);
        echo "<br/> implode -> ";
        echo $string;
        echo "<br/>";

        // explode -> convierte una cadena de texto en un array
        $array = explode(',', $string);
        echo "<br/> explode -> ";
        print_r($array);
        echo "<br/>";

    ?>
</body>
</html>