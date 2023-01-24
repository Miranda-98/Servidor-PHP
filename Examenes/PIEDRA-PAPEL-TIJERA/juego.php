<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>SELECCIONA UNA OPCION</h1>
    
    <form method="post" action="">

    <input type=checkbox name="juego" value="piedra">PIEDRA</input>
        <input type=checkbox name="juego" value="papel">PAPEL</input>
        <input type=checkbox name="juego" value="tijera">TIJERA</input><br/>

        <input type="submit" name="boton" value="JUGAR">

    </form>
    
</body>
</html>

<?php
    $opciones = ['piedra','papel','tijera'];
    $rnd = rand(0,2);
    $jMaquina = "";
    $jUsuario = "";
    $resultado = "";
    $cPartidas = 0;

    // piedra -1, papel 0, tijera 1

    /*
        piedra -> tijera
        tijera -> papel
        papel  -> piedra
    */
    if ($rnd == -0) {//piedra
        $jMaquina =$opciones[0];
    } else if ($rnd == 1) {//papel
        $jMaquina =$opciones[1];
    } else  {//tijera
        $jMaquina =$opciones[2];
    }


    if(isset($_POST['boton'])) {
            if ($_POST['juego'] == 'piedra') {//piedra
                $jUsuario =$opciones[0];
            } else if ($_POST['juego'] =='papel') {//papel
                $jUsuario =$opciones[1];
            } else  {//tijera
                $jUsuario =$opciones[2];
            }
    }

    echo "La maquina ha elegido ".$jMaquina.', El usuario ha elegido '. $jUsuario;

    if ($jMaquina == 'piedra' && $jUsuario == 'tijera') {
        $resultado = "gana maquina";
    } else if ($jMaquina == 'piedra' && $jUsuario == 'papel') {
        $resultado = "gana usuario";

    } else if ($jMaquina == 'papel' && $jUsuario == 'piedra') {
        $resultado = "gana maquina";
    } else if ($jMaquina == 'papel' && $jUsuario == 'tijera') {
        $resultado = "gana usuario";


    } else if ($jMaquina == 'tijera' && $jUsuario == 'papel') {
        $resultado = "gana maquina";
    } else if ($jMaquina == 'tijera' && $jUsuario == 'piedra') {
        $resultado = "gana usuario";


    } else {
        $resultado = "empate";
    }
    
    echo '<br/>' . $resultado;
    // $resultado = $jMaquina <=> $jUsuario;
    // $resultado2 = $jUsuario

    // $a->weight < $b->weight ? -1 : ($a->weight == $b->weight ? 0 : 1);
    // echo $resultado;
   
?>