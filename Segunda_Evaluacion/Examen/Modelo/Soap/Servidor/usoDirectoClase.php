<?php
    include 'cerebro.php';
    $p = 'pepemaster98';
    $c = new ComprobarContraseña();
    $r = $c->comprobarContraseñaValida($p);
    echo $p;
    echo $r;
?>