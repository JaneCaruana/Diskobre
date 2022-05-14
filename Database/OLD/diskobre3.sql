-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 28, 2022 at 05:44 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

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
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `estcat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `estcat`) VALUES
(1, 'Hospital'),
(2, 'Malls'),
(3, 'hotel'),
(4, 'supermarket'),
(9, 'gasoline station'),
(10, 'convinience store');

-- --------------------------------------------------------

--
-- Table structure for table `contribution`
--

CREATE TABLE `contribution` (
  `contribution_id` int(12) NOT NULL,
  `user_id_fk` int(12) NOT NULL,
  `estab_id_fk` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `establishment`
--

CREATE TABLE `establishment` (
  `establishment_id` int(12) NOT NULL,
  `estab_name` varchar(40) NOT NULL,
  `category_id` int(11) NOT NULL,
  `address` varchar(70) DEFAULT NULL,
  `latitude` float DEFAULT NULL,
  `longtitude` float DEFAULT NULL,
  `description` text NOT NULL,
  `estab_email` varchar(40) DEFAULT NULL,
  `status` varchar(30) DEFAULT '1',
  `user_fk` int(11) NOT NULL,
  `contact` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `establishment`
--

INSERT INTO `establishment` (`establishment_id`, `estab_name`, `category_id`, `address`, `latitude`, `longtitude`, `description`, `estab_email`, `status`, `user_fk`, `contact`) VALUES
(4, 'Ayala Feliz', 1, NULL, NULL, NULL, 'good mall', NULL, '2', 10, NULL),
(5, 'Xentro mall', 2, 'Wilsonz', NULL, NULL, 'great mall', 'newest@gmail.com', '2', 0, 2147483647),
(8, 'Roseyyy', 1, 'Wilsonsy', NULL, NULL, 'good descriptyyy', 'roseparma@gmail.comsyyy', '3', 16, 2147483647);

-- --------------------------------------------------------

--
-- Table structure for table `establ_admin`
--

CREATE TABLE `establ_admin` (
  `user_admin_id` int(12) NOT NULL,
  `estab_id_fk` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `estab_image`
--

CREATE TABLE `estab_image` (
  `image_id` int(12) NOT NULL,
  `estab_id_fk` int(12) NOT NULL,
  `image` varchar(60) NOT NULL,
  `image_type` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `operatingtime`
--

CREATE TABLE `operatingtime` (
  `OperatingDay_id` int(11) NOT NULL,
  `Establishmentid_fk` int(11) NOT NULL,
  `Day` int(11) NOT NULL,
  `start` time NOT NULL,
  `end` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `operatingtime`
--

INSERT INTO `operatingtime` (`OperatingDay_id`, `Establishmentid_fk`, `Day`, `start`, `end`) VALUES
(10, 8, 0, '05:35:00', '06:35:00'),
(11, 8, 1, '06:36:00', '07:36:00'),
(12, 8, 2, '07:36:00', '08:36:00'),
(13, 8, 3, '08:36:00', '09:36:00'),
(14, 8, 4, '09:36:00', '10:36:00'),
(15, 8, 5, '10:36:00', '11:36:00'),
(16, 8, 6, '11:36:00', '12:36:00');

-- --------------------------------------------------------

--
-- Table structure for table `package`
--

CREATE TABLE `package` (
  `package_id` int(12) NOT NULL,
  `title` varchar(60) NOT NULL,
  `description` text NOT NULL,
  `price` int(12) NOT NULL,
  `duration` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `rating_review`
--

CREATE TABLE `rating_review` (
  `ra_rev_id` int(12) NOT NULL,
  `estab_id_fk` int(12) NOT NULL,
  `user_id_fk` int(12) NOT NULL,
  `rate` int(12) NOT NULL,
  `review` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `subscription`
--

CREATE TABLE `subscription` (
  `subs_id` int(12) NOT NULL,
  `user_id_fk` int(12) NOT NULL,
  `package_id_fk` int(12) NOT NULL,
  `start_at` date NOT NULL,
  `expire_at` date NOT NULL,
  `note` varchar(200) NOT NULL,
  `status` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `password` varchar(30) NOT NULL,
  `bdate` date DEFAULT NULL,
  `profilepic` varchar(50) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_type`, `fname`, `middle`, `lname`, `username`, `password`, `bdate`, `profilepic`, `email`) VALUES
