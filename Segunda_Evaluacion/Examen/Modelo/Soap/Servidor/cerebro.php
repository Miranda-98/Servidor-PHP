<?php
    class ComprobarContraseña{
        function comprobarContraseñaValida($pass){
            if (strlen($pass) > 8 && str_contains($pass, '0')){
                echo "valido";
                return true;
            }else if (strlen($pass) > 8 && str_contains($pass, '1')){
                echo "valido";
                return true;
            }else if (strlen($pass) > 8 && str_contains($pass, '2')){
                echo "valido";
                return true;
            }else if (strlen($pass) > 8 && str_contains($pass, '3')){
                echo "valido";
                return true;
            }else if (strlen($pass) > 8 && str_contains($pass, '4')){
                echo "valido";
                return true;
            }else if (strlen($pass) > 8 && str_contains($pass, '5')){
                echo "valido";
                return true;
            }else if (strlen($pass) > 8 && str_contains($pass, '6')){
                echo "valido";
                return true;
            }else if (strlen($pass) > 8 && str_contains($pass, '7')){
                echo "valido";
                return true;
            }else if (strlen($pass) > 8 && str_contains($pass, '8')){
                echo "valido";
                return true;
            }else if (strlen($pass) > 8 && str_contains($pass, '9')){
                echo "valido";
                return true;
            }else{
                echo "no valido";
                return false;
            }
        }
    }
?>