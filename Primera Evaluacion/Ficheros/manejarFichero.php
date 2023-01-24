<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
</head>
<body>
    <p> Operacion de Lectura</p>
    <?php
        /*
            1. fopen("ruta","permisos");
            2. validar fopen abrio el fichero correctamente
            3. leer fichero -> fread(variable donde guardo el fopen, cantidad de bits a leer)
                para mostrar todo el contenido se pone filesize("fichero")
            4. escribir fichero -> fwrite(donde voy a escribir, lo que quiero escribir)
            5. fof -> final de fichero
            6. fclose ->cerrar el archivo
        */

        $archivo = fopen("ficheroPrueba.txt","r+b");

        if (!$archivo) {
            echo "error al abrir el fichero";
        }

       $cadena = fread($archivo,filesize("ficheroPrueba.txt"));
        

        fwrite($archivo, "pero es buena gente");

        /*echo $cadena;

        $archivo2 = fopen("ficheroPrueba.txt","r");

        $cadena2 = fread($archivo2,filesize("ficheroPrueba.txt"));
        echo $cadena2;

        */
        echo "</br>------------------------------------</br>";

       // $pagina = file_get_contents("http://google.com/");
       // echo $pagina;

       $aCadena = file("ficheroPrueba.txt");
       print_r($aCadena);


       echo "</br>------------------------------------</br>";

       rewind($archivo);
       while (feof($archivo) == false) {
        echo fgets($archivo);
       }

       fclose($archivo);
    ?>
</body>
</html>