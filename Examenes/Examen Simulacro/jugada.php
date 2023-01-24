<?PHP
    if (isset($_POST['limiteInferior'])){
        $limInferior = $_POST['limiteInferior'];
    } else {
        $limInferior = $_POST['limINF'];
    }

    if (isset($_POST['limiteSuperior'])){
        $limSuperior = $_POST['limiteSuperior'];
    } else {
        $limSuperior = $_POST['limSUP'];
    }

    $intento = 0;
    $intento = $_POST['intentos'] + 1;

    //condicion ? true : false ;

    $valorRanda = (empty($_POST['rnd'])) ? rand($limInferior,$limSuperior) : $_POST['rnd'];

    if ($limInferior> $limSuperior) {
        header("location:limites.php ? msg='limites super ... inferior'");
        die();
    }   

    if (isset($_POST['botonEnviar2'])) {
        $num = $_POST['num'];
        $rnd = $_POST['rnd'];

        if($num == $rnd) {
            header("location: acierto.php ");
        } else if ($num < $rnd) {
            echo "buscas un numero mayor";
        } else {
            echo "buscas un numero menor";
        }
    }
    // } else {
    //     echo "erro en el fomrmulario";
    // }
    
    
    
    
// } else {
//     echo "erro en el fomrmulario";
// }
    
    
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
    <form method="POST" action="">
        <label for="numUser">Introduce un número</label>
        <input type="number" name="num" value="<?php $num ?>" required></br>
        <input type="text"  name="limINF" value="<?php echo $limInferior  ?>"><br/>
        <input type="text"  name="limSUP" value="<?php echo $limSuperior ?>"><br/>
        <input type="text"  name="rnd" value="<?php echo $valorRanda ?>">
        <input type="text"  name="intentos" value="<?php echo $intento ?>">
        <input type="submit" name="botonEnviar2" value="OK!">
    </form>
</body>
</html>

