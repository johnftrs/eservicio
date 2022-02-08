/*
SQLyog Community v13.1.9 (64 bit)
MySQL - 10.4.22-MariaDB : Database - csmmhom2_eservicio
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`csmmhom2_eservicio` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `csmmhom2_eservicio`;

/*Table structure for table `accountings` */

DROP TABLE IF EXISTS `accountings`;

CREATE TABLE `accountings` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `cantidad` double(15,2) NOT NULL,
  `meter_inicial` double(15,2) NOT NULL,
  `meter_final` double(15,2) NOT NULL,
  `tipo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `report_id` bigint(20) unsigned DEFAULT NULL,
  `dispenser_id` bigint(20) unsigned DEFAULT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `accountings_report_id_foreign` (`report_id`),
  KEY `accountings_dispenser_id_foreign` (`dispenser_id`),
  KEY `accountings_user_id_foreign` (`user_id`),
  CONSTRAINT `accountings_dispenser_id_foreign` FOREIGN KEY (`dispenser_id`) REFERENCES `dispensers` (`id`) ON DELETE CASCADE,
  CONSTRAINT `accountings_report_id_foreign` FOREIGN KEY (`report_id`) REFERENCES `reports` (`id`) ON DELETE CASCADE,
  CONSTRAINT `accountings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `accountings` */

insert  into `accountings`(`id`,`cantidad`,`meter_inicial`,`meter_final`,`tipo`,`report_id`,`dispenser_id`,`user_id`,`created_at`,`updated_at`,`deleted_at`) values 
(1,1000.00,6645539.45,6646539.45,NULL,1,21,1,'2022-02-02 12:35:05','2022-02-02 12:35:05',NULL),
(2,1000.00,4027370.33,4028370.33,NULL,1,22,1,'2022-02-02 12:35:05','2022-02-02 12:35:05',NULL),
(3,100.00,4793508.19,4793608.19,NULL,2,9,2,'2022-02-02 14:57:49','2022-02-02 14:57:49',NULL),
(4,100.00,1257875.64,1257975.64,NULL,3,12,2,'2022-02-02 14:58:24','2022-02-02 14:58:24',NULL),
(5,100.00,4793608.19,4793708.19,NULL,4,9,8,'2022-02-03 11:19:34','2022-02-03 11:19:34',NULL),
(6,100.00,3930395.23,3930495.23,NULL,4,10,8,'2022-02-03 11:19:34','2022-02-03 11:19:34',NULL),
(7,100.00,1610021.19,1610121.19,NULL,4,11,8,'2022-02-03 11:19:34','2022-02-03 11:19:34',NULL),
(8,100.00,3930495.23,3930595.23,NULL,5,10,8,'2022-02-03 11:21:16','2022-02-03 11:21:16',NULL),
(11,200.00,4793708.19,4793908.19,NULL,6,9,2,'2022-02-07 17:35:02','2022-02-07 17:35:02',NULL);

/*Table structure for table `asignations` */

DROP TABLE IF EXISTS `asignations`;

CREATE TABLE `asignations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `inicio` int(11) NOT NULL,
  `fin` int(11) NOT NULL,
  `estado` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `detalle` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_id` bigint(20) unsigned DEFAULT NULL,
  `lot_id` bigint(20) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `asignations_client_id_foreign` (`client_id`),
  CONSTRAINT `asignations_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `asignations` */

insert  into `asignations`(`id`,`inicio`,`fin`,`estado`,`fecha`,`detalle`,`client_id`,`lot_id`,`created_at`,`updated_at`) values 
(21,1,5,NULL,'2022-02-01',NULL,4,6,'2022-02-01 15:19:00','2022-02-01 15:19:00'),
(22,6,10,NULL,'2022-02-01',NULL,4,6,'2022-02-01 17:44:22','2022-02-01 17:44:22'),
(23,200,230,NULL,'2022-02-02',NULL,4,9,'2022-02-02 12:07:58','2022-02-02 12:07:58');

/*Table structure for table `banks` */

DROP TABLE IF EXISTS `banks`;

CREATE TABLE `banks` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cuenta` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `moneda` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `monto` double(15,2) DEFAULT NULL,
  `office_id` bigint(20) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `banks_office_id_foreign` (`office_id`),
  CONSTRAINT `banks_office_id_foreign` FOREIGN KEY (`office_id`) REFERENCES `offices` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `banks` */

insert  into `banks`(`id`,`nombre`,`cuenta`,`moneda`,`monto`,`office_id`,`created_at`,`updated_at`) values 
(1,'Banco Union','1 - 6381408','BS',108272.91,2,NULL,NULL);

/*Table structure for table `buy_sells` */

DROP TABLE IF EXISTS `buy_sells`;

CREATE TABLE `buy_sells` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `fecha_descarga` date DEFAULT NULL,
  `fecha_compra` date DEFAULT NULL,
  `hora_descarga` time DEFAULT NULL,
  `cantidad` double(15,2) DEFAULT NULL,
  `nro_compra` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `factura` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `papeleria` double(15,2) DEFAULT NULL,
  `adicional` double(15,2) DEFAULT NULL,
  `debito_banco` double(15,2) DEFAULT NULL,
  `vehiculo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `chofer` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `responsable` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `observaciones` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tipo` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_id` bigint(20) unsigned DEFAULT NULL,
  `tank_id` bigint(20) unsigned DEFAULT NULL,
  `office_id` bigint(20) unsigned DEFAULT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `buy_sells_bank_id_foreign` (`bank_id`),
  KEY `buy_sells_tank_id_foreign` (`tank_id`),
  KEY `buy_sells_office_id_foreign` (`office_id`),
  KEY `buy_sells_user_id_foreign` (`user_id`),
  CONSTRAINT `buy_sells_bank_id_foreign` FOREIGN KEY (`bank_id`) REFERENCES `banks` (`id`) ON DELETE SET NULL,
  CONSTRAINT `buy_sells_office_id_foreign` FOREIGN KEY (`office_id`) REFERENCES `offices` (`id`) ON DELETE CASCADE,
  CONSTRAINT `buy_sells_tank_id_foreign` FOREIGN KEY (`tank_id`) REFERENCES `tanks` (`id`) ON DELETE SET NULL,
  CONSTRAINT `buy_sells_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `buy_sells` */

insert  into `buy_sells`(`id`,`fecha_descarga`,`fecha_compra`,`hora_descarga`,`cantidad`,`nro_compra`,`factura`,`papeleria`,`adicional`,`debito_banco`,`vehiculo`,`chofer`,`responsable`,`observaciones`,`tipo`,`bank_id`,`tank_id`,`office_id`,`user_id`,`created_at`,`updated_at`) values 
(2,'2022-01-18','2022-01-18','08:00:00',14000.00,'001121544','1524',3.00,2.40,49567.80,'1881-FYT','Alfredo Guzman','Marina Caceres','DO 14000 LTRS','Compra',1,3,2,2,NULL,NULL),
(3,'2022-01-18','2022-01-18','08:00:00',14000.00,'123456789','1234',3.00,2.40,49567.80,'1590 - TRY','Alvaro Perez','Marina Caceres','DO 14000 Lts','Compra',1,7,2,2,NULL,NULL);

/*Table structure for table `clients` */

DROP TABLE IF EXISTS `clients`;

