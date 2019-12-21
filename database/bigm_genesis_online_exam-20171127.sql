-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 27, 2017 at 01:28 PM
-- Server version: 5.7.20-0ubuntu0.16.04.1
-- PHP Version: 7.1.11-1+ubuntu16.04.1+deb.sury.org+1

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
(1, 'Anatomy', '2017-10-02 11:51:32', '', '0000-00-00 00:00:00', '', '1'),
(2, 'Physiology', '2017-10-02 11:51:44', '', '0000-00-00 00:00:00', '', '1'),
(3, 'Pathology', '2017-10-02 11:51:54', '', '0000-00-00 00:00:00', '', '1'),
(4, 'Microbiology', '2017-10-02 11:52:10', 'admin@bigm-bd.com', '0000-00-00 00:00:00', '', '1'),
(5, 'Pharmacology', '2017-10-02 11:52:20', 'admin@bigm-bd.com', '0000-00-00 00:00:00', '', '1'),
(6, 'Biochemistry', '2017-10-02 11:52:38', 'admin@bigm-bd.com', '0000-00-00 00:00:00', '', '1');

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
(69, 8, 1, '03', '0326', '032648', '680/3 East Monipur', '2017-11-21 12:14:01', NULL, NULL, NULL, 1),
(70, 8, 2, '05', '0576', '057639', 'Rahimpur', '2017-11-21 12:14:01', NULL, NULL, NULL, 1),
(73, 11, 1, '', '', '', '', '2017-11-23 11:15:40', NULL, NULL, NULL, 1),
(74, 11, 2, '', '', '', '', '2017-11-23 11:15:40', NULL, NULL, NULL, 1);

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
(125, 8, 'S.S.C', '2004', 1, 2, 'S. M. High School', '4.31', NULL, 1),
(126, 8, 'H.S.C', '2006', 1, 2, 'Ishwardi Govt. College', '3.40', NULL, 1),
(127, 8, 'MBBS', '2011', NULL, NULL, '1', '3.2', NULL, 1),
(128, 8, 'FCPS-PI', '2013', NULL, NULL, '1', '3.12', NULL, 1),
(133, 11, 'S.S.C', '', 0, 0, '', '', NULL, 1),
(134, 11, 'H.S.C', '', 0, 0, '', '', NULL, 1),
(135, 11, 'MBBS', '', NULL, NULL, '', '', NULL, 1),
(136, 11, 'FCPS-PI', '', NULL, NULL, '', '', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `oe_doc_exams`
--

CREATE TABLE `oe_doc_exams` (
  `id` int(11) NOT NULL,
  `doc_id` int(11) NOT NULL,
  `purchase_id` int(11) DEFAULT NULL,
  `institute_id` int(11) DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  `faculty_id` int(11) DEFAULT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `exam_type_id` int(11) NOT NULL,
  `exam_id` int(11) DEFAULT NULL,
  `cost_bdt` decimal(16,2) DEFAULT '0.00',
  `cost_usd` decimal(16,2) DEFAULT '0.00',
  `currency` varchar(20) DEFAULT NULL,
  `discount` decimal(5,2) DEFAULT '0.00',
  `duration` int(11) NOT NULL,
  `cost_final` decimal(16,2) DEFAULT '0.00',
  `answers` text,
  `correct` text,
  `wrong` text,
  `correct_mark` decimal(10,2) DEFAULT '0.00',
  `wrong_mark` decimal(10,2) DEFAULT '0.00',
  `final_mark` decimal(10,2) DEFAULT '0.00',
  `status` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `oe_doc_exams`
--

INSERT INTO `oe_doc_exams` (`id`, `doc_id`, `purchase_id`, `institute_id`, `course_id`, `faculty_id`, `subject_id`, `exam_type_id`, `exam_id`, `cost_bdt`, `cost_usd`, `currency`, `discount`, `duration`, `cost_final`, `answers`, `correct`, `wrong`, `correct_mark`, `wrong_mark`, `final_mark`, `status`) VALUES
(1, 11, 1, 4, 27, 31, 33, 1, 1, '200.50', '2.50', 'BDT', '0.00', 30, '200.50', NULL, NULL, NULL, '0.00', '0.00', '0.00', 9),
(2, 11, 1, 4, 27, 31, 33, 2, 3, '240.00', '3.00', 'BDT', '0.00', 60, '240.00', NULL, NULL, NULL, '0.00', '0.00', '0.00', 9);

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
  `forgot_token` text,
  `forgot_validity` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `oe_doc_master`
--

INSERT INTO `oe_doc_master` (`id`, `username`, `password`, `name`, `email`, `phone`, `bmdc_no`, `reg_no`, `father_name`, `mother_name`, `photo`, `blood_group`, `dob`, `gender`, `created_at`, `created_by`, `updated_at`, `updated_by`, `status`, `signature`, `contact_person_phone`, `contact_person_name`, `fb_id`, `job_desc`, `passport_no`, `nid`, `medical_college`, `forgot_token`, `forgot_validity`) VALUES
(11, 'nahian@bigm-bd.com', '$2y$10$LfcuTkWlTF5xr3wHumLB/uJr3uSbHKy6/k/RHW4ngHGGnuxN6yfGu', 'Julkar Naen Nahian', 'nahian@bigm-bd.com', '01977036048', 'DMC12050034', 'GEN170001', '', '', 'upload/users/e3cf5cb4b4c4ffe3159b761ef1081a00.png', 'O+', '1989-11-30', '1', '2017-11-23 05:14:02', '', NULL, '', 1, NULL, NULL, NULL, NULL, '', '', '1241241241241', 10, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `oe_doc_purchases`
--

CREATE TABLE `oe_doc_purchases` (
  `id` int(11) NOT NULL,
  `doc_id` int(11) NOT NULL,
  `exam_count` int(11) NOT NULL,
  `exam_ids` varchar(255) NOT NULL,
  `payment_method` varchar(100) DEFAULT NULL,
  `cost_bdt` decimal(16,2) DEFAULT '0.00',
  `cost_usd` decimal(16,2) DEFAULT '0.00',
  `currency` varchar(4) DEFAULT NULL,
  `amount_paid` decimal(16,2) DEFAULT '0.00',
  `trans_id` varchar(255) DEFAULT NULL,
  `payment_status` tinyint(1) DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(100) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(100) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `oe_doc_purchases`
--

INSERT INTO `oe_doc_purchases` (`id`, `doc_id`, `exam_count`, `exam_ids`, `payment_method`, `cost_bdt`, `cost_usd`, `currency`, `amount_paid`, `trans_id`, `payment_status`, `created_at`, `created_by`, `updated_at`, `updated_by`, `status`) VALUES
(1, 11, 2, '["1","3"]', '', '440.50', '5.50', 'BDT', '440.50', '1211211121', 1, '2017-11-27 07:31:53', NULL, NULL, NULL, 1);

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
(49, 8, 'Nazmul Hasan', 'Software Emgineer', '31221321321', 'Friend', 1),
(50, 8, 'Tasfir Suman', 'Software Engineer', '31321321321', 'Friend', 1),
(51, 8, '', '', '', '', 1),
(55, 11, '', '', '', '', 1),
(56, 11, '', '', '', '', 1),
(57, 11, '', '', '', '', 1);

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
(2, 'Joy Holloway', 4, 27, 31, 33, 1, 0, 20, 1, 10, 2, 0.5, 40, '60', 1500, 'Laboriosam elit consectetur itaque qui dolor', '2017-11-22 10:37:21', NULL, NULL, NULL, 1),
(3, 'Allen Velazquez', 4, 27, 31, 33, 2, 0, 80, 80, 20, 20, 0.25, 100, '60 min', 120, 'Cum doloremque aspernatur ut fuga Quia laboriosam et ab ullamco ea quo ut aliquid consectetur', '2017-11-21 10:11:49', NULL, NULL, NULL, 1),
(4, 'Test Exam', 4, 27, 31, 33, 1, 0, 20, 1, 20, 2, 0.5, 40, '30', 1200, 'Truncates a string to the number of characters specified. It maintains the integrity of words so the character count may be slightly more or less than what you specify.', '2017-11-20 09:21:20', NULL, NULL, NULL, 1),
(5, 'Joy Holloway', 4, 27, 31, 33, 2, 0, 20, 1, 10, 2, 0.5, 40, '60', 1500, 'Laboriosam elit consectetur itaque qui dolor', '2017-11-23 07:54:55', NULL, NULL, NULL, 1),
(6, 'Allen Velazquez', 4, 27, 31, 33, 2, 0, 80, 80, 20, 20, 0.25, 100, '60 min', 120, 'Cum doloremque aspernatur ut fuga Quia laboriosam et ab ullamco ea quo ut aliquid consectetur', '2017-11-21 10:11:49', NULL, NULL, NULL, 1),
(7, 'Test Exam', 4, 27, 31, 33, 1, 0, 20, 1, 20, 2, 0.5, 40, '30', 1200, 'Truncates a string to the number of characters specified. It maintains the integrity of words so the character count may be slightly more or less than what you specify.', '2017-11-20 09:21:20', NULL, NULL, NULL, 1),
(8, 'Allen Velazquez', 4, 27, 31, 33, 2, 0, 80, 80, 20, 20, 0.25, 100, '60 min', 120, 'Cum doloremque aspernatur ut fuga Quia laboriosam et ab ullamco ea quo ut aliquid consectetur', '2017-11-21 10:11:49', NULL, NULL, NULL, 1),
(9, 'Joy Holloway', 4, 27, 31, 33, 1, 0, 20, 1, 10, 2, 0.5, 40, '60', 1500, 'Laboriosam elit consectetur itaque qui dolor', '2017-11-22 10:37:21', NULL, NULL, NULL, 1);

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
(10, 2, 2, 5, 1, 2),
(11, 2, 2, 21, 6, 52),
(12, 2, 2, 11, 3, 13),
(13, 2, 2, 4, 3, 13),
(14, 2, 1, 3, 2, 7),
(15, 2, 1, 25, 2, 7),
(16, 2, 1, 34, 1, 3),
(17, 1, 2, 4, 3, 13),
(18, 1, 2, 11, 3, 13),
(19, 1, 2, 21, 6, 52),
(20, 1, 2, 21, 2, 7),
(21, 1, 2, 5, 2, 7),
(22, 1, 1, 16, 1, 5),
(23, 1, 1, 25, 1, 5);

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
(2, 1, 4, 0);

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
(1, 53, 1, 1, 0),
(2, 8, 4, 1, 0);

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
(1, 1, 'Is approximately 7 nm thickness.', 'A', 'T'),
(2, 1, 'Is capable of selective permeability. ', 'B', 'T'),
(3, 1, 'Allows passage of specific ions through carbohydrate- gated channels. ', 'C', 'F'),
(4, 1, 'Is activated by a secondary messenger system.', 'D', 'F'),
(5, 1, 'May discharge particles by a process of vacillation.  ', 'E', 'T'),
(6, 2, 'Mammilary process is present', 'A', 'T'),
(7, 2, 'Accessory process is present', 'B', 'T'),
(8, 2, 'Body is larger than the atrypical one', 'C', 'F'),
(9, 2, 'Inferior articular processes are more distant then the superior', 'D', 'F'),
(10, 2, 'Transverse process is pyramidal in shape', 'E', 'F'),
(11, 3, 'Subcostal', 'A', 'T'),
(12, 3, 'Ilioinguinal', 'B', 'T'),
(13, 3, 'Iliohypogastric', 'C', 'T'),
(14, 3, 'Genitofemoral', 'D', 'T'),
(15, 3, 'Obturator', 'E', 'F'),
(16, 4, 'Scarpa\'s fascia affords little strength in wound closure.', 'A', 'T'),
(17, 4, 'Fascia transversalis provides strength to the abdominal wall in preventing hernias.', 'B', 'T'),
(18, 4, 'The wall is supplied by both thoracic and lumbar spinal segments', 'C', 'T'),
(19, 4, 'Omphalocele represents a defect in the abdominal wall lateral to the umbilical cord.', 'D', 'F'),
(20, 4, 'Vertical incisions on the anterior abdominal wall heal with less scarring than transverse incisions', 'E', 'F'),
(21, 5, 'Anteriorly over its lateral one third is related to internal oblique muscle', 'A', 'T'),
(22, 5, 'Floor is formed by inguinal ligament', 'B', 'T'),
(23, 5, 'Conjoint tendon form the posterior wall of the canal medially', 'C', 'T'),
(24, 5, 'Indirect inguinal hernia passes through the inguinal ring', 'D', 'T'),
(25, 5, 'Direct inguinal hernia lies lateral to the inferior epigastric artery', 'E', 'T'),
(26, 6, 'Transmits the ileoinguinal nervy', 'A', 'T'),
(27, 6, 'Has the fascia transversalis and conjoint tendon along its posterior wall', 'B', 'T'),
(28, 6, 'In new born is more oblique than in adult', 'C', 'F'),
(29, 6, 'Transmits the genital branch of genitofemoral nerve in both sexes', 'D', 'T'),
(30, 6, 'Has the external oblique muscle as its roof', 'E', 'F'),
(31, 7, 'The spermatogonia are the cells from which all spermatozoa are derived', 'A', 'T'),
(32, 7, 'The sustentacular (supporting) cell ( of Sertoli) are attachted to the limiting membrane of the tubules', 'B', 'T'),
(33, 7, 'The interstitial cells ( of Leydig) are activated by oestrogens', 'C', 'F'),
(34, 7, 'The efferent ductules are lined by cuboidal epithelium', 'D', 'F'),
(35, 7, 'There is smooth muscle in the wall of the semineferous tubule', 'E', 'F'),
(36, 8, 'Femoral canal', 'A', 'T'),
(37, 8, 'Abdominal cavity', 'B', 'T'),
(38, 8, 'Peno-pubic area', 'C', 'F'),
(39, 8, 'Inguinal canal', 'D', 'T'),
(40, 8, 'Contralateral hemiscrotum', 'E', 'F'),
(41, 9, 'Deep inguinal ring', 'A', 'F'),
(42, 9, 'Medial side of thigh', 'B', 'T'),
(43, 9, 'Opposite scrotum', 'C', 'F'),
(44, 9, 'Root of the penis', 'D', 'T'),
(45, 9, 'Inguinal canal', 'E', 'F'),
(46, 10, 'Has the epididymis lies to its medial side', 'A', 'F'),
(47, 10, 'Is supplied by sympathetic nerves originating in the 10th thoracic segment', 'B', 'T'),
(48, 10, 'Is drained by the lymph vessels to the paraaortic lymph nodes', 'C', 'T'),
(49, 10, 'Is aided in its descent by the processus vaginalis', 'D', 'F'),
(50, 10, 'Normally complete its descent into the scrotum at birth', 'E', 'T'),
(51, 11, 'It originates from the celomic mesothelium.', 'A', 'T'),
(52, 11, 'It gains contributions from the developing mesonephrons.', 'B', 'T'),
(53, 11, 'It completes its descent into the scrotum at birth.', 'C', 'T'),
(54, 11, 'Its descent is aided by the processus vaginalis.', 'D', 'F'),
(55, 11, 'The direct inguinal hernias are more common at birth.', 'E', 'F'),
(56, 12, 'Neck of the pancreas lies in the transpyloric plane', 'A', 'T'),
(57, 12, 'Right adrenal gland is posterior to the inferior vena cava', 'B', 'T'),
(58, 12, 'Neck of the pancreas is posterior to the portal vein', 'C', 'F'),
(59, 12, 'Anterior vagal trunk carries both sympathetic and parasympathetic fibres', 'D', 'F'),
(60, 12, 'Transverse mesocolon attaches to the anterior surface of pancreas', 'E', 'T'),
(61, 13, 'Porta hepatis of the liver', 'A', 'F'),
(62, 13, 'Lesser curvature of the stomach', 'B', 'F'),
(63, 13, 'Transverse colon', 'C', 'T'),
(64, 13, 'Greater curvature of stomach', 'D', 'T'),
(65, 13, 'Spleen', 'E', 'F'),
(66, 14, 'Lies between the liver and stomach and duodenum', 'A', 'T'),
(67, 14, 'Form part of the anterior wall of the lesser sac.', 'B', 'T'),
(68, 14, 'Contains portal vein', 'C', 'T'),
(69, 14, 'Contains the gastroduodenal artery', 'D', 'F'),
(70, 14, 'Extends into the fissure for the ligamentum teres', 'E', 'F'),
(71, 15, 'Sigmoid colon is attached vertically to the sacrum', 'A', 'F'),
(72, 15, 'Small intestine is attached from duodenum to ileocolic junction', 'B', 'F'),
(73, 15, 'Small intestine contains the branches of superior mesenteric artery', 'C', 'T'),
(74, 15, 'Transverse colon is attached horizontally to the anterior borders of pancreas', 'D', 'T'),
(75, 15, 'Sigmoid colon contains the internal liliac vein', 'E', 'T'),
(76, 16, 'Covers both the uterus and uterine tubes', 'A', 'T'),
(77, 16, 'Condenses and forms the round ligaments of the uterus', 'B', 'F'),
(78, 16, 'Covers the anterior surface of rectum in its upper third', 'C', 'F'),
(79, 16, 'Covers the superior surface of the bladder in both sexes', 'D', 'T'),
(80, 16, 'Can be palpated by means of a digital examination of the rectum', 'E', 'T'),
(81, 17, 'Left brachiocephalic vein', 'A', 'F'),
(82, 17, 'Left subclavian artery', 'B', 'F'),
(83, 17, 'Base of the heart', 'C', 'F'),
(84, 17, 'Arch of the aorta', 'D', 'T'),
(85, 17, 'Left principal bronchus', 'E', 'T'),
(86, 18, 'Trachea', 'A', 'F'),
(87, 18, 'Left principal bronchus', 'B', 'T'),
(88, 18, 'Right pulmonary artery', 'C', 'F'),
(89, 18, 'Arch of the aorta', 'D', 'T'),
(90, 18, 'Left atrium', 'E', 'F'),
(91, 19, 'Is an endocrine gland', 'A', 'F'),
(92, 19, 'Capacity is about 250 ml at birth', 'B', 'F'),
(93, 19, 'Has two muscle coats in it’s wall', 'C', 'F'),
(94, 19, 'G cells are found in the antrum', 'D', 'T'),
(95, 19, 'Parietal cells are found in the fundus', 'E', 'T'),
(96, 20, 'Acetylcholine stimulates the secretion of gastrin', 'A', 'T'),
(97, 20, 'Histamine stimulates the secretion HCI', 'B', 'T'),
(98, 20, 'Gastrin stimulates the secretion of histamine', 'C', 'T'),
(99, 20, 'Prostaglandin stimulates the secretion of HCI', 'D', 'F'),
(100, 20, 'Acetylcholine stimulates the secretion of HCI Small and large intestines', 'E', 'T'),
(101, 21, 'Lies between liver and stomach', 'A', 'T'),
(102, 21, 'Has a right margin behind lies a epiploic foramen', 'B', 'T'),
(103, 21, 'Contains superior mesenteric artery', 'C', 'F'),
(104, 21, 'Contains portal vein', 'D', 'T'),
(105, 21, 'Attached superiorly with lesser curvature of stomach', 'E', 'F'),
(106, 22, 'Small number of arterial arcades seen inside the mesentery', 'A', 'T'),
(107, 22, 'Solitary lymph nodules stud it\'s wall', 'B', 'F'),
(108, 22, 'Lymphoid follicles are situated in the mesenteric border', 'C', 'F'),
(109, 22, 'Plicae circulares are tall, closely packed and branched', 'D', 'T'),
(110, 22, '6 meter long', 'E', 'T'),
(111, 23, 'Extends upwards into the neck above the medial third of the clavicle', 'A', 'T'),
(112, 23, 'Is grooved in its uppermost part by the subclavian artery', 'B', 'F'),
(113, 23, 'Is innervated by the intercostals nerves over the central tendon of the diaphragm', 'C', 'T'),
(114, 23, 'Extends into the fissure of lung', 'D', 'T'),
(115, 23, 'Has the lower limit that corresponds with the 8th rib in mid axillary line', 'E', 'F'),
(116, 24, 'The transverse fissure separates the right middle lobe from the right lower lobe', 'A', 'F'),
(117, 24, 'The left main bronchus is more vertical than the right', 'B', 'F'),
(118, 24, 'The left upper lobe lies anterior to the left lower lobe', 'C', 'T'),
(119, 24, 'The oblique fissure extends from the thoracic vertebral level T3', 'D', 'T'),
(120, 24, 'Pneumocyte I is more in number than penumocyte II', 'E', 'T'),
(121, 25, 'Contains goblet cell', 'A', 'F'),
(122, 25, 'Contains clara cell', 'B', 'T'),
(123, 25, 'Contains plates of cartilage', 'C', 'F'),
(124, 25, 'Is lined by simple columnar ciliated epithelium', 'D', 'F'),
(125, 25, 'Contains alveoli', 'E', 'F'),
(126, 26, 'Develops from sinus venosus', 'A', 'F'),
(127, 26, 'Is normally oval in cross section', 'B', 'F'),
(128, 26, 'Has tricuspid valve in its inflow tract', 'C', 'T'),
(129, 26, 'Contains two papillary muscle', 'D', 'F'),
(130, 26, 'Forms most of the diaphragmatic surface of the heart', 'E', 'F'),
(131, 27, 'Present in the left ventricle', 'A', 'F'),
(132, 27, 'Conveys right branch of atrioventricular bundle', 'B', 'T'),
(133, 27, 'Prevents overdistension of right ventricle', 'C', 'T'),
(134, 27, 'Is made up of muscle tissue', 'D', 'T'),
(135, 27, 'Is a connective tissue bridge', 'E', 'F'),
(136, 28, 'The atrioventricular (AV) node is usually supplied by the right coronary artery', 'A', 'T'),
(137, 28, 'β1 adrenoreceptors mediate chronotropic response', 'B', 'T'),
(138, 28, 'Pulmonary artery systolic pressure normally varies between 40 and 140 mm of Hg', 'C', 'F'),
(139, 28, 'The annulus fibrosus aids conduction of impulses from the atria to the ventricles', 'D', 'T'),
(140, 28, 'Cardiac output is the product of heart rate and ventricular end –diastolic volume', 'E', 'F'),
(141, 29, 'The post-ductal type presents in infancy', 'A', 'F'),
(142, 29, 'A lateral chest x-ray may show dilated descending thoracic aorta', 'B', 'T'),
(143, 29, 'The isthmus of the aorta is the usual site', 'C', 'T'),
(144, 29, 'Bicuspid aortic valve is a recognized association', 'D', 'T'),
(145, 29, 'Berry aneurysms are a recognized complication', 'E', 'T'),
(146, 30, 'Gonadal vessels', 'A', 'F'),
(147, 30, 'Ductus dererence', 'B', 'F'),
(148, 30, 'Internal iliac artery', 'C', 'F'),
(149, 30, 'Genitofemoral nerve', 'D', 'F'),
(150, 30, 'Right colic vessels', 'E', 'F'),
(151, 31, 'The dorsal mesentery breaks down to form the oblique pericardial sinus', 'A', 'F'),
(152, 31, 'The pulmonary circulation is of lesser volume', 'B', 'F'),
(153, 31, 'Contraction starts at 3 weeks', 'C', 'T'),
(154, 31, 'The sinus venosus lies at the cranial end of the primitive tube', 'D', 'F'),
(155, 31, 'Muscles are of neural crest in origin', 'E', 'F'),
(156, 32, 'Upper aspect of the arch of aorta', 'A', 'T'),
(157, 32, 'Bifurcation of trachea', 'B', 'T'),
(158, 32, 'Left brachiocephalic vein', 'C', 'F'),
(159, 32, 'Azygos vein', 'D', 'T'),
(160, 32, 'Commencement of the pulmonary artery', 'E', 'T'),
(161, 33, 'Upper aspect of the arch of aorta', 'A', 'T'),
(162, 33, 'Bifurcation of trachea', 'B', 'T'),
(163, 33, 'Left brachiocephalic vein', 'C', 'F'),
(164, 33, 'Azygos arch', 'D', 'T'),
(165, 33, 'Commencement of the pulmonary artery', 'E', 'T'),
(166, 34, 'Left subclavian artery', 'A', 'F'),
(167, 34, 'Brachiocephalic trunk', 'B', 'F'),
(168, 34, 'Descending aorta', 'C', 'F'),
(169, 34, 'Left ventricle', 'D', 'T'),
(170, 34, 'Pulmonary', 'E', 'T'),
(171, 35, 'In adult is about 15 cm long', 'A', 'T'),
(172, 35, 'Extends to the level of the 6th thoracic vertebra in full inspiration', 'B', 'F'),
(173, 35, 'tracheostomy is done at the level of first to third tracheal rings', 'C', 'F'),
(174, 35, 'Lies exactly in the midline', 'D', 'F'),
(175, 35, 'Bears a diameter correlating with the diameter of the index finger', 'E', 'F'),
(176, 36, 'Enter thorax through the caval opening of the diaphragm', 'A', 'F'),
(177, 36, 'Bends laterally in front of the carotid sheath at the level of c7 vertebra', 'B', 'T'),
(178, 36, 'Passes ant. to the left phrenic nerve at the medial border of the scalenus anterior.', 'C', 'T'),
(179, 36, 'Passes behind the first part of the subclavian artery', 'D', 'F'),
(180, 36, 'Terminates at the union of left internal jugular and subclavian veins', 'E', 'T'),
(181, 37, 'Possesses eleven ganglia', 'A', 'T'),
(182, 37, 'Lies infront of the neck of the ribs', 'B', 'F'),
(183, 37, 'Has no direct communication with the lumbar sympathetic trunk', 'C', 'F'),
(184, 37, 'Provides all the splanchnic nerves', 'D', 'T'),
(185, 37, 'Is independent of the thoracic spinal nerves', 'E', 'F'),
(186, 38, 'Superior laryngeal nerve', 'A', 'F'),
(187, 38, 'Recurrent laryngeal nerve', 'B', 'T'),
(188, 38, 'Ansa cervical', 'C', 'F'),
(189, 38, 'Hypoglossal nerve', 'D', 'F'),
(190, 38, 'Accessory nerve', 'E', 'F'),
(191, 39, 'Originate from body of 1st rib', 'A', 'F'),
(192, 39, 'Articulate with C7 transverse process', 'B', 'F'),
(193, 39, 'Extends laterally and may end in a blind pouch', 'C', 'T'),
(194, 39, 'Symptom is proportionate to its size', 'D', 'T'),
(195, 39, 'Relieving symptoms require extraperiosteal removal of rib', 'E', 'F'),
(196, 40, 'Gives off three branches', 'A', 'T'),
(197, 40, 'Lies behind the anterior scalene muscle', 'B', 'F'),
(198, 40, 'Makes a groove in the dome of pleura', 'C', 'T'),
(199, 40, 'Is encircled by the ansa cervicalis', 'D', 'F'),
(200, 40, 'On the both sides lies posterior to the skin, superficial fascia and platysma', 'E', 'T'),
(201, 41, 'Are more numerous than neurons', 'A', 'T'),
(202, 41, 'Are non-excitable cell', 'B', 'T'),
(203, 41, 'Developed from mesoderm', 'C', 'F'),
(204, 41, 'Do not undergo mitotic division', 'D', 'F'),
(205, 41, 'Take active part in ionic transport', 'E', 'T'),
(206, 42, 'They are directly involved in information processing of the nervous system.', 'A', 'F'),
(207, 42, 'Glial cells may provide nutritional support to neurons.', 'B', 'T'),
(208, 42, 'Microglia increase in number at the sites of damage to the neurons', 'C', 'T'),
(209, 42, 'Astrocytes and oligodendroglia both possess few processes.', 'D', 'T'),
(210, 42, 'Each glial cell produces the myelin sheath over only a short part of an axon.', 'E', 'T'),
(211, 43, 'Astrocyte', 'A', 'T'),
(212, 43, 'Oligodentrocyte', 'B', 'F'),
(213, 43, 'Ependymal layer', 'C', 'F'),
(214, 43, 'Neuron', 'D', 'F'),
(215, 43, 'Endothelial cells', 'E', 'T'),
(216, 44, 'Ventral grey column of the spinal cord', 'A', 'T'),
(217, 44, 'Intermediolateral grey column of the spinal cord', 'B', 'F'),
(218, 44, 'Somatic efferent nuclei of cranial nerves', 'C', 'T'),
(219, 44, 'Dorsal nerve root ganglia', 'D', 'F'),
(220, 44, 'Branchial efferent nuclei of cranial nerve', 'E', 'T'),
(221, 45, 'Postganglionic neurons are largely unmyelinated', 'A', 'T'),
(222, 45, 'All preganglionic neurons are cholinergic', 'B', 'T'),
(223, 45, 'Parasympathetic outflow is only found in the cranial nerves', 'C', 'F'),
(224, 45, 'Preganglionic neurons of the sympathetic system are shorter than the para sympathetic system', 'D', 'T'),
(225, 45, 'Sympathetic preganglionic neurons leave spinal cord via dorsal roots of spinal verves T1-L3', 'E', 'F'),
(226, 46, 'Detrusor muscle', 'A', 'T'),
(227, 46, 'Bladder neck', 'B', 'T'),
(228, 46, 'Trigone', 'C', 'F'),
(229, 46, 'External sphincter', 'D', 'T'),
(230, 46, 'Seminal vesicles', 'E', 'T'),
(231, 47, 'Flaccidity', 'A', 'T'),
(232, 47, 'Spasticity', 'B', 'F'),
(233, 47, 'Loss of tendon reflexes', 'C', 'T'),
(234, 47, 'Wasting', 'D', 'T'),
(235, 47, 'Increased tendon reflexes', 'E', 'F'),
(236, 48, 'Flaccidity', 'A', 'T'),
(237, 48, 'Spasticity', 'B', 'F'),
(238, 48, 'Loss of tendon reflexes', 'C', 'T'),
(239, 48, 'Wasting', 'D', 'T'),
(240, 48, 'Increased tendon reflexes', 'E', 'F'),
(241, 49, 'Myelinated axons', 'A', 'T'),
(242, 49, 'Protoplasmic astrocyte', 'B', 'T'),
(243, 49, 'Neuronal cell bodies', 'C', 'T'),
(244, 49, 'Oligodendrocytes', 'D', 'T'),
(245, 49, 'Lymph vessels', 'E', 'F'),
(246, 50, 'All pregnglionic neurons', 'A', 'T'),
(247, 50, 'All parasympathetic postganglionic neurons', 'B', 'T'),
(248, 50, 'Sympathetic post ganglionic neurons that innervate exocrine glands', 'C', 'F'),
(249, 50, 'Sympathetic post ganglionic neurons that innervate sweat glands', 'D', 'T'),
(250, 50, 'Sympahtetic post ganglionic neurons that innervate adrenal medulla', 'E', 'F'),
(251, 51, 'Amygdaloid nucleus', 'A', 'T'),
(252, 51, 'Rostrum', 'B', 'F'),
(253, 51, 'Corpus striatum', 'C', 'T'),
(254, 51, 'Corpus callosum', 'D', 'F'),
(255, 51, 'Claustrum', 'E', 'T'),
(256, 52, 'Frontal cortex', 'A', 'T'),
(257, 52, 'Cerebeller cortex', 'B', 'F'),
(258, 52, 'Occipital cortex', 'C', 'F'),
(259, 52, 'Hippocampus', 'D', 'F'),
(260, 52, 'Parietal cortex', 'E', 'T'),
(261, 53, 'Lies between dura mater and arachnoid mater', 'A', 'F'),
(262, 53, 'Is formed by union of great cerebral vein and superior cerebral vein', 'B', 'F'),
(263, 53, 'Forms the right transverse sinus', 'C', 'F'),
(264, 53, 'Has arachnoid villi', 'D', 'T'),
(265, 53, 'Occupies the upper border of falx cerebri', 'E', 'T'),
(266, 54, 'Commonly occurs from ruptured aneurysm', 'A', 'T'),
(267, 54, 'Ruptured AVM', 'B', 'T'),
(268, 54, 'Associated with vasodilatation', 'C', 'F'),
(269, 54, 'Associated with neck stiffness', 'D', 'T'),
(270, 54, 'Give rise to hydrocephalus', 'E', 'T'),
(271, 55, 'Is also called cortical retina', 'A', 'T'),
(272, 55, 'Has point to point projection from the retina', 'B', 'T'),
(273, 55, 'Contains visuo-psychic area only', 'C', 'F'),
(274, 55, 'Receives blood supply from carotid & vertebral artery', 'D', 'T'),
(275, 55, 'Is identified by the striate of gennari', 'E', 'T'),
(276, 56, 'Lacrimal nerve', 'A', 'T'),
(277, 56, 'Superior ophthalmic vein', 'B', 'T'),
(278, 56, 'Meningeal branch of lacrimal artery', 'C', 'F'),
(279, 56, 'The abducent nerve', 'D', 'F'),
(280, 56, 'The occulomotor nerve', 'E', 'F'),
(281, 57, 'It is 15% of the total cardiac output', 'A', 'T'),
(282, 57, 'Normal flow is 50 mli/1OOgm/min', 'B', 'T'),
(283, 57, 'Normal function is not impaired when it is less than 23 ml/100gm/min', 'C', 'F'),
(284, 57, 'It is auto regulated at BP 60-140 mm of Hg', 'D', 'F'),
(285, 57, 'Irreversible brain damage may occur at when it is <8 ml/1009m/min', 'E', 'T'),
(286, 58, 'Cerebellum and basal ganglia', 'A', 'T'),
(287, 58, 'Medial lemniscus', 'B', 'F'),
(288, 58, 'Superior colliculus', 'C', 'F'),
(289, 58, 'Amygdala and hypothalamus', 'D', 'F'),
(290, 58, 'Thalamus', 'E', 'T'),
(291, 59, 'It is 15% of the total cardiac output', 'A', 'T'),
(292, 59, 'Normal flow is 54 mL/100gm/min', 'B', 'T'),
(293, 59, 'Normal function is not impaired when it is less than 23mL/100gm/min', 'C', 'F'),
(294, 59, 'It is auto regulated at BP 65-140 mm of Hg', 'D', 'T'),
(295, 59, 'Irreversible brain damage may occur at when it is <8 mL/100gm/min', 'E', 'T'),
(296, 60, 'Stellate', 'A', 'T'),
(297, 60, 'Fusiform', 'B', 'T'),
(298, 60, 'Purkinje', 'C', 'F'),
(299, 60, 'Pyramidal', 'D', 'T'),
(300, 60, 'Schwann', 'E', 'F'),
(301, 61, 'Medial lemniscus', 'A', 'T'),
(302, 61, 'Spinothalamic tracts', 'B', 'T'),
(303, 61, 'Trigeminal lemniscus', 'C', 'T'),
(304, 61, 'Solitariothalamic tract', 'D', 'F'),
(305, 61, 'Olfactory tract', 'E', 'F'),
(306, 62, 'Medial lemniscus', 'A', 'T'),
(307, 62, 'Spinothalamic tracts', 'B', 'T'),
(308, 62, 'Trigeminal lemniscus', 'C', 'T'),
(309, 62, 'Solitariothalamic tract', 'D', 'F'),
(310, 62, 'Olfactory tract', 'E', 'F');

-- --------------------------------------------------------

--
-- Table structure for table `oe_qsn_bnk_master`
--

CREATE TABLE `oe_qsn_bnk_master` (
  `id` int(11) NOT NULL,
  `type` varchar(20) NOT NULL COMMENT 'mcq,sba',
  `question_name` varchar(400) NOT NULL,
  `correct_ans` varchar(5) NOT NULL,
  `question_in_year` varchar(90) DEFAULT NULL,
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
(1, '2', 'The cell membrane:', '', '', '', 'Lumley (P-2)', '2017-11-08 08:42:28', 'admin@bigm-bd.com', NULL, NULL, '1'),
(2, '2', 'In a typical lumbar vertebra', '', '(March -14)', 'a) T (The posterior border of superior articular process is marked by a rough elevation the mammillary process) b) T (The posterior inferior aspect of the root of each transverse process is marked by a small rough elevation, the accessory process: Which represents the true transverse process of vertebra) c) F (L5 vertebral body is largest0 d) F (The superior articular processes lie forther apart than inferior) e) F (This long tapering)', '[Ref: BD 6th v-2,V-2 P-184]', '2017-11-22 06:05:28', 'admin@bigm-bd.com', NULL, NULL, '1'),
(3, '2', 'Anterior abdominal wall receives supply from following nerves', '', '(July-11)', 'a) T b) T (Branch of 1st lumber nerve) c) T (Branch of 1st lumber nerve) d) T (Branch from L1 & L2 nerve) e) F\r\nThe Anterior Abdominal wall is supplied by :\r\n1. Lower six thoracic rerves\r\n(-)lower five 9nterior9als nerve (-) Subtotal verve 2. 1st lumber nerve', '(Ref.BD 6th P-200 )', '2017-11-22 06:09:02', 'admin@bigm-bd.com', NULL, NULL, '1'),
(4, '2', 'The following statements are correct concerning the abdominal wall layers', '', '(Jan-11)', 'a) T (Deep fascia should close) b) T c) T d) F (In the midline through the umbilicus) e) F (Incision through skin crease less scaring)', '', '2017-11-22 06:11:57', 'admin@bigm-bd.com', NULL, NULL, '1'),
(5, '2', 'Regarding the inguinal canal:', '', '(Jan-10)', 'Boundaries of inguinal canal\r\nA) The 9nterior wall 1. In its whole extent: a. Skin b. Superficial fascia c. External oblique aponurosis 2. In its lateral 1/3: Internal oblique muscle B) The posterior wall: 1. In its whole extent: a. The fascia transversalis b. The extraperitonal tissue c. The parietal peritoneum\r\n\r\n2. In its medial 2/3: a. The conjoint tenton b. At its meial end by reflected Part of inquinal ligament C) Roof: 1. Arched fibres of the internal oblique 2. Transversus abdoninis muscles D) Floor: 1. Inguinal ligament 2. Lacunar ligament\r\n\r\nStructures passing through the canal:\r\n1. Spermatic cord in males 2. Round ligament of uterus infemale 3. Ilioinguinal nerve\r\n\r\n\r\n', '[Ref: BD 6th v-2,P-212]\r\n', '2017-11-22 06:16:32', 'admin@bigm-bd.com', NULL, NULL, '1'),
(6, '2', 'The inguinal canal', '', '(MD, MS – July-15)', 'c) F (Shorter & loss oblique) d) T (Is is a constituent of spermatic cord) ', '[Ref: Lumley P-45],[Ref: BD 6th v-2,P-212]', '2017-11-22 06:19:28', 'admin@bigm-bd.com', NULL, NULL, '1'),
(7, '2', 'In the testis', '', '(July-12)', '6. a) T b) T (The cells of sertoli are tall and columnar in shape extending from the basal larina to the central lumen) [Ref: BD 6th v-2,P-225] c) F (The activity of leyding cells is controlled by interstitial cell stimulating hormone (ICSM) of the anterior pituitary gland) [Ref: BD 6th v-2,P-225] d) F (The efferent ductules are unilaminar and composed of columnar ciliated and non-ciliated (obdorptive) cells) [Ref: Wikipedia] e) F (Spermato genic cells and sertolicells covered by a basement membrane)', '[Ref: BD 6th v-2,P-225],[Ref: BD 6th v-2,P-225],[Ref: BD 6th v-2,P-225]', '2017-11-22 06:21:52', 'admin@bigm-bd.com', NULL, NULL, '1'),
(8, '2', 'Sites of ectopic testis are', '', '(March -14)', '7. a) T b) T c) F d) T e) F\r\nPositions of ectopic testis \r\n1. Lower part of abdomen\r\n2. Front of thigh \r\n3. Femoral canal\r\n4. Skin of penis \r\n5. Behind the serotonin', '', '2017-11-22 06:24:20', 'admin@bigm-bd.com', NULL, NULL, '1'),
(9, '2', 'Sites of ectopic testis are', '', '(July-17)', 'a) F ectopic site,e) F ectopic site', '', '2017-11-22 06:26:49', 'admin@bigm-bd.com', NULL, NULL, '1'),
(10, '2', 'The testis', '', '(MD, MS – March-16)', 'a) F (Epididymis lies along the lateral part of the posterior border)  b) T  c) T (also preaortic) d) F (Male sex hormone maternal gonadotrophin differential growth of the body wall Gubernaculum Intra abdominaltenperatureandpessur, helps in descent of the testis) e) T (Drain into preaortic and pera aortic groups of lymph)', '(Ref: BD 6th v-2,P-225],[Ref: BD 6th v-2,P-227],[Ref: BD 6th v-2,P-225]', '2017-11-22 06:30:14', 'admin@bigm-bd.com', NULL, NULL, '1'),
(11, '2', 'The following statements are correct regarding the development of the testis', '', '(Jan-11)', 'a) T (It develops from the coelomic mesothelium of the posterior abdominal wall tubules of the mesonephric duct and the head of the epididymis) b) T (The mesoonephric duct becomes the ducts deferens) c) T (Descent into the scrotum is usually complete at birth) d) F (Testicular descent is aided by the gubernaculum a mesodermal masss attached to its lower pole) e) (Indirect inguinal hernia is more common)', '[Ref: lumley q-70 P-47 + BD 6th p-214, 227]', '2017-11-22 06:32:12', 'admin@bigm-bd.com', NULL, NULL, '1'),
(12, '2', 'The relations and land-marks in abdomen are', '', '(MD,MS March-17)', 'c) F ( Ant. to Portal vein ) d) F ( Carries Parasympathetic fibre )', '[ Datta, 9th vol-1 p-111]', '2017-11-22 06:34:07', 'admin@bigm-bd.com', NULL, NULL, '1'),
(13, '2', 'The greater omentum is attached to the', '', '(MD, MS - July-15)', 'Greater Omentum is attached to: \r\n1. Greater curvature of stomach 2. Ant surface of head and ant border of body of pancrease. 3. Transverse colon 4. Transverse mesocolon)', '[Ref: BD 6th v-2,P-234]', '2017-11-22 06:36:38', 'admin@bigm-bd.com', NULL, NULL, '1'),
(14, '2', 'The lesser omentum', '', '(July-09)', 'a) T (This is a fold of peritoneum which extends from the lesser curvature of the stomach and the first 2cm of the duodenum to the liver) [Ref: BD 6th v-2,v-2,P-235] b) T (Ant wall is also formed by peritonium covering caudate lode and caudate process of liver peritonium of stomach second layer of greater omentum) [Ref: BD 6th v-2, ,P-241] c) T (The right free margin of it contains: Hepatic artery portal vein bile duct lymph node & lymphatic hepatic plexus of nerves) d) F (Along the lesser curvature of stomach it contains right gastric Vessel, Let gastric vessels gastric group of lymph nodes and lymphatics branches from gastric nerves. e) F (Ligamentum Venosum) [Ref: BD 6th v-2,P-235]', ' [Ref: BD 6th v-2,v-2,P-235] ) [Ref: BD 6th v-2, ,P-241] [Ref: BD 6th v-2,P-235]', '2017-11-22 06:38:52', 'admin@bigm-bd.com', NULL, NULL, '1'),
(15, '2', 'The mesentery of the', '', '(March 2015)', 'a) F (Attach obliquely to the pelvic surface of the sacrum) b) F (Attached form teh left side of L2 vertebra at the duodeno-jejunal flexure to the right sacroileac joint at the ileo- caecal junction) c) T (Jejunal and ileal branches of SMA) d) T (Attach along the anterior border of the body and anterior surface of head of the pancreas, on attachment in tail) e) T (Sigmoid mesocolon contain sigmoid branches IMA and Marginal branches of Drummond)', '[Ref lumley Q-72 P-48,49]', '2017-11-22 06:41:15', 'admin@bigm-bd.com', NULL, NULL, '1'),
(16, '2', 'The pelvic peritoneum', '', '(July-10)', 'a) T (It covers anterior and posterior surfaces of the uterus and the tubes and extends to the pelvic walls forming the broad ligaments of the uterus) b) F (The round ligament os the uterus are remnants of the gubernaculum of the ovary) c) F (Interiorly the rectum is covered by peritonium in its upper two thirds) d) T (And extends over the upper of its posterior surface) In the mole the upper part of the seminal vesicles are also covered) e) T (The rectovaginal or in the male the rectovesical pouch of the peritonium can be palpated in this manner through the rectal wall pelvic peritonitis may thus be diagnosed)', '[Ref: Lumley Q-73 P-72 + BD 6th fig: 18.21, 18.19, 15.17]', '2017-11-22 06:43:02', 'admin@bigm-bd.com', NULL, NULL, '1'),
(17, '2', 'Oesophagus is constricted when it is related interiorly to the', '', '(July-17)', 'Constrictions of oesophagus:\r\nconstrictions                        crossed by                                                cm/inch from incisor teeth\r\n1st                                         Circopharyngeus muscle                        15cm /6inch\r\n2nd                                          Aortic Arch                                                22.5cm/9inch\r\n3rd                                         Left principal bronchus                            27.5cm/11inch\r\n4th                                         Diaphragm (pierces)                                 37.5cm/15inch\r\n', '[Ref; BD 6th V-1 P-282', '2017-11-22 06:47:40', 'admin@bigm-bd.com', NULL, NULL, '1'),
(18, '2', 'Oesophagus is constricted due to its relation with', '', '(July-15)', '[Explanation: Previous discussion]', '', '2017-11-22 06:49:24', 'admin@bigm-bd.com', NULL, NULL, '1'),
(19, '2', 'Stomach', '', '(July-14)', 'a) F ( Exocrine)\r\nb) F ( Newborn→ 30-50ml, Adult-1000-1500 mll)\r\nc) F (Three muscle coat→ outer-longitudinal, middle-Circular, inner-Oblique)\r\nd) T (Fundus & body → chief cell/Zymogeni cell, oxyntic/parietal cell, mucos neck cell. Pyloric artrum→ G-cell)\r\ne) T', '', '2017-11-22 06:51:39', 'admin@bigm-bd.com', NULL, NULL, '1'),
(20, '2', 'In the stomach', '', '(March 15)', 'a) T (Secration of gastrin is stimulated by: Stomach antrum distension, vagal stimulation presence of partially digested proteins, hypercalcemia, acetylcholine, gastrin releasing peptide) Gastrin secration inhibited by: presence of Acid. b) T (HCl secration stimulated by: autonomic parasympathetic nervous system via vagus nerve, gastrin, histamin. HCl secratin inhibited by: Vasoactive intestinal peptide, cholecystokinin and secretin. c) T (Thus it stimulate HCl secretion indirectly)', '', '2017-11-22 06:53:42', 'admin@bigm-bd.com', NULL, NULL, '1'),
(21, '2', 'The lesser omentum', '', '(MD,MS March-17)', '', '[ Datta, 9 th edition, vol-1 P- 199]', '2017-11-22 06:56:26', 'admin@bigm-bd.com', NULL, NULL, '1'),
(22, '2', 'Regarding Jejunum:', '', '(Jan-10)', 'b) F (Few) c) F (An timesenteric border) d) T (Its another nane is circular mucosal fold) e) (Total length of jetenum and ileum is 6 meters /20 feet Jeounum is 2/5 of it) ', '[Ref: Datta 9th V-1 P-208 + BD6th V-2 P-264]', '2017-11-22 07:01:15', 'admin@bigm-bd.com', NULL, NULL, '1'),
(23, '2', 'The pleura', '', '(March-13)', 'a) T (With a point 2.5 cm above it) b) (On the medial side and anteriorly) c) F (Phrenic nerve innervates mediastinal pleura adn central part of the diaphragmatic pleura)d) T (Invests entire lung except the hilum and pulmonary ligament) e) F (Viscera pleura-6th rid in midclavicular, 8th midaxillary, 10th at the lower border of erector spinae. Parieta pleura-8th in midclavicular, 10th in midaxillary, 12th in lower border of erector spinae) ', '[Ref: BD v-1 P-230] [Ref: BD -235] [Ref: BD, v-1, p-232] ,[Datta-40] ,[Ref: BD 6th, V-1 , p-230]', '2017-11-23 09:29:57', 'admin@bigm-bd.com', NULL, NULL, '1'),
(24, '2', 'In the normal adult lungs', '', '(March-14)', 'a) F (Seperate middle lobe from upper lobe) [Ref: BD v-1 ,P-237] b) F (Right principal bronchus is more wider, shorter and vertical then left) [Ref: BD V-1 ,P-239] c) T (Due to obligue plane of the oblique fissure, the lower loe is more posterior and the upper and middle lobe more anterior) [Ref: BD-236] d) T (Oblique fissure can be drawn by joining a point 2cm lateral to the third thoracic spine, another point 5th rib in mid axillery line, third point 6th costal cartilage 7.5cm from midline) [Ref: BD-6th , v-1, P237] e) T (Type 1 cells make up 97% of the alveolar surface)', '[Ref: Datta9th, V-1, P-42]', '2017-11-23 09:32:14', 'admin@bigm-bd.com', NULL, NULL, '1'),
(25, '2', 'Terminal bronchiole', '', '(July-08)', '* A Bronchiol is intralobular and is devoid of cartilage cells and glands. \r\nTerminal broachiole is lined by simple cuboidal ciliated epithelium and contains clara cells \r\nTerminal bronchiole contains no goblet cell', ' [Ref: Datta 9th, V-1, P-41]\r\n(Ref. Janquira13th P-350 table17.2 )\r\n', '2017-11-23 09:35:02', 'admin@bigm-bd.com', NULL, NULL, '1'),
(26, '2', 'Right ventricle', '', '(July-08)', 'a) F (Rough part –proximal portion of bulbus cordis. smooth part-- The conus cordis or middle portion of bulbus cordis) b) F (Cresentic in cross section) c) T d) F (Three papillary muscle) e) F (It forms inferior border and a large part of the sternocostal surface of heart)', '[Ref: BD 6th, V-1, P257]', '2017-11-23 09:36:34', 'admin@bigm-bd.com', NULL, NULL, '1'),
(27, '2', 'Septomarginal trabeculae', '', '( Jan-09)', 'a) F (Rt. ventricle), e) F (is a muscular ridge)', '[Ref: BD 6th, V-1, P-257]', '2017-11-23 10:53:56', 'admin@bigm-bd.com', NULL, NULL, '1'),
(28, '2', 'In the normal heart', '', '(Residency, MS, March-14)', 'a) T (Except a part of left branch of the AV bundle) [Ref: BD 6th, V-1, P-263] b) T [B1 adrenorecptor activation causes: increase heart rate (positive chronotropy) increase conduction valocity, increase contractility] [Ref: www.CVSphysiology.com] c) F ( If the pressure of pulmonary artery is greater than 25mm(Hg) at rest and 30 mm(Hg) during exercise it is abnormally high and is called pulmonary hypertension) [Ref: wikipedia] d) T (The fibrous skeleton (anulus fibrosus) disturbs the continuity between atrial and ventricular muscle. Hence from the propagation of the impulse a specialised cardiac muscle, the conducting system, becomes absolutely essential) [Ref: Datta 9th, V-1, P77] e) F (Cardiac output = heart rate x stroke volume)', '[Ref: BD 6th, V-1, P-263] [Ref: www.CVSphysiology.com], [Ref: wikipedia] ,[Ref: Datta 9th, V-1, P77] ', '2017-11-23 10:57:46', 'admin@bigm-bd.com', NULL, NULL, '1'),
(29, '2', 'In coarctation of aorta', '', '(Residency, MS, March-14)', 'a) F (infant-Preductal, adult-post ductal varity )\r\nb) T (CXR reveal ‘3’ sign upper arm-dilated left subclavian, middle arm-coarctation side, lower arm-dilated descending thoracic aorta)\r\nc) T ( Isthmus lies b/w arch of aorta and descending thoracic aorta)\r\nd) T (Other-Hypoplasia of aortic arch, VSD,PDA)\r\ne) T (Other-High BP, rupture of aorta, cerebral aneurysm)', '[Ref. Bailey & love 26th p-843]', '2017-11-23 10:59:29', 'admin@bigm-bd.com', NULL, NULL, '1'),
(30, '2', 'The right ureter is related posteriorly to the', '', '(MD, MS - March-16)', 'a) F (Diaphragmatic surface is related to central tendo which is formed, 2/3 by left ventricle, 1/3 by right ventricle) [Ref: Datta 9th, V-1, P-65] b) F (Right auricle arises from the anterior superior part of the atrium) [Ref: Datta 9th, V-1, P-66] c) F (Right atrium communicates with the Rt ventricle through the rt atrioventricular orfice which is guarded by tricuspid valve) [Ref: Datta 9th, V-1, P-68] d) F (Opening of coronary sinus situated between the opening of inferior vena cava and rt. atrioventricular orifice) [Ref; Datta 9th, V-1, P-67] e) F (Drains from coronary sinus to the Rt ventricle)', '[Ref: Datta 9th, V-1, P-65] ,  [Ref: Datta 9th, V-1, P-66],  [Ref: Datta 9th, V-1, P-68] ,[Ref; Datta 9th, V-1, P-67] ', '2017-11-23 11:01:59', 'admin@bigm-bd.com', NULL, NULL, '1'),
(31, '2', 'During development of the heart', '', '(July-15)', 'a) F (Inifially the heart tube remains attached to the dorsal part of the pericardial cavity by dorsal mesoderm which disappears to form obligue&transmerse; pericardial sinuses. [Ref: wikipedia/heart development] b) p? c) T (Starts to beat and pump blood at around day 21 or 22) [Ref: wikipedia/heart development] d) F (Sinus venosus lies behind or dorsal to the primtive atrium} [Ref: Datta 9th, V-1, P-91] e) F (Muscles are developed from visceral splanchnic mesoderm)', '[Ref: Datta 9th, V-1, P-91]', '2017-11-23 11:05:46', 'admin@bigm-bd.com', NULL, NULL, '1'),
(32, '2', 'At the level of T4/5 vertebral interspaces, a CT scan shows the', '', '(March-16)', 'Structures at the level of T4/5 vertebral inter spaces: 1. The start and end of the aortic arch 2. The division between the superior and inferiromediastium 3. The upper margin of superior vena cava 4. The bifurcation of the pulmonary trunk 6. The crossing of the thoracic duct 7. The level of te sternal angle 8. The level of rib 2 9. The drainage of the azygos vein into the superior vena cava. 10. Thymus gland in some cases.', '[Ref: Datta 9th, V-1, P-21, + wikipedia]', '2017-11-23 11:07:42', 'admin@bigm-bd.com', NULL, NULL, '1'),
(33, '2', 'A CT scan at the level of the T4/5 vertebral interspace shows', '', '(July-15)', '', '', '2017-11-23 11:09:15', 'admin@bigm-bd.com', NULL, NULL, '1'),
(34, '2', 'Structures forming the left border of the mediastinal shadow in a P/A view of chest film-', '', '(July-11)', 'Rt border is formed by:\r\n1. Brachiocephalic trunk\r\n2. Superior vena cave\r\n3. Right atrium\r\n4. Inferior venacava\r\n\r\nLt border is formed by:\r\n1. Aortic arch (aortic knuckle )\r\n2. Left margin of pulmonary trunk\r\n3. Left auricle\r\n4. left ventricle\r\n', '', '2017-11-23 11:10:37', 'admin@bigm-bd.com', NULL, NULL, '1'),
(35, '2', 'The trachea', '', '(July-15)', 'a) T (10-15 cm length, diameter 2cm in males, 1.5 cm in females) [Ref: BD 6th,V-1, P-281] b) F (In the erect posture, the bifurcation lies at the lower border of T6 vertebra and descends still further during inspiration) [Ref: BD 6th, V-1, P-281] c) F (2nd, 3rd, & 4th ring) [Ref: bailey & love 26th P-691] d) F (Over most of its length it lies in the median plane, but near the lower end it deviates slightly to the right) [Ref: BD 6th v-2,V-1, P-281] e) F (A study was undertaken regarding this, the result showed the diameter of index finger was a poor predictor of diameter of trachea] [Ref: www. ncbi.nlm.nih.gov (us national institute of health)]', ' [Ref: BD 6th,V-1, P-281] [Ref: BD 6th, V-1, P-281]  [Ref: bailey & love 26th P-691] [Ref: BD 6th v-2,V-1, P-281]  [Ref: www. ncbi.nlm.nih.gov (us national institute of health)]', '2017-11-23 11:13:28', 'admin@bigm-bd.com', NULL, NULL, '1'),
(36, '2', 'The thoracic Duct', '', '(March-15)', 'a) F (Through aortic opening) b) T (In the neck it arches laterally at the level of C7 transverse process) c) T (Posterior relation in superior mediastinum: Vertebral artery & vein, sympathetic trunk; thyrocervical trunk. left phrenic nerve, medial border of the scalenus anterior, prevertebral fasia, 1st part of left subclavian artery) d) F (Passes infront of 1st part of left subclavian artery)', '[Ref: BD 6th, V-1, P-285, 286]', '2017-11-23 11:15:32', 'admin@bigm-bd.com', NULL, NULL, '1'),
(37, '2', 'The thoracic sympathetic trunk', '', '(MD, MS - March-16)', 'a) T ( 3 ganglia in cervical part , 11/12 in thoracic , 4 lumbar and 4 sacral ganglia ( Ref,Datta9th v-1 p -115) b) F (1st ganglion lies on neck of 1st rib, lower ones lie on the heads of the ribs) (Ref, BD 6th /v-1/P-296) c, F ( sympathetic trunk on either side of the body extends from cervical region to their coccygeal region where both trunks fuse to form a single ganglion impar ( Ref, BD 6th /v-1 /p-296 ) d) T ( 5th to 9th thoracic ganglia – greater spanchnic nerve , 10 th and 11th thoracic ganglia – leseer spanchric nerve 12th thoracic ganglia – Least splanchnic nerve ) e) F ( The ganglia are connected with the respective spinal nerves via the white and grey ramus communication ) ( Ref. BD 6th / v-1 /P- 296)', '( Ref,Datta9th v-1 p -115),(Ref, BD 6th /v-1/P-296),( Ref, BD 6th /v-1 /p-296 ),( Ref. BD 6th / v-1 /P- 296)', '2017-11-23 11:17:36', 'admin@bigm-bd.com', NULL, NULL, '1'),
(38, '2', 'A 34 years old male ith a squamous cell carcinoma undergoes surgical neck dissection. While attempting to ligate the inferior thyroid artery, the surgeon accidentally damages a nerve that lies in close to it. Which of the following nerves were likely to be damaged', '', '(March-13)', 'a) F ( Close to superior thyroid artery)\r\nb) T ( Reccurrent laryngeal nerve lies close to inferior thyroid artery)', '', '2017-11-23 11:19:15', 'admin@bigm-bd.com', NULL, NULL, '1'),
(39, '2', 'Cervical rib', '', '(Jan-03)', 'a) F ( Vertebra c7) b) F ( Elongation of c7 transverse process ) c) T ( Its tip may be free or attached by fibrous band to the anterior third of the first rib) d) T ( It may compress the lower trunk of brachial plexus and the subclavian artery and produce thoracic inlet syndrome . So increasing site increase the syndrome ) e) F', '(Ref . Datta 9th v-1 P- 20 + BD 192,201)', '2017-11-23 11:20:44', 'admin@bigm-bd.com', NULL, NULL, '1'),
(40, '2', 'The first part of subclavian artery', '', '(July-17)', 'b) F Medial c) T [Gray P989] d) F Ansa subclavian e) T [Gray 40th P 448 + P-989]', '[Gray P989] ,[Gray 40th P 448 + P-989]', '2017-11-23 11:22:54', 'admin@bigm-bd.com', NULL, NULL, '1'),
(41, '2', 'The neuroglia', '', '(July-08)', 'All are ectodermal except microglia-mesodermal) Brain tumor occurs due to abnarmal division of neuroglial cells) (Astrocyte)', '[Ref. Ganong 25th p.85, 86, BD chovrasia 6th V-3, p-321,322]', '2017-11-23 11:46:26', 'admin@bigm-bd.com', NULL, NULL, '1'),
(42, '2', 'The following statements are correct regarding neuroglial cells:', '', '(Jan- 11,March-12)', 'b) T(neuron)', '[Ref. Garong 25th Fig-4.1, p-86, 88]', '2017-11-23 11:48:21', 'admin@bigm-bd.com', NULL, NULL, '1'),
(43, '2', 'Blood brain barrier is formed by', '', '(July-09)', 'Blood brain barrier is formed by :\r\n1. Endothelial cells\r\n2. Besment membrane\r\n3. Foot processof Astrocyte', '[Ref. snell’s neuroanatomy 7th p- 463', '2017-11-23 11:49:42', 'admin@bigm-bd.com', NULL, NULL, '1'),
(44, '2', 'Nerve fibres that supply skeletal muscle are axons of neurons located in', '', '(March’15)', 'a) T( Alpha neuon, from large multipolar nerve cell bodies in vertebral; grey column) b) F( This give to pre-gang ionic synaptic from Tl-L2 segment and preganlionic parasympathetic fibers ) c) T ( GSE component present in CNIII, IV, XII) d) F ( Related to sensory0 e) F ( It belongs to SVE) [Snell page139,333]', '[Snell page139,333]', '2017-11-23 11:51:05', 'admin@bigm-bd.com', NULL, NULL, '1'),
(45, '2', 'About autonomic nervous system', '', '(March’15)', 'a) T(Due to devoid of myelin , postganglionic fibre passes through the gray rami communicants ) b) T c) F ( Pelvic splancenic nerves S2-S4 are also parasympathetic outflow ) d) T ( As the ganglion of sympathetic lacated in the prevertebral sympathetic chain and parasympathetic in the wall of viscera) e) F ( Via vertral roots of spinal verves T-1,L3,) [Ref. Snell Neuroanatomy /Pager-397)', '[Ref. Snell Neuroanatomy /Pager-397)', '2017-11-23 11:52:49', 'admin@bigm-bd.com', NULL, NULL, '1'),
(46, '2', 'Damage to the sympathetic nerves from the thoracolumbar outflow (T11 to L2) will disturb the function', '', '(March-13)', '', '', '2017-11-23 11:54:22', 'admin@bigm-bd.com', NULL, NULL, '1'),
(47, '2', 'Lower motor neuron lesions are characterized by', '', '(March-13)', 'Features of LMN lesion:\r\nMuscle tone abolisted\r\nFaccid paralysis\r\n3.Muscle wasting ,atropy 4.Tendon reflex Absent 5.Reaction of Degenaration seen', '[Ref. BD 6th v- 3,P-348]', '2017-11-23 12:05:54', 'admin@bigm-bd.com', NULL, NULL, '1'),
(48, '2', 'Gray matter contains', '', '(March-13)', 'Features of LMN lesion:\r\nMuscle tone abolisted\r\nFaccid paralysis\r\n3.Muscle wasting ,atropy 4.Tendon reflex Absent 5.Reaction of Degenaration seen', '[Ref. BD 6th v- 3,P-348]', '2017-11-23 12:15:59', 'admin@bigm-bd.com', NULL, NULL, '1'),
(49, '2', 'Gray matter contains', '', '(March -14)', 'Gray matter contrains: 1. Neuronal cell bodies. 2.Neuropil (dendrites and axon) 3.Glial cells 4.Synapses 5. Capillaries.', '', '2017-11-23 12:17:42', 'admin@bigm-bd.com', NULL, NULL, '1'),
(50, '2', 'The cholinergic neurons are:', '', '(July-13)', '', '', '2017-11-23 12:19:10', 'admin@bigm-bd.com', NULL, NULL, '1'),
(51, '2', 'Basal ganglia are', '', '(Mar-12)', '', '[Vision-77]', '2017-11-23 12:20:36', 'admin@bigm-bd.com', NULL, NULL, '1'),
(52, '2', 'Pyramidal cells are found in', '', '(Mar-12)', '', '', '2017-11-23 12:21:39', 'admin@bigm-bd.com', NULL, NULL, '1'),
(53, '2', 'Superior sagittal sinus', '', '(–March’15)', 'a) F( Lies between the endosteteal and meningeal layer of dura) b) F (Tributaries are superior cerebral veins Parietal emissary veins venous lacunae from meningeal vein and Diplic vein ) c) F (Forms the confluence of sinus) d) T (Arachnoid viloli and granulation projecting into the lacunae) e) T (Occupies the upper convex attached margin for the falx cerebri)', '(Ref BD V-3 Page-195)', '2017-11-23 12:23:06', 'admin@bigm-bd.com', NULL, NULL, '1'),
(54, '2', 'Regarding subarachonoid haemorrhage', '', '( March-13)', 'a)T-(85% by saccular or berry aneurysms) b)T- 5% are due to AVM and vertebral artery (dissection) c)F - (Vasoconstriction) d)T - (this may take several hours to develop)', '[ Ref.Davidson 22nd p-1248,1249]', '2017-11-23 12:25:08', 'admin@bigm-bd.com', NULL, NULL, '1'),
(55, '2', 'The visual cortex', '', '(July-11)', '', '', '2017-11-23 12:26:38', 'admin@bigm-bd.com', NULL, NULL, '1'),
(56, '2', 'The lateral part of the superior orbital fissure transmit the following', '', '(Mar-12)', '', '', '2017-11-23 12:27:46', 'admin@bigm-bd.com', NULL, NULL, '1'),
(57, '2', 'Regarding cerebral blood flow', '', '(March-13)', '', '', '2017-11-23 12:29:04', 'admin@bigm-bd.com', NULL, NULL, '1'),
(58, '2', 'The ventrolateral nucleus of the thalamus is an important synaptic site for fibers from the:', '', '(Residency, MS, March-13)', 'a) T ( Basal ganglia -Vental anterior ) b) F ( VPL) c) F ( Lateral geniculate body) d) F ( Medial nucleus)', '', '2017-11-23 12:30:19', 'admin@bigm-bd.com', NULL, NULL, '1'),
(59, '2', 'Regarding cerebral blood flow:', '', '(March-13)', 'a) T ( 14-20%)', '', '2017-11-23 12:31:41', 'admin@bigm-bd.com', NULL, NULL, '1'),
(60, '2', 'Cells of cerebral cortex include', '', '(MD-March 2015)', '', '', '2017-11-23 12:32:43', 'admin@bigm-bd.com', NULL, NULL, '1'),
(61, '2', 'Exteroceptive sensations reach the thalamus through the', '', '(March 15)', '', '', '2017-11-23 12:33:51', 'admin@bigm-bd.com', NULL, NULL, '1'),
(62, '2', 'Exteroceptive sensations reach the thalamus through the', '', '(March 15)', '', '', '2017-11-23 12:34:56', 'admin@bigm-bd.com', NULL, NULL, '1');

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
(2, 4, 'Virology', '2017-10-02 12:13:16', 'admin@bigm-bd.com', '0000-00-00 00:00:00', 'admin@bigm-bd.com', 1),
(3, 4, 'Parasitology', '2017-10-02 11:55:46', 'admin@bigm-bd.com', '0000-00-00 00:00:00', 'admin@bigm-bd.com', 1),
(4, 4, 'Mycology', '2017-10-02 11:55:39', 'admin@bigm-bd.com', '0000-00-00 00:00:00', 'admin@bigm-bd.com', 1),
(5, 4, 'Gen: Bacteriology', '2017-10-02 11:55:30', 'admin@bigm-bd.com', '0000-00-00 00:00:00', 'admin@bigm-bd.com', 1),
(6, 4, 'Sys: Bacteriology', '2017-10-02 11:55:21', 'admin@bigm-bd.com', '0000-00-00 00:00:00', 'admin@bigm-bd.com', 1),
(7, 2, 'Renal System', '2017-10-02 11:55:07', 'admin@bigm-bd.com', '0000-00-00 00:00:00', 'admin@bigm-bd.com', 1),
(8, 1, 'Abdomen', '2017-10-02 11:54:51', 'admin@bigm-bd.com', '0000-00-00 00:00:00', 'admin@bigm-bd.com', 1),
(9, 1, 'Head Neck', '2017-10-02 11:54:39', 'admin@bigm-bd.com', '0000-00-00 00:00:00', 'admin@bigm-bd.com', 1),
(10, 1, 'Thorax', '2017-10-02 11:54:08', 'admin@bigm-bd.com', '0000-00-00 00:00:00', 'admin@bigm-bd.com', 1),
(11, 2, 'Neuro-Physiology', '2017-10-02 11:53:57', 'admin@bigm-bd.com', '0000-00-00 00:00:00', 'admin@bigm-bd.com', 1),
(12, 1, 'Extremity', '2017-10-02 11:53:28', 'admin@bigm-bd.com', '0000-00-00 00:00:00', 'admin@bigm-bd.com', 1),
(13, 3, 'Cell Injury, Adaptation', '2017-10-02 11:53:17', 'admin@bigm-bd.com', '0000-00-00 00:00:00', 'admin@bigm-bd.com', 1),
(14, 1, 'Embryology', '2017-10-02 11:52:57', 'admin@bigm-bd.com', '0000-00-00 00:00:00', 'admin@bigm-bd.com', 1),
(51, 2, 'Endocrinology', '2017-10-02 11:54:24', 'admin@bigm-bd.com', '0000-00-00 00:00:00', 'admin@bigm-bd.com', 1),
(52, 4, 'Immunology', '2017-10-02 11:56:34', 'admin@bigm-bd.com', '0000-00-00 00:00:00', '', 1),
(53, 1, 'Histology', '2017-10-02 11:56:41', 'admin@bigm-bd.com', '0000-00-00 00:00:00', '', 1),
(54, 1, 'Neuroanatomy', '2017-10-02 11:56:55', 'admin@bigm-bd.com', '0000-00-00 00:00:00', '', 1),
(55, 2, 'Respiratory System', '2017-10-02 11:57:13', 'admin@bigm-bd.com', '0000-00-00 00:00:00', '', 1),
(56, 2, 'General Physiology', '2017-10-02 11:57:26', 'admin@bigm-bd.com', '0000-00-00 00:00:00', '', 1),
(57, 2, 'Body fluid, Acid based Balance', '2017-10-02 11:58:30', 'admin@bigm-bd.com', '0000-00-00 00:00:00', '', 1),
(58, 2, 'GIT Physiology', '2017-10-02 11:58:53', 'admin@bigm-bd.com', '0000-00-00 00:00:00', '', 1),
(59, 6, 'Metabolism', '2017-10-02 11:59:17', 'admin@bigm-bd.com', '0000-00-00 00:00:00', '', 1),
(60, 6, 'Vitamin & Minerals', '2017-10-02 11:59:44', 'admin@bigm-bd.com', '0000-00-00 00:00:00', '', 1),
(61, 5, 'General Pharmacology', '2017-10-02 12:00:16', 'admin@bigm-bd.com', '0000-00-00 00:00:00', '', 1),
(62, 5, 'Systemic Pharmacology', '2017-10-02 12:00:36', 'admin@bigm-bd.com', '0000-00-00 00:00:00', '', 1),
(63, 3, 'Genetics', '2017-10-02 12:00:46', 'admin@bigm-bd.com', '0000-00-00 00:00:00', '', 1),
(64, 3, 'Neoplasm / Oncology', '2017-10-02 12:01:05', 'admin@bigm-bd.com', '0000-00-00 00:00:00', '', 1),
(65, 3, 'Repair, Regeneration, Healing & Hem', '2017-10-02 12:02:03', 'admin@bigm-bd.com', '0000-00-00 00:00:00', '', 1),
(66, 3, 'Inflammation', '2017-10-06 08:33:18', 'admin@bigm-bd.com', '0000-00-00 00:00:00', '', 1),
(67, 2, 'CVS Physiology', '2017-10-06 09:25:21', 'admin@bigm-bd.com', '0000-00-00 00:00:00', '', 1),
(68, 2, 'Blood & Heamatology', '2017-10-06 09:26:12', 'admin@bigm-bd.com', '0000-00-00 00:00:00', '', 1);

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
  `sl` int(11) DEFAULT NULL,
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

INSERT INTO `sif_exam_category` (`id`, `sl`, `exam_category_name`, `cost_bdt`, `cost_usd`, `created_at`, `created_by`, `updated_at`, `updated_by`, `status`) VALUES
(1, 2, 'Review Exam', '200.50', '2.50', '2017-11-27 07:00:57', 'admin@bigm-bd.com', '0000-00-00 00:00:00', 'admin@bigm-bd.com', 1),
(2, 3, 'Faculty Exam', '240.00', '3.00', '2017-11-27 07:00:59', 'admin@bigm-bd.com', '0000-00-00 00:00:00', 'admin@bigm-bd.com', 1),
(3, 4, 'Model Test', '500.00', '6.50', '2017-11-27 07:01:03', 'admin@bigm-bd.com', '0000-00-00 00:00:00', '', 1),
(4, 5, 'Mock Test', '600.00', '8.00', '2017-11-27 07:01:07', 'admin@bigm-bd.com', '0000-00-00 00:00:00', '', 1),
(5, 1, 'Memory Test', '0.00', '0.00', '2017-11-27 07:00:50', 'admin@bigm-bd.com', '0000-00-00 00:00:00', '', 1);

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
  `institute_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `faculty_id` int(11) NOT NULL,
  `subject_faculty_id` int(11) DEFAULT NULL,
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
(27, 4, 28, 33, 33, 'Cardiology', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid beatae cumque dolor dolores eaque eius enim est excepturi hic, molestiae odit omnis provident quisquam rem sint veritatis voluptates. Iste, laudantium.', '2017-11-21 10:04:55', 'admin@bigm-bd.com', NULL, 'admin@bigm-bd.com', 1),
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
(2, '0', '::1', 'admin@bigm-bd.com', '$2y$08$V8xS9dtX9i7VhC86rb9uhecdQfNitkGWG8WgKMAmK.IieL6eKrmwq', '123456', NULL, 'admin@bigm-bd.com', NULL, NULL, NULL, 'ycJdEAF/oNqaG9QfumhkDe', 1474185190, 1511769298, 1, 'Admin', 'Istrator', '', '', '', 0, 1),
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
-- Indexes for table `oe_doc_exams`
--
ALTER TABLE `oe_doc_exams`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `oe_doc_exams_id_uindex` (`id`);

--
-- Indexes for table `oe_doc_master`
--
ALTER TABLE `oe_doc_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oe_doc_purchases`
--
ALTER TABLE `oe_doc_purchases`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;
--
-- AUTO_INCREMENT for table `oe_doc_educations`
--
ALTER TABLE `oe_doc_educations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=137;
--
-- AUTO_INCREMENT for table `oe_doc_exams`
--
ALTER TABLE `oe_doc_exams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `oe_doc_master`
--
ALTER TABLE `oe_doc_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `oe_doc_purchases`
--
ALTER TABLE `oe_doc_purchases`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `oe_doc_referance`
--
ALTER TABLE `oe_doc_referance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;
--
-- AUTO_INCREMENT for table `oe_exam`
--
ALTER TABLE `oe_exam`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `oe_exam_question`
--
ALTER TABLE `oe_exam_question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `oe_qns_topic_relatn`
--
ALTER TABLE `oe_qns_topic_relatn`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `oe_qsn_bnk_ans`
--
ALTER TABLE `oe_qsn_bnk_ans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=311;
--
-- AUTO_INCREMENT for table `oe_qsn_bnk_master`
--
ALTER TABLE `oe_qsn_bnk_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;
--
-- AUTO_INCREMENT for table `oe_topics`
--
ALTER TABLE `oe_topics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;
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
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
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
