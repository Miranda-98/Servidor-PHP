<html>

<head>

</head>

<body>
    <!--Formulario-->
    <form method="get" action="select-formulario.php">
        <label for="cantidad"> Cantidad € </label>
        <input type="text" name="cantidad" required>

        <select name="moneda">
            <option value="0.00012">Bitcoin</input>
            <option value="1.12">Dolar Americano</input>
            <option value="0.86">LIbra</input>
            <option value="120.82">Yen Japones</input>
        </select>

        <input type="submit" name="botonEnviar" value="Convertir">
    </form>


    <?php

    if (isset($_GET['botonEnviar'])) {
        if (isset($_GET['botonEnviar'])) {
            if ($_GET['moneda'] == '0.00012')
                echo $_GET['cantidad'] * $_GET['moneda'] . "</br>";
            if ($_GET['moneda'] == '1.12')
                echo $_GET['cantidad'] * $_GET['moneda'] . "</br>";
            if ($_GET['moneda'] == '0.86')
                echo $_GET['cantidad'] * $_GET['moneda'] . "</br>";
            if ($_GET['moneda'] == '120.82')
                echo $_GET['cantidad'] * $_GET['moneda'] . "</br>";
        }
    }
    ?>
</body>

</html>