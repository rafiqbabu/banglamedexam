-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 20, 2017 at 10:17 AM
-- Server version: 5.7.20-0ubuntu0.16.04.1
-- PHP Version: 5.6.32-1+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bigm_genesis_online_exam`
--

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `DISTRICT_ID` varchar(4) DEFAULT NULL,
  `DIVISION_ID` varchar(2) DEFAULT NULL,
  `DISTRICT_CODE` varchar(2) DEFAULT NULL,
  `DISTRICT_NAME` varchar(100) DEFAULT NULL,
  `BOARD` varchar(40) DEFAULT NULL,
  `BOARD_CODE` varchar(2) DEFAULT NULL,
  `MAD_BOARD_CODE` varchar(2) DEFAULT NULL,
  `ENTERED_BY` varchar(10) DEFAULT NULL,
  `ENTRY_TIMESTAMP` datetime DEFAULT NULL,
  `LAST_UPDATED_BY` varchar(10) DEFAULT NULL,
  `LAST_UPDATED_TIMESTAMP` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`DISTRICT_ID`, `DIVISION_ID`, `DISTRICT_CODE`, `DISTRICT_NAME`, `BOARD`, `BOARD_CODE`, `MAD_BOARD_CODE`, `ENTERED_BY`, `ENTRY_TIMESTAMP`, `LAST_UPDATED_BY`, `LAST_UPDATED_TIMESTAMP`) VALUES
('0401', '04', '01', 'BAGERHAT', 'JESSORE', '3', '7', NULL, NULL, NULL, NULL),
('0203', '02', '03', 'BANDARBAN', 'CHITTAGONG', '4', '7', NULL, NULL, NULL, NULL),
('0104', '01', '04', 'BARGUNA', 'BARISAL', '5', '7', NULL, NULL, NULL, NULL),
('0106', '01', '06', 'BARISAL', 'BARISAL', '5', '7', NULL, NULL, NULL, NULL),
('0109', '01', '09', 'BHOLA', 'BARISAL', '5', '7', NULL, NULL, NULL, NULL),
('0510', '05', '10', 'BOGRA', 'RAJSHAHI', '2', '7', NULL, NULL, NULL, NULL),
('0212', '02', '12', 'BRAHAMANBARIA', 'COMILLA', '1', '7', NULL, NULL, NULL, NULL),
('0213', '02', '13', 'CHANDPUR', 'COMILLA', '1', '7', NULL, NULL, NULL, NULL),
('0215', '02', '15', 'CHITTAGONG                ', 'CHITTAGONG', '4', '7', NULL, NULL, NULL, NULL),
('0418', '04', '18', 'CHUADANGA', 'JESSORE', '3', '7', NULL, NULL, NULL, NULL),
('0219', '02', '19', 'COMILLA', 'COMILLA', '1', '7', NULL, NULL, NULL, NULL),
('0222', '02', '22', 'COX\'S BAZAR', 'CHITTAGONG', '4', '7', NULL, NULL, NULL, NULL),
('0326', '03', '26', 'DHAKA', 'DHAKA', '0', '7', NULL, NULL, NULL, NULL),
('0527', '07', '27', 'DINAJPUR', 'DINAJPUR', '8', '7', NULL, NULL, NULL, NULL),
('0329', '03', '29', 'FARIDPUR', 'DHAKA', '0', '7', NULL, NULL, NULL, NULL),
('0230', '02', '30', 'FENI', 'COMILLA', '1', '7', NULL, NULL, NULL, NULL),
('0532', '07', '32', 'GAIBANDHA', 'DINAJPUR', '8', '7', NULL, NULL, NULL, NULL),
('0333', '03', '33', 'GAZIPUR', 'DHAKA', '0', '7', NULL, NULL, NULL, NULL),
('0335', '03', '35', 'GOPALGANJ', 'DHAKA', '0', '7', NULL, NULL, NULL, NULL),
('0636', '06', '36', 'HABIGANJ', 'SYLHET', '6', '7', NULL, NULL, NULL, NULL),
('0538', '05', '38', 'JOYPURHAT', 'RAJSHAHI', '2', '7', NULL, NULL, NULL, NULL),
('0339', '03', '39', 'JAMALPUR', 'DHAKA', '0', '7', NULL, NULL, NULL, NULL),
('0441', '04', '41', 'JESSORE', 'JESSORE', '3', '7', NULL, NULL, NULL, NULL),
('0142', '01', '42', 'JHALOKATI', 'BARISAL', '5', '7', NULL, NULL, NULL, NULL),
('0444', '04', '44', 'JHENAIDAH', 'JESSORE', '3', '7', NULL, NULL, NULL, NULL),
('0246', '02', '46', 'KHAGRACHHARI', 'CHITTAGONG', '4', '7', NULL, NULL, NULL, NULL),
('0447', '04', '47', 'KHULNA', 'JESSORE', '3', '7', NULL, NULL, NULL, NULL),
('0348', '03', '48', 'KISHOREGANJ', 'DHAKA', '0', '7', NULL, NULL, NULL, NULL),
('0549', '07', '49', 'KURIGRAM', 'DINAJPUR', '8', '7', NULL, NULL, NULL, NULL),
('0450', '04', '50', 'KUSHTIA', 'JESSORE', '3', '7', NULL, NULL, NULL, NULL),
('0251', '02', '51', 'LAKSHMIPUR', 'COMILLA', '1', '7', NULL, NULL, NULL, NULL),
('0552', '07', '52', 'LALMONIRHAT', 'DINAJPUR', '8', '7', NULL, NULL, NULL, NULL),
('0354', '03', '54', 'MADARIPUR', 'DHAKA', '0', '7', NULL, NULL, NULL, NULL),
('0455', '04', '55', 'MAGURA', 'JESSORE', '3', '7', NULL, NULL, NULL, NULL),
('0356', '03', '56', 'MANIKGANJ', 'DHAKA', '0', '7', NULL, NULL, NULL, NULL),
('0457', '04', '57', 'MEHERPUR', 'JESSORE', '3', '7', NULL, NULL, NULL, NULL),
('0658', '06', '58', 'MAULVIBAZAR', 'SYLHET', '6', '7', NULL, NULL, NULL, NULL),
('0359', '03', '59', 'MUNSHIGANJ', 'DHAKA', '0', '7', NULL, NULL, NULL, NULL),
('0361', '03', '61', 'MYMENSINGH', 'DHAKA', '0', '7', NULL, NULL, NULL, NULL),
('0564', '05', '64', 'NAOGAON', 'RAJSHAHI', '2', '7', NULL, NULL, NULL, NULL),
('0465', '04', '65', 'NORAIL', 'JESSORE', '3', '7', NULL, NULL, NULL, NULL),
('0367', '03', '67', 'NARAYANGANJ', 'DHAKA', '0', '7', NULL, NULL, NULL, NULL),
('0368', '03', '68', 'NARSINGDI', 'DHAKA', '0', '7', NULL, NULL, NULL, NULL),
('0569', '05', '69', 'NATORE', 'RAJSHAHI', '2', '7', NULL, NULL, NULL, NULL),
('0570', '05', '70', 'NAWABGANJ', 'RAJSHAHI', '2', '7', NULL, NULL, NULL, NULL),
('0372', '03', '72', 'NETRAKONA', 'DHAKA', '0', '7', NULL, NULL, NULL, NULL),
('0573', '07', '73', 'NILPHAMARI', 'DINAJPUR', '8', '7', NULL, NULL, NULL, NULL),
('0275', '02', '75', 'NOAKHALI', 'COMILLA', '1', '7', NULL, NULL, NULL, NULL),
('0576', '05', '76', 'PABNA', 'RAJSHAHI', '2', '7', NULL, NULL, NULL, NULL),
('0577', '07', '77', 'PANCHAGARH', 'DINAJPUR', '8', '7', NULL, NULL, NULL, NULL),
('0178', '01', '78', 'PATUAKHALI', 'BARISAL', '5', '7', NULL, NULL, NULL, NULL),
('0179', '01', '79', 'PIROJPUR', 'BARISAL', '5', '7', NULL, NULL, NULL, NULL),
('0581', '05', '81', 'RAJSHAHI', 'RAJSHAHI', '2', '7', NULL, NULL, NULL, NULL),
('0382', '03', '82', 'RAJBARI', 'DHAKA', '0', '7', NULL, NULL, NULL, NULL),
('0284', '02', '84', 'RANGAMATI', 'CHITTAGONG', '4', '7', NULL, NULL, NULL, NULL),
('0585', '07', '85', 'RANGPUR', 'DINAJPUR', '8', '7', NULL, NULL, NULL, NULL),
('0386', '03', '86', 'SHARIATPUR', 'DHAKA', '0', '7', NULL, NULL, NULL, NULL),
('0487', '04', '87', 'SATKHIRA', 'JESSORE', '3', '7', NULL, NULL, NULL, NULL),
('0588', '05', '88', 'SIRAJGANJ', 'RAJSHAHI', '2', '7', NULL, NULL, NULL, NULL),
('0389', '03', '89', 'SHERPUR', 'DHAKA', '0', '7', NULL, NULL, NULL, NULL),
('0690', '06', '90', 'SUNAMGANJ', 'SYLHET', '6', '7', NULL, NULL, NULL, NULL),
('0691', '06', '91', 'SYLHET', 'SYLHET', '6', '7', NULL, NULL, NULL, NULL),
('0393', '03', '93', 'TANGAIL', 'DHAKA', '0', '7', NULL, NULL, NULL, NULL),
('0594', '07', '94', 'THAKURGAON', 'DINAJPUR', '8', '7', NULL, NULL, NULL, NULL),
('9994', '99', '94', 'UNITED ARAB EMIRATES', 'DHAKA', '0', '7', NULL, NULL, NULL, NULL),
('9995', '99', '95', 'QATAR', 'DHAKA', '0', '7', NULL, NULL, NULL, NULL),
('9996', '99', '96', 'SAUDI ARABIA', 'DHAKA', '0', '7', NULL, NULL, NULL, NULL),
('9997', '99', '97', 'BAHRAIN', 'DHAKA', '0', '7', NULL, NULL, NULL, NULL),
('9998', '99', '98', 'LIBYA', 'DHAKA', '0', '7', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `divisions`
--

CREATE TABLE `divisions` (
  `DIVISION_ID` varchar(2) DEFAULT NULL,
  `DIVISION_CODE` varchar(2) DEFAULT NULL,
  `DIVISION_NAME` varchar(50) DEFAULT NULL,
  `ENTERED_BY` varchar(10) DEFAULT NULL,
  `ENTRY_TIMESTAMP` datetime DEFAULT NULL,
  `LAST_UPDATED_BY` varchar(10) DEFAULT NULL,
  `LAST_UPDATED_TIMESTAMP` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `divisions`
--

INSERT INTO `divisions` (`DIVISION_ID`, `DIVISION_CODE`, `DIVISION_NAME`, `ENTERED_BY`, `ENTRY_TIMESTAMP`, `LAST_UPDATED_BY`, `LAST_UPDATED_TIMESTAMP`) VALUES
('01', '01', 'BARISAL', NULL, NULL, NULL, NULL),
('02', '02', 'CHITTAGONG', NULL, NULL, NULL, NULL),
('03', '03', 'DHAKA', NULL, NULL, NULL, NULL),
('04', '04', 'KHULNA', NULL, NULL, NULL, NULL),
('05', '05', 'RAJSHAHI', NULL, NULL, NULL, NULL),
('06', '06', 'SYLHET', NULL, NULL, NULL, NULL),
('07', '07', 'RANGPUR', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE `notice` (
  `id` int(11) NOT NULL,
  `sent_to` varchar(1) NOT NULL COMMENT 'T=Teacher,S=Student,P=Parent',
  `ref_id` varchar(20) DEFAULT NULL,
  `type` varchar(1) NOT NULL COMMENT 'I=Individual, A=All',
  `subject` text NOT NULL,
  `notice` text,
  `attachment` text,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `oe_chapter`
--

CREATE TABLE `oe_chapter` (
  `id` int(11) NOT NULL,
  `chapter_name` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` varchar(30) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_by` varchar(30) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `oe_chapter`
--

INSERT INTO `oe_chapter` (`id`, `chapter_name`, `created_at`, `created_by`, `updated_at`, `updated_by`, `status`) VALUES
(1, 'chapter5', '2017-10-16 11:18:42', '', '0000-00-00 00:00:00', '', '1'),
(2, 'chapter4', '2017-10-16 11:18:35', '', '0000-00-00 00:00:00', '', '1'),
(3, 'chapter3', '2017-10-16 11:18:28', '', '0000-00-00 00:00:00', '', '1'),
(4, 'chapter1', '2017-10-16 11:18:11', 'admin@bigm-bd.com', '0000-00-00 00:00:00', 'admin@bigm-bd.com', '1'),
(5, 'chapter6', '2017-10-16 11:18:48', 'admin@bigm-bd.com', '0000-00-00 00:00:00', '', '1'),
(6, 'chapter2', '2017-10-16 11:18:21', 'admin@bigm-bd.com', '0000-00-00 00:00:00', '', '1');

-- --------------------------------------------------------

--
-- Table structure for table `oe_doc_address`
--

CREATE TABLE `oe_doc_address` (
  `id` int(11) NOT NULL,
  `doc_id` int(11) NOT NULL,
  `type` tinyint(4) NOT NULL DEFAULT '1',
  `division` varchar(2) DEFAULT NULL,
  `district` varchar(4) DEFAULT NULL,
  `thana` varchar(6) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(100) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(100) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `oe_doc_address`
--

INSERT INTO `oe_doc_address` (`id`, `doc_id`, `type`, `division`, `district`, `thana`, `address`, `created_at`, `created_by`, `updated_at`, `updated_by`, `status`) VALUES
(67, 8, 1, '03', '0326', '032648', '680/3 East Monipur', '2017-11-19 06:07:15', NULL, NULL, NULL, 1),
(68, 8, 2, '05', '0576', '057639', 'Rahimpur', '2017-11-19 06:07:15', NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `oe_doc_educations`
--

CREATE TABLE `oe_doc_educations` (
  `id` int(11) NOT NULL,
  `doc_id` int(11) NOT NULL,
  `exam` varchar(50) DEFAULT NULL,
  `year` varchar(4) DEFAULT NULL,
  `group` int(11) DEFAULT NULL,
  `board` int(11) DEFAULT NULL,
  `institute` varchar(255) DEFAULT NULL,
  `result` varchar(30) DEFAULT NULL,
  `result_type` int(11) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `oe_doc_educations`
--

INSERT INTO `oe_doc_educations` (`id`, `doc_id`, `exam`, `year`, `group`, `board`, `institute`, `result`, `result_type`, `status`) VALUES
(121, 8, 'S.S.C', '2004', 1, 2, 'S. M. High School', '4.31', NULL, 1),
(122, 8, 'H.S.C', '2006', 1, 2, 'Ishwardi Govt. College', '3.40', NULL, 1),
(123, 8, 'MBBS', '2011', NULL, NULL, '1', '3.2', NULL, 1),
(124, 8, 'FCPS-PI', '2013', NULL, NULL, '1', '3.12', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `oe_doc_master`
--

CREATE TABLE `oe_doc_master` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `bmdc_no` varchar(20) NOT NULL,
  `reg_no` varchar(20) NOT NULL,
  `father_name` varchar(100) DEFAULT NULL,
  `mother_name` varchar(100) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `blood_group` varchar(4) DEFAULT NULL,
  `dob` date DEFAULT NULL COMMENT 'Date of Birth',
  `gender` varchar(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(100) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `signature` text,
  `contact_person_phone` varchar(20) DEFAULT NULL,
  `contact_person_name` varchar(100) DEFAULT NULL,
  `fb_id` varchar(255) DEFAULT NULL,
  `job_desc` text,
  `passport_no` varchar(20) DEFAULT NULL,
  `nid` varchar(20) DEFAULT NULL,
  `medical_college` int(11) DEFAULT NULL,
  `forgot_token` varchar(100) DEFAULT NULL,
  `forgot_validity` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `oe_doc_master`
--

INSERT INTO `oe_doc_master` (`id`, `username`, `password`, `name`, `email`, `phone`, `bmdc_no`, `reg_no`, `father_name`, `mother_name`, `photo`, `blood_group`, `dob`, `gender`, `created_at`, `created_by`, `updated_at`, `updated_by`, `status`, `signature`, `contact_person_phone`, `contact_person_name`, `fb_id`, `job_desc`, `passport_no`, `nid`, `medical_college`, `forgot_token`, `forgot_validity`) VALUES
(1, 'cuvaredu@gmail.com', '$2y$10$R9jjO.K1zHyigEnIUAI98.BBMqdD6vobCQ7YJGCdiD7UWB0nmQTqK', 'Gemma Avila', 'cuvaredu@gmail.com', '21611243257', 'Id in culpa voluptas', 'GEN170001', NULL, NULL, NULL, NULL, NULL, '', '2017-11-14 09:28:54', '', '0000-00-00 00:00:00', '', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'patam@hotmail.com', '$2y$10$ilS1nIuSHF4Jkk9WFx8cX.y9VB/AMfzVJQ70S9NW68byJ9KST4wNm', 'Melodie Rutledge', 'patam@hotmail.com', '74374701122', 'ASD112210', 'GEN170002', NULL, NULL, NULL, NULL, NULL, '', '2017-11-14 09:30:10', '', '0000-00-00 00:00:00', '', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'pawyzoz@hotmail.com', '$2y$10$iKCmYo2fpmWhkK1eNgQw9.M6clM/6k.J7ttu4YBHzNPSSFlCps2Jm', 'Yuri Finley', 'pawyzoz@hotmail.com', '60131253221', 'sasfas112', 'GEN170003', NULL, NULL, NULL, NULL, NULL, '', '2017-11-14 09:31:39', '', '0000-00-00 00:00:00', '', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'vujob@yahoo.com', '$2y$10$GZPpqT4PWdGRaZvB9iRijO2Roz6zxWZCuRMjGKB2zgi6u0HhYiIJC', 'Ronan Potts', 'vujob@yahoo.com', '76693007775', 'Impedit consequatur ', 'GEN170004', NULL, NULL, NULL, NULL, NULL, '', '2017-11-14 09:35:18', '', '0000-00-00 00:00:00', '', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'poto@yahoo.com', '$2y$10$iMQM.jSvvTTLifY2fHH2P.FsdZgVO.j3xLk6ZYBypJBbx1Rxzoa/K', 'Garrison Holmes', 'poto@yahoo.com', '76864319119', 'JKSB11211', 'GEN170005', NULL, NULL, NULL, NULL, NULL, '', '2017-11-14 09:47:08', '', '0000-00-00 00:00:00', '', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 'qejuc@yahoo.com', '$2y$10$Kq7gh/Fh1xhA7i2cQju74emgd0n8ZJgYuFsPO/5NFcCdBHlBGXsrG', 'Oren Parrish', 'qejuc@yahoo.com', '83501522965', 'sagas412421', 'GEN170006', NULL, NULL, NULL, NULL, NULL, '', '2017-11-14 09:48:56', '', '0000-00-00 00:00:00', '', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 'razuk@hotmail.com', '$2y$10$lATHhq9zft1yntFSg1JnbOioiouC9cEf7.9ymHLhKubJzoA4b2tIG', 'Felicia Cunningham', 'razuk@hotmail.com', '14153613125', 'Repellendus Nemo sed', 'GEN170007', NULL, NULL, NULL, NULL, NULL, '', '2017-11-14 09:50:48', '', '0000-00-00 00:00:00', '', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 'nahian.bigm@gmail.com', '$2y$10$PNGpRMqQ213XaPj3/aTfWuL2GKb/t2WTXp1eN5zwijLO91H2XVyHW', 'Julkar Naen Nahian', 'nahian.bigm@gmail.com', '01977036048', '', 'GEN170008', 'Sultan Mehdi', 'Monowara Mehdi', 'upload/users/18e27a267abd0e0864865514271b70a8.png', 'B+', '2017-11-14', '1', '2017-11-14 10:42:26', '', '0000-00-00 00:00:00', '', 1, NULL, NULL, NULL, NULL, 'Sr. Software Engineer', '', '214124124124', 3, NULL, NULL),
(9, 'nesine@hotmail.com', '$2y$10$c1jFdfPMnyUzZ614aly79eFSSPomk/d6jazHFXb9OJ7MKFLEtzOpO', 'Jaden Marshall', 'nesine@hotmail.com', '13213213213', 'Dolor121', 'GEN170009', NULL, NULL, NULL, NULL, NULL, '', '2017-11-15 11:04:00', '', NULL, '', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `oe_doc_referance`
--

CREATE TABLE `oe_doc_referance` (
  `id` int(11) NOT NULL,
  `doc_id` int(11) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `designation` varchar(50) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `relation` varchar(50) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `oe_doc_referance`
--

INSERT INTO `oe_doc_referance` (`id`, `doc_id`, `name`, `designation`, `phone`, `relation`, `status`) VALUES
(46, 8, 'Nazmul Hasan', 'Software Emgineer', '31221321321', 'Friend', 1),
(47, 8, 'Tasfir Suman', 'Software Engineer', '31321321321', 'Friend', 1),
(48, 8, '', '', '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `oe_exam`
--

CREATE TABLE `oe_exam` (
  `id` int(12) NOT NULL,
  `exam_name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `institute_id` int(2) NOT NULL,
  `course_id` int(12) NOT NULL,
  `faculty_id` int(12) NOT NULL,
  `subject_id` int(12) NOT NULL,
  `exam_id` int(2) NOT NULL,
  `free_exam` int(1) DEFAULT NULL,
  `mcq_total` int(6) NOT NULL,
  `mcq_value` float NOT NULL,
  `sba_total` int(6) NOT NULL,
  `sba_value` float NOT NULL,
  `negative_mark` float NOT NULL,
  `total_mark` int(6) NOT NULL,
  `time` varchar(22) NOT NULL,
  `exam_cost` float DEFAULT NULL,
  `exam_detail` text CHARACTER SET utf8,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` varchar(60) CHARACTER SET utf8 DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(35) CHARACTER SET utf8 DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `oe_exam`
--

INSERT INTO `oe_exam` (`id`, `exam_name`, `institute_id`, `course_id`, `faculty_id`, `subject_id`, `exam_id`, `free_exam`, `mcq_total`, `mcq_value`, `sba_total`, `sba_value`, `negative_mark`, `total_mark`, `time`, `exam_cost`, `exam_detail`, `created_at`, `created_by`, `updated_at`, `updated_by`, `status`) VALUES
(1, 'Test Exam', 4, 27, 31, 33, 1, 0, 20, 1, 20, 2, 0.5, 40, '30', 1200, 'Truncates a string to the number of characters specified. It maintains the integrity of words so the character count may be slightly more or less than what you specify.', '2017-11-20 09:21:20', NULL, NULL, NULL, 1),
(2, 'Joy Holloway', 4, 27, 31, 33, 1, 1, 20, 1, 10, 2, 0.5, 40, '60', 1500, 'Laboriosam elit consectetur itaque qui dolor', '2017-11-20 09:21:20', NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `oe_exam_question`
--

CREATE TABLE `oe_exam_question` (
  `id` int(11) NOT NULL,
  `exam_ref_id` int(11) NOT NULL,
  `question_type_id` int(11) NOT NULL COMMENT '1->SBA, 2 -> MCQ',
  `question_id` int(11) NOT NULL,
  `chapter_id` int(4) DEFAULT NULL,
  `topic_id` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `oe_exam_question`
--

INSERT INTO `oe_exam_question` (`id`, `exam_ref_id`, `question_type_id`, `question_id`, `chapter_id`, `topic_id`) VALUES
(1, 70, 2, 21, 1, 5),
(2, 70, 2, 5, 1, 2),
(3, 70, 2, 21, 2, 7),
(4, 71, 2, 21, 1, 5),
(5, 72, 2, 21, 1, 5),
(6, 72, 1, 33, 1, 5),
(7, 72, 1, 32, 1, 5),
(8, 72, 1, 31, 2, 7),
(9, 72, 1, 30, 6, 52),
(10, 73, 2, 5, 1, 2),
(11, 73, 2, 21, 6, 52),
(12, 73, 2, 11, 3, 13),
(13, 73, 2, 4, 3, 13),
(14, 73, 1, 3, 2, 7),
(15, 73, 1, 25, 2, 7),
(16, 73, 1, 34, 1, 3),
(17, 74, 2, 4, 3, 13),
(18, 74, 2, 11, 3, 13),
(19, 74, 2, 21, 6, 52),
(20, 74, 2, 21, 2, 7),
(21, 74, 2, 5, 2, 7),
(22, 74, 1, 16, 1, 5),
(23, 74, 1, 25, 1, 5),
(24, 1, 2, 21, 1, 5),
(25, 1, 2, 14, 1, 4),
(26, 1, 2, 21, 1, 4),
(27, 1, 2, 5, 1, 2),
(28, 1, 2, 5, 2, 7),
(29, 1, 2, 21, 2, 7),
(30, 1, 2, 21, 2, 11),
(31, 1, 2, 21, 2, 9),
(32, 1, 1, 15, 1, 5),
(33, 1, 1, 16, 1, 5),
(34, 1, 1, 25, 1, 5),
(35, 1, 1, 26, 1, 5),
(36, 1, 1, 30, 1, 5),
(37, 1, 1, 31, 1, 5),
(38, 1, 1, 32, 1, 5),
(39, 1, 1, 33, 1, 5),
(40, 1, 1, 1, 1, 3),
(41, 1, 1, 3, 1, 3),
(42, 1, 1, 34, 1, 3),
(43, 2, 2, 21, 1, 5),
(44, 2, 2, 5, 1, 2),
(45, 2, 2, 5, 2, 7),
(46, 2, 2, 21, 2, 7);

-- --------------------------------------------------------

--
-- Table structure for table `oe_medical_college`
--

CREATE TABLE `oe_medical_college` (
  `id` int(11) NOT NULL,
  `name` varchar(80) NOT NULL,
  `type` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` varchar(90) CHARACTER SET utf8 NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(80) CHARACTER SET utf8 NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `oe_medical_college`
