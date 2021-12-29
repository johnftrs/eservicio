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

insert  into `accountings`(`id`,`cantidad`,`meter_inicial`,`meter_final`,`tipo`,`report_id`,`dispenser_id`,`user_id`,`created_at`,`updated_at`,`deleted_at`) values 
(3,0.66,1676675.22,1676675.88,NULL,2,3,2,NULL,NULL,NULL),
(4,0.67,2153687.32,2153687.99,NULL,2,6,2,NULL,NULL,NULL);

/*Data for the table `clients` */

insert  into `clients`(`id`,`nombre`,`nit`,`correo`,`direccion`,`telefono`,`telefono2`,`representante_legal`,`representante_ci`,`representante_telefono`,`representante_telefono2`,`representante_email`,`representante_detalles`,`estado`,`office_id`,`user_id`,`created_at`,`updated_at`,`deleted_at`) values 
(1,'Hipermaxi El Prado','123456789',NULL,'Av. José Ballivian #753, Cochabamba','77776666',NULL,'Juan Perez',NULL,'76767676',NULL,'jperez@hipermaxi.com',NULL,'Activo',1,2,'2021-12-16 19:01:03','2021-12-16 19:01:03',NULL),
(2,'Nuevo Cliente','456789',NULL,'Nueva Dirección','78784545',NULL,'Nuevo Representante','Nuevo CI','11111111',NULL,'nuevo@email.com',NULL,'Activo',1,2,'2021-12-17 15:09:25','2021-12-17 15:09:25',NULL),
(3,'Nuevo Cliente S2','49841651',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Activo',2,2,'2021-12-28 21:42:48','2021-12-28 21:42:48',NULL);

/*Data for the table `dispensers` */

insert  into `dispensers`(`id`,`nombre`,`meter`,`fuel_id`,`tank_id`,`office_id`) values 
(1,'Dispenser 01',0.00,1,1,1),
(2,'Dispenser 02',0.00,1,1,1),
(3,'Disp 01',1676995.88,6,6,2),
(4,'Disp 02',1413492.64,6,6,2),
(5,'Disp 03',2614678.93,6,6,2),
(6,'Disp 04',2153687.99,6,6,2);

/*Data for the table `drivers` */

insert  into `drivers`(`id`,`ci`,`nombre`,`paterno`,`materno`,`licencia`,`estado`,`client_id`,`created_at`,`updated_at`) values 
(1,'456456','Chofer','01','','123456','Activo',1,NULL,NULL),
(2,'123456','Chofer','02','','123456','Activo',1,NULL,NULL),
(3,'565656','Nuevo','Chofer','','12312345','Activo',2,NULL,NULL),
(4,NULL,'NCH1',NULL,NULL,NULL,'Activo',3,NULL,NULL);

/*Data for the table `failed_jobs` */

/*Data for the table `fuels` */

insert  into `fuels`(`id`,`nombre`,`precio_compra`,`precio_venta`,`unidad`,`office_id`) values 
(1,'GNV',1.66,1.66,'m3',1),
(2,'Gasolina',3.74,3.74,'L.',1),
(3,'Gasolina Premium',4.79,4.79,'L.',1),
(4,'Diesel',3.72,3.72,'L.',1),
(6,'GNV',NULL,1.66,NULL,2);

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
(44,'TUR','Ver Turnos','admin/turn',1,11);

/*Data for the table `hosepipes` */

insert  into `hosepipes`(`id`,`nombre`,`fuel_id`,`tank_id`,`dispenser_id`,`office_id`) values 
(1,'Manguera 01',1,1,1,NULL),
(2,'Manguera 02',1,1,1,NULL);

/*Data for the table `humans` */

insert  into `humans`(`id`,`ci`,`nombre_completo`,`password`,`direccion`,`telefono`,`telefono2`,`fecha_nacimiento`,`fecha_ingreso`,`nivel_estudio`,`biometrico`,`estado_civil`,`afp`,`foto`,`nombre_garante`,`relacion_garante`,`telefono_garante`,`trabajo_garante`,`direccion_garante`,`nombre_referencia_personal`,`relacion_referencia_personal`,`telefono_referencia_personal`,`trabajo_referencia_personal`,`direccion_referencia_personal`,`office_id`,`created_at`,`updated_at`,`deleted_at`) values 
(1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL),
(2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,2,NULL,NULL,NULL),
(3,NULL,NULL,'Operador',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,2,NULL,NULL,NULL);

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

/*Data for the table `migrations` */

/*Data for the table `offices` */

insert  into `offices`(`id`,`nombre`,`nit`,`direccion`) values 
(1,'E.S. HIPODROMO',NULL,'Av. Merchor Perez de Olguin Esq, C. Nueva Granada, Cochabamba'),
(2,'E.S. SIGLO XX',NULL,'Av. Siglo XX Esq. Pedro de Toledo, Cochabamba');

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
(156,44,2),
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
(182,40,4);

/*Data for the table `reports` */

insert  into `reports`(`id`,`fecha`,`monto_total`,`efectivo`,`tarjeta`,`firmado`,`_200`,`_100`,`_50`,`_20`,`_10`,`monedas`,`user_id`,`turn_id`,`created_at`,`updated_at`,`deleted_at`) values 
(2,'2028-12-21',600.00,540.00,60.00,NULL,1,2,1,1,5,20,2,2,NULL,NULL,NULL);

/*Data for the table `roles` */

insert  into `roles`(`id`,`code`,`name`) values 
(1,'ROOT','Root'),
(2,'SUP','Super Usuario'),
(3,'CON','Contador'),
(4,'OPE','Operador');

/*Data for the table `tanks` */

insert  into `tanks`(`id`,`nombre`,`total`,`actual`,`fuel_id`,`office_id`,`created_at`,`updated_at`) values 
(1,'Tanque Gas 01',5000,1500,1,1,NULL,NULL),
(2,'Tanque Gas 02',5000,2700,1,1,NULL,NULL),
(3,'Tanque Gasolina 01',7000,3500,2,1,NULL,NULL),
(4,'Tanque Gasolina 02',7000,5000,2,1,NULL,NULL),
(5,'Tanque Gasolina Premium',3000,1550,3,1,NULL,NULL),
(6,'Línea YPFB',NULL,NULL,6,2,NULL,NULL);

/*Data for the table `tickets` */

/*Data for the table `turns` */

insert  into `turns`(`id`,`nombre`,`estado`,`hora_inicio`,`hora_fin`,`office_id`) values 
(1,'A','Activo','00:00:00','00:00:00',2),
(2,'B','Activo','00:00:00','00:00:00',2),
(3,'C','Activo','00:00:00','00:00:00',2),
(4,'D','Activo','00:00:00','00:00:00',2);

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`email`,`email_verified_at`,`password`,`role_id`,`remember_token`,`created_at`,`updated_at`,`deleted_at`) values 
(1,'john','john@gmail.com',NULL,'$2a$12$zgkb1g0b9czdFNvprtiydO7XJouEeP8La3Szqm7ftqirALmqD0bH6',1,'zDmjtRUCvZUV3lposjDinjteEsWcQlLhbEslXtkenZ4cnuOdOBnZ64ko2Edi','2021-04-06 17:52:46','2021-04-06 17:52:46',NULL),
(2,'Admin','admin@admin.admin',NULL,'$2y$10$.5V28j.gnkbDx45rBVlTb..pngEKoMkXjL8ZcCPIlE.QsAKSVFa4K',2,NULL,'2021-12-16 15:07:21','2021-12-24 20:52:37',NULL),
(3,'Operador','operador@operador.ope',NULL,'$2y$10$YLCnkv6TvNNNM.NalAUtRu88SVzGbTzCSuzbo/gqdYwAX1rJ7VgQu',4,'ePs15hdofhqQtL2IIosbgKrfHWtAMf1c0TZgFiSqBKlYKMWJih75D6NJHtVd','2021-12-28 20:32:26','2021-12-28 20:32:26',NULL);

/*Data for the table `vehicles` */

insert  into `vehicles`(`id`,`placa`,`marca`,`modelo`,`anyo`,`color`,`estado`,`client_id`,`created_at`,`updated_at`) values 
(1,'2021-ABC','Toyota','Corolla','2021','Blanco','Activo',1,NULL,NULL),
(2,'2000-XYZ','Nissan','Condor','1995','Rojo','Activo',1,NULL,NULL),
(3,'Nuevo Vehículo','Nueva Marca','Nuevo Modelo','2020','color','Activo',2,NULL,NULL),
(4,'2125-dar','NM',NULL,NULL,NULL,'Activo',3,NULL,NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;