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
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

INSERT INTO afiliados VALUES("1","Roberto","Hernandez","2019919-1","029-292828-282-8","2001-01-01","Casado/a","Gerente general","700","avenida de los angeles","salvadoreÃ±a","licenciado contador","2019-1818","1","01/17/2020","");
INSERT INTO afiliados VALUES("2","Saul","Gomez","0928272-7","092-887171-717-1","2001-01-01","Soltero/a","Contador/a","700","barrio analco casa 30 c","salvadoreÃ±a","abogado","2991-7817","1","01/17/2020","");
INSERT INTO afiliados VALUES("3","Raul","Jimenez","0918171-7","019-918811-111-1","2001-01-01","AcompaÃ±ado/a","Contador/a","690","barrio el carmen casa 23 c","salvadoreÃ±a","bachiller","2991-0181","1","01/17/2020","");
INSERT INTO afiliados VALUES("4","Felix","Sandoval","0928282-7","092-928282-828-2","2001-01-01","Soltero/a","Auxiliar","690","barrio el carmen casa 23 c","salvadoreÃ±a","bachiller","2991-0181","1","01/17/2020","");
INSERT INTO afiliados VALUES("5","Osar","Rivera","0992828-2","293-746667-766-6","2000-12-13","Divorciado/a","Secretario/a","400","barrio el carmen casa de esquina","salvadoreÃ±a","secretario","2777-3636","1","01/17/2020","");
INSERT INTO afiliados VALUES("6","Omar","quinteros","0992828-2","293-746667-766-6","2000-12-13","Divorciado/a","Secretario/a","400","barrio el carmen casa de esquina","salvadoreÃ±a","secretario","2777-3636","1","01/17/2020","");
INSERT INTO afiliados VALUES("7","Omar","quinteros","0992828-2","293-746667-766-6","2000-12-13","Divorciado/a","Secretario/a","400","barrio el carmen casa de esquina","salvadoreÃ±a","secretario","2777-3636","1","01/17/2020","");



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
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO beneficiario VALUES("1","Hugo","Federico","100","2899-1871","6","");
INSERT INTO beneficiario VALUES("2","Hugo","Federico","100","2899-1871","7","");



DROP TABLE IF EXISTS bitacora;

CREATE TABLE `bitacora` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Accion` varchar(50) NOT NULL,
  `usuario` varchar(30) NOT NULL,
  `timestamp` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO bitacora VALUES("1","Registrar Afiliado","AdministradoSACO","");



DROP TABLE IF EXISTS credito;

CREATE TABLE `credito` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fechaCredito` varchar(50) NOT NULL,
  `monto` int(25) NOT NULL,
  `tasaInteres` int(10) NOT NULL,
  `plazo` varchar(30) NOT NULL,
  `pagoMensual` double NOT NULL,
  `tipo` int(11) NOT NULL,
  `id_Afiliado` int(11) DEFAULT NULL,
  `timestamp` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO credito VALUES("1","2020-01-17","1000","5","22","47.727272727273","1","1","");
INSERT INTO credito VALUES("2","2020-04-17","1000","5","36","29.166666666667","1","1","");



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
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

INSERT INTO factura VALUES("1","1","2020-01-17","50","47.73","");
INSERT INTO factura VALUES("2","1","2020-01-17","50","47.73","");
INSERT INTO factura VALUES("3","1","2020-01-17","1","47.73","");
INSERT INTO factura VALUES("4","1","2020-03-17","1","47.73","");
INSERT INTO factura VALUES("5","1","2020-03-17","50","47.73","");
INSERT INTO factura VALUES("6","1","2020-04-17","25","20.7","");
INSERT INTO factura VALUES("7","1","2020-04-17","50","47.73","");



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
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

INSERT INTO pago VALUES("1","January","2020","1","6","1","","","");
INSERT INTO pago VALUES("2","January","2020","1","7","1","","","");
INSERT INTO pago VALUES("3","January","2020","1","1","1","6","1","");
INSERT INTO pago VALUES("4","February","2020","1","1","1","6","1","");
INSERT INTO pago VALUES("5","March","2020","1","1","1","6","0","");
INSERT INTO pago VALUES("6","April","2020","1","1","1","6","0","");



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
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO tipo_usuario VALUES("1","Administrador","");
INSERT INTO tipo_usuario VALUES("2","Usuario Comun","");



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
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

INSERT INTO usuarios VALUES("2","admin2019","$2y$10$VW0lTdbjqpU62QiYilWG6eN/XB/WZg.huOnVNJY9BZa/ALyXLTMPq","AdministradoSACO","monterrosadelgado@gmail.com","2020-01-17 08:53:32","1","8590d431e497bbcae773061fb2c98a29","","0","2","");
INSERT INTO usuarios VALUES("3","ben10","$2y$10$GMZwWjgZM1BlojuLXUtS5u/wgXUj6lI97kqAliqGcjAja/1tEhu82","Benjamin","benjamindelgado1994@gmail.com","","0","54489dd307698c4acff205979f93f647","","0","2","");
INSERT INTO usuarios VALUES("4","ben21","$2y$10$cDImUfDoL3mLJJpM97mj7OFzwGXSdPzm8FmbBxJhCDJ2ZDKbGsyfK","Oniel","monterrosadelgado@hotmail.com","2020-01-17 09:08:33","1","74692914566c48cc8ad72d65c5600ac5","","0","2","");



SET FOREIGN_KEY_CHECKS=1;