<?php
    if(session_status() == PHP_SESSION_NONE)
        session_start();

    if(isset($_POST['producto'])){
        if(empty($_SESSION['nombresAlmacenados']))
            $_SESSION['nombresAlmacenados'] = $_POST['producto'];
        else    
            $_SESSION['nombresAlmacenados'] = $_SESSION['nombresAlmacenados'] . "," . $_POST['producto'];
    }
    
    echo "prdocutos almacenados: " . $_SESSION['nombresAlmacenados'] . "<br/>";

    // numero de veces que se repite el elemento en la session
    $vecesElementos = explode(',', $_SESSION['nombresAlmacenados']);
    $raton = 0;
    $teclado = 0;
    $monitor = 0;
    
    // mostrar el numero de objetos del carrito con el precio
    for ($i=0; $i < count($vecesElementos); $i++) { 
        if($vecesElementos[$i] == 'raton') {
            $raton++;
        } else if($vecesElementos[$i] == 'teclado') {
            $teclado++;
        } else if($vecesElementos[$i] == 'monitor') {
            $monitor++;
        }
    }

    $tR = $raton * 10 ;
    $tT = $teclado * 20 ;
    $tM  = $monitor * 30 ;
    $total = $tR + $tT + $tM;

    echo "<table>
        <tr>
            <td>Cantidad</td>
            <td>Objeto</td>
            <td>Precio</td>
        </tr>
        <tr>
            <td>$raton</td>
            <td>Raton</td>
            <td>$tR</td>
        </tr>
        <tr>
            <td>$teclado</td>
            <td>Teclado</td>
            <td>$tT</td>
        </tr>
        <tr>
            <td>$monitor</td>
            <td>Monitor</td>
            <td>$tM</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td>$total</td>
        </tr>
    </table>";

    
?>  

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post">
        <input type=checkbox name="producto" value="raton">Raton</input>
        <input type=checkbox name="producto" value="teclado">Teclado</input>
        <input type=checkbox name="producto" value="monitor">Monitor</input>
        <input type="submit" name="botonEnviar" value="Enviar">
    </form>
</body>
</html>