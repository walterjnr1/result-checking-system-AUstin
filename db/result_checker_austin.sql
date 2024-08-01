-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 01, 2024 at 03:25 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `result_checker_austin`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_log`
--

CREATE TABLE `activity_log` (
  `ID` int(10) NOT NULL,
  `task` varchar(5000) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `activity_log`
--

INSERT INTO `activity_log` (`ID`, `task`) VALUES
(1393, ' Deleted district record On 2024-08-01 14:20:28'),
(1392, ' edited District details On 2024-08-01 14:20:24'),
(1391, ' Created New Region  On 2024-08-01 14:05:12'),
(1390, ' Deleted Region record On 2024-08-01 14:05:09'),
(1389, ' Created New Region  On 2024-08-01 14:02:23'),
(1388, ' Deleted Region record On 2024-08-01 14:00:43'),
(1387, ' Deleted Region record On 2024-08-01 14:00:40'),
(1386, ' Created New Region  On 2024-08-01 14:00:34'),
(1385, ' Deleted Zone record On 2024-08-01 14:00:26'),
(1384, ' Deleted Zone record On 2024-08-01 14:00:24'),
(1383, ' Deleted Zone record On 2024-08-01 14:00:21'),
(1382, ' Deleted Zone record On 2024-08-01 14:00:19'),
(1381, ' Deleted Zone record On 2024-08-01 14:00:16'),
(1380, ' Deleted Zone record On 2024-08-01 14:00:14'),
(1379, ' Created New Zone  On 2024-08-01 13:58:15'),
(1378, ' Created New Region  On 2024-08-01 13:57:48'),
(1377, 'Ndueso Walter Logged In On 2024-08-01 13:57:37'),
(1376, ' Created New Region  On 2024-08-01 13:38:48'),
(1375, ' Created New Region  On 2024-08-01 13:37:46'),
(1374, ' Created New Region  On 2024-08-01 13:36:03'),
(1373, ' Created New Zone  On 2024-08-01 13:33:50'),
(1372, ' Created New Zone  On 2024-08-01 13:33:45'),
(1371, ' Created New Zone  On 2024-08-01 13:32:50'),
(1370, ' Created New Zone  On 2024-08-01 13:32:41'),
(1369, ' Created New Zone  On 2024-08-01 13:32:02'),
(1368, ' Deleted Region record On 2024-08-01 13:27:07'),
(1367, ' edited Region details On 2024-08-01 13:27:00'),
(1366, ' edited Region details On 2024-08-01 13:26:52'),
(1365, 'Ndueso Walter Logged In On 2024-08-01 12:53:58');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `subject`, `message`) VALUES
(1, 'Ajay', 'ajay@gmail.com', 'qdeeas', 'dsgffhgjhmhjm');

-- --------------------------------------------------------

--
-- Table structure for table `examsresultstbl`
--

CREATE TABLE `examsresultstbl` (
  `id` int(6) NOT NULL,
  `ResultID` int(7) NOT NULL,
  `StuAdmNo` varchar(50) DEFAULT NULL,
  `Term` varchar(20) DEFAULT NULL,
  `SchRegCode` varchar(50) DEFAULT NULL,
  `ExamsYear` varchar(20) DEFAULT NULL,
  `ExamsType` varchar(50) DEFAULT NULL,
  `class` varchar(15) NOT NULL,
  `english` varchar(5) DEFAULT NULL,
  `fante` varchar(5) DEFAULT NULL,
  `history` varchar(5) DEFAULT NULL,
  `french` varchar(5) DEFAULT NULL,
  `maths` varchar(5) DEFAULT NULL,
  `religious` varchar(5) DEFAULT NULL,
  `careerTechnology` varchar(5) DEFAULT NULL,
  `pe` varchar(5) DEFAULT NULL,
  `science` varchar(5) DEFAULT NULL,
  `IT` varchar(5) DEFAULT NULL,
  `creativeArt` varchar(5) DEFAULT NULL,
  `englishRemark` varchar(20) DEFAULT NULL,
  `fanteRemark` varchar(20) DEFAULT NULL,
  `historyRemark` varchar(20) DEFAULT NULL,
  `frenchRemark` varchar(20) DEFAULT NULL,
  `mathsRemark` varchar(20) DEFAULT NULL,
  `religiousRemark` varchar(20) DEFAULT NULL,
  `careerTechnologyRemark` varchar(20) DEFAULT NULL,
  `peRemark` varchar(20) DEFAULT NULL,
  `scienceRemark` varchar(20) DEFAULT NULL,
  `ITRemark` varchar(20) DEFAULT NULL,
  `creativeArtRemark` varchar(20) DEFAULT NULL,
  `totalScore` varchar(6) NOT NULL,
  `TExpecSc` varchar(10) NOT NULL,
  `AVGSc` varchar(10) NOT NULL,
  `TeachRmk` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `homeworkexpectation`
--

CREATE TABLE `homeworkexpectation` (
  `HWID` int(11) NOT NULL,
  `Class` varchar(10) DEFAULT NULL,
  `Department` varchar(50) DEFAULT NULL,
  `Subject` varchar(50) DEFAULT NULL,
  `Week` varchar(10) DEFAULT NULL,
  `Month` varchar(10) DEFAULT NULL,
  `Term` varchar(10) DEFAULT NULL,
  `Year` varchar(10) DEFAULT NULL,
  `SchoolName` varchar(100) DEFAULT NULL,
  `SchCode` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `homeworkexpectation`
--

INSERT INTO `homeworkexpectation` (`HWID`, `Class`, `Department`, `Subject`, `Week`, `Month`, `Term`, `Year`, `SchoolName`, `SchCode`) VALUES
(2, 'Class 1', 'Upper Primary', 'Maths/Numeracy', '3', '12', '36', '108', 'Kempshot Grammar Academy', '202476604455');

-- --------------------------------------------------------

--
-- Table structure for table `homeworkexpectation11`
--

CREATE TABLE `homeworkexpectation11` (
  `HWID` int(11) NOT NULL,
  `Class` varchar(10) DEFAULT NULL,
  `Department` varchar(50) DEFAULT NULL,
  `Subject` varchar(50) DEFAULT NULL,
  `TP` varchar(20) DEFAULT NULL,
  `Number` varchar(10) DEFAULT NULL,
  `SchoolName` varchar(100) DEFAULT NULL,
  `SchCode` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `homeworkexpectation11`
--

INSERT INTO `homeworkexpectation11` (`HWID`, `Class`, `Department`, `Subject`, `TP`, `Number`, `SchoolName`, `SchCode`) VALUES
(2, 'Class 4', 'Upper Primary', 'Maths/Numeracy', 'Week', '3', 'Kempshot Grammar Academy', '202476604455'),
(3, 'Class 4', 'Upper Primary', 'Maths/Numeracy', 'Month', '12', 'Kempshot Grammar Academy', '202476604455'),
(4, 'Class 4', 'Upper Primary', 'Maths/Numeracy', 'Term', '36', 'Kempshot Grammar Academy', '202476604455'),
(5, 'Class 4', 'Upper Primary', 'Maths/Numeracy', 'Year', '108', 'Kempshot Grammar Academy', '202476604455'),
(10, 'Class 4', 'Upper Primary', 'Maths/Numeracy', 'Week', '5', 'Kempshot Grammar Academy', '202476604455'),
(11, 'Class 4', 'Upper Primary', 'Maths/Numeracy', 'Month', '20', 'Kempshot Grammar Academy', '202476604455'),
(12, 'Class 4', 'Upper Primary', 'Maths/Numeracy', 'Term', '60', 'Kempshot Grammar Academy', '202476604455'),
(13, 'Class 4', 'Upper Primary', 'Maths/Numeracy', 'Year', '180', 'Kempshot Grammar Academy', '202476604455'),
(14, 'Class 4', 'Upper Primary', 'Maths/Numeracy', 'Week', '20', 'Kempshot Grammar Academy', '202476604455'),
(15, 'Class 4', 'Upper Primary', 'Maths/Numeracy', 'Month', '80', 'Kempshot Grammar Academy', '202476604455'),
(16, 'Class 4', 'Upper Primary', 'Maths/Numeracy', 'Term', '240', 'Kempshot Grammar Academy', '202476604455'),
(17, 'Class 4', 'Upper Primary', 'Maths/Numeracy', 'Year', '720', 'Kempshot Grammar Academy', '202476604455');

-- --------------------------------------------------------

--
-- Table structure for table `homeworkrecordstbl`
--

CREATE TABLE `homeworkrecordstbl` (
  `RecID` int(11) NOT NULL,
  `RecDate` varchar(50) DEFAULT NULL,
  `Department` varchar(50) DEFAULT NULL,
  `Day` varchar(20) DEFAULT NULL,
  `ClassTeacher` varchar(50) DEFAULT NULL,
  `Class` varchar(20) DEFAULT NULL,
  `SchCode` varchar(50) DEFAULT NULL,
  `SchoolName` varchar(100) DEFAULT NULL,
  `HW1` varchar(50) DEFAULT NULL,
  `HW1P` varchar(10) DEFAULT NULL,
  `HW1MP` varchar(10) DEFAULT NULL,
  `HW2` varchar(50) DEFAULT NULL,
  `HW2P` varchar(10) DEFAULT NULL,
  `HW2MP` varchar(10) DEFAULT NULL,
  `HW3` varchar(50) DEFAULT NULL,
  `HW3P` varchar(10) DEFAULT NULL,
  `HW3MP` varchar(10) DEFAULT NULL,
  `HW4` varchar(50) DEFAULT NULL,
  `HW4P` varchar(10) DEFAULT NULL,
  `HW4MP` varchar(10) DEFAULT NULL,
  `HW5` varchar(50) DEFAULT NULL,
  `HW5P` varchar(10) DEFAULT NULL,
  `HW5MP` varchar(10) DEFAULT NULL,
  `HW6` varchar(50) DEFAULT NULL,
  `HW6P` varchar(10) DEFAULT NULL,
  `HW6MP` varchar(10) DEFAULT NULL,
  `HW7` varchar(50) DEFAULT NULL,
  `HW7P` varchar(10) DEFAULT NULL,
  `HW7MP` varchar(10) DEFAULT NULL,
  `HW8` varchar(50) DEFAULT NULL,
  `HW8P` varchar(10) DEFAULT NULL,
  `HW8MP` varchar(10) DEFAULT NULL,
  `HW9` varchar(50) DEFAULT NULL,
  `HW9P` varchar(10) DEFAULT NULL,
  `HW9MP` varchar(10) DEFAULT NULL,
  `HW10` varchar(50) DEFAULT NULL,
  `HW10P` varchar(10) DEFAULT NULL,
  `HW10MP` varchar(10) DEFAULT NULL,
  `HW11` varchar(50) DEFAULT NULL,
  `HW11P` varchar(10) DEFAULT NULL,
  `HW11MP` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `homeworkrecordstbl`
--

INSERT INTO `homeworkrecordstbl` (`RecID`, `RecDate`, `Department`, `Day`, `ClassTeacher`, `Class`, `SchCode`, `SchoolName`, `HW1`, `HW1P`, `HW1MP`, `HW2`, `HW2P`, `HW2MP`, `HW3`, `HW3P`, `HW3MP`, `HW4`, `HW4P`, `HW4MP`, `HW5`, `HW5P`, `HW5MP`, `HW6`, `HW6P`, `HW6MP`, `HW7`, `HW7P`, `HW7MP`, `HW8`, `HW8P`, `HW8MP`, `HW9`, `HW9P`, `HW9MP`, `HW10`, `HW10P`, `HW10MP`, `HW11`, `HW11P`, `HW11MP`) VALUES
(1, 'Sunday, April 28, 2024', 'Upper Primary', 'Monday', 'Kenneth Ato Abban', 'Class 1', '202476604455', 'Kempshot Grammar Academy', NULL, '20', '5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'Sunday, April 28, 2024', 'Upper Primary', 'Monday', 'Kenneth Ato Abban', 'Class 2', '202476604455', 'Kempshot Grammar Academy', 'N/A', '100000', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'Sunday, April 28, 2024', 'Upper Primary', 'Monday', 'Kenneth Ato Abban', 'Class 2', '202476604455', 'Kempshot Grammar Academy', 'N/A', '100000', '0', 'N/A', '0', '0', 'N/A', '0', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'Friday, April 26, 2024', 'Upper Primary', 'Monday', 'Kenneth Ato Abban', 'Class 2', '202476604455', 'Kempshot Grammar Academy', 'Maths/Numeracy', '5', '0', 'N/A', '0', '0', 'Science/N Science', '5', '0', 'N/A', '0', '0', 'RME', '5', '0', 'ICT/Computing', '5', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'Sunday, April 28, 2024', 'Upper Primary', 'Monday', 'Kenneth Ato Abban', 'Class 2', '202476604455', 'Kempshot Grammar Academy', 'Maths/Numeracy', '100000', '0', 'N/A', '0', '0', 'Science/N Science', '5', '0', 'N/A', '0', '0', 'RME', '5', '0', 'ICT/Computing', '5', '0', 'N/A', '0', '0', 'N/A', '0', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 'Sunday, April 28, 2024', 'Upper Primary', 'Monday', 'Kenneth Ato Abban', 'Class 1', '202476604455', 'Kempshot Grammar Academy', 'Maths/Numeracy', '20', '5', 'N/A', '0', '0', 'Science/N Science', '5', '0', 'N/A', '0', '0', 'RME', '5', '0', 'ICT/Computing', '5', '0', 'N/A', '0', '0', 'N/A', '0', '0', 'N/A', '0', '0', 'French', '5', '0', 'N/A', '5', '0');

-- --------------------------------------------------------

--
-- Table structure for table `homeworkrecordstbl11`
--

CREATE TABLE `homeworkrecordstbl11` (
  `ID` int(11) NOT NULL,
  `RecDate` varchar(50) DEFAULT NULL,
  `Department` varchar(50) DEFAULT NULL,
  `Day` varchar(20) DEFAULT NULL,
  `ClassTeacher` varchar(50) DEFAULT NULL,
  `Class` varchar(20) DEFAULT NULL,
  `SchCode` varchar(50) DEFAULT NULL,
  `SchoolName` varchar(100) DEFAULT NULL,
  `HW1` varchar(50) DEFAULT NULL,
  `HW1P` varchar(10) DEFAULT NULL,
  `HW1MP` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `homeworkrecordstbl11`
--

INSERT INTO `homeworkrecordstbl11` (`ID`, `RecDate`, `Department`, `Day`, `ClassTeacher`, `Class`, `SchCode`, `SchoolName`, `HW1`, `HW1P`, `HW1MP`) VALUES
(1, '04/04/2024', 'Upper Primary', 'Monday', 'Kenneth Ato Abban', 'Class 1', '202476604455', 'Kempshot Grammar Academy', NULL, '20', '5'),
(2, '04/05/2024', 'Upper Primary', 'Monday', 'Kenneth Ato Abban', 'Class 4', '202476604455', 'Kempshot Grammar Academy', 'English/Literacy', '100000', '0'),
(3, '04/06/2024', 'Upper Primary', 'Monday', 'Kenneth Ato Abban', 'Class 2', '202476604455', 'Kempshot Grammar Academy', 'N/A', '100000', '0'),
(4, '04/07/2024', 'Upper Primary', 'Monday', 'Kenneth Ato Abban', 'Class 4', '202476604455', 'Kempshot Grammar Academy', 'Maths/Numeracy', '5', '0'),
(5, '04/08/2024', 'Upper Primary', 'Monday', 'Kenneth Ato Abban', 'Class 4', '202476604455', 'Kempshot Grammar Academy', 'Maths/Numeracy', '100000', '0'),
(6, '04/06/2024', 'Upper Primary', 'Monday', 'Kenneth Ato Abban', 'Class 1', '202476604455', 'Kempshot Grammar Academy', 'Maths/Numeracy', '20', '5'),
(7, '04/09/2024', 'Upper Primary', 'Monday', 'Kenneth Ato Abban', 'Class 1', '202476604455', 'Kempshot Grammar Academy', 'Maths/Numeracy', '5', '0');

-- --------------------------------------------------------

--
-- Table structure for table `hwtbl`
--

CREATE TABLE `hwtbl` (
  `No.` int(11) NOT NULL,
  `Day` varchar(20) DEFAULT NULL,
  `Class` varchar(20) DEFAULT NULL,
  `Department` varchar(50) DEFAULT NULL,
  `HWPeriod1` varchar(50) DEFAULT NULL,
  `HWPeriod2` varchar(50) DEFAULT NULL,
  `HWPeriod3` varchar(50) DEFAULT NULL,
  `HWPeriod4` varchar(50) DEFAULT NULL,
  `SchCode` varchar(50) DEFAULT NULL,
  `SchName` varchar(100) DEFAULT NULL,
  `StaffName` varchar(100) DEFAULT NULL,
  `HW5` varchar(50) DEFAULT NULL,
  `HW6` varchar(50) DEFAULT NULL,
  `HW7` varchar(50) DEFAULT NULL,
  `HW8` varchar(50) DEFAULT NULL,
  `HW9` varchar(50) DEFAULT NULL,
  `HW10` varchar(50) DEFAULT NULL,
  `HW11` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `hwtbl`
--

INSERT INTO `hwtbl` (`No.`, `Day`, `Class`, `Department`, `HWPeriod1`, `HWPeriod2`, `HWPeriod3`, `HWPeriod4`, `SchCode`, `SchName`, `StaffName`, `HW5`, `HW6`, `HW7`, `HW8`, `HW9`, `HW10`, `HW11`) VALUES
(2, 'Monday', 'Class 1', 'Upper Primary', 'Maths/Numeracy', 'N/A', 'Science/N Science', 'N/A', '202476604455', 'Kempshot Grammar Academy', 'Kenneth Ato Abban', 'RME', 'ICT/Computing', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A'),
(3, 'Tuesday', 'Class 1', 'Upper Primary', 'N/A', 'English/Literacy', 'Science/N Science', 'N/A', '202476604455', 'Kempshot Grammar Academy', 'Kenneth Ato Abban', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'French', 'N/A'),
(4, 'Tuesday', 'Class 1', '', 'N/A', 'N/A', 'N/A', 'N/A', '202476604455', 'Kempshot Grammar Academy', '', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`username`, `password`) VALUES
('kenneth', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `schfeestbl`
--

CREATE TABLE `schfeestbl` (
  `SchRegCode` varchar(50) NOT NULL,
  `SchShortCode` varchar(20) DEFAULT NULL,
  `SchoolName` varchar(100) DEFAULT NULL,
  `Region` varchar(50) DEFAULT NULL,
  `DistrictNo` varchar(50) DEFAULT NULL,
  `Zone` varchar(50) DEFAULT NULL,
  `PreSchFees` varchar(20) DEFAULT NULL,
  `LPrimaryFees` varchar(20) DEFAULT NULL,
  `UPrimaryFees` varchar(20) DEFAULT NULL,
  `JHSFees` varchar(20) DEFAULT NULL,
  `SHSFees` varchar(20) DEFAULT NULL,
  `AdmFees` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `schfeestbl`
--

INSERT INTO `schfeestbl` (`SchRegCode`, `SchShortCode`, `SchoolName`, `Region`, `DistrictNo`, `Zone`, `PreSchFees`, `LPrimaryFees`, `UPrimaryFees`, `JHSFees`, `SHSFees`, `AdmFees`) VALUES
('202415274234', 'TEA', 'Trust Emvic Academy', 'Gomoa East District', 'Central Region', 'Zone 4', '0', '0', '0', '0', '0', '0'),
('202476604455', 'KGA', 'Kempshot Grammar Academy', 'Central Region', 'Gomoa East', 'Zone 4', '314', '414', '515', '616', '717', '515');

-- --------------------------------------------------------

--
-- Table structure for table `schoolregistrationtbl`
--

CREATE TABLE `schoolregistrationtbl` (
  `SchRegCode` varchar(50) NOT NULL,
  `SchoolName` varchar(100) DEFAULT NULL,
  `email` varchar(60) NOT NULL,
  `SchPassword` varchar(50) DEFAULT NULL,
  `SchShortCode` varchar(20) DEFAULT NULL,
  `Location` varchar(50) DEFAULT NULL,
  `GPSAddress` varchar(50) DEFAULT NULL,
  `datereg` varchar(25) DEFAULT NULL,
  `District` varchar(50) DEFAULT NULL,
  `Region` varchar(50) DEFAULT NULL,
  `Zone` varchar(50) DEFAULT NULL,
  `ITName` varchar(50) DEFAULT NULL,
  `AccountsPass` varchar(100) DEFAULT NULL,
  `AccExpiryDate` varchar(50) DEFAULT NULL,
  `SchPhone1` varchar(50) DEFAULT NULL,
  `SchPhone2` varchar(50) DEFAULT NULL,
  `schoolcreationDate` varchar(25) DEFAULT NULL,
  `status` int(1) NOT NULL,
  `logo` varchar(6000) NOT NULL,
  `signature` varchar(6000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `schoolregistrationtbl`
--

INSERT INTO `schoolregistrationtbl` (`SchRegCode`, `SchoolName`, `email`, `SchPassword`, `SchShortCode`, `Location`, `GPSAddress`, `datereg`, `District`, `Region`, `Zone`, `ITName`, `AccountsPass`, `AccExpiryDate`, `SchPhone1`, `SchPhone2`, `schoolcreationDate`, `status`, `logo`, `signature`) VALUES
('2835194', 'Lutheran high school', 'newleastpaysolution@gmail.com', 'escobar2012', 'SAD', 'Ikot Obong Edong', '3478675', '2024-07-24 12:08:28', 'IKot Ekpene', 'IKot Ekpene', 'Akwa Ibom', 'Ndueso Walter', 'P5px7', '2025-07-24', '0808', '08080', '1963', 1, 'uploadImage/logo/leastpayproject-logo.jpg', 'uploadImage/schools/signature.jpg'),
('4926870351', 'sdds', 'newleastpaysolution@yahoo.com', 'poK3PFvfEikh', '7369048125', 'dfdf', 'dff', '2024-07-28 23:38:32', 'df', 'df', 'df', 'df', '4tiDx', '2025-07-28', 'df', 'df', 'df', 1, 'uploadImage/logo/no-logo.png', 'uploadImage/schools/no-signature.png');

-- --------------------------------------------------------

--
-- Table structure for table `studentadmissiontbl`
--

CREATE TABLE `studentadmissiontbl` (
  `StuAdmNo` varchar(20) NOT NULL,
  `Surname` varchar(150) DEFAULT NULL,
  `FirstName` varchar(30) DEFAULT NULL,
  `OtherName` varchar(30) DEFAULT NULL,
  `sex` varchar(6) NOT NULL,
  `DOB` varchar(50) DEFAULT NULL,
  `address` varchar(66) NOT NULL,
  `PlaceOB` varchar(100) DEFAULT NULL,
  `SchRegCode` varchar(50) DEFAULT NULL,
  `ClassAT` varchar(20) DEFAULT NULL,
  `CurClass` varchar(20) DEFAULT NULL,
  `YOA` varchar(10) DEFAULT NULL,
  `Term` varchar(20) DEFAULT NULL,
  `parentName` varchar(50) DEFAULT NULL,
  `parentPhone` varchar(11) NOT NULL,
  `parentEmail` varchar(40) NOT NULL,
  `photo` varchar(6000) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sturesulttbl`
