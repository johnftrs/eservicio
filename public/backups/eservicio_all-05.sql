/*
SQLyog Community v13.1.8 (64 bit)
MySQL - 10.4.21-MariaDB : Database - eservicio
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`eservicio` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `eservicio`;

/*Table structure for table `accountings` */

DROP TABLE IF EXISTS `accountings`;

CREATE TABLE `accountings` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `monto` double(15,2) NOT NULL,
  `meter_inicial` double(15,2) NOT NULL,
  `meter_final` double(15,2) NOT NULL,
  `tipo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `turn_id` bigint(20) unsigned DEFAULT NULL,
  `report_id` bigint(20) unsigned DEFAULT NULL,
  `hosepipe_id` bigint(20) unsigned DEFAULT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `accountings_turn_id_foreign` (`turn_id`),
  KEY `accountings_report_id_foreign` (`report_id`),
  KEY `accountings_hosepipe_id_foreign` (`hosepipe_id`),
  KEY `accountings_user_id_foreign` (`user_id`),
  CONSTRAINT `accountings_hosepipe_id_foreign` FOREIGN KEY (`hosepipe_id`) REFERENCES `hosepipes` (`id`) ON DELETE CASCADE,
  CONSTRAINT `accountings_report_id_foreign` FOREIGN KEY (`report_id`) REFERENCES `reports` (`id`) ON DELETE CASCADE,
  CONSTRAINT `accountings_turn_id_foreign` FOREIGN KEY (`turn_id`) REFERENCES `turns` (`id`) ON DELETE CASCADE,
  CONSTRAINT `accountings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `accountings` */

/*Table structure for table `cities` */

DROP TABLE IF EXISTS `cities`;

