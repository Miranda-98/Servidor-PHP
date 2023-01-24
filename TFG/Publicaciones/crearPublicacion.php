<style>
    #foto2 {
        background-color: red;
    }
</style>
<?php
require "conectarBD.php";
//crear una tabla de publicaciones

echo "<div>
        <table>
            
        </table>
    </div>";

function datosTabla()
{
    echo "<div id='pepe' style='color:red'>pepeeeeee</div>";
    $conexion = conectar();
    $sql = "SELECT id, direccion, habitaciones, baños, imagenes FROM caracteristicas;";
    $result = $conexion->query($sql);
    $contador = 0;


    if ($result->num_rows > 0) { //mostrar todas las filas de las tablas
        echo "<div ><table class='tabla'>
                <tr>
                <th>'publicacion'</th>
                </tr>
                <tr>
                    <td>id</td>
                    <td>direccion</td>
                    <td>habitaciones</td>
                    <td>baños</td>
                    <td>imagenes</td>
                </tr>";
        while ($row = $result->fetch_assoc()) {
            //echo "id: " . $row["id"] . " direccion: " . $row["direccion"] . " habitaciones: " . $row["habitaciones"] . " baños: " . $row["baños"] . " imagen: " . $row["imagenes"] . "<br>";
            $aDatos = array("id" => $row['id'], "direccion" => $row['direccion'], "habitaciones" => $row['habitaciones'], "baños" => $row['baños'], "imagenes" => $row['imagenes']);
            //echo "<div>id publicacione: ".$aDatos['id']." direccion: ".$aDatos['direccion']." baños: ".$aDatos['baños']." imagenes: <img src='".$aDatos['imagenes']."' width='200px' height='200px'/></div>";
            echo "<tr><td>" . $aDatos['id'] . "</td>",
            "<td>" . $aDatos['direccion'] . "</td>",
            "<td>" . $aDatos['habitaciones'] . "</td>",
            "<td>" . $aDatos['baños'] . "</td>",
            //"<td><img src='".$aDatos['imagenes']."' width='200px' height='200px'/></td></tr> ";
            //"<td id='pepe".$contador."'>".$aDatos['imagenes']."</td>";
            "<td id='pepa" . $contador . "'  value='" . $aDatos['imagenes'] . "'>" . $aDatos['imagenes'] . "</td>",
            "<td><button type='button' onclick='cambiaImagen()'><img id='pepaa" . $contador . "'   src=''  width='100' height='100'/></button></td>";
            //echo "<script type='text/javascript> document.querySelector('td:last-child').style.backgroundColor = 'blue'; </script>";
            $contador++;
            //echo $aDatos['imagenes'];
        }
        // $aDatos = [$row['id'],$row['direccion'],$row['habitaciones'],$row['baños'],$row['imagenes']];
        //var_dump($aDatos);
        //return $aDatos;
        echo "<table/></div><br/>";
    } else {
        echo "tabla vacia";
    }
}

/*function crearPublicacion(){
        $datos = datosTabla();
        var_dump($datos);
        //echo "<img src='".$datos['imagenes']."' width='500px' height='600px'/>";
        echo "<div>id publicacione: ".$datos['id']." direccion: ".$datos['direccion']." baños: ".$datos['baños']." imagenes: <img src='".$datos['imagenes']."' width='500px' height='600px'/></div>";
    }*/

datosTabla();
//crearPublicacion();
echo "<div id='mostrarPantalla'></div>";
echo "<div id='mostrarPantalla2'>
        <img src='' id='cambio' width='600' height='450'>
    </div>";
?>

