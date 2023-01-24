<?php 
    $archivo = fopen("PUFOSA.txt","a+b");
       while (feof($archivo) == false) {
        echo fgets($archivo)."</br>";
       }
?>