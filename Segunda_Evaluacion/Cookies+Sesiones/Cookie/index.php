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
        // $datos = array('nombre' => 'Juan', 'edad' => 25);
        $datos = array(
            'user1' => array('nombre' => 'Juan', 'edad' => 25),
            'user2' => array('nombre' => 'Pedro', 'edad' => 32),
            'user3' => array('nombre' => 'Luis', 'edad' => 28),
        );

        $datos_serializados = serialize($datos);
        setcookie('datos', $datos_serializados, time() + 3600);

        echo $_COOKIE['datos'];

        $datos_serializados = $_COOKIE['datos'];
        $datos = unserialize($datos_serializados);
        echo $datos['user1']['nombre']; // imprime "Juan"
        echo $datos['user2']['nombre']; // imprime "25"
        foreach($datos as $user => $valorDatos){
            echo "el usuario $user tiene el nombre ".$valorDatos['nombre']. " y la edad ".$valorDatos['edad']."<br/>";
            
        }
    ?>
</body>
</html>