<html>
    <body>
        <?php 
            $array = array(array("pepe",5,6), array(7,8,9), array(6,9,45));

            for ($i=0; $i < 3; $i++) { 
                for ($j=0; $j < 3; $j++) { 
                    echo $array[$i][$j].", ";
                }
                
            }
        ?>
    </body>
</html>