CREATE TABLE `clients` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `correo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `direccion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefono` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefono2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `representante_legal` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `representante_ci` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `representante_telefono` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `representante_telefono2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `representante_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `representante_detalles` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estado` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `office_id` bigint(20) unsigned DEFAULT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `clients_office_id_foreign` (`office_id`),
  KEY `clients_user_id_foreign` (`user_id`),
  CONSTRAINT `clients_office_id_foreign` FOREIGN KEY (`office_id`) REFERENCES `offices` (`id`) ON DELETE CASCADE,
  CONSTRAINT `clients_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `clients` */

insert  into `clients`(`id`,`nombre`,`nit`,`correo`,`direccion`,`telefono`,`telefono2`,`representante_legal`,`representante_ci`,`representante_telefono`,`representante_telefono2`,`representante_email`,`representante_detalles`,`estado`,`office_id`,`user_id`,`created_at`,`updated_at`,`deleted_at`) values 
(3,'Nuevo Cliente S2','49841651',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Activo',2,2,'2021-12-29 11:42:48','2021-12-29 11:42:48',NULL),
(4,'Empresa Municipal de servicios de Aseo','10240000018',NULL,'Av final circunvalacion','4235551','4235552','Raul Alvarez ','9847451 cb','Jaime Mamani','6514213 cb','emsa@gmail.com.bo',NULL,'Activo',1,2,'2022-01-22 02:19:43','2022-01-22 04:50:30',NULL),
(5,'Otros Clientes','17548111019',NULL,'Av Melchor perez de olguin zona hipodromo','4254188','4254189','Milton Lopez','9874444 cb','Elena saavedra','7845125 cb','otrosclientes@gmail.com',NULL,'Activo',1,2,'2022-01-22 02:22:57','2022-01-22 02:22:57',NULL),
(6,'Daoli SRL','974112200012',NULL,'AV PETROLERA KM 4','4222500','422501','Ivan Hidalgo','9874521cb','Erika Rocha','9854741 cb','clientesant@gmail.com.bo',NULL,'Activo',1,2,'2022-01-22 04:49:50','2022-01-27 22:29:36',NULL);

/*Table structure for table `conciliations` */

DROP TABLE IF EXISTS `conciliations`;

CREATE TABLE `conciliations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `fecha` date DEFAULT NULL,
  `fecha_deposito` date DEFAULT NULL,
  `fecha_conciliacion` date DEFAULT NULL,
  `deposito` double(15,2) DEFAULT NULL,
  `monto` double(15,2) DEFAULT NULL,
  `nro_deposito` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `observaciones` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_id` bigint(20) unsigned DEFAULT NULL,
  `office_id` bigint(20) unsigned DEFAULT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `conciliations_bank_id_foreign` (`bank_id`),
  KEY `conciliations_office_id_foreign` (`office_id`),
  KEY `conciliations_user_id_foreign` (`user_id`),
  CONSTRAINT `conciliations_bank_id_foreign` FOREIGN KEY (`bank_id`) REFERENCES `banks` (`id`) ON DELETE SET NULL,
  CONSTRAINT `conciliations_office_id_foreign` FOREIGN KEY (`office_id`) REFERENCES `offices` (`id`) ON DELETE CASCADE,
  CONSTRAINT `conciliations_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `conciliations` */

/*Table structure for table `dispensers` */

DROP TABLE IF EXISTS `dispensers`;

CREATE TABLE `dispensers` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meter` double(15,2) DEFAULT NULL,
  `fuel_id` bigint(20) unsigned DEFAULT NULL,
  `tank_id` bigint(20) unsigned DEFAULT NULL,
  `office_id` bigint(20) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `dispensers_fuel_id_foreign` (`fuel_id`),
  KEY `dispensers_tank_id_foreign` (`tank_id`),
  KEY `dispensers_office_id_foreign` (`office_id`),
  CONSTRAINT `dispensers_fuel_id_foreign` FOREIGN KEY (`fuel_id`) REFERENCES `fuels` (`id`) ON DELETE SET NULL,
  CONSTRAINT `dispensers_office_id_foreign` FOREIGN KEY (`office_id`) REFERENCES `offices` (`id`) ON DELETE SET NULL,
  CONSTRAINT `dispensers_tank_id_foreign` FOREIGN KEY (`tank_id`) REFERENCES `tanks` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `dispensers` */

insert  into `dispensers`(`id`,`nombre`,`meter`,`fuel_id`,`tank_id`,`office_id`) values 
(3,'Disp 01',1681295.58,6,6,2),
(4,'Disp 02',1414509.44,6,6,2),
(5,'Disp 03',2615258.93,6,6,2),
(6,'Disp 04',2154691.55,6,6,2),
(9,'GNV 01',4793908.19,1,1,1),
(10,'GNV 02',3930595.23,1,1,1),
(11,'GNV 03',1610121.19,1,1,1),
(12,'GNV 04',1257975.64,1,1,1),
(13,'GNV 05',2692092.18,1,1,1),
(14,'GNV 06',3265162.82,1,1,1),
(15,'GNV 07',6544915.17,1,1,1),
(16,'GNV 08',6889799.64,1,1,1),
(17,'DIESEL 09',5949348.45,4,7,1),
(18,'DIESEL 11',12148348.92,4,7,1),
(19,'DIESEL 13',3879989.62,4,7,1),
(20,'DIESEL 14',2928850.50,4,7,1),
(21,'GASOLINA 10',6646539.45,2,1,1),
(22,'GASOLINA 12',4028370.33,2,1,1);

/*Table structure for table `drivers` */

DROP TABLE IF EXISTS `drivers`;

CREATE TABLE `drivers` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ci` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paterno` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `materno` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `licencia` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estado` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_id` bigint(20) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `drivers_client_id_foreign` (`client_id`),
  CONSTRAINT `drivers_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `drivers` */

insert  into `drivers`(`id`,`nombre`,`ci`,`paterno`,`materno`,`licencia`,`estado`,`client_id`,`created_at`,`updated_at`) values 
(4,'Don Esteban',NULL,NULL,NULL,NULL,'Activo',3,NULL,NULL),
(5,'Alfredo','5641112','Guzman','Mariaca','5641112','Activo',4,NULL,NULL);

/*Table structure for table `factors` */

DROP TABLE IF EXISTS `factors`;

CREATE TABLE `factors` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `factor` double(12,5) NOT NULL,
  `fecha_inicial` date DEFAULT NULL,
  `fecha_final` date DEFAULT NULL,
  `office_id` bigint(20) unsigned DEFAULT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `factors_office_id_foreign` (`office_id`),
  KEY `factors_user_id_foreign` (`user_id`),
  CONSTRAINT `factors_office_id_foreign` FOREIGN KEY (`office_id`) REFERENCES `offices` (`id`) ON DELETE CASCADE,
  CONSTRAINT `factors_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `factors` */

/*Table structure for table `failed_jobs` */

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `failed_jobs` */

/*Table structure for table `fuels` */

DROP TABLE IF EXISTS `fuels`;

CREATE TABLE `fuels` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `precio_compra` double(15,2) DEFAULT NULL,
  `precio_venta` double(15,2) DEFAULT NULL,
  `unidad` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `office_id` bigint(20) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fuels_office_id_foreign` (`office_id`),
  CONSTRAINT `fuels_office_id_foreign` FOREIGN KEY (`office_id`) REFERENCES `offices` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `fuels` */

insert  into `fuels`(`id`,`nombre`,`precio_compra`,`precio_venta`,`unidad`,`office_id`) values 
(1,'GNV',1.66,1.66,'m3',1),
(2,'Gasolina',3.74,3.74,'L',1),
(3,'Gasolina Premium',4.79,4.79,'L',1),
(4,'Diesel',3.72,3.72,'L',1),
(6,'GNV',NULL,1.66,NULL,2);

/*Table structure for table `functionalities` */

DROP TABLE IF EXISTS `functionalities`;

CREATE TABLE `functionalities` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `label` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mostrar` tinyint(1) DEFAULT NULL,
  `menu_id` bigint(20) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `functionalities_code_unique` (`code`),
  UNIQUE KEY `functionalities_path_unique` (`path`),
  KEY `functionalities_menu_id_foreign` (`menu_id`),
  CONSTRAINT `functionalities_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=70 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `functionalities` */

