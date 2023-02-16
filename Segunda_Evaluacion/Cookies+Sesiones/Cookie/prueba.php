<?php
    $array = 'manolo';
    setcookie('pepe', $array);

    $aFrutas = ['platano', 'manzana'];
    

    // array_push($aFrutas, 'pepe');
    $_COOKIE['pepe'] = $_COOKIE['pepe'] . 'pedro';


    print_r($_COOKIE['pepe']);
?>