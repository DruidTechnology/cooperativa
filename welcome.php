<?php
include('conexion/conexion.php');
	session_start();
	require 'funcs/conexion.php';
	require 'funcs/funcs.php';

	if(!isset($_SESSION["id_usuario"])){
		header("Location: index.php");
	}
	$idUsuario = $_SESSION['id_usuario'];
	$sqlUsuario = "SELECT id,nombre FROM usuarios WHERE id= '$idUsuario'";
	$resultUsu= $mysqli->query($sqlUsuario);

	$rowUsu = $resultUsu->fetch_assoc();
	//Aqui va el código PHP del Vídeo
?>

<?php

@include("static/all/up.php");
?>
<center><img src="img/a1.jpg" border="1" alt="Este es el ejemplo de un texto alternativo" width="800" height="1200"></center>

<?php

@include("static/all/down.php");
?>	