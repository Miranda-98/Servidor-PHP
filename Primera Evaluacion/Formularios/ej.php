<?php 
$i = 0;
if (isset($_POST['cantidad'])) {
    while ($i < $_POST['cantidad']) {
        echo "los bucles son faciles </br>";
        $i++;
    }
    echo "se acabo";
}
?>