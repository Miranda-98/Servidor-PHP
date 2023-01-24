<html>

<head>

</head>

<body>
    <!--Formulario-->
    <form method="get" action="radio-formulario.php">
        <label for="cantidad"> Cantidad € </label>
        <input type="text" name="cantidad" required>

        <input type=radio name="moneda" value="1">Bitcoin</input>
        <input type=radio name="moneda" value="2">Dolar Americano</input>
        <input type=radio name="moneda" value="3">LIbra</input>
        <input type=radio name="moneda" value="4">Yen Japones</input>
        <input type="submit" name="botonEnviar" value="Convertir">
    </form>


    <?php
    if (isset($_GET['botonEnviar']) && isset($_GET['moneda'])) {
        $btc = 0.00012;
        $dolar = 1.12;
        $libra = 0.86;
        $yen = 120.82;
        $cantidad = (float)$_GET['cantidad'];

        switch ($_GET['moneda']) {
            case 1:
                echo $cantidad * $btc . " btc";
                break;
            case 2:
                echo $cantidad * $dolar . " dolar";
                break;
            case 3:
                echo $cantidad * $libra . " libra";
                break;
            case 4:
                echo $cantidad * $yen . " yen";
                break;
        }
    }
    ?>
</body>

</html>