insert  into `functionalities`(`id`,`code`,`label`,`path`,`mostrar`,`menu_id`) values 
(1,'CROL','Crear Rol','admin/role/create',0,1),
(2,'EROL','Editar Rol','admin/role/edit',0,1),
(3,'DROL','Eliminar ROl','admin/role/delete',0,1),
(4,'ROL','Ver Roles','admin/role',1,1),
(5,'CUSE','Registrar Usuario','user/create',0,2),
(6,'EUSE','Editar Usuario','user/edit',0,2),
(7,'DUSE','Eliminar Usuario','user/delete',0,2),
(8,'USE','Ver Usuarios','user',1,2),
(9,'CMEN','Crear Menu','admin/menu/create',0,3),
(10,'EMEN','Editar Menu','admin/menu/edit',0,3),
(11,'DMEN','Eliminar Menu','admin/menu/delete',0,3),
(12,'MEN','Ver Menus','admin/menu',1,3),
(13,'CFUN','Crear Funcionalidad','admin/functionality/create',0,4),
(14,'EFUN','Editar Funcionalidad','admin/functionality/edit',0,4),
(15,'DFUN','Eliminar Funcionalid','admin/functionality/edlete',0,4),
(16,'FUN','Ver Funcionnalidades','admin/functionality',1,4),
(17,'COFF','Crear Sucursal','admin/office/create',0,5),
(18,'EOFF','Editar Sucursal','admin/office/edit',0,5),
(19,'DOFF','Eliminar Sucursal','admin/office/delete',0,5),
(20,'OFF','Ver Sucursales','admin/office',1,5),
(21,'CCLI','Registrar Cliente','admin/client/create',0,6),
(22,'ECLI','Editar Cliente','admin/client/edit',0,6),
(23,'DCLI','Eliminar Cliente','admin/client/delete',0,6),
(24,'CLI','Ver clientes','admin/client',1,6),
(25,'CDIS','Registrar Dispenser','admin/dispenser/create',0,7),
(26,'EDIS','Editar Dispenser','admin/dispenser/edit',0,7),
(27,'DDIS','Eliminar Dispenser','admin/dispenser/delete',0,7),
(28,'DIS','Ver Dispensers','admin/dispenser',1,7),
(29,'CTIC','Crear Vale','admin/ticket/create',0,8),
(30,'ETIC','Editar Vale','admin/ticket/edit',0,8),
(31,'DTIC','Eliminar Ticket','admin/ticket/delete',0,8),
(32,'TIC','Lotes de Vales','admin/ticket',1,8),
(33,'CFUE','Registrar Combustibl','admin/fuel/create',0,9),
(34,'EFUE','Editar Combustible','admin/fuel/edit',0,9),
(35,'DFUE','Eliminar Combustible','admin/fuel/delete',0,9),
(36,'FUE','Ver Combustibles','admin/fuel',1,9),
(37,'CARQ','Registrar Arqueo','admin/arching/create',0,10),
(38,'EARQ','Editar Arqueo','admin/arching/edit',0,10),
(39,'DARQ','Eliminar Arqueo','admin/arching/delete',0,10),
(40,'ARQ','Ver Arqueos','admin/arching',1,10),
(41,'MTUR','Crear Turno','admin/turn/create',0,11),
(42,'ETUR','Editar Turno','admin/turn/edit',0,11),
(43,'DTUR','Eliminar Turno','admin/turn/delete',0,11),
(44,'TUR','Ver Turnos','admin/turn',1,11),
(45,'RMOVD','Movimiento Diario','admin/report/movimiento_diario',1,12),
(46,'RMPF','Mov por Fechas','admin/report/movimiento_por_fechas',1,12),
(47,'RAPDI','Arqueos x Dispensers','admin/report/reportes_dispensers',0,12),
(48,'CCOM','Registrar Compra de ','admin/buysell/create',0,13),
(49,'ECOM','Ediar Compra','admin/buysell/edit',0,13),
(50,'DCOM','Eliminar Compra','admin/buysell/delete',0,13),
(51,'COM','Ver Compras','admin/buysell',1,13),
(52,'CBAN','Registrar Banco','admin/bank/create',0,14),
(53,'EBAN','Editar Banco','admin/bank/edit',0,14),
(54,'DBAN','Borrar Banco','admin/bank/delete',0,14),
(55,'BAN','Bancos','admin/bank',1,14),
(56,'CFAC','Crear Factor','admin/factor/create',0,15),
(57,'EFAC','Editar Factor','admin/factor/edit',0,15),
(58,'DFAC','Eliminar Factor','admin/factor/delete',0,15),
(59,'FAC','Factor GNV','admin/factor',1,15),
(60,'CLEC','Crear Lectura','admin/lectura/create',0,15),
(61,'ELEC','Editar Lectura','admin/lectura/edit',0,15),
(62,'DLEC','Eliminar Lectura','admin/lectura/delete',0,15),
(63,'LEC','Lecturas PRM','admin/lectura',1,15),
(64,'RCNTR','Cuadro de Control','admin/report/cuadro_de_control',1,15),
(65,'CCON','Crear Consolidacion','admin/conciliation/create',0,16),
(66,'ECON','Editar Consolidacion','admin/conciliation/edit',0,16),
(67,'DCON','Eliminar Consolidaci','admin/conciliation/delete',0,16),
(68,'CON','Ver Consolidaciones','admin/conciliation',1,16),
(69,'ASIG','Asignar a Cliente','admin/asignations/ticket',1,8);

/*Table structure for table `humans` */

DROP TABLE IF EXISTS `humans`;

