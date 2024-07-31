-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2022 at 03:15 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `isupport`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_log`
--

CREATE TABLE `activity_log` (
  `ID` int(10) NOT NULL,
  `task` varchar(5000) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `activity_log`
--

INSERT INTO `activity_log` (`ID`, `task`) VALUES
(899, 'Ndueso Walter Okorie Confirmed payment and Generated Access Code On 2022-03-20 10:46:08'),
(900, 'Ndueso Walter Okorie Confirmed payment and Generated Access Code On 2022-03-20 10:46:40'),
(898, 'Ndueso Walter Okorie Confirmed payment and Generated Access Code On 2022-03-20 10:43:02'),
(897, 'Ndueso Walter Okorie Confirmed payment and Generated Access Code On 2022-03-20 10:42:02'),
(896, 'Ndueso Walter Okorie Confirmed payment and Generated Access Code On 2022-03-20 10:37:28'),
(894, 'Ndueso Walter Okorie Confirmed payment and Generated Access Code On 2022-03-20 10:32:26'),
(895, 'Ndueso Walter Okorie Confirmed payment and Generated Access Code On 2022-03-20 10:34:12'),
(893, 'Ndueso Walter Okorie Deleted Payment On 2022-03-20 09:51:11'),
(892, 'Ndueso Walter Okorie Deleted Payment On 2022-03-20 09:18:52'),
(891, 'Ndueso Walter Okorie Logged In On 2022-03-20 09:15:48'),
(890, 'Ndueso Walter Okorie logged Out On 2022-03-20 09:15:46'),
(888, 'Ndueso Walter Okorie Deleted Payment On 2022-03-20 09:14:10'),
(889, 'Ndueso Walter Okorie Deleted Payment On 2022-03-20 09:15:13'),
(887, 'Ndueso Walter Okorie Deleted Payment On 2022-03-20 09:12:31'),
(886, 'Ndueso Walter Okorie Deleted Payment On 2022-03-20 09:11:24'),
(885, 'Ndueso Walter Okorie Deleted Payment On 2022-03-20 09:10:09'),
(884, 'Ndueso Walter Okorie Deleted Payment On 2022-03-20 09:06:38'),
(883, 'Ndueso Walter Okorie Deleted Payment On 2022-03-20 09:05:34'),
(882, 'Ndueso Walter Okorie Deleted Payment On 2022-03-20 09:00:20'),
(881, 'Ndueso Walter Okorie Deleted User On 2022-03-20 08:51:50'),
(880, 'Ndueso Walter Okorie Activate/Deactivate User On 2022-03-19 18:52:20'),
(901, 'Ndueso Walter Okorie Confirmed payment and Generated Access Code On 2022-03-20 12:10:05'),
(902, 'Ndueso Walter Okorie Confirmed payment and Generated Access Code On 2022-03-20 12:29:54'),
(903, 'Ndueso Walter Okorie Confirmed payment and Generated Access Code On 2022-03-20 12:32:28'),
(904, 'Ndueso Walter Okorie Confirmed payment and Generated Access Code On 2022-03-20 12:36:40'),
(905, 'Ndueso Walter Okorie Confirmed payment and Generated Access Code On 2022-03-20 12:41:26'),
(906, 'Ndueso Walter Okorie Confirmed payment and Generated Access Code On 2022-03-20 12:45:33'),
(907, 'Ndueso Walter Okorie Confirmed payment and Generated Access Code On 2022-03-20 12:46:35'),
(908, 'Anonymous Submitted payment details On '),
(909, 'Anonymous Submitted payment details On '),
(910, 'Anonymous Submitted payment details On '),
(911, 'Anonymous Submitted payment details On '),
(912, 'Anonymous Submitted payment details On '),
(913, 'Anonymous Submitted payment details On '),
(914, 'Anonymous Submitted payment details On '),
(915, 'Anonymous Submitted payment details On '),
(916, 'Anonymous Submitted payment details On '),
(917, 'Anonymous Submitted payment details On '),
(918, 'Anonymous Submitted payment details On '),
(919, 'Anonymous Submitted payment details On '),
(920, 'Anonymous Submitted payment details On '),
(921, 'Anonymous Submitted payment details On '),
(922, 'Anonymous Submitted payment details On '),
(923, 'Anonymous Submitted payment details On '),
(924, 'Anonymous Submitted payment details On '),
(925, 'Anonymous Submitted payment details On '),
(926, 'Anonymous Submitted payment details On '),
(927, 'Ndueso Walter Okorie Logged In On 2022-03-30 12:21:13'),
(928, 'Anonymous Submitted payment details On '),
(929, 'Anonymous Submitted payment details On '),
(930, 'Anonymous Submitted payment details On '),
(931, 'Anonymous Submitted payment details On '),
(932, 'Anonymous Submitted payment details On '),
(933, 'Anonymous Submitted payment details On '),
(934, 'Anonymous Submitted payment details On '),
(935, 'Anonymous Submitted payment details On '),
(936, 'Anonymous Submitted payment details On '),
(937, 'Anonymous Submitted payment details On '),
(938, 'Anonymous Submitted payment details On '),
(939, 'Anonymous Submitted payment details On '),
(940, 'Anonymous Submitted payment details On '),
(941, 'Anonymous Submitted payment details On '),
(942, 'Anonymous Submitted payment details On '),
(943, 'Anonymous Submitted payment details On '),
(944, 'Anonymous Submitted payment details On '),
(945, 'Anonymous Submitted payment details On '),
(946, 'Anonymous Submitted payment details On '),
(947, 'Ndueso Walter Okorie Confirmed payment and Generated Access Code On 2022-03-30 17:32:14'),
(948, 'Ndueso Walter Okorie Confirmed payment and Generated Access Code On 2022-03-30 17:33:25'),
(949, 'Ndueso Walter Okorie Confirmed payment and Generated Access Code On 2022-03-30 17:35:38'),
(950, 'Anonymous Made Payment On '),
(951, 'Anonymous Made Payment On '),
(952, 'Anonymous Made Payment On '),
(953, 'Anonymous Made Payment On '),
(954, 'Anonymous Made Payment On '),
(955, 'Anonymous Made Payment On '),
(956, 'Anonymous Made Payment On '),
(957, 'Anonymous Made Payment On '),
(958, 'Anonymous Made Payment On '),
(959, 'Anonymous Made Payment On '),
(960, 'Anonymous Made Payment On '),
(961, 'Anonymous Made Payment On '),
(962, 'Anonymous Made Payment On '),
(963, 'Anonymous Made Payment On '),
(964, 'Anonymous Made Payment On '),
(965, 'Anonymous Made Payment On '),
(966, 'Anonymous Made Payment On '),
(967, 'Anonymous Made Payment On '),
(968, 'Anonymous Made Payment On '),
(969, 'Anonymous Made Payment On '),
(970, 'Anonymous Made Payment On '),
(971, 'Anonymous Made Payment On '),
(972, 'Anonymous Made Payment On '),
(973, 'Anonymous Made Payment On '),
(974, 'Anonymous Made Payment On '),
(975, 'Anonymous Made Payment On '),
(976, 'Anonymous Made Payment On '),
(977, 'Anonymous Made Payment On '),
(978, 'Anonymous Made Payment On '),
(979, 'Anonymous Made Payment On '),
(980, 'Anonymous Made Payment On '),
(981, 'Anonymous Made Payment On 2022-04-01 13:16:12'),
(982, 'Anonymous Made Payment On 2022-04-01 13:17:32'),
(983, 'Anonymous Made Payment On 2022-04-01 13:22:00'),
(984, 'Anonymous Made Payment On 2022-04-01 13:23:30'),
(985, 'Anonymous Made Payment On 2022-04-01 13:27:16'),
(986, 'Anonymous Made Payment On 2022-04-01 13:28:20'),
(987, 'Anonymous Made Payment On 2022-04-01 13:31:25'),
(988, 'Anonymous Made Payment On 2022-04-01 13:32:03'),
(989, 'Anonymous Made Payment On 2022-04-01 13:32:53'),
(990, 'Ndueso Walter Okorie Logged In On 2022-04-01 13:49:12'),
(991, 'Anonymous Submitted payment details On '),
(992, 'Ndueso Walter Okorie Confirmed payment and Generated Access Code On 2022-04-01 14:01:09'),
(993, 'Ndueso Walter Okorie Confirmed payment and Generated Access Code On 2022-04-01 14:04:25'),
(994, 'Anonymous Made Payment On 2022-04-01 14:11:33'),
(995, 'Anonymous Made Payment On 2022-04-01 14:25:39'),
(996, 'Anonymous Made Payment On 2022-04-01 14:28:48'),
(997, 'Anonymous Made Payment On 2022-04-01 14:49:36'),
(998, 'Anonymous Made Payment On 2022-04-01 14:51:15'),
(999, 'Anonymous Made Payment On 2022-04-01 14:55:02'),
(1000, 'Anonymous Made Payment On 2022-04-01 14:59:06'),
(1001, 'Anonymous Made Payment On 2022-04-01 15:00:10'),
(1002, 'Anonymous Made Payment On 2022-04-01 16:24:20'),
(1003, 'Anonymous Made Payment On 2022-04-01 16:25:10'),
(1004, 'Anonymous Made Payment On 2022-04-01 16:26:13'),
(1005, 'Anonymous Made Payment On 2022-04-01 16:26:53'),
(1006, 'Anonymous Made Payment On 2022-04-01 16:28:02'),
(1007, 'Anonymous Made Payment On 2022-04-01 16:28:41'),
(1008, 'Anonymous Made Payment On 2022-04-01 16:29:15'),
(1009, 'Anonymous Made Payment On 2022-04-01 16:30:31'),
(1010, 'Anonymous Submitted payment details On '),
(1011, 'Ndueso Walter Okorie Logged In On 2022-04-01 16:33:27'),
(1012, 'Ndueso Walter Okorie logged Out On 2022-04-01 17:44:44'),
(1013, 'Ndueso Walter Okorie Logged In On 2022-04-01 17:44:46'),
(1014, 'Ndueso Walter Okorie logged Out On 2022-04-01 17:45:45'),
(1015, 'Ndueso Walter Okorie Logged In On 2022-04-01 17:45:48'),
(1016, 'Ndueso Walter Okorie logged Out On 2022-04-01 17:46:10'),
(1017, 'sdddd Logged In On 2022-04-01 17:46:18'),
(1018, 'sdddd logged Out On 2022-04-01 18:04:29'),
(1019, 'Ndueso Walter Okorie Logged In On 2022-04-01 18:04:32'),
(1020, 'Ndueso Walter Okorie Logged In On 2022-04-01 18:04:32'),
(1021, 'Ndueso Walter Okorie logged Out On 2022-04-01 18:09:04'),
(1022, 'sddd Logged In On 2022-04-01 18:09:11'),
(1023, 'sddd Confirmed payment and Generated Access Code On 2022-04-01 20:57:01'),
(1024, 'Anonymous Submitted payment details On '),
(1025, 'Anonymous Made Payment On 2022-04-02 11:23:15'),
(1026, 'Anonymous Made Payment On 2022-04-02 11:24:22'),
(1027, 'Anonymous Made Payment On 2022-04-02 12:25:33'),
(1028, 'Anonymous Made Payment On 2022-04-02 12:26:34'),
(1029, 'sddd Logged In On 2022-04-02 12:35:08'),
(1030, 'Ndueso Walter Okorie Logged In On 2022-04-23 22:16:54'),
(1031, 'Ndueso Walter Okorie Added New User On 2022-04-23 22:42:26'),
(1032, 'Ndueso Walter Okorie Confirmed payment and Generated Access Code On 2022-04-23 23:02:35'),
(1033, 'Ndueso Walter Okorie Updated Website On 2022-04-23 23:37:42'),
(1034, 'Ndueso Walter Okorie Updated Website On 2022-04-23 23:37:58'),
(1035, 'Ndueso Walter Okorie Logged In On 2022-04-25 15:21:41'),
(1036, 'Ndueso Walter Okorie Updated Website On 2022-04-25 15:55:51'),
(1037, 'Ndueso Walter Okorie Updated Website On 2022-04-25 15:56:27'),
(1038, 'Ndueso Walter Okorie Updated Website On 2022-04-25 15:58:03'),
(1039, 'Ndueso Walter Okorie Confirmed payment and Generated Access Code On 2022-04-25 16:03:22'),
(1040, 'Ndueso Walter Okorie Confirmed payment and Generated Access Code On 2022-04-25 16:21:54'),
(1041, 'Ndueso Walter Okorie Confirmed payment and Generated Access Code On 2022-04-25 16:23:26'),
(1042, 'Ndueso Walter Okorie Confirmed payment and Generated Access Code On 2022-04-25 16:28:03'),
(1043, 'Ndueso Walter Okorie Logged In On 2022-04-27 12:05:43'),
(1044, 'Ndueso Walter Okorie Confirmed payment and Generated Access Code On 2022-04-27 12:08:46'),
(1045, 'Ndueso Walter Okorie Confirmed payment and Generated Access Code On 2022-04-27 13:11:04'),
(1046, 'Anonymous Made Payment On 2022-04-28 11:40:47'),
(1047, 'Ndueso Walter Okorie Logged In On 2022-04-28 11:41:52'),
(1048, 'Ndueso Walter Okorie Confirmed payment and Generated Access Code On 2022-04-28 11:42:52'),
(1049, 'Ndueso Walter Okorie Confirmed payment and Generated Access Code On 2022-04-28 11:55:31'),
(1050, 'Ndueso Walter Okorie Confirmed payment and Generated Access Code On 2022-04-28 12:32:29'),
(1051, 'Ndueso Walter Okorie Confirmed payment and Generated Access Code On 2022-04-28 12:39:23'),
(1052, 'Ndueso Walter Okorie Confirmed payment and Generated Access Code On 2022-04-28 12:41:39'),
(1053, 'Ndueso Walter Okorie Confirmed payment and Generated Access Code On 2022-04-28 12:43:57'),
(1054, 'Ndueso Walter Okorie Confirmed payment and Generated Access Code On 2022-04-28 12:46:22'),
(1055, 'Ndueso Walter Okorie Confirmed payment and Generated Access Code On 2022-04-28 12:49:50'),
(1056, 'Ndueso Walter Okorie Confirmed payment and Generated Access Code On 2022-04-28 12:52:30'),
(1057, 'Ndueso Walter Okorie Confirmed payment and Generated Access Code On 2022-04-28 12:53:59'),
(1058, 'Ndueso Walter Okorie Confirmed payment and Generated Access Code On 2022-04-28 12:56:49'),
(1059, 'Ndueso Walter Okorie Confirmed payment and Generated Access Code On 2022-04-28 13:00:21'),
(1060, 'Ndueso Walter Okorie Confirmed payment and Generated Access Code On 2022-04-28 13:00:33'),
(1061, 'Ndueso Walter Okorie Confirmed payment and Generated Access Code On 2022-04-28 13:09:30'),
(1062, 'Ndueso Walter Okorie Confirmed payment and Generated Access Code On 2022-04-28 13:11:58'),
(1063, 'Anonymous Made Payment On 2022-05-02 12:49:27'),
(1064, 'Ndueso Walter Okorie Confirmed payment and Generated Access Code On 2022-05-02 12:52:09'),
(1065, 'Ndueso Walter Okorie Confirmed payment and Generated Access Code On 2022-05-02 12:56:39'),
(1066, 'Ndueso Walter Okorie Logged In On 2022-05-02 13:30:18'),
(1067, 'Ndueso Walter Okorie Logged In On 2022-05-04 18:35:48'),
(1068, 'Ndueso Walter Okorie Added New User On 2022-05-04 18:37:56'),
(1069, 'Ndueso Walter Okorie Logged In On 2022-05-06 09:23:25'),
(1070, 'Anonymous Made Payment On 2022-05-14 17:22:01'),
(1071, 'Anonymous Made Payment On 2022-05-14 17:36:56'),
(1072, 'Anonymous Made Payment On 2022-05-14 22:14:48'),
(1073, 'Anonymous Made Payment On 2022-05-14 22:17:01'),
(1074, 'Anonymous Submitted payment details On '),
(1075, 'Ndueso Walter Okorie Logged In On 2022-05-14 22:25:21'),
(1076, 'Ndueso Walter Okorie Confirmed payment and Generated Access Code On 2022-05-14 22:25:59'),
(1077, 'Anonymous Made Payment On 2022-05-14 22:26:53'),
(1078, 'Anonymous Made Payment On 2022-05-14 22:38:42'),
(1079, 'Anonymous Submitted payment details On '),
(1080, 'Ndueso Walter Okorie Confirmed payment and Generated Access Code On 2022-05-14 22:40:18'),
(1081, 'Anonymous Made Payment On 2022-05-15 13:43:08'),
(1082, 'Anonymous Submitted payment details On '),
(1083, 'Anonymous Submitted payment details On '),
(1084, 'Anonymous Submitted payment details On '),
(1085, 'Anonymous Submitted payment details On '),
(1086, 'Anonymous Submitted payment details On '),
(1087, 'Ndueso Walter Okorie Logged In On 2022-05-15 15:36:57'),
(1088, 'Ndueso Walter Okorie Confirmed payment and Generated Access Code On 2022-05-15 15:38:08'),
(1089, 'Anonymous Made Payment On 2022-05-15 15:39:20'),
(1090, 'Ndueso Walter Okorie Confirmed payment and Generated Access Code On 2022-05-15 16:06:45'),
(1091, 'Ndueso Walter Okorie Confirmed payment and Generated Access Code On 2022-05-15 16:14:25'),
(1092, 'Ndueso Walter Okorie Confirmed payment and Generated Access Code On 2022-05-15 16:25:56'),
(1093, 'Ndueso Walter Okorie Confirmed payment and Generated Access Code On 2022-05-15 16:30:18'),
(1094, 'Anonymous Made Payment On 2022-05-15 16:40:12'),
(1095, 'Anonymous Made Payment On 2022-05-15 17:24:56'),
(1096, 'Anonymous Submitted payment details On '),
(1097, 'Ndueso Walter  Confirmed payment and Generated Access Code On 2022-05-16 08:57:30'),
(1098, 'Ndueso Walter  Confirmed payment and Generated Access Code On 2022-05-16 09:04:38'),
(1099, 'Ndueso Walter  Confirmed payment and Generated Access Code On 2022-05-16 09:10:48'),
(1100, 'Ndueso Walter  Confirmed payment and Generated Access Code On 2022-05-16 09:16:28'),
(1101, 'Ndueso Walter  Confirmed payment and Generated Access Code On 2022-05-16 11:16:03'),
(1102, 'Ndueso Walter  Confirmed payment and Generated Access Code On 2022-05-16 11:21:13'),
(1103, 'Ndueso Walter  Confirmed payment and Generated Access Code On 2022-05-16 11:22:31'),
(1104, 'Ndueso Walter  Confirmed payment and Generated Access Code On 2022-05-16 11:26:32'),
(1105, 'Ndueso Walter  Confirmed payment and Generated Access Code On 2022-05-16 11:31:29'),
(1106, 'Ndueso Walter Okorie Logged In On 2022-05-16 12:15:54'),
(1107, 'Ndueso Walter Okorie Confirmed payment and Generated Access Code On 2022-05-16 12:16:47'),
(1108, 'Ndueso Walter  Sent SMS to Client On 2022-05-16 14:02:02');

-- --------------------------------------------------------

--
-- Table structure for table `confirm_payment`
--

CREATE TABLE `confirm_payment` (
  `ID` int(11) NOT NULL,
  `slipID_referencecode` varchar(20) NOT NULL,
  `bank_name` varchar(35) NOT NULL,
  `payment_mode` varchar(16) NOT NULL,
  `email` varchar(40) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `amt` varchar(20) NOT NULL,
  `unit` int(11) NOT NULL,
  `payment_date` varchar(33) NOT NULL,
  `payment_year` int(5) NOT NULL,
  `screenshot` varchar(600) NOT NULL,
  `status` int(1) NOT NULL,
  `access_code` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `confirm_payment`
--

INSERT INTO `confirm_payment` (`ID`, `slipID_referencecode`, `bank_name`, `payment_mode`, `email`, `phone`, `amt`, `unit`, `payment_date`, `payment_year`, `screenshot`, `status`, `access_code`) VALUES
(57, 'rave6280f52868883', '', 'Online payment', 'newleastpaysolution@gmail.com', '08067361023', '1990', 66, '2022-05-15 13:43:08', 2022, 'assets/upload/', 1, 'ISH6324666');

-- --------------------------------------------------------

--
-- Table structure for table `local_govt`
--

CREATE TABLE `local_govt` (
  `id_no` int(10) NOT NULL,
  `state_id` int(10) NOT NULL,
  `local_govt` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COMMENT='Local governments in Nigeria.';

--
-- Dumping data for table `local_govt`
--

INSERT INTO `local_govt` (`id_no`, `state_id`, `local_govt`) VALUES
(1, 1, 'Aba North'),
(2, 1, 'Aba South'),
(3, 1, 'Arochukwu'),
(4, 1, 'Bende'),
(5, 1, 'Ikwuano'),
(6, 1, 'Isiala Ngwa North'),
(7, 1, 'Isiala Ngwa South'),
(8, 1, 'Isuikwuato'),
(9, 1, 'Obi Ngwa'),
(10, 1, 'Ohafia'),
(11, 1, 'Osisioma'),
(12, 1, 'Ugwunagbo'),
(13, 1, 'Ukwa East'),
(14, 1, 'Ukwa West'),
(15, 1, 'Umuahia North'),
(16, 1, 'Umuahia South'),
(17, 1, 'Umu Nneochi'),
(18, 2, 'Demsa'),
(19, 2, 'Fufure'),
(20, 2, 'Ganye'),
(21, 2, 'Gayuk'),
(22, 2, 'Gombi'),
(23, 2, 'Grie'),
(24, 2, 'Hong'),
(25, 2, 'Jada'),
(26, 2, 'Larmurde'),
(27, 2, 'Madagali'),
(28, 2, 'Maiha'),
(29, 2, 'Mayo Belwa'),
(30, 2, 'Michika'),
(31, 2, 'Mubi North'),
(32, 2, 'Mubi South'),
(33, 2, 'Numan'),
(34, 2, 'Shelleng'),
(35, 2, 'Song'),
(36, 2, 'Toungo'),
(37, 2, 'Yola North'),
(38, 2, 'Yola South'),
(39, 3, 'Abak'),
(40, 3, 'Eastern Obolo'),
(41, 3, 'Eket'),
(42, 3, 'Esit Eket'),
(43, 3, 'Essien Udim'),
(44, 3, 'Etim Ekpo'),
(45, 3, 'Etinan'),
(46, 3, 'Ibeno'),
(47, 3, 'Ibesikpo Asutan'),
(48, 3, 'Ibiono-Ibom'),
(49, 3, 'Ika'),
(50, 3, 'Ikono'),
(51, 3, 'Ikot Abasi'),
(52, 3, 'Ikot Ekpene'),
(53, 3, 'Ini'),
(54, 3, 'Itu'),
(55, 3, 'Mbo'),
(56, 3, 'Mkpat-Enin'),
(57, 3, 'Nsit-Atai'),
(58, 3, 'Nsit-Ibom'),
(59, 3, 'Nsit-Ubium'),
(60, 3, 'Obot Akara'),
(61, 3, 'Okobo'),
(62, 3, 'Onna'),
(63, 3, 'Oron'),
(64, 3, 'Oruk Anam'),
(65, 3, 'Udung-Uko'),
(66, 3, 'Ukanafun'),
(67, 3, 'Uruan'),
(68, 3, 'Urue-Offong/Oruko'),
(69, 3, 'Uyo'),
(70, 4, 'Aguata'),
(71, 4, 'Anambra East'),
(72, 4, 'Anambra West'),
(73, 4, 'Anaocha'),
(74, 4, 'Awka North'),
(75, 4, 'Awka South'),
(76, 4, 'Ayamelum'),
(77, 4, 'Dunukofia'),
(78, 4, 'Ekwusigo'),
(79, 4, 'Idemili North'),
(80, 4, 'Idemili South'),
(81, 4, 'Ihiala'),
(82, 4, 'Njikoka'),
(83, 4, 'Nnewi North'),
(84, 4, 'Nnewi South'),
(85, 4, 'Ogbaru'),
(86, 4, 'Onitsha North'),
(87, 4, 'Onitsha South'),
(88, 4, 'Orumba North'),
(89, 4, 'Orumba South'),
(90, 4, 'Oyi'),
(91, 5, 'Alkaleri'),
(92, 5, 'Bauchi'),
(93, 5, 'Bogoro'),
(94, 5, 'Damban'),
(95, 5, 'Darazo'),
(96, 5, 'Dass'),
(97, 5, 'Gamawa'),
(98, 5, 'Ganjuwa'),
(99, 5, 'Giade'),
(100, 5, 'Itas/Gadau'),
(101, 5, 'Jama\'are'),
(102, 5, 'Katagum'),
(103, 5, 'Kirfi'),
(104, 5, 'Misau'),
(105, 5, 'Ningi'),
(106, 5, 'Shira'),
(107, 5, 'Tafawa Balewa'),
(108, 5, 'Toro'),
(109, 5, 'Warji'),
(110, 5, 'Zaki'),
(111, 6, 'Brass'),
(112, 6, 'Ekeremor'),
(113, 6, 'Kolokuma/Opokuma'),
(114, 6, 'Nembe'),
(115, 6, 'Ogbia'),
(116, 6, 'Sagbama'),
(117, 6, 'Southern Ijaw'),
(118, 6, 'Yenagoa'),
(119, 7, 'Agatu'),
(120, 7, 'Apa'),
(121, 7, 'Ado'),
(122, 7, 'Buruku'),
(123, 7, 'Gboko'),
(124, 7, 'Guma'),
(125, 7, 'Gwer East'),
(126, 7, 'Gwer West'),
(127, 7, 'Katsina-Ala'),
(128, 7, 'Konshisha'),
(129, 7, 'Kwande'),
(130, 7, 'Logo'),
(131, 7, 'Makurdi'),
(132, 7, 'Obi'),
(133, 7, 'Ogbadibo'),
(134, 7, 'Ohimini'),
(135, 7, 'Oju'),
(136, 7, 'Okpokwu'),
(137, 7, 'Oturkpo'),
(138, 7, 'Tarka'),
(139, 7, 'Ukum'),
(140, 7, 'Ushongo'),
(141, 7, 'Vandeikya'),
(142, 8, 'Abadam'),
(143, 8, 'Askira/Uba'),
(144, 8, 'Bama'),
(145, 8, 'Bayo'),
(146, 8, 'Biu'),
(147, 8, 'Chibok'),
(148, 8, 'Damboa'),
(149, 8, 'Dikwa'),
(150, 8, 'Gubio'),
(151, 8, 'Guzamala'),
(152, 8, 'Gwoza'),
(153, 8, 'Hawul'),
(154, 8, 'Jere'),
(155, 8, 'Kaga'),
(156, 8, 'Kala/Balge'),
(157, 8, 'Konduga'),
(158, 8, 'Kukawa'),
(159, 8, 'Kwaya Kusar'),
(160, 8, 'Mafa'),
(161, 8, 'Magumeri'),
(162, 8, 'Maiduguri'),
(163, 8, 'Marte'),
(164, 8, 'Mobbar'),
(165, 8, 'Monguno'),
(166, 8, 'Ngala'),
(167, 8, 'Nganzai'),
(168, 8, 'Shani'),
(169, 9, 'Abi'),
(170, 9, 'Akamkpa'),
(171, 9, 'Akpabuyo'),
(172, 9, 'Bakassi'),
(173, 9, 'Bekwarra'),
(174, 9, 'Biase'),
(175, 9, 'Boki'),
(176, 9, 'Calabar Municipal'),
(177, 9, 'Calabar South'),
(178, 9, 'Etung'),
(179, 9, 'Ikom'),
(180, 9, 'Obanliku'),
(181, 9, 'Obubra'),
(182, 9, 'Obudu'),
(183, 9, 'Odukpani'),
(184, 9, 'Ogoja'),
(185, 9, 'Yakuur'),
(186, 9, 'Yala'),
(187, 10, 'Aniocha North'),
(188, 10, 'Aniocha South'),
(189, 10, 'Bomadi'),
(190, 10, 'Burutu'),
(191, 10, 'Ethiope East'),
(192, 10, 'Ethiope West'),
(193, 10, 'Ika North East'),
(194, 10, 'Ika South'),
(195, 10, 'Isoko North'),
(196, 10, 'Isoko South'),
(197, 10, 'Ndokwa East'),
(198, 10, 'Ndokwa West'),
(199, 10, 'Okpe'),
(200, 10, 'Oshimili North'),
(201, 10, 'Oshimili South'),
(202, 10, 'Patani'),
(203, 10, 'Sapele, Delta'),
(204, 10, 'Udu'),
(205, 10, 'Ughelli North'),
(206, 10, 'Ughelli South'),
(207, 10, 'Ukwuani'),
(208, 10, 'Uvwie'),
(209, 10, 'Warri North'),
(210, 10, 'Warri South'),
(211, 10, 'Warri South West'),
(212, 11, 'Abakaliki'),
(213, 11, 'Afikpo North'),
(214, 11, 'Afikpo South'),
(215, 11, 'Ebonyi'),
(216, 11, 'Ezza North'),
(217, 11, 'Ezza South'),
(218, 11, 'Ikwo'),
(219, 11, 'Ishielu'),
(220, 11, 'Ivo'),
(221, 11, 'Izzi'),
(222, 11, 'Ohaozara'),
(223, 11, 'Ohaukwu'),
(224, 11, 'Onicha'),
(225, 12, 'Akoko-Edo'),
(226, 12, 'Egor'),
(227, 12, 'Esan Central'),
(228, 12, 'Esan North-East'),
(229, 12, 'Esan South-East'),
(230, 12, 'Esan West'),
(231, 12, 'Etsako Central'),
(232, 12, 'Etsako East'),
(233, 12, 'Etsako West'),
(234, 12, 'Igueben'),
(235, 12, 'Ikpoba Okha'),
(236, 12, 'Orhionmwon'),
(237, 12, 'Oredo'),
(238, 12, 'Ovia North-East'),
(239, 12, 'Ovia South-West'),
(240, 12, 'Owan East'),
(241, 12, 'Owan West'),
(242, 12, 'Uhunmwonde'),
(243, 13, 'Ado Ekiti'),
(244, 13, 'Efon'),
(245, 13, 'Ekiti East'),
(246, 13, 'Ekiti South-West'),
(247, 13, 'Ekiti West'),
(248, 13, 'Emure'),
(249, 13, 'Gbonyin'),
(250, 13, 'Ido Osi'),
(251, 13, 'Ijero'),
(252, 13, 'Ikere'),
(253, 13, 'Ikole'),
(254, 13, 'Ilejemeje'),
(255, 13, 'Irepodun/Ifelodun'),
(256, 13, 'Ise/Orun'),
(257, 13, 'Moba'),
(258, 13, 'Oye'),
(259, 14, 'Aninri'),
(260, 14, 'Awgu'),
(261, 14, 'Enugu East'),
(262, 14, 'Enugu North'),
(263, 14, 'Enugu South'),
(264, 14, 'Ezeagu'),
(265, 14, 'Igbo Etiti'),
(266, 14, 'Igbo Eze North'),
(267, 14, 'Igbo Eze South'),
(268, 14, 'Isi Uzo'),
(269, 14, 'Nkanu East'),
(270, 14, 'Nkanu West'),
(271, 14, 'Nsukka'),
(272, 14, 'Oji River'),
(273, 14, 'Udenu'),
(274, 14, 'Udi'),
(275, 14, 'Uzo Uwani'),
(276, 15, 'Abaji'),
(277, 15, 'Bwari'),
(278, 15, 'Gwagwalada'),
(279, 15, 'Kuje'),
(280, 15, 'Kwali'),
(281, 15, 'Municipal Area Council'),
(282, 16, 'Akko'),
(283, 16, 'Balanga'),
(284, 16, 'Billiri'),
(285, 16, 'Dukku'),
(286, 16, 'Funakaye'),
(287, 16, 'Gombe'),
(288, 16, 'Kaltungo'),
(289, 16, 'Kwami'),
(290, 16, 'Nafada'),
(291, 16, 'Shongom'),
(292, 16, 'Yamaltu/Deba'),
(293, 17, 'Aboh Mbaise'),
(294, 17, 'Ahiazu Mbaise'),
(295, 17, 'Ehime Mbano'),
(296, 17, 'Ezinihitte'),
(297, 17, 'Ideato North'),
(298, 17, 'Ideato South'),
(299, 17, 'Ihitte/Uboma'),
(300, 17, 'Ikeduru'),
(301, 17, 'Isiala Mbano'),
(302, 17, 'Isu'),
(303, 17, 'Mbaitoli'),
(304, 17, 'Ngor Okpala'),
(305, 17, 'Njaba'),
(306, 17, 'Nkwerre'),
(307, 17, 'Nwangele'),
(308, 17, 'Obowo'),
(309, 17, 'Oguta'),
(310, 17, 'Ohaji/Egbema'),
(311, 17, 'Okigwe'),
(312, 17, 'Orlu'),
(313, 17, 'Orsu'),
(314, 17, 'Oru East'),
(315, 17, 'Oru West'),
(316, 17, 'Owerri Municipal'),
(317, 17, 'Owerri North'),
(318, 17, 'Owerri West'),
(319, 17, 'Unuimo'),
(320, 18, 'Auyo'),
(321, 18, 'Babura'),
(322, 18, 'Biriniwa'),
(323, 18, 'Birnin Kudu'),
(324, 18, 'Buji'),
(325, 18, 'Dutse'),
(326, 18, 'Gagarawa'),
(327, 18, 'Garki'),
(328, 18, 'Gumel'),
(329, 18, 'Guri'),
(330, 18, 'Gwaram'),
(331, 18, 'Gwiwa'),
(332, 18, 'Hadejia'),
(333, 18, 'Jahun'),
(334, 18, 'Kafin Hausa'),
(335, 18, 'Kazaure'),
(336, 18, 'Kiri Kasama'),
(337, 18, 'Kiyawa'),
(338, 18, 'Kaugama'),
(339, 18, 'Maigatari'),
(340, 18, 'Malam Madori'),
(341, 18, 'Miga'),
(342, 18, 'Ringim'),
(343, 18, 'Roni'),
(344, 18, 'Sule Tankarkar'),
(345, 18, 'Taura'),
(346, 18, 'Yankwashi'),
(347, 19, 'Birnin Gwari'),
(348, 19, 'Chikun'),
(349, 19, 'Giwa'),
(350, 19, 'Igabi'),
(351, 19, 'Ikara'),
(352, 19, 'Jaba'),
(353, 19, 'Jema\'a'),
(354, 19, 'Kachia'),
(355, 19, 'Kaduna North'),
(356, 19, 'Kaduna South'),
(357, 19, 'Kagarko'),
(358, 19, 'Kajuru'),
(359, 19, 'Kaura'),
(360, 19, 'Kauru'),
(361, 19, 'Kubau'),
(362, 19, 'Kudan'),
(363, 19, 'Lere'),
(364, 19, 'Makarfi'),
(365, 19, 'Sabon Gari'),
(366, 19, 'Sanga'),
(367, 19, 'Soba'),
(368, 19, 'Zangon Kataf'),
(369, 19, 'Zaria'),
(370, 20, 'Ajingi'),
(371, 20, 'Albasu'),
(372, 20, 'Bagwai'),
(373, 20, 'Bebeji'),
(374, 20, 'Bichi'),
(375, 20, 'Bunkure'),
(376, 20, 'Dala'),
(377, 20, 'Dambatta'),
(378, 20, 'Dawakin Kudu'),
(379, 20, 'Dawakin Tofa'),
(380, 20, 'Doguwa'),
(381, 20, 'Fagge'),
(382, 20, 'Gabasawa'),
(383, 20, 'Garko'),
(384, 20, 'Garun Mallam'),
(385, 20, 'Gaya'),
(386, 20, 'Gezawa'),
(387, 20, 'Gwale'),
(388, 20, 'Gwarzo'),
(389, 20, 'Kabo'),
(390, 20, 'Kano Municipal'),
(391, 20, 'Karaye'),
(392, 20, 'Kibiya'),
(393, 20, 'Kiru'),
(394, 20, 'Kumbotso'),
(395, 20, 'Kunchi'),
(396, 20, 'Kura'),
(397, 20, 'Madobi'),
(398, 20, 'Makoda'),
(399, 20, 'Minjibir'),
(400, 20, 'Nasarawa'),
(401, 20, 'Rano'),
(402, 20, 'Rimin Gado'),
(403, 20, 'Rogo'),
(404, 20, 'Shanono'),
(405, 20, 'Sumaila'),
(406, 20, 'Takai'),
(407, 20, 'Tarauni'),
(408, 20, 'Tofa'),
(409, 20, 'Tsanyawa'),
(410, 20, 'Tudun Wada'),
(411, 20, 'Ungogo'),
(412, 20, 'Warawa'),
(413, 20, 'Wudil'),
(414, 21, 'Bakori'),
(415, 21, 'Batagarawa'),
(416, 21, 'Batsari'),
(417, 21, 'Baure'),
(418, 21, 'Bindawa'),
(419, 21, 'Charanchi'),
(420, 21, 'Dandume'),
(421, 21, 'Danja'),
(422, 21, 'Dan Musa'),
(423, 21, 'Daura'),
(424, 21, 'Dutsi'),
(425, 21, 'Dutsin Ma'),
(426, 21, 'Faskari'),
(427, 21, 'Funtua'),
(428, 21, 'Ingawa'),
(429, 21, 'Jibia'),
(430, 21, 'Kafur'),
(431, 21, 'Kaita'),
(432, 21, 'Kankara'),
(433, 21, 'Kankia'),
(434, 21, 'Katsina'),
(435, 21, 'Kurfi'),
(436, 21, 'Kusada'),
(437, 21, 'Mai\'Adua'),
(438, 21, 'Malumfashi'),
(439, 21, 'Mani'),
(440, 21, 'Mashi'),
(441, 21, 'Matazu'),
(442, 21, 'Musawa'),
(443, 21, 'Rimi'),
(444, 21, 'Sabuwa'),
(445, 21, 'Safana'),
(446, 21, 'Sandamu'),
(447, 21, 'Zango'),
(448, 22, 'Aleiro'),
(449, 22, 'Arewa Dandi'),
(450, 22, 'Argungu'),
(451, 22, 'Augie'),
(452, 22, 'Bagudo'),
(453, 22, 'Birnin Kebbi'),
(454, 22, 'Bunza'),
(455, 22, 'Dandi'),
(456, 22, 'Fakai'),
(457, 22, 'Gwandu'),
(458, 22, 'Jega'),
(459, 22, 'Kalgo'),
(460, 22, 'Koko/Besse'),
(461, 22, 'Maiyama'),
(462, 22, 'Ngaski'),
(463, 22, 'Sakaba'),
(464, 22, 'Shanga'),
(465, 22, 'Suru'),
(466, 22, 'Wasagu/Danko'),
(467, 22, 'Yauri'),
(468, 22, 'Zuru'),
(469, 23, 'Adavi'),
(470, 23, 'Ajaokuta'),
(471, 23, 'Ankpa'),
(472, 23, 'Bassa'),
(473, 23, 'Dekina'),
(474, 23, 'Ibaji'),
(475, 23, 'Idah'),
(476, 23, 'Igalamela Odolu'),
(477, 23, 'Ijumu'),
(478, 23, 'Kabba/Bunu'),
(479, 23, 'Kogi'),
(480, 23, 'Lokoja'),
(481, 23, 'Mopa Muro'),
(482, 23, 'Ofu'),
(483, 23, 'Ogori/Magongo'),
(484, 23, 'Okehi'),
(485, 23, 'Okene'),
(486, 23, 'Olamaboro'),
(487, 23, 'Omala'),
(488, 23, 'Yagba East'),
(489, 23, 'Yagba West'),
(490, 24, 'Asa'),
(491, 24, 'Baruten'),
(492, 24, 'Edu'),
(493, 24, 'Ekiti, Kwara State'),
(494, 24, 'Ifelodun'),
(495, 24, 'Ilorin East'),
(496, 24, 'Ilorin South'),
(497, 24, 'Ilorin West'),
(498, 24, 'Irepodun'),
(499, 24, 'Isin'),
(500, 24, 'Kaiama'),
(501, 24, 'Moro'),
(502, 24, 'Offa'),
(503, 24, 'Oke Ero'),
(504, 24, 'Oyun'),
(505, 24, 'Pategi'),
(506, 25, 'Agege'),
(507, 25, 'Ajeromi-Ifelodun'),
(508, 25, 'Alimosho'),
(509, 25, 'Amuwo-Odofin'),
(510, 25, 'Apapa'),
(511, 25, 'Badagry'),
(512, 25, 'Epe'),
(513, 25, 'Eti Osa'),
(514, 25, 'Ibeju-Lekki'),
(515, 25, 'Ifako-Ijaiye'),
(516, 25, 'Ikeja'),
(517, 25, 'Ikorodu'),
(518, 25, 'Kosofe'),
(519, 25, 'Lagos Island'),
(520, 25, 'Lagos Mainland'),
(521, 25, 'Mushin'),
(522, 25, 'Ojo'),
(523, 25, 'Oshodi-Isolo'),
(524, 25, 'Shomolu'),
(525, 25, 'Surulere, Lagos State'),
(526, 26, 'Akwanga'),
(527, 26, 'Awe'),
(528, 26, 'Doma'),
(529, 26, 'Karu'),
(530, 26, 'Keana'),
(531, 26, 'Keffi'),
(532, 26, 'Kokona'),
(533, 26, 'Lafia'),
(534, 26, 'Nasarawa'),
(535, 26, 'Nasarawa Egon'),
(536, 26, 'Obi'),
(537, 26, 'Toto'),
(538, 26, 'Wamba'),
(539, 27, 'Agaie'),
(540, 27, 'Agwara'),
(541, 27, 'Bida'),
(542, 27, 'Borgu'),
(543, 27, 'Bosso'),
(544, 27, 'Chanchaga'),
(545, 27, 'Edati'),
(546, 27, 'Gbako'),
(547, 27, 'Gurara'),
(548, 27, 'Katcha'),
(549, 27, 'Kontagora'),
(550, 27, 'Lapai'),
(551, 27, 'Lavun'),
(552, 27, 'Magama'),
(553, 27, 'Mariga'),
(554, 27, 'Mashegu'),
(555, 27, 'Mokwa'),
(556, 27, 'Moya'),
(557, 27, 'Paikoro'),
(558, 27, 'Rafi'),
(559, 27, 'Rijau'),
(560, 27, 'Shiroro'),
(561, 27, 'Suleja'),
(562, 27, 'Tafa'),
(563, 27, 'Wushishi'),
(564, 28, 'Abeokuta North'),
(565, 28, 'Abeokuta South'),
(566, 28, 'Ado-Odo/Ota'),
(567, 28, 'Egbado North'),
(568, 28, 'Egbado South'),
(569, 28, 'Ewekoro'),
(570, 28, 'Ifo'),
(571, 28, 'Ijebu East'),
(572, 28, 'Ijebu North'),
(573, 28, 'Ijebu North East'),
(574, 28, 'Ijebu Ode'),
(575, 28, 'Ikenne'),
(576, 28, 'Imeko Afon'),
(577, 28, 'Ipokia'),
(578, 28, 'Obafemi Owode'),
(579, 28, 'Odeda'),
(580, 28, 'Odogbolu'),
(581, 28, 'Ogun Waterside'),
(582, 28, 'Remo North'),
(583, 28, 'Shagamu'),
(584, 29, 'Akoko North-East'),
(585, 29, 'Akoko North-West'),
(586, 29, 'Akoko South-West'),
(587, 29, 'Akoko South-East'),
(588, 29, 'Akure North'),
(589, 29, 'Akure South'),
(590, 29, 'Ese Odo'),
(591, 29, 'Idanre'),
(592, 29, 'Ifedore'),
(593, 29, 'Ilaje'),
(594, 29, 'Ile Oluji/Okeigbo'),
(595, 29, 'Irele'),
(596, 29, 'Odigbo'),
(597, 29, 'Okitipupa'),
(598, 29, 'Ondo East'),
(599, 29, 'Ondo West'),
(600, 29, 'Ose'),
(601, 29, 'Owo'),
(602, 30, 'Atakunmosa East'),
(603, 30, 'Atakunmosa West'),
(604, 30, 'Aiyedaade'),
(605, 30, 'Aiyedire'),
(606, 30, 'Boluwaduro'),
(607, 30, 'Boripe'),
(608, 30, 'Ede North'),
(609, 30, 'Ede South'),
(610, 30, 'Ife Central'),
(611, 30, 'Ife East'),
(612, 30, 'Ife North'),
(613, 30, 'Ife South'),
(614, 30, 'Egbedore'),
(615, 30, 'Ejigbo'),
(616, 30, 'Ifedayo'),
(617, 30, 'Ifelodun'),
(618, 30, 'Ila'),
(619, 30, 'Ilesa East'),
(620, 30, 'Ilesa West'),
(621, 30, 'Irepodun'),
(622, 30, 'Irewole'),
(623, 30, 'Isokan'),
(624, 30, 'Iwo'),
(625, 30, 'Obokun'),
(626, 30, 'Odo Otin'),
(627, 30, 'Ola Oluwa'),
(628, 30, 'Olorunda'),
(629, 30, 'Oriade'),
(630, 30, 'Orolu'),
(631, 30, 'Osogbo'),
(632, 31, 'Afijio'),
(633, 31, 'Akinyele'),
(634, 31, 'Atiba'),
(635, 31, 'Atisbo'),
(636, 31, 'Egbeda'),
(637, 31, 'Ibadan North'),
(638, 31, 'Ibadan North-East'),
(639, 31, 'Ibadan North-West'),
(640, 31, 'Ibadan South-East'),
(641, 31, 'Ibadan South-West'),
(642, 31, 'Ibarapa Central'),
(643, 31, 'Ibarapa East'),
(644, 31, 'Ibarapa North'),
(645, 31, 'Ido'),
(646, 31, 'Irepo'),
(647, 31, 'Iseyin'),
(648, 31, 'Itesiwaju'),
(649, 31, 'Iwajowa'),
(650, 31, 'Kajola'),
(651, 31, 'Lagelu'),
(652, 31, 'Ogbomosho North'),
(653, 31, 'Ogbomosho South'),
(654, 31, 'Ogo Oluwa'),
(655, 31, 'Olorunsogo'),
(656, 31, 'Oluyole'),
(657, 31, 'Ona Ara'),
(658, 31, 'Orelope'),
(659, 31, 'Ori Ire'),
(660, 31, 'Oyo'),
(661, 31, 'Oyo East'),
(662, 31, 'Saki East'),
(663, 31, 'Saki West'),
(664, 31, 'Surulere, Oyo State'),
(665, 32, 'Bokkos'),
(666, 32, 'Barkin Ladi'),
(667, 32, 'Bassa'),
(668, 32, 'Jos East'),
(669, 32, 'Jos North'),
(670, 32, 'Jos South'),
(671, 32, 'Kanam'),
(672, 32, 'Kanke'),
(673, 32, 'Langtang South'),
(674, 32, 'Langtang North'),
(675, 32, 'Mangu'),
(676, 32, 'Mikang'),
(677, 32, 'Pankshin'),
(678, 32, 'Qua\'an Pan'),
(679, 32, 'Riyom'),
(680, 32, 'Shendam'),
(681, 32, 'Wase'),
(682, 33, 'Abua/Odual'),
(683, 33, 'Ahoada East'),
(684, 33, 'Ahoada West'),
(685, 33, 'Akuku-Toru'),
(686, 33, 'Andoni'),
(687, 33, 'Asari-Toru'),
(688, 33, 'Bonny'),
(689, 33, 'Degema'),
(690, 33, 'Eleme'),
(691, 33, 'Emuoha'),
(692, 33, 'Etche'),
(693, 33, 'Gokana'),
(694, 33, 'Ikwerre'),
(695, 33, 'Khana'),
(696, 33, 'Obio/Akpor'),
(697, 33, 'Ogba/Egbema/Ndoni'),
(698, 33, 'Ogu/Bolo'),
(699, 33, 'Okrika'),
(700, 33, 'Omuma'),
(701, 33, 'Opobo/Nkoro'),
(702, 33, 'Oyigbo'),
(703, 33, 'Port Harcourt'),
(704, 33, 'Tai'),
(705, 34, 'Binji'),
(706, 34, 'Bodinga'),
(707, 34, 'Dange Shuni'),
(708, 34, 'Gada'),
(709, 34, 'Goronyo'),
(710, 34, 'Gudu'),
(711, 34, 'Gwadabawa'),
(712, 34, 'Illela'),
(713, 34, 'Isa'),
(714, 34, 'Kebbe'),
(715, 34, 'Kware'),
(716, 34, 'Rabah'),
(717, 34, 'Sabon Birni'),
(718, 34, 'Shagari'),
(719, 34, 'Silame'),
(720, 34, 'Sokoto North'),
(721, 34, 'Sokoto South'),
(722, 34, 'Tambuwal'),
(723, 34, 'Tangaza'),
(724, 34, 'Tureta'),
(725, 34, 'Wamako'),
(726, 34, 'Wurno'),
(727, 34, 'Yabo'),
(728, 35, 'Ardo Kola'),
(729, 35, 'Bali'),
(730, 35, 'Donga'),
(731, 35, 'Gashaka'),
(732, 35, 'Gassol'),
(733, 35, 'Ibi'),
(734, 35, 'Jalingo'),
(735, 35, 'Karim Lamido'),
(736, 35, 'Kumi'),
(737, 35, 'Lau'),
(738, 35, 'Sardauna'),
(739, 35, 'Takum'),
(740, 35, 'Ussa'),
(741, 35, 'Wukari'),
(742, 35, 'Yorro'),
(743, 35, 'Zing'),
(744, 36, 'Bade'),
(745, 36, 'Bursari'),
(746, 36, 'Damaturu'),
(747, 36, 'Fika'),
(748, 36, 'Fune'),
(749, 36, 'Geidam'),
(750, 36, 'Gujba'),
(751, 36, 'Gulani'),
(752, 36, 'Jakusko'),
(753, 36, 'Karasuwa'),
(754, 36, 'Machina'),
(755, 36, 'Nangere'),
(756, 36, 'Nguru'),
(757, 36, 'Potiskum'),
(758, 36, 'Tarmuwa'),
(759, 36, 'Yunusari'),
(760, 36, 'Yusufari'),
(761, 37, 'Anka'),
(762, 37, 'Bakura'),
(763, 37, 'Birnin Magaji/Kiyaw'),
(764, 37, 'Bukkuyum'),
(765, 37, 'Bungudu'),
(766, 37, 'Gummi'),
(767, 37, 'Gusau'),
(768, 37, 'Kaura Namoda'),
(769, 37, 'Maradun'),
(770, 37, 'Maru'),
(771, 37, 'Shinkafi'),
(772, 37, 'Talata Mafara'),
(773, 37, 'Chafe'),
(774, 37, 'Zurmi');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `ID` int(13) NOT NULL,
  `referencecode` varchar(20) NOT NULL,
  `email` varchar(55) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `amt` varchar(12) NOT NULL,
  `unit` int(22) NOT NULL,
  `payment_date` varchar(20) NOT NULL,
  `payment_mode` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`ID`, `referencecode`, `email`, `phone`, `amt`, `unit`, `payment_date`, `payment_mode`) VALUES
(21, 'rave6280f52868883', 'newleastpaysolution@gmail.com', '08067361023', '1990', 66, '2022-05-15 13:43:08', 'Online Payment'),
(22, 'rave628110808bcf2', 'newleastpaysolution@gmail.com', '08067361023', '1685', 56, '2022-05-15 15:39:20', 'Online Payment'),
(23, 'rave62811ec9dfdfc', 'newleastpaysolution@gmail.com', '08067361023', '2380', 79, '2022-05-15 16:40:12', 'Online Payment');

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `id_no` int(10) NOT NULL,
  `state` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COMMENT='States in Nigeria.';

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`id_no`, `state`) VALUES
(1, 'Abia State'),
(2, 'Adamawa State'),
(3, 'Akwa Ibom State'),
(4, 'Anambra State'),
(5, 'Bauchi State'),
(6, 'Bayelsa State'),
(7, 'Benue State'),
(8, 'Borno State'),
(9, 'Cross River State'),
(10, 'Delta State'),
(11, 'Ebonyi State'),
(12, 'Edo State'),
(13, 'Ekiti State'),
(14, 'Enugu State'),
(15, 'FCT'),
(16, 'Gombe State'),
(17, 'Imo State'),
(18, 'Jigawa State'),
(19, 'Kaduna State'),
(20, 'Kano State'),
(21, 'Katsina State'),
(22, 'Kebbi State'),
(23, 'Kogi State'),
(24, 'Kwara State'),
(25, 'Lagos State'),
(26, 'Nasarawa State'),
(27, 'Niger State'),
(28, 'Ogun State'),
(29, 'Ondo State'),
(30, 'Osun State'),
(31, 'Oyo State'),
(32, 'Plateau State'),
(33, 'Rivers State'),
(34, 'Sokoto State'),
(35, 'Taraba State'),
(36, 'Yobe State'),
(37, 'Zamfara State');

-- --------------------------------------------------------

--
-- Table structure for table `subscription`
--

CREATE TABLE `subscription` (
  `id_no` int(10) NOT NULL,
  `category` text NOT NULL,
  `amt` varchar(22) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COMMENT='subscription';

--
-- Dumping data for table `subscription`
--

INSERT INTO `subscription` (`id_no`, `category`, `amt`) VALUES
(1, 'unit', '30'),
(3, 'registration', '10'),
(775, 'Re-registration', '5');

-- --------------------------------------------------------

--
-- Table structure for table `tblgroup`
--

CREATE TABLE `tblgroup` (
  `ID` int(4) NOT NULL,
  `groupname` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblgroup`
