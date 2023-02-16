<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table>
        <tr>
            <th>Animales</th>
        </tr>
        
        <tr>
            <td>Id</td>
            <td>Nombre</td>
            <td>Especie</td>
            <td>Raza</td>
            <td>Genero</td>
            <td>Color</td>
            <td>Edad</td>
        </tr>

        
            <?php
                include '../Modelo/animalDao.php';
                $x = new AnimalDao('protectora_animales');
                $animal = $x->obtenerTodo();
                foreach($animal as $a){
                    echo "<tr>
                            <td>".$a->__get('id')."</td>
                            <td>".$a->__get('nombre')."</td>
                            <td>".$a->__get('especie')."</td>
                            <td>".$a->__get('raza')."</td>
                            <td>".$a->__get('genero')."</td>
                            <td>".$a->__get('color')."</td>
                            <td>".$a->__get('edad')."</td>
                        </tr>";
                }
            ?>
        
    </table>

    <h3>Añadir animal</h3>
    <?php 
        $x = new AnimalDao('protectora_animales');
        $x2 = new Animal(13,'Vozka','Hamster','Ruso',"Hembr",'Gris',1,'');
        
        $x->insertar($x2);
    ?>
</body>
</html>