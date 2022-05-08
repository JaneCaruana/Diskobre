-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 08, 2022 at 02:20 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `diskobre`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(12) NOT NULL,
  `user_type` varchar(20) NOT NULL,
  `fname` varchar(30) DEFAULT NULL,
  `middle` varchar(256) DEFAULT NULL,
  `lname` varchar(30) DEFAULT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `bdate` date DEFAULT NULL,
  `profilepic` varchar(50) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_type`, `fname`, `middle`, `lname`, `username`, `password`, `bdate`, `profilepic`, `email`) VALUES
(1, '1', 'Jose', NULL, 'Medina', 'JMig', 'e10adc3949ba59abbe56e057f20f883e', '2002-04-02', 'try.png', 'josemiguelmedina0210@gmail.com'),
(3, '2', 'John', NULL, 'Doe ', 'jose', 'e10adc3949ba59abbe56e057f20f883e', '2022-04-08', 'try2.png', 'josemiguelmedina@gmail.com'),
(5, '3', 'Jamesa', NULL, 'Meds', 'Jamison_Meds', 'e10adc3949ba59abbe56e057f20f883e', '2022-04-16', 'try4.png', 'josemiguelmedinasgmail.com'),
(16, '3', 'Jmiguelyyy', 'S.yyy', 'Medinayyy', 'Jmoguelsssyyy', 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL, NULL),
(18, '3', 'Daniel Gabriel', 't', 'Moratin', 'danielmoratin3th@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL, NULL),
(19, '3', 'Daniel Gabriel', 't', 'Moratin', 'yijabex498@zcai77.com', 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL, NULL),
(20, '2', NULL, NULL, NULL, 'dandaniel', 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL, 'tremochaniel@gmail.com'),
(21, '3', 'Daniel Gabriel', 'M', 'Moratin', 'kingshyu', 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL, NULL),
(22, '3', 'Roi', 'G', 'Floretino', '123456', 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL, NULL),
(23, '2', 'Daniel', NULL, 'Moratin', 'dandaniel3000', 'e10adc3949ba59abbe56e057f20f883e', '2000-06-22', NULL, 'tremochaniel@gmail.com'),
(24, '3', 'Daniel Gabriel', '', 'Moratin', '213123', 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL, NULL),
(25, '3', 'Craig Howe', 'Fugiat voluptates labore enim in quis', 'Keller', 'rhysin', '21a3d805e7aa00eaa60dc516009bbafc', NULL, NULL, NULL),
(26, '2', 'Elton', NULL, 'Peters', 'fozuwawan', '949a7e7fc7ae5dfa6d9644054dfbc774', '1996-05-11', NULL, 'metujiw@mailinator.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