CREATE TABLE `cities` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coordenada` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `cities` */

insert  into `cities`(`id`,`code`,`nombre`,`coordenada`) values 
(1,'CB','Cochabamba','-17.389818, -66.179338');

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
  `location_id` bigint(20) unsigned DEFAULT NULL,
  `city_id` bigint(20) unsigned DEFAULT NULL,
  `office_id` bigint(20) unsigned DEFAULT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `clients_location_id_foreign` (`location_id`),
  KEY `clients_city_id_foreign` (`city_id`),
  KEY `clients_office_id_foreign` (`office_id`),
  KEY `clients_user_id_foreign` (`user_id`),
  CONSTRAINT `clients_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE CASCADE,
  CONSTRAINT `clients_location_id_foreign` FOREIGN KEY (`location_id`) REFERENCES `locations` (`id`) ON DELETE CASCADE,
  CONSTRAINT `clients_office_id_foreign` FOREIGN KEY (`office_id`) REFERENCES `offices` (`id`) ON DELETE CASCADE,
  CONSTRAINT `clients_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `clients` */

insert  into `clients`(`id`,`nombre`,`nit`,`correo`,`direccion`,`telefono`,`telefono2`,`representante_legal`,`representante_ci`,`representante_telefono`,`representante_telefono2`,`representante_email`,`representante_detalles`,`estado`,`location_id`,`city_id`,`office_id`,`user_id`,`created_at`,`updated_at`,`deleted_at`) values 
(1,'Hipermaxi El Prado','123456789',NULL,'Av. José Ballivian #753, Cochabamba','77776666',NULL,'Juan Perez',NULL,'76767676',NULL,'jperez@hipermaxi.com',NULL,'Activo',1,1,1,2,'2021-12-16 19:01:03','2021-12-16 19:01:03',NULL),
(2,'Nuevo Cliente','456789',NULL,'Nueva Dirección','78784545',NULL,'Nuevo Representante','Nuevo CI','11111111',NULL,'nuevo@email.com',NULL,'Activo',1,1,1,2,'2021-12-17 15:09:25','2021-12-17 15:09:25',NULL);

/*Table structure for table `dispensers` */

DROP TABLE IF EXISTS `dispensers`;

CREATE TABLE `dispensers` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `office_id` bigint(20) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `dispensers_office_id_foreign` (`office_id`),
  CONSTRAINT `dispensers_office_id_foreign` FOREIGN KEY (`office_id`) REFERENCES `offices` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `dispensers` */

insert  into `dispensers`(`id`,`nombre`,`office_id`) values 
(1,'Dispenser 01',1),
(2,'Dispenser 02',1);

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
  `precio` double(15,2) NOT NULL,
  `unidad` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `fuels` */

insert  into `fuels`(`id`,`nombre`,`precio`,`unidad`) values 
(1,'GVN',1.66,'m3'),
(2,'Gasolina',3.74,'L.'),
(3,'Gasolina Premium',4.79,'L.'),
(4,'Diesel',3.72,'L.');

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
(21,'CCIT','Registrar Ciudad','admin/city/create',0,6),
(22,'ECIT','Editar Ciudad','admin/city/edit',0,6),
(23,'DCIT','Eliminar Ciudad','admin/city/delete',0,6),
(24,'CIT','Ver Ciudades','admin/city',1,6),
(25,'CLOC','Crear Localidad','admin/location/create',0,7),
(26,'ELOC','Editar Localidad','admin/location/edit',0,7),
(27,'DLOC','Eliminar Localidad','admin/location/delete',0,7),
(28,'LOC','Ver Localidades','admin/location',1,7),
(29,'CCLI','Registrar Cliente','admin/client/create',0,8),
(30,'ECLI','Editar Cliente','admin/client/edit',0,8),
(31,'DCLI','Eliminar Cliente','admin/client/delete',0,8),
(32,'CLI','Ver clientes','admin/client',1,8),
(33,'CDIS','Registrar Dispenser','admin/dispenser/create',0,9),
(34,'EDIS','Editar Dispenser','admin/dispenser/edit',0,9),
(35,'DDIS','Eliminar Dispenser','admin/dispenser/delete',0,9),
(36,'DIS','Ver Dispensers','admin/dispenser',1,9),
(37,'CTIC','Crear Vale','admin/ticket/create',0,10),
(38,'ETIC','Editar Vale','admin/ticket/edit',0,10),
(39,'DTIC','Eliminar Ticket','admin/ticket/delete',0,10),
(40,'TIC','Ver Tickets','admin/ticket',1,10),
(41,'CFUE','Registrar Combustibl','admin/fuel/create',0,11),
(42,'EFUE','Editar Combustible','admin/fuel/edit',0,11),
(43,'DFUE','Eliminar Combustible','admin/fuel/delete',0,11),
(44,'FUE','Ver Combustibles','admin/fuel',1,11);

/*Table structure for table `hosepipes` */

DROP TABLE IF EXISTS `hosepipes`;

CREATE TABLE `hosepipes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fuel_id` bigint(20) unsigned DEFAULT NULL,
  `tank_id` bigint(20) unsigned DEFAULT NULL,
  `dispenser_id` bigint(20) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `hosepipes_fuel_id_foreign` (`fuel_id`),
  KEY `hosepipes_tank_id_foreign` (`tank_id`),
  KEY `hosepipes_dispenser_id_foreign` (`dispenser_id`),
  CONSTRAINT `hosepipes_dispenser_id_foreign` FOREIGN KEY (`dispenser_id`) REFERENCES `dispensers` (`id`) ON DELETE SET NULL,
  CONSTRAINT `hosepipes_fuel_id_foreign` FOREIGN KEY (`fuel_id`) REFERENCES `fuels` (`id`) ON DELETE SET NULL,
  CONSTRAINT `hosepipes_tank_id_foreign` FOREIGN KEY (`tank_id`) REFERENCES `tanks` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `hosepipes` */

insert  into `hosepipes`(`id`,`nombre`,`fuel_id`,`tank_id`,`dispenser_id`) values 
(1,'Manguera 01',1,1,1),
(2,'Manguera 02',1,1,1);

/*Table structure for table `hours` */

DROP TABLE IF EXISTS `hours`;

CREATE TABLE `hours` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `hora_inicio` time NOT NULL,
  `hora_fin` time NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `hours` */

/*Table structure for table `humans` */

DROP TABLE IF EXISTS `humans`;

CREATE TABLE `humans` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `ci` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `paterno` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `materno` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `direccion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefono` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
  `location_id` bigint(20) unsigned DEFAULT NULL,
  `city_id` bigint(20) unsigned DEFAULT NULL,
  `office_id` bigint(20) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `humans_location_id_foreign` (`location_id`),
  KEY `humans_city_id_foreign` (`city_id`),
  KEY `humans_office_id_foreign` (`office_id`),
  CONSTRAINT `humans_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE CASCADE,
  CONSTRAINT `humans_location_id_foreign` FOREIGN KEY (`location_id`) REFERENCES `locations` (`id`) ON DELETE CASCADE,
  CONSTRAINT `humans_office_id_foreign` FOREIGN KEY (`office_id`) REFERENCES `offices` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `humans` */

