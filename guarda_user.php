<?php
	
	require 'funcs/conexion.php';
	require 'funcs/funcs.php';
	
	$user_id = $mysqli->real_escape_string($_POST['user_id']);
	$usuario = $mysqli->real_escape_string($_POST['usuario']);

if (CambiarNombre($usuario,$user_id)) {
	# code...
}else{
	echo "No se pudo cambiar el usuario";
}
	
?>	