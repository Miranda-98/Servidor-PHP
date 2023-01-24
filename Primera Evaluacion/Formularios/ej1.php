<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    $i = 0;
    if (isset($_POST['cantidad'])) {
        while ($i < $_POST['cantidad']) {
            echo "los bucles son faciles </br>";
            $i++;
        }
        echo "se acabo";
    }


    echo "--------------------------------------------- </br>";


    if (isset($_POST['cantidad'])) {
        for ($i = 0; $i < $_POST['cantidad']; $i++) {
            echo "los bucles son faciles </br>";
        }
        echo "se acabo";
    }
    ?>
</head>

<body>
    <form method="post" action="ej.php">
        <label form="veces"> ¿Cuantas veces? </label>
        <input type="text" name="cantidad" required>
        <input type="submit" name="enviar" value="enviarDatos">
    </form>
</body>

</html>