--

INSERT INTO `tblgroup` (`ID`, `groupname`) VALUES
(1, 'Super Admin'),
(2, 'Admin'),
(3, 'User');

-- --------------------------------------------------------

--
-- Table structure for table `tblsms`
--

CREATE TABLE `tblsms` (
  `ID` int(12) NOT NULL,
  `sms_type` varchar(22) NOT NULL,
  `senderID` varchar(11) NOT NULL,
  `msg` varchar(4000) NOT NULL,
  `phone` varchar(22) NOT NULL,
  `date_sent` varchar(33) NOT NULL,
  `status` varchar(22) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblsms`
--

INSERT INTO `tblsms` (`ID`, `sms_type`, `senderID`, `msg`, `phone`, `date_sent`, `status`) VALUES
(2, 'Single SMS', 'FLEXIHOMES', 'emediong id Kul', '08067361023', '2022-05-13 09:48:41', 'OK'),
(3, 'Single SMS', 'FLEXIHOMES', 'again sms', '08067361023', '2022-05-13 10:55:21', 'OK'),
(4, 'Single SMS', 'FLEXIHOMES', 'sfdffghghfh', '08067361023', '2022-05-13 10:56:13', 'OK'),
(5, 'Single SMS', 'FLEXIHOMES', 'ddddddddd', '08067361023', '2022-05-13 11:37:58', 'OK'),
(6, 'Single SMS', 'FLEXIHOMES', 'eeeee', '08067361023', '2022-05-13 11:38:23', 'OK'),
(7, 'Single SMS', 'FLEXIHOMES', 'dsdsdsdsd', '08067361023', '2022-05-13 12:20:21', 'OK'),
(8, 'Single SMS', 'FLEXIHOMES', 'testing status', '08067361023', '2022-05-13 14:57:17', 'OK'),
(9, 'Single SMS', 'FLEXIHOMES', 'bulk sms', '08067361023,0900569434', '2022-05-13 15:45:32', 'OK'),
(10, 'Single SMS', 'FLEXIHOMES', '56567777777777777777bh', '08067361023', '2022-05-15 16:07:40', 'OK'),
(11, 'Single SMS', 'FLEXIHOMES', 'dddd', '08067361023', '2022-05-16 08:50:47', 'OK'),
(12, 'Single SMS', 'FLEXIHOMES', 'ffdfffffffffffffffffff', '08067361023', '2022-05-16 11:33:31', 'OK'),
(13, 'Single SMS', 'FLEXIHOMES', 'single sms', '08067361023', '2022-05-16 12:27:26', 'OK'),
(14, 'Single SMS', 'ISUPPORT', 'zfvgbhnjmk,l.;/lkjhgfdsa', '08067361023', '2022-05-16 14:02:02', 'OK');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(4) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(15) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `lastaccess` varchar(22) NOT NULL,
  `last_ip` varchar(35) NOT NULL,
  `groupname` varchar(25) NOT NULL,
  `status` varchar(15) NOT NULL,
  `photo` varchar(300) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `email`, `password`, `fullname`, `lastaccess`, `last_ip`, `groupname`, `status`, `photo`) VALUES
(3, 'newleastpaysolution@gmail.com', 'escobar2012', 'Ndueso Walter Okorie', '2022-04-01 18:09:04', '::1', 'Super Admin', 'Active', 'uploadImage/passport.jpg'),
(36, '34eddd@gmail.com', '111', 'sdddd', '2022-04-01 18:04:29', '::1', 'Admin', 'Active', 'uploadImage/computer-aided-learning-680x350.jpg'),
(35, 'i09@gmail.com', '11', 'sddd', 'Not Available', 'Not Available', 'User', 'Active', 'uploadImage/images89.jpg'),
(38, 'qaqa@gmail.com', '47dae8a6dd5ad29', 'Edward Pee', 'Not Available', 'Not Available', 'User', 'Inactive', 'uploadImage/11.png'),
(39, 'ifyboy@yahoo.com', 'kf2BC', 'Esther Ikom', 'Not Available', 'Not Available', 'User', 'Active', 'uploadImage/5.png');

-- --------------------------------------------------------

--
-- Table structure for table `websiteinfo`
--

CREATE TABLE `websiteinfo` (
  `ID` int(4) NOT NULL,
  `website_name` varchar(200) NOT NULL,
  `email` varchar(40) NOT NULL,
  `phone1` varchar(15) NOT NULL,
  `phone2` varchar(15) NOT NULL,
  `url` varchar(100) NOT NULL,
  `logo` varchar(300) NOT NULL,
  `account_name` varchar(40) NOT NULL,
  `bank` varchar(25) NOT NULL,
  `accountNo` varchar(15) NOT NULL,
  `SMS_username` varchar(40) NOT NULL,
  `SMS_password` varchar(20) NOT NULL,
  `payment_secretkey` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `websiteinfo`
--

INSERT INTO `websiteinfo` (`ID`, `website_name`, `email`, `phone1`, `phone2`, `url`, `logo`, `account_name`, `bank`, `accountNo`, `SMS_username`, `SMS_password`, `payment_secretkey`) VALUES
(12, 'I-support ', 'politicainsapp@gmail.com', '08088884983', '08080934538', 'www.iproject.com.ng', 'uploadImage/4.png', 'isupport Project', 'First Bank Nigeria', '3032079503', 'info.autosyst@gmail.com', 'Integax.sms@2022', 'FLWPUBK_TEST-2c7a9c3062c7ef43c062e7c1a0463bd1-X');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_log`
--
ALTER TABLE `activity_log`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `confirm_payment`
--
ALTER TABLE `confirm_payment`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `local_govt`
--
ALTER TABLE `local_govt`
  ADD PRIMARY KEY (`id_no`),
  ADD KEY `state_id` (`state_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`id_no`);

--
-- Indexes for table `subscription`
--
ALTER TABLE `subscription`
  ADD PRIMARY KEY (`id_no`);

--
-- Indexes for table `tblgroup`
--
ALTER TABLE `tblgroup`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblsms`
--
ALTER TABLE `tblsms`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `websiteinfo`
--
ALTER TABLE `websiteinfo`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_log`
--
ALTER TABLE `activity_log`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1109;

--
-- AUTO_INCREMENT for table `confirm_payment`
--
ALTER TABLE `confirm_payment`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `local_govt`
--
ALTER TABLE `local_govt`
  MODIFY `id_no` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=775;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `ID` int(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `subscription`
--
ALTER TABLE `subscription`
  MODIFY `id_no` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=776;

--
-- AUTO_INCREMENT for table `tblgroup`
--
ALTER TABLE `tblgroup`
  MODIFY `ID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tblsms`
--
ALTER TABLE `tblsms`
  MODIFY `ID` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `websiteinfo`
--
ALTER TABLE `websiteinfo`
  MODIFY `ID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `local_govt`
--
ALTER TABLE `local_govt`
  ADD CONSTRAINT `FK` FOREIGN KEY (`state_id`) REFERENCES `state` (`id_no`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