--

INSERT INTO `oe_medical_college` (`id`, `name`, `type`, `created_at`, `created_by`, `updated_at`, `updated_by`, `status`) VALUES
(1, 'Rajshahi Medical College', 'Govt', '2017-09-14 13:19:33', 'admin@bigm-bd.com', NULL, 'admin@bigm-bd.com', 1),
(2, 'Rangpur Medical College', 'Govt', '2017-09-14 13:19:14', 'admin@bigm-bd.com', NULL, 'admin@bigm-bd.com', 1),
(3, 'Dhaka Medical College', 'Govt', '2017-05-31 09:47:36', 'admin@bigm-bd.com', NULL, '', 1),
(4, 'Mymensing Medical College, Mymensingh', 'Govt', '2017-06-09 03:42:11', 'admin@bigm-bd.com', NULL, '', 1),
(5, 'Chittagong Medical College, Chittagong', 'Govt', '2017-06-09 03:42:26', 'admin@bigm-bd.com', NULL, '', 1),
(6, 'M. A. G. Osmani Medical College, Sylhet', 'Govt', '2017-06-09 03:42:38', 'admin@bigm-bd.com', NULL, '', 1),
(7, 'Sher-e-Bengla Medical College, Barisal', 'Govt', '2017-06-09 03:43:14', 'admin@bigm-bd.com', NULL, '', 1),
(8, 'Sir Salimullah Medical College, Dhaka', 'Govt', '2017-06-09 03:43:27', 'admin@bigm-bd.com', NULL, '', 1),
(9, 'Comilla Medical College, Comilla', 'Govt', '2017-06-09 03:43:38', 'admin@bigm-bd.com', NULL, '', 1),
(10, 'Khulna Medical College, Khulna', 'Govt', '2017-06-09 03:43:47', 'admin@bigm-bd.com', NULL, '', 1),
(11, 'Shaheed Ziaur Rahman Medical College, Bogra', 'Govt', '2017-06-09 03:44:00', 'admin@bigm-bd.com', NULL, '', 1),
(12, 'Faridpur Medical College, Faridpur', 'Govt', '2017-06-09 03:44:09', 'admin@bigm-bd.com', NULL, '', 1),
(13, 'Dinajpur Medical College, Dinajpur', 'Govt', '2017-06-09 03:44:20', 'admin@bigm-bd.com', NULL, '', 1),
(14, 'Shaheed Sohrawardy Medical College, Dhaka', 'Govt', '2017-06-09 03:44:33', 'admin@bigm-bd.com', NULL, '', 1),
(15, 'Pabna Medical College, Pabna', 'Govt', '2017-06-09 03:44:44', 'admin@bigm-bd.com', NULL, '', 1),
(16, 'Noakhali Medical College, Noakhali', 'Govt', '2017-06-09 03:44:53', 'admin@bigm-bd.com', NULL, '', 1),
(17, 'Cox\'s Bazar Medical College, Cox\'s Bazar', 'Govt', '2017-06-09 03:45:05', 'admin@bigm-bd.com', NULL, '', 1),
(18, 'Jessore Medical College, Jessore', 'Govt', '2017-06-09 03:45:14', 'admin@bigm-bd.com', NULL, '', 1),
(19, 'Satkhira Medical College, Satkhira', 'Govt', '2017-06-09 03:45:25', 'admin@bigm-bd.com', NULL, '', 1),
(20, 'Shohid Syed Nazrul Islam Medical College, Kishorgong', 'Govt', '2017-06-09 03:47:38', 'admin@bigm-bd.com', NULL, '', 1),
(21, 'Kustia Medical College, Kustia', 'Govt', '2017-06-09 03:47:48', 'admin@bigm-bd.com', NULL, '', 1),
(22, 'Shaikh Shahera Khatun Medical College, Gopalgong', 'Govt', '2017-06-09 03:48:00', 'admin@bigm-bd.com', NULL, '', 1),
(23, 'Bangladesh Medical College, Dhaka', 'Private', '2017-06-09 03:48:14', 'admin@bigm-bd.com', NULL, '', 1),
(24, 'Gonoshasthaya Medical College, Savar, Dhaka', 'Private', '2017-06-09 03:48:24', 'admin@bigm-bd.com', NULL, '', 1),
(25, 'Jahurul Islam Medical College, Kishorgong', 'Private', '2017-06-09 03:48:33', 'admin@bigm-bd.com', NULL, '', 1),
(26, 'Z.H. Sikder Women Medical College, Dhaka', 'Private', '2017-06-09 03:48:54', 'admin@bigm-bd.com', NULL, '', 1),
(27, 'Dhaka National Medical College, Dhaka', 'Private', '2017-06-09 03:49:06', 'admin@bigm-bd.com', NULL, '', 1),
(28, 'Community Medical College & Hospital, Dhaka', 'Private', '2017-09-14 13:27:08', 'admin@bigm-bd.com', NULL, 'admin@bigm-bd.com', 1),
(29, 'Jalalabad Ragib Rabeya Medical College, Sylhet', 'Private', '2017-06-09 03:49:30', 'admin@bigm-bd.com', NULL, '', 1),
(30, 'Shaheed Monsur Ali Medical College, Sylhet', 'Private', '2017-06-09 03:49:40', 'admin@bigm-bd.com', NULL, '', 1),
(31, 'North East Medical College, Dhaka', 'Private', '2017-06-09 03:49:51', 'admin@bigm-bd.com', NULL, '', 1),
(32, 'Holy Family Red Creasent Medical College, Dhaka', 'Private', '2017-06-09 03:50:03', 'admin@bigm-bd.com', NULL, '', 1),
(33, 'International Medical College, Gazipur', 'Private', '2017-06-09 03:50:12', 'admin@bigm-bd.com', NULL, '', 1),
(34, 'North Bengal Medical College, Sirajgonj', 'Private', '2017-06-09 03:50:25', 'admin@bigm-bd.com', NULL, '', 1),
(35, 'East West Medical College, Dhaka', 'Private', '2017-06-09 03:50:36', 'admin@bigm-bd.com', NULL, '', 1),
(36, 'Kumudini Medical College, Tangail', 'Private', '2017-06-09 03:50:46', 'admin@bigm-bd.com', NULL, '', 1),
(37, 'Tairunnessa Medical College, Gazipur', 'Private', '2017-06-09 03:50:58', 'admin@bigm-bd.com', NULL, '', 1),
(38, 'Ibrahim Medical College, Dhaka', 'Private', '2017-06-09 03:51:09', 'admin@bigm-bd.com', NULL, '', 1),
(39, 'BGC Trust Medical College, Chittagong', 'Private', '2017-06-09 03:51:22', 'admin@bigm-bd.com', NULL, '', 1),
(40, 'Shabuddin Medical College, Dhaka', 'Private', '2017-06-09 03:51:35', 'admin@bigm-bd.com', NULL, '', 1),
(41, 'Enam Medical College, Savar', 'Private', '2017-06-09 03:52:15', 'admin@bigm-bd.com', NULL, '', 1),
(42, 'Islami Bank Medical College, Rajshahi', 'Private', '2017-06-09 03:52:32', 'admin@bigm-bd.com', NULL, '', 1),
(43, 'IBN Sina Medical College, Dhaka', 'Private', '2017-06-09 03:52:47', 'admin@bigm-bd.com', NULL, '', 1),
(44, 'Central Medical College, Comilla', 'Private', '2017-06-09 03:53:00', 'admin@bigm-bd.com', NULL, '', 1),
(45, 'Eastern Medical College, Comilla', 'Private', '2017-06-09 03:53:12', 'admin@bigm-bd.com', NULL, '', 1),
(46, 'Khawja Eunus Medical College, Sirajgonj', 'Private', '2017-06-09 03:53:24', 'admin@bigm-bd.com', NULL, '', 1),
(47, 'Ma O Shishu Medical College, Chittagong', 'Private', '2017-06-09 03:53:37', 'admin@bigm-bd.com', NULL, '', 1),
(48, 'Sylhet Women Medical College, Sylhet', 'Private', '2017-06-09 03:53:50', 'admin@bigm-bd.com', NULL, '', 1),
(49, 'Nightangel Medical College, Ashulia, Dhaka', 'Private', '2017-06-09 03:54:01', 'admin@bigm-bd.com', NULL, '', 1),
(50, 'Southern Medical College, Chittagong', 'Private', '2017-06-09 03:54:14', 'admin@bigm-bd.com', NULL, '', 1),
(51, 'Northern International Medical College, Dhaka', 'Private', '2017-06-09 03:54:27', 'admin@bigm-bd.com', NULL, '', 1),
(52, 'Uttara Adhunik Medical College , Dhaka', 'Private', '2017-06-09 03:54:39', 'admin@bigm-bd.com', NULL, '', 1),
(53, 'Delta Medical College, Dhaka', 'Private', '2017-06-09 03:54:54', 'admin@bigm-bd.com', NULL, '', 1),
(54, 'Addin Women Medical College, Dhaka', 'Private', '2017-06-09 03:55:05', 'admin@bigm-bd.com', NULL, '', 1),
(55, 'Dhaka Community Medical College, Dhaka', 'Private', '2017-06-09 03:55:32', 'admin@bigm-bd.com', NULL, '', 1),
(56, 'TMSS Medical College, Bogra', 'Private', '2017-06-09 03:55:44', 'admin@bigm-bd.com', NULL, '', 1),
(57, 'Anwar Khan Modern Medical College, Dhaka', 'Private', '2017-06-09 03:56:15', 'admin@bigm-bd.com', NULL, '', 1),
(58, 'Prime Medical College, Rangpur', 'Private', '2017-06-09 03:56:25', 'admin@bigm-bd.com', NULL, '', 1),
(59, 'Rangpur Community Medical College, Rangpur', 'Private', '2017-06-09 03:56:40', 'admin@bigm-bd.com', NULL, '', 1),
(60, 'Northern Medical College, Rangpur', 'Private', '2017-06-09 03:56:53', 'admin@bigm-bd.com', NULL, '', 1),
(61, 'Faridpur Diabetic Association Medical College, Faridpur', 'Private', '2017-06-09 03:57:06', 'admin@bigm-bd.com', NULL, '', 1),
(62, 'Lab-Aid Medical College, Dhaka', 'Private', '2017-06-09 03:57:19', 'admin@bigm-bd.com', NULL, '', 1),
(63, 'Green Life Medical College, Dhaka', 'Private', '2017-06-09 03:57:29', 'admin@bigm-bd.com', NULL, '', 1),
(64, 'Popular Medical College, Dhaka', 'Private', '2017-06-09 03:57:41', 'admin@bigm-bd.com', NULL, '', 1),
(65, 'MH Shamarita Medical College, Dhaka', 'Private', '2017-06-09 03:57:54', 'admin@bigm-bd.com', NULL, '', 1),
(66, 'Moonnu Medical College, Manikgonj', 'Private', '2017-06-09 03:58:04', 'admin@bigm-bd.com', NULL, '', 1),
(67, 'Dhaka Central International Medical College, Dhaka', 'Private', '2017-06-09 03:58:19', 'admin@bigm-bd.com', NULL, '', 1),
(68, 'Dr. Serajul Islam Medical College, Dhaka', 'Private', '2017-06-09 03:59:04', 'admin@bigm-bd.com', NULL, '', 1),
(69, 'Marks Medical College, Dhaka', 'Private', '2017-06-09 03:59:18', 'admin@bigm-bd.com', NULL, '', 1),
(70, 'Maynamoti Medical College, Comilla', 'Private', '2017-06-09 03:59:31', 'admin@bigm-bd.com', NULL, '', 1),
(71, 'Addin Sokin Medical College, Jessore', 'Private', '2017-06-09 03:59:42', 'admin@bigm-bd.com', NULL, '', 1),
(72, 'Gazi Medical College, Khulna', 'Private', '2017-06-09 03:59:52', 'admin@bigm-bd.com', NULL, '', 1),
(73, 'Barind Medical College, Rajshahi', 'Private', '2017-06-09 04:00:06', 'admin@bigm-bd.com', NULL, '', 1),
(74, 'City Medical College, Gazipur', 'Private', '2017-06-09 04:00:17', 'admin@bigm-bd.com', NULL, '', 1),
(75, 'Others', 'Private', '2017-08-03 10:25:53', 'admin@bigm-bd.com', NULL, '', 1),
(76, 'Armed Forces Medical College, Dhaka', 'Private', '2017-08-07 09:45:23', 'admin@bigm-bd.com', NULL, '', 1),
(77, 'Medical College For Women and Hospital', 'Private', '2017-08-08 09:04:23', 'admin@bigm-bd.com', NULL, '', 1),
(78, 'University Dental College & Hospital', 'Private', '2017-08-17 09:11:43', 'admin@bigm-bd.com', NULL, '', 1),
(79, 'Udayan Dental College', 'Private', '2017-08-17 10:00:23', 'admin@bigm-bd.com', NULL, '', 1),
(80, 'Pioneer Dental College', 'Private', '2017-08-17 10:18:19', 'admin@bigm-bd.com', NULL, '', 1),
(81, 'Sapparo Dental College', 'Private', '2017-08-17 10:22:44', 'admin@bigm-bd.com', NULL, '', 1),
(82, 'Chittagong international dental college', 'Private', '2017-08-17 10:36:32', 'admin@bigm-bd.com', NULL, '', 1),
(83, 'Community Based Medical College, Mymensingh', 'Private', '2017-09-14 13:26:29', 'admin@bigm-bd.com', NULL, '', 1),
(84, 'USTC Medical College, Chittagong', 'Private', '2017-09-14 13:33:03', 'admin@bigm-bd.com', NULL, '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `oe_news`
--

CREATE TABLE `oe_news` (
  `id` int(8) NOT NULL,
  `institute_id` int(1) NOT NULL,
  `course_id` int(2) NOT NULL,
  `faculty_id` int(2) NOT NULL,
  `subject_id` int(5) NOT NULL,
  `news_title` varchar(300) CHARACTER SET utf8 NOT NULL,
  `news_details` varchar(800) CHARACTER SET utf8 NOT NULL,
  `file_loc` varchar(250) CHARACTER SET utf8 DEFAULT NULL,
  `file_type` varchar(60) CHARACTER SET utf8 DEFAULT NULL,
  `file_extension` varchar(20) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` varchar(120) DEFAULT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `oe_news`
--

INSERT INTO `oe_news` (`id`, `institute_id`, `course_id`, `faculty_id`, `subject_id`, `news_title`, `news_details`, `file_loc`, `file_type`, `file_extension`, `created_at`, `created_by`, `status`) VALUES
(14, 4, 28, 33, 28, 'Genesis aiming to serve the medical sciences arena with a noble vision for making skillful medical personnel.', 'Opening ceromonyGenesis aiming to serve the medical sciences arena with a noble vision for making skillful medical personnel.Opening ceromonyGenesis aiming to serve the medical sciences arena with a noble vision for making skillful medical personnel.\r\n12\r\nWelcome To Genesis\r\nGenesis aiming to serve the medical sciences arena with a noble vision for making skillful medical personnel. Genesis has started its journey from 2011 by a group of medical teachers and doctors with its Post Graduate Medical Orientation Centre which arranges entrance courses for FCPS Part-I, MD, MS, MRCP, MRCS, MRCOG, M.Phil, Diploma in many branches of medical sciences and also for Final part courses for FCPS P-II in Surgery, Medicine, Obs Gynae, Paediatrics. About 60 doctors serves as facilitators in Entrance Centre', 'uploads/content/2017/11/14', NULL, 'pdf', '2017-11-05 10:19:00', NULL, 1),
(15, 6, 31, 32, 32, 'The foreign minister was briefing diplomats at Commonwealth Parliamentary Association (CPA) conference that started today at Bangabandhu International Convention Centre.', 'The foreign minister in a written statement also asked CPA members to “take a united stand against all discriminatory policies and activities that run counter to human rights and good relations between countries, and that any such policies are thwarted and not allowed to thrive for upholding democratic principles globally.”', 'uploads/content/2017/11/15', NULL, 'pdf', '2017-11-05 10:29:22', NULL, 1),
(16, 4, 27, 31, 33, 'Tempore voluptates saepe atque nulla labore aut a nulla dolore', 'Dicta sint cillum cupidatat soluta quis cupidatat', NULL, NULL, NULL, '2017-11-13 06:56:45', NULL, 1),
(17, 4, 27, 31, 33, 'Et sed omnis fugiat repellendus Dolorum quis esse quae sapiente iure voluptas fugit libero id et minus distinctio Eum possimus', 'Quia itaque ipsum maiores est iure ratione harum qui rerum magnam ut quod et Quia itaque ipsum maiores est iure ratione harum qui rerum magnam ut quod et Quia itaque ipsum maiores est iure ratione harum qui rerum magnam ut quod et Quia itaque ipsum maiores est iure ratione harum qui rerum magnam ut quod et Quia itaque ipsum maiores est iure ratione harum qui rerum magnam ut quod et Quia itaque ipsum maiores est iure ratione harum qui rerum magnam ut quod et Quia itaque ipsum maiores est iure ratione harum qui rerum magnam ut quod et Quia itaque ipsum maiores est iure ratione harum qui rerum magnam ut quod et Quia itaque ipsum maiores est iure ratione harum qui rerum magnam ut quod et Quia itaque ipsum maiores est iure ratione harum qui rerum magnam ut quod et Quia itaque ipsum maiores est ', 'uploads/content/2017/11/17', NULL, 'pdf', '2017-11-20 09:07:43', NULL, 1),
(18, 4, 27, 31, 33, 'demo', 'asklflasfnlkasnlkf', 'uploads/content/2017/11/18', NULL, 'pdf', '2017-11-20 09:14:06', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `oe_qns_chapter_relatn`
--

CREATE TABLE `oe_qns_chapter_relatn` (
  `id` int(11) NOT NULL,
  `chapter_id` int(11) NOT NULL,
  `master_ref_id` int(11) NOT NULL,
  `sort_order` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `oe_qns_chapter_relatn`
--

INSERT INTO `oe_qns_chapter_relatn` (`id`, `chapter_id`, `master_ref_id`, `sort_order`) VALUES
(1, 1, 1, 0),
(2, 1, 3, 0),
(3, 2, 3, 0),
(4, 3, 3, 0),
(8, 1, 5, 0),
(9, 2, 5, 0),
(17, 1, 15, 0),
(57, 2, 18, 0),
(58, 3, 18, 0),
(59, 2, 19, 0),
(60, 3, 19, 0),
(67, 1, 11, 0),
(68, 2, 11, 0),
(69, 3, 11, 0),
(73, 3, 8, 0),
(76, 3, 4, 0),
(93, 1, 17, 0),
(94, 2, 17, 0),
(95, 3, 17, 0),
(96, 6, 17, 0),
(111, 1, 24, 0),
(112, 2, 24, 0),
(113, 3, 24, 0),
(139, 1, 25, 0),
(154, 1, 27, 0),
(155, 1, 28, 0),
(156, 1, 29, 0),
(184, 6, 23, 0),
(188, 1, 30, 0),
(226, 2, 26, 0),
(227, 3, 26, 0),
(229, 1, 31, 0),
(237, 3, 20, 0),
(238, 1, 32, 0),
(239, 2, 32, 0),
(290, 1, 33, 0),
(291, 2, 33, 0),
(292, 6, 33, 0),
(293, 1, 21, 0),
(294, 2, 21, 0),
(295, 6, 21, 0),
(296, 1, 34, 0);

-- --------------------------------------------------------

--
-- Table structure for table `oe_qns_topic_relatn`
--

CREATE TABLE `oe_qns_topic_relatn` (
  `id` int(11) NOT NULL,
  `topic_id` int(11) NOT NULL,
  `master_ref_id` int(11) NOT NULL,
  `chapter_ref_id` int(3) NOT NULL,
  `sort_order` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `oe_qns_topic_relatn`
--

INSERT INTO `oe_qns_topic_relatn` (`id`, `topic_id`, `master_ref_id`, `chapter_ref_id`, `sort_order`) VALUES
(1, 3, 1, 1, 0),
(2, 2, 3, 1, 0),
(3, 3, 3, 1, 0),
(4, 6, 3, 2, 0),
(5, 7, 3, 2, 0),
(6, 13, 3, 3, 0),
(7, 14, 3, 3, 0),
(11, 2, 5, 1, 0),
(12, 7, 5, 2, 0),
(19, 4, 14, 1, 0),
(20, 5, 15, 1, 0),
(21, 4, 15, 1, 0),
(22, 5, 16, 1, 0),
(23, 4, 16, 1, 0),
(24, 9, 16, 2, 0),
(25, 6, 16, 2, 0),
(26, 13, 16, 3, 0),
(27, 14, 16, 3, 0),
(45, 9, 18, 3, 0),
(46, 8, 18, 3, 0),
(71, 3, 11, 3, 0),
(72, 7, 11, 3, 0),
(73, 13, 11, 3, 0),
(83, 3, 8, 3, 0),
(84, 7, 8, 3, 0),
(89, 11, 4, 3, 0),
(90, 13, 4, 3, 0),
(170, 2, 17, 6, 0),
(171, 10, 17, 6, 0),
(172, 51, 17, 6, 0),
(211, 59, 23, 6, 0),
(212, 61, 23, 6, 0),
(213, 9, 23, 6, 0),
(214, 60, 23, 6, 0),
(215, 8, 23, 6, 0),
(216, 13, 23, 6, 0),
(217, 52, 23, 6, 0),
(218, 58, 23, 6, 0),
(240, 1, 24, 3, 0),
(241, 1, 24, 3, 0),
(242, 2, 24, 3, 0),
(243, 2, 24, 3, 0),
(244, 3, 24, 3, 0),
(245, 3, 24, 3, 0),
(246, 5, 25, 1, 0),
(247, 4, 25, 1, 0),
(248, 7, 25, 2, 0),
(249, 11, 25, 2, 0),
(250, 9, 25, 2, 0),
(251, 8, 25, 3, 0),
(252, 13, 25, 3, 0),
(253, 14, 25, 3, 0),
(254, 5, 25, 1, 0),
(255, 7, 25, 2, 0),
(256, 11, 25, 2, 0),
(257, 8, 25, 3, 0),
(258, 13, 25, 3, 0),
(259, 5, 25, 1, 0),
(260, 7, 25, 2, 0),
(261, 11, 25, 2, 0),
(262, 8, 25, 3, 0),
(263, 13, 25, 3, 0),
(264, 5, 25, 1, 0),
(265, 7, 25, 2, 0),
(266, 11, 25, 2, 0),
(267, 8, 25, 3, 0),
(268, 13, 25, 3, 0),
(269, 5, 25, 1, 0),
(270, 4, 25, 1, 0),
(271, 7, 25, 1, 0),
(272, 11, 25, 1, 0),
(273, 9, 25, 1, 0),
(274, 13, 25, 1, 0),
(275, 8, 25, 1, 0),
(276, 5, 25, 2, 0),
(277, 4, 25, 2, 0),
(278, 7, 25, 2, 0),
(279, 11, 25, 2, 0),
(280, 9, 25, 2, 0),
(281, 13, 25, 2, 0),
(282, 8, 25, 2, 0),
(283, 5, 25, 3, 0),
(284, 4, 25, 3, 0),
(285, 7, 25, 3, 0),
(286, 11, 25, 3, 0),
(287, 9, 25, 3, 0),
(288, 13, 25, 3, 0),
(289, 8, 25, 3, 0),
(290, 5, 26, 1, 0),
(291, 4, 26, 1, 0),
(292, 7, 26, 2, 0),
(293, 11, 26, 2, 0),
(294, 8, 26, 3, 0),
(295, 13, 26, 3, 0),
(296, 52, 26, 6, 0),
(297, 5, 26, 1, 0),
(298, 4, 26, 1, 0),
(299, 7, 26, 1, 0),
(300, 11, 26, 1, 0),
(301, 8, 26, 1, 0),
(302, 13, 26, 1, 0),
(303, 52, 26, 1, 0),
(304, 5, 26, 2, 0),
(305, 4, 26, 2, 0),
(306, 7, 26, 2, 0),
(307, 11, 26, 2, 0),
(308, 8, 26, 2, 0),
(309, 13, 26, 2, 0),
(310, 52, 26, 2, 0),
(311, 5, 26, 3, 0),
(312, 4, 26, 3, 0),
(313, 7, 26, 3, 0),
(314, 11, 26, 3, 0),
(315, 8, 26, 3, 0),
(316, 13, 26, 3, 0),
(317, 52, 26, 3, 0),
(318, 5, 26, 6, 0),
(319, 4, 26, 6, 0),
(320, 7, 26, 6, 0),
(321, 11, 26, 6, 0),
(322, 8, 26, 6, 0),
(323, 13, 26, 6, 0),
(324, 52, 26, 6, 0),
(325, 5, 30, 1, 0),
(326, 4, 30, 1, 0),
(327, 7, 30, 2, 0),
(328, 11, 30, 2, 0),
(329, 8, 30, 3, 0),
(330, 52, 30, 6, 0),
(331, 5, 30, 1, 0),
(332, 4, 30, 1, 0),
(333, 7, 30, 2, 0),
(334, 11, 30, 2, 0),
(335, 8, 30, 3, 0),
(336, 52, 30, 6, 0),
(337, 5, 30, 1, 0),
(338, 4, 30, 1, 0),
(339, 7, 30, 2, 0),
(340, 11, 30, 2, 0),
(341, 8, 30, 3, 0),
(342, 52, 30, 6, 0),
(343, 5, 30, 1, 0),
(344, 4, 30, 1, 0),
(345, 7, 30, 2, 0),
(346, 11, 30, 2, 0),
(347, 8, 30, 3, 0),
(348, 52, 30, 6, 0),
(349, 5, 30, 1, 0),
(350, 4, 30, 1, 0),
(351, 7, 30, 2, 0),
(352, 11, 30, 2, 0),
(353, 8, 30, 3, 0),
(354, 52, 30, 6, 0),
(355, 5, 31, 1, 0),
(356, 4, 31, 1, 0),
(357, 7, 31, 2, 0),
(358, 11, 31, 2, 0),
(379, 5, 26, 1, 0),
(380, 4, 26, 1, 0),
(381, 7, 26, 2, 0),
(382, 11, 26, 2, 0),
(383, 8, 26, 3, 0),
(384, 13, 26, 3, 0),
(385, 7, 26, 2, 0),
(386, 8, 26, 3, 0),
(387, 13, 26, 3, 0),
(388, 7, 26, 2, 0),
(389, 11, 26, 2, 0),
(390, 8, 26, 3, 0),
(391, 13, 26, 3, 0),
(392, 5, 31, 1, 0),
(393, 5, 31, 1, 0),
(405, 7, 20, 3, 0),
(406, 5, 32, 1, 0),
(407, 4, 32, 1, 0),
(408, 7, 32, 2, 0),
(409, 11, 32, 2, 0),
(481, 5, 33, 1, 0),
(482, 4, 33, 1, 0),
(483, 7, 33, 2, 0),
(484, 55, 33, 6, 0),
(485, 57, 33, 6, 0),
(486, 5, 21, 1, 0),
(487, 4, 21, 1, 0),
(488, 7, 21, 2, 0),
(489, 11, 21, 2, 0),
(490, 9, 21, 2, 0),
(491, 5, 21, 6, 0),
(492, 4, 21, 6, 0),
(493, 7, 21, 6, 0),
(494, 52, 21, 6, 0),
(495, 3, 34, 1, 0),
(496, 2, 34, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `oe_qsn_bnk_ans`
--

CREATE TABLE `oe_qsn_bnk_ans` (
  `id` int(11) NOT NULL,
  `master_ref_id` int(11) NOT NULL,
  `ans` varchar(500) NOT NULL,
  `index_seqn` varchar(2) NOT NULL,
  `correct_ans` varchar(5) DEFAULT NULL COMMENT 'only for mcq , only T,F'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `oe_qsn_bnk_ans`
--

INSERT INTO `oe_qsn_bnk_ans` (`id`, `master_ref_id`, `ans`, `index_seqn`, `correct_ans`) VALUES
(1, 1, '-70V', 'A', NULL),
(2, 1, '60V', 'B', NULL),
(3, 1, '120mV', 'C', NULL),
(4, 1, '70mV', 'D', NULL),
(5, 1, 'none', 'E', NULL),
(11, 3, 'Internal Medicine', 'A', NULL),
(12, 3, 'Surgery', 'B', NULL),
(13, 3, 'Obstetrics and Gynecology', 'C', NULL),
(14, 3, 'Pediatrics', 'D', NULL),
(15, 3, 'Preventive Medicine and public health', 'E', NULL),
(21, 5, '600 per micro liter', 'A', 'F'),
(22, 5, 'Surgery', 'B', 'F'),
(23, 5, 'Thalassemia', 'C', 'F'),
(24, 5, '200 per micro liter', 'D', 'F'),
(25, 5, ' VSD with PS', 'E', 'F'),
(36, 12, 'Definitions', 'A', NULL),
(37, 12, 'Genetics', 'B', NULL),
(38, 12, 'Pharmacology', 'C', NULL),
(39, 12, 'Prevention', 'D', NULL),
(40, 12, 'Behavioral Interventions', 'E', NULL),
(41, 13, '600 per micro liter', 'A', NULL),
(42, 13, 'Genetics', 'B', NULL),
(43, 13, 'Pharmacology', 'C', NULL),
(44, 13, 'Prevention', 'D', NULL),
(45, 13, 'Behavioral Interventions', 'E', NULL),
(51, 15, 'specialty', 'A', NULL),
(52, 15, 'started', 'B', NULL),
(53, 15, 'rationales', 'C', NULL),
(54, 15, 'computer', 'D', NULL),
(55, 15, 'Education', 'E', NULL),
(56, 16, 'ans1', 'A', NULL),
(57, 16, 'Surgery', 'B', NULL),
(58, 16, 'Pharmacology', 'C', NULL),
(59, 16, 'Pediatrics', 'D', NULL),
(60, 16, '200 per micro liter', 'E', NULL),
(61, 17, '600 per micro liter', 'A', NULL),
(62, 17, 'Genetics', 'B', NULL),
(63, 17, 'Pharmacology', 'C', NULL),
(64, 17, 'Prevention', 'D', NULL),
(65, 17, ' VSD with PS', 'E', NULL),
(66, 18, '600 per micro liter', 'A', NULL),
(67, 18, 'Surgery', 'B', NULL),
(68, 18, 'Thalassemia', 'C', NULL),
(69, 18, 'Pediatrics', 'D', NULL),
(70, 18, ' VSD with PS', 'E', NULL),
(86, 14, '600 per micro liter1', 'A', 'F'),
(89, 19, ' VSD with PS5', 'A', 'T'),
(95, 8, 'Uric acid1', 'A', 'F'),
(96, 8, 'Urea1', 'B', 'T'),
(97, 8, 'Glucose1 ', 'C', 'T'),
(98, 8, 'Creatinine2 ', 'D', 'T'),
(99, 8, ' VSD with PS3', 'E', 'F'),
(105, 4, 'Renal pyramids nazmul', 'A', 'F'),
(106, 4, 'Nephrons nazmul1', 'B', 'F'),
(107, 4, 'Renal sinus nazmul2', 'C', 'T'),
(108, 4, 'Renal pelvis nazmul3', 'D', 'T'),
(109, 4, 'Renal pelvis nazmul4', 'E', 'F'),
(130, 22, '600 per micro liter', 'A', NULL),
(131, 22, 'Genetics', 'B', NULL),
(132, 22, 'Thalassemia', 'C', NULL),
(133, 22, 'Pediatrics', 'D', NULL),
(134, 22, ' VSD with PS', 'E', NULL),
(135, 23, '600 per micro liter', 'A', NULL),
(136, 23, 'Surgery', 'B', NULL),
(137, 23, 'Thalassemia', 'C', NULL),
(138, 23, 'Pediatrics', 'D', NULL),
(139, 23, ' VSD with PS', 'E', NULL),
(140, 24, '600 per micro liter', 'A', NULL),
(141, 24, 'Surgery', 'B', NULL),
(142, 24, 'Pharmacology', 'C', NULL),
(143, 24, 'Pediatrics', 'D', NULL),
(144, 24, ' VSD with PS', 'E', NULL),
(145, 25, '600 per micro liter', 'A', NULL),
(146, 25, 'Surgery', 'B', NULL),
(147, 25, 'Thalassemia', 'C', NULL),
(148, 25, 'Pediatrics', 'D', NULL),
(149, 25, ' VSD with PS', 'E', NULL),
(150, 26, 'ans1', 'A', NULL),
(151, 26, 'Surgery', 'B', NULL),
(152, 26, 'Pharmacology', 'C', NULL),
(153, 26, 'Prevention', 'D', NULL),
(154, 26, ' VSD with PS', 'E', NULL),
(155, 27, 'ASDFADSF', 'A', NULL),
(156, 27, 'Surgery', 'B', NULL),
(157, 27, 'Pharmacology', 'C', NULL),
(158, 27, 'Prevention', 'D', NULL),
(159, 27, ' VSD with PS', 'E', NULL),
(160, 28, 'ASDFADSF', 'A', NULL),
(161, 28, 'Surgery', 'B', NULL),
(162, 28, 'Pharmacology', 'C', NULL),
(163, 28, 'Prevention', 'D', NULL),
(164, 28, ' VSD with PS', 'E', NULL),
(165, 29, 'ASDFADSF', 'A', NULL),
(166, 29, 'Surgery', 'B', NULL),
(167, 29, 'Pharmacology', 'C', NULL),
(168, 29, 'Prevention', 'D', NULL),
(169, 29, ' VSD with PS', 'E', NULL),
(170, 30, 'ASDFADSF', 'A', NULL),
(171, 30, 'Surgery', 'B', NULL),
(172, 30, 'Pharmacology', 'C', NULL),
(173, 30, 'Prevention', 'D', NULL),
(174, 30, ' VSD with PS', 'E', NULL),
(175, 31, 'ans1', 'A', NULL),
(176, 31, 'Surgery', 'B', NULL),
(177, 31, 'Thalassemia', 'C', NULL),
(178, 31, 'Pediatrics', 'D', NULL),
(179, 31, ' VSD with PS', 'E', NULL),
(180, 32, '600 per micro liter', 'A', NULL),
(181, 32, 'Surgery', 'B', NULL),
(182, 32, 'Thalassemia', 'C', NULL),
(183, 32, 'Pediatrics', 'D', NULL),
(184, 32, ' VSD with PS', 'E', NULL),
(185, 33, '600 per micro liter', 'A', NULL),
(186, 33, 'Surgery', 'B', NULL),
(187, 33, 'Thalassemia', 'C', NULL),
(188, 33, 'Pediatrics', 'D', NULL),
(189, 33, ' VSD with PS', 'E', NULL),
(205, 20, '600 per micro liter', 'A', 'T'),
(206, 20, 'Genetics', 'B', 'T'),
(207, 20, 'Thalassemia', 'C', 'F'),
(208, 20, 'Prevention', 'D', 'T'),
(209, 20, '200 per micro liter', 'E', 'T'),
(210, 11, 'ans1', 'A', 'T'),
(251, 21, 'ASDFADSF', 'A', 'T'),
(252, 21, '500 per micro liter', 'B', 'F'),
(253, 21, 'Pharmacology', 'C', 'F'),
(254, 21, 'Prevention', 'D', 'T'),
(255, 21, '200 per micro liter', 'E', 'T'),
(256, 34, '600 per micro liter', 'A', NULL),
(257, 34, 'Genetics', 'B', NULL),
(258, 34, 'Pharmacology', 'C', NULL),
(259, 34, 'Prevention', 'D', NULL),
(260, 34, ' VSD with PS', 'E', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `oe_qsn_bnk_master`
--

CREATE TABLE `oe_qsn_bnk_master` (
  `id` int(11) NOT NULL,
  `type` varchar(20) NOT NULL COMMENT 'mcq,sba',
  `question_name` varchar(400) NOT NULL,
  `correct_ans` varchar(5) NOT NULL,
  `question_in_year` varchar(120) NOT NULL,
  `discussion` text NOT NULL,
  `reference` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` varchar(30) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(30) DEFAULT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `oe_qsn_bnk_master`
--

INSERT INTO `oe_qsn_bnk_master` (`id`, `type`, `question_name`, `correct_ans`, `question_in_year`, `discussion`, `reference`, `created_at`, `created_by`, `updated_at`, `updated_by`, `status`) VALUES
(1, '1', 'Resting membrane potential of nerve cell is', 'B', '', 'adfsdf', 'dsf', '2017-09-27 12:42:20', 'admin@bigm-bd.com', NULL, NULL, '1'),
(3, '1', 'AMC MCQ Exam includes test items in the following content areas:', 'C', '', 'fasdfsf', 'https://www.amcqbank.com/Home/AMC_MCQ_Examination', '2017-09-28 05:42:28', 'admin@bigm-bd.com', NULL, NULL, '1'),
(4, '2', 'The renal medulla is composed of tissue called', '', '2017', 'sdfasdfsdf', 'https://www.examrace.com/Sample-Objective-Questions/Medical-Science-Questions/Medical-Science-MCQs-Practice-Test-1.html', '2017-10-04 13:08:13', 'admin@bigm-bd.com', NULL, NULL, '1'),
(5, '2', 'Which of the following is not in the sequence of proper kidney blood flow? The starting point is the renal artery and the finishing point is the renal vein.', '', '', '', '', '2017-09-28 07:47:58', 'admin@bigm-bd.com', NULL, NULL, '1'),
(6, '2', 'Which is found in the highest concentration in the urine?', '', '', 'fsadfsf', 'fasdfsdf', '2017-09-28 08:04:28', 'admin@bigm-bd.com', NULL, NULL, '1'),
(7, '2', 'Which is found in the highest concentration in the urine?', '', '', 'fsadfsf', 'fasdfsdf', '2017-09-28 08:05:11', 'admin@bigm-bd.com', NULL, NULL, '1'),
(8, '2', 'Which is found in the highest concentration in the urine?', '', '1234', 'fsadfsf', 'fasdfsdf', '2017-10-04 13:04:40', 'admin@bigm-bd.com', NULL, NULL, '1'),
(9, '2', 'Which is found in the highest concentration in the urine?', '', '', 'fsadfsf', 'fasdfsdf', '2017-09-28 08:07:05', 'admin@bigm-bd.com', NULL, NULL, '1'),
(10, '2', 'Which is found in the highest concentration in the urine?', '', '', 'fsadfsf', 'fasdfsdf', '2017-09-28 08:07:29', 'admin@bigm-bd.com', NULL, NULL, '1'),
(11, '2', 'Which is found in the highest concentration in the urineadfadsfasdfadsf?', '', '2345', 'fsadfsfdfasdfsdfad', 'fasdfsdfsfsdfadsf', '2017-10-04 12:44:31', 'admin@bigm-bd.com', NULL, NULL, '1'),
(12, '1', 'What is covered on the Addiction Medicine Certification Exam?', 'C', '0', 'adfsdfsdf', 'https://www.boardvitals.com/addiction-medicine-board-review-questions', '2017-10-03 05:52:27', 'admin@bigm-bd.com', NULL, NULL, '1'),
(13, '1', 'What is covered on the Addiction Medicine Certification Exam?', 'C', '2003,2005,2010', 'adfsdfsdf', 'https://www.boardvitals.com/addiction-medicine-board-review-questions', '2017-10-03 05:59:49', 'admin@bigm-bd.com', NULL, NULL, '1'),
(14, '2', 'Mesothelioma is associated with one of the following :', '', '2011,2012,2015,2016', 'ASDFSDF', 'SDFSDF', '2017-10-03 06:07:21', 'admin@bigm-bd.com', NULL, NULL, '1'),
(15, '1', 'Dental Exam Study Guides & Test Prep', 'D', '2013', '', '', '2017-10-03 06:42:00', 'admin@bigm-bd.com', NULL, NULL, '1'),
(16, '1', 'Mesothelioma is associated with one of the following :', 'B', '2008', '', '', '2017-10-03 07:28:36', 'admin@bigm-bd.com', NULL, NULL, '1'),
(17, '1', 'Mesothelioma is', 'C', '2010', '', '', '2017-10-03 14:12:14', 'admin@bigm-bd.com', NULL, NULL, '1'),
(18, '1', 'testing case for duplicate topics', 'B', '', '', '', '2017-10-03 14:27:43', 'admin@bigm-bd.com', NULL, NULL, '1'),
(19, '2', 'Which is found in the highest concentration in the urinedfadfs?', '', '1234', 'fsadfsfafdfasdfasdfadf', 'fasdfsdfasdfasdfasdfadsfadsf', '2017-10-04 12:38:39', 'admin@bigm-bd.com', NULL, NULL, '1'),
(20, '2', 'The renal medulla is composed of tissue called', '', '2017', 'adfasdf', 'adsfasdfsdf', '2017-10-04 13:12:47', 'admin@bigm-bd.com', NULL, NULL, '1'),
(21, '2', 'Which is found in the highest concentration in the urinedfadfs?', '', '2345', '', '', '2017-10-04 13:20:13', 'admin@bigm-bd.com', NULL, NULL, '1'),
(22, '1', 'Mesothelioma is associated with one of the following :', 'C', '2345', '', '', '2017-10-04 13:27:48', 'admin@bigm-bd.com', NULL, NULL, '1'),
(23, '1', 'nazmul asdfasdfasdfsadfsadfsadfsadfasdfasdfasdfasdf', 'B', '2345', '', '', '2017-10-04 13:29:32', 'admin@bigm-bd.com', NULL, NULL, '1'),
(24, '1', 'Mesothelioma is associated with one of the following :adfasdfasdfasdfasdfnazmul', 'C', '2017', 'dfasdf', 'adsfasdf', '2017-10-04 13:34:17', 'admin@bigm-bd.com', NULL, NULL, '1'),
(25, '1', 'asdfasdfasdfasdfasdfadsf', 'C', '2345', 'adsfsadf', 'adfasdf', '2017-10-04 13:43:27', 'admin@bigm-bd.com', NULL, NULL, '1'),
(26, '1', 'What is covered on the Addiction Medicine Certification Examlaptop?', 'C', '1234', 'fasdf', 'sdfsdf', '2017-10-05 06:25:09', 'admin@bigm-bd.com', NULL, NULL, '1'),
(27, '1', 'What is covered on the Addiction Medicine Certification Exam?', 'C', '2017', '', '', '2017-10-05 06:15:59', 'admin@bigm-bd.com', NULL, NULL, '0'),
(28, '1', 'What is covered on the Addiction Medicine Certification Exam?', 'C', '2017', '', '', '2017-10-05 06:16:15', 'admin@bigm-bd.com', NULL, NULL, '0'),
(29, '1', 'What is covered on the Addiction Medicine Certification Exam?', 'C', '2017', '', '', '2017-10-05 06:17:30', 'admin@bigm-bd.com', NULL, NULL, '0'),
(30, '1', 'What is covered on the Addiction Medicine Certification Exam?', 'C', '2017', '', '', '2017-10-05 06:38:03', 'admin@bigm-bd.com', NULL, NULL, '0'),
(31, '1', 'Mesothelioma is associated with one of the following :', 'B', '', '', '', '2017-10-05 06:49:15', 'admin@bigm-bd.com', NULL, NULL, '1'),
(32, '1', 'What is covered on the Addiction Medicine Certification Exam?', 'A', '', 'adsfasdf', 'asdfds', '2017-10-05 06:59:14', 'admin@bigm-bd.com', NULL, NULL, '1'),
(33, '1', 'What is covered on the Addiction Medicine Certification Exam anassdadsfnazmul?', 'D', '12343143434', '', '', '2017-10-08 06:07:07', 'admin@bigm-bd.com', NULL, NULL, '1'),
(34, '1', 'Mesothelioma is associated with one of the following :', 'C', '2345', '', '', '2017-10-15 10:23:51', 'admin@bigm-bd.com', NULL, NULL, '1');

-- --------------------------------------------------------

--
-- Table structure for table `oe_sessions`
--

CREATE TABLE `oe_sessions` (
  `id` varchar(128) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `oe_topics`
--

CREATE TABLE `oe_topics` (
  `id` int(11) NOT NULL,
  `chapter_ref_id` int(11) DEFAULT NULL,
  `name` varchar(35) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` varchar(30) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_by` varchar(30) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `oe_topics`
--

INSERT INTO `oe_topics` (`id`, `chapter_ref_id`, `name`, `created_at`, `created_by`, `updated_at`, `updated_by`, `status`) VALUES
(2, 1, 'virology', '2017-09-28 09:48:38', 'admin@bigm-bd.com', '0000-00-00 00:00:00', 'admin@bigm-bd.com', 1),
(3, 1, 'Parasitology', '2017-09-25 11:04:38', 'admin@bigm-bd.com', '0000-00-00 00:00:00', 'admin@bigm-bd.com', 1),
(4, 1, 'Mycology', '2017-09-28 05:32:52', 'admin@bigm-bd.com', '0000-00-00 00:00:00', '', 1),
(5, 1, 'Gen: Bacteriology', '2017-09-28 05:33:00', 'admin@bigm-bd.com', '0000-00-00 00:00:00', '', 1),
(6, 2, 'Sys: Bacteriology', '2017-09-28 05:33:05', 'admin@bigm-bd.com', '0000-00-00 00:00:00', '', 1),
(7, 2, 'Abdomen', '2017-09-28 05:33:09', 'admin@bigm-bd.com', '0000-00-00 00:00:00', 'admin@bigm-bd.com', 1),
(8, 3, 'Abdomen-II', '2017-09-28 05:33:13', 'admin@bigm-bd.com', '0000-00-00 00:00:00', 'admin@bigm-bd.com', 2),
(9, 2, 'Head Neck', '2017-09-28 05:33:18', 'admin@bigm-bd.com', '0000-00-00 00:00:00', '', 1),
(10, 2, 'Thorax', '2017-09-28 05:33:23', 'admin@bigm-bd.com', '0000-00-00 00:00:00', '', 1),
(11, 2, 'Extremity', '2017-09-28 05:33:28', 'admin@bigm-bd.com', '0000-00-00 00:00:00', 'admin@bigm-bd.com', 1),
(12, 3, 'Extremity-II', '2017-09-28 05:33:33', 'admin@bigm-bd.com', '0000-00-00 00:00:00', 'admin@bigm-bd.com', 2),
(13, 3, 'Embryology', '2017-09-28 05:33:38', 'admin@bigm-bd.com', '0000-00-00 00:00:00', 'admin@bigm-bd.com', 1),
(14, 3, 'Embryology-II', '2017-09-28 05:33:42', 'admin@bigm-bd.com', '0000-00-00 00:00:00', 'admin@bigm-bd.com', 2),
(15, NULL, 'Histology', '2017-08-18 15:55:03', 'admin@bigm-bd.com', '0000-00-00 00:00:00', 'admin@bigm-bd.com', 1),
(16, NULL, 'Histology-II', '2017-08-18 15:55:11', 'admin@bigm-bd.com', '0000-00-00 00:00:00', 'admin@bigm-bd.com', 2),
(17, NULL, 'Endocrinology', '2017-08-18 15:55:20', 'admin@bigm-bd.com', '0000-00-00 00:00:00', 'admin@bigm-bd.com', 1),
(18, NULL, 'Endocrinology-II', '2017-08-18 15:55:31', 'admin@bigm-bd.com', '0000-00-00 00:00:00', 'admin@bigm-bd.com', 2),
(19, NULL, 'Neuroanatomy', '2017-05-08 10:20:33', 'admin@bigm-bd.com', '0000-00-00 00:00:00', '', 1),
(20, NULL, 'Nervous System', '2017-05-08 10:20:42', 'admin@bigm-bd.com', '0000-00-00 00:00:00', '', 1),
(21, NULL, 'Gen: Pharmacology', '2017-05-08 10:21:07', 'admin@bigm-bd.com', '0000-00-00 00:00:00', '', 1),
(22, NULL, 'Sys: Pharmacology', '2017-05-08 10:21:20', 'admin@bigm-bd.com', '0000-00-00 00:00:00', '', 1),
(23, NULL, 'Biostatistics', '2017-05-08 10:21:38', 'admin@bigm-bd.com', '0000-00-00 00:00:00', '', 1),
(24, NULL, 'GIT Physiology', '2017-05-08 10:21:49', 'admin@bigm-bd.com', '0000-00-00 00:00:00', '', 1),
(25, NULL, 'Metabolism, Vitamins & Minerals', '2017-05-08 10:22:20', 'admin@bigm-bd.com', '0000-00-00 00:00:00', '', 1),
(26, NULL, 'CVS Physiology', '2017-08-18 15:55:45', 'admin@bigm-bd.com', '0000-00-00 00:00:00', 'admin@bigm-bd.com', 1),
(27, NULL, 'CVS Physiology-II', '2017-08-18 15:55:54', 'admin@bigm-bd.com', '0000-00-00 00:00:00', 'admin@bigm-bd.com', 2),
(28, NULL, 'Cell Injury & Adaptation', '2017-05-08 10:23:25', 'admin@bigm-bd.com', '0000-00-00 00:00:00', '', 1),
(29, NULL, 'Genetics', '2017-05-08 10:23:30', 'admin@bigm-bd.com', '0000-00-00 00:00:00', '', 1),
(30, NULL, 'Neoplasm', '2017-08-18 15:56:05', 'admin@bigm-bd.com', '0000-00-00 00:00:00', 'admin@bigm-bd.com', 1),
(31, NULL, 'Neoplasm-II', '2017-08-18 15:56:16', 'admin@bigm-bd.com', '0000-00-00 00:00:00', 'admin@bigm-bd.com', 2),
(32, NULL, 'Repair, Regeneration, Healing & Hem', '2017-05-08 10:25:35', 'admin@bigm-bd.com', '0000-00-00 00:00:00', '', 1),
(33, NULL, 'Immunology', '2017-08-18 15:56:26', 'admin@bigm-bd.com', '0000-00-00 00:00:00', 'admin@bigm-bd.com', 1),
(34, NULL, 'Immunology-II', '2017-08-18 15:56:36', 'admin@bigm-bd.com', '0000-00-00 00:00:00', 'admin@bigm-bd.com', 2),
(35, NULL, 'Respiratory System', '2017-05-08 10:26:31', 'admin@bigm-bd.com', '0000-00-00 00:00:00', '', 1),
(36, NULL, 'General Physiology', '2017-05-08 10:26:47', 'admin@bigm-bd.com', '0000-00-00 00:00:00', '', 1),
(37, NULL, 'Renal System', '2017-05-08 10:26:56', 'admin@bigm-bd.com', '0000-00-00 00:00:00', '', 1),
(38, NULL, 'Body Fluid, Acid Base Balance .....', '2017-05-08 10:27:26', 'admin@bigm-bd.com', '0000-00-00 00:00:00', '', 1),
(39, NULL, 'Blood', '2017-05-08 10:27:49', 'admin@bigm-bd.com', '0000-00-00 00:00:00', '', 1),
(40, NULL, 'Haematology', '2017-05-08 10:27:58', 'admin@bigm-bd.com', '0000-00-00 00:00:00', '', 1),
(41, NULL, 'Cardiology', '2017-08-18 15:58:18', 'admin@bigm-bd.com', '0000-00-00 00:00:00', 'admin@bigm-bd.com', 1),
(42, NULL, 'Cardiology-II', '2017-08-18 15:58:32', 'admin@bigm-bd.com', '0000-00-00 00:00:00', 'admin@bigm-bd.com', 2),
(43, NULL, 'Neurology', '2017-08-18 15:58:51', 'admin@bigm-bd.com', '0000-00-00 00:00:00', 'admin@bigm-bd.com', 1),
(44, NULL, 'Neurology-II', '2017-08-18 15:59:02', 'admin@bigm-bd.com', '0000-00-00 00:00:00', 'admin@bigm-bd.com', 2),
(45, NULL, 'Nephrology', '2017-08-18 15:59:13', 'admin@bigm-bd.com', '0000-00-00 00:00:00', 'admin@bigm-bd.com', 1),
(46, NULL, 'Nephrology-II', '2017-08-18 15:59:25', 'admin@bigm-bd.com', '0000-00-00 00:00:00', 'admin@bigm-bd.com', 2),
(47, NULL, 'Good Medical Practice', '2017-05-08 10:31:10', 'admin@bigm-bd.com', '0000-00-00 00:00:00', '', 1),
(48, NULL, 'Endocrinology Clinical-I', '2017-05-08 10:32:36', 'admin@bigm-bd.com', '0000-00-00 00:00:00', '', 1),
(49, NULL, 'Endocrinology Clinical-II', '2017-05-08 10:32:43', 'admin@bigm-bd.com', '0000-00-00 00:00:00', '', 1),
(50, NULL, 'Endocrinology Clinical-III', '2017-05-08 10:32:49', 'admin@bigm-bd.com', '0000-00-00 00:00:00', '', 1),
(51, 2, 'virology', '2017-09-28 13:25:35', 'admin@bigm-bd.com', '0000-00-00 00:00:00', 'admin@bigm-bd.com', 1),
(52, 6, 'aaaaa', '2017-10-02 12:22:19', 'admin@bigm-bd.com', '0000-00-00 00:00:00', '', 1),
(53, 6, 'asdfgh', '2017-10-02 12:22:28', 'admin@bigm-bd.com', '0000-00-00 00:00:00', '', 1),
(54, 6, 'basdfgg', '2017-10-02 12:22:37', 'admin@bigm-bd.com', '0000-00-00 00:00:00', '', 1),
(55, 6, 'ccccsdf', '2017-10-02 12:22:47', 'admin@bigm-bd.com', '0000-00-00 00:00:00', '', 1),
(56, 6, 'bert', '2017-10-02 12:22:55', 'admin@bigm-bd.com', '0000-00-00 00:00:00', '', 1),
(57, 6, 'ewrty', '2017-10-02 12:23:12', 'admin@bigm-bd.com', '0000-00-00 00:00:00', '', 1),
(58, 6, 'arif', '2017-10-02 12:24:02', 'admin@bigm-bd.com', '0000-00-00 00:00:00', '', 1),
(59, 1, 'nazmul', '2017-10-03 14:25:10', 'admin@bigm-bd.com', '0000-00-00 00:00:00', '', 1),
(60, 2, 'nazmul', '2017-10-03 14:25:26', 'admin@bigm-bd.com', '0000-00-00 00:00:00', '', 1),
(61, 1, 'nazmul24', '2017-10-15 10:21:32', 'admin@bigm-bd.com', '0000-00-00 00:00:00', 'admin@bigm-bd.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `oe_users`
--

CREATE TABLE `oe_users` (
  `id` int(11) NOT NULL,
  `full_name` varchar(70) NOT NULL,
  `login_email` varchar(60) NOT NULL,
  `password` varchar(255) NOT NULL,
  `photo_url` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `address` varchar(500) DEFAULT NULL,
  `zip_code` varchar(10) DEFAULT NULL,
  `country` varchar(50) DEFAULT NULL,
  `city` varchar(30) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL,
  `is_fraud_detected` varchar(10) NOT NULL DEFAULT 'no' COMMENT 'yes,no',
  `ip` varchar(20) DEFAULT NULL,
  `is_verified` varchar(5) NOT NULL DEFAULT 'no' COMMENT 'yes,no',
  `verification_code` varchar(255) DEFAULT NULL,
  `last_login` timestamp NULL DEFAULT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'unverified'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sif_course`
--

CREATE TABLE `sif_course` (
  `id` int(10) NOT NULL,
  `institute_id` int(2) NOT NULL,
  `course_name` varchar(60) NOT NULL,
  `course_code` int(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` varchar(70) NOT NULL,
  `updated_at` datetime NOT NULL,
  `updated_by` varchar(80) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sif_course`
--

INSERT INTO `sif_course` (`id`, `institute_id`, `course_name`, `course_code`, `created_at`, `created_by`, `updated_at`, `updated_by`, `status`) VALUES
(27, 4, 'FCPS Part-1', 2, '2017-10-17 07:32:24', 'admin@bigm-bd.com', '0000-00-00 00:00:00', 'admin@bigm-bd.com', 1),
(28, 4, 'FCPS Part-2', 2, '2017-10-09 05:21:00', 'admin@bigm-bd.com', '0000-00-00 00:00:00', '', 1),
(29, 4, 'Residency', 3, '2017-10-09 05:21:15', 'admin@bigm-bd.com', '0000-00-00 00:00:00', '', 1),
(30, 4, 'MRC', 4, '2017-10-09 05:21:28', 'admin@bigm-bd.com', '0000-00-00 00:00:00', '', 1),
(31, 6, 'Diploma/M.philp', 1, '2017-10-17 07:32:38', 'admin@bigm-bd.com', '0000-00-00 00:00:00', 'admin@bigm-bd.com', 1),
(32, 6, 'Phase A', 2, '2017-10-09 05:23:00', 'admin@bigm-bd.com', '0000-00-00 00:00:00', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sif_exam_category`
--

CREATE TABLE `sif_exam_category` (
  `id` int(8) NOT NULL,
  `exam_category_name` varchar(60) NOT NULL,
  `cost_bdt` decimal(15,2) DEFAULT '0.00',
  `cost_usd` decimal(15,2) DEFAULT '0.00',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` varchar(90) NOT NULL,
  `updated_at` datetime NOT NULL,
  `updated_by` varchar(60) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sif_exam_category`
--

INSERT INTO `sif_exam_category` (`id`, `exam_category_name`, `cost_bdt`, `cost_usd`, `created_at`, `created_by`, `updated_at`, `updated_by`, `status`) VALUES
(1, 'Review Exam', '0.00', '0.00', '2017-10-15 08:20:08', 'admin@bigm-bd.com', '0000-00-00 00:00:00', 'admin@bigm-bd.com', 1),
(2, 'Faculty', '0.00', '0.00', '2017-10-15 08:03:30', 'admin@bigm-bd.com', '0000-00-00 00:00:00', '', 1),
(3, 'Model Test', '0.00', '0.00', '2017-10-15 08:03:33', 'admin@bigm-bd.com', '0000-00-00 00:00:00', '', 1),
(4, 'Mock Test', '0.00', '0.00', '2017-10-15 08:03:35', 'admin@bigm-bd.com', '0000-00-00 00:00:00', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sif_faculty`
--

CREATE TABLE `sif_faculty` (
  `id` int(10) NOT NULL,
  `institute_id` int(3) DEFAULT NULL,
  `course_id` int(10) NOT NULL,
  `faculty_code` int(1) NOT NULL,
  `faculty_name` varchar(80) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(80) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_by` varchar(80) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sif_faculty`
--

INSERT INTO `sif_faculty` (`id`, `institute_id`, `course_id`, `faculty_code`, `faculty_name`, `created_at`, `created_by`, `updated_at`, `updated_by`, `status`) VALUES
(30, 4, 28, 6, 'Combined', '2017-10-09 05:24:24', 'admin@bigm-bd.com', '2017-10-31 08:11:46', 'admin@bigm-bd.com', '1'),
(31, 4, 27, 2, 'Dentistry', '2017-10-09 05:24:56', 'admin@bigm-bd.com', '2017-10-31 08:12:18', 'admin@bigm-bd.com', '1'),
(32, 6, 31, 3, 'Medicine', '2017-10-09 05:25:13', 'admin@bigm-bd.com', '2017-10-31 08:17:14', 'admin@bigm-bd.com', '1'),
(33, 4, 28, 1, 'Medicine', '2017-10-09 05:25:29', 'admin@bigm-bd.com', '2017-10-31 08:12:33', 'admin@bigm-bd.com', '1'),
(34, NULL, 28, 2, 'Obs & Gynae', '2017-10-09 05:25:42', 'admin@bigm-bd.com', '0000-00-00 00:00:00', '', '1'),
(35, NULL, 28, 3, 'Paediatrics', '2017-10-09 05:25:53', 'admin@bigm-bd.com', '0000-00-00 00:00:00', '', '1'),
(36, 4, 29, 1, 'Surgery', '2017-10-09 05:26:28', 'admin@bigm-bd.com', '2017-10-31 13:39:39', 'admin@bigm-bd.com', '1'),
(37, NULL, 30, 2, 'MS', '2017-10-09 05:26:48', 'admin@bigm-bd.com', '0000-00-00 00:00:00', '', '1'),
(38, 6, 31, 1, 'Combined & Dental', '2017-10-09 05:38:25', 'admin@bigm-bd.com', '2017-10-31 08:12:05', 'admin@bigm-bd.com', '1'),
(39, 4, 28, 6, 'Neuro Sergary', '2017-10-31 07:41:22', 'admin@bigm-bd.com', '2017-10-31 07:42:24', 'admin@bigm-bd.com', '1'),
(40, 4, 30, 9, 'Basic Science', '2017-10-31 13:48:34', 'admin@bigm-bd.com', '2017-10-31 14:00:57', 'admin@bigm-bd.com', '1');

-- --------------------------------------------------------

--
-- Table structure for table `sif_general_info`
--

CREATE TABLE `sif_general_info` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `tagline` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `fb_id` varchar(35) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `website` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `ah_stu_fee` int(11) NOT NULL,
  `ah_tec_payment` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(100) NOT NULL,
  `updated_by` varchar(100) NOT NULL,
  `short_code` varchar(10) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sif_general_info`
--

INSERT INTO `sif_general_info` (`id`, `name`, `tagline`, `email`, `fb_id`, `address`, `phone`, `website`, `logo`, `ah_stu_fee`, `ah_tec_payment`, `created_at`, `created_by`, `updated_by`, `short_code`, `updated_at`, `status`) VALUES
(1, 'Genesis', 'Post Graduation Medical Orientation Center', 'info@genesis.com', 'genesis@gmail.com', '230/3 Elephant Road, Kataban Mor, Dhaka - 1205', '01764441544', 'http://www.genesis.com', 'upload/logo/8749a2daa73ce2b3d49e967c380cca58.png', 1, 2, '2017-03-01 10:31:48', '', '', 'GEN', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sif_groups`
--

CREATE TABLE `sif_groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sif_groups`
--

INSERT INTO `sif_groups` (`id`, `name`, `description`) VALUES
(1, 'super-admin', 'Super Admin'),
(2, 'admin', 'Admission/Payment'),
(3, 'editor', 'Result/Exam/Schedule'),
(4, 'teacher', 'Teacher');

-- --------------------------------------------------------

--
-- Table structure for table `sif_institute`
--

CREATE TABLE `sif_institute` (
  `id` int(10) NOT NULL,
  `sl` int(11) DEFAULT NULL,
  `institute_name` varchar(80) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` varchar(90) NOT NULL,
  `updated_by` varchar(100) DEFAULT NULL,
  `status` int(1) NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sif_institute`
--

INSERT INTO `sif_institute` (`id`, `sl`, `institute_name`, `created_at`, `created_by`, `updated_by`, `status`, `updated_at`) VALUES
(4, 1, 'BCPS', '2017-11-19 11:12:41', 'admin@bigm-bd.com', NULL, 1, NULL),
(5, 3, 'International', '2017-11-20 04:29:44', 'admin@bigm-bd.com', 'admin@bigm-bd.com', 1, NULL),
(6, 2, 'BSMMU', '2017-11-19 11:12:41', 'admin@bigm-bd.com', NULL, 1, NULL),
(8, 4, 'Under Graduate', '2017-11-19 11:12:41', 'admin@bigm-bd.com', NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sif_login_attempts`
--

CREATE TABLE `sif_login_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(15) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sif_subject`
--

CREATE TABLE `sif_subject` (
  `id` int(11) NOT NULL,
  `institute_id` int(2) NOT NULL,
  `course_id` int(2) NOT NULL,
  `faculty_id` int(2) NOT NULL,
  `subject_faculty_id` int(2) DEFAULT NULL,
  `subject` varchar(90) NOT NULL,
  `details` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` varchar(40) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(40) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sif_subject`
--

INSERT INTO `sif_subject` (`id`, `institute_id`, `course_id`, `faculty_id`, `subject_faculty_id`, `subject`, `details`, `created_at`, `created_by`, `updated_at`, `updated_by`, `status`) VALUES
(25, 4, 27, 30, 30, 'General Sergery', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid beatae cumque dolor dolores eaque eius enim est excepturi hic, molestiae odit omnis provident quisquam rem sint veritatis voluptates. Iste, laudantium.', '2017-11-20 10:11:07', 'admin@bigm-bd.com', NULL, '', 1),
(26, 4, 27, 30, 30, 'Neurology', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid beatae cumque dolor dolores eaque eius enim est excepturi hic, molestiae odit omnis provident quisquam rem sint veritatis voluptates. Iste, laudantium.', '2017-11-20 10:11:07', 'admin@bigm-bd.com', NULL, '', 1),
(27, 4, 28, 33, 33, 'cardiology cardiology cardiology', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid beatae cumque dolor dolores eaque eius enim est excepturi hic, molestiae odit omnis provident quisquam rem sint veritatis voluptates. Iste, laudantium.', '2017-11-20 10:11:11', 'admin@bigm-bd.com', NULL, 'admin@bigm-bd.com', 1),
(28, 4, 28, 33, 33, 'Radiology', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid beatae cumque dolor dolores eaque eius enim est excepturi hic, molestiae odit omnis provident quisquam rem sint veritatis voluptates. Iste, laudantium.', '2017-11-20 10:11:07', 'admin@bigm-bd.com', NULL, '', 1),
(29, 4, 28, 35, 35, 'paediatrics surgery', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid beatae cumque dolor dolores eaque eius enim est excepturi hic, molestiae odit omnis provident quisquam rem sint veritatis voluptates. Iste, laudantium.', '2017-11-20 10:11:07', 'admin@bigm-bd.com', NULL, '', 1),
(30, 6, 31, 38, 38, 'peed. Nephrology', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid beatae cumque dolor dolores eaque eius enim est excepturi hic, molestiae odit omnis provident quisquam rem sint veritatis voluptates. Iste, laudantium.', '2017-11-20 10:11:07', 'admin@bigm-bd.com', NULL, '', 1),
(31, 6, 31, 38, 38, 'pulmonology', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid beatae cumque dolor dolores eaque eius enim est excepturi hic, molestiae odit omnis provident quisquam rem sint veritatis voluptates. Iste, laudantium.', '2017-11-20 10:11:07', 'admin@bigm-bd.com', NULL, '', 1),
(32, 6, 31, 32, 32, 'Neuro-surgery', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid beatae cumque dolor dolores eaque eius enim est excepturi hic, molestiae odit omnis provident quisquam rem sint veritatis voluptates. Iste, laudantium.', '2017-11-20 10:11:07', 'admin@bigm-bd.com', NULL, 'admin@bigm-bd.com', 1),
(33, 4, 27, 31, 31, 'Neurology', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid beatae cumque dolor dolores eaque eius enim est excepturi hic, molestiae odit omnis provident quisquam rem sint veritatis voluptates. Iste, laudantium.', '2017-11-20 10:11:07', 'admin@bigm-bd.com', NULL, '', 1),
(34, 4, 27, 31, 31, 'cardiology12', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid beatae cumque dolor dolores eaque eius enim est excepturi hic, molestiae odit omnis provident quisquam rem sint veritatis voluptates. Iste, laudantium.', '2017-11-20 10:11:07', 'admin@bigm-bd.com', NULL, '', 1),
(35, 4, 27, 31, 31, 'Combained', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid beatae cumque dolor dolores eaque eius enim est excepturi hic, molestiae odit omnis provident quisquam rem sint veritatis voluptates. Iste, laudantium.', '2017-11-20 10:11:07', 'admin@bigm-bd.com', NULL, 'admin@bigm-bd.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sif_users`
--

CREATE TABLE `sif_users` (
  `id` int(11) UNSIGNED NOT NULL,
  `teacher_id` varchar(20) NOT NULL COMMENT 'Teacher ID',
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `password_view` varchar(100) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `image` varchar(200) NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Yes = 1, No = 0',
  `status` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sif_users`
--

INSERT INTO `sif_users` (`id`, `teacher_id`, `ip_address`, `username`, `password`, `password_view`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`, `image`, `deleted`, `status`) VALUES
(2, '0', '::1', 'admin@bigm-bd.com', '$2y$08$V8xS9dtX9i7VhC86rb9uhecdQfNitkGWG8WgKMAmK.IieL6eKrmwq', '123456', NULL, 'admin@bigm-bd.com', NULL, NULL, NULL, 'tqi.rWGpMdtk4ToWGF.NlO', 1474185190, 1511165537, 1, 'Admin', 'Istrator', '', '', '', 0, 1),
(9, '17020003', '::1', '01717036048', '$2y$08$cToKUuV32uuKvqc9jZpzcOWiuZvegp90NnIGg9owvUWZdYabrUvDW', 'VyjD2yrd', NULL, 'nahian@bigm-bd.com', NULL, NULL, NULL, 'WYcI.nIx4NaIfIk1nsqYMe', 1485946628, 1488950437, 1, 'Julkar', 'Nahian', NULL, NULL, 'upload/photo/Sh_(2).jpg', 0, 1),
(10, '17020004', '::1', '01911430370', '$2y$08$kKu5VAoL1Pg/A9uMk3pqp.A0tTiVNng2260gmv4OQU1bZbMN.5fJG', 'RJ42Ahep', NULL, 'mamun@bigm-bd@gmail.com', NULL, NULL, NULL, 'J9DXWoK0yhyvUds2npcm8O', 1485947522, 1487493413, 1, 'Abdullah', 'Mamun', NULL, NULL, 'upload/photo/17020004.jpg', 0, 1),
(11, '17020005', '::1', '01700000000', '$2y$08$GA6gMUvRsApB1EVZmk43gO9OEvsoL88lSF5sheWD0EpLdPXzgA2ei', 'y0PNd2Gl', NULL, 'nazmulhasan.cse@gmail.com', NULL, NULL, NULL, 'NPswS51Gksq0zDC690T9nu', 1486811723, 1488950053, 1, 'jahir', 'abbaus', NULL, '01700000000', 'upload/photo/17020005.jpg', 0, 1),
(12, '5', '::1', '0912740', '$2y$08$lc33tI7xvW3fom/RstCgyu0chKj6a53gII1uXATEnIjiXublNwrJm', '123456', NULL, 'nazmulhasan.cse@gmail.com', NULL, NULL, NULL, 'sUI6l4pWRqZKXutAP8oCE.', 1488264751, 1488950374, 1, 'Nazmul', 'Hasan', 'GENESIS', '01738750676', 'upload/exe_stuff_photo/300X300-r.jpg', 0, 1),
(13, '6', '::1', '9817419', '$2y$08$VoGYRHHLj4Ou4QQD6B6WteUHkR7QdnmWlKVya8Z2PSgl9ROXQgvq6', 'nazmul123', NULL, 'nazmulhasan.cse@gmail.com', NULL, NULL, NULL, '/UwO3n7LDdb9J.C1Zll03O', 1488264856, 1488275932, 1, 'Nazmul', 'Hasan', 'GENESIS', '01738750676', 'upload/exe_stuff_photo/01700000000.jpg', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sif_users_groups`
--

CREATE TABLE `sif_users_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sif_users_groups`
--

INSERT INTO `sif_users_groups` (`id`, `user_id`, `group_id`) VALUES
(3, 2, 1),
(8, 8, 4),
(9, 9, 4),
(10, 10, 4),
(11, 11, 4),
(19, 12, 3),
(17, 13, 2);

-- --------------------------------------------------------

--
-- Table structure for table `thanas`
--

CREATE TABLE `thanas` (
  `THANA_ID` varchar(6) DEFAULT NULL,
  `DISTRICT_ID` varchar(4) DEFAULT NULL,
  `THANA_CODE` varchar(2) DEFAULT NULL,
  `THANA_NAME` varchar(100) DEFAULT NULL,
  `ENTERED_BY` varchar(10) DEFAULT NULL,
  `ENTRY_TIMESTAMP` datetime DEFAULT NULL,
  `LAST_UPDATED_BY` varchar(10) DEFAULT NULL,
  `LAST_UPDATED_TIMESTAMP` datetime DEFAULT NULL,
  `AREA_STATUS` varchar(1) DEFAULT NULL,
  `DISTRICT_HQ` decimal(1,0) DEFAULT NULL,
  `M_STATUS` decimal(1,0) DEFAULT NULL,
  `SEQEAP` decimal(1,0) DEFAULT NULL,
  `THANA_NAMEB` varchar(50) DEFAULT NULL,
  `POP07` double DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `thanas`
--

INSERT INTO `thanas` (`THANA_ID`, `DISTRICT_ID`, `THANA_CODE`, `THANA_NAME`, `ENTERED_BY`, `ENTRY_TIMESTAMP`, `LAST_UPDATED_BY`, `LAST_UPDATED_TIMESTAMP`, `AREA_STATUS`, `DISTRICT_HQ`, `M_STATUS`, `SEQEAP`, `THANA_NAMEB`, `POP07`) VALUES
('023029', '0230', '29', 'FENI SADAR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '???? ???', NULL),
('023041', '0230', '41', 'FULGAZI', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '???????', NULL),
('023051', '0230', '51', 'PARSHURAM', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '???????', NULL),
('023094', '0230', '94', 'SONAGAZI', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '????????', NULL),
('024643', '0246', '43', 'DIGHINALA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '????????', NULL),
('024649', '0246', '49', 'KHAGRACHHARI SADAR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '???????? ???', NULL),
('024661', '0246', '61', 'LAKSHMICHHARI', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '??????????', NULL),
('024665', '0246', '65', 'MAHALCHHARI', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '???????', NULL),
('024667', '0246', '67', 'MANIKCHHARI', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '????????', NULL),
('024670', '0246', '70', 'MATIRANGA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '??????????', NULL),
('024677', '0246', '77', 'PANCHHARI', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '??????', NULL),
('024680', '0246', '80', 'RAMGARH', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '?????', NULL),
('025133', '0251', '33', 'KAMALNAGAR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '??????', NULL),
('025143', '0251', '43', 'LAKSHMIPUR SADAR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '?????????? ???', NULL),
('025158', '0251', '58', 'ROYPUR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '??????', NULL),
('025165', '0251', '65', 'RAMGANJ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '???????', NULL),
('025173', '0251', '73', 'RAMGATI', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '??????', NULL),
('027507', '0275', '07', 'BEGUMGANJ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '????????', NULL),
('027510', '0275', '10', 'CHATKHIL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '????????', NULL),
('027521', '0275', '21', 'COMPANIGANJ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '????????????', NULL),
('027536', '0275', '36', 'HATIYA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '??????', NULL),
('027547', '0275', '47', 'KABIRHAT', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '???????', NULL),
('027580', '0275', '80', 'SENBAGH', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '??????', NULL),
('027583', '0275', '83', 'SONAIMURI', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '?????????', NULL),
('027585', '0275', '85', 'SUBARNACHAR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '????????', NULL),
('027587', '0275', '87', 'NOAKHALI SADAR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '???????? ???', NULL),
('032665', '0326', '65', 'PALTAN', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '?????', NULL),
('032666', '0326', '66', 'RAMNA', NULL, NULL, NULL, NULL, 'C', NULL, NULL, NULL, '????', NULL),
('032668', '0326', '68', 'SABUJBAGH', NULL, NULL, NULL, NULL, 'C', NULL, NULL, NULL, '???????', NULL),
('032672', '0326', '72', 'SAVAR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '?????', NULL),
('032674', '0326', '74', 'SHAH ALI', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '????? ???', NULL),
('032675', '0326', '75', 'SHAHBAGH', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '??????', NULL),
('032676', '0326', '76', 'SHYAMPUR', NULL, NULL, NULL, NULL, 'C', NULL, NULL, NULL, '????????', NULL),
('032688', '0326', '88', 'SUTRAPUR', NULL, NULL, NULL, NULL, 'C', NULL, NULL, NULL, '?????????', NULL),
('032690', '0326', '90', 'TEJGAON', NULL, NULL, NULL, NULL, 'C', NULL, NULL, NULL, '???????', NULL),
('032692', '0326', '92', 'TEJGAON IND. AREA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '??????? ????? ?????', NULL),
('032693', '0326', '93', 'TURAG', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '?????', NULL),
('032695', '0326', '95', 'UTTARA', NULL, NULL, NULL, NULL, 'C', NULL, NULL, NULL, '??????', NULL),
('032696', '0326', '96', 'UTTAR KHAN', NULL, NULL, NULL, NULL, 'C', NULL, NULL, NULL, '????? ???', NULL),
('032903', '0329', '03', 'ALFADANGA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '????????????', NULL),
('032910', '0329', '10', 'BHANGA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '??????', NULL),
('032918', '0329', '18', 'BOALMARI', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '?????????', NULL),
('032921', '0329', '21', 'CHAR BHADRASAN', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '?? ???????', NULL),
('032947', '0329', '47', 'FARIDPUR SADAR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '??????? ???', NULL),
('032956', '0329', '56', 'MADHUKHALI', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '???????', NULL),
('032962', '0329', '62', 'NAGARKANDA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '?????????', NULL),
('032984', '0329', '84', 'SADARPUR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '??????', NULL),
('033330', '0333', '30', 'GAZIPUR SADAR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '??????? ???', NULL),
('033332', '0333', '32', 'KALIAKAIR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '?????????', NULL),
('033334', '0333', '34', 'KALIGANJ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '????????', NULL),
('033336', '0333', '36', 'KAPASIA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '????????', NULL),
('033386', '0333', '86', 'SREEPUR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '???????', NULL),
('033532', '0335', '32', 'GOPALGANJ SADAR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '????????? ???', NULL),
('033543', '0335', '43', 'KASHIANI', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '????????', NULL),
('033551', '0335', '51', 'KOTALIPARA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '??????????', NULL),
('033558', '0335', '58', 'MUKSUDPUR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '?????????', NULL),
('033591', '0335', '91', 'TUNGIPARA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '????????', NULL),
('033907', '0339', '07', 'BAKSHIGANJ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '??????????', NULL),
('033915', '0339', '15', 'DEWANGANJ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '??????????', NULL),
('033929', '0339', '29', 'ISLAMPUR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '????????', NULL),
('033936', '0339', '36', 'JAMALPUR SADAR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '???????? ???', NULL),
('033958', '0339', '58', 'MADARGANJ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '?????????', NULL),
('033961', '0339', '61', 'MELANDAHA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '???????', NULL),
('033985', '0339', '85', 'SARISHABARI UPAZILA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '????????? ??????', NULL),
('034802', '0348', '02', 'AUSTAGRAM', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '?????????', NULL),
('034806', '0348', '06', 'BAJITPUR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '????????', NULL),
('034811', '0348', '11', 'BHAIRAB', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '????', NULL),
('034827', '0348', '27', 'HOSSAINPUR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '????????', NULL),
('034833', '0348', '33', 'ITNA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '????', NULL),
('034842', '0348', '42', 'KARIMGANJ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '????????', NULL),
('034845', '0348', '45', 'KATIADI', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '???????', NULL),
('034849', '0348', '49', 'KISHOREGANJ SADAR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '????????? ???', NULL),
('034854', '0348', '54', 'KULIAR CHAR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '?????????', NULL),
('034859', '0348', '59', 'MITHAMAIN', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '??????', NULL),
('034876', '0348', '76', 'NIKLI', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '?????', NULL),
('034879', '0348', '79', 'PAKUNDIA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '??????????', NULL),
('034892', '0348', '92', 'TARAIL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '??????', NULL),
('035440', '0354', '40', 'KALKINI', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '???????', NULL),
('035454', '0354', '54', 'MADARIPUR SADAR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '????????? ???', NULL),
('035480', '0354', '80', 'RAJOIR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '?????', NULL),
('035487', '0354', '87', 'SHIB CHAR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '????? ??', NULL),
('035610', '0356', '10', 'DAULATPUR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '???????', NULL),
('035622', '0356', '22', 'GHIOR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '????', NULL),
('035628', '0356', '28', 'HARIRAMPUR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '?????????', NULL),
('035646', '0356', '46', 'MANIKGANJ SADAR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '????????? ???', NULL),
('035670', '0356', '70', 'SATURIA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '????????', NULL),
('035678', '0356', '78', 'SHIBALAYA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '??????', NULL),
('035682', '0356', '82', 'SINGAIR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '???????', NULL),
('035924', '0359', '24', 'GAZARIA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '???????', NULL),
('035944', '0359', '44', 'LOHAJANG', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '?????', NULL),
('035956', '0359', '56', 'MUNSHIGANJ SADAR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '?????????? ???', NULL),
('035974', '0359', '74', 'SERAJDIKHAN', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '??????????', NULL),
('035984', '0359', '84', 'SREENAGAR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '???????', NULL),
('035994', '0359', '94', 'TONGIBARI', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '??????????', NULL),
('036113', '0361', '13', 'BHALUKA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '??????', NULL),
('036116', '0361', '16', 'DHOBAURA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '???????', NULL),
('036120', '0361', '20', 'FULBARIA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '?????????', NULL),
('036122', '0361', '22', 'GAFFARGAON', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '???????', NULL),
('036123', '0361', '23', 'GAURIPUR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '???????', NULL),
('036124', '0361', '24', 'HALUAGHAT', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '?????????', NULL),
('036131', '0361', '31', 'ISHWARGANJ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '?????????', NULL),
('036152', '0361', '52', 'MYMENSINGH SADAR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '???????? ???', NULL),
('036165', '0361', '65', 'MUKTAGACHHA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '??????????', NULL),
('036172', '0361', '72', 'NANDAIL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '???????', NULL),
('036181', '0361', '81', 'PHULPUR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '??????', NULL),
('036194', '0361', '94', 'TRISHAL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '???????', NULL),
('036702', '0367', '02', 'ARAIHAZAR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '?????????', NULL),
('036704', '0367', '04', 'SONARGAON', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '?????????', NULL),
('036706', '0367', '06', 'BANDAR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '?????', NULL),
('036758', '0367', '58', 'NARAYANGANJ SADAR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '?????????? ???', NULL),
('036768', '0367', '68', 'RUPGANJ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '???????', NULL),
('036807', '0368', '07', 'BELABO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '??????', NULL),
('036852', '0368', '52', 'MANOHARDI', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '???????', NULL),
('036860', '0368', '60', 'NARSINGDI SADAR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '??????? ???', NULL),
('036863', '0368', '63', 'PALASH', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '????', NULL),
('036864', '0368', '64', 'ROYPURA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '???????', NULL),
('036876', '0368', '76', 'SHIBPUR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '??????', NULL),
('037204', '0372', '04', 'ATPARA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '??????', NULL),
('037209', '0372', '09', 'BARHATTA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '?????????', NULL),
('037218', '0372', '18', 'DURGAPUR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '?????????', NULL),
('037238', '0372', '38', 'KHALIAJURI', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '??????????', NULL),
('037240', '0372', '40', 'KALMAKANDA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '??????????', NULL),
('037247', '0372', '47', 'KENDUA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '????????', NULL),
('037256', '0372', '56', 'MADAN', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '??? ', NULL),
('037263', '0372', '63', 'MOHANGANJ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '????????', NULL),
('037274', '0372', '74', 'NETROKONA SADAR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '????????? ???', NULL),
('037283', '0372', '83', 'PURBADHALA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '????????', NULL),
('038207', '0382', '07', 'BALIAKANDI', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '????????????', NULL),
('038229', '0382', '29', 'GOALANDA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '????????', NULL),
('038273', '0382', '73', 'PANGSHA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '?????', NULL),
('038276', '0382', '76', 'RAJBARI SADAR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '??????? ???', NULL),
('038614', '0386', '14', 'BHEDARGANJ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '?????????', NULL),
('038625', '0386', '25', 'DAMUDYA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '????????', NULL),
('038636', '0386', '36', 'GOSAIRHAT', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '?????????', NULL),
('038665', '0386', '65', 'NARIA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '?????', NULL),
('038669', '0386', '69', 'SHARIATPUR SADAR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '???????? ???', NULL),
('038694', '0386', '94', 'ZANJIRA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '??????', NULL),
('038937', '0389', '37', 'JHENAIGATI', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '?????????', NULL),
('038967', '0389', '67', 'NAKLA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '????', NULL),
('038970', '0389', '70', 'NALITABARI', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '??????????', NULL),
('038988', '0389', '88', 'SHERPUR SADAR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '?????? ???', NULL),
('038990', '0389', '90', 'SREEBARDI', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '?????????', NULL),
('039309', '0393', '09', 'BASAIL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '??????', NULL),
('039319', '0393', '19', 'BHUAPUR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '???????', NULL),
('039323', '0393', '23', 'DELDUAR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '????????', NULL),
('039325', '0393', '25', 'DHANBARI', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '??????', NULL),
('039328', '0393', '28', 'GHATAIL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '??????', NULL),
('039338', '0393', '38', 'GOPALPUR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '????????', NULL),
('039347', '0393', '47', 'KALIHATI', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '????????', NULL),
('039357', '0393', '57', 'MADHUPUR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '??????', NULL),
('039366', '0393', '66', 'MIRZAPUR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '?????????', NULL),
('039376', '0393', '76', 'NAGARPUR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '???????', NULL),
('039385', '0393', '85', 'SAKHIPUR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '??????', NULL),
('039395', '0393', '95', 'TANGAIL SADAR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '???????? ???', NULL),
('040108', '0401', '08', 'BAGERHAT SADAR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '???????? ???', NULL),
('040114', '0401', '14', 'CHITALMARI', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '????????', NULL),
('040134', '0401', '34', 'FAKIRHAT', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '???????', NULL),
('040138', '0401', '38', 'KACHUA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '?????', NULL),
('040156', '0401', '56', 'MOLLAHAT', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '?????????', NULL),
('040158', '0401', '58', 'MONGLA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '??????', NULL),
('040160', '0401', '60', 'MORRELGANJ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '?????????', NULL),
('040173', '0401', '73', 'RAMPAL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '??????', NULL),
('040177', '0401', '77', 'SARANKHOLA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '???????', NULL),
('041807', '0418', '07', 'ALAMDANGA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '?????????', NULL),
('041823', '0418', '23', 'CHUADANGA SADAR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '?????????? ???', NULL),
('041831', '0418', '31', 'DAMURHUDA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '?????????', NULL),
('041855', '0418', '55', 'JIBAN NAGAR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '???? ???', NULL),
('044104', '0441', '04', 'ABHAYNAGAR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '??????', NULL),
('044109', '0441', '09', 'BAGHER PARA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '?????????', NULL),
('044111', '0441', '11', 'CHAUGACHHA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '??????', NULL),
('044123', '0441', '23', 'JHIKARGACHHA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '????????', NULL),
('044138', '0441', '38', 'KESHABPUR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '???????', NULL),
('044147', '0441', '47', 'KOTWALI', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '???????', NULL),
('044161', '0441', '61', 'MANIRAMPUR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '?????????', NULL),
('044190', '0441', '90', 'SHARSHA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '??????', NULL),
('044414', '0444', '14', 'HARINAKUNDA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '??????????', NULL),
('044419', '0444', '19', 'JHENAIDAH SADAR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '??????? ???', NULL),
('044433', '0444', '33', 'KALIGANJ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '????????', NULL),
('044442', '0444', '42', 'KOTCHANDPUR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '??????????', NULL),
('044471', '0444', '71', 'MAHESHPUR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '???????', NULL),
('044480', '0444', '80', 'SHAILKUPA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '???????', NULL),
('044712', '0447', '12', 'BATIAGHATA', NULL, NULL, NULL, NULL, 'C', NULL, NULL, NULL, '??????????', NULL),
('044717', '0447', '17', 'DACOPE', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '?????', NULL),
('044721', '0447', '21', 'DAULATPUR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '???????', NULL),
('044730', '0447', '30', 'DUMURIA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '????????', NULL),
('044740', '0447', '40', 'DIGHALIA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '???????', NULL),
('044745', '0447', '45', 'KHALISHPUR', NULL, NULL, NULL, NULL, 'C', NULL, NULL, NULL, '????????', NULL),
('044748', '0447', '48', 'KHAN JAHAN ALI', NULL, NULL, NULL, NULL, 'C', NULL, NULL, NULL, '??? ????? ???', NULL),
('044751', '0447', '51', 'KHULNA SADAR', NULL, NULL, NULL, NULL, 'C', NULL, NULL, NULL, '????? ???', NULL),
('044753', '0447', '53', 'KOYRA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '????', NULL),
('044764', '0447', '64', 'PAIKGACHHA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '????????', NULL),
('044769', '0447', '69', 'PHULTALA', NULL, NULL, NULL, NULL, 'C', NULL, NULL, NULL, '??????', NULL),
('044775', '0447', '75', 'RUPSA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '?????', NULL),
('044785', '0447', '85', 'SONADANGA', NULL, NULL, NULL, NULL, 'C', NULL, NULL, NULL, '??????????', NULL),
('044794', '0447', '94', 'TEROKHADA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '???????', NULL),
('045015', '0450', '15', 'BHERAMARA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '????????', NULL),
('045039', '0450', '39', 'DAULATPUR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '???????', NULL),
('045063', '0450', '63', 'KHOKSA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '???????', NULL),
('045071', '0450', '71', 'KUMARKHALI', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '????????', NULL),
('045079', '0450', '79', 'KUSHTIA SADAR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '???????? ???', NULL),
('045094', '0450', '94', 'MIRPUR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '??????', NULL),
('045557', '0455', '57', 'MAGURA SADAR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '?????? ???', NULL),
('045566', '0455', '66', 'MOHAMMADPUR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '?????????', NULL),
('045585', '0455', '85', 'SHALIKHA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '??????', NULL),
('045595', '0455', '95', 'SREEPUR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '???????', NULL),
('045747', '0457', '47', 'GANGNI', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '?????', NULL),
('045760', '0457', '60', 'MUJIB NAGAR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '???? ???', NULL),
('045787', '0457', '87', 'MEHERPUR SADAR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '???????? ???', NULL),
('046528', '0465', '28', 'KALIA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '??????', NULL),
('046552', '0465', '52', 'LOHAGARA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '???????', NULL),
('046576', '0465', '76', 'NARAIL SADAR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '????? ???', NULL),
('048704', '0487', '04', 'ASSASUNI', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '???????', NULL),
('048725', '0487', '25', 'DEBHATA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '???????', NULL),
('048743', '0487', '43', 'KALAROA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '???????', NULL),
('048747', '0487', '47', 'KALIGANJ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '????????', NULL),
('048782', '0487', '82', 'SATKHIRA SADAR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '????????? ???', NULL),
('048786', '0487', '86', 'SHYAMNAGAR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '????????', NULL),
('048790', '0487', '90', 'TALA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '????', NULL),
('051006', '0510', '06', 'ADAMDIGHI', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '???????', NULL),
('051020', '0510', '20', 'BOGRA SADAR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '????? ???', NULL),
('051027', '0510', '27', 'DHUNAT', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '????', NULL),
('051033', '0510', '33', 'DHUPCHANCHIA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '??????????', NULL),
('051040', '0510', '40', 'GABTALI', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '??????', NULL),
('051054', '0510', '54', 'KAHALOO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '??????', NULL),
('051067', '0510', '67', 'NANDIGRAM', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '??????????', NULL),
('051081', '0510', '81', 'SARIAKANDI', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '????????????', NULL),
('051085', '0510', '85', 'SHAJAHANPUR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '???????????', NULL),
('051088', '0510', '88', 'SHERPUR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '??????', NULL),
('051094', '0510', '94', 'SHIBGANJ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '?????????', NULL),
('051095', '0510', '95', 'SONATOLA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '???????', NULL),
('052710', '0527', '10', 'BIRAMPUR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '????????', NULL),
('052712', '0527', '12', 'BIRGANJ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '???????', NULL),
('052717', '0527', '17', 'BIRAL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '????', NULL),
('052721', '0527', '21', 'BOCHAGANJ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '?????????', NULL),
('052730', '0527', '30', 'CHIRIRBANDAR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '??????????', NULL),
('052738', '0527', '38', 'FULBARI', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '???????', NULL),
('052743', '0527', '43', 'GHORAGHAT', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '???????', NULL),
('052747', '0527', '47', 'HAKIMPUR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '????????', NULL),
('052756', '0527', '56', 'KAHAROLE', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '???????', NULL),
('052760', '0527', '60', 'KHANSAMA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '?????????', NULL),
('052764', '0527', '64', 'DINAJPUR SADAR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '???????? ???', NULL),
('052769', '0527', '69', 'NAWABGANJ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '?????????', NULL),
('052777', '0527', '77', 'PARBATIPUR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '??????????', NULL),
('053221', '0532', '21', 'FULCHHARI', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '??????', NULL),
('053224', '0532', '24', 'GAIBANDHA SADAR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '????????? ???', NULL),
('053230', '0532', '30', 'GOBINDAGANJ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '???????????', NULL),
('053267', '0532', '67', 'PALASHBARI', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '????????', NULL),
('053282', '0532', '82', 'SADULLAPUR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '???????????', NULL),
('053288', '0532', '88', 'SAGHATA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '??????', NULL),
('053291', '0532', '91', 'SUNDARGANJ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '??????????', NULL),
('053813', '0538', '13', 'AKKELPUR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '?????????', NULL),
('053847', '0538', '47', 'JOYPURHAT SADAR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '???????? ???', NULL),
('053858', '0538', '58', 'KALAI', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '?????', NULL),
('053861', '0538', '61', 'KHETLAL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '????????', NULL),
('053874', '0538', '74', 'PANCHBIBI', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '????????', NULL),
('054906', '0549', '06', 'BHURUNGAMARI', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '????????????', NULL),
('054908', '0549', '08', 'CHAR RAJIBPUR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '?? ????????', NULL),
('054909', '0549', '09', 'CHILMARI', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '???????', NULL),
('054918', '0549', '18', 'PHULBARI', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '???????', NULL),
('054952', '0549', '52', 'KURIGRAM SADAR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '????????? ???', NULL),
('054961', '0549', '61', 'NAGESHWARI', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '?????????', NULL),
('054977', '0549', '77', 'RAJARHAT', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '????????', NULL),
('054979', '0549', '79', 'RAUMARI', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '??????', NULL),
('054994', '0549', '94', 'ULIPUR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '??????', NULL),
('055202', '0552', '02', 'ADITMARI', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '????????', NULL),
('055233', '0552', '33', 'HATIBANDHA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '??????????', NULL),
('055239', '0552', '39', 'KALIGANJ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '????????', NULL),
('055255', '0552', '55', 'LALMONIRHAT SADAR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '?????????? ???', NULL),
('055270', '0552', '70', 'PATGRAM', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '????????', NULL),
('056403', '0564', '03', 'ATRAI', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '??????', NULL),
('056406', '0564', '06', 'BADALGACHHI', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '????????', NULL),
('056428', '0564', '28', 'DHAMOIRHAT', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '????????', NULL),
('056447', '0564', '47', 'MANDA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '??????', NULL),
('056450', '0564', '50', 'MAHADEBPUR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '?????????', NULL),
('056460', '0564', '60', 'NAOGAON SADAR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '????? ???', NULL),
('056469', '0564', '69', 'NIAMATPUR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '?????????', NULL),
('056475', '0564', '75', 'PATNITALA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '????????', NULL),
('056479', '0564', '79', 'PORSHA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '?????', NULL),
('056485', '0564', '85', 'RANINAGAR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '???????', NULL),
('056486', '0564', '86', 'SAPAHAR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '???????', NULL),
('056909', '0569', '09', 'BAGATIPARA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '??????????', NULL),
('056915', '0569', '15', 'BARAIGRAM', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '????????', NULL),
('056941', '0569', '41', 'GURUDASPUR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '??????????', NULL),
('056944', '0569', '44', 'LALPUR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '??????', NULL),
('056963', '0569', '63', 'NATORE SADAR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '????? ???', NULL),
('056991', '0569', '91', 'SINGRA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '?????', NULL),
('057018', '0570', '18', 'BHOLAHAT', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '???????', NULL),
('057037', '0570', '37', 'GOMASTAPUR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '??????????', NULL),
('057056', '0570', '56', 'NACHOLE', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '?????', NULL),
('057066', '0570', '66', 'CHAPAI NABABGANJ SADAR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '?????? ???????? ???', NULL),
('057088', '0570', '88', 'SHIBGANJ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '???????', NULL),
('057312', '0573', '12', 'DIMLA UPAZILA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '??????? ??????', NULL),
('057315', '0573', '15', 'DOMAR UPAZILA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '????? ??????', NULL),
('057336', '0573', '36', 'JALDHAKA UPAZILA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '?????? ??????', NULL),
('057345', '0573', '45', 'KISHOREGANJ UPAZILA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '????????? ??????', NULL),
('057364', '0573', '64', 'NILPHAMARI SADAR UPAZ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '????????? ??? ??????', NULL),
('057385', '0573', '85', 'SAIDPUR UPAZILA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '??????? ??????', NULL),
('057605', '0576', '05', 'ATGHARIA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '???????', NULL),
('057616', '0576', '16', 'BERA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '????', NULL),
('057619', '0576', '19', 'BHANGURA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '????????', NULL),
('057622', '0576', '22', 'CHATMOHAR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '?????????', NULL),
('057633', '0576', '33', 'FARIDPUR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '???????', NULL),
('057639', '0576', '39', 'ISHWARDI', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '???????', NULL),
('057655', '0576', '55', 'PABNA SADAR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '????? ???', NULL),
('057672', '0576', '72', 'SANTHIA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '???????', NULL),
('057683', '0576', '83', 'SUJANAGAR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '???????', NULL),
('057704', '0577', '04', 'ATWARI', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '???????', NULL),
('057725', '0577', '25', 'BODA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '????', NULL),
('057734', '0577', '34', 'DEBIGANJ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '????????', NULL),
('057773', '0577', '73', 'PANCHAGARH SADAR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '?????? ???', NULL),
('057790', '0577', '90', 'TENTULIA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '?????????', NULL),
('058110', '0581', '10', 'BAGHA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '????', NULL),
('058112', '0581', '12', 'BAGHMARA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '???????', NULL),
('058122', '0581', '22', 'BOALIA', NULL, NULL, NULL, NULL, 'C', NULL, NULL, NULL, '????????', NULL),
('058125', '0581', '25', 'CHARGHAT', NULL, NULL, NULL, NULL, 'C', NULL, NULL, NULL, '??????', NULL),
('058131', '0581', '31', 'DURGAPUR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '?????????', NULL),
('058134', '0581', '34', 'GODAGARI', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '????????', NULL),
('058140', '0581', '40', 'MATIHAR', NULL, NULL, NULL, NULL, 'C', NULL, NULL, NULL, '??????', NULL),
('058153', '0581', '53', 'MOHANPUR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '???????', NULL),
('058172', '0581', '72', 'PABA', NULL, NULL, NULL, NULL, 'C', NULL, NULL, NULL, '???', NULL),
('058182', '0581', '82', 'PUTHIA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '??????', NULL),
('058185', '0581', '85', 'RAJPARA', NULL, NULL, NULL, NULL, 'C', NULL, NULL, NULL, '???????', NULL),
('058190', '0581', '90', 'SHAH MAKHDUM', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '????? ?????', NULL),
('058194', '0581', '94', 'TANORE', NULL, NULL, NULL, NULL, 'C', NULL, NULL, NULL, '?????', NULL),
('058503', '0585', '03', 'BADARGANJ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '???????', NULL),
('058527', '0585', '27', 'GANGACHARA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '???????', NULL),
('058542', '0585', '42', 'KAUNIA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '???????', NULL),
('058549', '0585', '49', 'RANGPUR SADAR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '????? ???', NULL),
('058558', '0585', '58', 'MITHA PUKUR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '?????????', NULL),
('058573', '0585', '73', 'PIRGACHHA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '???????', NULL),
('058576', '0585', '76', 'PIRGANJ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '???????', NULL),
('058592', '0585', '92', 'TARAGANJ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '????????', NULL),
('058811', '0588', '11', 'BELKUCHI', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '???????', NULL),
('058827', '0588', '27', 'CHAUHALI', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '??????', NULL),
('058844', '0588', '44', 'KAMARKHANDA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '???????????', NULL),
('058850', '0588', '50', 'KAZIPUR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '???????', NULL),
('058861', '0588', '61', 'ROYGANJ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '???????', NULL),
('058867', '0588', '67', 'SHAHJADPUR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '?????????', NULL),
('058878', '0588', '78', 'SIRAJGANJ SADAR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '????????? ???', NULL),
('058889', '0588', '89', 'TARASH', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '?????', NULL),
('058894', '0588', '94', 'ULLAH PARA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '????? ????', NULL),
('059408', '0594', '08', 'BALIADANGI', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '???????????', NULL),
('059451', '0594', '51', 'HARIPUR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '??????', NULL),
('059482', '0594', '82', 'PIRGANJ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '???????', NULL),
('059486', '0594', '86', 'RANISANKAIL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '?????????', NULL),
('059494', '0594', '94', 'THAKURGAON SADAR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '????????? ???', NULL),
('063602', '0636', '02', 'AJMIRIGANJ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '??????????', NULL),
('063605', '0636', '05', 'BAHUBAL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '??????', NULL),
('063611', '0636', '11', 'BANIACHONG', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '????????', NULL),
('063626', '0636', '26', 'CHUNARUGHAT', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '?????????', NULL),
('063644', '0636', '44', 'HABIGANJ SADAR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '??????? ???', NULL),
('063668', '0636', '68', 'LAKHAI', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '?????', NULL),
('063671', '0636', '71', 'MADHABPUR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '???????', NULL),
('063677', '0636', '77', 'NABIGANJ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '???????', NULL),
('065814', '0658', '14', 'BARLEKHA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '??????', NULL),
('065835', '0658', '35', 'JURI', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '????', NULL),
('065856', '0658', '56', 'KAMALGANJ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '???????', NULL),
('065865', '0658', '65', 'KULAURA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '???????', NULL),
('065874', '0658', '74', 'MAULVIBAZAR SADAR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '?????????? ???', NULL),
('065880', '0658', '80', 'RAJNAGAR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '??????', NULL),
('065883', '0658', '83', 'SREEMANGAL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '?????????', NULL),
('069018', '0690', '18', 'BISHWAMBARPUR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '????????????', NULL),
('069023', '0690', '23', 'CHHATAK', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '????', NULL),
('069027', '0690', '27', 'DAKSHIN SUNAMGANJ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '?????? ?????????', NULL),
('069029', '0690', '29', 'DERAI', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '?????', NULL),
('069032', '0690', '32', 'DHARAMPASHA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '????????', NULL),
('069033', '0690', '33', 'DOWARABAZAR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '????? ?????', NULL),
('069047', '0690', '47', 'JAGANNATHPUR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '??????????', NULL),
('069050', '0690', '50', 'JAMALGANJ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '?????????', NULL),
('069086', '0690', '86', 'SULLA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '??????', NULL),
('069089', '0690', '89', 'SUNAMGANJ SADAR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '????????? ???', NULL),
('069092', '0690', '92', 'TAHIRPUR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '????????', NULL),
('069108', '0691', '08', 'BALAGANJ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '????????', NULL),
('069117', '0691', '17', 'BEANI BAZAR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '?????? ?????', NULL),
('069120', '0691', '20', 'BISHWANATH', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '????????', NULL),
('069127', '0691', '27', 'COMPANIGANJ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '????????????', NULL),
('069131', '0691', '31', 'DAKSHIN SURMA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '?????? ?????', NULL),
('069135', '0691', '35', 'FENCHUGANJ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '??????????', NULL),
('069138', '0691', '38', 'GOLAPGANJ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '?????????', NULL),
('069141', '0691', '41', 'GOWAINGHAT', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '?????????', NULL),
('069153', '0691', '53', 'JAINTIAPUR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '?????????', NULL),
('069159', '0691', '59', 'KANAIGHAT', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '????????', NULL),
('069162', '0691', '62', 'SYLHET SADAR', NULL, NULL, NULL, NULL, 'C', NULL, NULL, NULL, '????? ???', NULL),
('069194', '0691', '94', 'ZAKIGANJ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '???????', NULL),
('033387', '0333', '87', 'TONGI', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('028407', '0284', '07', 'BAGHAICHHARI', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '????????', NULL),
('028421', '0284', '21', 'BARKAL UPAZILA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '????', NULL),
('028425', '0284', '25', 'KAWKHALI (BETBUNIA)', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '??????? ?????????', NULL),
('028429', '0284', '29', 'BELAI CHHARI  UPAZI', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '????????', NULL),
('028436', '0284', '36', 'KAPTAI  UPAZILA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '???????', NULL),
('028447', '0284', '47', 'JURAI CHHARI UPAZIL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '???????', NULL),
('028458', '0284', '58', 'LANGADU  UPAZILA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '???????', NULL),
('028475', '0284', '75', 'NANIARCHAR  UPAZILA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '?????????', NULL),
('028478', '0284', '78', 'RAJASTHALI  UPAZILA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '?????????', NULL),
('028487', '0284', '87', 'RANGAMATI SADAR  UP', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '??????????', NULL),
('032602', '0326', '02', 'ADABOR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '?????', NULL),
('032604', '0326', '04', 'BADDA', NULL, NULL, NULL, NULL, 'C', NULL, NULL, NULL, '??????', NULL),
('032606', '0326', '06', 'BIMAN BANDAR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '????? ?????', NULL),
('032608', '0326', '08', 'CANTONMENT', NULL, NULL, NULL, NULL, 'C', NULL, NULL, NULL, '?????????????', NULL),
('032610', '0326', '10', 'DAKSHINKHAN', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '?????????', NULL),
('032612', '0326', '12', 'DEMRA', NULL, NULL, NULL, NULL, 'C', NULL, NULL, NULL, '?????', NULL),
('032614', '0326', '14', 'DHAMRAI', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '??????', NULL),
('032616', '0326', '16', 'DHANMONDI', NULL, NULL, NULL, NULL, 'C', NULL, NULL, NULL, '????????', NULL),
('032618', '0326', '18', 'DOHAR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '?????', NULL),
('032626', '0326', '26', 'GULSHAN', NULL, NULL, NULL, NULL, 'C', NULL, NULL, NULL, '??????', NULL),
('032628', '0326', '28', 'HAZARIBAGH', NULL, NULL, NULL, NULL, 'C', NULL, NULL, NULL, '?????????', NULL),
('032629', '0326', '29', 'JATRABARI', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '??????????', NULL),
('032630', '0326', '30', 'KAFRUL', NULL, NULL, NULL, NULL, 'C', NULL, NULL, NULL, '??????', NULL),
('032634', '0326', '34', 'KAMRANGIR CHAR', NULL, NULL, NULL, NULL, 'C', NULL, NULL, NULL, '?????????? ??', NULL),
('032636', '0326', '36', 'KHILGAON', NULL, NULL, NULL, NULL, 'C', NULL, NULL, NULL, '??????', NULL),
('032637', '0326', '37', 'KHILKHET', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '????????', NULL),
('032638', '0326', '38', 'KERANIGANJ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '??????????', NULL),
('032640', '0326', '40', 'KOTWALI', NULL, NULL, NULL, NULL, 'C', NULL, NULL, NULL, '???????', NULL),
('032642', '0326', '42', 'LALBAGH', NULL, NULL, NULL, NULL, 'C', NULL, NULL, NULL, '??????', NULL),
('032648', '0326', '48', 'MIRPUR', NULL, NULL, NULL, NULL, 'C', NULL, NULL, NULL, '??????', NULL),
('032650', '0326', '50', 'MOHAMMADPUR', NULL, NULL, NULL, NULL, 'C', NULL, NULL, NULL, '???????????', NULL),
('032654', '0326', '54', 'MOTIJHEEL', NULL, NULL, NULL, NULL, 'C', NULL, NULL, NULL, '??????', NULL),
('032662', '0326', '62', 'NAWABGANJ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '?????????', NULL),
('032663', '0326', '63', 'NEW MARKET', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '??? ???????', NULL),
('032664', '0326', '64', 'PALLABI', NULL, NULL, NULL, NULL, 'C', NULL, NULL, NULL, '??????', NULL),
('010409', '0104', '09', 'AMTALI', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '?????', NULL),
('010419', '0104', '19', 'BAMNA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '?????', NULL),
('010428', '0104', '28', 'BARGUNA SADAR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '?????? ???', NULL),
('010447', '0104', '47', 'BETAGI', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '??????', NULL),
('010485', '0104', '85', 'PATHARGHATA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '????????', NULL),
('010602', '0106', '02', 'AGAILJHARA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '???????', NULL),
('010603', '0106', '03', 'BABUGANJ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '????????', NULL),
('010607', '0106', '07', 'BAKERGANJ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '?????????', NULL),
('010610', '0106', '10', 'BANARI PARA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '?????? ????', NULL),
('010632', '0106', '32', 'GAURNADI', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '??????', NULL),
('010636', '0106', '36', 'HIZLA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '?????', NULL),
('010651', '0106', '51', 'BARISAL SADAR (KOTWALI)', NULL, NULL, NULL, NULL, 'C', NULL, NULL, NULL, '?????? ??? (???????)', NULL),
('010662', '0106', '62', 'MHENDIGANJ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '????????????', NULL),
('010669', '0106', '69', 'MULADI', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '??????', NULL),
('010694', '0106', '94', 'WAZIRPUR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '???????', NULL),
('010918', '0109', '18', 'BHOLA SADAR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '???? ???', NULL),
('010921', '0109', '21', 'BURHANUDDIN', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '????????????', NULL),
('010925', '0109', '25', 'CHAR FASSON', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '?? ??????', NULL),
('010929', '0109', '29', 'DAULAT KHAN', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '???? ???', NULL),
('010954', '0109', '54', 'LALMOHAN', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '???????', NULL),
('010965', '0109', '65', 'MANPURA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '??????', NULL),
('010991', '0109', '91', 'TAZUMUDDIN', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '?????????', NULL),
('014240', '0142', '40', 'JHALOKATI SADAR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '??????? ???', NULL),
('014243', '0142', '43', 'KANTHALIA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '?????????', NULL),
('014273', '0142', '73', 'NALCHITY', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '??????', NULL),
('014284', '0142', '84', 'RAJAPUR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '???????', NULL),
('017838', '0178', '38', 'BAUPHAL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '?????', NULL),
('017852', '0178', '52', 'DASHMINA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '????????', NULL),
('017855', '0178', '55', 'DUMKI UPAZILA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '??????? ??????', NULL),
('017857', '0178', '57', 'GALACHIPA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '???????', NULL),
('017866', '0178', '66', 'KALA PARA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '???????', NULL),
('017876', '0178', '76', 'MIRZAGANJ UPAZILA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '?????????? ??????', NULL),
('017895', '0178', '95', 'PATUAKHALI SADAR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '????????? ???', NULL),
('017914', '0179', '14', 'BHANDARIA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '??????????', NULL),
('017947', '0179', '47', 'KAWKHALI', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '???????', NULL),
('017958', '0179', '58', 'MATHBARIA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '????????', NULL),
('017976', '0179', '76', 'NAZIRPUR UPAZILA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '????????', NULL),
('017980', '0179', '80', 'PIROJPUR SADAR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '???????? ???', NULL),
('017987', '0179', '87', 'NESARABAD (SWARUPKATI)', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '?????????(??????????)', NULL),
('017990', '0179', '90', 'ZIANAGAR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '???????', NULL),
('020304', '0203', '04', 'ALIKADAM', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '??????', NULL),
('020314', '0203', '14', 'BANDARBAN SADAR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '???????? ???', NULL),
('020351', '0203', '51', 'LAMA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '????', NULL),
('020373', '0203', '73', 'NAIKHONGCHHARI', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '????????????', NULL),
('020389', '0203', '89', 'ROWANGCHHARI', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '????????', NULL),
('020391', '0203', '91', 'RUMA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '????', NULL),
('020395', '0203', '95', 'THANCHI', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '?????', NULL),
('021202', '0212', '02', 'AKHAURA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '??????', NULL),
('021204', '0212', '04', 'BANCHHARAMPUR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '????????????', NULL),
('021213', '0212', '13', 'BRAHMANBARIA SADAR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '???????????????? ???', NULL),
('021233', '0212', '33', 'ASHUGANJ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '???????', NULL),
('021263', '0212', '63', 'KASBA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '??????', NULL),
('021285', '0212', '85', 'NABINAGAR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '??????', NULL),
('021290', '0212', '90', 'NASIRNAGAR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '????????', NULL),
('021294', '0212', '94', 'SARAIL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '?????', NULL),
('021322', '0213', '22', 'CHANDPUR SADAR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '??????? ???', NULL),
('021345', '0213', '45', 'FARIDGANJ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '????????', NULL),
('021347', '0213', '47', 'HAIM CHAR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '??????', NULL),
('021349', '0213', '49', 'HAJIGANJ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '????????', NULL),
('021358', '0213', '58', 'KACHUA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '?????', NULL);
INSERT INTO `thanas` (`THANA_ID`, `DISTRICT_ID`, `THANA_CODE`, `THANA_NAME`, `ENTERED_BY`, `ENTRY_TIMESTAMP`, `LAST_UPDATED_BY`, `LAST_UPDATED_TIMESTAMP`, `AREA_STATUS`, `DISTRICT_HQ`, `M_STATUS`, `SEQEAP`, `THANA_NAMEB`, `POP07`) VALUES
('021376', '0213', '76', 'MATLAB DAKSHIN', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '???? ??????', NULL),
('021379', '0213', '79', 'MATLAB UTTAR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '???? ?????', NULL),
('021395', '0213', '95', 'SHAHRASTI', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '??????????', NULL),
('021504', '0215', '04', 'ANOWARA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '???????', NULL),
('021506', '0215', '06', 'BAYEJID BOSTAMI', NULL, NULL, NULL, NULL, 'C', NULL, NULL, NULL, '?????? ????????', NULL),
('021508', '0215', '08', 'BANSHKHALI', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '????????', NULL),
('021510', '0215', '10', 'BAKALIA', NULL, NULL, NULL, NULL, 'C', NULL, NULL, NULL, '???????', NULL),
('021512', '0215', '12', 'BOALKHALI', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '?????????', NULL),
('021518', '0215', '18', 'CHANDANAISH', NULL, NULL, NULL, NULL, 'C', NULL, NULL, NULL, '?????????', NULL),
('021519', '0215', '19', 'CHANDGAON', NULL, NULL, NULL, NULL, 'C', NULL, NULL, NULL, '???????', NULL),
('021520', '0215', '20', 'CHITTAGONG PORT', NULL, NULL, NULL, NULL, 'C', NULL, NULL, NULL, '????????? ?????', NULL),
('021528', '0215', '28', 'DOUBLE MOORING', NULL, NULL, NULL, NULL, 'C', NULL, NULL, NULL, '???? ?????', NULL),
('021533', '0215', '33', 'FATIKCHHARI', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '???????', NULL),
('021535', '0215', '35', 'HALISHAHAR', NULL, NULL, NULL, NULL, 'C', NULL, NULL, NULL, '???????', NULL),
('021537', '0215', '37', 'HATHAZARI', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '?????????', NULL),
('021541', '0215', '41', 'KOTWALI', NULL, NULL, NULL, NULL, 'C', NULL, NULL, NULL, '???????', NULL),
('021543', '0215', '43', 'KHULSHI', NULL, NULL, NULL, NULL, 'C', NULL, NULL, NULL, '?????', NULL),
('021547', '0215', '47', 'LOHAGARA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '????????', NULL),
('021553', '0215', '53', 'MIRSHARAI', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '?????????', NULL),
('021555', '0215', '55', 'PAHARTALI', NULL, NULL, NULL, NULL, 'C', NULL, NULL, NULL, '????????', NULL),
('021557', '0215', '57', 'PANCHLAISH', NULL, NULL, NULL, NULL, 'C', NULL, NULL, NULL, '????????', NULL),
('021561', '0215', '61', 'PATIYA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '?????', NULL),
('021565', '0215', '65', 'PATENGA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '???????', NULL),
('021570', '0215', '70', 'RANGUNIA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '??????????', NULL),
('021574', '0215', '74', 'RAOZAN', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '??????', NULL),
('021578', '0215', '78', 'SANDWIP', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '??????', NULL),
('021582', '0215', '82', 'SATKANIA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '?????????', NULL),
('021586', '0215', '86', 'SITAKUNDA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '?????????', NULL),
('021909', '0219', '09', 'BARURA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '?????', NULL),
('021915', '0219', '15', 'BRAHMAN PARA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '?????????? ????', NULL),
('021918', '0219', '18', 'BURICHANG', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '??????', NULL),
('021927', '0219', '27', 'CHANDINA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '???????', NULL),
('021931', '0219', '31', 'CHAUDDAGRAM', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '??????????', NULL),
('021933', '0219', '33', 'COMILLA SADAR DAKSHIN', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '???????? ??? ??????', NULL),
('021936', '0219', '36', 'DAUDKANDI', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '??????????', NULL),
('021940', '0219', '40', 'DEBIDWAR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '?????????', NULL),
('021954', '0219', '54', 'HOMNA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '?????', NULL),
('021967', '0219', '67', 'COMILLA ADARSHA SADAR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '???????? ????? ???', NULL),
('021972', '0219', '72', 'LAKSAM', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '??????', NULL),
('021974', '0219', '74', 'MANOHARGANJ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '?????????', NULL),
('021975', '0219', '75', 'MEGHNA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '?????', NULL),
('021981', '0219', '81', 'MURADNAGAR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '????????', NULL),
('021987', '0219', '87', 'NANGALKOT', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '?????????', NULL),
('021994', '0219', '94', 'TITAS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '?????', NULL),
('022216', '0222', '16', 'CHAKARIA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '??????', NULL),
('022224', '0222', '24', 'COX\'S BAZAR SADAR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '????????? ???', NULL),
('022245', '0222', '45', 'KUTUBDIA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '?????????', NULL),
('022249', '0222', '49', 'MAHESHKHALI', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '????????', NULL),
('022256', '0222', '56', 'PEKUA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '??????', NULL),
('022266', '0222', '66', 'RAMU', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '????', NULL),
('022290', '0222', '90', 'TEKNAF', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '????????', NULL),
('022294', '0222', '94', 'UKHIA UPAZILA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '????? ??????', NULL),
('023014', '0230', '14', 'CHHAGALNAIYA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '?????????', NULL),
('023025', '0230', '25', 'DAGANBHUIYAN', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '?????????', NULL),
('999401', '9994', '01', 'ABU DHABI', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('999501', '9995', '01', 'DOHA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('999601', '9996', '01', 'RIYADH', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('999602', '9996', '02', 'JEDDA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('999701', '9997', '01', 'MANAMA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('999801', '9998', '01', 'TRIPOLI', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('032985', '0329', '85', 'SHALTHA', 'BANADMIN06', '2010-10-01 11:39:18', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `password_view` varchar(100) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `password_view`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`, `image`) VALUES
(1, '127.0.0.1', 'admin', '$2y$08$JZyO9qvhjO/6nBnNuRnef.58iozyqBxUokm2r/gwkmtXb3OUxHXqm', '123456', '', 'admin@bigm-bd.com', '', 'w-64spBkm7nsXiiFkkwM.5e4326259aafc12eec', 1487585205, NULL, 1268889823, 1489035975, 1, 'Admin', 'istrator', 'ADMIN', '0', 'uploads/users/f5a774a3b093974bab2339ec4aa1b3c6.png'),
(5, '::1', 'jnahian', '$2y$08$KOop2xTcWamFdHe3HcOKnuWtNOnuSNSyou3ecGAOR.R2DNtBTt5fq', 'julkar99', NULL, 'nahian_is@yahoo.com', NULL, NULL, NULL, NULL, 1487743846, 1487745223, 1, 'Julkar Naen', 'Nahian', NULL, '01717036048', 'uploads/users/326ef2b4c18bd645d426c6399d63ba01.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE `users_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(17, 1, 1),
(14, 5, 1),
(15, 6, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oe_chapter`
--
ALTER TABLE `oe_chapter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oe_doc_address`
--
ALTER TABLE `oe_doc_address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oe_doc_educations`
--
ALTER TABLE `oe_doc_educations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `oe_doc_educations_id_uindex` (`id`);

--
-- Indexes for table `oe_doc_master`
--
ALTER TABLE `oe_doc_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oe_doc_referance`
--
ALTER TABLE `oe_doc_referance`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `oe_doc_referance_id_uindex` (`id`);

--
-- Indexes for table `oe_exam`
--
ALTER TABLE `oe_exam`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oe_exam_question`
--
ALTER TABLE `oe_exam_question`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oe_medical_college`
--
ALTER TABLE `oe_medical_college`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oe_news`
--
ALTER TABLE `oe_news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oe_qns_chapter_relatn`
--
ALTER TABLE `oe_qns_chapter_relatn`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sub_id` (`chapter_id`);

--
-- Indexes for table `oe_qns_topic_relatn`
--
ALTER TABLE `oe_qns_topic_relatn`
  ADD PRIMARY KEY (`id`),
  ADD KEY `topic_id` (`topic_id`);

--
-- Indexes for table `oe_qsn_bnk_ans`
--
ALTER TABLE `oe_qsn_bnk_ans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `master_ref_id` (`master_ref_id`);

--
-- Indexes for table `oe_qsn_bnk_master`
--
ALTER TABLE `oe_qsn_bnk_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oe_sessions`
--
ALTER TABLE `oe_sessions`
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Indexes for table `oe_topics`
--
ALTER TABLE `oe_topics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oe_users`
--
ALTER TABLE `oe_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login_email` (`login_email`),
  ADD KEY `login_email_2` (`login_email`);

--
-- Indexes for table `sif_course`
--
ALTER TABLE `sif_course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sif_exam_category`
--
ALTER TABLE `sif_exam_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sif_faculty`
--
ALTER TABLE `sif_faculty`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sif_general_info`
--
ALTER TABLE `sif_general_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sif_groups`
--
ALTER TABLE `sif_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sif_institute`
--
ALTER TABLE `sif_institute`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sif_login_attempts`
--
ALTER TABLE `sif_login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sif_subject`
--
ALTER TABLE `sif_subject`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sif_users`
--
ALTER TABLE `sif_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `sif_users_groups`
--
ALTER TABLE `sif_users_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  ADD KEY `fk_users_groups_users1_idx` (`user_id`),
  ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  ADD KEY `fk_users_groups_users1_idx` (`user_id`),
  ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `notice`
--
ALTER TABLE `notice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `oe_chapter`
--
ALTER TABLE `oe_chapter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `oe_doc_address`
--
ALTER TABLE `oe_doc_address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;
--
-- AUTO_INCREMENT for table `oe_doc_educations`
--
ALTER TABLE `oe_doc_educations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;
--
-- AUTO_INCREMENT for table `oe_doc_master`
--
ALTER TABLE `oe_doc_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `oe_doc_referance`
--
ALTER TABLE `oe_doc_referance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT for table `oe_exam`
--
ALTER TABLE `oe_exam`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `oe_exam_question`
--
ALTER TABLE `oe_exam_question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT for table `oe_medical_college`
--
ALTER TABLE `oe_medical_college`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;
--
-- AUTO_INCREMENT for table `oe_news`
--
ALTER TABLE `oe_news`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `oe_qns_chapter_relatn`
--
ALTER TABLE `oe_qns_chapter_relatn`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=297;
--
-- AUTO_INCREMENT for table `oe_qns_topic_relatn`
--
ALTER TABLE `oe_qns_topic_relatn`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=497;
--
-- AUTO_INCREMENT for table `oe_qsn_bnk_ans`
--
ALTER TABLE `oe_qsn_bnk_ans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=261;
--
-- AUTO_INCREMENT for table `oe_qsn_bnk_master`
--
ALTER TABLE `oe_qsn_bnk_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `oe_topics`
--
ALTER TABLE `oe_topics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;
--
-- AUTO_INCREMENT for table `oe_users`
--
ALTER TABLE `oe_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sif_course`
--
ALTER TABLE `sif_course`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `sif_exam_category`
--
ALTER TABLE `sif_exam_category`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `sif_faculty`
--
ALTER TABLE `sif_faculty`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `sif_general_info`
--
ALTER TABLE `sif_general_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `sif_groups`
--
ALTER TABLE `sif_groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `sif_institute`
--
ALTER TABLE `sif_institute`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `sif_login_attempts`
--
ALTER TABLE `sif_login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sif_subject`
--
ALTER TABLE `sif_subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `sif_users`
--
ALTER TABLE `sif_users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `sif_users_groups`
--
ALTER TABLE `sif_users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
