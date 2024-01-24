CREATE DATABASE IF NOT EXISTS finanzaspro;
USE finanzaspro;

DROP TABLE IF EXISTS categorias;

CREATE TABLE `categorias` (
  `id_categoria` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `tipo_movimiento` int(11) NOT NULL,
  `tipo_gasto` int(11) NOT NULL,
  `mostrar` char(1) DEFAULT '1',
  `orden` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_categoria`),
  UNIQUE KEY `id_categoria_UNIQUE` (`id_categoria`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

DROP TABLE IF EXISTS movimientos;

CREATE TABLE `movimientos` (
  `id_movimiento` int(11) NOT NULL AUTO_INCREMENT,
  `id_presupuesto` int(11) NOT NULL,
  `importe` float(10,2) NOT NULL,
  `detalle` varchar(200) NOT NULL,
  `fcarga` datetime NOT NULL,
  PRIMARY KEY (`id_movimiento`),
  UNIQUE KEY `id_movimiento_UNIQUE` (`id_movimiento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

DROP TABLE IF EXISTS presupuestos;

CREATE TABLE `presupuestos` (
  `id_presupuesto` int(11) NOT NULL AUTO_INCREMENT,
  `anio` int(11) NOT NULL,
  `mes` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `importe` float(10,2) NOT NULL,
  `fcarga` datetime NOT NULL,
  `mostrar` char(1) DEFAULT NULL,
  `orden` int(11) DEFAULT NULL,
  `presupuesto_diario` char(1) DEFAULT '0',
  `es_global` char(1) DEFAULT '0',
  PRIMARY KEY (`id_presupuesto`),
  UNIQUE KEY `id_presupuesto_UNIQUE` (`id_presupuesto`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci

DROP TABLE IF EXISTS tipo_gasto;

CREATE TABLE `tipo_gasto` (
  `id_tipo_gasto` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_gasto` varchar(200) NOT NULL,
  `fcarga` datetime NOT NULL,
  PRIMARY KEY (`id_tipo_gasto`),
  UNIQUE KEY `id_tipo_gasto_UNIQUE` (`id_tipo_gasto`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

DROP TABLE IF EXISTS tipo_movimiento;

CREATE TABLE `tipo_movimiento` (
  `id_tipo_movimiento` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_movimiento` varchar(200) NOT NULL,
  `fcarga` datetime NOT NULL,
  PRIMARY KEY (`id_tipo_movimiento`),
  UNIQUE KEY `id_tipo_motivo_UNIQUE` (`id_tipo_movimiento`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

DROP TABLE IF EXISTS gastos_fijos;

CREATE TABLE `gastos_fijos` (
  `id_gasto_fijo` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `mes` int(11) NOT NULL,
  `anio` int(11) NOT NULL,
  `importe` float(10,2) NOT NULL,
  `detalle` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `son_cuotas` char(1) COLLATE utf8_spanish_ci DEFAULT NULL,
  `cuota_actual` char(2) COLLATE utf8_spanish_ci DEFAULT NULL,
  `total_cuotas` char(2) COLLATE utf8_spanish_ci DEFAULT NULL,
  `pago` char(1) COLLATE utf8_spanish_ci DEFAULT '0',
  `fpago` date DEFAULT NULL,
  `fcarga` datetime NOT NULL,
  `fvencimiento` date DEFAULT NULL,
  `ahorro_porcentaje` float(10,2) DEFAULT NULL,
  PRIMARY KEY (`id_gasto_fijo`),
  UNIQUE KEY `id_gasto_fijo_UNIQUE` (`id_gasto_fijo`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;


TRUNCATE TABLE tipo_gasto;
INSERT INTO `tipo_gasto` (`id_tipo_gasto`,`tipo_gasto`,`fcarga`) VALUES (1,'Gasto Fijo',current_date());
INSERT INTO `tipo_gasto` (`id_tipo_gasto`,`tipo_gasto`,`fcarga`) VALUES (2,'Gasto Variable',current_date());
INSERT INTO `tipo_gasto` (`id_tipo_gasto`,`tipo_gasto`,`fcarga`) VALUES (3,'Ingreso',current_date());

TRUNCATE TABLE tipo_movimiento;
INSERT INTO `tipo_movimiento` (`id_tipo_movimiento`,`tipo_movimiento`,`fcarga`) VALUES (1,'Gasto',current_date());
INSERT INTO `tipo_movimiento` (`id_tipo_movimiento`,`tipo_movimiento`,`fcarga`) VALUES (2,'Ingreso',current_date());

TRUNCATE TABLE categorias;
INSERT INTO `categorias` (`id_categoria`,`nombre`,`tipo_movimiento`,`tipo_gasto`,`mostrar`,`orden`) VALUES (1,'Gastos diarios',3,5,'0',1);
INSERT INTO `categorias` (`id_categoria`,`nombre`,`tipo_movimiento`,`tipo_gasto`,`mostrar`,`orden`) VALUES (2,'Combustible',3,5,'0',2);
INSERT INTO `categorias` (`id_categoria`,`nombre`,`tipo_movimiento`,`tipo_gasto`,`mostrar`,`orden`) VALUES (3,'Verduleria',3,5,'0',3);
INSERT INTO `categorias` (`id_categoria`,`nombre`,`tipo_movimiento`,`tipo_gasto`,`mostrar`,`orden`) VALUES (4,'Carniceria',3,5,'0',4);
INSERT INTO `categorias` (`id_categoria`,`nombre`,`tipo_movimiento`,`tipo_gasto`,`mostrar`,`orden`) VALUES (5,'Pescaderia',3,5,'0',5);
INSERT INTO `categorias` (`id_categoria`,`nombre`,`tipo_movimiento`,`tipo_gasto`,`mostrar`,`orden`) VALUES (6,'Sueldo SPB',4,6,'0',6);
INSERT INTO `categorias` (`id_categoria`,`nombre`,`tipo_movimiento`,`tipo_gasto`,`mostrar`,`orden`) VALUES (7,'Global',3,6,'0',0);
