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

/*Data for the table `accountings` */

/*Data for the table `cities` */

insert  into `cities`(`id`,`code`,`nombre`,`coordenada`) values 
(1,'CB','Cochabamba','-17.389818, -66.179338');

/*Data for the table `clients` */

insert  into `clients`(`id`,`nombre`,`nit`,`correo`,`direccion`,`telefono`,`telefono2`,`representante_legal`,`representante_ci`,`representante_telefono`,`representante_telefono2`,`representante_email`,`representante_detalles`,`estado`,`location_id`,`city_id`,`office_id`,`user_id`,`created_at`,`updated_at`,`deleted_at`) values 
(1,'Hipermaxi El Prado','123456789',NULL,'Av. José Ballivian #753, Cochabamba','77776666',NULL,'Juan Perez',NULL,'76767676',NULL,'jperez@hipermaxi.com',NULL,'Activo',1,1,1,2,'2021-12-16 19:01:03','2021-12-16 19:01:03',NULL),
(2,'Nuevo Cliente','456789',NULL,'Nueva Dirección','78784545',NULL,'Nuevo Representante','Nuevo CI','11111111',NULL,'nuevo@email.com',NULL,'Activo',1,1,1,2,'2021-12-17 15:09:25','2021-12-17 15:09:25',NULL);

/*Data for the table `dispensers` */

insert  into `dispensers`(`id`,`nombre`,`office_id`) values 
(1,'Dispenser 01',1),
(2,'Dispenser 02',1);

/*Data for the table `drivers` */

insert  into `drivers`(`id`,`ci`,`nombre`,`paterno`,`materno`,`licencia`,`estado`,`client_id`,`created_at`,`updated_at`) values 
(1,'456456','Chofer','01','','123456','Activo',1,NULL,NULL),
(2,'123456','Chofer','02','','123456','Activo',1,NULL,NULL),
(3,'565656','Nuevo','Chofer','','12312345','Activo',2,NULL,NULL);

/*Data for the table `failed_jobs` */

/*Data for the table `fuels` */

insert  into `fuels`(`id`,`nombre`,`precio`,`unidad`) values 
(1,'GVN',1.66,'m3'),
(2,'Gasolina',3.74,'L.'),
(3,'Gasolina Premium',4.79,'L.'),
(4,'Diesel',3.72,'L.');

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

/*Data for the table `hosepipes` */

insert  into `hosepipes`(`id`,`nombre`,`fuel_id`,`tank_id`,`dispenser_id`) values 
(1,'Manguera 01',1,1,1),
(2,'Manguera 02',1,1,1);

/*Data for the table `hours` */

/*Data for the table `humans` */

insert  into `humans`(`id`,`ci`,`nombre`,`paterno`,`materno`,`direccion`,`telefono`,`fecha_nacimiento`,`fecha_ingreso`,`nivel_estudio`,`biometrico`,`estado_civil`,`afp`,`foto`,`nombre_garante`,`relacion_garante`,`telefono_garante`,`trabajo_garante`,`direccion_garante`,`nombre_referencia_personal`,`relacion_referencia_personal`,`telefono_referencia_personal`,`trabajo_referencia_personal`,`direccion_referencia_personal`,`location_id`,`city_id`,`office_id`,`created_at`,`updated_at`,`deleted_at`) values 
(1,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,1,1,NULL,NULL,NULL),
(2,'00000000','Administrador','__',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,1,1,NULL,NULL,NULL),
(3,NULL,'fdsafdaf',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,1,1,NULL,NULL,NULL);

/*Data for the table `locations` */

insert  into `locations`(`id`,`nombre`,`coordenada`,`city_id`) values 
(1,'Cercado','-17.389818, -66.179338',1);

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

/*Data for the table `migrations` */

/*Data for the table `offices` */

insert  into `offices`(`id`,`nombre`,`nit`,`direccion`,`coordenada`,`location_id`) values 
(1,'Central Grupo Lotus',NULL,'Av. Merchor Perez de Olguin Esq, C. Nueva Granada, Cochabamba','-17.389818, -66.179338',1);

/*Data for the table `password_resets` */

/*Data for the table `personal_access_tokens` */

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
(140,14,2);

/*Data for the table `reports` */

/*Data for the table `roles` */

insert  into `roles`(`id`,`code`,`name`) values 
(1,'ROOT','Root'),
(2,'ADM','Administrador'),
(8,'fdfds','gfdgfd');

/*Data for the table `tanks` */

insert  into `tanks`(`id`,`nombre`,`total`,`actual`,`fuel_id`,`created_at`,`updated_at`) values 
(1,'Tanque Gas 01',5000,1500,1,NULL,NULL),
(2,'Tanque Gas 02',5000,2700,1,NULL,NULL),
(3,'Tanque Gasolina 01',7000,3500,2,NULL,NULL),
(4,'Tanque Gasolina 02',7000,5000,2,NULL,NULL),
(5,'Tanque Gasolina Premium',3000,1550,3,NULL,NULL);

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

/*Data for the table `turns` */

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`email`,`email_verified_at`,`password`,`role_id`,`remember_token`,`created_at`,`updated_at`,`deleted_at`) values 
(1,'john','john@gmail.com',NULL,'$2a$12$zgkb1g0b9czdFNvprtiydO7XJouEeP8La3Szqm7ftqirALmqD0bH6',1,'rFjoPR1CJc4gbZOrnRgVukiXX2lv7z90Hh1h85RYVpwmvSwrU29Sta54PAgf','2021-04-06 17:52:46','2021-04-06 17:52:46',NULL),
(2,'Admin','admin@admin.admin',NULL,'$2y$10$yMttVzdolibV.hCmgIP5FOztz5JDNQa4JQhtapb93wc2X/rkhTA0i',1,NULL,'2021-12-16 15:07:21','2021-12-16 17:04:10',NULL),
(3,'fdfdsf','asd@fdsa.fdf',NULL,'$2y$10$oH7m9q1ToD5Du.7He81R4e/s5QP9hzxR78jBd0lzjVnwHI/7eB4CK',8,NULL,'2021-12-19 14:01:19','2021-12-19 14:01:19',NULL);

/*Data for the table `vehicles` */

insert  into `vehicles`(`id`,`placa`,`marca`,`modelo`,`anyo`,`color`,`estado`,`client_id`,`created_at`,`updated_at`) values 
(1,'2021-ABC','Toyota','Corolla','2021','Blanco','Activo',1,NULL,NULL),
(2,'2000-XYZ','Nissan','Condor','1995','Rojo','Activo',1,NULL,NULL),
(3,'Nuevo Vehículo','Nueva Marca','Nuevo Modelo','2020','color','Activo',2,NULL,NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
