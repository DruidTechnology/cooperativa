<?php 
    
    $user="root";
    $pass="";
    $server="localhost";
    $db="saco_db";
    $conexion = new mysqli($server,$user,$pass,$db);
    
    if($conexion->connect_error){
        die("Conexion Fallida: ".$conexion->connect_error);

    }
?>