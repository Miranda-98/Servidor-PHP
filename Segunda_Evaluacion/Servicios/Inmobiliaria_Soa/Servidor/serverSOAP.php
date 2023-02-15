<?php
    include('cerebro.php');
    $options = array('uri'=>'http://localhost/practicas_clase/Servidor-PHP/Segunda%20Evaluacion/Servicios/Inmobiliaria_Soa/Servidor/');
    $server = new SoapServer(null, $options);
    $server->setClass('Inmobiliaria');
    $server->handle();
?>