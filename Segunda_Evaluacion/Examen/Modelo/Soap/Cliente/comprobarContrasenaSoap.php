<?php
    class Cliente{
        function compruebaContraseña($pass){
            $options = array('uri'=>'http://localhost/practicas_clase/Servidor-PHP/Segunda_Evaluacion/Examen/Modelo/Soap/Servidor',
            'location'=>'http://localhost/practicas_clase/Servidor-PHP/Segunda_Evaluacion/Examen/Modelo/Soap/Servidor/serverSOAP.php');
            try{
                $cliente = new SoapClient(null,$options);
                $response = $cliente->comprobarContraseñaValida($pass);
                if($response == true){
                    include '../Controlador/controller.php';
                    
                        $c = new Controlador();
                        $c->añadir($_GET['nombre'], $_GET['apellidos'], $_GET['domicilio'], $_GET['telefono'], $_GET['correo'], $_GET['contraseña']);
                        
                        //header('location: ../Vista/login.php');
                } else {
                    echo "no insertado";
                    //header('location: ../Vista/error.html');
                }

            } catch (SoapFault $e) {
                echo '<br/> ERROR '.$e->getMessage();
            }
        }
    }
    
?>