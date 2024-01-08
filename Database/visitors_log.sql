-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2023 at 12:43 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `visitors_log`
--

-- --------------------------------------------------------

--
-- Table structure for table `announcement`
--

CREATE TABLE `announcement` (
  `actId` int(11) NOT NULL,
  `actName` text NOT NULL,
  `actDate` varchar(20) NOT NULL,
  `date_added` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `log_history`
--

CREATE TABLE `log_history` (
  `log_Id` int(11) NOT NULL,
  `user_Id` int(11) NOT NULL,
  `login_time` varchar(100) NOT NULL,
  `logout_time` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `log_history`
--

INSERT INTO `log_history` (`log_Id`, `user_Id`, `login_time`, `logout_time`) VALUES
(154, 68, '2023-11-23 07:59 PM', ''),
(155, 67, '2023-11-23 08:16 PM', ''),
(156, 67, '2023-11-25 10:58 PM', ''),
(157, 67, '2023-11-25 11:02 PM', ''),
(158, 67, '2023-11-25 11:08 PM', ''),
(159, 67, '2023-11-25 11:21 PM', ''),
(160, 69, '2023-11-26 12:13 AM', ''),
(161, 67, '2023-11-26 12:30 AM', ''),
(162, 67, '2023-11-26 03:12 PM', ''),
(163, 68, '2023-11-26 03:16 PM', ''),
(164, 67, '2023-11-26 03:16 PM', ''),
(165, 70, '2023-11-26 03:20 PM', ''),
(166, 68, '2023-11-26 03:20 PM', ''),
(167, 67, '2023-11-26 03:22 PM', ''),
(168, 67, '2023-11-26 04:02 PM', ''),
(169, 67, '2023-11-27 01:20 PM', ''),
(170, 66, '2023-11-27 01:22 PM', ''),
(171, 67, '2023-11-27 07:59 PM', ''),
(172, 72, '2023-11-27 08:03 PM', ''),
(173, 66, '2023-11-27 08:03 PM', ''),
(174, 67, '2023-11-28 02:52 PM', ''),
(175, 73, '2023-11-28 03:08 PM', ''),
(176, 66, '2023-11-28 03:09 PM', ''),
(177, 67, '2023-11-28 03:12 PM', ''),
(178, 67, '2023-11-28 03:16 PM', ''),
(179, 67, '2023-11-28 03:24 PM', ''),
(180, 73, '2023-11-28 03:36 PM', ''),
(181, 67, '2023-11-28 03:38 PM', ''),
(182, 70, '2023-11-28 03:51 PM', ''),
(183, 68, '2023-11-28 03:53 PM', ''),
(184, 75, '2023-11-28 04:12 PM', ''),
(185, 66, '2023-11-29 12:05 AM', ''),
(186, 68, '2023-11-29 12:09 AM', ''),
(187, 66, '2023-11-29 12:12 AM', ''),
(188, 77, '2023-11-29 12:14 AM', ''),
(189, 68, '2023-11-29 01:08 AM', ''),
(190, 67, '2023-11-29 09:04 AM', ''),
(191, 71, '2023-11-29 09:08 AM', ''),
(192, 67, '2023-11-29 09:09 AM', ''),
(193, 67, '2023-11-29 09:27 AM', ''),
(194, 67, '2023-11-29 09:29 AM', ''),
(195, 72, '2023-11-29 09:54 AM', ''),
(196, 67, '2023-11-29 10:47 AM', ''),
(197, 67, '2023-11-29 11:27 AM', ''),
(198, 70, '2023-11-29 11:32 AM', ''),
(199, 67, '2023-11-29 11:35 AM', ''),
(200, 67, '2023-11-29 11:48 AM', ''),
(201, 67, '2023-11-29 11:56 AM', ''),
(202, 78, '2023-12-02 09:02 PM', ''),
(203, 67, '2023-12-02 09:02 PM', ''),
(204, 66, '2023-12-03 08:46 PM', ''),
(205, 66, '2023-12-03 08:49 PM', ''),
(206, 66, '2023-12-03 08:52 PM', ''),
(207, 75, '2023-12-03 08:56 PM', ''),
(208, 75, '2023-12-03 08:58 PM', ''),
(209, 75, '2023-12-03 08:59 PM', ''),
(210, 75, '2023-12-03 09:00 PM', ''),
(211, 75, '2023-12-03 09:02 PM', ''),
(212, 67, '2023-12-03 09:33 PM', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_Id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `middlename` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `suffix` varchar(50) NOT NULL,
  `dob` varchar(255) NOT NULL,
  `age` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `birthplace` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `civilstatus` varchar(50) NOT NULL,
  `occupation` varchar(50) NOT NULL,
  `religion` varchar(100) NOT NULL,
  `house_no` varchar(255) NOT NULL,
  `street_name` varchar(255) NOT NULL,
  `purok` varchar(255) NOT NULL,
  `zone` varchar(255) NOT NULL,
  `barangay` varchar(255) NOT NULL,
  `municipality` varchar(255) NOT NULL,
  `province` varchar(255) NOT NULL,
  `region` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `password` varchar(100) NOT NULL,
  `user_type` varchar(50) NOT NULL DEFAULT 'Admin',
  `college_name` varchar(20) NOT NULL,
  `verification_code` int(11) NOT NULL,
  `date_registered` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_Id`, `firstname`, `middlename`, `lastname`, `suffix`, `dob`, `age`, `email`, `contact`, `birthplace`, `gender`, `civilstatus`, `occupation`, `religion`, `house_no`, `street_name`, `purok`, `zone`, `barangay`, `municipality`, `province`, `region`, `image`, `password`, `user_type`, `college_name`, `verification_code`, `date_registered`) VALUES
(66, 'cAS', '', 'Admin', '', '2002-11-23', '21 years old', 'cas@gmail.com', '9384541086', 'san Marcelino,Zambales', 'Male', 'Single', 'Student', 'Iglesia Ni Cristo', 'no', 'no', 'no', 'no', 'no', 'no', 'Zambales', 'no', 'cas.png', '0192023a7bbd73250516f069df18b500', 'Admin', 'CAS', 285969, '2022-11-25'),
(67, 'Pinaka', '', 'Admin', 'Admin', '2002-03-23', '21 years old', 'superadmin@gmail.com', '9384541086', 'Sample', 'Male', 'Single', 'Sample', 'Iglesia Ni Cristo', 'Sample', 'SampleSample', 'Sample', 'Sample', 'Sample', 'Sample', 'Sample', 'Sample', 'PRMSU.png', '0192023a7bbd73250516f069df18b500', 'Superadmin', '', 187465, '0000-00-00'),
(68, 'CON', '', 'admin', '', '2002-03-23', '21 years old', 'con@gmail.com', '9384541086', 'Admin', 'Male', 'Single', 'Admin', 'Iglesia Ni Cristo', 'Admin', 'Admin', 'Admin', 'Admin', 'Admin', 'Admin', 'Admin', 'Admin', 'CON.png', '0192023a7bbd73250516f069df18b500', 'Admin', 'CON', 0, '0000-00-00'),
(69, 'COE', '', 'admin', '', '2002-03-23', '21 years old', 'coe@gmail.com', '9384541086', 'Coe', 'Male', 'Single', 'Student', 'Iglesia Ni Cristo', 'Coe', 'Coe', 'Coe', 'Coe', 'Coe', 'Coe', 'Coe', 'Coe', 'coe.png', '0192023a7bbd73250516f069df18b500', 'Admin', 'COE', 0, '0000-00-00'),
(70, 'CCIT', '', 'admin', '', '2002-03-23', '21 years old', 'ccit@gmail.com', '9384541086', 'CCIT', 'Male', 'Single', 'Student', 'Iglesia Ni Cristo', 'IBA', 'IBA', 'IBA', 'IBA', 'IBA', 'IBA', 'IBA', 'IBA', 'ccit.png', '0192023a7bbd73250516f069df18b500', 'Admin', 'CCIT', 0, '0000-00-00'),
(71, 'CIT', '', 'Admin', '', '2003-03-23', '20 years old', 'cit@gmail.com', '9384541086', 'IBA', 'Male', 'Single', 'Student', 'Iglesia Ni Cristo', 'IBA', 'IBA', 'IBA', 'IBA', 'IBA', 'IBA', 'IBA', 'IBA', 'cit.png', '0192023a7bbd73250516f069df18b500', 'Admin', 'CIT', 0, '2023-11-21'),
(72, 'Gate', '', 'Admin', '', '2002-03-23', '21 years old', 'gate@gmail.com', '9384541086', 'IBA', 'Male', 'Single', 'Gate', 'Iglesia Ni Cristo', 'Gate', 'Gate', 'Gate', 'Gate', 'Gate', 'Gate', 'Gate', 'Gate', 'PRMSU.png', '0192023a7bbd73250516f069df18b500', 'Admin', 'GATE', 0, '2023-11-27'),
(73, 'CTHM', '', 'Admin', '', '2002-03-23', '21 years old', 'cthm@gmail.com', '9384541086', 'San Marcelino', 'Non-Binary', 'Single', 'Student', 'Iglesia Ni Cristo', '', '', '', '', 'Consuelo Norte', 'San Marcelino', 'Zambales', 'III', 'CTHM.png', '0192023a7bbd73250516f069df18b500', 'Admin', 'CTHM', 0, '2023-11-28'),
(74, 'CTE', '', 'Admin', '', '2002-03-23', '21 years old', 'cte@gmail.com', '9384541086', 'IBA', 'Male', 'Single', 'Student', 'Iglesia Ni Cristo', 'IBA', 'IBA', 'IBA', 'IBA', 'IBA', 'IBA', 'IBA', 'IBA', 'CTE.png', '0192023a7bbd73250516f069df18b500', 'Admin', 'CTE', 0, '2023-11-28'),
(75, 'CABA', '', 'Admin', '', '2002-03-23', '21 years old', 'caba@gmail.com', '9384541086', 'IBA', 'Male', 'Single', 'Student', 'Iglesia Ni Cristo', 'IBA', 'IBA', 'IBA', '', 'IBA', 'IBA', 'IBA', 'IBA', 'CABA.png', '0192023a7bbd73250516f069df18b500', 'Admin', 'CABA', 0, '2023-11-28'),
(76, 'CAF', '', 'admin', '', '2002-03-23', '21 years old', 'caf@gmail.com', '9384541086', 'IBA', 'Male', 'Single', 'Student', 'Iglesia Ni Cristo', 'IBA', 'IBA', 'IBA', 'IBA', 'IBA', 'IBA', 'IBA', 'IBA', 'caf.png', '0192023a7bbd73250516f069df18b500', 'Admin', 'CAF', 0, '2023-11-28'),
(77, 'REGISTRAR', '', 'Admin', '', '2002-03-23', '21 years old', 'registrar@gmail.com', '9384541086', 'IBA', 'Male', 'Single', 'Student', 'Iglesia Ni Cristo', 'IBA', 'IBA', 'IBA', 'IBA', 'IBA', 'IBA', 'IBA', 'IBA', 'PRMSU.png', '0192023a7bbd73250516f069df18b500', 'Admin', 'REGISTRAR', 0, '2023-11-28'),
(78, 'ADMIN', '', 'Admin', '', '2002-03-23', '21 years old', 'admin@gmail.com', '9384541086', 'IBA', 'Male', 'Single', 'Student', 'Iglesia Ni Cristo', 'IBA', 'IBA', 'IBA', 'IBA', 'IBA', 'IBA', 'IBA', 'IBA', 'PRMSU.png', '0192023a7bbd73250516f069df18b500', 'Admin', 'ADMIN', 0, '2023-11-28');

-- --------------------------------------------------------

--
-- Table structure for table `visitors`
--

CREATE TABLE `visitors` (
  `Id` int(11) NOT NULL,
  `qr_id` varchar(255) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `middlename` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `age` int(11) NOT NULL,
  `address` text NOT NULL,
  `contact` varchar(100) NOT NULL,
  `id_type` varchar(100) NOT NULL,
  `other_id_type` varchar(100) NOT NULL,
  `id_number` varchar(100) NOT NULL,
  `purpose` varchar(255) NOT NULL,
  `other_purpose` varchar(255) NOT NULL,
  `qr_image` varchar(255) NOT NULL,
  `college_name` varchar(50) NOT NULL,
  `date_registered` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `visitors`
--

INSERT INTO `visitors` (`Id`, `qr_id`, `firstname`, `middlename`, `lastname`, `age`, `address`, `contact`, `id_type`, `other_id_type`, `id_number`, `purpose`, `other_purpose`, `qr_image`, `college_name`, `date_registered`) VALUES
(37, '655e1427308159.83965783', 'Erika', 'Lara', 'Pusing', 12, 'Bagumbayan Quezon City', '9256241582', 'Senior Citizen', '', '770657', 'Seminar', '', '655e1427308159.83965783.png', 'CCIT', '2023-11-22'),
(38, '655f42b27fd246.54242956', 'Ci', 'CiCi', 'Ci', 13, 'Ci', '9359428963', 'SSS', '', '343242', 'Process documents', '', '655f42b27fd246.54242956.png', 'N/A - Added by Superadmin', '2023-11-23'),
(39, '65621d9ac3e666.32374531', 'Norlyn', 'Son', 'Gelig', 20, 'Medellin', '9359428963', 'Postal ID', '', '13422', 'Seminar', '', '65621d9ac3e666.32374531.png', 'N/A-From Gen. Registration', '2023-11-26'),
(40, '65621f414633e6.08616073', 'Dsad', 'Adasdasd', 'Sadsada', 23, 'Sfdsfds', '9359428963', 'SSS', '', '4242342', 'Process documents', '', '65621f414633e6.08616073.png', 'N/A-From Gen. Registration', '2023-11-26'),
(41, '65658b8fc4a5a5.02289013', 'Jhorem', 'Ravelo', 'Salazar', 40, 'San Marcelino, Zambales', '9873578975', 'National ID', '', '678744', 'Seminar', '', '65658b8fc4a5a5.02289013.png', 'N/A-From Gen. Registration', '2023-11-28'),
(42, '65658c357995d7.10589604', 'Jhorem', 'Ravelo', 'Salazar', 40, 'San Marcelino, Zambales', '9879086783', 'National ID', '', '34567890', 'Seminar', '', '65658c357995d7.10589604.png', 'N/A-From Gen. Registration', '2023-11-28'),
(46, '65659276552ef8.60096658', 'Fdsf', 'Sfsd', 'Fsdfsdfd', 34, 'Fdgdfgd', '9359428963', 'PWD', '', '54353', 'Seminar', '', '65659276552ef8.60096658.png', 'N/A-From Gen. Registration', '2023-11-28'),
(47, '656592a9486487.66821264', 'Fdsfsdf', 'Sfsdfds', 'Fsd', 43, 'Fdsfsd', '9269228230', 'PWD', '', '432423', 'Process documents', '', '656592a9486487.66821264.png', 'N/A-From Gen. Registration', '2023-11-28'),
(48, '656594590fa4b6.98138726', 'Jae Lie', '', 'Oliva', 30, 'San Marcelino, Zambales', '9766875433', 'Passport', '', '90P6RGV23', 'Seminar', '', '656594590fa4b6.98138726.png', 'N/A-From Gen. Registration', '2023-11-28'),
(50, '65659560937ba1.72317347', 'Jae Lie', '', 'Oliva', 30, 'San Marcelino, Zambales', '9775653434', 'Passport', '', '34554PJ2', 'Seminar', '', '65659560937ba1.72317347.png', 'N/A-From Gen. Registration', '2023-11-28'),
(52, '6565999d471560.73692305', 'Janine', 'Na', 'Pregillano', 17, 'San Marcelino, Zambales', '9861456676', 'School ID', '', '1289754', 'Process documents', '', '6565999d471560.73692305.png', 'N/A-From Gen. Registration', '2023-11-28'),
(53, '656599eb86cf12.80584041', 'Janine', 'Na', 'Pregillano', 17, 'San Marcelino, Zambales', '9757654321', 'School ID', '', '234567', 'Seminar', '', '656599eb86cf12.80584041.png', 'N/A-From Gen. Registration', '2023-11-28'),
(54, '6565a27a0e6bf8.01507016', 'Eric', 'Madamba', 'Dumlao', 27, 'Consuelo Norte, San Marcelino, Zambales', '9722575895', 'UMID', '', '2345543', 'Process documents', '', '6565a27a0e6bf8.01507016.png', 'N/A-From Gen. Registration', '2023-11-28'),
(55, '6565a2f3856b63.75956809', 'Eric', 'Madamba', 'Dumlao', 27, 'Consuelo Norte, San Marcelino, Zambales', '9653555675', 'UMID', '', '76542454', 'Process documents', '', '6565a2f3856b63.75956809.png', 'N/A-From Gen. Registration', '2023-11-28'),
(56, '6565d39bd40192.17190364', 'Sadadasdas', 'Dasdas', 'Dasdasdasd', 32, 'Fsfsfs', '9359428963', 'SSS', '', '43242423', 'Process documents', '', '6565d39bd40192.17190364.png', 'N/A-From Gen. Registration', '2023-11-28'),
(57, '6565d3beac2a88.64781225', 'Dsadasd', 'Asdasda', 'Dasdas', 32, 'Dsadsadas', '9359428963', 'SSS', '', '43242', 'Process documents', '', '6565d3beac2a88.64781225.png', 'N/A-From Gen. Registration', '2023-11-28'),
(58, '6565fe82cbf956.23203394', 'Charizza', 'Bueno', 'Mangawang', 21, 'San Antonio, Zambales', '9620817235', 'National ID', '', '20-02679', 'Process documents', '', '6565fe82cbf956.23203394.png', 'N/A-From Gen. Registration', '2023-11-28'),
(59, '65668b82cb08b7.04191085', 'Tricia', 'Na', 'Invento', 23, 'Purok4. Consuelo Norte,San Marcelino Zambales', '9150974499', 'School ID', '', '4352113', 'Faculty meeting', '', '65668b82cb08b7.04191085.png', 'N/A-From Gen. Registration', '2023-11-29'),
(60, '65668bccc11e76.14389975', 'Tricia', 'Na', 'Invento', 23, 'Purok4. Consuelo Norte,San Marcelino Zambales', '9078684543', 'School ID', '', '0123456700', 'Seminar', '', '65668bccc11e76.14389975.png', 'N/A-From Gen. Registration', '2023-11-29'),
(61, '6566add66f5ad5.05947518', 'Eden', 'Na', 'Dumlao', 18, 'Iba,Zambales', '9123456789', 'School ID', '', '12313', 'Seminar', '', '6566add66f5ad5.05947518.png', 'N/A-From Gen. Registration', '2023-11-29'),
(62, '6566b5cc406b76.56452384', 'Joseph', 'Serondo', 'Cortez', 26, '<maruqee><h!></marquee>', '9565339716', 'School ID', '', '2221063', 'Seminar', '', '6566b5cc406b76.56452384.png', 'N/A-From Gen. Registration', '2023-11-29'),
(63, '6566b6332d7482.38625730', 'Jose', 'S', 'Zetroc', 27, '<marquee><h1>utotmo</h1</marquee>', '9565339716', 'School ID', '', '2221063', 'Others', '<Marquee><H1>bayad Utang</H1</Marquee>', '6566b6332d7482.38625730.png', 'N/A-From Gen. Registration', '2023-11-29'),
(64, '6566b7931df587.81414523', 'Majoy', 'B', 'Tapad', 19, 'Masinloc', '9123456781', 'School ID', '', 'abc12345678', 'Faculty meeting', '', '6566b7931df587.81414523.png', 'N/A-From Gen. Registration', '2023-11-29'),
(65, '6566b8147832b1.47468231', 'Jayjay', 'Mmm', 'Joyhoy', 122, 'Sdfghj', '9812345678', 'National ID', '', '12345678', 'Process documents', '', '6566b8147832b1.47468231.png', 'N/A-From Gen. Registration', '2023-11-29'),
(66, '656c5dc41eb208.64292550', 'Dsada', 'Sdasdsa', 'Dasdas', 34, 'Dsfsdfsd', '9269228230', 'Passport', '', '53543', 'Faculty meeting', '', '656c5dc41eb208.64292550.png', 'N/A-From Gen. Registration', '2023-12-03'),
(67, '656c5e45998d86.59204475', 'Dsad', 'Adadas', 'Dasd', 234, 'Fdsfsfs', '9269228230', 'SSS', '', '54353', 'Seminar', '', '656c5e45998d86.59204475.png', 'N/A-From Gen. Registration', '2023-12-03'),
(68, '656c5e7f377c42.20139691', 'Fsd', 'Fsdfds', 'Fsdfs', 43, 'Fdsfsd', '9269228230', 'PWD', '', '32432', 'Process documents', '', '656c5e7f377c42.20139691.png', 'N/A-From Gen. Registration', '2023-12-03'),
(69, '656c5ea171add6.86507824', 'Fdsf', 'Sdfsdf', 'Sdf', 43, 'Sdfdsf', '9269228230', 'PWD', '', 'fr2rwfes', 'Process documents', '', '656c5ea171add6.86507824.png', 'N/A-From Gen. Registration', '2023-12-03'),
(70, '656c5ec9b07708.13404966', 'Fdsf', 'Dsfsdf', 'Sdfsdfs', 34, 'Fdsfsdf', '9269228230', 'PWD', '', 'fdsfsdfsd', 'Process documents', '', '656c5ec9b07708.13404966.png', 'N/A-From Gen. Registration', '2023-12-03'),
(71, '656c5f49a2e037.15858586', 'Fds', 'Fsfsf', 'Sdbvbvcb', 34, 'Svcxvxc', '9269228230', 'SSS', '', 'vc4r3rfd', 'Process documents', '', '656c5f49a2e037.15858586.png', 'N/A-From Gen. Registration', '2023-12-03'),
(72, '656c648e7d5fd5.61475220', 'Dsad', 'Sadasd', 'Asdasd', 43, 'Cdsdsf', '9359428963', 'National ID', '', 'fdsfs', 'Seminar', '', '656c648e7d5fd5.61475220.png', 'N/A-From Gen. Registration', '2023-12-03'),
(73, '656c6bed67d8f7.73780361', 'Fdsf', 'Dsfsdf', 'Sdfsd', 43, 'Fdsfsd', '9359428963', 'PWD', '', '54543', 'Process documents', '', '656c6bed67d8f7.73780361.png', 'N/A-From Gen. Registration', '2023-12-03'),
(74, '656c74f8764c32.71203151', 'Dsadad', 'Dsadas', 'Dsada', 43, 'Dsfsdf', '9359428963', 'PWD', '', '432543533344', 'Process documents', '', '656c74f8764c32.71203151.png', 'N/A-From Gen. Registration', '2023-12-03');

-- --------------------------------------------------------

--
-- Table structure for table `visitors_log_history`
--

CREATE TABLE `visitors_log_history` (
  `log_Id` int(11) NOT NULL,
  `Id` int(11) NOT NULL,
  `login_time` varchar(100) NOT NULL,
  `login_college_name` varchar(100) NOT NULL,
  `logout_time` varchar(100) NOT NULL,
  `logout_college_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `visitors_log_history`
--

INSERT INTO `visitors_log_history` (`log_Id`, `Id`, `login_time`, `login_college_name`, `logout_time`, `logout_college_name`) VALUES
(121, 38, '2023-12-03 22:39:54', 'GATE', '', ''),
(122, 38, '2023-12-03 22:42:38', 'CON', '2023-12-03 22:42:51', 'GATE');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `announcement`
--
ALTER TABLE `announcement`
  ADD PRIMARY KEY (`actId`);

--
-- Indexes for table `log_history`
--
ALTER TABLE `log_history`
  ADD PRIMARY KEY (`log_Id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_Id`);

--
-- Indexes for table `visitors`
--
ALTER TABLE `visitors`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `visitors_log_history`
--
ALTER TABLE `visitors_log_history`
  ADD PRIMARY KEY (`log_Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `announcement`
--
ALTER TABLE `announcement`
  MODIFY `actId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `log_history`
--
ALTER TABLE `log_history`
  MODIFY `log_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=213;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `visitors`
--
ALTER TABLE `visitors`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `visitors_log_history`
--
ALTER TABLE `visitors_log_history`
  MODIFY `log_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
