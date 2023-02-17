<?php

interface InterfazDAO{
	public function conexion();
	public function recuperarUsuario($id,$pass);
	public function validarAcceso($id,$pass);
}


?>