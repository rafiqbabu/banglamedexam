-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 10, 2017 at 10:56 AM
-- Server version: 5.7.20-0ubuntu0.16.04.1
-- PHP Version: 5.6.32-1+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;

--
-- Database: `bigm_genesis_online_exam`
--

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
  `twitter` varchar(255) DEFAULT NULL,
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
  `status` int(1) NOT NULL DEFAULT '1',
  `lat` varchar(20) DEFAULT NULL,
  `lng` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sif_general_info`
--

INSERT INTO `sif_general_info` (`id`, `name`, `tagline`, `email`, `fb_id`, `twitter`, `address`, `phone`, `website`, `logo`, `ah_stu_fee`, `ah_tec_payment`, `created_at`, `created_by`, `updated_by`, `short_code`, `updated_at`, `status`, `lat`, `lng`) VALUES
(1, 'Genesis :: Online Exam', 'Post Graduation Medical Orientation Center', 'info@genesis.com', 'https://facebook.com/', 'https://twitter.com/', '230/3 Elephant Road, Kataban Mor, Dhaka - 1205', '01764441544', 'http://www.genesispg.org', 'upload/logo/b09e9c076490117ef232e0f55f4e4b1c.png', 0, 0, '2017-03-01 10:31:48', '', '', 'GEN', NULL, 1, '23.7387178', '90.3892595');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sif_general_info`
--
ALTER TABLE `sif_general_info`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sif_general_info`
--
ALTER TABLE `sif_general_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
