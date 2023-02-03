<?php
    function generarContraseña($x = 12) {
        $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_+-=';
        $contraseña = '';
        for ($i = 0; $i < $x; $i++) {
            $contraseña .= $chars[rand(0, strlen($chars) - 1)];
        }
        return $contraseña;
    }

    $x = generarContraseña();
    echo $x;
?>