SET FOREIGN_KEY_CHECKS=0;

CREATE DATABASE IF NOT EXISTS saco_db;

USE saco_db;

DROP TABLE IF EXISTS afiliados;

CREATE TABLE `afiliados` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombreAfiliado` varchar(50) NOT NULL,
  `apellidosAfiliado` varchar(50) NOT NULL,
  `duiAfiliado` varchar(10) NOT NULL,
  `nitAfiliado` varchar(17) NOT NULL,
  `fechaNacimientoAfiliado` varchar(10) NOT NULL,
  `estadoCivilAfiliado` varchar(50) NOT NULL,
  `cargoAfiliado` varchar(50) NOT NULL,
  `sueldoAfiliado` varchar(50) NOT NULL,
  `direccionAfiliado` varchar(100) NOT NULL,
  `nacionalidadAfiliado` varchar(25) NOT NULL,
  `profesionAfiliado` varchar(50) NOT NULL,
  `contactoAfiliado` varchar(50) NOT NULL,
  `estadoAfiliado` tinyint(1) NOT NULL,
  `fechaIngreso` varchar(10) NOT NULL,
  `timestamp` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

INSERT INTO afiliados VALUES("1","Anastaci","Hernandez","0817727-2","122-999200-111-1","2001-01-01","Casado/a","Gerente general","800","avenida de los angeles","salvadoreÃ±a","licenciado en adminsitracion","2388-3733","1","01/17/2020","");
INSERT INTO afiliados VALUES("2","Gabriela","Gomez","0918811-1","029-288282-828-2","2001-01-01","AcompaÃ±ado/a","Administrador/a","400","santa rosa avenida critian","salvadoreÃ±a","contadora","2388-3773","1","01/17/2020","");
INSERT INTO afiliados VALUES("3","Federio","Dominguez","0918811-1","092-882882-772-2","2001-01-01","Divorciado/a","Auxiliar","504","barrio analco casa 32 c","salvadoreÃ±a","abogada","2662-5151","1","01/17/2020","");
INSERT INTO afiliados VALUES("4","blanca","Dominguez","3993888-2","299-928822-221-1","2001-01-01","Casado/a","Secretario/a","504","barrio el carmen casa 32 c","salvadoreÃ±a","secretaria","2992-8811","1","01/17/2020","");
INSERT INTO afiliados VALUES("5","Felix","Funes","0992882-7","101-992881-771-1","2001-01-01","Soltero/a","CAMZ","504","colonia el espino casa 32 c","salvadoreÃ±a","bachiller","2887-1711","1","01/17/2020","");



DROP TABLE IF EXISTS beneficiario;

CREATE TABLE `beneficiario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombreBeneficiario` varchar(50) NOT NULL,
  `parentesco` varchar(25) NOT NULL,
  `porcentaje` varchar(10) NOT NULL,
  `contactoBeneficiario` varchar(17) NOT NULL,
  `id_Afiliado` int(11) DEFAULT NULL,
  `timestamp` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO beneficiario VALUES("1","Silvia maria","hermana","100","2663-5333","2","");



DROP TABLE IF EXISTS bitacora;

CREATE TABLE `bitacora` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Accion` varchar(50) NOT NULL,
  `usuario` varchar(30) NOT NULL,
  `timestamp` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO bitacora VALUES("1","Registrar Afiliado","AdministradorSACO","");



DROP TABLE IF EXISTS credito;

CREATE TABLE `credito` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fechaCredito` varchar(50) NOT NULL,
  `monto` int(25) NOT NULL,
  `tasaInteres` int(10) NOT NULL,
  `plazo` varchar(30) NOT NULL,
  `pagoMensual` double NOT NULL,
  `id_Afiliado` int(11) DEFAULT NULL,
  `timestamp` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;




DROP TABLE IF EXISTS cuota;

CREATE TABLE `cuota` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `montoCuota` int(25) NOT NULL,
  `timestamp` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;




DROP TABLE IF EXISTS factura;

CREATE TABLE `factura` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_Afiliado` int(11) NOT NULL,
  `fecha_factura` date NOT NULL,
  `pago` double DEFAULT NULL,
  `total` double DEFAULT NULL,
  `timestamp` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;




DROP TABLE IF EXISTS pago;

CREATE TABLE `pago` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mesPago` varchar(10) NOT NULL,
  `annioPago` varchar(10) NOT NULL,
  `pagado` tinyint(1) DEFAULT NULL,
  `id_Afiliado` int(11) DEFAULT NULL,
  `id_cuota` int(11) DEFAULT NULL,
  `factura` int(11) DEFAULT NULL,
  `mora` tinyint(1) DEFAULT NULL,
  `timestamp` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_index` (`mesPago`,`annioPago`,`id_Afiliado`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO pago VALUES("1","January","2020","1","2","1","","","");



DROP TABLE IF EXISTS pagocredito;

CREATE TABLE `pagocredito` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mesPago` varchar(10) NOT NULL,
  `annioPago` varchar(10) NOT NULL,
  `pagado` tinyint(1) DEFAULT NULL,
  `id_credito` int(11) DEFAULT NULL,
  `factura` int(11) DEFAULT NULL,
  `timestamp` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;




DROP TABLE IF EXISTS tipo_usuario;

CREATE TABLE `tipo_usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(50) NOT NULL,
  `timestamp` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO tipo_usuario VALUES("1","Administrador","0000-00-00 00:00:00");



DROP TABLE IF EXISTS tipocredito;

CREATE TABLE `tipocredito` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(30) NOT NULL,
  `timestamp` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO tipocredito VALUES("1","prestamo","");
INSERT INTO tipocredito VALUES("2","ahorro","");
INSERT INTO tipocredito VALUES("3","credito extraordinario","");



DROP TABLE IF EXISTS usuarios;

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `last_session` datetime DEFAULT NULL,
  `activacion` int(11) NOT NULL,
  `token` varchar(50) NOT NULL,
  `token_password` varchar(100) DEFAULT NULL,
  `password_request` int(11) NOT NULL DEFAULT '0',
  `id_tipo` int(11) NOT NULL,
  `timestamp` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO usuarios VALUES("1","admin","$2y$10$lr4f.RBXjKqAGwqzC1YL5.YryXyJJ3nTNWikgJ.ZNOM.5rGKkNTk2","AdministradorSACO","monterrosadelgado@gmail.com","2020-01-17 07:58:43","1","12d8cd65181b8db2a952548dcb29448e","","0","1","0000-00-00 00:00:00");



SET FOREIGN_KEY_CHECKS=1;