
<?php
echo "  <h2>Suma de pares</h2>";
        

if (isset($_POST['enviar'])) {
    $numero = $_POST['numero'];
    $suma = 0;
    for ($i = 1; $i <= $numero; $i++) {
        if ($i % 2 == 0) {
            $suma = $suma + $i;
        }
    }
    
} else {
    $numero = '';
    $suma = '';
}

echo "<form action='' method='post'>
            <label>Escribe un número entero</label>
            <input type='number' name='numero' value='$numero' id>
            <button type='submit' name='enviar'>Calcular</button>
            <label><br/ >la suma de los numeros pares es: $suma</label>
        </form>";

?>