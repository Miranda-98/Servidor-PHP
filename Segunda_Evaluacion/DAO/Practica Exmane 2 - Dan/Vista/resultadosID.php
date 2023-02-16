<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form method="post" action="Bussines_Object/core.php" >
        idAnimal:
        <input type="text" name="id">
        <input type="submit" name="btnEnviar">
</form>
    <?php 
    
    $pruebaMuestra->mostrarTabla($registros);
    
    ?>
</body>
</html>