CREATE TABLE `humans` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nombre_completo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ci` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `direccion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zona` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefono` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefono2` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nivel_estudio` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estado_civil` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hijos` int(11) DEFAULT NULL,
  `ex_empresa` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ex_cargo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ex_tiempo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ex_jefe` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ex_renuncia` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ex_observaciones` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fecha_ingreso` date DEFAULT NULL,
  `fecha_retiro` date DEFAULT NULL,
  `casillero` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `siges` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `biometrico` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `softcontrol` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cuenta_bmsc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `afp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nombre_garante` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `relacion_garante` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefono_garante` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trabajo_garante` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `direccion_garante` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nombre_referencia_personal` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `relacion_referencia_personal` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefono_referencia_personal` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trabajo_referencia_personal` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `direccion_referencia_personal` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `office_id` bigint(20) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `humans_office_id_foreign` (`office_id`),
  CONSTRAINT `humans_office_id_foreign` FOREIGN KEY (`office_id`) REFERENCES `offices` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `humans` */

insert  into `humans`(`id`,`password`,`nombre_completo`,`ci`,`fecha_nacimiento`,`direccion`,`zona`,`telefono`,`telefono2`,`nivel_estudio`,`estado_civil`,`hijos`,`ex_empresa`,`ex_cargo`,`ex_tiempo`,`ex_jefe`,`ex_renuncia`,`ex_observaciones`,`fecha_ingreso`,`fecha_retiro`,`casillero`,`siges`,`biometrico`,`softcontrol`,`cuenta_bmsc`,`afp`,`foto`,`nombre_garante`,`relacion_garante`,`telefono_garante`,`trabajo_garante`,`direccion_garante`,`nombre_referencia_personal`,`relacion_referencia_personal`,`telefono_referencia_personal`,`trabajo_referencia_personal`,`direccion_referencia_personal`,`office_id`,`created_at`,`updated_at`,`deleted_at`) values 
(1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,'2022-01-14 05:04:39','2022-01-14 05:04:45',NULL),
(2,'adminhappy123','Administrador','123456','1979-03-05','Dirección','Zona','78784545','456123','Grado de estudio','Soltero',0,'Empresa X','Administrador','6 meses','Nombre','Renuncia','Observacionas','2022-01-01',NULL,'1','Usuario123456','1','00000000','4040404040','FUTURO','storage/photos/user_2.JPG','Garante','Parentesco Garante','70707070','Trabajo Garante','Dirección Garante','Referencia Personal','Parentesco Referencia','76767676','Ocupación Referencia Personal','Dirección Referencia Personal',1,'2022-01-14 05:04:41','2022-01-14 05:04:47',NULL),
(3,'Operador',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'storage/photos/user_3.JPG',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,'2022-01-14 05:04:43','2022-01-14 05:04:48',NULL),
(4,'Jhenny','Jhenny Huaytari Calizaya','9388893 cb','1995-01-20','Av. Innominada y Calle Los Bosques','1 de Mayo','77979996','n/t','Bachiller','Casada',3,'Panadería Montaño','Repartidora','6 meses','Griseley Montaño','Por motivos familiares','Trabajo en sucre','2021-09-01',NULL,'11','JHENNY/8893','9','9388893/8893','4029952292','FUTURO','storage/photos/user_4.JPG','Victor Eduardo Rodriguez Tola','Esposo','77418199','Albañil','Misma dirección','Marisol Huayta Calizaya','Hermana','76441302','Cajera en Cafetería','Misma dirección',1,NULL,NULL,NULL),
(5,'dsa',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL),
(6,'0109','Junior Jesus Guillen Alvarado','14700109','1999-11-07','Av. Melchor Prez y Calle La Merced','Mayorazgo','75494086','0','Bachiller','Soltero',0,'E.S. LAS PALMERAS','Operador','3 Meses','0','Culminacion de contrato','0','2021-09-01','2021-11-28','5','JUNIOR/0109','12','14700109/0109','4066652059','FUTURO','storage/photos/user_6.JPG','Jose Luis Alvarado Quinteros','Tio','67570689','Chofer de taxi','Misma direccion del operador','Toribia Quinteros Nuñez','Abuela','4420011','Ama de casa','Misma direccion del operador',1,NULL,NULL,NULL),
(7,'0664','Jacquelin Hinojosa Huanca','7860664','2000-08-15','Av. Innominada y Calle Los Bosques','Tacata','72704019','0','Bachiller','Casada',0,'CHANST Y UUON','Vendedora de ropa','1 mes','Fabio','Falta de pago','0','2021-12-02','2022-02-28','5','JACQUELIN/0664','9','7860664/0664','4070842931','Futuro','storage/photos/user_7.JPG','Sandra Huanca Fernandez','Mama','67583269','Comerciante de abarrotes','Misma direccion del operador','Ivan Hinojosa Huanca','Hermano','75901232','Estudiante','Misma direccion del operador',1,NULL,NULL,NULL),
(8,'2509','Galia Hefziba Quiroga Carrasco','9422509','1997-07-15','Av.Simon Lopez y Calle 12 de Octubre','Colquiri Norte','65342074','0','Bachiller','Soltera',1,'E.S. ASUNCION','Operadora ','1 Mes','0','Problemas de salud','0','2021-11-06','2022-02-02','8','GALIA/2509','6','9422509/2509','4069994655','FUTURO','storage/photos/user_8.JPG','Paola Ivanna Carrasco Covarrubias','Mama','79758430','Ama de casa','Misma direccion del operador','Ivan Quiroga Carrasco','Hermano','62722072','Repartidor delivery','Misma direccion del operador',1,NULL,NULL,NULL),
(9,'6414','Adriana Ariel Quiroga Carrasco','9316414','1995-09-05','Av.Simon Lopez y Calle Colquiri Sud','Colquiri Sud','70792997','0','Bachiller','Soltera',0,'E.S. CNG','Operadora','6 Meses','David Escobar','Retiro Voluntario','0','2021-07-01','2021-09-27','1','ARIEL/6414','5','9316414/6414','4067579475','FUTURO','storage/photos/user_9.JPG','Victor Hugo Lia Rudon','Amigo','70723827','Chofer taxi particular','Av. Republica y Calle Honduras','Paola Ivanna Carrasco Covarrubias','Mama','79758430','Ama de casa','Misma direccion del operador',1,NULL,NULL,NULL);

/*Table structure for table `lots` */

DROP TABLE IF EXISTS `lots`;

CREATE TABLE `lots` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `inicio` int(11) NOT NULL,
  `fin` int(11) NOT NULL,
  `fecha` date DEFAULT NULL,
  `serie` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `office_id` bigint(20) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `lots_office_id_foreign` (`office_id`),
  CONSTRAINT `lots_office_id_foreign` FOREIGN KEY (`office_id`) REFERENCES `offices` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `lots` */

insert  into `lots`(`id`,`inicio`,`fin`,`fecha`,`serie`,`office_id`,`created_at`,`updated_at`) values 
(6,1,10,'2022-02-01','A',1,'2022-02-01 14:01:30','2022-02-01 14:01:30'),
(7,1,15,'2022-02-01','B',1,'2022-02-01 14:23:14','2022-02-01 14:23:14'),
(9,200,300,'2022-02-02','CC',1,'2022-02-02 11:40:20','2022-02-02 11:40:20');

/*Table structure for table `mensurations` */

DROP TABLE IF EXISTS `mensurations`;

CREATE TABLE `mensurations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `lectura` int(11) NOT NULL,
  `fecha` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `observaciones` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `office_id` bigint(20) unsigned DEFAULT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `mensurations_office_id_foreign` (`office_id`),
  KEY `mensurations_user_id_foreign` (`user_id`),
  CONSTRAINT `mensurations_office_id_foreign` FOREIGN KEY (`office_id`) REFERENCES `offices` (`id`) ON DELETE CASCADE,
  CONSTRAINT `mensurations_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `mensurations` */

/*Table structure for table `menus` */

DROP TABLE IF EXISTS `menus`;

CREATE TABLE `menus` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `label` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `orden` int(11) DEFAULT NULL,
  `tamanyo` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `menus_code_unique` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `menus` */

insert  into `menus`(`id`,`code`,`label`,`icon`,`orden`,`tamanyo`) values 
(1,'MROL','Roles','key',22,0),
(2,'MUSE','Usuarios','account',21,0),
(3,'MMEN','Menus','apps',1,0),
(4,'MFUN','Funcionalidades','key',2,0),
(5,'MOFF','Sucursal','city',5,0),
(6,'MCLI','Clientes','human-handsup',9,0),
(7,'MDIS','Dispensers','gas-station',8,0),
(8,'MTIC','Vales','ticket-confirmation',11,60),
(9,'MFUE','Combustible','fuel',6,0),
(10,'MARQ','Arqueo','cash-multiple',18,0),
(11,'MTUR','Turnos','clock',23,0),
(12,'MREP','Reportes','book-open-page-variant',19,100),
(13,'MCOM','Compra Cmble','truck',7,0),
(14,'MBAN','Bancos','bank',10,0),
(15,'MLEC','Lecturas GNV','clipboard-text',24,100),
(16,'MCON','Consolidación','briefcase-check',20,0);

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values 
(1,'2014_09_14_223237_create_roles_table',1),
(2,'2014_10_12_000000_create_users_table',1),
(3,'2014_10_12_100000_create_password_resets_table',1),
(4,'2019_08_19_000000_create_failed_jobs_table',1),
(5,'2019_12_14_000001_create_personal_access_tokens_table',1),
(6,'2021_12_14_223456_create_menus_table',1),
(7,'2021_12_14_223515_create_functionalities_table',1),
(8,'2021_12_14_223612_create_privileges_table',1),
(9,'2021_12_14_223715_create_offices_table',1),
(10,'2021_12_14_223738_create_fuels_table',1),
(11,'2021_12_14_223812_create_tanks_table',1),
(12,'2021_12_14_223815_create_dispensers_table',1),
(13,'2021_12_14_223859_create_turns_table',1),
(14,'2021_12_14_223918_create_clients_table',1),
(15,'2021_12_14_223938_create_vehicles_table',1),
(16,'2021_12_14_223954_create_drivers_table',1),
(17,'2021_12_14_224029_create_reports_table',1),
(18,'2021_12_14_224048_create_accountings_table',1),
(19,'2021_12_14_224115_create_humans_table',1),
(20,'2022_01_18_151857_create_banks_table',1),
(21,'2022_01_18_153500_create_buy_sells_table',1),
(22,'2022_01_25_102121_create_factors_table',1),
(23,'2022_01_25_102327_create_mensurations_table',1),
(24,'2022_01_27_092751_create_conciliations_table',1),
(25,'2022_01_27_093157_create_padlocks_table',1),
(27,'2021_12_14_224038_create_asignations_table',2),
(28,'2021_12_14_224039_create_lots_table',2),
(29,'2021_12_14_224040_create_tickets_table',2);

/*Table structure for table `offices` */

DROP TABLE IF EXISTS `offices`;

CREATE TABLE `offices` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefono` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ciudad` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `direccion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `offices` */

insert  into `offices`(`id`,`nombre`,`nit`,`telefono`,`ciudad`,`direccion`) values 
(1,'E.S. HIPODROMO','1000123456','78786464','Cochabamba - Bolivia','Av. Merchor Perez de Olguin Esq, C. Nueva Granada, Cochabamba'),
(2,'E.S. SIGLO XX',NULL,'78786565','COCHABAMBA - BOLIVIA','Av. Siglo XX Esq. Pedro de Toledo, Cochabamba');

/*Table structure for table `padlocks` */

DROP TABLE IF EXISTS `padlocks`;

CREATE TABLE `padlocks` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `mes` int(11) NOT NULL,
  `anyo` int(11) NOT NULL,
  `fecha` date DEFAULT NULL,
  `observaciones` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `office_id` bigint(20) unsigned DEFAULT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `padlocks_office_id_foreign` (`office_id`),
  KEY `padlocks_user_id_foreign` (`user_id`),
  CONSTRAINT `padlocks_office_id_foreign` FOREIGN KEY (`office_id`) REFERENCES `offices` (`id`) ON DELETE CASCADE,
  CONSTRAINT `padlocks_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `padlocks` */

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_resets` */

/*Table structure for table `personal_access_tokens` */

DROP TABLE IF EXISTS `personal_access_tokens`;

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `personal_access_tokens` */

/*Table structure for table `privileges` */

DROP TABLE IF EXISTS `privileges`;

CREATE TABLE `privileges` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `functionality_id` bigint(20) unsigned NOT NULL,
  `role_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `privileges_functionality_id_foreign` (`functionality_id`),
  KEY `privileges_role_id_foreign` (`role_id`),
  CONSTRAINT `privileges_functionality_id_foreign` FOREIGN KEY (`functionality_id`) REFERENCES `functionalities` (`id`) ON DELETE CASCADE,
  CONSTRAINT `privileges_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=989 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `privileges` */

