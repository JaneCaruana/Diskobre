-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 08, 2022 at 02:29 PM
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
  `contact` int(11) DEFAULT NULL,
  `notif` int(5) NOT NULL,
  `estab_timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `establishment`
--

INSERT INTO `establishment` (`establishment_id`, `estab_name`, `category_id`, `address`, `latitude`, `longtitude`, `description`, `estab_email`, `status`, `user_fk`, `contact`, `notif`, `estab_timestamp`) VALUES
(11, 'Sunrise Remittance', 1, '7VQF+MRR, Cebuana Lhuillier, N. Bacalso Avenue Extension, Mambaling, C', '10.28921860190764200000', '123.87452399682029000000', 'Money transfer service', NULL, '3', 16, 912345678, 0, '2022-05-08 05:12:20'),
(12, 'TrueMoney Philippines', 1, '76 A. Lopez St, Labangon, Cebu City, Cebu', '10.30111520490214800000', '123.88456614967140000000', 'Money transfer service', NULL, '2', 18, NULL, 0, '2022-05-08 05:12:20'),
(13, 'Xpress Money', 1, 'Cebuana Lhuillier Services Corporation, Katipunan St, Cebu City, Cebu', '10.30086186311089200000', '123.87503894283344000000', 'Money transfer service', NULL, '2', 19, 987654321, 0, '2022-05-08 05:12:20'),
(14, 'Colonnade Mall', 2, 'Colon St, Cebu City, Cebu', '10.29714568999802200000', '123.89967234700346000000', 'Grocery Store in Cebu', 'colonade@gmail.com', '1', 21, 909876543, 0, '2022-05-08 05:12:20'),
(15, 'Mini Mart', 2, '8V2C+HP8, Katipunan St, Cebu City, 6000 Cebu', '10.30157919421068000000', '123.87177737202738000000', 'Grocery Store', NULL, '1', 22, 82603560, 0, '2022-05-08 05:12:20'),
(16, 'Super Metro Mambaling', 2, 'Super Metro Mambaling, F. Llamas St, cor Natalio B. Bacalso Ave, Cebu ', '10.29044103262503300000', '123.87022828859355000000', 'Grocery Store', NULL, '1', 24, 0, 0, '2022-05-08 05:12:20'),
(20, 'Four Aces Water Refilling Station', 3, '18 Francisco Llamas St, Cebu City, 6000 Cebu', '10.29189891242511700000', '123.87034547125927000000', 'Bottled water supplier', NULL, '1', NULL, NULL, 0, '2022-05-08 05:12:20'),
(21, 'Alphas Well Purified Water Refilling St', 3, '1036-Q Basak Bontores, Cebu City, 6000 Cebu', '10.28805582536581300000', '123.86733867125929000000', 'Water purification company', NULL, '1', NULL, NULL, 0, '2022-05-08 05:12:20'),
(22, 'Philippine Postal Corporation', 4, 'Osmeña Blvd, Cebu City, 6000 Cebu', '10.30329833569522800000', '123.89524421443117000000', 'Post office', NULL, '1', NULL, NULL, 0, '2022-05-08 05:12:20'),
(23, 'Cebu Central Post Office', 4, 'Cebu Central Post Office, A. Pigafetta Street, Cebu City, 6000 Cebu', '10.29223563112933900000', '123.90683135788278000000', 'Post Office', NULL, '1', NULL, NULL, 0, '2022-05-08 05:12:20'),
(24, 'Coin Laundry Express - Echavez', 9, '195 g Echavez Ext, Cebu City, Cebu', '10.30887082496156600000', '123.90382727450924000000', 'Laundry Shop', 'email@gmail.com', '1', NULL, NULL, 0, '2022-05-08 05:12:20'),
(25, 'Wash Day - Self Service Laundry', 9, 'JRDC Bldg, 102 Osmeña Blvd, Cebu City, 6000 Cebu', '10.31283972207428000000', '123.89181097759648000000', 'Self service laundry shop', '', '1', NULL, NULL, 0, '2022-05-08 05:12:20'),
(26, 'Aycardo Veterinary Center Inc. - Main Br', 10, '68 J. Alcantara St, Cebu City, Cebu', '10.30000301800865000000', '123.89035184758900000000', 'Animal hospital', '', '1', NULL, NULL, 0, '2022-05-08 05:12:20'),
(27, 'Yandug Animal Care Clinic', 10, '8B Nichols Heights, Cebu City, 6000 Cebu', '10.31731428565130100000', '123.88245542390348000000', 'Veterinarian', '', '1', NULL, NULL, 0, '2022-05-08 05:12:20'),
(35, 'Roi Floretino', 1, '100 Station Yard Rd', '10.31610935193110400000', '123.88555020370023000000', '123123', NULL, '3', 20, 2025550667, 0, '2022-05-08 05:12:20'),
(38, 'kikfghsfgh', 13, 'Blk 4 Lot 4 Minglanilla Homes Tungkil', '10.31481499316203100000', '123.88454169311626000000', '21341241', 'tremochaniel@gmail.com', '1', 24, 2147483647, 0, '2022-05-08 05:12:20'),
(39, 'Rhysin Sex Hotel', 23, 'Nisi dolor exercitationem et ullamco odit cillum magnam error fugiat d', '10.31597266393885100000', '123.88015000925287000000', 'Sex Sex', 'caliryde@mailinator.com', '1', 25, 371, 0, '2022-05-08 05:12:20'),
(40, 'RHYSIN UPODATE', 15, 'Testing Add', '10.29654908404778300000', '123.88619688870960000000', 'hehehehe ', NULL, '2', 26, 969696969, 1, '2022-05-08 05:12:20'),
(41, 'La casa de Papel', 20, 'Testing Address 2', '10.31382957473792300000', '123.88677329101819000000', 'Bankie', NULL, '3', 26, 2147483647, 1, '2022-05-08 05:12:20'),
(42, 'Rhysin Sari-Sari', 2, 'Testing Address 3', '10.31501178604742100000', '123.88271779098693000000', 'Palit namo sa ukay2', NULL, '1', 26, 2147483647, 0, '2022-05-08 05:12:20'),
(43, 'Ponce Labhanan', 9, 'Testing Address 4', '10.31135593003597300000', '123.88484497795616000000', 'Laba ta laba', NULL, '2', 26, 90900900, 1, '2022-05-08 05:12:20'),
(44, 'Rhysin Repair Shop', 25, 'Testing Address 5', '10.31759293470402400000', '123.87872397298003000000', 'Ato hubluton', NULL, '2', 26, 9090909, 1, '2022-05-08 05:12:20'),
(45, 'Juliet Farrell', 4, 'Obcaecati eos nostrud velit quis', '10.31649236142469300000', '123.88418712986436000000', 'Maxime alias mollit voluptatem eius voluptatum cupiditate et omnis nisi reprehenderit tenetur corporis', NULL, '2', 26, 1, 1, '2022-05-08 05:12:20');

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

--
-- Dumping data for table `rating_review`
--

INSERT INTO `rating_review` (`ra_rev_id`, `estab_id_fk`, `user_id_fk`, `rate`, `review`) VALUES
(1, 43, 26, 4, 'heehehe');

-- --------------------------------------------------------

--
-- Table structure for table `subscription`
--

CREATE TABLE `subscription` (
  `subs_id` int(12) NOT NULL,
  `user_id_fk` int(12) NOT NULL,
  `package_id_fk` int(12) DEFAULT NULL,
  `start_at` date NOT NULL,
  `expire_at` date NOT NULL,
  `note` varchar(200) DEFAULT NULL,
  `status` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subscription`
