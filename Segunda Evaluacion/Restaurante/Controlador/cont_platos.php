<?php

    require_once '../Modelo/platos.php';
    if(session_status() == PHP_SESSION_NONE)
        session_start();

   

    
    if(isset($_GET['msg'])){
        if($_GET['msg'] == 'añadir')
            añadir();
        else if ($_GET['msg'] == 'borrar')
            eliminar($_GET['id']);
    }
    
    
    function eliminar($borrar){
        $plato = new Platos('restaurante');
        $platos = $plato->obtenerDatosId($_SESSION['platosPedidos']);

        $aux = explode(',',$_SESSION['platosPedidos']);
        $pedido = array_values($aux);
        $repetidos = array_count_values($pedido);

        // $_SESSION['platosPedidos'] = explode(',',$_SESSION['platosPedidos']);

        
        

        $aux2 = array_search($borrar, $aux);
        
        if ($aux2 !== false)
            unset($aux[$aux2]);
        
        echo "<table>"; 
        
        unset($_SESSION['platosPedidos']);
        $_SESSION['platosPedidos'] = implode(',', $aux);
        $auxx = explode(',',$_SESSION['platosPedidos']);
        $pedidoo = array_values($auxx);
        $repetidoss = array_count_values($pedidoo);

        foreach($platos as $pp) {
            foreach($repetidoss as $r => $xx){
                if($r == $pp['id'])
                        echo "<tr><td>$xx</td>";
            }
                    echo "<td>".$pp['id']."</td>
                    <td>".$pp['nombre']."</td>
                    <td>".$pp['precio']."</td>
                    <td>".$pp['categoria']."</td>
                </tr>";
        }
        echo"</table>";
    }

    function añadir(){
        if(empty($_SESSION['platosPedidos']))
            $_SESSION['platosPedidos'] = $_GET['id'];
        else    
            $_SESSION['platosPedidos'] = $_SESSION['platosPedidos'] . "," . $_GET['id'];
        echo "<br/>".$_SESSION['platosPedidos'];
    
        $plato = new Platos('restaurante');
        $platos = $plato->obtenerDatosId($_SESSION['platosPedidos']);
        

        $aux = explode(',',$_SESSION['platosPedidos']);
        $pedido = array_values($aux);
        $repetidos = array_count_values($pedido);
        
        echo "<table>"; 
        foreach($platos as $p) {
            foreach($repetidos as $r => $x){
                if($r == $p['id'])
                        echo "<tr><td>$x</td>";
            }
                    echo "<td>".$p['id']."</td>
                    <td>".$p['nombre']."</td>
                    <td>".$p['precio']."</td>
                    <td>".$p['categoria']."</td>
                </tr>";
        }
        echo"</table>";
    }
    
?>