<script type="text/javascript">
    //document.getElementById("tabla").style.backgroundColor = "red";
    document.querySelector(".tabla").style.backgroundColor = "green";
    document.querySelector('td:nth-child(2)').style.backgroundColor = "blue";
    //document.querySelector('td:last-child').style.backgroundColor = "pink";
    //document.getElementById("img").style.backgroundColor = "red";


    /*const p = document.querySelectorAll('#pepa');//obtengo la cantidad de filas -> nº publicaciones
    for (let i = 0; i < p.length; i++) {
        p[i].style.backgroundColor = "yellow";
        console.log(p[i]);
    }*/

    /*const p = document.getElementById("foto").value;
    console.log(p);*/

    var j1 = document.getElementById("pepa1").innerHTML;
    console.log("el valor es: " + j1);
    document.getElementById("mostrarPantalla").innerHTML = j1;

    var j2 = document.getElementById("pepa2").innerHTML; //mostrar valor del div
    console.log("el valor pepe 1 es: " + j2);
    document.getElementById("mostrarPantalla").innerHTML = j2;

    var j3 = document.getElementById("pepa3");
    console.log(j3);

    var j4 = document.getElementById("pepa4");
    console.log(j4);

    if (j1 == "carpeta2") {
        console.log("ahora estoy aqui");
        document.getElementById("pepaa1").src = 'pictures/carpeta1/foto1.png';

        function cambiaImagen() {
            var img1 = document.getElementById("pepaa1").src;
            console.log("1" + document.getElementById("pepaa1").src);
            if (img1.match('pictures/carpeta1/foto1.png')) {
                document.getElementById("pepaa1").src = 'pictures/carpeta1/foto2.png';
                console.log("2" + document.getElementById("pepaa1").src);
            } else if (img1.match('pictures/carpeta1/foto2.png')) {
                document.getElementById("pepaa1").src = 'pictures/carpeta1/foto3.png';
            } else if (img1.match('pictures/carpeta1/foto3.png')) {
                document.getElementById("pepaa1").src = 'pictures/carpeta1/foto1.png';
            }
        }
    }
    if (j2 == "carpeta3") {
        console.log("estoy aqui");
        document.getElementById("pepaa2").src = 'pictures/carpeta2/foto1.png';
        
    } else {
        console.log("no estoy ahi");
    }
    //document.getElementById("pepa"+i).innerHTML = img.src="../pictures/carpeta'+i+'/foto.png";


    /*function cambiaImagen(){
        var totalFotos = 3; 
        var fotoActual = 1;

        var img1 = document.getElementById("pepaa1").src;
        console.log("1"+document.getElementById("pepaa1").src);
        if (img1.match('pictures/carpeta1/foto1.png')) {
            document.getElementById("pepaa1").src =  'pictures/carpeta1/foto2.png';
            console.log("2"+document.getElementById("pepaa1").src);
        } else if (img1.match('pictures/carpeta1/foto2.png')) {
            document.getElementById("pepaa1").src = 'pictures/carpeta1/foto3.png';
        } else if (img1.match('pictures/carpeta1/foto3.png')) {
            document.getElementById("pepaa1").src = 'pictures/carpeta1/foto1.png';
        }


        var img2 = document.getElementById("pepaa2").src;
        console.log("1"+document.getElementById("pepaa2").src);
        if (img2.match('pictures/carpeta2/foto1.png')) {
            document.getElementById("pepaa2").src =  'pictures/carpeta2/foto2.png';
            console.log("2"+document.getElementById("pepaa2").src);
        } else if (img2.match('pictures/carpeta2/foto2.png')) {
            document.getElementById("pepaa2").src = 'pictures/carpeta2/foto3.png';
        } else if (img2.match('pictures/carpeta2/foto3.png')) {
            document.getElementById("pepaa2").src = 'pictures/carpeta2/foto1.png';
        }

       /* if($fotoActual <= $totalFotos-1) {
            document.getElementById("pepaa2").src = 'pictures/carpeta2/foto'+$fotoActual+'.png';
            console.log("fotoActual "+$fotoActual);
            $fotoActual++;
        } else {
            document.getElementById("pepaa2").src = 'pictures/foto"+$fotoActual+".png';
            $fotoActual = 0;
        }*/

    //}
</script>