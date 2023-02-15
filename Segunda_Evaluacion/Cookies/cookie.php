<?php
    if(isset($_COOKIE['visitas'])){
        $_COOKIE['visitas']++;
        setcookie("visitas",$_COOKIE['visitas'],time()+5);
        setcookie("hora",date("d-m-y h:i:s"),time()+10);
        echo "visita numero ".$_COOKIE['visitas']."<br/>";
        echo "hora visitada ".$_COOKIE['hora']."<br/>";
    } else {
        echo "primera vez que entras en la pagina";
        setcookie('visitas', 1);
        setcookie("hora",date("d-m-y h:i:s"),time()+10); 
    }
?>