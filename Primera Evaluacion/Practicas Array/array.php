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
            $array[][] = array(array(4,5,6), array(7,8,9), array(6,9,4));

            print_r($array);

            echo "</br></br>";
            for($h=0; $h <=3; $h++){
                for($k=0; $k <=3; $k++){
                    echo $array[$h][$k];
                }
            }
            echo "</br></br>";
            for($i=0; $i <=3; $i++){
                for($j=0; $j <=3; $j++){
                    $array[$i][$j] = rand(4,10);
                    print_r($array[$i][$j].", ");
                }
            }

            
        ?>
</body>
</html>