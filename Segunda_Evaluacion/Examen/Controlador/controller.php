<?php
    require '../Modelo/usuarioDAO.php';

    class Controlador {
        function comprobar($a, $b){
            $x = new UsuarioDao();
            $x->validarAcceso($a,$b);
            

        }

        function añadir($n,$a,$d,$t,$e,$c){
            $x = new UsuarioDao();
            $x->añadirUsuario($n,$a,$d,$t,$e,$c);
            
        }
    }

    // echo $_GET['nombre'];
    //if(isset($_GET['valor'])){

        // if($_GET['registro'] == 'Registrarme') {
        //     $c = new Controlador();
        //     $c->añadir($_GET['nombre'], $_GET['apellidos'], $_GET['domicilio'], $_GET['telefono'], $_GET['correo'], $_GET['contraseña']);
        // }
        
        // else if($_GET['valor'] == 'log') {
        //     $c = new Controlador();
        //     $c->comprobar($_GET['usuario'], $_GET['password']);
        // }

    //}
    
    
?>