insert  into `privileges`(`id`,`functionality_id`,`role_id`) values 
(180,32,4),
(181,37,4),
(182,40,4),
(813,1,1),
(814,2,1),
(815,3,1),
(816,4,1),
(817,5,1),
(818,6,1),
(819,7,1),
(820,8,1),
(821,9,1),
(822,10,1),
(823,11,1),
(824,12,1),
(825,13,1),
(826,14,1),
(827,15,1),
(828,16,1),
(829,17,1),
(830,18,1),
(831,19,1),
(832,20,1),
(833,21,1),
(834,22,1),
(835,23,1),
(836,24,1),
(837,25,1),
(838,26,1),
(839,27,1),
(840,28,1),
(841,29,1),
(842,30,1),
(843,31,1),
(844,32,1),
(845,33,1),
(846,34,1),
(847,35,1),
(848,36,1),
(849,37,1),
(850,38,1),
(851,39,1),
(852,40,1),
(853,41,1),
(854,42,1),
(855,43,1),
(856,44,1),
(857,45,1),
(858,46,1),
(859,47,1),
(860,48,1),
(861,49,1),
(862,50,1),
(863,51,1),
(864,52,1),
(865,53,1),
(866,54,1),
(867,55,1),
(868,56,1),
(869,57,1),
(870,58,1),
(871,59,1),
(872,60,1),
(873,61,1),
(874,62,1),
(875,63,1),
(876,64,1),
(877,65,1),
(878,66,1),
(879,67,1),
(880,68,1),
(881,69,1),
(882,1,2),
(883,2,2),
(884,3,2),
(885,4,2),
(886,5,2),
(887,6,2),
(888,7,2),
(889,8,2),
(890,17,2),
(891,18,2),
(892,19,2),
(893,20,2),
(894,21,2),
(895,22,2),
(896,23,2),
(897,24,2),
(898,25,2),
(899,27,2),
(900,28,2),
(901,29,2),
(902,30,2),
(903,31,2),
(904,32,2),
(905,33,2),
(906,34,2),
(907,35,2),
(908,36,2),
(909,37,2),
(910,38,2),
(911,39,2),
(912,40,2),
(913,41,2),
(914,42,2),
(915,43,2),
(916,44,2),
(917,45,2),
(918,46,2),
(919,47,2),
(920,48,2),
(921,49,2),
(922,50,2),
(923,51,2),
(924,52,2),
(925,53,2),
(926,54,2),
(927,55,2),
(928,56,2),
(929,57,2),
(930,58,2),
(931,59,2),
(932,60,2),
(933,61,2),
(934,62,2),
(935,63,2),
(936,64,2),
(937,65,2),
(938,66,2),
(939,67,2),
(940,68,2),
(941,69,2),
(942,5,3),
(943,6,3),
(944,8,3),
(945,21,3),
(946,22,3),
(947,23,3),
(948,24,3),
(949,25,3),
(950,26,3),
(951,28,3),
(952,29,3),
(953,30,3),
(954,31,3),
(955,32,3),
(956,33,3),
(957,34,3),
(958,36,3),
(959,37,3),
(960,39,3),
(961,40,3),
(962,41,3),
(963,42,3),
(964,44,3),
(965,45,3),
(966,46,3),
(967,48,3),
(968,49,3),
(969,50,3),
(970,51,3),
(971,52,3),
(972,53,3),
(973,54,3),
(974,55,3),
(975,56,3),
(976,57,3),
(977,58,3),
(978,59,3),
(979,60,3),
(980,61,3),
(981,62,3),
(982,63,3),
(983,64,3),
(984,65,3),
(985,66,3),
(986,67,3),
(987,68,3),
(988,69,3);

/*Table structure for table `reports` */

DROP TABLE IF EXISTS `reports`;