insert  into `humans`(`id`,`ci`,`nombre`,`paterno`,`materno`,`direccion`,`telefono`,`fecha_nacimiento`,`fecha_ingreso`,`nivel_estudio`,`biometrico`,`estado_civil`,`afp`,`foto`,`nombre_garante`,`relacion_garante`,`telefono_garante`,`trabajo_garante`,`direccion_garante`,`nombre_referencia_personal`,`relacion_referencia_personal`,`telefono_referencia_personal`,`trabajo_referencia_personal`,`direccion_referencia_personal`,`location_id`,`city_id`,`office_id`,`created_at`,`updated_at`,`deleted_at`) values 
(1,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,1,1,NULL,NULL,NULL),
(2,'00000000','Administrador','__',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,1,1,NULL,NULL,NULL),
(3,NULL,'fdsafdaf',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,1,1,NULL,NULL,NULL);

/*Table structure for table `locations` */

DROP TABLE IF EXISTS `locations`;

CREATE TABLE `locations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coordenada` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city_id` bigint(20) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `locations_city_id_foreign` (`city_id`),
  CONSTRAINT `locations_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `locations` */

insert  into `locations`(`id`,`nombre`,`coordenada`,`city_id`) values 
(1,'Cercado','-17.389818, -66.179338',1);

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
(1,'MROL','Roles','account-card-details',20,0),
(2,'MUSE','Usuarios','account',19,0),
(3,'MMEN','Menus','apps',1,0),
(4,'MFUN','Funcionalidades','key',2,0),
(5,'MOFF','Sucursales','city-variant',5,0),
(6,'MCIT','Ciudades','map',3,0),
(7,'MLOC','Localidades','map-marker-radius',4,0),
(8,'MCLI','Clientes','human-handsup',8,0),
(9,'MDIS','Dispenser','gas-station',7,0),
(10,'MTIC','Vales','ticket-confirmation',11,0),
(11,'MFUE','Combustible','fuel',6,0);

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(9,'2021_12_14_223641_create_cities_table',1),
(10,'2021_12_14_223658_create_locations_table',1),
(11,'2021_12_14_223715_create_offices_table',1),
(12,'2021_12_14_223739_create_dispensers_table',1),
(13,'2021_12_14_223756_create_fuels_table',1),
(14,'2021_12_14_223812_create_tanks_table',1),
(15,'2021_12_14_223828_create_hosepipes_table',1),
(16,'2021_12_14_223844_create_hours_table',1),
(17,'2021_12_14_223859_create_turns_table',1),
(18,'2021_12_14_223918_create_clients_table',1),
(19,'2021_12_14_223938_create_vehicles_table',1),
(20,'2021_12_14_223954_create_drivers_table',1),
(21,'2021_12_14_224012_create_tickets_table',1),
(22,'2021_12_14_224029_create_reports_table',1),
(23,'2021_12_14_224048_create_accountings_table',1),
(24,'2021_12_14_224115_create_humans_table',1);

