<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscador</title>
</head>
<body>
    <h1>Buscador de publicaciones</h1>
    <form method="POST" action="">
        <fieldset>
            <legend>Introduzca los datos de las viviendas a buscar</legend>
            <label>Tipo de vivienda: </label>
            <select name="tipo">
                <option name="piso" value="piso">Piso</option>
                <option name="adosado" value="adosado">Adosado</option>
                <option name="chalet" value="chalet">Chalet</option>
                <option name="casa" value="casa">Casa</option>
            </select><br>

            <label>Zona:</label>
            <select name="zona">
                <option name="centro" value="centro">Centro</option>
                <option name="norte" value="norte">Norte</option>
                <option name="sur" value="sur">Sur</option>
                <option name="este" value="este">Este</option>
                <option name="oeste" value="oeste">Oeste</option>
            </select><br>

            <label>Número de dormitorios:</label>
            <input type="radio" id="1" name="nHabitaciones" value="1">
            <label>1</label>
            <input type="radio" id="2" name="nHabitaciones" value="2">
            <label>2</label>
            <input type="radio" id="3" name="nHabitaciones" value="3">
            <label>3</label>
            <input type="radio" id="4" name="nHabitaciones" value="4">
            <label>4</label><br>

            <label>Precio:</label>
            <input type="radio" id="precio1" name="precio" value="&lt100000">
            <label>&lt100000</label>
            <input type="radio" id="precio2" name="precio" value="100000-200000">
            <label>100000-200000</label>
            <input type="radio" id="precio3" name="precio" value="200000-300000">
            <label>200000-300000</label>
            <input type="radio" id="precio4" name="precio" value="&gt300000">
            <label>&gt300000</label><br>    


            <label>Extras:</label>
            <input type="checkbox" id="piscina" name="piscina" value="Piscina">
            <label>Piscina</label>
            <input type="checkbox" id="jardin" name="jardin" value="Jardin">
            <label>Jardin</label>
            <input type="checkbox" id="garage" name="garage" value="Garage">
            <label>Garage</label><br>

            <input type="submit" name="buscar" value="Buscar">
            <button name='botonFiltrar'>Filtrar Publicaciones</button>
        </fieldset>
    </form>
</body>
</html>
<?php
    include '../Modelo/publicacion.php';
    $c = new Publicacion('inmobiliaria');
    $c->filtrarPublicaciones();
?>