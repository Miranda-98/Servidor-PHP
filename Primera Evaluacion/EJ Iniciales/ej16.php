<html>
    <body>
        <?php $v = [array(),array(),array()];
            $filas = 3;
            $columnas = 4;
            $contador = 0;
            $suma = 0;
            
            
           /* $posicion = rand(0,100);
            $v = array();
            
            for ($i=0; $i < 3; $i++) { 
                $v[$i] = rand(0,100);
                echo $v[$i];
            }*/

            

            // matriz fila x columna
            for ($i=0; $i < $filas ; $i++) { 
                for ($j=0; $j < $columnas ; $j++) { 
                    
                    $v[$i][$j] = rand(0,100);
                    
                    if ($j == $columnas-1) {
                        echo $v[$i][$j]."</br>";
                    } else {
                        echo $v[$i][$j].", ";
                    }
                    

                    
                }
            }

            //mayor y menor número de la matriz
            $menor = $v[$i=0][$j=0];
            $mayor = $v[$i=0][$j=0];
            for ($i=0; $i < $filas ; $i++) { 
                for ($j=0; $j < $columnas ; $j++) {
                    if ( $v[$i][$j] < $menor ) {
                        $menor = $v[$i][$j];
                    } 
                    
                    if ( $v[$i][$j] > $mayor) {
                        $mayor = $v[$i][$j];
                    }

                    if ( $v[$i][$j] % 2 != 0 ) {
                        //media numeros impares
                        $contador++;
                        $suma = $v[$i][$j] + $suma;
                    }
                }
            } 
            
            $media = $suma / $contador;

            echo "el menor elemento es $menor y el mayor elemento es $mayor </br>";
            echo "la media de los numeros impares es $media</br>";

            for ($i=0; $i < $filas ; $i++) { 
                for ($j=0; $j < $columnas ; $j++) {
                    if ( $i == $j ) {
                        echo $v[$i][$j];
                    } else if ($j == $columnas-1) {
                        echo "</br>";
                    } else {
                        echo '&nbsp','&nbsp','&nbsp';
                    }
                }
            }

            echo "-------------------------------------- </br>";
            for ($i=0; $i < $filas ; $i++) { 
                for ($j=0; $j < $columnas ; $j++) {
                    if ( ( $j == 0 ) ) {
                        echo $v[$i][$j]."</br>";
                    } 
                }
            }
        ?>
    </body>
</html>