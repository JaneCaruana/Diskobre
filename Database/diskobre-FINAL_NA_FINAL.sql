-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 08, 2022 at 07:25 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

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
(1, 'Remittances'),
(2, 'Grocery Stores'),
(3, 'Water Refilling Station'),
(4, 'Post Office'),
(9, 'Laundry Shops'),
(10, 'Veterinary clinics'),
(13, 'Hospital'),
(14, 'Mall'),
(15, 'Hotel'),
(16, 'Supermarket'),
(17, 'Gas Station'),
(18, 'Convenience Store'),
(19, 'Pharmacy'),
(20, 'Bank'),
(21, 'Public Transportation'),
(22, 'Police Station'),
(23, 'Health Care'),
(24, 'Public Markets'),
(25, 'Hardware Stores'),
(26, 'Water and Electric Utilities'),
(27, 'Telco');

-- --------------------------------------------------------

--
-- Table structure for table `establishment`
--

CREATE TABLE `establishment` (
  `establishment_id` int(12) NOT NULL,
  `estab_name` varchar(40) NOT NULL,
  `category_id` int(11) NOT NULL,
  `address` varchar(70) DEFAULT NULL,
  `latitude` decimal(23,20) DEFAULT NULL,
  `longtitude` decimal(23,20) DEFAULT NULL,
  `description` text NOT NULL,
  `estab_email` varchar(40) DEFAULT NULL,
  `status` varchar(30) DEFAULT '1',
  `user_fk` int(11) DEFAULT NULL,
  `contact` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `establishment`
--

INSERT INTO `establishment` (`establishment_id`, `estab_name`, `category_id`, `address`, `latitude`, `longtitude`, `description`, `estab_email`, `status`, `user_fk`, `contact`) VALUES
(11, 'Sunrise Remittance', 1, '7VQF+MRR, Cebuana Lhuillier, N. Bacalso Avenue Extension, Mambaling, C', '10.28921860190764200000', '123.87452399682029000000', 'Money transfer service', NULL, '2', 16, 912345678),
(12, 'Daniel Gabriel Moratin', 1, 'Blk 4 Lot 4 Minglanilla Homes Tungkil', '10.30111520490214800000', '123.88456614967140000000', 'Money transfer service', 'tremochaniel@gmail.com', '2', 18, 2147483647),
(13, 'Xpress Money', 1, 'Cebuana Lhuillier Services Corporation, Katipunan St, Cebu City, Cebu', '10.30086186311089200000', '123.87503894283344000000', 'Money transfer service', NULL, '2', 19, 987654321),
(14, 'Colonnade Mall', 2, 'Colon St, Cebu City, Cebu', '10.29714568999802200000', '123.89967234700346000000', 'Grocery Store in Cebu', 'colonade@gmail.com', '2', 21, 909876543),
(15, 'Mini Mart', 2, '8V2C+HP8, Katipunan St, Cebu City, 6000 Cebu', '10.30157919421068000000', '123.87177737202738000000', 'Grocery Store', NULL, '1', 22, 82603560),
(16, 'Super Metro Mambaling', 2, 'Super Metro Mambaling, F. Llamas St, cor Natalio B. Bacalso Ave, Cebu ', '10.29044103262503300000', '123.87022828859355000000', 'Grocery Store', NULL, '1', 24, 0),
(20, 'Four Aces Water Refilling Station', 3, '18 Francisco Llamas St, Cebu City, 6000 Cebu', '10.29189891242511700000', '123.87034547125927000000', 'Bottled water supplier', NULL, '1', NULL, NULL),
(21, 'Alphas Well Purified Water Refilling St', 3, '1036-Q Basak Bontores, Cebu City, 6000 Cebu', '10.28805582536581300000', '123.86733867125929000000', 'Water purification company', NULL, '1', NULL, NULL),
(22, 'Philippine Postal Corporation', 4, 'Osmeña Blvd, Cebu City, 6000 Cebu', '10.30329833569522800000', '123.89524421443117000000', 'Post office', NULL, '1', NULL, NULL),
(23, 'Cebu Central Post Office', 4, 'Cebu Central Post Office, A. Pigafetta Street, Cebu City, 6000 Cebu', '10.29223563112933900000', '123.90683135788278000000', 'Post Office', NULL, '1', NULL, NULL),
(24, 'Coin Laundry Express - Echavez', 9, '195 g Echavez Ext, Cebu City, Cebu', '10.30887082496156600000', '123.90382727450924000000', 'Laundry Shop', 'email@gmail.com', '1', NULL, NULL),
(25, 'Wash Day - Self Service Laundry', 9, 'JRDC Bldg, 102 Osmeña Blvd, Cebu City, 6000 Cebu', '10.31283972207428000000', '123.89181097759648000000', 'Self service laundry shop', '', '1', NULL, NULL),
(26, 'Aycardo Veterinary Center Inc. - Main Br', 10, '68 J. Alcantara St, Cebu City, Cebu', '10.30000301800865000000', '123.89035184758900000000', 'Animal hospital', '', '1', NULL, NULL),
(27, 'Yandug Animal Care Clinic', 10, '8B Nichols Heights, Cebu City, 6000 Cebu', '10.31731428565130100000', '123.88245542390348000000', 'Veterinarian', '', '1', NULL, NULL),
(38, 'kikfghsfgh', 13, 'Blk 4 Lot 4 Minglanilla Homes Tungkil', '10.31481499316203100000', '123.88454169311626000000', '21341241', 'tremochaniel@gmail.com', '2', 24, 2147483647),
(40, 'Roi Floretino', 1, '100 Station Yard Rd', '10.31543380551048000000', '123.88591498412609000000', '123123', NULL, '2', 16, 2025550667),
(41, 'Roi Floretino', 1, '100 Station Yard Rd', '10.31577157890200200000', '123.88497084655404000000', '213123123', NULL, '2', 3, 2025550667),
(42, 'Daniel Gabriel Moratin', 1, 'Blk 4 Lot 4 Minglanilla Homes Tungkil', '10.24039392383645000000', '123.80720999706898000000', 'asdsadsad', NULL, '1', 3, 2147483647);

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

--
-- Dumping data for table `estab_image`
--

INSERT INTO `estab_image` (`image_id`, `estab_id_fk`, `image`, `image_type`) VALUES
(1, 12, '12PaymentReceipt.jpg', 5),
(2, 12, '12Daniel Gabriel Moratinbusinesspermit1.jpg', 4),
(3, 12, '12Daniel Gabriel Moratinbusinesspermit2.jpg', 4),
(4, 13, '13PaymentReceipt.jpg', 5),
(5, 13, '13PaymentReceipt.jpg', 5),
(6, 13, '13PaymentReceipt.jpg', 5),
(7, 13, '13PaymentReceipt.jpg', 5),
(8, 13, '13PaymentReceipt.jpg', 5),
(9, 13, '13PaymentReceipt.jpg', 5),
(10, 13, '13PaymentReceipt.jpg', 5),
(11, 13, '13PaymentReceipt.jpg', 5),
(12, 13, '13PaymentReceipt.jpg', 5),
(13, 13, '13PaymentReceipt.jpg', 5),
(14, 13, '13PaymentReceipt.jpg', 5),
(15, 13, '13PaymentReceipt.jpg', 5),
(16, 13, '13PaymentReceipt.jpg', 5),
(17, 13, '13PaymentReceipt.jpg', 5),
(18, 13, '13PaymentReceipt.jpg', 5),
(19, 13, '13PaymentReceipt.jpg', 5),
(20, 13, '13PaymentReceipt.jpg', 5),
(21, 13, '13PaymentReceipt.jpg', 5),
(22, 13, '13PaymentReceipt.jpg', 5),
(23, 13, '13PaymentReceipt.jpg', 5),
(24, 13, '13PaymentReceipt.jpg', 5),
(25, 13, '13PaymentReceipt.jpg', 5),
(26, 13, '13PaymentReceipt.jpg', 5),
(27, 13, '13PaymentReceipt.jpg', 5),
(28, 13, '13PaymentReceipt.jpg', 5),
(29, 13, '13PaymentReceipt.jpg', 5),
(30, 13, '13PaymentReceipt.jpg', 5),
(31, 13, '13PaymentReceipt.jpg', 5),
(32, 13, '13PaymentReceipt.jpg', 5),
(33, 13, '13PaymentReceipt.jpg', 5),
(34, 13, '13PaymentReceipt.jpg', 5),
(35, 13, '13PaymentReceipt.jpg', 5),
(36, 13, '13PaymentReceipt.jpg', 5),
(37, 13, '13PaymentReceipt.jpg', 5),
(38, 13, '13PaymentReceipt.jpg', 5),
(39, 13, '13PaymentReceipt.jpg', 5),
(40, 13, '13PaymentReceipt.jpg', 5),
(41, 13, '13PaymentReceipt.jpg', 5),
(42, 13, '13PaymentReceipt.jpg', 5),
(43, 14, '14PaymentReceipt.jpg', 5),
(44, 38, '38PaymentReceipt.jpg', 5),
(45, 38, '38PaymentReceipt.jpg', 5),
(46, 38, '38PaymentReceipt.jpg', 5),
(47, 38, '38PaymentReceipt.jpg', 5);

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
(10, 12, 0, '05:35:00', '06:35:00'),
(11, 12, 1, '06:36:00', '07:36:00'),
(12, 12, 2, '07:36:00', '08:36:00'),
(13, 12, 3, '08:36:00', '09:36:00'),
(14, 12, 4, '09:36:00', '10:36:00'),
(15, 12, 5, '10:36:00', '11:36:00'),
(16, 12, 6, '11:36:00', '12:36:00'),
(17, 13, 0, '05:35:00', '06:35:00'),
(18, 13, 1, '06:36:00', '07:36:00'),
(19, 13, 2, '07:36:00', '08:36:00'),
(20, 13, 3, '08:36:00', '09:36:00'),
(21, 13, 4, '09:36:00', '10:36:00'),
(22, 13, 5, '10:36:00', '11:36:00'),
(23, 13, 6, '11:36:00', '12:36:00'),
(24, 21, 0, '05:35:00', '06:35:00'),
(25, 21, 1, '06:36:00', '07:36:00'),
(26, 21, 2, '07:36:00', '08:36:00'),
(27, 21, 3, '08:36:00', '09:36:00'),
(28, 21, 4, '09:36:00', '10:36:00'),
(29, 21, 5, '10:36:00', '11:36:00'),
(30, 21, 6, '11:36:00', '12:36:00'),
(31, 15, 0, '01:23:00', '01:24:00'),
(32, 15, 1, '01:00:00', '01:00:00'),
(33, 15, 2, '01:00:00', '01:00:00'),
(34, 15, 1, '01:24:00', '01:25:00');

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

--
-- Dumping data for table `rating_review`
--

INSERT INTO `rating_review` (`ra_rev_id`, `estab_id_fk`, `user_id_fk`, `rate`, `review`) VALUES
(1, 14, 23, 5, '12321`3'),
(2, 14, 23, 3, '123123'),
(3, 14, 23, 3, '12312'),
(4, 26, 18, 4, '12312312');

-- --------------------------------------------------------

--
-- Table structure for table `subscription`
--

CREATE TABLE `subscription` (
  `subs_id` int(12) NOT NULL,
  `user_id_fk` int(12) NOT NULL,
  `start_at` date DEFAULT NULL,
  `expire_at` date DEFAULT NULL,
  `subscriptionType` varchar(200) DEFAULT NULL,
  `status` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subscription`
--

INSERT INTO `subscription` (`subs_id`, `user_id_fk`, `start_at`, `expire_at`, `subscriptionType`, `status`) VALUES
(30, 16, '2022-04-03', '2022-05-03', NULL, 'active'),
(31, 19, '2022-05-03', '2022-06-03', NULL, 'inactive'),
(32, 16, '2022-05-03', '2022-05-03', NULL, 'active'),
(33, 16, '2022-05-03', '2022-05-03', NULL, 'active'),
(34, 16, '2022-05-03', '2022-05-03', NULL, 'active'),
(35, 16, '2022-05-04', '2022-05-02', NULL, 'active'),
(36, 16, '2022-05-04', '2022-05-04', NULL, 'active'),
(37, 16, '2022-05-04', '2023-05-04', NULL, 'active'),
(43, 19, NULL, NULL, 'Php 49/Monthly', 'inactive'),
(44, 19, NULL, NULL, 'monthly', 'inactive'),
(45, 19, NULL, NULL, 'monthly', 'inactive'),
(46, 19, NULL, NULL, 'monthly', 'inactive'),
(47, 19, NULL, NULL, 'Php 49/Monthly', 'inactive'),
(48, 19, NULL, NULL, 'monthly', 'inactive'),
(49, 19, NULL, NULL, 'monthly', 'inactive'),
(50, 19, NULL, NULL, 'monthly', 'inactive'),
(51, 19, NULL, NULL, 'monthly', 'inactive'),
(52, 19, NULL, NULL, 'monthly', 'inactive'),
(53, 19, NULL, NULL, 'Php 49/Monthly', 'inactive'),
(54, 19, '2022-05-14', '2022-06-14', 'Php 49/Monthly', 'inactive'),
(55, 19, '2022-05-08', '2022-05-07', 'Php 49/Monthly', 'inactive'),
(65, 19, NULL, NULL, 'Php 441/Yearly', 'inactive'),
(66, 19, '2022-05-18', '2021-05-18', 'Php 441/Yearly', 'inactive'),
(67, 19, '2022-05-03', '2022-06-03', 'Php 49/Monthly', 'inactive'),
(68, 19, '2022-05-03', '2021-06-03', 'Php 49/Monthly', 'inactive'),
(69, 19, '2022-05-03', '2021-06-03', 'Php 49/Monthly', 'inactive'),
(70, 19, NULL, NULL, 'Php 49/Monthly', 'inactive'),
(71, 19, NULL, NULL, 'Php 49/Monthly', 'inactive'),
(72, 19, '2022-05-12', '2021-05-12', 'Php 441/Yearly', 'inactive'),
(73, 19, '2022-05-16', '2021-06-16', 'Php 49/Monthly', 'inactive'),
(74, 21, NULL, NULL, 'Php 441/Yearly', 'active'),
(76, 24, '2022-05-10', '2021-06-10', 'Php 49/Monthly', 'active'),
(78, 24, '2022-05-13', '2022-06-13', 'Php 49/Monthly', 'active');

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
(3, '2', 'John', NULL, 'Doe ', 'jose', 'e10adc3949ba59abbe56e057f20f883e', '2022-04-08', 'try2.png', 'josemiguelmedina@gmail.com'),
(16, '3', 'Jmiguelyyy', 'S.yyy', 'Medinayyy', 'yijabex498@zcai77.com', '835f9a94c6ffea1f989bc8c62db3d663', '2022-05-04', NULL, ''),
(18, '3', 'Daniel Gabriel', 't', 'Moratin', 'yijabex498@zcai77.com', 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL, NULL),
(19, '3', 'Daniel Gabriel', 't', 'Moratin', 'yijabex498@zcai77.com', 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL, NULL),
(20, '2', NULL, NULL, NULL, 'dandaniel', 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL, 'tremochaniel@gmail.com'),
(21, '3', 'Daniel Gabriel', 'M', 'Moratin', 'kingshyu', 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL, NULL),
(22, '3', 'Roi', 'G', 'Floretino', '123456', 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL, NULL),
(23, '2', 'Daniel', NULL, 'Moratin', 'dandaniel3000', 'e10adc3949ba59abbe56e057f20f883e', '2000-06-22', NULL, 'tremochaniel@gmail.com'),
(24, '3', 'Daniel Gabriel', '', 'Moratin', '213123', 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL, NULL),
(27, '1', '', NULL, '', 'dan', 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL, 'dan@dan.com');

-- --------------------------------------------------------

--
-- Table structure for table `visits`
--

CREATE TABLE `visits` (
  `user_id` int(11) NOT NULL,
  `establishment_id` int(11) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `visits`
--

INSERT INTO `visits` (`user_id`, `establishment_id`, `datetime`) VALUES
(3, 11, '2022-05-02 04:35:59'),
(3, 11, '2022-05-03 04:35:59'),
(3, 13, '2022-05-03 03:59:19'),
(3, 35, '2022-05-05 13:18:53'),
(3, 40, '2022-05-05 13:18:59'),
(3, 41, '2022-05-05 13:17:40'),
(3, 41, '2022-05-05 13:19:02'),
(3, 42, '2022-05-05 14:02:24'),
(16, 11, '2022-05-03 23:40:50'),
(16, 11, '2022-05-03 23:53:56'),
(16, 11, '2022-05-04 00:30:54'),
(16, 11, '2022-05-05 13:10:18'),
(16, 11, '2022-05-05 13:11:19'),
(16, 12, '2022-05-05 13:10:07'),
(16, 12, '2022-05-05 13:10:14'),
(16, 14, '2022-05-04 00:31:20'),
(16, 14, '2022-05-04 00:32:10'),
(16, 14, '2022-05-04 00:32:15'),
(16, 14, '2022-05-04 00:32:43'),
(16, 14, '2022-05-04 00:32:48'),
(16, 14, '2022-05-04 00:33:18'),
(16, 14, '2022-05-04 00:34:17'),
(16, 14, '2022-05-04 00:34:22'),
(16, 15, '2022-05-04 00:32:19'),
(16, 15, '2022-05-04 00:32:24'),
(16, 40, '2022-05-05 13:09:09'),
(18, 14, '2022-05-07 18:15:31'),
(18, 14, '2022-05-07 18:15:45'),
(18, 20, '2022-05-07 18:10:33'),
(18, 26, '2022-05-07 18:10:47'),
(18, 26, '2022-05-07 18:10:51'),
(18, 26, '2022-05-07 18:10:58'),
(20, 11, '2022-04-30 05:01:45'),
(20, 11, '2022-05-01 04:35:59'),
(20, 11, '2022-05-03 04:35:12'),
(20, 11, '2022-05-03 04:35:59'),
(22, 15, '2022-05-04 01:12:28'),
(22, 15, '2022-05-04 01:12:54'),
(22, 15, '2022-05-04 01:13:35'),
(22, 15, '2022-05-04 01:13:47'),
(23, 11, '2022-05-03 04:35:12'),
(23, 13, '2022-05-03 03:58:40'),
(23, 13, '2022-05-03 03:59:19'),
(23, 14, '2022-05-03 03:54:45'),
(23, 14, '2022-05-03 03:58:01'),
(23, 14, '2022-05-06 01:40:26'),
(23, 14, '2022-05-06 01:42:33'),
(23, 14, '2022-05-06 01:42:42'),
(23, 14, '2022-05-06 01:42:50'),
(23, 14, '2022-05-06 01:44:03'),
(23, 26, '2022-05-03 03:57:30'),
(23, 41, '2022-05-06 01:40:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `establishment`
--
ALTER TABLE `establishment`
  ADD PRIMARY KEY (`establishment_id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `user_fk` (`user_fk`);

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
  ADD KEY `user_id_fk` (`user_id_fk`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `visits`
--
ALTER TABLE `visits`
  ADD PRIMARY KEY (`user_id`,`establishment_id`,`datetime`),
  ADD KEY `establishment_id` (`establishment_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `establishment`
--
ALTER TABLE `establishment`
  MODIFY `establishment_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `estab_image`
--
ALTER TABLE `estab_image`
  MODIFY `image_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `operatingtime`
--
ALTER TABLE `operatingtime`
  MODIFY `OperatingDay_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `rating_review`
--
ALTER TABLE `rating_review`
  MODIFY `ra_rev_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `subscription`
--
ALTER TABLE `subscription`
  MODIFY `subs_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `establishment`
--
ALTER TABLE `establishment`
  ADD CONSTRAINT `establishment_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`),
  ADD CONSTRAINT `establishment_ibfk_2` FOREIGN KEY (`user_fk`) REFERENCES `user` (`user_id`);

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
  ADD CONSTRAINT `subscription_ibfk_1` FOREIGN KEY (`user_id_fk`) REFERENCES `user` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
