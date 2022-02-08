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

INSERT INTO `accountings` (`id`, `cantidad`, `meter_inicial`, `meter_final`, `tipo`, `report_id`, `dispenser_id`, `user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 2000.00, 4793508.19, 4795508.19, NULL, 1, 9, 2, '2022-02-02 00:53:15', '2022-02-02 00:53:15', NULL);

/*Data for the table `asignations` */

/*Data for the table `banks` */

INSERT INTO `banks` (`id`, `nombre`, `cuenta`, `moneda`, `monto`, `office_id`, `created_at`, `updated_at`) VALUES
(1, 'Banco Union', '1 - 6381408', 'BS', 108272.91, 2, NULL, NULL);

/*Data for the table `buy_sells` */

INSERT INTO `buy_sells` (`id`, `fecha_descarga`, `fecha_compra`, `hora_descarga`, `cantidad`, `nro_compra`, `factura`, `papeleria`, `adicional`, `debito_banco`, `vehiculo`, `chofer`, `responsable`, `observaciones`, `tipo`, `bank_id`, `tank_id`, `office_id`, `user_id`, `created_at`, `updated_at`) VALUES
(2, '2022-01-18', '2022-01-18', '08:00:00', 14000.00, '001121544', '1524', 3.00, 2.40, 49567.80, '1881-FYT', 'Alfredo Guzman', 'Marina Caceres', 'DO 14000 LTRS', 'Compra', 1, 3, 2, 2, NULL, NULL),
(3, '2022-01-18', '2022-01-18', '08:00:00', 14000.00, '123456789', '1234', 3.00, 2.40, 49567.80, '1590 - TRY', 'Alvaro Perez', 'Marina Caceres', 'DO 14000 Lts', 'Compra', 1, 7, 2, 2, NULL, NULL);

/*Data for the table `clients` */

INSERT INTO `clients` (`id`, `nombre`, `nit`, `correo`, `direccion`, `telefono`, `telefono2`, `representante_legal`, `representante_ci`, `representante_telefono`, `representante_telefono2`, `representante_email`, `representante_detalles`, `estado`, `office_id`, `user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3, 'Nuevo Cliente S2', '49841651', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Activo', 2, 2, '2021-12-29 18:42:48', '2021-12-29 18:42:48', NULL),
(4, 'Empresa Municipal de servicios de Aseo', '10240000018', NULL, 'Av final circunvalacion', '4235551', '4235552', 'Raul Alvarez ', '9847451 cb', 'Jaime Mamani', '6514213 cb', 'emsa@gmail.com.bo', NULL, 'Activo', 1, 2, '2022-01-22 09:19:43', '2022-01-22 11:50:30', NULL),
(5, 'Otros Clientes', '17548111019', NULL, 'Av Melchor perez de olguin zona hipodromo', '4254188', '4254189', 'Milton Lopez', '9874444 cb', 'Elena saavedra', '7845125 cb', 'otrosclientes@gmail.com', NULL, 'Activo', 1, 2, '2022-01-22 09:22:57', '2022-01-22 09:22:57', NULL),
(6, 'Daoli SRL', '974112200012', NULL, 'AV PETROLERA KM 4', '4222500', '422501', 'Ivan Hidalgo', '9874521cb', 'Erika Rocha', '9854741 cb', 'clientesant@gmail.com.bo', NULL, 'Activo', 1, 2, '2022-01-22 11:49:50', '2022-01-28 05:29:36', NULL);

/*Data for the table `conciliations` */

/*Data for the table `dispensers` */

INSERT INTO `dispensers` (`id`, `nombre`, `meter`, `fuel_id`, `tank_id`, `office_id`) VALUES
(3, 'Disp 01', 1681295.58, 6, 6, 2),
(4, 'Disp 02', 1414509.44, 6, 6, 2),
(5, 'Disp 03', 2615258.93, 6, 6, 2),
(6, 'Disp 04', 2154691.55, 6, 6, 2),
(9, 'GNV 01', 4795508.19, 1, 1, 1),
(10, 'GNV 02', 3930395.23, 1, 1, 1),
(11, 'GNV 03', 1610021.19, 1, 1, 1),
(12, 'GNV 04', 1257875.64, 1, 1, 1),
(13, 'GNV 05', 2692092.18, 1, 1, 1),
(14, 'GNV 06', 3265162.82, 1, 1, 1),
(15, 'GNV 07', 6544915.17, 1, 1, 1),
(16, 'GNV 08', 6889799.64, 1, 1, 1),
(17, 'DIESEL 09', 5949348.45, 4, 7, 1),
(18, 'DIESEL 11', 12148348.92, 4, 7, 1),
(19, 'DIESEL 13', 3879989.62, 4, 7, 1),
(20, 'DIESEL 14', 2928850.50, 4, 7, 1),
(21, 'GASOLINA 10', 6645539.45, 2, 1, 1),
(22, 'GASOLINA 12', 4027370.33, 2, 1, 1);

/*Data for the table `drivers` */

INSERT INTO `drivers` (`id`, `nombre`, `ci`, `paterno`, `materno`, `licencia`, `estado`, `client_id`, `created_at`, `updated_at`) VALUES
(4, 'Don Esteban', NULL, NULL, NULL, NULL, 'Activo', 3, NULL, NULL),
(5, 'Alfredo', '5641112', 'Guzman', 'Mariaca', '5641112', 'Activo', 4, NULL, NULL);

/*Data for the table `factors` */

/*Data for the table `failed_jobs` */

/*Data for the table `fuels` */

INSERT INTO `fuels` (`id`, `nombre`, `precio_compra`, `precio_venta`, `unidad`, `office_id`) VALUES
(1, 'GNV', 1.66, 1.66, 'm3', 1),
(2, 'Gasolina', 3.74, 3.74, 'L', 1),
(3, 'Gasolina Premium', 4.79, 4.79, 'L', 1),
(4, 'Diesel', 3.72, 3.72, 'L', 1),
(6, 'GNV', NULL, 1.66, NULL, 2);

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

/*Data for the table `humans` */

INSERT INTO `humans` (`id`, `password`, `nombre_completo`, `ci`, `fecha_nacimiento`, `direccion`, `zona`, `telefono`, `telefono2`, `nivel_estudio`, `estado_civil`, `hijos`, `ex_empresa`, `ex_cargo`, `ex_tiempo`, `ex_jefe`, `ex_renuncia`, `ex_observaciones`, `fecha_ingreso`, `fecha_retiro`, `casillero`, `siges`, `biometrico`, `softcontrol`, `cuenta_bmsc`, `afp`, `foto`, `nombre_garante`, `relacion_garante`, `telefono_garante`, `trabajo_garante`, `direccion_garante`, `nombre_referencia_personal`, `relacion_referencia_personal`, `telefono_referencia_personal`, `trabajo_referencia_personal`, `direccion_referencia_personal`, `office_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-01-14 12:04:39', '2022-01-14 12:04:45', NULL),
(2, 'adminhappy123', 'Administrador', '123456', '1979-03-05', 'Dirección', 'Zona', '78784545', '456123', 'Grado de estudio', 'Soltero', 0, 'Empresa X', 'Administrador', '6 meses', 'Nombre', 'Renuncia', 'Observacionas', '2022-01-01', NULL, '1', 'Usuario123456', '1', '00000000', '4040404040', 'FUTURO', 'storage/photos/user_2.JPG', 'Garante', 'Parentesco Garante', '70707070', 'Trabajo Garante', 'Dirección Garante', 'Referencia Personal', 'Parentesco Referencia', '76767676', 'Ocupación Referencia Personal', 'Dirección Referencia Personal', 1, '2022-01-14 12:04:41', '2022-01-28 17:32:41', NULL),
(3, 'Operador', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'storage/photos/user_3.JPG', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-01-14 12:04:43', '2022-01-14 12:04:48', NULL),
(4, 'Jhenny', 'Jhenny Huaytari Calizaya', '9388893 cb', '1995-01-20', 'Av. Innominada y Calle Los Bosques', '1 de Mayo', '77979996', 'n/t', 'Bachiller', 'Casada', 3, 'Panadería Montaño', 'Repartidora', '6 meses', 'Griseley Montaño', 'Por motivos familiares', 'Trabajo en sucre', '2021-09-01', NULL, '11', 'JHENNY/8893', '9', '9388893/8893', '4029952292', 'FUTURO', 'storage/photos/user_4.JPG', 'Victor Eduardo Rodriguez Tola', 'Esposo', '77418199', 'Albañil', 'Misma dirección', 'Marisol Huayta Calizaya', 'Hermana', '76441302', 'Cajera en Cafetería', 'Misma dirección', 1, NULL, NULL, NULL),
(5, 'dsa', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL),
(6, '0109', 'Junior Jesus Guillen Alvarado', '14700109', '1999-11-07', 'Av. Melchor Prez y Calle La Merced', 'Mayorazgo', '75494086', '0', 'Bachiller', 'Soltero', 0, 'E.S. LAS PALMERAS', 'Operador', '3 Meses', '0', 'Culminacion de contrato', '0', '2021-09-01', '2021-11-28', '5', 'JUNIOR/0109', '12', '14700109/0109', '4066652059', 'FUTURO', 'storage/photos/user_6.JPG', 'Jose Luis Alvarado Quinteros', 'Tio', '67570689', 'Chofer de taxi', 'Misma direccion del operador', 'Toribia Quinteros Nuñez', 'Abuela', '4420011', 'Ama de casa', 'Misma direccion del operador', 1, NULL, NULL, NULL),
(7, '0664', 'Jacquelin Hinojosa Huanca', '7860664', '2000-08-15', 'Av. Innominada y Calle Los Bosques', 'Tacata', '72704019', '0', 'Bachiller', 'Casada', 0, 'CHANST Y UUON', 'Vendedora de ropa', '1 mes', 'Fabio', 'Falta de pago', '0', '2021-12-02', '2022-02-28', '5', 'JACQUELIN/0664', '9', '7860664/0664', '4070842931', 'Futuro', 'storage/photos/user_7.JPG', 'Sandra Huanca Fernandez', 'Mama', '67583269', 'Comerciante de abarrotes', 'Misma direccion del operador', 'Ivan Hinojosa Huanca', 'Hermano', '75901232', 'Estudiante', 'Misma direccion del operador', 1, NULL, NULL, NULL),
(8, '2509', 'Galia Hefziba Quiroga Carrasco', '9422509', '1997-07-15', 'Av.Simon Lopez y Calle 12 de Octubre', 'Colquiri Norte', '65342074', '0', 'Bachiller', 'Soltera', 1, 'E.S. ASUNCION', 'Operadora ', '1 Mes', '0', 'Problemas de salud', '0', '2021-11-06', '2022-02-02', '8', 'GALIA/2509', '6', '9422509/2509', '4069994655', 'FUTURO', 'storage/photos/user_8.JPG', 'Paola Ivanna Carrasco Covarrubias', 'Mama', '79758430', 'Ama de casa', 'Misma direccion del operador', 'Ivan Quiroga Carrasco', 'Hermano', '62722072', 'Repartidor delivery', 'Misma direccion del operador', 1, NULL, NULL, NULL),
(9, '6414', 'Adriana Ariel Quiroga Carrasco', '9316414', '1995-09-05', 'Av.Simon Lopez y Calle Colquiri Sud', 'Colquiri Sud', '70792997', '0', 'Bachiller', 'Soltera', 0, 'E.S. CNG', 'Operadora', '6 Meses', 'David Escobar', 'Retiro Voluntario', '0', '2021-07-01', '2021-09-27', '1', 'ARIEL/6414', '5', '9316414/6414', '4067579475', 'FUTURO', 'storage/photos/user_9.JPG', 'Victor Hugo Lia Rudon', 'Amigo', '70723827', 'Chofer taxi particular', 'Av. Republica y Calle Honduras', 'Paola Ivanna Carrasco Covarrubias', 'Mama', '79758430', 'Ama de casa', 'Misma direccion del operador', 1, NULL, NULL, NULL);

/*Data for the table `lots` */

/*Data for the table `mensurations` */

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

/*Data for the table `migrations` */

/*Data for the table `offices` */

INSERT INTO `offices` (`id`, `nombre`, `nit`, `telefono`, `ciudad`, `direccion`) VALUES
(1, 'E.S. HIPODROMO', '1000123456', '78786464', 'Cochabamba - Bolivia', 'Av. Merchor Perez de Olguin Esq, C. Nueva Granada, Cochabamba'),
(2, 'E.S. SIGLO XX', NULL, '78786565', 'COCHABAMBA - BOLIVIA', 'Av. Siglo XX Esq. Pedro de Toledo, Cochabamba');

/*Data for the table `padlocks` */

/*Data for the table `password_resets` */

/*Data for the table `personal_access_tokens` */

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

/*Data for the table `reports` */

INSERT INTO `reports` (`id`, `fecha`, `monto_total`, `efectivo`, `tarjeta`, `firmado`, `calibracion`, `_200`, `_100`, `_50`, `_20`, `_10`, `monedas`, `user_id`, `turn_id`, `office_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '2022-02-01', 2500.00, 2500.00, 0.00, NULL, 0.00, 10, 5, 0, 0, 0, 0.00, 2, 5, 1, '2022-02-02 00:53:15', '2022-02-02 00:53:15', NULL);

/*Data for the table `roles` */

insert  into `roles`(`id`,`code`,`name`) values 
(1,'ROOT','Root'),
(2,'SUP','Super Usuario'),
(3,'CON','Contador'),
(4,'OPE','Operador');

/*Data for the table `tanks` */

INSERT INTO `tanks` (`id`, `nombre`, `total`, `actual`, `fuel_id`, `office_id`, `created_at`, `updated_at`) VALUES
(1, 'Línea de Gas YPFB', NULL, NULL, 1, 1, NULL, NULL),
(3, 'Tanque de Gasolina', 40000.00, 15000.00, 2, 1, NULL, NULL),
(5, 'Tanque Gasolina Premium', 40000.00, 1550.00, 3, 1, NULL, NULL),
(6, 'Línea YPFB', NULL, NULL, 6, 2, NULL, NULL),
(7, 'TANQUE DIESEL', 40000.00, -237874.65, 4, 1, NULL, NULL);

/*Data for the table `tickets` */

/*Data for the table `turns` */

INSERT INTO `turns` (`id`, `nombre`, `estado`, `hora_inicio`, `hora_fin`, `office_id`) VALUES
(1, 'A', 'Activo', '00:00:00', '00:00:00', 2),
(2, 'B', 'Activo', '00:00:00', '00:00:00', 2),
(3, 'C', 'Activo', '00:00:00', '00:00:00', 2),
(4, 'D', 'Activo', '00:00:00', '00:00:00', 2),
(5, 'A', 'Activo', '06:00:00', '13:59:00', 1),
(6, 'B', 'Activo', '14:00:00', '21:59:00', 1),
(7, 'C', 'Activo', '22:00:00', '11:59:00', 1),
(8, 'E', 'Activo', '12:00:00', '05:59:00', 1);

/*Data for the table `users` */

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role_id`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'john', 'john@gmail.com', NULL, '$2a$12$zgkb1g0b9czdFNvprtiydO7XJouEeP8La3Szqm7ftqirALmqD0bH6', 1, 'YMdu2QZxE5fnGzy4nxQAxetDAy0E9cfx8AYdALUHaqbCUusjXVuNitTOyCoj', '2021-04-07 11:52:46', '2021-04-07 11:52:46', NULL),
(2, 'Admin', 'admin@admin.admin', NULL, '$2y$10$.2fATZePr6Zb9R1oz6bgx.iX59ka8lLJIouDvtQ4nJW3FSrR3D0/i', 2, 'AvvnqPZ42CO8Gi0qedrc08TII8UauBckzL7OaM4bfDXvLNveCVtfD8pbXvFj', '2021-12-17 12:07:21', '2022-01-19 07:58:51', NULL),
(3, 'Operador', 'operador@operador.ope', NULL, '$2y$10$QQJNiewFYliI4yaU2tbQIeNnBhlY8dcAI0M/JRQ/QsHtimbV4iVOm', 4, 'ePs15hdofhqQtL2IIosbgKrfHWtAMf1c0TZgFiSqBKlYKMWJih75D6NJHtVd', '2021-12-29 17:32:26', '2022-01-19 08:02:54', NULL),
(4, 'Jhenny', 'jhenny@gmail.com', NULL, '$2y$10$gSE2sglHa/4/XNSHAsfn7Orhxb1SlU3w8Su61xTe8ty7gDHPzEa3a', 4, NULL, '2022-01-14 14:35:34', '2022-01-22 12:36:34', '2022-01-22 12:36:34'),
(5, 'sa', NULL, NULL, '$2y$10$uTC0ATdu30HzWWjzz1bPv.nnBF6Qu9aa/YsYh91cR2rHDeYzt56mC', 3, NULL, '2022-01-18 13:32:36', '2022-01-21 11:16:29', '2022-01-21 11:16:29'),
(6, 'Junior', '0', NULL, '$2y$10$nsgh04iIw15R7v7yCS.PtexITlIEoAiw8XadsEgcoBu7GBzf6fKeO', 4, 'ybmTZElUnXsrtye9fJwQZILmxUsE55c4oIqFSJ90p5IbXXoD0HzGZu1HR2Gm', '2022-01-22 12:44:17', '2022-01-26 02:23:27', NULL),
(7, 'Jacquelin', '0', NULL, '$2y$10$zxRcfpr2z55eiXHWEi5cUORXXRYmUnuCumjcJ0lBNbOlTOJxi92c6', 4, NULL, '2022-01-22 13:06:29', '2022-01-22 13:06:29', NULL),
(8, 'Galia', '0', NULL, '$2y$10$ezI8w9SQt9UNnuExBbU6Ue/tW8g1QvtNbm.034h6gSZuXQXjGg.Ny', 4, NULL, '2022-01-22 13:17:39', '2022-01-22 13:17:39', NULL),
(9, 'Adriana', '0', NULL, '$2y$10$pyVhYysgq/CQPtlQnFwBpOiMfYoqG5l/S2hfy9vy8XL03etIGJlV.', 4, NULL, '2022-01-22 13:23:39', '2022-01-26 02:24:07', NULL);

/*Data for the table `vehicles` */

INSERT INTO `vehicles` (`id`, `placa`, `marca`, `modelo`, `anyo`, `color`, `estado`, `client_id`, `created_at`, `updated_at`) VALUES
(4, '2125-dar', 'NM', NULL, NULL, NULL, 'Activo', 3, NULL, NULL),
(5, '1827-FYT', 'RENAULT', 'RENAULT', '1998', 'BLANCO', 'Activo', 4, NULL, NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
