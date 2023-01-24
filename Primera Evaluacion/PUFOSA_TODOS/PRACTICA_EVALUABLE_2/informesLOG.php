<link rel="stylesheet" type="text/css" href="style.css" />

<?php 

    echo "<div id='tabla'>";
    echo "INFORME DE MODIFICACIONES<br/><br/>";
    $archivo = fopen("PUFOSA.txt","a+b");
       while (feof($archivo) == false) {
        echo fgets($archivo)."</br>";
       }
    echo "</div>";
?>