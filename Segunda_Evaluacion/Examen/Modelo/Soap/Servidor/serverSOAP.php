<?php
    include('cerebro.php');
    $options = array('uri'=>'http://localhost/practicas_clase/Servidor-PHP/Segunda_Evaluacion/Examen/Modelo/Soap/Servidor/');
    $server = new SoapServer(null, $options);
    $server->setClass('ComprobarContraseña');
    $server->handle();
?>