<?php
    // Iniciar la sesión
    session_start();

    // Obtener el valor actual de la sesión y almacenarlo en una variable
    $data = isset($_SESSION['my_array']) ? $_SESSION['my_array'] : array();

    // Añadir el nuevo elemento a la variable con la función array_push()
    array_push($data, 'nuevo elemento');

    // Asignar el valor actualizado a la sesión
    $_SESSION['my_array'] = $data;

    print_r($_SESSION['my_array']);


    
    if(isset($_SESSION['pepe']))
        $dato = $_SESSION['pepe'];
    else    
        $_SESSION['pepe'] = array();

    array_push($dato, 'palta');

    $_SESSION['pepe'] = $dato;
    
    print_r($_SESSION['pepe']);
?>