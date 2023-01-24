<html>
    <head> </head>
    <body>
        <?php 
            $pepe = array();
            $contador = 0;
            $i = 0;
            while($contador < 10) {
                if ($i % 2 == 0) {
                    array_push($pepe, $i);
                    $contador++;
                }
                $i++;                
            }


            foreach ($pepe as $coso){
                echo $coso.", ";
            }

            for ($i=0; $i < count($pepe); $i++) { 
                echo $pepe[$i]."\n";
            }

            echo "</br>";
            for ($i=0; $i < count($pepe); $i++) { 
                echo $pepe[$i]."</br>";
            }
        ?>
    </body>
</html>