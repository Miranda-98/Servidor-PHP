<?php
    include 'cerebro.php';
    $c = new Inmobiliaria();
    $r = $c->mostrar('Norte');
    echo $r;
?>