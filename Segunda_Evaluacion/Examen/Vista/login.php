<!DOCTYPE html>
<?php

?>
<html>
	<head>
		<meta charset="UTF-8" />
		<title>Login</title>
		<link href="estilos.css" rel="stylesheet" />
	</head>
	<body>
		<form method="GET">
			<fieldset>
				<legend>Datos de acceso</legend>
				Usuario: <input type="text" name="usuario" id="usuario" />
				<br /><br />
				Contrasena: <input type="password" name="contrasena1" id="contrasena1" />
				<br /><br />
				<input type="submit" name="enviar" id="enviar" value="Iniciar sesion" />

				<a href="registro.php">Registrate</a>
			</fieldset>
		</form>
	</body>
</html>
<?php
    include '../Controlador/controller.php';
    if(isset($_GET['enviar'])){
        $c = new Controlador();
        $c->comprobar($_GET['usuario'], $_GET['contrasena1']);
		session_start();
        $_SESSION['usuario'] = $_GET['usuario'];
    }
    
?>