--

CREATE TABLE `sturesulttbl` (
  `ID` int(11) NOT NULL,
  `SchID` varchar(50) DEFAULT NULL,
  `SchName` varchar(50) DEFAULT NULL,
  `StudentID` varchar(50) DEFAULT NULL,
  `FirstName` varchar(50) DEFAULT NULL,
  `Surname` varchar(50) DEFAULT NULL,
  `OtherName` varchar(50) DEFAULT NULL,
  `Class` varchar(20) DEFAULT NULL,
  `Term` varchar(20) DEFAULT NULL,
  `Year` varchar(10) DEFAULT NULL,
  `ExamsDate` varchar(50) DEFAULT NULL,
  `Maths` varchar(10) DEFAULT NULL,
  `English` varchar(10) DEFAULT NULL,
  `Science/Nature` varchar(10) DEFAULT NULL,
  `Social` varchar(10) DEFAULT NULL,
  `RME` varchar(10) DEFAULT NULL,
  `Creative Art` varchar(10) DEFAULT NULL,
  `Carrier Tech` varchar(10) DEFAULT NULL,
  `Fante` varchar(10) DEFAULT NULL,
  `ICT/Computing` varchar(10) DEFAULT NULL,
  `PE` varchar(10) DEFAULT NULL,
  `French` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `sturesulttbl`
--

INSERT INTO `sturesulttbl` (`ID`, `SchID`, `SchName`, `StudentID`, `FirstName`, `Surname`, `OtherName`, `Class`, `Term`, `Year`, `ExamsDate`, `Maths`, `English`, `Science/Nature`, `Social`, `RME`, `Creative Art`, `Carrier Tech`, `Fante`, `ICT/Computing`, `PE`, `French`) VALUES
(1, '202476604455', 'Kempshot Grammar Academy', '2024KGA418301', 'George ', NULL, NULL, 'Class 3', 'Term 1', '2014', NULL, '67', '50', '50', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, '202476604455', 'Kempshot Grammar Academy', '2024KGA041121', 'Adjei', NULL, NULL, 'Class 3', 'Term 1', '2014', NULL, '45', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `stutranfertbl`
--

CREATE TABLE `stutranfertbl` (
  `StuTNo` int(11) NOT NULL,
  `StuAdmNo` varchar(20) DEFAULT NULL,
  `SchShortCode` varchar(20) DEFAULT NULL,
  `District` varchar(100) DEFAULT NULL,
  `Region` varchar(50) DEFAULT NULL,
  `Zone` varchar(20) DEFAULT NULL,
  `SchoolName` varchar(100) DEFAULT NULL,
  `FirstName` varchar(50) DEFAULT NULL,
  `Surname` varchar(50) DEFAULT NULL,
  `OtherName` varchar(100) DEFAULT NULL,
  `DOB` varchar(50) DEFAULT NULL,
  `CurClass` varchar(10) DEFAULT NULL,
  `POB` varchar(50) DEFAULT NULL,
  `ParentName` varchar(100) DEFAULT NULL,
  `SchRegCode` varchar(50) DEFAULT NULL,
  `Status` varchar(50) DEFAULT NULL,
  `TReason` varchar(100) DEFAULT NULL,
  `TDate` varchar(50) DEFAULT NULL,
  `TYear` varchar(20) DEFAULT NULL,
  `TTerm` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `stutranfertbl`
--

INSERT INTO `stutranfertbl` (`StuTNo`, `StuAdmNo`, `SchShortCode`, `District`, `Region`, `Zone`, `SchoolName`, `FirstName`, `Surname`, `OtherName`, `DOB`, `CurClass`, `POB`, `ParentName`, `SchRegCode`, `Status`, `TReason`, `TDate`, `TYear`, `TTerm`) VALUES
(1, '2024KGA041121', 'KGA', 'Gomoa East District', 'Central Region', 'Zone 4', 'Kempshot Grammar Academy', 'Elvis', 'Appogah', '', 'Wednesday, March 6, 2024', 'JHS 1', 'Gomoa Nyanyano', 'Mr. Apogah', '202476604455', 'Transfered Successfully', '', 'Sunday, March 10, 2024', '2024', 'Term 1'),
(2, '2024KGA447463', 'KGA', 'Gomoa East District', 'Central Region', 'Zone 4', 'Kempshot Grammar Academy', 'John', 'Kumah', '', 'Wednesday, March 6, 2024', 'JHS 1', 'Gomoa Nyanyano', 'Mr. Micheal Kumah', '202476604455', 'Transfered Successfully', 'financial challenges', 'Monday, March 11, 2024', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `ID` int(11) NOT NULL,
  `Department` varchar(50) DEFAULT NULL,
  `S1` varchar(50) DEFAULT NULL,
  `S2` varchar(50) DEFAULT NULL,
  `S3` varchar(50) DEFAULT NULL,
  `S4` varchar(50) DEFAULT NULL,
  `S5` varchar(50) DEFAULT NULL,
  `S6` varchar(50) DEFAULT NULL,
  `S7` varchar(50) DEFAULT NULL,
  `S8` varchar(50) DEFAULT NULL,
  `S9` varchar(50) DEFAULT NULL,
  `S10` varchar(50) DEFAULT NULL,
  `S11` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`ID`, `Department`, `S1`, `S2`, `S3`, `S4`, `S5`, `S6`, `S7`, `S8`, `S9`, `S10`, `S11`) VALUES
(1, 'Lower Primary', 'Maths/Numeracy', 'English/Literacy', 'Science/N Science', 'Creativ Art', 'RME', 'ICT/Computing', 'Fante', 'Physcial Edu', 'Fante', 'French', 'N/A'),
(19, 'Upper Primary', 'Maths/Numeracy', 'English/Literacy', 'Science/N Science', 'Creativ Art', 'RME', 'ICT/Computing', 'N/A', 'Physcial Edu', 'Fante', 'French', 'N/A'),
(21, 'JHS Department', 'Maths/Numeracy', 'English/Literacy', 'Science/N Science', 'Creativ Art', 'RME', 'ICT/Computing', 'Carrier Tech', 'N/A', 'Fante', 'N/A', 'N/A'),
(22, 'Pre School ', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'Physcial Edu', 'N/A', 'French', 'N/A');

-- --------------------------------------------------------

--
-- Table structure for table `tblclass`
--

CREATE TABLE `tblclass` (
  `id` int(11) NOT NULL,
  `classname` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblclass`
--

INSERT INTO `tblclass` (`id`, `classname`) VALUES
(1, 'CLASS 1'),
(5, 'class 2'),
(6, 'DSDSDS');

-- --------------------------------------------------------

--
-- Table structure for table `tbldistrict`
--

CREATE TABLE `tbldistrict` (
  `id` int(11) NOT NULL,
  `DistrictName` varchar(100) DEFAULT NULL,
  `RegionFound` varchar(50) DEFAULT NULL,
  `DistrictShortCode` varchar(10) DEFAULT NULL,
  `Password` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbldistrict`
--

INSERT INTO `tbldistrict` (`id`, `DistrictName`, `RegionFound`, `DistrictShortCode`, `Password`) VALUES
(2, 'Gomoa East District', 'Central Region', 'CR', 'ged'),
(3, 'Awutu Senya District', 'Central Region', 'CR', 'asd');

-- --------------------------------------------------------

--
-- Table structure for table `tblexamtype`
--

CREATE TABLE `tblexamtype` (
  `id` int(4) NOT NULL,
  `exam_name` varchar(30) NOT NULL,
  `exam_code` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblexamtype`
--

INSERT INTO `tblexamtype` (`id`, `exam_name`, `exam_code`) VALUES
(1, 'END OF FIRST TERM', ''),
(2, 'END OF SECOND TERM', ''),
(4, 'END OF THIRD TERM ', '');

-- --------------------------------------------------------

--
-- Table structure for table `tblgroup`
--

CREATE TABLE `tblgroup` (
  `ID` int(4) NOT NULL,
  `groupname` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblgroup`
--

INSERT INTO `tblgroup` (`ID`, `groupname`) VALUES
(1, 'Super Admin'),
(2, 'Admin'),
(3, 'User');

-- --------------------------------------------------------

--
-- Table structure for table `tblregion`
--

CREATE TABLE `tblregion` (
  `id` int(11) NOT NULL,
  `name` varchar(44) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblregion`
--

INSERT INTO `tblregion` (`id`, `name`) VALUES
(2, 'Region 2'),
(9, 'XY');

-- --------------------------------------------------------

--
-- Table structure for table `tblresultsummary`
--

CREATE TABLE `tblresultsummary` (
  `id` int(6) NOT NULL,
  `SchRegCode` varchar(19) NOT NULL,
  `ResultID` varchar(26) NOT NULL,
  `class` varchar(4) NOT NULL,
  `Term` varchar(10) NOT NULL,
  `ExamsYear` varchar(10) NOT NULL,
  `ExamsType` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tblscratchcard`
--

CREATE TABLE `tblscratchcard` (
  `id` int(6) NOT NULL,
  `batchID` int(7) NOT NULL,
  `pin` varchar(13) NOT NULL,
  `serial_no` varchar(13) NOT NULL,
  `status` int(1) NOT NULL,
  `count` int(1) NOT NULL,
  `date_generated` varchar(15) NOT NULL,
  `studentID` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblscratchcard`
--

INSERT INTO `tblscratchcard` (`id`, `batchID`, `pin`, `serial_no`, `status`, `count`, `date_generated`, `studentID`) VALUES
(549, 0, '5228381579755', '4385749212614', 0, 0, '2024-07-29 07:4', '0'),
(550, 0, '4179205884921', '5215637524250', 0, 0, '2024-07-29 07:4', '0'),
(551, 0, '0946766613629', '7752153777281', 0, 0, '2024-07-29 07:4', '0'),
(552, 0, '3209769479291', '8599858353630', 0, 0, '2024-07-29 07:4', '0'),
(553, 0, '4987019637235', '3103349329251', 0, 0, '2024-07-29 07:4', '0'),
(554, 0, '6450801116313', '3309616679506', 0, 0, '2024-07-29 07:4', '0'),
(555, 0, '8414024802418', '8458828223947', 0, 0, '2024-07-29 07:4', '0'),
(556, 3, '8993540427393', '7479112338560', 0, 0, '2024-07-29 07:4', '0'),
(557, 3, '0707380778918', '8714528715330', 0, 0, '2024-07-29 07:4', '0'),
(558, 3, '5288131150526', '6636287706756', 0, 0, '2024-07-29 07:4', '0'),
(559, 3, '6912509840564', '9747329210639', 0, 0, '2024-07-29 07:4', '0'),
(560, 3, '8528270659177', '7610238225774', 0, 0, '2024-07-29 07:4', '0'),
(561, 3, '7304837542604', '8316530082549', 0, 0, '2024-07-29 07:4', '0'),
(562, 3, '8628546865823', '3058842853337', 0, 0, '2024-07-29 07:4', '0'),
(563, 3, '0816920616840', '2197703567997', 0, 0, '2024-07-29 07:4', '0'),
(564, 3, '8098502544672', '2171929668988', 0, 0, '2024-07-29 07:4', '0'),
(565, 3, '3648058944972', '4084395554329', 0, 0, '2024-07-29 07:4', '0'),
(566, 3, '1216494544843', '5162451603776', 0, 0, '2024-07-29 07:4', '0'),
(567, 3, '7302032395028', '9288038277384', 0, 0, '2024-07-29 07:4', '0'),
(568, 3, '4911799165522', '9544753095570', 0, 0, '2024-07-29 07:4', '0'),
(569, 3, '4419969368439', '9621119579242', 0, 0, '2024-07-29 07:4', '0'),
(570, 3, '3223524274337', '5343744886136', 0, 0, '2024-07-29 07:4', '0'),
(571, 3, '6783023945912', '9591185834951', 0, 0, '2024-07-29 07:4', '0'),
(572, 3, '6658067652106', '5771185029690', 0, 0, '2024-07-29 07:4', '0'),
(573, 3, '2963823838822', '6385013299133', 0, 0, '2024-07-29 07:4', '0'),
(574, 3, '8685053273321', '2470614214072', 0, 0, '2024-07-29 07:4', '0'),
(575, 3, '7778682013105', '0999692478510', 0, 0, '2024-07-29 07:4', '0'),
(576, 3, '2185424043066', '5851295103772', 0, 0, '2024-07-29 07:4', '0'),
(577, 3, '0205092259048', '2176267393426', 0, 0, '2024-07-29 07:4', '0'),
(578, 3, '8046435764124', '3523731296479', 0, 0, '2024-07-29 07:4', '0'),
(579, 3, '6393219291037', '0869073901556', 0, 0, '2024-07-29 07:4', '0'),
(580, 3, '8118232497018', '4987015593347', 0, 0, '2024-07-29 07:4', '0'),
(581, 3, '7079129797215', '5044743621127', 0, 0, '2024-07-29 07:4', '0'),
(582, 3, '9620969250983', '0070769042862', 0, 0, '2024-07-29 07:4', '0'),
(583, 3, '6214884166273', '9816777963188', 0, 0, '2024-07-29 07:4', '0'),
(584, 3, '6004605030946', '4536622678368', 0, 0, '2024-07-29 07:4', '0'),
(585, 3, '8331047941884', '2507330084826', 0, 0, '2024-07-29 07:4', '0'),
(586, 3, '6496348621155', '4960559946280', 0, 0, '2024-07-29 07:4', '0'),
(587, 3, '7122316841359', '1556148182844', 0, 0, '2024-07-29 07:4', '0'),
(588, 3, '0092213972130', '0821854304643', 0, 0, '2024-07-29 07:4', '0'),
(589, 4343434, '7428660565777', '6640401101594', 0, 0, '2024-07-29 07:5', '0'),
(590, 4343434, '6269082846833', '2170531494807', 0, 0, '2024-07-29 07:5', '0'),
(591, 4343434, '2043318912218', '8051967444348', 0, 0, '2024-07-29 07:5', '0'),
(592, 4343434, '5066040857994', '1216863507117', 0, 0, '2024-07-29 07:5', '0'),
(593, 4343434, '9864726265530', '7994777709077', 0, 0, '2024-07-29 07:5', '0'),
(594, 4343434, '8802129069270', '5076523533064', 0, 0, '2024-07-29 07:5', '0'),
(595, 4343434, '1264284591139', '1396198642944', 0, 0, '2024-07-29 07:5', '0'),
(596, 4343434, '0033050817209', '4513964724214', 0, 0, '2024-07-29 07:5', '0'),
(597, 4343434, '6619097419143', '5833536909066', 0, 0, '2024-07-29 07:5', '0'),
(598, 4343434, '6066045830713', '4197433528239', 0, 0, '2024-07-29 07:5', '0'),
(599, 4343434, '5363448667881', '6737538546884', 0, 0, '2024-07-29 07:5', '0'),
(600, 4343434, '3021678191512', '2936945151721', 0, 0, '2024-07-29 07:5', '0'),
(601, 4343434, '6097402953182', '1775359809951', 0, 0, '2024-07-29 07:5', '0'),
(602, 4343434, '4854089466026', '1847822164190', 0, 0, '2024-07-29 07:5', '0'),
(603, 4343434, '5005374506304', '0273502958848', 0, 0, '2024-07-29 07:5', '0'),
(604, 4343434, '3534195878493', '9514574641858', 0, 0, '2024-07-29 07:5', '0'),
(605, 4343434, '7244183775835', '9179810337744', 0, 0, '2024-07-29 07:5', '0'),
(606, 4343434, '9953908475901', '3377587383704', 0, 0, '2024-07-29 07:5', '0'),
(607, 4343434, '1680837484902', '0075472004038', 0, 0, '2024-07-29 07:5', '0'),
(608, 4343434, '8181214768458', '9223202934665', 0, 0, '2024-07-29 07:5', '0'),
(609, 4343434, '9329683943299', '8312420882305', 0, 0, '2024-07-29 07:5', '0'),
(610, 4343434, '3781342386144', '4809560758381', 0, 0, '2024-07-29 07:5', '0'),
(611, 4343434, '1708611395106', '3293668575667', 0, 0, '2024-07-29 07:5', '0'),
(612, 4343434, '6682782526143', '6874509989674', 0, 0, '2024-07-29 07:5', '0'),
(613, 4343434, '7887946595318', '1500500086923', 0, 0, '2024-07-29 07:5', '0'),
(614, 4343434, '0670888663356', '4479140688586', 0, 0, '2024-07-29 07:5', '0'),
(615, 4343434, '3184234910250', '6631967277245', 0, 0, '2024-07-29 07:5', '0'),
(616, 4343434, '9277910518804', '5440091799330', 0, 0, '2024-07-29 07:5', '0'),
(617, 4343434, '1430601996468', '3039974646415', 0, 0, '2024-07-29 07:5', '0'),
(618, 4343434, '9976316753607', '9329725012162', 0, 0, '2024-07-29 07:5', '0'),
(619, 4343434, '8597806121060', '7829959313467', 0, 0, '2024-07-29 07:5', '0'),
(620, 4343434, '6182470085591', '7565413575397', 0, 0, '2024-07-29 07:5', '0'),
(621, 4343434, '6019945705430', '3477902622238', 0, 0, '2024-07-29 07:5', '0'),
(622, 4343434, '1589481030782', '2039490355375', 0, 0, '2024-07-29 07:5', '0'),
(623, 4343434, '3952024607410', '2028267887287', 0, 0, '2024-07-29 07:5', '0'),
(624, 4343434, '9177642660751', '9503160256535', 0, 0, '2024-07-29 07:5', '0'),
(625, 4343434, '1942028117991', '3619541949274', 0, 0, '2024-07-29 07:5', '0'),
(626, 4343434, '0455585725360', '7606673783942', 0, 0, '2024-07-29 07:5', '0'),
(627, 4343434, '9968565309341', '0363926063162', 0, 0, '2024-07-29 07:5', '0'),
(628, 4343434, '4070209379320', '2721978716066', 0, 0, '2024-07-29 07:5', '0'),
(629, 4343434, '7608358269618', '2332672442109', 0, 0, '2024-07-29 07:5', '0'),
(630, 4343434, '1078860552274', '5059548278397', 0, 0, '2024-07-29 07:5', '0'),
(631, 4343434, '5232838887624', '4807909321621', 0, 0, '2024-07-29 07:5', '0'),
(632, 4343434, '8050616136518', '5765322806135', 0, 0, '2024-07-29 07:5', '0'),
(633, 4343434, '9437890362587', '5323088763508', 0, 0, '2024-07-29 07:5', '0'),
(634, 4343434, '1549149399530', '2808090801968', 0, 0, '2024-07-29 07:5', '0'),
(635, 4343434, '0332406276903', '0862729892185', 0, 0, '2024-07-29 07:5', '0'),
(636, 4343434, '6375594031498', '3626597415820', 0, 0, '2024-07-29 07:5', '0'),
(637, 4343434, '4386343317289', '4650659025849', 0, 0, '2024-07-29 07:5', '0'),
(638, 4343434, '6194819248647', '0359259340718', 0, 0, '2024-07-29 07:5', '0'),
(639, 4343434, '5584856044457', '8400638468163', 0, 0, '2024-07-29 07:5', '0'),
(640, 4343434, '3409688548595', '3705961782438', 0, 0, '2024-07-29 07:5', '0'),
(641, 4343434, '9968325950416', '6182259665654', 0, 0, '2024-07-29 07:5', '0'),
(642, 4343434, '6406968662935', '9998142875257', 0, 0, '2024-07-29 07:5', '0'),
(643, 4343434, '0600185569902', '1103153061172', 0, 0, '2024-07-29 07:5', '0'),
(644, 4343434, '0887783909066', '9420646396832', 0, 0, '2024-07-29 07:5', '0'),
(645, 4343434, '5879870104834', '2287843483617', 0, 0, '2024-07-29 07:5', '0'),
(646, 4343434, '5838478877183', '4272903904376', 0, 0, '2024-07-29 07:5', '0'),
(647, 4343434, '5755816447385', '9551639484195', 0, 0, '2024-07-29 07:5', '0'),
(648, 4343434, '9818917343544', '8664789488991', 0, 0, '2024-07-29 07:5', '0'),
(649, 4343434, '2588979334057', '8945577757667', 0, 0, '2024-07-29 07:5', '0'),
(650, 4343434, '6556380513730', '0569874605585', 0, 0, '2024-07-29 07:5', '0'),
(651, 4343434, '6146034285569', '4345350695114', 0, 0, '2024-07-29 07:5', '0'),
(652, 4343434, '6218220961000', '7742083080817', 0, 0, '2024-07-29 07:5', '0'),
(653, 4343434, '0574165248987', '5460190646389', 0, 0, '2024-07-29 07:5', '0'),
(654, 4343434, '0808064338197', '5750960151037', 0, 0, '2024-07-29 07:5', '0'),
(655, 4343434, '2542613792828', '9572229419179', 0, 0, '2024-07-29 07:5', '0'),
(656, 4343434, '3059095997237', '2097073152272', 0, 0, '2024-07-29 07:5', '0'),
(657, 4343434, '7666603745909', '2455062921979', 0, 0, '2024-07-29 07:5', '0'),
(658, 4343434, '8514514316529', '6997740889555', 0, 0, '2024-07-29 07:5', '0'),
(659, 4343434, '5867124021458', '2528873142607', 0, 0, '2024-07-29 07:5', '0'),
(660, 4343434, '5980545947769', '3699849972566', 0, 0, '2024-07-29 07:5', '0'),
(661, 4343434, '7641814680617', '5037962722584', 0, 0, '2024-07-29 07:5', '0'),
(662, 4343434, '7835244362967', '5191587905410', 0, 0, '2024-07-29 07:5', '0'),
(663, 4343434, '5034335700340', '8760234210687', 0, 0, '2024-07-29 07:5', '0'),
(664, 4343434, '0996733234309', '9431496456730', 0, 0, '2024-07-29 07:5', '0'),
(665, 4343434, '1983730145853', '2191876082326', 0, 0, '2024-07-29 07:5', '0'),
(666, 4343434, '9688853784597', '7753955757747', 0, 0, '2024-07-29 07:5', '0'),
(667, 4343434, '5956970310276', '0022821148183', 0, 0, '2024-07-29 07:5', '0'),
(668, 4343434, '2083001354091', '9240486388397', 0, 0, '2024-07-29 07:5', '0'),
(669, 4343434, '9430509520137', '6602084478329', 0, 0, '2024-07-29 07:5', '0'),
(670, 4343434, '0808560666606', '4449746862373', 0, 0, '2024-07-29 07:5', '0'),
(671, 4343434, '6187942617348', '7085790101732', 0, 0, '2024-07-29 07:5', '0'),
(672, 4343434, '6473205317022', '9896993433578', 0, 0, '2024-07-29 07:5', '0'),
(673, 4343434, '5020133623488', '4238469073749', 0, 0, '2024-07-29 07:5', '0'),
(674, 4343434, '3648768492427', '1089578320768', 0, 0, '2024-07-29 07:5', '0'),
(675, 4343434, '2549654477427', '7530237840534', 0, 0, '2024-07-29 07:5', '0'),
(676, 4343434, '6490885385671', '4825135886992', 0, 0, '2024-07-29 07:5', '0'),
(677, 4343434, '0161954134470', '5936744782026', 0, 0, '2024-07-29 07:5', '0'),
(678, 4343434, '5713087485130', '2996628869563', 0, 0, '2024-07-29 07:5', '0'),
(679, 4343434, '7106003552942', '7045185104743', 0, 0, '2024-07-29 07:5', '0'),
(680, 4343434, '4429454115420', '7472383438050', 0, 0, '2024-07-29 07:5', '0'),
(681, 4343434, '5856749992516', '1171270376520', 0, 0, '2024-07-29 07:5', '0'),
(682, 4343434, '7963392264096', '0713475299318', 0, 0, '2024-07-29 07:5', '0'),
(683, 4343434, '3662022918147', '9942902414412', 0, 0, '2024-07-29 07:5', '0'),
(684, 4343434, '1215437876554', '4375118648562', 0, 0, '2024-07-29 07:5', '0'),
(685, 4343434, '9815896600214', '5020417259484', 0, 0, '2024-07-29 07:5', '0'),
(686, 4343434, '0970435810262', '7510622262053', 0, 0, '2024-07-29 07:5', '0'),
(687, 4343434, '7875828604035', '8130803893405', 0, 0, '2024-07-29 07:5', '0'),
(688, 4343434, '0065244763719', '2283613625944', 0, 0, '2024-07-29 07:5', '0'),
(689, 4343434, '2934150516626', '9326237536161', 0, 0, '2024-07-29 07:5', '0'),
(690, 4343434, '9098632137659', '7107538112316', 0, 0, '2024-07-29 07:5', '0'),
(691, 4343434, '5829665374337', '5575344818707', 0, 0, '2024-07-29 07:5', '0'),
(692, 4343434, '9906899780921', '5119351541324', 0, 0, '2024-07-29 07:5', '0'),
(693, 4343434, '4183061048583', '0389132718103', 0, 0, '2024-07-29 07:5', '0'),
(694, 4343434, '6311473547897', '6967596459133', 0, 0, '2024-07-29 07:5', '0'),
(695, 4343434, '1341679118835', '4006972823096', 0, 0, '2024-07-29 07:5', '0'),
(696, 4343434, '9276503685904', '8380897150869', 0, 0, '2024-07-29 07:5', '0'),
(697, 4343434, '3454879810389', '0103342485558', 0, 0, '2024-07-29 07:5', '0'),
(698, 4343434, '8106431716485', '0768919381797', 0, 0, '2024-07-29 07:5', '0'),
(699, 4343434, '7475749798391', '5608841072350', 0, 0, '2024-07-29 07:5', '0'),
(700, 4343434, '7858346242475', '5867881445736', 0, 0, '2024-07-29 07:5', '0'),
(701, 4343434, '3140625078268', '0917503049819', 0, 0, '2024-07-29 07:5', '0'),
(702, 4343434, '5036727201878', '4701072480971', 0, 0, '2024-07-29 07:5', '0'),
(703, 4343434, '0521779190244', '9549358687843', 0, 0, '2024-07-29 07:5', '0'),
(704, 4343434, '5595153331879', '5526196146578', 0, 0, '2024-07-29 07:5', '0'),
(705, 4343434, '3600626486516', '4393114468274', 0, 0, '2024-07-29 07:5', '0'),
(706, 4343434, '8855760959275', '5660473524294', 0, 0, '2024-07-29 07:5', '0'),
(707, 4343434, '7778791357692', '2106455193576', 0, 0, '2024-07-29 07:5', '0'),
(708, 4343434, '9722113938957', '6492182364394', 0, 0, '2024-07-29 07:5', '0'),
(709, 4343434, '6298059426366', '3569199555916', 0, 0, '2024-07-29 07:5', '0'),
(710, 4343434, '1608983088993', '8930584720151', 0, 0, '2024-07-29 07:5', '0'),
(711, 4343434, '6482609549370', '3281823198045', 0, 0, '2024-07-29 07:5', '0'),
(712, 4343434, '6155936955242', '8138625398679', 0, 0, '2024-07-29 07:5', '0'),
(713, 4343434, '2566470988648', '3804629207985', 0, 0, '2024-07-29 07:5', '0'),
(714, 4343434, '4736886552087', '6011936459733', 0, 0, '2024-07-29 07:5', '0'),
(715, 4343434, '4681181283558', '7872629461809', 0, 0, '2024-07-29 07:5', '0'),
(716, 4343434, '1943813385996', '3606450798317', 0, 0, '2024-07-29 07:5', '0'),
(717, 4343434, '2570236749844', '6612390210248', 0, 0, '2024-07-29 07:5', '0'),
(718, 4343434, '6546551924933', '9851180130140', 0, 0, '2024-07-29 07:5', '0'),
(719, 4343434, '2656627030815', '2465408504716', 0, 0, '2024-07-29 07:5', '0'),
(720, 4343434, '4330312394912', '9149202832848', 0, 0, '2024-07-29 07:5', '0'),
(721, 4343434, '7510362616575', '1118272132096', 0, 0, '2024-07-29 07:5', '0'),
(722, 4343434, '2888650140491', '5193341039894', 0, 0, '2024-07-29 07:5', '0'),
(723, 4343434, '6858818744617', '4910706587078', 0, 0, '2024-07-29 07:5', '0'),
(724, 4343434, '5522100930060', '9875768335840', 0, 0, '2024-07-29 07:5', '0'),
(725, 4343434, '5159004915382', '7465533941511', 0, 0, '2024-07-29 07:5', '0'),
(726, 4343434, '1976276128399', '6431182445348', 0, 0, '2024-07-29 07:5', '0'),
(727, 4343434, '9799125696747', '8442692662351', 0, 0, '2024-07-29 07:5', '0'),
(728, 4343434, '9340330828226', '0772105024594', 0, 0, '2024-07-29 07:5', '0'),
(729, 4343434, '0014262833122', '4584313160492', 0, 0, '2024-07-29 07:5', '0'),
(730, 4343434, '0365278398330', '7655508869736', 0, 0, '2024-07-29 07:5', '0'),
(731, 4343434, '7172224297931', '7470999826850', 0, 0, '2024-07-29 07:5', '0'),
(732, 4343434, '9504692254741', '5890618311011', 0, 0, '2024-07-29 07:5', '0'),
(733, 4343434, '2087677023774', '4225750094716', 0, 0, '2024-07-29 07:5', '0'),
(734, 4343434, '4535179767846', '6348663285655', 0, 0, '2024-07-29 07:5', '0'),
(735, 4343434, '1765196527380', '8984380674127', 0, 0, '2024-07-29 07:5', '0'),
(736, 4343434, '4014878940759', '8188023552685', 0, 0, '2024-07-29 07:5', '0'),
(737, 4343434, '6132711093536', '4359459520183', 0, 0, '2024-07-29 07:5', '0'),
(738, 4343434, '3658884745308', '3304985136833', 0, 0, '2024-07-29 07:5', '0'),
(739, 4343434, '3697466581871', '5129584869318', 0, 0, '2024-07-29 07:5', '0'),
(740, 4343434, '4082941094193', '9116796936271', 0, 0, '2024-07-29 07:5', '0'),
(741, 4343434, '9554571515464', '9046401967222', 0, 0, '2024-07-29 07:5', '0'),
(742, 4343434, '5210571326731', '8757184360538', 0, 0, '2024-07-29 07:5', '0'),
(743, 4343434, '5479629868534', '8946071219852', 0, 0, '2024-07-29 07:5', '0'),
(744, 4343434, '9490672891273', '0122605411381', 0, 0, '2024-07-29 07:5', '0'),
(745, 4343434, '2069732323758', '9468708471343', 0, 0, '2024-07-29 07:5', '0'),
(746, 4343434, '5635339144025', '1584586595409', 0, 0, '2024-07-29 07:5', '0'),
(747, 4343434, '4653052149950', '4617304822542', 0, 0, '2024-07-29 07:5', '0'),
(748, 4343434, '6174854099557', '4125842711543', 0, 0, '2024-07-29 07:5', '0'),
(749, 4343434, '0903245690378', '0191308193781', 0, 0, '2024-07-29 07:5', '0'),
(750, 4343434, '8504698872029', '9207834844878', 0, 0, '2024-07-29 07:5', '0'),
(751, 4343434, '9989169234652', '2508342111431', 0, 0, '2024-07-29 07:5', '0'),
(752, 4343434, '8386073093110', '2390583361220', 0, 0, '2024-07-29 07:5', '0'),
(753, 4343434, '3771628632648', '6212640255766', 0, 0, '2024-07-29 07:5', '0'),
(754, 4343434, '1560594723998', '5687133472382', 0, 0, '2024-07-29 07:5', '0'),
(755, 4343434, '6788340253327', '3331664674964', 0, 0, '2024-07-29 07:5', '0'),
(756, 4343434, '6009177438483', '8239229657395', 0, 0, '2024-07-29 07:5', '0'),
(757, 4343434, '5875379706270', '5259923920258', 0, 0, '2024-07-29 07:5', '0'),
(758, 4343434, '3589865482654', '4157333401020', 0, 0, '2024-07-29 07:5', '0'),
(759, 4343434, '2114427815105', '0131297180126', 0, 0, '2024-07-29 07:5', '0'),
(760, 4343434, '5025497149870', '6052332487511', 0, 0, '2024-07-29 07:5', '0'),
(761, 4343434, '9335275791665', '8642365761708', 0, 0, '2024-07-29 07:5', '0'),
(762, 4343434, '6192042219240', '8130669684712', 0, 0, '2024-07-29 07:5', '0'),
(763, 4343434, '9325346331550', '8357531849964', 0, 0, '2024-07-29 07:5', '0'),
(764, 4343434, '7452128928524', '2516537828079', 0, 0, '2024-07-29 07:5', '0'),
(765, 4343434, '8245092066265', '4925498351795', 0, 0, '2024-07-29 07:5', '0'),
(766, 4343434, '5044751184614', '6814605383503', 0, 0, '2024-07-29 07:5', '0'),
(767, 4343434, '5840553943225', '3724771601439', 0, 0, '2024-07-29 07:5', '0'),
(768, 4343434, '2218847538569', '5984472335187', 0, 0, '2024-07-29 07:5', '0'),
(769, 4343434, '7392981817810', '4680690508568', 0, 0, '2024-07-29 07:5', '0'),
(770, 4343434, '4767203542327', '0094307508059', 0, 0, '2024-07-29 07:5', '0'),
(771, 4343434, '4500953360181', '2095205322810', 0, 0, '2024-07-29 07:5', '0'),
(772, 4343434, '5995758255641', '0798299242386', 0, 0, '2024-07-29 07:5', '0'),
(773, 4343434, '2148517356106', '9458238067578', 0, 0, '2024-07-29 07:5', '0'),
(774, 4343434, '1885051166807', '4827024695731', 0, 0, '2024-07-29 07:5', '0'),
(775, 4343434, '1179787184567', '4163303625258', 0, 0, '2024-07-29 07:5', '0'),
(776, 4343434, '7220133123374', '4309925569861', 0, 0, '2024-07-29 07:5', '0'),
(777, 4343434, '1440554505556', '0275018790989', 0, 0, '2024-07-29 07:5', '0'),
(778, 4343434, '8532144745610', '0848117743292', 0, 0, '2024-07-29 07:5', '0'),
(779, 4343434, '5193080158610', '5628000481156', 0, 0, '2024-07-29 07:5', '0'),
(780, 4343434, '2349742633365', '9699926299072', 0, 0, '2024-07-29 07:5', '0'),
(781, 4343434, '1226773101313', '5895644787373', 0, 0, '2024-07-29 07:5', '0'),
(782, 4343434, '1437840413165', '7108050238205', 0, 0, '2024-07-29 07:5', '0'),
(783, 4343434, '6239026815850', '2740662138591', 0, 0, '2024-07-29 07:5', '0'),
(784, 4343434, '6619863362155', '4415353824674', 0, 0, '2024-07-29 07:5', '0'),
(785, 4343434, '0112444449559', '4179354020112', 0, 0, '2024-07-29 07:5', '0'),
(786, 4343434, '7295486059771', '9300538792152', 0, 0, '2024-07-29 07:5', '0'),
(787, 4343434, '4600490546525', '6496124056824', 0, 0, '2024-07-29 07:5', '0'),
(788, 4343434, '7172479189909', '0268866294467', 0, 0, '2024-07-29 07:5', '0'),
(789, 4343434, '5622679503848', '5171277442253', 0, 0, '2024-07-29 07:5', '0'),
(790, 4343434, '2549128950042', '6260614327123', 0, 0, '2024-07-29 07:5', '0'),
(791, 4343434, '9902344682233', '5934405268526', 0, 0, '2024-07-29 07:5', '0'),
(792, 4343434, '6555507401624', '0544211930626', 0, 0, '2024-07-29 07:5', '0'),
(793, 4343434, '1802911913968', '6894838968900', 0, 0, '2024-07-29 07:5', '0'),
(794, 4343434, '6645654292768', '3533200030064', 0, 0, '2024-07-29 07:5', '0'),
(795, 4343434, '8172607966919', '2692790011978', 0, 0, '2024-07-29 07:5', '0'),
(796, 4343434, '9171503375685', '2627523848787', 0, 0, '2024-07-29 07:5', '0'),
(797, 4343434, '3782239300894', '5040191291404', 0, 0, '2024-07-29 07:5', '0'),
(798, 4343434, '4871813347570', '4635882831956', 0, 0, '2024-07-29 07:5', '0'),
(799, 4343434, '5877625838630', '3970756838318', 0, 0, '2024-07-29 07:5', '0'),
(800, 4343434, '7287599260103', '4843806448486', 0, 0, '2024-07-29 07:5', '0'),
(801, 4343434, '7674965686967', '1281826549273', 0, 0, '2024-07-29 07:5', '0'),
(802, 4343434, '1350173063152', '7814608150176', 0, 0, '2024-07-29 07:5', '0'),
(803, 4343434, '7111890761736', '6068797231527', 0, 0, '2024-07-29 07:5', '0'),
(804, 4343434, '1959911976674', '7202088551660', 0, 0, '2024-07-29 07:5', '0'),
(805, 4343434, '6162083614369', '0816621361749', 0, 0, '2024-07-29 07:5', '0'),
(806, 4343434, '2667160951130', '9236180179818', 0, 0, '2024-07-29 07:5', '0'),
(807, 4343434, '4647774263654', '7135481007492', 0, 0, '2024-07-29 07:5', '0'),
(808, 4343434, '7222109063380', '9792558885875', 0, 0, '2024-07-29 07:5', '0'),
(809, 4343434, '4131115805904', '4911950514177', 0, 0, '2024-07-29 07:5', '0'),
(810, 4343434, '9569843969931', '6240164327849', 0, 0, '2024-07-29 07:5', '0'),
(811, 4343434, '4720719497853', '6808337182145', 0, 0, '2024-07-29 07:5', '0'),
(812, 4343434, '8533546933771', '2301809553583', 0, 0, '2024-07-29 07:5', '0'),
(813, 4343434, '5099880996872', '6237537991880', 0, 0, '2024-07-29 07:5', '0'),
(814, 4343434, '2552511610387', '6272843168555', 0, 0, '2024-07-29 07:5', '0'),
(815, 4343434, '5841271480008', '2763278259328', 0, 0, '2024-07-29 07:5', '0'),
(816, 4343434, '7093376139903', '3101264289618', 0, 0, '2024-07-29 07:5', '0'),
(817, 4343434, '9282053997633', '4578542931421', 0, 0, '2024-07-29 07:5', '0'),
(818, 4343434, '5445334623119', '3321988503586', 0, 0, '2024-07-29 07:5', '0'),
(819, 4343434, '9298900443580', '5159559060686', 0, 0, '2024-07-29 07:5', '0'),
(820, 4343434, '9580738486611', '0036684022883', 0, 0, '2024-07-29 07:5', '0'),
(821, 4343434, '2207560733539', '7312508421334', 0, 0, '2024-07-29 07:5', '0'),
(822, 4343434, '9022606664981', '3576475196196', 0, 0, '2024-07-29 07:5', '0'),
(823, 4343434, '1426902533372', '3870067953921', 0, 0, '2024-07-29 07:5', '0'),
(824, 4343434, '3700712930151', '9393531982700', 0, 0, '2024-07-29 07:5', '0'),
(825, 4343434, '8529015984932', '1959030126824', 0, 0, '2024-07-29 07:5', '0'),
(826, 4343434, '0558086165145', '1374095877544', 0, 0, '2024-07-29 07:5', '0'),
(827, 4343434, '9288314591161', '0232709785769', 0, 0, '2024-07-29 07:5', '0'),
(828, 4343434, '6615594954187', '9681301508175', 0, 0, '2024-07-29 07:5', '0'),
(829, 4343434, '8042233882592', '2221836484573', 0, 0, '2024-07-29 07:5', '0'),
(830, 4343434, '0028441134837', '3485401315648', 0, 0, '2024-07-29 07:5', '0'),
(831, 4343434, '7680115456833', '9997909884413', 0, 0, '2024-07-29 07:5', '0'),
(832, 4343434, '9422888838767', '5168194008667', 0, 0, '2024-07-29 07:5', '0'),
(833, 4343434, '4899087308938', '6527206753396', 0, 0, '2024-07-29 07:5', '0'),
(834, 4343434, '2707247445236', '4241006490501', 0, 0, '2024-07-29 07:5', '0'),
(835, 4343434, '8973698870245', '6793573753121', 0, 0, '2024-07-29 07:5', '0'),
(836, 4343434, '7118183844342', '8515639222704', 0, 0, '2024-07-29 07:5', '0'),
(837, 4343434, '4981430856655', '5229013436976', 0, 0, '2024-07-29 07:5', '0'),
(838, 4343434, '0390924960349', '1783897523396', 0, 0, '2024-07-29 07:5', '0'),
(839, 4343434, '2949164360023', '0456976182591', 0, 0, '2024-07-29 07:5', '0'),
(840, 4343434, '3392196448974', '1430106515305', 0, 0, '2024-07-29 07:5', '0'),
(841, 4343434, '0977262403178', '8135414945988', 0, 0, '2024-07-29 07:5', '0'),
(842, 4343434, '3485087009608', '6900700440127', 0, 0, '2024-07-29 07:5', '0'),
(843, 4343434, '1502735012384', '8882382707722', 0, 0, '2024-07-29 07:5', '0'),
(844, 4343434, '5333414674065', '8858094535243', 0, 0, '2024-07-29 07:5', '0'),
(845, 4343434, '4682176703251', '9519225043030', 0, 0, '2024-07-29 07:5', '0'),
(846, 4343434, '2800761377019', '9146347417483', 0, 0, '2024-07-29 07:5', '0'),
(847, 4343434, '9733252982572', '6021323385805', 0, 0, '2024-07-29 07:5', '0'),
(848, 4343434, '7325292006334', '4377644948333', 0, 0, '2024-07-29 07:5', '0'),
(849, 4343434, '1618103524564', '6658696033881', 0, 0, '2024-07-29 07:5', '0'),
(850, 4343434, '8807065449098', '1486106013557', 0, 0, '2024-07-29 07:5', '0'),
(851, 4343434, '9428398751729', '6915833423035', 0, 0, '2024-07-29 07:5', '0'),
(852, 4343434, '2128387287969', '4448975684725', 0, 0, '2024-07-29 07:5', '0'),
(853, 4343434, '1529461787698', '6273621327607', 0, 0, '2024-07-29 07:5', '0'),
(854, 4343434, '2628916780929', '8917003959310', 0, 0, '2024-07-29 07:5', '0'),
(855, 4343434, '1417777570736', '9665468011015', 0, 0, '2024-07-29 07:5', '0'),
(856, 4343434, '5816151499529', '2186393332533', 0, 0, '2024-07-29 07:5', '0'),
(857, 4343434, '5653718252916', '3926358363789', 0, 0, '2024-07-29 07:5', '0'),
(858, 4343434, '1045701935942', '3278851938613', 0, 0, '2024-07-29 07:5', '0'),
(859, 4343434, '8596234084173', '1648974204098', 0, 0, '2024-07-29 07:5', '0'),
(860, 4343434, '5679130369131', '5793825156592', 0, 0, '2024-07-29 07:5', '0'),
(861, 4343434, '7641544063117', '5878422761081', 0, 0, '2024-07-29 07:5', '0'),
(862, 4343434, '7088006008376', '6476289800083', 0, 0, '2024-07-29 07:5', '0'),
(863, 4343434, '8341528783571', '9601544775862', 0, 0, '2024-07-29 07:5', '0'),
(864, 4343434, '4975086638486', '8552123173116', 0, 0, '2024-07-29 07:5', '0'),
(865, 4343434, '5467525323611', '2886229502677', 0, 0, '2024-07-29 07:5', '0'),
(866, 4343434, '2124014456047', '9624983378491', 0, 0, '2024-07-29 07:5', '0'),
(867, 4343434, '0770801417220', '5978625924189', 0, 0, '2024-07-29 07:5', '0'),
(868, 4343434, '8767634778658', '3712680485176', 0, 0, '2024-07-29 07:5', '0'),
(869, 4343434, '1352576371530', '5293726597286', 0, 0, '2024-07-29 07:5', '0'),
(870, 4343434, '7132209882161', '2678847705250', 0, 0, '2024-07-29 07:5', '0'),
(871, 4343434, '1224435716444', '9095003828650', 0, 0, '2024-07-29 07:5', '0'),
(872, 4343434, '4326990877350', '2329178909536', 0, 0, '2024-07-29 07:5', '0'),
(873, 4343434, '2172352371595', '2112433080744', 0, 0, '2024-07-29 07:5', '0'),
(874, 4343434, '5815720984168', '9641176263390', 0, 0, '2024-07-29 07:5', '0'),
(875, 4343434, '4701775136962', '0266395373878', 0, 0, '2024-07-29 07:5', '0'),
(876, 4343434, '3684548658524', '0079394431267', 0, 0, '2024-07-29 07:5', '0'),
(877, 4343434, '9433541816301', '3506867966429', 0, 0, '2024-07-29 07:5', '0'),
(878, 4343434, '0178296004414', '1907448358043', 0, 0, '2024-07-29 07:5', '0'),
(879, 4343434, '3559713828643', '4192855527465', 0, 0, '2024-07-29 07:5', '0'),
(880, 4343434, '1963345043173', '0189452303555', 0, 0, '2024-07-29 07:5', '0'),
(881, 4343434, '6788242811326', '5139060304890', 0, 0, '2024-07-29 07:5', '0'),
(882, 4343434, '3866615199966', '1896268322459', 0, 0, '2024-07-29 07:5', '0'),
(883, 4343434, '3140606879431', '8618219083029', 0, 0, '2024-07-29 07:5', '0'),
(884, 4343434, '9617624821512', '8258666469357', 0, 0, '2024-07-29 07:5', '0'),
(885, 4343434, '2637316766966', '8600470802807', 0, 0, '2024-07-29 07:5', '0'),
(886, 4343434, '8628102022725', '6878189797382', 0, 0, '2024-07-29 07:5', '0'),
(887, 4343434, '2859189845660', '9702802267485', 0, 0, '2024-07-29 07:5', '0'),
(888, 4343434, '5735133863935', '6132425271813', 0, 0, '2024-07-29 07:5', '0'),
(889, 4343434, '7194868431275', '6431719621932', 0, 0, '2024-07-29 07:5', '0'),
(890, 4343434, '6377409043315', '1895124002723', 0, 0, '2024-07-29 07:5', '0'),
(891, 4343434, '5713795707830', '4014779487720', 0, 0, '2024-07-29 07:5', '0'),
(892, 4343434, '7727218336867', '2034788718828', 0, 0, '2024-07-29 07:5', '0'),
(893, 4343434, '9891306833089', '1097391235597', 0, 0, '2024-07-29 07:5', '0'),
(894, 4343434, '8890987623839', '7443568701953', 0, 0, '2024-07-29 07:5', '0'),
(895, 4343434, '2462351732037', '2719298020097', 0, 0, '2024-07-29 07:5', '0'),
(896, 4343434, '2004311382443', '6562521789609', 0, 0, '2024-07-29 07:5', '0'),
(897, 4343434, '6390278240046', '5758071727866', 0, 0, '2024-07-29 07:5', '0'),
(898, 4343434, '6683659200927', '0657300760173', 0, 0, '2024-07-29 07:5', '0'),
(899, 4343434, '8544568298988', '6724498172726', 0, 0, '2024-07-29 07:5', '0'),
(900, 4343434, '1995274003522', '9169117590744', 0, 0, '2024-07-29 07:5', '0'),
(901, 4343434, '3168400045942', '9614737313340', 0, 0, '2024-07-29 07:5', '0'),
(902, 4343434, '1173403920760', '5710051044425', 0, 0, '2024-07-29 07:5', '0'),
(903, 4343434, '5860351592679', '4105088110333', 0, 0, '2024-07-29 07:5', '0'),
(904, 4343434, '6267344126183', '0567367009034', 0, 0, '2024-07-29 07:5', '0'),
(905, 4343434, '1560844492039', '3541301909319', 0, 0, '2024-07-29 07:5', '0'),
(906, 4343434, '4680137135970', '9666088779974', 0, 0, '2024-07-29 07:5', '0'),
(907, 4343434, '2516740085541', '2078521721169', 0, 0, '2024-07-29 07:5', '0'),
(908, 4343434, '5987176646380', '8475518624816', 0, 0, '2024-07-29 07:5', '0'),
(909, 4343434, '0142267352550', '6770673462330', 0, 0, '2024-07-29 07:5', '0'),
(910, 4343434, '6430639577641', '0616842914489', 0, 0, '2024-07-29 07:5', '0'),
(911, 4343434, '3277885815463', '5523877087222', 0, 0, '2024-07-29 07:5', '0'),
(912, 4343434, '2703155262331', '0058332087805', 0, 0, '2024-07-29 07:5', '0'),
(913, 4343434, '8620206540112', '8630352015336', 0, 0, '2024-07-29 07:5', '0'),
(914, 4343434, '2421642565905', '0702339328333', 0, 0, '2024-07-29 07:5', '0'),
(915, 4343434, '8061874564102', '9032684207921', 0, 0, '2024-07-29 07:5', '0'),
(916, 4343434, '0598038561539', '7836255673117', 0, 0, '2024-07-29 07:5', '0'),
(917, 4343434, '6773539435521', '6746099621126', 0, 0, '2024-07-29 07:5', '0'),
(918, 4343434, '2453618592671', '6115688917620', 0, 0, '2024-07-29 07:5', '0'),
(919, 4343434, '6940568647720', '2427026446386', 0, 0, '2024-07-29 07:5', '0'),
(920, 4343434, '5741271533362', '2756639171294', 0, 0, '2024-07-29 07:5', '0'),
(921, 4343434, '2931916084667', '5573656480299', 0, 0, '2024-07-29 07:5', '0'),
(922, 4343434, '6004338789667', '2230225514065', 0, 0, '2024-07-29 07:5', '0'),
(923, 0, '9585903766855', '0399992134004', 0, 0, '2024-07-29 07:5', '0'),
(924, 0, '0776432862913', '7703852799036', 0, 0, '2024-07-29 07:5', '0'),
(925, 0, '2566897081286', '3651326902083', 0, 0, '2024-07-29 07:5', '0'),
(926, 0, '7444757457797', '3929814380804', 0, 0, '2024-07-29 07:5', '0'),
(927, 0, '5334831798796', '0042556801149', 0, 0, '2024-07-29 07:5', '0'),
(928, 0, '9947454360223', '1965845563749', 0, 0, '2024-07-29 07:5', '0'),
(929, 0, '5221788937257', '5311976419882', 0, 0, '2024-07-29 07:5', '0'),
(930, 0, '5393650483993', '3545485682887', 0, 0, '2024-07-29 07:5', '0'),
(931, 0, '5855360283446', '4840854043482', 0, 0, '2024-07-29 07:5', '0'),
(932, 0, '2974249722923', '2184883214877', 0, 0, '2024-07-29 07:5', '0'),
(933, 0, '3232515331792', '9865302712934', 0, 0, '2024-07-29 07:5', '0'),
(934, 0, '1487771318600', '0097224973339', 0, 0, '2024-07-29 07:5', '0'),
(935, 0, '1595209038718', '7672434941862', 0, 0, '2024-07-29 07:5', '0'),
(936, 0, '3702239308361', '8502492396337', 0, 0, '2024-07-29 07:5', '0'),
(937, 0, '5179985698006', '6756294834409', 0, 0, '2024-07-29 07:5', '0'),
(938, 0, '4477859996503', '2715991316917', 0, 0, '2024-07-29 07:5', '0'),
(939, 0, '2799515268696', '1002757703671', 0, 0, '2024-07-29 07:5', '0'),
(940, 0, '6714684917181', '4527042352420', 0, 0, '2024-07-29 07:5', '0'),
(941, 0, '0159031068018', '3467751857054', 0, 0, '2024-07-29 07:5', '0'),
(942, 0, '4414973848375', '2196124775246', 0, 0, '2024-07-29 07:5', '0'),
(943, 0, '5604128585991', '4876989527195', 0, 0, '2024-07-29 07:5', '0'),
(944, 0, '6682143109923', '9267896559270', 0, 0, '2024-07-29 07:5', '0'),
(945, 0, '3483505057101', '5409980159215', 0, 0, '2024-07-29 07:5', '0'),
(946, 0, '1471290239478', '3637031789536', 0, 0, '2024-07-29 07:5', '0'),
(947, 0, '1650892223822', '9755319072725', 0, 0, '2024-07-29 07:5', '0'),
(948, 0, '2470995552323', '7202953620628', 0, 0, '2024-07-29 07:5', '0'),
(949, 0, '3656923958246', '3239508148098', 0, 0, '2024-07-29 07:5', '0'),
(950, 0, '3613124890933', '3807849862192', 0, 0, '2024-07-29 07:5', '0'),
(951, 0, '5549421467524', '1757981444627', 0, 0, '2024-07-29 07:5', '0'),
(952, 0, '1978745359101', '5974592347925', 0, 0, '2024-07-29 07:5', '0'),
(953, 0, '3989909176015', '1135791873076', 0, 0, '2024-07-29 07:5', '0'),
(954, 0, '6774897021631', '6106008565702', 0, 0, '2024-07-29 07:5', '0'),
(955, 0, '0564659851842', '9171445878994', 0, 0, '2024-07-29 07:5', '0'),
(956, 0, '4054546185574', '1475490663638', 0, 0, '2024-07-29 07:5', '0'),
(957, 0, '7317725177155', '0543732542344', 0, 0, '2024-07-29 07:5', '0'),
(958, 0, '0936657583606', '4840962296288', 0, 0, '2024-07-29 07:5', '0'),
(959, 0, '9865271416573', '7953763350777', 0, 0, '2024-07-29 07:5', '0'),
(960, 0, '7998634123200', '7132082828867', 0, 0, '2024-07-29 07:5', '0'),
(961, 0, '4055746244520', '5025665606681', 0, 0, '2024-07-29 07:5', '0'),
(962, 0, '6174363425221', '7208462403545', 0, 0, '2024-07-29 07:5', '0'),
(963, 0, '9198215199782', '8010460293173', 0, 0, '2024-07-29 07:5', '0'),
(964, 0, '3703030965706', '9369617741128', 0, 0, '2024-07-29 07:5', '0'),
(965, 0, '6577820191747', '4791837685853', 0, 0, '2024-07-29 07:5', '0'),
(966, 0, '5240421724475', '3686502274900', 0, 0, '2024-07-29 07:5', '0'),
(967, 0, '8427719104828', '8836746414195', 0, 0, '2024-07-29 07:5', '0'),
(968, 0, '9652233766488', '1547410239848', 0, 0, '2024-07-29 07:5', '0'),
(969, 0, '3329812342342', '4387465293192', 0, 0, '2024-07-29 07:5', '0'),
(970, 0, '8660976186151', '9406053359649', 0, 0, '2024-07-29 07:5', '0'),
(971, 0, '4710773963049', '9238959447962', 0, 0, '2024-07-29 07:5', '0'),
(972, 0, '9430314762485', '9897347585749', 0, 0, '2024-07-29 07:5', '0'),
(973, 0, '8054640361811', '1173502998880', 0, 0, '2024-07-29 07:5', '0'),
(974, 0, '7756476097855', '5281564225706', 0, 0, '2024-07-29 07:5', '0'),
(975, 0, '1720186138125', '8334540171682', 0, 0, '2024-07-29 07:5', '0'),
(976, 0, '1114468648288', '1470184616770', 0, 0, '2024-07-29 07:5', '0'),
(977, 0, '3790526779989', '2693056284495', 0, 0, '2024-07-29 07:5', '0'),
(978, 0, '7082880115000', '0076800361195', 0, 0, '2024-07-29 07:5', '0'),
(979, 0, '1525276136474', '7521806342467', 0, 0, '2024-07-29 07:5', '0'),
(980, 0, '0931404675301', '9355842426978', 0, 0, '2024-07-29 07:5', '0'),
(981, 0, '3229860934127', '8356903744938', 0, 0, '2024-07-29 07:5', '0'),
(982, 0, '4822507481647', '4631593257313', 0, 0, '2024-07-29 07:5', '0'),
(983, 0, '6060651122389', '9424701453678', 0, 0, '2024-07-29 07:5', '0'),
(984, 0, '3207847574222', '0205253488143', 0, 0, '2024-07-29 07:5', '0'),
(985, 0, '0741409716418', '1350029824308', 0, 0, '2024-07-29 07:5', '0'),
(986, 0, '9953609683867', '2194824593813', 0, 0, '2024-07-29 07:5', '0'),
(987, 0, '0575271189828', '9585597814644', 0, 0, '2024-07-29 07:5', '0'),
(988, 0, '2357688842418', '5992447649905', 0, 0, '2024-07-29 07:5', '0'),
(989, 0, '4275460954660', '9567958825858', 0, 0, '2024-07-29 07:5', '0'),
(990, 0, '8845071600821', '1338641406570', 0, 0, '2024-07-29 07:5', '0'),
(991, 0, '1264123335068', '3994589940654', 0, 0, '2024-07-29 07:5', '0'),
(992, 0, '8884553126476', '7211323857538', 0, 0, '2024-07-29 07:5', '0'),
(993, 0, '3574343691974', '1806861574489', 0, 0, '2024-07-29 07:5', '0'),
(994, 0, '5477073525711', '9333975951305', 0, 0, '2024-07-29 07:5', '0'),
(995, 0, '5392092776445', '1136254078638', 0, 0, '2024-07-29 07:5', '0'),
(996, 0, '6910239003523', '1264397644392', 0, 0, '2024-07-29 07:5', '0'),
(997, 0, '5677568413888', '0236769796264', 0, 0, '2024-07-29 07:5', '0');

-- --------------------------------------------------------

--
-- Table structure for table `tblstaff`
--

CREATE TABLE `tblstaff` (
  `ID` int(11) NOT NULL,
  `StaffID` varchar(50) DEFAULT NULL,
  `StaffName` varchar(100) DEFAULT NULL,
  `HQ` varchar(50) DEFAULT NULL,
  `PhoneNumber` varchar(20) DEFAULT NULL,
  `CA3` varchar(20) DEFAULT NULL,
  `Department` varchar(50) DEFAULT NULL,
  `SchRegCode` varchar(33) DEFAULT NULL,
  `SchoolName` varchar(100) DEFAULT NULL,
  `District` varchar(50) DEFAULT NULL,
  `Zone` varchar(50) DEFAULT NULL,
  `Region` varchar(50) DEFAULT NULL,
  `Status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tblstaff`
--

INSERT INTO `tblstaff` (`ID`, `StaffID`, `StaffName`, `HQ`, `PhoneNumber`, `CA3`, `Department`, `SchRegCode`, `SchoolName`, `District`, `Zone`, `Region`, `Status`) VALUES
(1, '2024747580871', 'Koffie Macwel', 'BECE', '4567000987', 'Class 6', 'Upper Primary', '2835194', 'Kempshot Grammar Academy', 'Gomoa East District', 'Zone 4', 'Central Region', '0'),
(3, '2024203485120', 'Commey Desmond', 'DIPLOMA', '0244367458', 'Class 6', 'Upper Primary', '2835194', 'Kempshot Grammar Academy', 'Gomoa East District', 'Zone 4', 'Central Region', '0'),
(4, '2024304645514', 'Local Wisdom', 'WASSCE', '03445678459', 'JHS 2', 'JHS Department', '202476604455', 'Kempshot Grammar Academy', 'Gomoa East District', 'Zone 4', 'Central Region', '0'),
(5, '2024383435822', 'Ansah Frank Owusu', 'DEGREE', '0344567956', 'JHS 3', 'JHS Department', '202476604455', 'Kempshot Grammar Academy', 'Gomoa East District', 'Zone 4', 'Central Region', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tblzone`
--

CREATE TABLE `tblzone` (
  `id` int(11) NOT NULL,
  `name` varchar(44) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblzone`
--

INSERT INTO `tblzone` (`id`, `name`) VALUES
(1, 'zone 1'),
(2, 'zone 2');

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
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `email`, `password`, `fullname`, `lastaccess`, `last_ip`, `groupname`, `status`, `photo`) VALUES
(3, 'newleastpaysolution@gmail.com', 'escobar2012', 'Ndueso Walter', '2024-07-30 14:04:51', '::1', 'Super Admin', '1', 'uploadImage/user/FB_IMG_1545896651404.jpg'),
(65, 'dmam@gmail.com', 'CH4Kb', 'Vivy uyo', 'Not Available', 'Not Available', 'Admin', '1', 'uploadImage/FB_IMG_1661536954799.jpg');

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
  `address1` varchar(123) NOT NULL,
  `address2` varchar(123) NOT NULL,
  `account_name` varchar(40) NOT NULL,
  `bank` varchar(25) NOT NULL,
  `accountNo` varchar(15) NOT NULL,
  `SMS_username` varchar(40) NOT NULL,
  `SMS_password` varchar(20) NOT NULL,
  `mail_host` varchar(222) NOT NULL,
  `mail_username` varchar(222) NOT NULL,
  `mail_password` varchar(33) NOT NULL,
  `mail_port` varchar(3) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `websiteinfo`
--

INSERT INTO `websiteinfo` (`ID`, `website_name`, `email`, `phone1`, `phone2`, `url`, `address1`, `address2`, `account_name`, `bank`, `accountNo`, `SMS_username`, `SMS_password`, `mail_host`, `mail_username`, `mail_password`, `mail_port`) VALUES
(12, 'Result Checker APP', 'newleastpaysolution@gmail.com', '08088884983', '08080934538', 'https://allschoolchecks.org', 'Plot 143B Third Avenue, Abuja', '29 Nepa Line,Uyo, Akwa Ibom State', 'isupport Project', 'First Bank Nigeria', '3032079503', 'victorpee40@gmail.com', 'Grace123$#@', 'SMTP.GMAIL.COM', 'ADMISSION.MANSENSHS@GMAIL.COM', 'XMVLDREPYHGKJFKF', '465');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_log`
--
ALTER TABLE `activity_log`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `examsresultstbl`
--
ALTER TABLE `examsresultstbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `homeworkexpectation`
--
ALTER TABLE `homeworkexpectation`
  ADD PRIMARY KEY (`HWID`);

--
-- Indexes for table `homeworkexpectation11`
--
ALTER TABLE `homeworkexpectation11`
  ADD PRIMARY KEY (`HWID`);

--
-- Indexes for table `homeworkrecordstbl`
--
ALTER TABLE `homeworkrecordstbl`
  ADD PRIMARY KEY (`RecID`);

--
-- Indexes for table `homeworkrecordstbl11`
--
ALTER TABLE `homeworkrecordstbl11`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `hwtbl`
--
ALTER TABLE `hwtbl`
  ADD PRIMARY KEY (`No.`);

--
-- Indexes for table `schfeestbl`
--
ALTER TABLE `schfeestbl`
  ADD PRIMARY KEY (`SchRegCode`);

--
-- Indexes for table `schoolregistrationtbl`
--
ALTER TABLE `schoolregistrationtbl`
  ADD PRIMARY KEY (`SchRegCode`);

--
-- Indexes for table `studentadmissiontbl`
--
ALTER TABLE `studentadmissiontbl`
  ADD PRIMARY KEY (`StuAdmNo`);

--
-- Indexes for table `sturesulttbl`
--
ALTER TABLE `sturesulttbl`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `stutranfertbl`
--
ALTER TABLE `stutranfertbl`
  ADD PRIMARY KEY (`StuTNo`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblclass`
--
ALTER TABLE `tblclass`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbldistrict`
--
ALTER TABLE `tbldistrict`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblexamtype`
--
ALTER TABLE `tblexamtype`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblgroup`
--
ALTER TABLE `tblgroup`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblregion`
--
ALTER TABLE `tblregion`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblresultsummary`
--
ALTER TABLE `tblresultsummary`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblscratchcard`
--
ALTER TABLE `tblscratchcard`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblstaff`
--
ALTER TABLE `tblstaff`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblzone`
--
ALTER TABLE `tblzone`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1394;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `examsresultstbl`
--
ALTER TABLE `examsresultstbl`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `homeworkexpectation`
--
ALTER TABLE `homeworkexpectation`
  MODIFY `HWID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `homeworkexpectation11`
--
ALTER TABLE `homeworkexpectation11`
  MODIFY `HWID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `homeworkrecordstbl`
--
ALTER TABLE `homeworkrecordstbl`
  MODIFY `RecID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `homeworkrecordstbl11`
--
ALTER TABLE `homeworkrecordstbl11`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `hwtbl`
--
ALTER TABLE `hwtbl`
  MODIFY `No.` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `stutranfertbl`
--
ALTER TABLE `stutranfertbl`
  MODIFY `StuTNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tblclass`
--
ALTER TABLE `tblclass`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbldistrict`
--
ALTER TABLE `tbldistrict`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tblexamtype`
--
ALTER TABLE `tblexamtype`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tblgroup`
--
ALTER TABLE `tblgroup`
  MODIFY `ID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tblregion`
--
ALTER TABLE `tblregion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tblresultsummary`
--
ALTER TABLE `tblresultsummary`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tblscratchcard`
--
ALTER TABLE `tblscratchcard`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=998;

--
-- AUTO_INCREMENT for table `tblstaff`
--
ALTER TABLE `tblstaff`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tblzone`
--
ALTER TABLE `tblzone`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `websiteinfo`
--
ALTER TABLE `websiteinfo`
  MODIFY `ID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