(1, '1', 'Jose', NULL, 'Medina', 'JMig', 'lol123', '2002-04-02', 'try.png', 'josemiguelmedina0210@gmail.com'),
(3, '2', 'John', NULL, 'Doe ', 'john_doe', '123456', '2022-04-08', 'try2.png', 'josemiguelmedina@gmail.com'),
(4, '2', 'Jane', NULL, 'Thompson', 'jane_thompson', '12345', '2022-04-08', 'try3.png', 'josemiguelmedina@gmail.com'),
(5, '3', 'Jamesa', NULL, 'Meds', 'Jamison_Meds', 'lol123', '2022-04-16', 'try4.png', 'josemiguelmedinasgmail.com'),
(6, '2', '', NULL, '', 'john', 'asdasd', NULL, NULL, ''),
(10, '3', NULL, NULL, NULL, 'krystel_riosa', '12345', NULL, NULL, NULL),
(11, '3', NULL, NULL, NULL, 'lols', '123', NULL, NULL, NULL),
(12, '3', '', '0', 'Obrecht', 'dan', '123', NULL, NULL, NULL),
(13, '3', 'Cliff', '0', 'Obrecht', 'dans', '123', NULL, NULL, NULL),
(14, '3', 'hehe', 'Miguel', 'Medina', 'yo', '123', NULL, NULL, NULL),
(15, '3', 'fdsdfs', 'sdfasd', 'sdasdasd', 'asas', '123', NULL, NULL, NULL),
(16, '3', 'Jmiguelyyy', 'S.yyy', 'Medinayyy', 'Jmoguelsssyyy', '123Jmig', NULL, NULL, NULL),
(17, '2', NULL, NULL, NULL, 'JaSerpaio', '123456789', NULL, NULL, 'jaserapio@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `contribution`
--
ALTER TABLE `contribution`
  ADD PRIMARY KEY (`contribution_id`),
  ADD KEY `user_id_fk` (`user_id_fk`),
  ADD KEY `estab_id_fk` (`estab_id_fk`);

--
-- Indexes for table `establishment`
--
ALTER TABLE `establishment`
  ADD PRIMARY KEY (`establishment_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `establ_admin`
--
ALTER TABLE `establ_admin`
  ADD PRIMARY KEY (`user_admin_id`),
  ADD KEY `estab_id_fk` (`estab_id_fk`);

--
-- Indexes for table `estab_image`
--
ALTER TABLE `estab_image`
  ADD PRIMARY KEY (`image_id`),
  ADD KEY `estab_id_fk` (`estab_id_fk`);

--
-- Indexes for table `operatingtime`
--
ALTER TABLE `operatingtime`
  ADD PRIMARY KEY (`OperatingDay_id`);

--
-- Indexes for table `package`
--
ALTER TABLE `package`
  ADD PRIMARY KEY (`package_id`);

--
-- Indexes for table `rating_review`
--
ALTER TABLE `rating_review`
  ADD PRIMARY KEY (`ra_rev_id`),
  ADD KEY `estab_id_fk` (`estab_id_fk`),
  ADD KEY `user_id_fk` (`user_id_fk`);

--
-- Indexes for table `subscription`
--
ALTER TABLE `subscription`
  ADD PRIMARY KEY (`subs_id`),
  ADD KEY `user_id_fk` (`user_id_fk`),
  ADD KEY `package_id_fk` (`package_id_fk`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `contribution`
--
ALTER TABLE `contribution`
  MODIFY `contribution_id` int(12) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `establishment`
--
ALTER TABLE `establishment`
  MODIFY `establishment_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `estab_image`
--
ALTER TABLE `estab_image`
  MODIFY `image_id` int(12) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `operatingtime`
--
ALTER TABLE `operatingtime`
  MODIFY `OperatingDay_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `package`
--
ALTER TABLE `package`
  MODIFY `package_id` int(12) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rating_review`
--
ALTER TABLE `rating_review`
  MODIFY `ra_rev_id` int(12) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subscription`
--
ALTER TABLE `subscription`
  MODIFY `subs_id` int(12) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `contribution`
--
ALTER TABLE `contribution`
  ADD CONSTRAINT `contribution_ibfk_1` FOREIGN KEY (`user_id_fk`) REFERENCES `user` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `contribution_ibfk_2` FOREIGN KEY (`estab_id_fk`) REFERENCES `establishment` (`establishment_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `establishment`
--
ALTER TABLE `establishment`
  ADD CONSTRAINT `establishment_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`);

--
-- Constraints for table `establ_admin`
--
ALTER TABLE `establ_admin`
  ADD CONSTRAINT `establ_admin_ibfk_1` FOREIGN KEY (`user_admin_id`) REFERENCES `user` (`user_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `establ_admin_ibfk_2` FOREIGN KEY (`estab_id_fk`) REFERENCES `establishment` (`establishment_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `estab_image`
--
ALTER TABLE `estab_image`
  ADD CONSTRAINT `estab_image_ibfk_1` FOREIGN KEY (`estab_id_fk`) REFERENCES `establishment` (`establishment_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `rating_review`
--
ALTER TABLE `rating_review`
  ADD CONSTRAINT `rating_review_ibfk_1` FOREIGN KEY (`estab_id_fk`) REFERENCES `establishment` (`establishment_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `rating_review_ibfk_2` FOREIGN KEY (`user_id_fk`) REFERENCES `user` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `subscription`
--
ALTER TABLE `subscription`
  ADD CONSTRAINT `subscription_ibfk_1` FOREIGN KEY (`user_id_fk`) REFERENCES `user` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `subscription_ibfk_2` FOREIGN KEY (`package_id_fk`) REFERENCES `package` (`package_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
