-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 08, 2021 at 02:59 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pj`
--

-- --------------------------------------------------------

--
-- Table structure for table `dept`
--

CREATE TABLE `dept` (
  `dept_id` int(3) NOT NULL,
  `dept` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='ตารางแผนก';

--
-- Dumping data for table `dept`
--

INSERT INTO `dept` (`dept_id`, `dept`) VALUES
(101, 'การขาย'),
(102, 'การตลาด'),
(103, 'ไอที');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `room_id` int(3) NOT NULL,
  `room` varchar(255) NOT NULL,
  `detail` text NOT NULL,
  `pic` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='ตารางห้องประชุม';

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`room_id`, `room`, `detail`, `pic`, `status`) VALUES
(101, 'ห้องประชุมสาเกต', 'ความกว้าง 20x10 ตรม.\r\nเก้าอี้ 20 ตัว\r\nความจุ 120 คน\r\n', '101.jpg', 0),
(102, 'ห้องประชุมพลาญ', 'กว้าง 20x10 ตรม.\r\nโต๊ะยาว 4 ตัว\r\nเก้าอี้ 20 ตัว', '102.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(3) NOT NULL,
  `username` varchar(64) NOT NULL,
  `name` varchar(64) NOT NULL,
  `email` varchar(64) DEFAULT NULL,
  `phone` varchar(64) DEFAULT NULL,
  `pass` varchar(64) NOT NULL,
  `dept_id` int(3) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `user_type` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='ตารางผู้ใช้งาน';

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `name`, `email`, `phone`, `pass`, `dept_id`, `status`, `user_type`) VALUES
(1, 'admin', 'ผู้ดูแลระบบ', 'surachai@rvc.ac.th', '0897147777', '123', 103, 1, 0),
(2, 'surachai', 'นายสุระชัย วิเศษโวหาร', 'surachai@rvc.ac.th', '0897147777', '123', 102, 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dept`
--
ALTER TABLE `dept`
  ADD PRIMARY KEY (`dept_id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`room_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
