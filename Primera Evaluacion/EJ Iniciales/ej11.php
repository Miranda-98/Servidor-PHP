<html>

<head> </head>

<body>
    <?php 
        $cadena = "Estamos dando nuestros primeros pasos en programación utilizando el lenguaje php";
        $primera_ocurrencia = "os";
        $boolean;
        echo $cadena."</br>";
        echo "la longitud de la cadena es : ".strlen($cadena)."</br>";
        echo "la primera ocurrencia de 'os' esta en la: ".strpos($cadena, $primera_ocurrencia)." palabra </br>";
        
        if (strpos($cadena, "pepe") >= 0){
            $boolean = TRUE;
        } else {
            $boolean = FALSE;
        }
        echo "la busqueda de la palabra 'nuestros': ".trim(filter_var($boolean, FILTER_VALIDATE_BOOL));
    ?>
</body>