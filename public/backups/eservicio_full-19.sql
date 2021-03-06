/*
SQLyog Community v13.1.8 (64 bit)
MySQL - 10.4.21-MariaDB : Database - csmmhom2_eservicio
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
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `accountings` */

insert  into `accountings`(`id`,`cantidad`,`meter_inicial`,`meter_final`,`tipo`,`report_id`,`dispenser_id`,`user_id`,`created_at`,`updated_at`,`deleted_at`) values 
(12,300.00,1680295.88,1680595.88,NULL,7,3,2,NULL,NULL,NULL),
(13,100.00,2614978.93,2615078.93,NULL,7,5,2,NULL,NULL,NULL),
(14,300.00,1680595.88,1680895.88,NULL,8,3,2,NULL,NULL,NULL),
(15,603.56,2153687.99,2154291.55,NULL,8,6,2,NULL,NULL,NULL),
(16,399.70,1680895.88,1681295.58,NULL,9,3,2,NULL,NULL,NULL),
(17,199.80,1413799.64,1413999.44,NULL,9,4,2,NULL,NULL,NULL),
(18,400.00,2154291.55,2154691.55,NULL,10,6,3,NULL,NULL,NULL),
(19,510.00,1413999.44,1414509.44,NULL,11,4,3,NULL,NULL,NULL),
(20,180.00,2615078.93,2615258.93,NULL,11,5,3,NULL,NULL,NULL),
(21,0.00,1681295.58,1681295.58,NULL,12,3,2,NULL,NULL,NULL),
(26,100.00,1020225.50,1020325.50,NULL,14,1,1,NULL,NULL,NULL),
(27,100.50,1536929.00,1537029.50,NULL,14,2,1,NULL,NULL,NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `clients` */

insert  into `clients`(`id`,`nombre`,`nit`,`correo`,`direccion`,`telefono`,`telefono2`,`representante_legal`,`representante_ci`,`representante_telefono`,`representante_telefono2`,`representante_email`,`representante_detalles`,`estado`,`office_id`,`user_id`,`created_at`,`updated_at`,`deleted_at`) values 
(1,'Hipermaxi El Prado','123456789',NULL,'Av. Jos?? Ballivian #753, Cochabamba','77776666',NULL,'Juan Perez',NULL,'76767676',NULL,'jperez@hipermaxi.com',NULL,'Activo',1,2,'2021-12-16 19:01:03','2021-12-16 19:01:03',NULL),
(2,'Nuevo Cliente','456789',NULL,'Nueva Direcci??n','78784545',NULL,'Nuevo Representante','Nuevo CI','11111111',NULL,'nuevo@email.com',NULL,'Activo',1,2,'2021-12-17 15:09:25','2021-12-17 15:09:25',NULL),
(3,'Nuevo Cliente S2','49841651',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Activo',2,2,'2021-12-28 21:42:48','2021-12-28 21:42:48',NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `dispensers` */

insert  into `dispensers`(`id`,`nombre`,`meter`,`fuel_id`,`tank_id`,`office_id`) values 
(1,'Dispenser 01',1020325.50,1,1,1),
(2,'Dispenser 02',1537029.50,1,1,1),
(3,'Disp 01',1681295.58,6,6,2),
(4,'Disp 02',1414509.44,6,6,2),
(5,'Disp 03',2615258.93,6,6,2),
(6,'Disp 04',2154691.55,6,6,2);

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `drivers` */

insert  into `drivers`(`id`,`nombre`,`ci`,`paterno`,`materno`,`licencia`,`estado`,`client_id`,`created_at`,`updated_at`) values 
(1,'Chofer','456456','01','','123456','Activo',1,NULL,NULL),
(2,'Chofer','123456','02','','123456','Activo',1,NULL,NULL),
(3,'Nuevo','565656','Chofer','','12312345','Activo',2,NULL,NULL),
(4,'Don Esteban',NULL,NULL,NULL,NULL,'Activo',3,NULL,NULL);

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
(2,'Gasolina',3.74,3.74,'L.',1),
(3,'Gasolina Premium',4.79,4.79,'L.',1),
(4,'Diesel',3.72,3.72,'L.',1),
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
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(32,'TIC','Ver Tickets','admin/ticket',1,8),
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
(46,'RAPTU','Arqueos x Turnos','admin/report/reportes_turnos',0,12),
(47,'RAPDI','Arqueos x Dispensers','admin/report/reportes_dispensers',0,12);

/*Table structure for table `hosepipes` */

DROP TABLE IF EXISTS `hosepipes`;

CREATE TABLE `hosepipes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fuel_id` bigint(20) unsigned DEFAULT NULL,
  `tank_id` bigint(20) unsigned DEFAULT NULL,
  `dispenser_id` bigint(20) unsigned DEFAULT NULL,
  `office_id` bigint(20) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `hosepipes_fuel_id_foreign` (`fuel_id`),
  KEY `hosepipes_tank_id_foreign` (`tank_id`),
  KEY `hosepipes_dispenser_id_foreign` (`dispenser_id`),
  KEY `hosepipes_office_id_foreign` (`office_id`),
  CONSTRAINT `hosepipes_dispenser_id_foreign` FOREIGN KEY (`dispenser_id`) REFERENCES `dispensers` (`id`) ON DELETE SET NULL,
  CONSTRAINT `hosepipes_fuel_id_foreign` FOREIGN KEY (`fuel_id`) REFERENCES `fuels` (`id`) ON DELETE SET NULL,
  CONSTRAINT `hosepipes_office_id_foreign` FOREIGN KEY (`office_id`) REFERENCES `offices` (`id`) ON DELETE SET NULL,
  CONSTRAINT `hosepipes_tank_id_foreign` FOREIGN KEY (`tank_id`) REFERENCES `tanks` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `hosepipes` */

insert  into `hosepipes`(`id`,`nombre`,`fuel_id`,`tank_id`,`dispenser_id`,`office_id`) values 
(1,'Manguera 01',1,1,1,NULL),
(2,'Manguera 02',1,1,1,NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `humans` */

insert  into `humans`(`id`,`password`,`nombre_completo`,`ci`,`fecha_nacimiento`,`direccion`,`zona`,`telefono`,`telefono2`,`nivel_estudio`,`estado_civil`,`hijos`,`ex_empresa`,`ex_cargo`,`ex_tiempo`,`ex_jefe`,`ex_renuncia`,`ex_observaciones`,`fecha_ingreso`,`fecha_retiro`,`casillero`,`siges`,`biometrico`,`softcontrol`,`cuenta_bmsc`,`afp`,`foto`,`nombre_garante`,`relacion_garante`,`telefono_garante`,`trabajo_garante`,`direccion_garante`,`nombre_referencia_personal`,`relacion_referencia_personal`,`telefono_referencia_personal`,`trabajo_referencia_personal`,`direccion_referencia_personal`,`office_id`,`created_at`,`updated_at`,`deleted_at`) values 
(1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,'2022-01-13 15:04:39','2022-01-13 15:04:45',NULL),
(2,'adminhappy123','Administrador','123456','1979-03-05','Direcci??n','Zona','78784545','456123','Grado de estudio','Soltero',0,'Empresa X','Administrador','6 meses','Nombre','Renuncia','Observacionas','2022-01-01',NULL,'1','Usuario123456','1','00000000','4040404040','FUTURO','storage/photos/user_2.JPG','Garante','Parentesco Garante','70707070','Trabajo Garante','Direcci??n Garante','Referencia Personal','Parentesco Referencia','76767676','Ocupaci??n Referencia Personal','Direcci??n Referencia Personal',1,'2022-01-13 15:04:41','2022-01-13 15:04:47',NULL),
(3,'Operador',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'storage/photos/user_3.JPG',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,'2022-01-13 15:04:43','2022-01-13 15:04:48',NULL),
(4,'Jhenny','Jhenny Huaytari Calizaya','9388893 cb','1995-01-20','Av. Innominada y Calle Los Bosques','1 de Mayo','77979996','n/t','Bachiller','Casada',3,'Panader??a Monta??o','Repartidora','6 meses','Griseley Monta??o','Por motivos familiares','Trabajo en sucre','2021-09-01',NULL,'11','JHENNY/8893','9','9388893/8893','4029952292','FUTURO','storage/photos/user_4.JPG','Victor Eduardo Rodriguez Tola','Esposo','77418199','Alba??il','Misma direcci??n','Marisol Huayta Calizaya','Hermana','76441302','Cajera en Cafeter??a','Misma direcci??n',1,NULL,NULL,NULL),
(5,'dsa',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `menus` */

insert  into `menus`(`id`,`code`,`label`,`icon`,`orden`,`tamanyo`) values 
(1,'MROL','Roles','key',21,0),
(2,'MUSE','Usuarios','account',20,0),
(3,'MMEN','Menus','apps',1,0),
(4,'MFUN','Funcionalidades','key',2,0),
(5,'MOFF','Sucursal','city',5,0),
(6,'MCLI','Clientes','human-handsup',8,0),
(7,'MDIS','Dispensers','gas-station',7,0),
(8,'MTIC','Vales','ticket-confirmation',11,0),
(9,'MFUE','Combustible','fuel',6,0),
(10,'MARQ','Arqueo','cash-multiple',18,0),
(11,'MTUR','Turnos','clock',22,0),
(12,'MREP','Reportes','book-open-page-variant',19,100);

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(13,'2021_12_14_223828_create_hosepipes_table',1),
(14,'2021_12_14_223859_create_turns_table',1),
(15,'2021_12_14_223918_create_clients_table',1),
(16,'2021_12_14_223938_create_vehicles_table',1),
(17,'2021_12_14_223954_create_drivers_table',1),
(18,'2021_12_14_224029_create_reports_table',1),
(19,'2021_12_14_224040_create_tickets_table',1),
(20,'2021_12_14_224048_create_accountings_table',1),
(21,'2021_12_14_224115_create_humans_table',1);

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
) ENGINE=InnoDB AUTO_INCREMENT=222 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `privileges` */

insert  into `privileges`(`id`,`functionality_id`,`role_id`) values 
(1,1,1),
(2,2,1),
(3,3,1),
(4,4,1),
(5,5,1),
(6,6,1),
(7,7,1),
(8,8,1),
(9,9,1),
(10,10,1),
(11,11,1),
(12,12,1),
(13,13,1),
(14,14,1),
(15,15,1),
(16,16,1),
(17,17,1),
(18,18,1),
(19,19,1),
(20,20,1),
(21,21,1),
(22,22,1),
(23,23,1),
(24,24,1),
(25,25,1),
(26,26,1),
(27,27,1),
(28,28,1),
(29,29,1),
(30,30,1),
(31,31,1),
(32,32,1),
(33,33,1),
(34,34,1),
(35,35,1),
(36,36,1),
(37,37,1),
(38,38,1),
(39,39,1),
(40,40,1),
(41,41,1),
(42,42,1),
(43,43,1),
(44,44,1),
(45,45,1),
(46,46,1),
(47,47,1),
(157,5,3),
(158,6,3),
(159,8,3),
(160,21,3),
(161,22,3),
(162,23,3),
(163,24,3),
(164,25,3),
(165,26,3),
(166,28,3),
(167,29,3),
(168,30,3),
(169,31,3),
(170,32,3),
(171,33,3),
(172,34,3),
(173,36,3),
(174,37,3),
(175,39,3),
(176,40,3),
(177,41,3),
(178,42,3),
(179,44,3),
(180,32,4),
(181,37,4),
(182,40,4),
(183,1,2),
(184,2,2),
(185,3,2),
(186,4,2),
(187,5,2),
(188,6,2),
(189,7,2),
(190,8,2),
(191,17,2),
(192,18,2),
(193,19,2),
(194,20,2),
(195,21,2),
(196,22,2),
(197,23,2),
(198,24,2),
(199,25,2),
(200,26,2),
(201,27,2),
(202,28,2),
(203,29,2),
(204,30,2),
(205,31,2),
(206,32,2),
(207,33,2),
(208,34,2),
(209,35,2),
(210,36,2),
(211,37,2),
(212,38,2),
(213,39,2),
(214,40,2),
(215,41,2),
(216,42,2),
(217,43,2),
(218,44,2),
(219,45,2),
(220,46,2),
(221,47,2);

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
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `reports` */

insert  into `reports`(`id`,`fecha`,`monto_total`,`efectivo`,`tarjeta`,`firmado`,`calibracion`,`_200`,`_100`,`_50`,`_20`,`_10`,`monedas`,`user_id`,`turn_id`,`office_id`,`created_at`,`updated_at`,`deleted_at`) values 
(7,'2021-12-28',564.00,564.00,0.00,NULL,0.00,2,0,1,3,3,24.00,2,3,2,NULL,NULL,NULL),
(8,'2021-12-29',1499.91,1180.00,200.00,NULL,0.00,3,2,4,2,9,50.00,2,1,1,NULL,NULL,NULL),
(9,'2021-12-30',840.20,540.20,300.00,NULL,5.00,1,1,3,1,4,30.20,2,2,2,NULL,NULL,NULL),
(10,'2021-12-31',535.50,535.50,0.00,NULL,0.00,2,0,1,2,1,35.50,3,3,2,NULL,NULL,NULL),
(11,'2021-12-31',1140.40,1140.40,0.00,NULL,5.00,3,1,3,10,7,20.40,3,1,2,NULL,NULL,NULL),
(12,'2022-01-04',0.00,0.00,0.00,NULL,0.00,0,0,0,0,0,0.00,2,2,2,NULL,NULL,NULL),
(14,'2022-01-05',332.90,332.90,0.00,NULL,0.00,1,1,0,1,0,12.90,1,5,1,NULL,NULL,NULL);

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
  `total` bigint(20) DEFAULT NULL,
  `actual` bigint(20) DEFAULT NULL,
  `fuel_id` bigint(20) unsigned DEFAULT NULL,
  `office_id` bigint(20) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tanks_fuel_id_foreign` (`fuel_id`),
  KEY `tanks_office_id_foreign` (`office_id`),
  CONSTRAINT `tanks_fuel_id_foreign` FOREIGN KEY (`fuel_id`) REFERENCES `fuels` (`id`) ON DELETE SET NULL,
  CONSTRAINT `tanks_office_id_foreign` FOREIGN KEY (`office_id`) REFERENCES `offices` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `tanks` */

insert  into `tanks`(`id`,`nombre`,`total`,`actual`,`fuel_id`,`office_id`,`created_at`,`updated_at`) values 
(1,'Tanque Gas 01',5000,1500,1,1,NULL,NULL),
(2,'Tanque Gas 02',5000,2700,1,1,NULL,NULL),
(3,'Tanque Gasolina 01',7000,3500,2,1,NULL,NULL),
(4,'Tanque Gasolina 02',7000,5000,2,1,NULL,NULL),
(5,'Tanque Gasolina Premium',3000,1550,3,1,NULL,NULL),
(6,'L??nea YPFB',NULL,NULL,6,2,NULL,NULL);

/*Table structure for table `tickets` */

DROP TABLE IF EXISTS `tickets`;

CREATE TABLE `tickets` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `codigo` int(11) NOT NULL,
  `serie` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `monto` double(15,2) DEFAULT NULL,
  `estado` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fecha_uso` date DEFAULT NULL,
  `detalle` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `driver_id` bigint(20) unsigned DEFAULT NULL,
  `vehicle_id` bigint(20) unsigned DEFAULT NULL,
  `dispenser_id` bigint(20) unsigned DEFAULT NULL,
  `turn_id` bigint(20) unsigned DEFAULT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `office_id` bigint(20) unsigned DEFAULT NULL,
  `report_id` bigint(20) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tickets_driver_id_foreign` (`driver_id`),
  KEY `tickets_vehicle_id_foreign` (`vehicle_id`),
  KEY `tickets_dispenser_id_foreign` (`dispenser_id`),
  KEY `tickets_turn_id_foreign` (`turn_id`),
  KEY `tickets_user_id_foreign` (`user_id`),
  KEY `tickets_office_id_foreign` (`office_id`),
  KEY `tickets_report_id_foreign` (`report_id`),
  CONSTRAINT `tickets_dispenser_id_foreign` FOREIGN KEY (`dispenser_id`) REFERENCES `dispensers` (`id`) ON DELETE CASCADE,
  CONSTRAINT `tickets_driver_id_foreign` FOREIGN KEY (`driver_id`) REFERENCES `drivers` (`id`) ON DELETE CASCADE,
  CONSTRAINT `tickets_office_id_foreign` FOREIGN KEY (`office_id`) REFERENCES `offices` (`id`) ON DELETE SET NULL,
  CONSTRAINT `tickets_report_id_foreign` FOREIGN KEY (`report_id`) REFERENCES `reports` (`id`) ON DELETE SET NULL,
  CONSTRAINT `tickets_turn_id_foreign` FOREIGN KEY (`turn_id`) REFERENCES `turns` (`id`) ON DELETE CASCADE,
  CONSTRAINT `tickets_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `tickets_vehicle_id_foreign` FOREIGN KEY (`vehicle_id`) REFERENCES `vehicles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `tickets` */

insert  into `tickets`(`id`,`codigo`,`serie`,`monto`,`estado`,`fecha_uso`,`detalle`,`driver_id`,`vehicle_id`,`dispenser_id`,`turn_id`,`user_id`,`office_id`,`report_id`,`created_at`,`updated_at`) values 
(1,100,'B',150.00,'Registrado','2021-12-30','Destino La paz',4,4,4,1,2,2,9,NULL,NULL),
(2,101,'B',120.00,'Registrado','2021-12-29','',4,4,4,1,2,2,8,NULL,NULL),
(3,102,'B',NULL,'Activo',NULL,NULL,NULL,NULL,NULL,NULL,2,2,NULL,NULL,NULL),
(4,103,'B',NULL,'Activo',NULL,NULL,NULL,NULL,NULL,NULL,2,2,NULL,NULL,NULL),
(5,104,'B',NULL,'Activo',NULL,NULL,NULL,NULL,NULL,NULL,2,2,NULL,NULL,NULL),
(6,105,'B',NULL,'Activo',NULL,NULL,NULL,NULL,NULL,NULL,2,2,NULL,NULL,NULL),
(7,106,'B',100.00,'Registrado','2021-12-29',NULL,4,4,5,1,2,2,7,NULL,NULL),
(8,107,'B',NULL,'Activo',NULL,NULL,NULL,NULL,NULL,NULL,2,2,NULL,NULL,NULL),
(9,108,'B',NULL,'Activo',NULL,NULL,NULL,NULL,NULL,NULL,2,2,NULL,NULL,NULL),
(10,109,'B',NULL,'Activo',NULL,NULL,NULL,NULL,NULL,NULL,2,2,NULL,NULL,NULL),
(11,110,'B',NULL,'Activo',NULL,NULL,NULL,NULL,NULL,NULL,2,2,NULL,NULL,NULL),
(12,111,'B',NULL,'Activo',NULL,NULL,NULL,NULL,NULL,NULL,2,2,NULL,NULL,NULL),
(13,112,'B',128.20,'Usado','2021-11-11',NULL,4,4,4,1,3,2,NULL,NULL,NULL),
(14,113,'B',NULL,'Activo',NULL,NULL,NULL,NULL,NULL,NULL,2,2,NULL,NULL,NULL),
(15,114,'B',128.50,'Registrado','2021-12-31','Destino, Sipe Sipe',4,4,6,3,2,2,10,NULL,NULL),
(16,115,'B',NULL,'Activo',NULL,NULL,NULL,NULL,NULL,NULL,2,2,NULL,NULL,NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `turns` */

insert  into `turns`(`id`,`nombre`,`estado`,`hora_inicio`,`hora_fin`,`office_id`) values 
(1,'A','Activo','00:00:00','00:00:00',2),
(2,'B','Activo','00:00:00','00:00:00',2),
(3,'C','Activo','00:00:00','00:00:00',2),
(4,'D','Activo','00:00:00','00:00:00',2),
(5,'A','Activo',NULL,NULL,1),
(6,'B','Activo',NULL,NULL,1);

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`email`,`email_verified_at`,`password`,`role_id`,`remember_token`,`created_at`,`updated_at`,`deleted_at`) values 
(1,'john','john@gmail.com',NULL,'$2a$12$zgkb1g0b9czdFNvprtiydO7XJouEeP8La3Szqm7ftqirALmqD0bH6',1,'YMdu2QZxE5fnGzy4nxQAxetDAy0E9cfx8AYdALUHaqbCUusjXVuNitTOyCoj','2021-04-06 17:52:46','2021-04-06 17:52:46',NULL),
(2,'Admin','admin@admin.admin',NULL,'$2y$10$.2fATZePr6Zb9R1oz6bgx.iX59ka8lLJIouDvtQ4nJW3FSrR3D0/i',2,'rG9YNs5FoDSkMvbgTS9qmbP7HW8LlZcTYBHCywiLaBkMhBAsmJziCpLVMgkh','2021-12-16 15:07:21','2022-01-18 10:58:51',NULL),
(3,'Operador','operador@operador.ope',NULL,'$2y$10$QQJNiewFYliI4yaU2tbQIeNnBhlY8dcAI0M/JRQ/QsHtimbV4iVOm',4,'ePs15hdofhqQtL2IIosbgKrfHWtAMf1c0TZgFiSqBKlYKMWJih75D6NJHtVd','2021-12-28 20:32:26','2022-01-18 11:02:54',NULL),
(4,'Jhenny','jhenny@gmail.com',NULL,'$2y$10$gSE2sglHa/4/XNSHAsfn7Orhxb1SlU3w8Su61xTe8ty7gDHPzEa3a',4,NULL,'2022-01-13 17:35:34','2022-01-18 11:03:18',NULL),
(5,'sa',NULL,NULL,'$2y$10$uTC0ATdu30HzWWjzz1bPv.nnBF6Qu9aa/YsYh91cR2rHDeYzt56mC',3,NULL,'2022-01-17 16:32:36','2022-01-17 16:38:39',NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `vehicles` */

insert  into `vehicles`(`id`,`placa`,`marca`,`modelo`,`anyo`,`color`,`estado`,`client_id`,`created_at`,`updated_at`) values 
(1,'2021-ABC','Toyota','Corolla','2021','Blanco','Activo',1,NULL,NULL),
(2,'2000-XYZ','Nissan','Condor','1995','Rojo','Activo',1,NULL,NULL),
(3,'Nuevo Veh??culo','Nueva Marca','Nuevo Modelo','2020','color','Activo',2,NULL,NULL),
(4,'2125-dar','NM',NULL,NULL,NULL,'Activo',3,NULL,NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
