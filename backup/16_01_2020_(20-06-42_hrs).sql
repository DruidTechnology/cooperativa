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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;




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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;




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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;




DROP TABLE IF EXISTS tipo_usuario;

CREATE TABLE `tipo_usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(50) NOT NULL,
  `timestamp` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO tipo_usuario VALUES("1","Administrador","");



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

INSERT INTO usuarios VALUES("1","admin","$2y$10$lr4f.RBXjKqAGwqzC1YL5.YryXyJJ3nTNWikgJ.ZNOM.5rGKkNTk2","AdministradorSACO","monterrosadelgado@gmail.com","2020-01-16 17:10:38","1","12d8cd65181b8db2a952548dcb29448e","","0","1","");



SET FOREIGN_KEY_CHECKS=1;