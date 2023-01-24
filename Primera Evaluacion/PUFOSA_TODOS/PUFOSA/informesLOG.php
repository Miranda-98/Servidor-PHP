<?php 
    $archivo = fopen("PUFOSA.txt","r+b");
       while (feof($archivo) == false) {
        echo fgets($archivo)."</br>";
       }
?>