-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 02, 2020 at 02:20 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 5.6.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mcfojotc_sareeerpdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `job_work_party`
--

CREATE TABLE `job_work_party` (
  `id` int(11) NOT NULL,
  `name` varchar(25) DEFAULT NULL,
  `phone_no` bigint(10) NOT NULL,
  `gst` varchar(20) NOT NULL,
  `deptName` varchar(20) NOT NULL,
  `subDeptName` varchar(20) NOT NULL,
  `job_work_type` varchar(62) DEFAULT NULL,
  `address` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_work_party`
--

INSERT INTO `job_work_party` (`id`, `name`, `phone_no`, `gst`, `deptName`, `subDeptName`, `job_work_type`, `address`) VALUES
(5, 'arti', 8953475183, '3', 'PRODUCTION(EMB)', 'sub dept2', NULL, 'vns'),
(6, 'MD ANAS', 0, 'UPR', 'Science', 'subDept', NULL, ''),
(7, '', 323, '', 'PRODUCTION(EMB)', 'subDept', NULL, ''),
(10, 'arti singh patel', 1231312323, 'wrwrw', 'PRODUCTION(EMB)', 'subDept', NULL, 'sikiya'),
(11, 'ruchi singh', 1231312323, 'wrwrw', 'PRODUCTION(EMB)', 'subDept', 'Hamburger', 'hsdgj');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `job_work_party`
--
ALTER TABLE `job_work_party`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `job_work_party`
--
ALTER TABLE `job_work_party`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