/*Table structure for table `offices` */

DROP TABLE IF EXISTS `offices`;

CREATE TABLE `offices` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `direccion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coordenada` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location_id` bigint(20) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `offices_location_id_foreign` (`location_id`),
  CONSTRAINT `offices_location_id_foreign` FOREIGN KEY (`location_id`) REFERENCES `locations` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `offices` */

insert  into `offices`(`id`,`nombre`,`nit`,`direccion`,`coordenada`,`location_id`) values 
(1,'Central Grupo Lotus',NULL,'Av. Merchor Perez de Olguin Esq, C. Nueva Granada, Cochabamba','-17.389818, -66.179338',1);

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
) ENGINE=InnoDB AUTO_INCREMENT=158 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(130,9,8),
(131,10,8),
(132,13,8),
(133,1,2),
(134,2,2),
(135,5,2),
(136,6,2),
(137,9,2),
(138,10,2),
(139,13,2),
(140,14,2),
(145,13,3),
(146,16,3),
(150,5,9),
(151,6,9),
(152,7,9),
(153,11,9),
(154,12,9),
(155,9,10),
(156,10,10),
(157,11,10);

/*Table structure for table `reports` */

DROP TABLE IF EXISTS `reports`;

CREATE TABLE `reports` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `monto` double(15,2) NOT NULL,
  `efectivo` double(15,2) NOT NULL,
  `tarjeta` double(15,2) NOT NULL,
  `firmado` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N',
  `200` int(11) DEFAULT NULL,
  `100` int(11) DEFAULT NULL,
  `50` int(11) DEFAULT NULL,
  `20` int(11) DEFAULT NULL,
  `10` int(11) DEFAULT NULL,
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `reports` */

/*Table structure for table `roles` */

DROP TABLE IF EXISTS `roles`;

CREATE TABLE `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_unique` (`name`),
  UNIQUE KEY `roles_code_unique` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `roles` */

insert  into `roles`(`id`,`code`,`name`) values 
(1,'ROOT','Root'),
(2,'ADM','Administrador'),
(3,'OPE','Operador'),
(8,'fdfds','gfdgfd'),
(9,'fdsfdsfds','fdsfds'),
(10,'jghj','fdsfjhg');

/*Table structure for table `tanks` */

DROP TABLE IF EXISTS `tanks`;

CREATE TABLE `tanks` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` bigint(20) DEFAULT NULL,
  `actual` bigint(20) DEFAULT NULL,
  `fuel_id` bigint(20) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tanks_fuel_id_foreign` (`fuel_id`),
  CONSTRAINT `tanks_fuel_id_foreign` FOREIGN KEY (`fuel_id`) REFERENCES `fuels` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `tanks` */

insert  into `tanks`(`id`,`nombre`,`total`,`actual`,`fuel_id`,`created_at`,`updated_at`) values 
(1,'Tanque Gas 01',5000,1500,1,NULL,NULL),
(2,'Tanque Gas 02',5000,2700,1,NULL,NULL),
(3,'Tanque Gasolina 01',7000,3500,2,NULL,NULL),
(4,'Tanque Gasolina 02',7000,5000,2,NULL,NULL),
(5,'Tanque Gasolina Premium',3000,1550,3,NULL,NULL);

/*Table structure for table `tickets` */

DROP TABLE IF EXISTS `tickets`;

CREATE TABLE `tickets` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `codigo` int(11) NOT NULL,
  `monto` int(11) NOT NULL,
  `estado` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tipo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fecha_uso` date DEFAULT NULL,
  `driver_id` bigint(20) unsigned DEFAULT NULL,
  `vehicle_id` bigint(20) unsigned DEFAULT NULL,
  `hosepipe_id` bigint(20) unsigned DEFAULT NULL,
  `turn_id` bigint(20) unsigned DEFAULT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tickets_driver_id_foreign` (`driver_id`),
  KEY `tickets_vehicle_id_foreign` (`vehicle_id`),
  KEY `tickets_hosepipe_id_foreign` (`hosepipe_id`),
  KEY `tickets_turn_id_foreign` (`turn_id`),
  KEY `tickets_user_id_foreign` (`user_id`),
  CONSTRAINT `tickets_driver_id_foreign` FOREIGN KEY (`driver_id`) REFERENCES `drivers` (`id`) ON DELETE CASCADE,
  CONSTRAINT `tickets_hosepipe_id_foreign` FOREIGN KEY (`hosepipe_id`) REFERENCES `hosepipes` (`id`) ON DELETE CASCADE,
  CONSTRAINT `tickets_turn_id_foreign` FOREIGN KEY (`turn_id`) REFERENCES `turns` (`id`) ON DELETE CASCADE,
  CONSTRAINT `tickets_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `tickets_vehicle_id_foreign` FOREIGN KEY (`vehicle_id`) REFERENCES `vehicles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=112 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `tickets` */

insert  into `tickets`(`id`,`codigo`,`monto`,`estado`,`tipo`,`fecha_uso`,`driver_id`,`vehicle_id`,`hosepipe_id`,`turn_id`,`user_id`,`created_at`,`updated_at`) values 
(1,1,100,'Inactivo','',NULL,NULL,NULL,NULL,NULL,1,NULL,NULL),
(2,2,150,'Activo','',NULL,NULL,NULL,NULL,NULL,1,NULL,NULL),
(3,3,100,'Activo','',NULL,NULL,NULL,NULL,NULL,1,NULL,NULL),
(4,4,100,'Activo','',NULL,NULL,NULL,NULL,NULL,2,NULL,NULL),
(5,5,100,'Activo','',NULL,NULL,NULL,NULL,NULL,1,NULL,NULL),
(6,6,50,'Usado','','2021-12-17',3,1,2,NULL,2,NULL,NULL),
(7,7,50,'Usado','','2021-12-17',2,2,1,NULL,2,NULL,NULL),
(8,8,50,'Activo','',NULL,NULL,NULL,NULL,NULL,1,NULL,NULL),
(9,9,50,'Inactivo','',NULL,NULL,NULL,NULL,NULL,1,NULL,NULL),
(10,10,50,'Activo','',NULL,NULL,NULL,NULL,NULL,1,NULL,NULL),
(11,1100,100,'Activo','',NULL,NULL,NULL,NULL,NULL,2,NULL,NULL),
(12,1101,100,'Activo','',NULL,NULL,NULL,NULL,NULL,2,NULL,NULL),
(13,1102,100,'Activo','',NULL,NULL,NULL,NULL,NULL,2,NULL,NULL),
(14,1103,100,'Activo','',NULL,NULL,NULL,NULL,NULL,2,NULL,NULL),
(15,1104,100,'Activo','',NULL,NULL,NULL,NULL,NULL,2,NULL,NULL),
(16,1105,100,'Activo','',NULL,NULL,NULL,NULL,NULL,2,NULL,NULL),
(17,1106,100,'Activo','',NULL,NULL,NULL,NULL,NULL,2,NULL,NULL),
(18,1107,100,'Activo','',NULL,NULL,NULL,NULL,NULL,2,NULL,NULL),
(19,1108,100,'Activo','',NULL,NULL,NULL,NULL,NULL,2,NULL,NULL),
(20,1109,100,'Activo','',NULL,NULL,NULL,NULL,NULL,2,NULL,NULL),
(21,1110,100,'Activo','',NULL,NULL,NULL,NULL,NULL,2,NULL,NULL),
(22,1111,100,'Activo','',NULL,NULL,NULL,NULL,NULL,2,NULL,NULL),
(23,1112,100,'Activo','',NULL,NULL,NULL,NULL,NULL,2,NULL,NULL),
(24,1113,100,'Activo','',NULL,NULL,NULL,NULL,NULL,2,NULL,NULL),
(25,1114,100,'Activo','',NULL,NULL,NULL,NULL,NULL,2,NULL,NULL),
(26,1115,100,'Activo','',NULL,NULL,NULL,NULL,NULL,2,NULL,NULL),
(27,1116,100,'Activo','',NULL,NULL,NULL,NULL,NULL,2,NULL,NULL),
(28,1117,100,'Activo','',NULL,NULL,NULL,NULL,NULL,2,NULL,NULL),
(29,1118,100,'Activo','',NULL,NULL,NULL,NULL,NULL,2,NULL,NULL),
(30,1119,100,'Activo','',NULL,NULL,NULL,NULL,NULL,2,NULL,NULL),
(31,1120,100,'Activo','',NULL,NULL,NULL,NULL,NULL,2,NULL,NULL),
(32,1121,100,'Activo','',NULL,NULL,NULL,NULL,NULL,2,NULL,NULL),
(33,1122,100,'Activo','',NULL,NULL,NULL,NULL,NULL,2,NULL,NULL),
(34,1123,100,'Activo','',NULL,NULL,NULL,NULL,NULL,2,NULL,NULL),
(35,1124,100,'Activo','',NULL,NULL,NULL,NULL,NULL,2,NULL,NULL),
(36,1125,100,'Activo','',NULL,NULL,NULL,NULL,NULL,2,NULL,NULL),
(37,1126,100,'Activo','',NULL,NULL,NULL,NULL,NULL,2,NULL,NULL),
(38,1127,100,'Activo','',NULL,NULL,NULL,NULL,NULL,2,NULL,NULL),
(39,1128,100,'Activo','',NULL,NULL,NULL,NULL,NULL,2,NULL,NULL),
(40,1129,100,'Activo','',NULL,NULL,NULL,NULL,NULL,2,NULL,NULL),
(41,1130,100,'Activo','',NULL,NULL,NULL,NULL,NULL,2,NULL,NULL),
(42,1131,100,'Activo','',NULL,NULL,NULL,NULL,NULL,2,NULL,NULL),
(43,1132,100,'Activo','',NULL,NULL,NULL,NULL,NULL,2,NULL,NULL),
(44,1133,100,'Activo','',NULL,NULL,NULL,NULL,NULL,2,NULL,NULL),
(45,1134,100,'Activo','',NULL,NULL,NULL,NULL,NULL,2,NULL,NULL),
(46,1135,100,'Activo','',NULL,NULL,NULL,NULL,NULL,2,NULL,NULL),
(47,1136,100,'Activo','',NULL,NULL,NULL,NULL,NULL,2,NULL,NULL),
(48,1137,100,'Activo','',NULL,NULL,NULL,NULL,NULL,2,NULL,NULL),
(49,1138,100,'Activo','',NULL,NULL,NULL,NULL,NULL,2,NULL,NULL),
(50,1139,100,'Activo','',NULL,NULL,NULL,NULL,NULL,2,NULL,NULL),
(51,1140,100,'Activo','',NULL,NULL,NULL,NULL,NULL,2,NULL,NULL),
(52,1141,100,'Activo','',NULL,NULL,NULL,NULL,NULL,2,NULL,NULL),
(53,1142,100,'Activo','',NULL,NULL,NULL,NULL,NULL,2,NULL,NULL),
(54,1143,100,'Activo','',NULL,NULL,NULL,NULL,NULL,2,NULL,NULL),
(55,1144,100,'Activo','',NULL,NULL,NULL,NULL,NULL,2,NULL,NULL),
(56,1145,100,'Activo','',NULL,NULL,NULL,NULL,NULL,2,NULL,NULL),
(57,1146,100,'Activo','',NULL,NULL,NULL,NULL,NULL,2,NULL,NULL),
(58,1147,100,'Activo','',NULL,NULL,NULL,NULL,NULL,2,NULL,NULL),
(59,1148,100,'Activo','',NULL,NULL,NULL,NULL,NULL,2,NULL,NULL),
(60,1149,100,'Activo','',NULL,NULL,NULL,NULL,NULL,2,NULL,NULL),
(61,1150,100,'Activo','',NULL,NULL,NULL,NULL,NULL,2,NULL,NULL),
(62,1151,100,'Activo','',NULL,NULL,NULL,NULL,NULL,2,NULL,NULL),
(63,1152,100,'Activo','',NULL,NULL,NULL,NULL,NULL,2,NULL,NULL),
(64,1153,100,'Activo','',NULL,NULL,NULL,NULL,NULL,2,NULL,NULL),
(65,1154,100,'Activo','',NULL,NULL,NULL,NULL,NULL,2,NULL,NULL),
(66,1155,100,'Activo','',NULL,NULL,NULL,NULL,NULL,2,NULL,NULL),
(67,1156,100,'Activo','',NULL,NULL,NULL,NULL,NULL,2,NULL,NULL),
(68,1157,100,'Activo','',NULL,NULL,NULL,NULL,NULL,2,NULL,NULL),
(69,1158,100,'Activo','',NULL,NULL,NULL,NULL,NULL,2,NULL,NULL),
(70,1159,100,'Activo','',NULL,NULL,NULL,NULL,NULL,2,NULL,NULL),
(71,1160,100,'Activo','',NULL,NULL,NULL,NULL,NULL,2,NULL,NULL),
(72,1161,100,'Activo','',NULL,NULL,NULL,NULL,NULL,2,NULL,NULL),
(73,1162,100,'Activo','',NULL,NULL,NULL,NULL,NULL,2,NULL,NULL),
(74,1163,100,'Activo','',NULL,NULL,NULL,NULL,NULL,2,NULL,NULL),
(75,1164,100,'Activo','',NULL,NULL,NULL,NULL,NULL,2,NULL,NULL),
(76,1165,100,'Activo','',NULL,NULL,NULL,NULL,NULL,2,NULL,NULL),
(77,1166,100,'Activo','',NULL,NULL,NULL,NULL,NULL,2,NULL,NULL),
(78,1167,100,'Activo','',NULL,NULL,NULL,NULL,NULL,2,NULL,NULL),
(79,1168,100,'Activo','',NULL,NULL,NULL,NULL,NULL,2,NULL,NULL),
(80,1169,100,'Activo','',NULL,NULL,NULL,NULL,NULL,2,NULL,NULL),
(81,1170,100,'Activo','',NULL,NULL,NULL,NULL,NULL,2,NULL,NULL),
(82,1171,100,'Activo','',NULL,NULL,NULL,NULL,NULL,2,NULL,NULL),
(83,1172,100,'Activo','',NULL,NULL,NULL,NULL,NULL,2,NULL,NULL),
(84,1173,100,'Activo','',NULL,NULL,NULL,NULL,NULL,2,NULL,NULL),
(85,1174,100,'Activo','',NULL,NULL,NULL,NULL,NULL,2,NULL,NULL),
(86,1175,100,'Activo','',NULL,NULL,NULL,NULL,NULL,2,NULL,NULL),
(87,1176,100,'Activo','',NULL,NULL,NULL,NULL,NULL,2,NULL,NULL),
(88,1177,100,'Activo','',NULL,NULL,NULL,NULL,NULL,2,NULL,NULL),
(89,1178,100,'Activo','',NULL,NULL,NULL,NULL,NULL,2,NULL,NULL),
(90,1179,100,'Activo','',NULL,NULL,NULL,NULL,NULL,2,NULL,NULL),
(91,1180,100,'Activo','',NULL,NULL,NULL,NULL,NULL,2,NULL,NULL),
(92,1181,100,'Activo','',NULL,NULL,NULL,NULL,NULL,2,NULL,NULL),
(93,1182,100,'Activo','',NULL,NULL,NULL,NULL,NULL,2,NULL,NULL),
(94,1183,100,'Activo','',NULL,NULL,NULL,NULL,NULL,2,NULL,NULL),
(95,1184,100,'Activo','',NULL,NULL,NULL,NULL,NULL,2,NULL,NULL),
(96,1185,100,'Activo','',NULL,NULL,NULL,NULL,NULL,2,NULL,NULL),
(97,1186,100,'Activo','',NULL,NULL,NULL,NULL,NULL,2,NULL,NULL),
(98,1187,100,'Activo','',NULL,NULL,NULL,NULL,NULL,2,NULL,NULL),
(99,1188,100,'Activo','',NULL,NULL,NULL,NULL,NULL,2,NULL,NULL),
(100,1189,100,'Activo','',NULL,NULL,NULL,NULL,NULL,2,NULL,NULL),
(101,1190,100,'Activo','',NULL,NULL,NULL,NULL,NULL,2,NULL,NULL),
(102,1191,100,'Activo','',NULL,NULL,NULL,NULL,NULL,2,NULL,NULL),
(103,1192,100,'Activo','',NULL,NULL,NULL,NULL,NULL,2,NULL,NULL),
(104,1193,100,'Activo','',NULL,NULL,NULL,NULL,NULL,2,NULL,NULL),
(105,1194,100,'Activo','',NULL,NULL,NULL,NULL,NULL,2,NULL,NULL),
(106,1195,100,'Activo','',NULL,NULL,NULL,NULL,NULL,2,NULL,NULL),
(107,1196,100,'Activo','',NULL,NULL,NULL,NULL,NULL,2,NULL,NULL),
(108,1197,100,'Activo','',NULL,NULL,NULL,NULL,NULL,2,NULL,NULL),
(109,1198,100,'Activo','',NULL,NULL,NULL,NULL,NULL,2,NULL,NULL),
(110,1199,100,'Activo','',NULL,NULL,NULL,NULL,NULL,2,NULL,NULL),
(111,1200,100,'Activo','',NULL,NULL,NULL,NULL,NULL,2,NULL,NULL);

/*Table structure for table `turns` */

DROP TABLE IF EXISTS `turns`;

CREATE TABLE `turns` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `dia_inicio` date DEFAULT NULL,
  `dia_fin` date DEFAULT NULL,
  `hour_id` bigint(20) unsigned DEFAULT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `turns_hour_id_foreign` (`hour_id`),
  KEY `turns_user_id_foreign` (`user_id`),
  CONSTRAINT `turns_hour_id_foreign` FOREIGN KEY (`hour_id`) REFERENCES `hours` (`id`) ON DELETE SET NULL,
  CONSTRAINT `turns_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `turns` */

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` bigint(20) unsigned DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_role_id_foreign` (`role_id`),
  CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`email`,`email_verified_at`,`password`,`role_id`,`remember_token`,`created_at`,`updated_at`,`deleted_at`) values 
(1,'john','john@gmail.com',NULL,'$2a$12$zgkb1g0b9czdFNvprtiydO7XJouEeP8La3Szqm7ftqirALmqD0bH6',1,'rFjoPR1CJc4gbZOrnRgVukiXX2lv7z90Hh1h85RYVpwmvSwrU29Sta54PAgf','2021-04-06 17:52:46','2021-04-06 17:52:46',NULL),
(2,'Admin','admin@admin.admin',NULL,'$2y$10$yMttVzdolibV.hCmgIP5FOztz5JDNQa4JQhtapb93wc2X/rkhTA0i',1,NULL,'2021-12-16 15:07:21','2021-12-16 17:04:10',NULL),
(3,'Admin','asd@fdsa.fdf',NULL,'$2y$10$oH7m9q1ToD5Du.7He81R4e/s5QP9hzxR78jBd0lzjVnwHI/7eB4CK',3,NULL,'2021-12-19 14:01:19','2021-12-19 14:01:19',NULL);

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
