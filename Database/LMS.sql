-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2022 at 06:21 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `fname` varchar(20) DEFAULT NULL,
  `lname` varchar(20) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `password` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_cs DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `fname`, `lname`, `email`, `password`) VALUES
(1, 'Loay', 'Admin', 'loayadmin@gmail.com', 'Admin'),
(2, 'Youssef', 'Admin', 'youssefadmin@gmail.com', 'Admin'),
(3, 'Ahmed', 'Admin', 'ahmedadmin@gmail.com', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `b_id` int(11) NOT NULL,
  `b_name` varchar(255) DEFAULT NULL,
  `b_author` varchar(255) DEFAULT NULL,
  `b_level` smallint(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`b_id`, `b_name`, `b_author`, `b_level`) VALUES
(1, 'Math-3', 'Dr/Ahmed', 1),
(2, 'Logic Design', 'Dr/Khaled', 1),
(3, 'Data', 'Dr/Arabic', 2),
(4, 'Math-2', 'Dr/Youusef', 2),
(5, 'Network', 'Dr/Loay', 3),
(6, 'Statistics And Probability', 'Dr/Mohy', 4),
(7, 'Clean Code', 'Dr/Abdo', 3),
(8, 'Animi', 'Dr/Omar', 4),
(9, 'Final Book', 'Dr/Arabic', 4),
(15, 'Introduction', 'Dr/English', 1),
(16, 'Managment', 'Dr/Ahmed', 2);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `fname` varchar(20) DEFAULT NULL,
  `lname` varchar(20) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `s_level` smallint(6) DEFAULT NULL,
  `password` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_cs DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `fname`, `lname`, `email`, `s_level`, `password`) VALUES
(1, 'Loay', 'Ghreeb', 'loayahmed655@gmail.com', 1, '12345678'),
(2, 'Youssef', 'Waheed', 'youssef@gmail.com', 2, 'Youssef2003'),
(3, 'Abdo', 'Gad', 'abdo@gmail.com', 3, 'Abdoo123'),
(4, 'Omar', 'Eid', 'omar@gmail.com', 4, 'Omar$$22'),
(5, 'Ahmed', 'Taher', 'ahmedtaher@gmail.com', 1, 'Ahmed1234'),
(6, 'Abdo', 'Hatata', 'abdohatata@gmail.com', 3, 'abdo9999'),
(7, 'Yazed', 'Elkholy', 'Yazed@gmail.com', 2, 'yazed0123'),
(8, 'Mahmoud', 'Gammal', 'mahmoud@gmail.com', 4, 'mahmoud333'),
(9, 'Ziad', 'Osama', 'Ziad@gmail.com', 2, '123456789');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`b_id`),
  ADD UNIQUE KEY `b_name` (`b_name`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `b_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
