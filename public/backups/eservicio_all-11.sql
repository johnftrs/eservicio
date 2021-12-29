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
  `monto` double(15,2) NOT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `accountings` */

insert  into `accountings`(`id`,`monto`,`meter_inicial`,`meter_final`,`tipo`,`report_id`,`dispenser_id`,`user_id`,`created_at`,`updated_at`,`deleted_at`) values 
(1,1676690.56,1676675.22,15.34,NULL,1,NULL,2,NULL,NULL,NULL),
(2,1413643.83,1413492.64,151.19,NULL,1,NULL,2,NULL,NULL,NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `clients` */

insert  into `clients`(`id`,`nombre`,`nit`,`correo`,`direccion`,`telefono`,`telefono2`,`representante_legal`,`representante_ci`,`representante_telefono`,`representante_telefono2`,`representante_email`,`representante_detalles`,`estado`,`office_id`,`user_id`,`created_at`,`updated_at`,`deleted_at`) values 
(1,'Hipermaxi El Prado','123456789',NULL,'Av. José Ballivian #753, Cochabamba','77776666',NULL,'Juan Perez',NULL,'76767676',NULL,'jperez@hipermaxi.com',NULL,'Activo',1,2,'2021-12-16 19:01:03','2021-12-16 19:01:03',NULL),
(2,'Nuevo Cliente','456789',NULL,'Nueva Dirección','78784545',NULL,'Nuevo Representante','Nuevo CI','11111111',NULL,'nuevo@email.com',NULL,'Activo',1,2,'2021-12-17 15:09:25','2021-12-17 15:09:25',NULL);

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
(1,'Dispenser 01',0.00,1,1,1),
(2,'Dispenser 02',0.00,1,1,1),
(3,'Disp 01',1676675.22,6,6,2),
(4,'Disp 02',1413492.64,6,6,2),
(5,'Disp 03',2614678.93,6,6,2),
(6,'Disp 04',2153687.32,6,6,2);

/*Table structure for table `drivers` */

DROP TABLE IF EXISTS `drivers`;

CREATE TABLE `drivers` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `ci` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `drivers` */

insert  into `drivers`(`id`,`ci`,`nombre`,`paterno`,`materno`,`licencia`,`estado`,`client_id`,`created_at`,`updated_at`) values 
(1,'456456','Chofer','01','','123456','Activo',1,NULL,NULL),
(2,'123456','Chofer','02','','123456','Activo',1,NULL,NULL),
(3,'565656','Nuevo','Chofer','','12312345','Activo',2,NULL,NULL);

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
  `precio_venta` double(15,2) NOT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(42,'ETUR','Editar TUrno','admin/turn/edit',0,11),
(43,'DTUR','Eliminar Turno','admin/turn/delete',0,11),
(44,'TUR','Ver Turnos','admin/turn',1,11);

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
  `ci` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nombre_completo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `direccion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefono` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefono2` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `fecha_ingreso` date DEFAULT NULL,
  `nivel_estudio` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `biometrico` int(11) DEFAULT NULL,
  `estado_civil` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `humans` */

insert  into `humans`(`id`,`ci`,`nombre_completo`,`password`,`direccion`,`telefono`,`telefono2`,`fecha_nacimiento`,`fecha_ingreso`,`nivel_estudio`,`biometrico`,`estado_civil`,`afp`,`foto`,`nombre_garante`,`relacion_garante`,`telefono_garante`,`trabajo_garante`,`direccion_garante`,`nombre_referencia_personal`,`relacion_referencia_personal`,`telefono_referencia_personal`,`trabajo_referencia_personal`,`direccion_referencia_personal`,`office_id`,`created_at`,`updated_at`,`deleted_at`) values 
(1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL),
(2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,2,NULL,NULL,NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `menus` */

insert  into `menus`(`id`,`code`,`label`,`icon`,`orden`,`tamanyo`) values 
(1,'MROL','Roles','key',20,0),
(2,'MUSE','Usuarios','account',19,0),
(3,'MMEN','Menus','apps',1,0),
(4,'MFUN','Funcionalidades','key',2,0),
(5,'MOFF','Sucursales','city',5,0),
(6,'MCLI','Clientes','human-handsup',8,0),
(7,'MDIS','Dispensers','gas-station',7,0),
(8,'MTIC','Vales','ticket-confirmation',11,0),
(9,'MFUE','Combustible','fuel',6,0),
(10,'MARQ','Arqueo','cash-multiple',18,0),
(11,'MTUR','Turnos','clock',21,0);

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
(18,'2021_12_14_224012_create_tickets_table',1),
(19,'2021_12_14_224029_create_reports_table',1),
(20,'2021_12_14_224048_create_accountings_table',1),
(21,'2021_12_14_224115_create_humans_table',1);

/*Table structure for table `offices` */

DROP TABLE IF EXISTS `offices`;

CREATE TABLE `offices` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `direccion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `offices` */

insert  into `offices`(`id`,`nombre`,`nit`,`direccion`) values 
(1,'E.S. HIPODROMO',NULL,'Av. Merchor Perez de Olguin Esq, C. Nueva Granada, Cochabamba'),
(2,'sucursal 2',NULL,NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=157 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(69,5,3),
(70,6,3),
(71,7,3),
(72,8,3),
(73,21,3),
(74,22,3),
(75,23,3),
(76,24,3),
(77,25,3),
(78,26,3),
(79,27,3),
(80,28,3),
(81,29,3),
(82,30,3),
(83,31,3),
(84,32,3),
(85,33,3),
(86,34,3),
(87,35,3),
(88,36,3),
(121,1,2),
(122,2,2),
(123,3,2),
(124,4,2),
(125,5,2),
(126,6,2),
(127,7,2),
(128,8,2),
(129,17,2),
(130,18,2),
(131,19,2),
(132,20,2),
(133,21,2),
(134,22,2),
(135,23,2),
(136,24,2),
(137,25,2),
(138,26,2),
(139,27,2),
(140,28,2),
(141,29,2),
(142,30,2),
(143,31,2),
(144,32,2),
(145,33,2),
(146,34,2),
(147,35,2),
(148,36,2),
(149,37,2),
(150,38,2),
(151,39,2),
(152,40,2),
(153,41,2),
(154,42,2),
(155,43,2),
(156,44,2);

/*Table structure for table `reports` */

DROP TABLE IF EXISTS `reports`;

CREATE TABLE `reports` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `fecha` date DEFAULT NULL,
  `monto_total` double(15,2) DEFAULT NULL,
  `efectivo` double(15,2) DEFAULT NULL,
  `tarjeta` double(15,2) DEFAULT NULL,
  `firmado` varchar(1) COLLATE utf8mb4_unicode_ci DEFAULT 'N',
  `_200` int(11) DEFAULT NULL,
  `_100` int(11) DEFAULT NULL,
  `_50` int(11) DEFAULT NULL,
  `_20` int(11) DEFAULT NULL,
  `_10` int(11) DEFAULT NULL,
  `monedas` int(11) DEFAULT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `turn_id` bigint(20) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `reports_user_id_foreign` (`user_id`),
  KEY `reports_turn_id_foreign` (`turn_id`),
  CONSTRAINT `reports_turn_id_foreign` FOREIGN KEY (`turn_id`) REFERENCES `turns` (`id`) ON DELETE CASCADE,
  CONSTRAINT `reports_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `reports` */

insert  into `reports`(`id`,`fecha`,`monto_total`,`efectivo`,`tarjeta`,`firmado`,`_200`,`_100`,`_50`,`_20`,`_10`,`monedas`,`user_id`,`turn_id`,`created_at`,`updated_at`,`deleted_at`) values 
(1,'2027-12-21',772.00,772.00,0.00,NULL,1,1,3,10,11,12,2,4,NULL,NULL,NULL);

/*Table structure for table `roles` */

DROP TABLE IF EXISTS `roles`;

CREATE TABLE `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_code_unique` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `roles` */

insert  into `roles`(`id`,`code`,`name`) values 
(1,'ROOT','Root'),
(2,'SUP','Super Usuario'),
(3,'ADM','Administrador');

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
(6,'Línea YPFB',NULL,NULL,6,2,NULL,NULL);

/*Table structure for table `tickets` */

DROP TABLE IF EXISTS `tickets`;

CREATE TABLE `tickets` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `codigo` int(11) NOT NULL,
  `serie` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `monto` double(15,2) NOT NULL,
  `estado` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fecha_uso` date DEFAULT NULL,
  `driver_id` bigint(20) unsigned DEFAULT NULL,
  `vehicle_id` bigint(20) unsigned DEFAULT NULL,
  `hosepipe_id` bigint(20) unsigned DEFAULT NULL,
  `turn_id` bigint(20) unsigned DEFAULT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `office_id` bigint(20) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tickets_driver_id_foreign` (`driver_id`),
  KEY `tickets_vehicle_id_foreign` (`vehicle_id`),
  KEY `tickets_hosepipe_id_foreign` (`hosepipe_id`),
  KEY `tickets_turn_id_foreign` (`turn_id`),
  KEY `tickets_user_id_foreign` (`user_id`),
  KEY `tickets_office_id_foreign` (`office_id`),
  CONSTRAINT `tickets_driver_id_foreign` FOREIGN KEY (`driver_id`) REFERENCES `drivers` (`id`) ON DELETE CASCADE,
  CONSTRAINT `tickets_hosepipe_id_foreign` FOREIGN KEY (`hosepipe_id`) REFERENCES `hosepipes` (`id`) ON DELETE CASCADE,
  CONSTRAINT `tickets_office_id_foreign` FOREIGN KEY (`office_id`) REFERENCES `offices` (`id`) ON DELETE SET NULL,
  CONSTRAINT `tickets_turn_id_foreign` FOREIGN KEY (`turn_id`) REFERENCES `turns` (`id`) ON DELETE CASCADE,
  CONSTRAINT `tickets_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `tickets_vehicle_id_foreign` FOREIGN KEY (`vehicle_id`) REFERENCES `vehicles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `tickets` */

/*Table structure for table `turns` */

DROP TABLE IF EXISTS `turns`;

CREATE TABLE `turns` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estado` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hora_inicio` time NOT NULL,
  `hora_fin` time NOT NULL,
  `office_id` bigint(20) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `turns_office_id_foreign` (`office_id`),
  CONSTRAINT `turns_office_id_foreign` FOREIGN KEY (`office_id`) REFERENCES `offices` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `turns` */

insert  into `turns`(`id`,`nombre`,`estado`,`hora_inicio`,`hora_fin`,`office_id`) values 
(1,'A','Activo','00:00:00','00:00:00',2),
(2,'B','Activo','00:00:00','00:00:00',2),
(3,'C','Activo','00:00:00','00:00:00',2),
(4,'D','Activo','00:00:00','00:00:00',2);

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`email`,`email_verified_at`,`password`,`role_id`,`remember_token`,`created_at`,`updated_at`,`deleted_at`) values 
(1,'john','john@gmail.com',NULL,'$2a$12$zgkb1g0b9czdFNvprtiydO7XJouEeP8La3Szqm7ftqirALmqD0bH6',1,'zDmjtRUCvZUV3lposjDinjteEsWcQlLhbEslXtkenZ4cnuOdOBnZ64ko2Edi','2021-04-06 17:52:46','2021-04-06 17:52:46',NULL),
(2,'Admin','admin@admin.admin',NULL,'$2y$10$.5V28j.gnkbDx45rBVlTb..pngEKoMkXjL8ZcCPIlE.QsAKSVFa4K',2,NULL,'2021-12-16 15:07:21','2021-12-24 20:52:37',NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `vehicles` */

insert  into `vehicles`(`id`,`placa`,`marca`,`modelo`,`anyo`,`color`,`estado`,`client_id`,`created_at`,`updated_at`) values 
(1,'2021-ABC','Toyota','Corolla','2021','Blanco','Activo',1,NULL,NULL),
(2,'2000-XYZ','Nissan','Condor','1995','Rojo','Activo',1,NULL,NULL),
(3,'Nuevo Vehículo','Nueva Marca','Nuevo Modelo','2020','color','Activo',2,NULL,NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
