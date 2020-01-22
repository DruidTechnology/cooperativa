<?php
	include('conexion/conexion.php');
	require 'funcs/conexion.php';
	require 'funcs/funcs.php';


	if(empty($_GET['user_id'])){
		header('Location: index.php');
	}
	
	if(empty($_GET['token'])){
		header('Location: index.php');
	}
	
	$user_id = $mysqli->real_escape_string($_GET['user_id']);
	$token = $mysqli->real_escape_string($_GET['token']);
	
	if(!verificaTokenPass($user_id, $token))
	{
echo 'No se pudo verificar los Datos<br/>';
echo "<a href='index.php'>Iniciar Sesion</a>";
exit;
	}
	
	
?>
<?php

@include("static/all/up.php");
?>
                    <?php

@include("paginas/pass.php");
?>

<?php

@include("static/all/down.php");
?>




 