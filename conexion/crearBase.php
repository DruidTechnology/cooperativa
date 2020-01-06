<?php 
    
    $user="root";
    $pass="";
    $server="localhost";
    $db="saco_db";

    $conexion = new mysqli($server,$user,$pass);
    if ($conexion->connect_error) {
        die("conexion Fallida");
        # code...
    }

    $sql = "CREATE DATABASE saco_db";
    if ($conexion->query($sql) === TRUE) {
        //echo "Base de datos creada correctamente";
        $conexionT = new mysqli($server,$user,$pass,$db);
        $sqlTA= "CREATE TABLE afiliados(
            id INT(11) AUTO_INCREMENT PRIMARY KEY,
            nombreAfiliado VARCHAR(50) NOT NULL,
            apellidosAfiliado VARCHAR(50) NOT NULL,
            duiAfiliado VARCHAR(10) NOT NULL,
            nitAfiliado VARCHAR(17) NOT NULL,
            fechaNacimientoAfiliado VARCHAR(10) NOT NULL,
            estadoCivilAfiliado VARCHAR(50) NOT NULL,
            cargoAfiliado VARCHAR(50) NOT NULL,
            sueldoAfiliado VARCHAR(50) NOT NULL,
            direccionAfiliado VARCHAR(100) NOT NULL,
            nacionalidadAfiliado VARCHAR(25) NOT NULL,
            profesionAfiliado VARCHAR(50) NOT NULL,
            contactoAfiliado VARCHAR(50) NOT NULL,
            estadoAfiliado BOOLEAN NOT NULL,
            timestamp TIMESTAMP
        );";
        $sqlTB="CREATE TABLE beneficiario(
            id INT(11) AUTO_INCREMENT PRIMARY KEY,
            nombreBeneficiario VARCHAR(50) NOT NULL,
            parentesco VARCHAR(25) NOT NULL,
            porcentaje VARCHAR(10) NOT NULL,
            contactoBeneficiario VARCHAR(17) NOT NULL,
            id_Afiliado INT(11),
            timestamp TIMESTAMP
        );";
        $sqlTC="CREATE TABLE credito(
            id INT(11) AUTO_INCREMENT PRIMARY KEY,
            fechaCredito VARCHAR(50) NOT NULL,
            monto INT(25) NOT NULL,
            tasaInteres INT(10) NOT NULL,
            plazo VARCHAR(30) NOT NULL,
            pagoMensual FLOAT(50) NOT NULL,
            id_Afiliado INT(11),
            timestamp TIMESTAMP
        );";

        if ($conexionT->query($sqlTA) === TRUE && $conexionT->query($sqlTB) === TRUE && $conexionT->query($sqlTC) === TRUE) {
            # code...
            echo "Tabla Creada exitosamente.";
        }else{
            die("Error al Crear Base de Datos. ". $conexionT->error);
        }
    }else{
        die("Error al Crear Base de Datos.".$conexion->error);
    }
    
?>