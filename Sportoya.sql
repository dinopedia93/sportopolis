-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 23, 2015 at 12:36 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sportoya`
--

-- --------------------------------------------------------

--
-- Table structure for table `trainers`
--

CREATE TABLE IF NOT EXISTS `trainers` (
`id` int(11) NOT NULL,
  `name` varchar(45) COLLATE utf8_bin NOT NULL,
  `country` varchar(45) COLLATE utf8_bin NOT NULL,
  `city` varchar(45) COLLATE utf8_bin NOT NULL,
  `district` varchar(45) COLLATE utf8_bin NOT NULL,
  `location` varchar(45) COLLATE utf8_bin NOT NULL,
  `training_days` varchar(45) COLLATE utf8_bin NOT NULL,
  `time` time DEFAULT NULL,
  `likes_count` decimal(10,0) unsigned zerofill NOT NULL,
  `rank` float unsigned zerofill NOT NULL,
  `facebook` text COLLATE utf8_bin,
  `tel` decimal(10,0) DEFAULT NULL,
  `mobile` decimal(11,0) NOT NULL,
  `email` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `website` text COLLATE utf8_bin,
  `sports_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `trainers`
--

INSERT INTO `trainers` (`id`, `name`, `country`, `city`, `district`, `location`, `training_days`, `time`, `likes_count`, `rank`, `facebook`, `tel`, `mobile`, `email`, `website`, `sports_id`) VALUES
(3, 'Khaled Hegazy', 'Egypt', 'Giza', 'Dokki', '28-Refaa st.', 'Thursday', NULL, '0000000000', 000000000000, NULL, NULL, '1014417474', NULL, NULL, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `trainers`
--
ALTER TABLE `trainers`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `idtrainer_UNIQUE` (`id`), ADD UNIQUE KEY `mobile_UNIQUE` (`mobile`), ADD KEY `fk_trainers_sports1_idx` (`sports_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `trainers`
--
ALTER TABLE `trainers`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `trainers`
--
ALTER TABLE `trainers`
ADD CONSTRAINT `fk_trainers_sports1` FOREIGN KEY (`sports_id`) REFERENCES `sports` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
