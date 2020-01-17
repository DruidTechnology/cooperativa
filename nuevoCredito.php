
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
                    <?php

@include("paginas/nuevoCredito.php");
?>

<?php

@include("static/all/down.php");
?>