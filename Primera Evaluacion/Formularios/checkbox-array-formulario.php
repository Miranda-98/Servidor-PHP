<html>

<head>

</head>

<body>
    <!--Formulario-->
    <form method="get" action="checkbox-array-formulario.php">
        <label for="cantidad"> Cantidad € </label>
        <input type="text" name="cantidad" required>

        <input type=checkbox name="moneda[]" value="0.00012">Bitcoin</input>
        <input type=checkbox name="moneda[]" value="1.12">Dolar Americano</input>
        <input type=checkbox name="moneda[]" value="0.86">LIbra</input>
        <input type=checkbox name="moneda[]" value="120.82">Yen Japones</input>
        <input type="submit" name="botonEnviar" value="Convertir">
    </form>


    <?php
    if (isset($_GET['botonEnviar'])) {
        foreach($_GET['moneda'] as $clave => $valor) {
            echo "el cambio a $clave es $valor";
        }
    }
    ?>
</body>

</html>