--

INSERT INTO `subscription` (`subs_id`, `user_id_fk`, `package_id_fk`, `start_at`, `expire_at`, `note`, `status`) VALUES
(30, 16, NULL, '2022-04-03', '2022-05-03', NULL, 'active'),
(31, 19, NULL, '2022-05-03', '2022-06-03', NULL, 'active'),
(32, 16, NULL, '2022-05-03', '2022-05-03', NULL, 'active'),
(33, 16, NULL, '2022-05-03', '2022-05-03', NULL, 'active'),
(34, 16, NULL, '2022-05-03', '2022-05-03', NULL, 'active'),
(35, 16, NULL, '2022-05-04', '2022-05-02', NULL, 'active'),
(36, 16, NULL, '2022-05-04', '2022-05-04', NULL, 'active'),
(37, 16, NULL, '2022-05-04', '2023-05-04', NULL, 'active');

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
(16, 11, '2022-05-03 23:40:50'),
(16, 11, '2022-05-03 23:53:56'),
(16, 11, '2022-05-04 00:30:54'),
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
(23, 26, '2022-05-03 03:57:30'),
(26, 41, '2022-05-08 19:33:22'),
(26, 43, '2022-05-08 19:34:53'),
(26, 43, '2022-05-08 19:35:45'),
(26, 43, '2022-05-08 19:39:42'),
(26, 43, '2022-05-08 19:43:47'),
(26, 43, '2022-05-08 19:48:43');

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
  MODIFY `establishment_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `estab_image`
--
ALTER TABLE `estab_image`
  MODIFY `image_id` int(12) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `operatingtime`
--
ALTER TABLE `operatingtime`
  MODIFY `OperatingDay_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `package`
--
ALTER TABLE `package`
  MODIFY `package_id` int(12) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rating_review`
--
ALTER TABLE `rating_review`
  MODIFY `ra_rev_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `subscription`
--
ALTER TABLE `subscription`
  MODIFY `subs_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

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
  ADD CONSTRAINT `subscription_ibfk_1` FOREIGN KEY (`user_id_fk`) REFERENCES `user` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `subscription_ibfk_2` FOREIGN KEY (`package_id_fk`) REFERENCES `package` (`package_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `visits`
--
ALTER TABLE `visits`
  ADD CONSTRAINT `visits_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `visits_ibfk_2` FOREIGN KEY (`establishment_id`) REFERENCES `establishment` (`establishment_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