CREATE TABLE `reports` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `fecha` date DEFAULT NULL,
  `monto_total` double(15,2) DEFAULT NULL,
  `efectivo` double(15,2) DEFAULT NULL,
  `tarjeta` double(15,2) DEFAULT NULL,
  `firmado` varchar(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `calibracion` double(15,2) DEFAULT NULL,
  `_200` int(11) DEFAULT NULL,
  `_100` int(11) DEFAULT NULL,
  `_50` int(11) DEFAULT NULL,
  `_20` int(11) DEFAULT NULL,
  `_10` int(11) DEFAULT NULL,
  `monedas` double(15,2) NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `turn_id` bigint(20) unsigned DEFAULT NULL,
  `office_id` bigint(20) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `reports_user_id_foreign` (`user_id`),
  KEY `reports_turn_id_foreign` (`turn_id`),
  KEY `reports_office_id_foreign` (`office_id`),
  CONSTRAINT `reports_office_id_foreign` FOREIGN KEY (`office_id`) REFERENCES `offices` (`id`) ON DELETE CASCADE,
  CONSTRAINT `reports_turn_id_foreign` FOREIGN KEY (`turn_id`) REFERENCES `turns` (`id`) ON DELETE CASCADE,
  CONSTRAINT `reports_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `reports` */

insert  into `reports`(`id`,`fecha`,`monto_total`,`efectivo`,`tarjeta`,`firmado`,`calibracion`,`_200`,`_100`,`_50`,`_20`,`_10`,`monedas`,`user_id`,`turn_id`,`office_id`,`created_at`,`updated_at`,`deleted_at`) values 
(1,'2022-02-02',7480.00,7480.00,0.00,NULL,0.00,15,26,27,20,12,10.00,1,5,1,'2022-02-02 12:35:05','2022-02-02 12:35:05',NULL),
(2,'2022-02-02',166.00,166.00,0.00,NULL,0.00,0,0,0,0,0,166.00,2,6,1,'2022-02-02 14:57:49','2022-02-02 14:57:49',NULL),
(3,'2022-02-02',0.00,0.00,0.00,NULL,0.00,0,0,0,0,0,0.00,2,6,1,'2022-02-02 14:58:24','2022-02-02 14:58:24',NULL),
(4,'2022-02-03',498.00,498.00,0.00,NULL,0.00,2,0,1,2,0,8.00,8,6,1,'2022-02-03 11:19:34','2022-02-03 11:19:34',NULL),
(5,'2022-02-03',166.00,166.00,0.00,NULL,0.00,0,1,1,0,1,6.00,8,7,1,'2022-02-03 11:21:16','2022-02-03 11:21:16',NULL),
(6,'2022-02-03',332.00,332.00,0.00,NULL,0.00,1,1,0,1,1,2.00,2,7,1,'2022-02-03 15:26:51','2022-02-07 17:35:02',NULL);

/*Table structure for table `roles` */

DROP TABLE IF EXISTS `roles`;

CREATE TABLE `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_code_unique` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `roles` */

insert  into `roles`(`id`,`code`,`name`) values 
(1,'ROOT','Root'),
(2,'SUP','Super Usuario'),
(3,'CON','Contador'),
(4,'OPE','Operador');

/*Table structure for table `tanks` */

DROP TABLE IF EXISTS `tanks`;

CREATE TABLE `tanks` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` double(15,2) DEFAULT NULL,
  `actual` double(15,2) DEFAULT NULL,
  `fuel_id` bigint(20) unsigned DEFAULT NULL,
  `office_id` bigint(20) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tanks_fuel_id_foreign` (`fuel_id`),
  KEY `tanks_office_id_foreign` (`office_id`),
  CONSTRAINT `tanks_fuel_id_foreign` FOREIGN KEY (`fuel_id`) REFERENCES `fuels` (`id`) ON DELETE SET NULL,
  CONSTRAINT `tanks_office_id_foreign` FOREIGN KEY (`office_id`) REFERENCES `offices` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `tanks` */

insert  into `tanks`(`id`,`nombre`,`total`,`actual`,`fuel_id`,`office_id`,`created_at`,`updated_at`) values 
(1,'Línea de Gas YPFB',NULL,NULL,1,1,NULL,NULL),
(3,'Tanque de Gasolina',40000.00,20000.00,2,1,NULL,NULL),
(5,'Tanque Gasolina Premium',40000.00,20000.00,3,1,NULL,NULL),
(6,'Línea YPFB',NULL,NULL,6,2,NULL,NULL),
(7,'TANQUE DIESEL',40000.00,20000.00,4,1,NULL,NULL);

/*Table structure for table `tickets` */

DROP TABLE IF EXISTS `tickets`;

CREATE TABLE `tickets` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `codigo` int(11) NOT NULL,
  `monto` double(15,2) DEFAULT NULL,
  `estado` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fecha_uso` date DEFAULT NULL,
  `detalle` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `driver_id` bigint(20) unsigned DEFAULT NULL,
  `vehicle_id` bigint(20) unsigned DEFAULT NULL,
  `dispenser_id` bigint(20) unsigned DEFAULT NULL,
  `turn_id` bigint(20) unsigned DEFAULT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `report_id` bigint(20) unsigned DEFAULT NULL,
  `lot_id` bigint(20) unsigned DEFAULT NULL,
  `asignation_id` bigint(20) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tickets_driver_id_foreign` (`driver_id`),
  KEY `tickets_vehicle_id_foreign` (`vehicle_id`),
  KEY `tickets_dispenser_id_foreign` (`dispenser_id`),
  KEY `tickets_turn_id_foreign` (`turn_id`),
  KEY `tickets_user_id_foreign` (`user_id`),
  KEY `tickets_report_id_foreign` (`report_id`),
  KEY `tickets_lot_id_foreign` (`lot_id`),
  KEY `tickets_asignation_id_foreign` (`asignation_id`),
  CONSTRAINT `tickets_asignation_id_foreign` FOREIGN KEY (`asignation_id`) REFERENCES `asignations` (`id`) ON DELETE CASCADE,
  CONSTRAINT `tickets_dispenser_id_foreign` FOREIGN KEY (`dispenser_id`) REFERENCES `dispensers` (`id`) ON DELETE CASCADE,
  CONSTRAINT `tickets_driver_id_foreign` FOREIGN KEY (`driver_id`) REFERENCES `drivers` (`id`) ON DELETE CASCADE,
  CONSTRAINT `tickets_lot_id_foreign` FOREIGN KEY (`lot_id`) REFERENCES `lots` (`id`) ON DELETE CASCADE,
  CONSTRAINT `tickets_report_id_foreign` FOREIGN KEY (`report_id`) REFERENCES `reports` (`id`) ON DELETE SET NULL,
  CONSTRAINT `tickets_turn_id_foreign` FOREIGN KEY (`turn_id`) REFERENCES `turns` (`id`) ON DELETE CASCADE,
  CONSTRAINT `tickets_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `tickets_vehicle_id_foreign` FOREIGN KEY (`vehicle_id`) REFERENCES `vehicles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=1147 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `tickets` */

insert  into `tickets`(`id`,`codigo`,`monto`,`estado`,`fecha_uso`,`detalle`,`driver_id`,`vehicle_id`,`dispenser_id`,`turn_id`,`user_id`,`report_id`,`lot_id`,`asignation_id`,`created_at`,`updated_at`) values 
(21,1,10.00,'Usado','2022-02-07','dsadsa',5,5,9,5,2,6,6,21,'2022-02-01 14:01:30','2022-02-07 21:29:22'),
(22,2,111.00,'Usado','2022-02-07','222222',5,5,10,6,2,5,6,21,'2022-02-01 14:01:30','2022-02-07 21:35:51'),
(23,3,123.00,'Usado','2022-02-07','123123',5,5,11,7,2,4,6,21,'2022-02-01 14:01:30','2022-02-07 21:37:58'),
(24,4,123.00,'Usado','2022-02-07','123',5,5,9,5,2,3,6,21,'2022-02-01 14:01:30','2022-02-07 22:05:45'),
(25,5,123.00,'Usado','2022-02-07','123456',5,5,10,6,2,3,6,21,'2022-02-01 14:01:30','2022-02-07 22:06:02'),
(26,6,NULL,'Activo',NULL,NULL,NULL,NULL,NULL,NULL,2,NULL,6,22,'2022-02-01 14:01:30','2022-02-01 17:44:22'),
(27,7,NULL,'Activo',NULL,NULL,NULL,NULL,NULL,NULL,2,NULL,6,22,'2022-02-01 14:01:30','2022-02-01 17:44:22'),
(28,8,150.00,'Usado','2022-02-07',NULL,5,5,12,7,2,6,6,22,'2022-02-01 14:01:30','2022-02-07 21:31:07'),
(29,9,NULL,'Activo',NULL,NULL,NULL,NULL,NULL,NULL,2,NULL,6,22,'2022-02-01 14:01:30','2022-02-01 17:44:22'),
(30,10,NULL,'Activo',NULL,NULL,NULL,NULL,NULL,NULL,2,NULL,6,22,'2022-02-01 14:01:30','2022-02-01 17:44:22'),
(31,1,121.00,'Usado','2022-02-07','dsa',5,5,13,5,2,2,7,NULL,'2022-02-01 14:23:14','2022-02-07 22:04:31'),
(32,2,NULL,'Activo',NULL,NULL,NULL,NULL,NULL,NULL,2,NULL,7,NULL,'2022-02-01 14:23:14','2022-02-01 15:14:16'),
(33,3,NULL,'Activo',NULL,NULL,NULL,NULL,NULL,NULL,2,NULL,7,NULL,'2022-02-01 14:23:14','2022-02-01 15:14:16'),
(34,4,NULL,'Activo',NULL,NULL,NULL,NULL,NULL,NULL,2,NULL,7,NULL,'2022-02-01 14:23:14','2022-02-01 15:14:16'),
(35,5,NULL,'Activo',NULL,NULL,NULL,NULL,NULL,NULL,2,NULL,7,NULL,'2022-02-01 14:23:14','2022-02-01 15:14:01'),
(36,6,NULL,'Activo',NULL,NULL,NULL,NULL,NULL,NULL,2,NULL,7,NULL,'2022-02-01 14:23:14','2022-02-01 15:14:01'),
(37,7,NULL,'Activo',NULL,NULL,NULL,NULL,NULL,NULL,2,NULL,7,NULL,'2022-02-01 14:23:14','2022-02-01 15:14:01'),
(38,8,NULL,'Activo',NULL,NULL,NULL,NULL,NULL,NULL,2,NULL,7,NULL,'2022-02-01 14:23:14','2022-02-01 15:14:01'),
(39,9,NULL,'Activo',NULL,NULL,NULL,NULL,NULL,NULL,2,NULL,7,NULL,'2022-02-01 14:23:14','2022-02-01 15:14:01'),
(40,10,NULL,'Activo',NULL,NULL,NULL,NULL,NULL,NULL,2,NULL,7,NULL,'2022-02-01 14:23:14','2022-02-01 15:14:01'),
(41,11,NULL,'Activo',NULL,NULL,NULL,NULL,NULL,NULL,2,NULL,7,NULL,'2022-02-01 14:23:14','2022-02-01 14:23:14'),
(42,12,130.00,'Usado','2022-02-07','fffffffff',5,5,14,6,2,6,7,NULL,'2022-02-01 14:23:14','2022-02-07 21:31:55'),
(43,13,NULL,'Activo',NULL,NULL,NULL,NULL,NULL,NULL,2,NULL,7,NULL,'2022-02-01 14:23:14','2022-02-01 14:23:14'),
(44,14,NULL,'Activo',NULL,NULL,NULL,NULL,NULL,NULL,2,NULL,7,NULL,'2022-02-01 14:23:14','2022-02-01 14:23:14'),
(45,15,NULL,'Activo',NULL,NULL,NULL,NULL,NULL,NULL,2,NULL,7,NULL,'2022-02-01 14:23:14','2022-02-01 14:23:14'),
(1046,200,NULL,'Activo',NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,9,23,'2022-02-02 11:40:20','2022-02-02 12:07:58'),
(1047,201,NULL,'Activo',NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,9,23,'2022-02-02 11:40:20','2022-02-02 12:07:58'),
(1048,202,NULL,'Activo',NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,9,23,'2022-02-02 11:40:20','2022-02-02 12:07:58'),
(1049,203,NULL,'Activo',NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,9,23,'2022-02-02 11:40:20','2022-02-02 12:07:58'),
(1050,204,NULL,'Activo',NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,9,23,'2022-02-02 11:40:20','2022-02-02 12:07:58'),
(1051,205,NULL,'Activo',NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,9,23,'2022-02-02 11:40:20','2022-02-02 12:07:58'),
(1052,206,NULL,'Activo',NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,9,23,'2022-02-02 11:40:20','2022-02-02 12:07:58'),
(1053,207,NULL,'Activo',NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,9,23,'2022-02-02 11:40:20','2022-02-02 12:07:58'),
(1054,208,NULL,'Activo',NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,9,23,'2022-02-02 11:40:20','2022-02-02 12:07:58'),
(1055,209,NULL,'Activo',NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,9,23,'2022-02-02 11:40:20','2022-02-02 12:07:58'),
(1056,210,NULL,'Activo',NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,9,23,'2022-02-02 11:40:20','2022-02-02 12:07:58'),
(1057,211,NULL,'Activo',NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,9,23,'2022-02-02 11:40:20','2022-02-02 12:07:58'),
(1058,212,NULL,'Activo',NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,9,23,'2022-02-02 11:40:20','2022-02-02 12:07:58'),
(1059,213,NULL,'Activo',NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,9,23,'2022-02-02 11:40:20','2022-02-02 12:07:58'),
(1060,214,NULL,'Activo',NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,9,23,'2022-02-02 11:40:20','2022-02-02 12:07:58'),
(1061,215,NULL,'Activo',NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,9,23,'2022-02-02 11:40:20','2022-02-02 12:07:58'),
(1062,216,NULL,'Activo',NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,9,23,'2022-02-02 11:40:20','2022-02-02 12:07:58'),
(1063,217,NULL,'Activo',NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,9,23,'2022-02-02 11:40:20','2022-02-02 12:07:58'),
(1064,218,NULL,'Activo',NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,9,23,'2022-02-02 11:40:20','2022-02-02 12:07:58'),
(1065,219,NULL,'Activo',NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,9,23,'2022-02-02 11:40:20','2022-02-02 12:07:58'),
(1066,220,NULL,'Activo',NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,9,23,'2022-02-02 11:40:20','2022-02-02 12:07:58'),
(1067,221,NULL,'Activo',NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,9,23,'2022-02-02 11:40:20','2022-02-02 12:07:58'),
(1068,222,NULL,'Activo',NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,9,23,'2022-02-02 11:40:20','2022-02-02 12:07:58'),
(1069,223,NULL,'Activo',NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,9,23,'2022-02-02 11:40:20','2022-02-02 12:07:58'),
(1070,224,NULL,'Activo',NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,9,23,'2022-02-02 11:40:20','2022-02-02 12:07:58'),
(1071,225,NULL,'Activo',NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,9,23,'2022-02-02 11:40:20','2022-02-02 12:07:58'),
(1072,226,NULL,'Activo',NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,9,23,'2022-02-02 11:40:20','2022-02-02 12:07:58'),
(1073,227,NULL,'Activo',NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,9,23,'2022-02-02 11:40:20','2022-02-02 12:07:58'),
(1074,228,NULL,'Activo',NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,9,23,'2022-02-02 11:40:20','2022-02-02 12:07:58'),
(1075,229,NULL,'Activo',NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,9,23,'2022-02-02 11:40:20','2022-02-02 12:07:58'),
(1076,230,NULL,'Activo',NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,9,23,'2022-02-02 11:40:20','2022-02-02 12:07:58'),
(1077,231,NULL,'Activo',NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,9,NULL,'2022-02-02 11:40:20','2022-02-02 11:40:20'),
(1078,232,NULL,'Activo',NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,9,NULL,'2022-02-02 11:40:20','2022-02-02 11:40:20'),
(1079,233,NULL,'Activo',NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,9,NULL,'2022-02-02 11:40:20','2022-02-02 11:40:20'),
(1080,234,NULL,'Activo',NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,9,NULL,'2022-02-02 11:40:20','2022-02-02 11:40:20'),
(1081,235,NULL,'Activo',NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,9,NULL,'2022-02-02 11:40:20','2022-02-02 11:40:20'),
(1082,236,NULL,'Activo',NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,9,NULL,'2022-02-02 11:40:20','2022-02-02 11:40:20'),
(1083,237,NULL,'Activo',NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,9,NULL,'2022-02-02 11:40:20','2022-02-02 11:40:20'),
(1084,238,NULL,'Activo',NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,9,NULL,'2022-02-02 11:40:20','2022-02-02 11:40:20'),
(1085,239,NULL,'Activo',NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,9,NULL,'2022-02-02 11:40:20','2022-02-02 11:40:20'),
(1086,240,NULL,'Activo',NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,9,NULL,'2022-02-02 11:40:20','2022-02-02 11:40:20'),
(1087,241,NULL,'Activo',NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,9,NULL,'2022-02-02 11:40:20','2022-02-02 11:40:20'),
(1088,242,NULL,'Activo',NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,9,NULL,'2022-02-02 11:40:20','2022-02-02 11:40:20'),
(1089,243,NULL,'Activo',NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,9,NULL,'2022-02-02 11:40:20','2022-02-02 11:40:20'),
(1090,244,NULL,'Activo',NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,9,NULL,'2022-02-02 11:40:20','2022-02-02 11:40:20'),
(1091,245,NULL,'Activo',NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,9,NULL,'2022-02-02 11:40:20','2022-02-02 11:40:20'),
(1092,246,NULL,'Activo',NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,9,NULL,'2022-02-02 11:40:20','2022-02-02 11:40:20'),
(1093,247,NULL,'Activo',NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,9,NULL,'2022-02-02 11:40:20','2022-02-02 11:40:20'),
(1094,248,NULL,'Activo',NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,9,NULL,'2022-02-02 11:40:20','2022-02-02 11:40:20'),
(1095,249,NULL,'Activo',NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,9,NULL,'2022-02-02 11:40:20','2022-02-02 11:40:20'),
(1096,250,NULL,'Activo',NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,9,NULL,'2022-02-02 11:40:20','2022-02-02 11:40:20'),
(1097,251,NULL,'Activo',NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,9,NULL,'2022-02-02 11:40:20','2022-02-02 11:40:20'),
(1098,252,NULL,'Activo',NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,9,NULL,'2022-02-02 11:40:20','2022-02-02 11:40:20'),
(1099,253,NULL,'Activo',NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,9,NULL,'2022-02-02 11:40:20','2022-02-02 11:40:20'),
(1100,254,NULL,'Activo',NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,9,NULL,'2022-02-02 11:40:20','2022-02-02 11:40:20'),
(1101,255,NULL,'Activo',NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,9,NULL,'2022-02-02 11:40:20','2022-02-02 11:40:20'),
(1102,256,NULL,'Activo',NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,9,NULL,'2022-02-02 11:40:20','2022-02-02 11:40:20'),
(1103,257,NULL,'Activo',NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,9,NULL,'2022-02-02 11:40:20','2022-02-02 11:40:20'),
(1104,258,NULL,'Activo',NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,9,NULL,'2022-02-02 11:40:20','2022-02-02 11:40:20'),
(1105,259,NULL,'Activo',NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,9,NULL,'2022-02-02 11:40:20','2022-02-02 11:40:20'),
(1106,260,NULL,'Activo',NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,9,NULL,'2022-02-02 11:40:20','2022-02-02 11:40:20'),
(1107,261,NULL,'Activo',NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,9,NULL,'2022-02-02 11:40:20','2022-02-02 11:40:20'),
(1108,262,NULL,'Activo',NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,9,NULL,'2022-02-02 11:40:20','2022-02-02 11:40:20'),
(1109,263,NULL,'Activo',NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,9,NULL,'2022-02-02 11:40:20','2022-02-02 11:40:20'),
(1110,264,NULL,'Activo',NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,9,NULL,'2022-02-02 11:40:20','2022-02-02 11:40:20'),
(1111,265,NULL,'Activo',NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,9,NULL,'2022-02-02 11:40:20','2022-02-02 11:40:20'),
(1112,266,NULL,'Activo',NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,9,NULL,'2022-02-02 11:40:20','2022-02-02 11:40:20'),
(1113,267,NULL,'Activo',NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,9,NULL,'2022-02-02 11:40:20','2022-02-02 11:40:20'),
(1114,268,NULL,'Activo',NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,9,NULL,'2022-02-02 11:40:20','2022-02-02 11:40:20'),
(1115,269,NULL,'Activo',NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,9,NULL,'2022-02-02 11:40:20','2022-02-02 11:40:20'),
(1116,270,NULL,'Activo',NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,9,NULL,'2022-02-02 11:40:20','2022-02-02 11:40:20'),
(1117,271,NULL,'Activo',NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,9,NULL,'2022-02-02 11:40:20','2022-02-02 11:40:20'),
(1118,272,NULL,'Activo',NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,9,NULL,'2022-02-02 11:40:20','2022-02-02 11:40:20'),
(1119,273,NULL,'Activo',NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,9,NULL,'2022-02-02 11:40:20','2022-02-02 11:40:20'),
(1120,274,NULL,'Activo',NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,9,NULL,'2022-02-02 11:40:20','2022-02-02 11:40:20'),
(1121,275,NULL,'Activo',NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,9,NULL,'2022-02-02 11:40:20','2022-02-02 11:40:20'),
(1122,276,NULL,'Activo',NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,9,NULL,'2022-02-02 11:40:20','2022-02-02 11:40:20'),
(1123,277,NULL,'Activo',NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,9,NULL,'2022-02-02 11:40:20','2022-02-02 11:40:20'),
(1124,278,NULL,'Activo',NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,9,NULL,'2022-02-02 11:40:20','2022-02-02 11:40:20'),
(1125,279,NULL,'Activo',NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,9,NULL,'2022-02-02 11:40:20','2022-02-02 11:40:20'),
(1126,280,NULL,'Activo',NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,9,NULL,'2022-02-02 11:40:20','2022-02-02 11:40:20'),
(1127,281,NULL,'Activo',NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,9,NULL,'2022-02-02 11:40:20','2022-02-02 11:40:20'),
(1128,282,NULL,'Activo',NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,9,NULL,'2022-02-02 11:40:20','2022-02-02 11:40:20'),
(1129,283,NULL,'Activo',NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,9,NULL,'2022-02-02 11:40:20','2022-02-02 11:40:20'),
(1130,284,NULL,'Activo',NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,9,NULL,'2022-02-02 11:40:20','2022-02-02 11:40:20'),
(1131,285,NULL,'Activo',NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,9,NULL,'2022-02-02 11:40:20','2022-02-02 11:40:20'),
(1132,286,NULL,'Activo',NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,9,NULL,'2022-02-02 11:40:20','2022-02-02 11:40:20'),
(1133,287,NULL,'Activo',NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,9,NULL,'2022-02-02 11:40:20','2022-02-02 11:40:20'),
(1134,288,NULL,'Activo',NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,9,NULL,'2022-02-02 11:40:20','2022-02-02 11:40:20'),
(1135,289,NULL,'Activo',NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,9,NULL,'2022-02-02 11:40:20','2022-02-02 11:40:20'),
(1136,290,NULL,'Activo',NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,9,NULL,'2022-02-02 11:40:20','2022-02-02 11:40:20'),
(1137,291,NULL,'Activo',NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,9,NULL,'2022-02-02 11:40:20','2022-02-02 11:40:20'),
(1138,292,NULL,'Activo',NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,9,NULL,'2022-02-02 11:40:20','2022-02-02 11:40:20'),
(1139,293,NULL,'Activo',NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,9,NULL,'2022-02-02 11:40:21','2022-02-02 11:40:21'),
(1140,294,NULL,'Activo',NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,9,NULL,'2022-02-02 11:40:21','2022-02-02 11:40:21'),
(1141,295,NULL,'Activo',NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,9,NULL,'2022-02-02 11:40:21','2022-02-02 11:40:21'),
(1142,296,NULL,'Activo',NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,9,NULL,'2022-02-02 11:40:21','2022-02-02 11:40:21'),
(1143,297,NULL,'Activo',NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,9,NULL,'2022-02-02 11:40:21','2022-02-02 11:40:21'),
(1144,298,NULL,'Activo',NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,9,NULL,'2022-02-02 11:40:21','2022-02-02 11:40:21'),
(1145,299,NULL,'Activo',NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,9,NULL,'2022-02-02 11:40:21','2022-02-02 11:40:21'),
(1146,300,NULL,'Activo',NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,9,NULL,'2022-02-02 11:40:21','2022-02-02 11:40:21');

/*Table structure for table `turns` */

DROP TABLE IF EXISTS `turns`;

CREATE TABLE `turns` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estado` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hora_inicio` time DEFAULT NULL,
  `hora_fin` time DEFAULT NULL,
  `office_id` bigint(20) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `turns_office_id_foreign` (`office_id`),
  CONSTRAINT `turns_office_id_foreign` FOREIGN KEY (`office_id`) REFERENCES `offices` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `turns` */

insert  into `turns`(`id`,`nombre`,`estado`,`hora_inicio`,`hora_fin`,`office_id`) values 
(1,'A','Activo','00:00:00','00:00:00',2),
(2,'B','Activo','00:00:00','00:00:00',2),
(3,'C','Activo','00:00:00','00:00:00',2),
(4,'D','Activo','00:00:00','00:00:00',2),
(5,'A','Activo','06:00:00','13:59:00',1),
(6,'B','Activo','14:00:00','21:59:00',1),
(7,'C','Activo','22:00:00','11:59:00',1),
(8,'E','Activo','12:00:00','05:59:00',1);

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` bigint(20) unsigned DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_name_unique` (`name`),
  KEY `users_role_id_foreign` (`role_id`),
  CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`email`,`email_verified_at`,`password`,`role_id`,`remember_token`,`created_at`,`updated_at`,`deleted_at`) values 
(1,'john','john@gmail.com',NULL,'$2a$12$zgkb1g0b9czdFNvprtiydO7XJouEeP8La3Szqm7ftqirALmqD0bH6',1,'YMdu2QZxE5fnGzy4nxQAxetDAy0E9cfx8AYdALUHaqbCUusjXVuNitTOyCoj','2021-04-07 05:52:46','2021-04-07 05:52:46',NULL),
(2,'Admin','admin@admin.admin',NULL,'$2y$10$.2fATZePr6Zb9R1oz6bgx.iX59ka8lLJIouDvtQ4nJW3FSrR3D0/i',2,'etGXFvu9OcAawYDGn2cj0En26yTzD5pi4WHKfpeBkqjuIWa4N4p8cO5dn4jU','2021-12-17 05:07:21','2022-01-19 00:58:51',NULL),
(3,'Operador','operador@operador.ope',NULL,'$2y$10$QQJNiewFYliI4yaU2tbQIeNnBhlY8dcAI0M/JRQ/QsHtimbV4iVOm',4,'ePs15hdofhqQtL2IIosbgKrfHWtAMf1c0TZgFiSqBKlYKMWJih75D6NJHtVd','2021-12-29 10:32:26','2022-01-19 01:02:54',NULL),
(4,'Jhenny','jhenny@gmail.com',NULL,'$2y$10$gSE2sglHa/4/XNSHAsfn7Orhxb1SlU3w8Su61xTe8ty7gDHPzEa3a',4,NULL,'2022-01-14 07:35:34','2022-01-22 05:36:34','2022-01-22 05:36:34'),
(5,'sa',NULL,NULL,'$2y$10$uTC0ATdu30HzWWjzz1bPv.nnBF6Qu9aa/YsYh91cR2rHDeYzt56mC',3,NULL,'2022-01-18 06:32:36','2022-01-21 04:16:29','2022-01-21 04:16:29'),
(6,'Junior','0',NULL,'$2y$10$nsgh04iIw15R7v7yCS.PtexITlIEoAiw8XadsEgcoBu7GBzf6fKeO',4,'ybmTZElUnXsrtye9fJwQZILmxUsE55c4oIqFSJ90p5IbXXoD0HzGZu1HR2Gm','2022-01-22 05:44:17','2022-01-25 19:23:27',NULL),
(7,'Jacquelin','0',NULL,'$2y$10$zxRcfpr2z55eiXHWEi5cUORXXRYmUnuCumjcJ0lBNbOlTOJxi92c6',4,NULL,'2022-01-22 06:06:29','2022-01-22 06:06:29',NULL),
(8,'Galia','0',NULL,'$2y$10$ezI8w9SQt9UNnuExBbU6Ue/tW8g1QvtNbm.034h6gSZuXQXjGg.Ny',4,NULL,'2022-01-22 06:17:39','2022-01-22 06:17:39',NULL),
(9,'Adriana','0',NULL,'$2y$10$pyVhYysgq/CQPtlQnFwBpOiMfYoqG5l/S2hfy9vy8XL03etIGJlV.',4,NULL,'2022-01-22 06:23:39','2022-01-25 19:24:07',NULL);

/*Table structure for table `vehicles` */

DROP TABLE IF EXISTS `vehicles`;

CREATE TABLE `vehicles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `placa` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `marca` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `modelo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `anyo` varchar(4) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estado` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_id` bigint(20) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `vehicles_client_id_foreign` (`client_id`),
  CONSTRAINT `vehicles_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `vehicles` */

insert  into `vehicles`(`id`,`placa`,`marca`,`modelo`,`anyo`,`color`,`estado`,`client_id`,`created_at`,`updated_at`) values 
(4,'2125-dar','NM',NULL,NULL,NULL,'Activo',3,NULL,NULL),
(5,'1827-FYT','RENAULT','RENAULT','1998','BLANCO','Activo',4,NULL,NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
