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

/*Data for the table `banks` */

insert  into `banks`(`id`,`nombre`,`cuenta`,`moneda`,`monto`,`office_id`,`created_at`,`updated_at`) values 
(1,'BMSC','123456789','BS',119000.00,1,NULL,NULL);

/*Data for the table `buy_sells` */

insert  into `buy_sells`(`id`,`fecha_descarga`,`fecha_compra`,`hora_descarga`,`cantidad`,`nro_compra`,`factura`,`papeleria`,`adicional`,`debito_banco`,`vehiculo`,`chofer`,`responsable`,`observaciones`,`tipo`,`bank_id`,`tank_id`,`office_id`,`created_at`,`updated_at`) values 
(1,'2022-01-21','2022-01-20',NULL,5000.00,NULL,NULL,3.00,NULL,6000.00,NULL,NULL,NULL,NULL,'Compra',1,3,1,NULL,NULL);

/*Data for the table `clients` */

insert  into `clients`(`id`,`nombre`,`nit`,`correo`,`direccion`,`telefono`,`telefono2`,`representante_legal`,`representante_ci`,`representante_telefono`,`representante_telefono2`,`representante_email`,`representante_detalles`,`estado`,`office_id`,`user_id`,`created_at`,`updated_at`,`deleted_at`) values 
(1,'Hipermaxi El Prado','123456789',NULL,'Av. José Ballivian #753, Cochabamba','77776666',NULL,'Juan Perez',NULL,'76767676',NULL,'jperez@hipermaxi.com',NULL,'Activo',1,2,'2021-12-16 19:01:03','2021-12-16 19:01:03',NULL),
(2,'Nuevo Cliente','456789',NULL,'Nueva Dirección','78784545',NULL,'Nuevo Representante','Nuevo CI','11111111',NULL,'nuevo@email.com',NULL,'Activo',1,2,'2021-12-17 15:09:25','2021-12-17 15:09:25',NULL),
(3,'Nuevo Cliente S2','49841651',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Activo',2,2,'2021-12-28 21:42:48','2021-12-28 21:42:48',NULL);

/*Data for the table `dispensers` */

insert  into `dispensers`(`id`,`nombre`,`meter`,`fuel_id`,`tank_id`,`office_id`) values 
(1,'Dispenser 01',1020325.50,1,1,1),
(2,'Dispenser 02',1537029.50,1,1,1),
(3,'Disp 01',1681295.58,6,6,2),
(4,'Disp 02',1414509.44,6,6,2),
(5,'Disp 03',2615258.93,6,6,2),
(6,'Disp 04',2154691.55,6,6,2);

/*Data for the table `drivers` */

insert  into `drivers`(`id`,`nombre`,`ci`,`paterno`,`materno`,`licencia`,`estado`,`client_id`,`created_at`,`updated_at`) values 
(1,'Chofer','456456','01','','123456','Activo',1,NULL,NULL),
(2,'Chofer','123456','02','','123456','Activo',1,NULL,NULL),
(3,'Nuevo','565656','Chofer','','12312345','Activo',2,NULL,NULL),
(4,'Don Esteban',NULL,NULL,NULL,NULL,'Activo',3,NULL,NULL);

/*Data for the table `failed_jobs` */

/*Data for the table `fuels` */

insert  into `fuels`(`id`,`nombre`,`precio_compra`,`precio_venta`,`unidad`,`office_id`) values 
(1,'GNV',1.66,1.66,'m3',1),
(2,'Gasolina',3.74,3.74,'L',1),
(3,'Gasolina Premium',4.79,4.79,'L',1),
(4,'Diesel',3.72,3.72,'L',1),
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
(55,'BAN','Bancos','admin/bank',1,14);

/*Data for the table `hosepipes` */

insert  into `hosepipes`(`id`,`nombre`,`fuel_id`,`tank_id`,`dispenser_id`,`office_id`) values 
(1,'Manguera 01',1,1,1,NULL),
(2,'Manguera 02',1,1,1,NULL);

/*Data for the table `humans` */

insert  into `humans`(`id`,`password`,`nombre_completo`,`ci`,`fecha_nacimiento`,`direccion`,`zona`,`telefono`,`telefono2`,`nivel_estudio`,`estado_civil`,`hijos`,`ex_empresa`,`ex_cargo`,`ex_tiempo`,`ex_jefe`,`ex_renuncia`,`ex_observaciones`,`fecha_ingreso`,`fecha_retiro`,`casillero`,`siges`,`biometrico`,`softcontrol`,`cuenta_bmsc`,`afp`,`foto`,`nombre_garante`,`relacion_garante`,`telefono_garante`,`trabajo_garante`,`direccion_garante`,`nombre_referencia_personal`,`relacion_referencia_personal`,`telefono_referencia_personal`,`trabajo_referencia_personal`,`direccion_referencia_personal`,`office_id`,`created_at`,`updated_at`,`deleted_at`) values 
(1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,'2022-01-13 15:04:39','2022-01-13 15:04:45',NULL),
(2,'adminhappy123','Administrador','123456','1979-03-05','Dirección','Zona','78784545','456123','Grado de estudio','Soltero',0,'Empresa X','Administrador','6 meses','Nombre','Renuncia','Observacionas','2022-01-01',NULL,'1','Usuario123456','1','00000000','4040404040','FUTURO','storage/photos/user_2.JPG','Garante','Parentesco Garante','70707070','Trabajo Garante','Dirección Garante','Referencia Personal','Parentesco Referencia','76767676','Ocupación Referencia Personal','Dirección Referencia Personal',1,'2022-01-13 15:04:41','2022-01-13 15:04:47',NULL),
(3,'Operador',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'storage/photos/user_3.JPG',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,'2022-01-13 15:04:43','2022-01-13 15:04:48',NULL),
(4,'Jhenny','Jhenny Huaytari Calizaya','9388893 cb','1995-01-20','Av. Innominada y Calle Los Bosques','1 de Mayo','77979996','n/t','Bachiller','Casada',3,'Panadería Montaño','Repartidora','6 meses','Griseley Montaño','Por motivos familiares','Trabajo en sucre','2021-09-01',NULL,'11','JHENNY/8893','9','9388893/8893','4029952292','FUTURO','storage/photos/user_4.JPG','Victor Eduardo Rodriguez Tola','Esposo','77418199','Albañil','Misma dirección','Marisol Huayta Calizaya','Hermana','76441302','Cajera en Cafetería','Misma dirección',1,NULL,NULL,NULL),
(5,'dsa',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL);

/*Data for the table `menus` */

insert  into `menus`(`id`,`code`,`label`,`icon`,`orden`,`tamanyo`) values 
(1,'MROL','Roles','key',21,0),
(2,'MUSE','Usuarios','account',20,0),
(3,'MMEN','Menus','apps',1,0),
(4,'MFUN','Funcionalidades','key',2,0),
(5,'MOFF','Sucursal','city',5,0),
(6,'MCLI','Clientes','human-handsup',9,0),
(7,'MDIS','Dispensers','gas-station',8,0),
(8,'MTIC','Vales','ticket-confirmation',11,0),
(9,'MFUE','Combustible','fuel',6,0),
(10,'MARQ','Arqueo','cash-multiple',18,0),
(11,'MTUR','Turnos','clock',22,0),
(12,'MREP','Reportes','book-open-page-variant',19,100),
(13,'MCOM','Compra Cmble','truck',7,0),
(14,'MBAN','Bancos','bank',10,0);

/*Data for the table `migrations` */


/*Data for the table `offices` */

insert  into `offices`(`id`,`nombre`,`nit`,`telefono`,`ciudad`,`direccion`) values 
(1,'E.S. HIPODROMO','1000123456','78786464','Cochabamba - Bolivia','Av. Merchor Perez de Olguin Esq, C. Nueva Granada, Cochabamba'),
(2,'E.S. SIGLO XX',NULL,'78786565','COCHABAMBA - BOLIVIA','Av. Siglo XX Esq. Pedro de Toledo, Cochabamba');

/*Data for the table `password_resets` */

/*Data for the table `personal_access_tokens` */

/*Data for the table `privileges` */

insert  into `privileges`(`id`,`functionality_id`,`role_id`) values 
(180,32,4),
(181,37,4),
(182,40,4),
(345,1,1),
(346,2,1),
(347,3,1),
(348,4,1),
(349,5,1),
(350,6,1),
(351,7,1),
(352,8,1),
(353,9,1),
(354,10,1),
(355,11,1),
(356,12,1),
(357,13,1),
(358,14,1),
(359,15,1),
(360,16,1),
(361,17,1),
(362,18,1),
(363,19,1),
(364,20,1),
(365,21,1),
(366,22,1),
(367,23,1),
(368,24,1),
(369,25,1),
(370,26,1),
(371,27,1),
(372,28,1),
(373,29,1),
(374,30,1),
(375,31,1),
(376,32,1),
(377,33,1),
(378,34,1),
(379,35,1),
(380,36,1),
(381,37,1),
(382,38,1),
(383,39,1),
(384,40,1),
(385,41,1),
(386,42,1),
(387,43,1),
(388,44,1),
(389,45,1),
(390,46,1),
(391,47,1),
(392,48,1),
(393,49,1),
(394,50,1),
(395,51,1),
(396,52,1),
(397,53,1),
(398,54,1),
(399,55,1),
(400,1,2),
(401,2,2),
(402,3,2),
(403,4,2),
(404,5,2),
(405,6,2),
(406,7,2),
(407,8,2),
(408,17,2),
(409,18,2),
(410,19,2),
(411,20,2),
(412,21,2),
(413,22,2),
(414,23,2),
(415,24,2),
(416,25,2),
(417,27,2),
(418,28,2),
(419,29,2),
(420,30,2),
(421,31,2),
(422,32,2),
(423,33,2),
(424,34,2),
(425,35,2),
(426,36,2),
(427,37,2),
(428,38,2),
(429,39,2),
(430,40,2),
(431,41,2),
(432,42,2),
(433,43,2),
(434,44,2),
(435,45,2),
(436,46,2),
(437,47,2),
(438,48,2),
(439,49,2),
(440,50,2),
(441,51,2),
(442,52,2),
(443,53,2),
(444,54,2),
(445,55,2),
(446,5,3),
(447,6,3),
(448,8,3),
(449,21,3),
(450,22,3),
(451,23,3),
(452,24,3),
(453,25,3),
(454,26,3),
(455,28,3),
(456,29,3),
(457,30,3),
(458,31,3),
(459,32,3),
(460,33,3),
(461,34,3),
(462,36,3),
(463,37,3),
(464,39,3),
(465,40,3),
(466,41,3),
(467,42,3),
(468,44,3),
(469,45,3),
(470,46,3),
(471,48,3),
(472,49,3),
(473,50,3),
(474,51,3),
(475,52,3),
(476,53,3),
(477,54,3),
(478,55,3);

/*Data for the table `reports` */

insert  into `reports`(`id`,`fecha`,`monto_total`,`efectivo`,`tarjeta`,`firmado`,`calibracion`,`_200`,`_100`,`_50`,`_20`,`_10`,`monedas`,`user_id`,`turn_id`,`office_id`,`created_at`,`updated_at`,`deleted_at`) values 
(7,'2021-12-28',564.00,564.00,0.00,NULL,0.00,2,0,1,3,3,24.00,2,3,2,NULL,NULL,NULL),
(8,'2021-12-29',1499.91,1180.00,200.00,NULL,0.00,3,2,4,2,9,50.00,2,1,1,NULL,NULL,NULL),
(9,'2021-12-30',840.20,540.20,300.00,NULL,5.00,1,1,3,1,4,30.20,2,2,2,NULL,NULL,NULL),
(10,'2021-12-31',535.50,535.50,0.00,NULL,0.00,2,0,1,2,1,35.50,3,3,2,NULL,NULL,NULL),
(11,'2021-12-31',1140.40,1140.40,0.00,NULL,5.00,3,1,3,10,7,20.40,3,1,2,NULL,NULL,NULL),
(12,'2022-01-04',0.00,0.00,0.00,NULL,0.00,0,0,0,0,0,0.00,2,2,2,NULL,NULL,NULL),
(14,'2022-01-05',332.90,332.90,0.00,NULL,0.00,1,1,0,1,0,12.90,1,5,1,NULL,NULL,NULL);

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
(3,'Tanque Gasolina 01',7000,8500,2,1,NULL,NULL),
(4,'Tanque Gasolina 02',7000,5000,2,1,NULL,NULL),
(5,'Tanque Gasolina Premium',3000,1550,3,1,NULL,NULL),
(6,'Línea YPFB',NULL,NULL,6,2,NULL,NULL);

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

/*Data for the table `turns` */

insert  into `turns`(`id`,`nombre`,`estado`,`hora_inicio`,`hora_fin`,`office_id`) values 
(1,'A','Activo','00:00:00','00:00:00',2),
(2,'B','Activo','00:00:00','00:00:00',2),
(3,'C','Activo','00:00:00','00:00:00',2),
(4,'D','Activo','00:00:00','00:00:00',2),
(5,'A','Activo',NULL,NULL,1),
(6,'B','Activo',NULL,NULL,1),
(7,'C','Activo',NULL,NULL,1),
(8,'D','Activo',NULL,NULL,1);

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`email`,`email_verified_at`,`password`,`role_id`,`remember_token`,`created_at`,`updated_at`,`deleted_at`) values 
(1,'john','john@gmail.com',NULL,'$2a$12$zgkb1g0b9czdFNvprtiydO7XJouEeP8La3Szqm7ftqirALmqD0bH6',1,'YMdu2QZxE5fnGzy4nxQAxetDAy0E9cfx8AYdALUHaqbCUusjXVuNitTOyCoj','2021-04-06 17:52:46','2021-04-06 17:52:46',NULL),
(2,'Admin','admin@admin.admin',NULL,'$2y$10$.2fATZePr6Zb9R1oz6bgx.iX59ka8lLJIouDvtQ4nJW3FSrR3D0/i',2,'lsvqARHcSQxuJZFqZorlYNeDXjRSCoxwQl627FsapKLNkuO4inWUHYmcvlz5','2021-12-16 15:07:21','2022-01-18 10:58:51',NULL),
(3,'Operador','operador@operador.ope',NULL,'$2y$10$QQJNiewFYliI4yaU2tbQIeNnBhlY8dcAI0M/JRQ/QsHtimbV4iVOm',4,'ePs15hdofhqQtL2IIosbgKrfHWtAMf1c0TZgFiSqBKlYKMWJih75D6NJHtVd','2021-12-28 20:32:26','2022-01-18 11:02:54',NULL),
(4,'Jhenny','jhenny@gmail.com',NULL,'$2y$10$gSE2sglHa/4/XNSHAsfn7Orhxb1SlU3w8Su61xTe8ty7gDHPzEa3a',4,NULL,'2022-01-13 17:35:34','2022-01-18 11:03:18',NULL),
(5,'sa',NULL,NULL,'$2y$10$uTC0ATdu30HzWWjzz1bPv.nnBF6Qu9aa/YsYh91cR2rHDeYzt56mC',3,NULL,'2022-01-17 16:32:36','2022-01-17 16:38:39',NULL);

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
