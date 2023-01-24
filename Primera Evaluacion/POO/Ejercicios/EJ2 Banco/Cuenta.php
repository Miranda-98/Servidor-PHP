<?php
    class Cuenta{
        private $nombre, $nCuenta, $interes, $saldo;

        function __construct($nombre,$cuenta,$interes,$saldo)
        {
            $this->nombre = $nombre;
            $this->nCuenta = $cuenta;
            $this->interes = $interes;
            $this->saldo = $saldo;
        }

        function get_nombre(){
            return $this->nombre;
        }

        function set_nombre($nombre){
            $this->nombre = $nombre;
        }

        function get_nCuenta(){
            return $this->nCuenta;
        }

        function set_nCuenta($cuenta){
            $this->nCuenta = $cuenta;
        }

        function get_interes(){
            return $this->interes;
        }

        function set_interes($interes){
            $this->interes = $interes;
        }

        function get_saldo(){
            return $this->saldo;
        }

        function set_saldo($saldo){
            $this->saldo = $saldo;
        }

        function ingresar($cantidad):bool{
            if ($cantidad > 0){ 
                echo "saldo incrementado correctamente";
                $this->set_saldo($this->get_saldo()+$cantidad);
                return true;
            } else {
                echo "no puedes ingresar una cantidad negativa";
                return false;
            }
        }

        function reintegro($cantidad):bool{
            if (($this->get_saldo() >= $cantidad) && ($cantidad > 0)) {
                $this->set_saldo($this->get_saldo()-$cantidad);
                return true;
            } else {
                echo "saldo insuficiente";
                return false;
            }
        }

        function transferencia($cantidad, $obj) {
            if ($this->reintegro($cantidad) == true) {
                $this->reintegro($cantidad);
                $obj->ingresar($cantidad);
            }
        }
    }

    $cuenta1 = new Cuenta("pepe", "1234", 5.2, 100);
    $cuenta2 = new Cuenta("pepito", "1234", 5.2, 0);

    $cuenta1->ingresar(-10);
    echo ('<pre>');
    print_r($cuenta1);
    echo ('</pre>');

    $cuenta1->ingresar(10);
    echo ('<pre>');
    print_r($cuenta1);
    echo ('</pre>');

    

    $cuenta2->reintegro(-5);
    echo ('<pre>');
    print_r($cuenta2);
    echo ('</pre>');

    $cuenta2->ingresar(10);
    echo ('<pre>');
    print_r($cuenta2);
    echo ('</pre>');

    $cuenta2->reintegro(20);
    echo ('<pre>');
    print_r($cuenta2);
    echo ('</pre>');

    $cuenta2->reintegro(10);
    echo ('<pre>');
    print_r($cuenta2);
    echo ('</pre>');


    echo "-----------------------------------------";
    echo ('<pre>');
    print_r($cuenta1);
    echo ('</pre>');
    echo ('<pre>');
    print_r($cuenta2);
    echo ('</pre>');
    echo "transferencia";
    $cuenta1->transferencia(10,$cuenta2);
    echo ('<pre>');
    print_r($cuenta1);
    echo ('</pre>');
    echo ('<pre>');
    print_r($cuenta2);
    echo ('</pre>');
?>