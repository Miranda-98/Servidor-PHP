<html>

<head>

</head>

<body>
    <!--Formulario-->
    <form method="get" action="checkbox-formulario.php">
        <label for="cantidad"> Cantidad € </label>
        <input type="text" name="cantidad" required>

        <input type=checkbox name="btc" value="0.00012">Bitcoin</input>
        <input type=checkbox name="dolar" value="1.12">Dolar Americano</input>
        <input type=checkbox name="libra" value="0.86">LIbra</input>
        <input type=checkbox name="yen" value="120.82">Yen Japones</input>
        <input type="submit" name="botonEnviar" value="Convertir">
    </form>


    <?php
    if (isset($_GET['botonEnviar'])) {
        if (isset($_GET['botonEnviar'])) {
            if (isset($_GET['btc']))
                echo $_GET['cantidad'] * $_GET['btc']."</br>";
            if (isset($_GET['dolar']))
                echo $_GET['cantidad'] * $_GET['dolar']."</br>";
            if (isset($_GET['libra']))
                echo $_GET['cantidad'] * $_GET['libra']."</br>";
            if (isset($_GET['yen']))
                echo $_GET['cantidad'] * $_GET['yen']."</br>";
        }
    }
    ?>
</body>

</html>