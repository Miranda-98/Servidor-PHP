<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h2>Introduce los limites</h2>
    <form method="POST" action="jugada.php">
        <label for="limInferior">Introduce el limite inferior</label>
        <input type="number" name="limiteInferior" required></br>
        <label for="limSuperior">Introduce el limite superior</label>
        <input type="number" name="limiteSuperior" required></br>
        <input type="text" disabled value="<?php echo $_GET['msg'] ?? ''?>"></br>
        <input type="submit" name="botonEnviar" value="OK!">
        
    </form>
</body>

</html>
<?php

?>
