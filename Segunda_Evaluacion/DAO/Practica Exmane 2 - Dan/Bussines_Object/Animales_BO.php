<?php 
    include_once('../DAO/Animales_DAO.php');
    include_once('../Transfer_Object/Animales_TO.php');
    // include_once('../viviendas_BusinessObject.php');
class Animales_BO {

    public function mostrarId($id){
        $animal = new Animales_TO();
        $animal->__set('id',$id);
        $dao = new Animales_DAO();
        $datos = $dao->obtenerID($animal,'animales');
        
        return $datos;
    }

    function mostrarTabla($registros)
    {
    if (empty($registros)) {
        echo "<h1>NO HAY DATOS CON ESTA CONSULTA</h1>";
    } else {
        $arraykeys= $registros[0];
    echo "<table><tr>";
        foreach ($arraykeys as $key => $value ) {
            echo "<th>".strtoupper($key)."</th>";
        }
        echo "</tr>";
        foreach ($registros as $key => $value) {
            echo "<tr>";
            foreach($value as $clave => $valor){
                        echo "<td>".$valor ."</td>";
                    }
            }
        
            echo "</tr>";
        }
        echo "</table>";
    }

}






?>