-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 06, 2015 at 04:14 PM
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
-- Table structure for table `admin_contacts`
--

CREATE TABLE IF NOT EXISTS `admin_contacts` (
`id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `mobile` decimal(11,0) NOT NULL,
  `email` varchar(45) NOT NULL,
  `facebook_acc` varchar(100) NOT NULL,
  `brief` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `advertisements`
--

CREATE TABLE IF NOT EXISTS `advertisements` (
`id` int(11) NOT NULL,
  `sponsor` varchar(45) NOT NULL,
  `from_day` date NOT NULL,
  `to_day` date NOT NULL,
  `sponsors_id` int(11) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE IF NOT EXISTS `articles` (
`id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE IF NOT EXISTS `events` (
`id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `sport` varchar(45) NOT NULL,
  `description` text NOT NULL,
  `owner` varchar(45) NOT NULL,
  `from_day` datetime NOT NULL,
  `to_day` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `events_has_likes`
--

CREATE TABLE IF NOT EXISTS `events_has_likes` (
  `event_id` int(11) NOT NULL,
  `like_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `events_has_photos`
--

CREATE TABLE IF NOT EXISTS `events_has_photos` (
  `event_id` int(11) NOT NULL,
  `photo_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `events_has_reviews`
--

CREATE TABLE IF NOT EXISTS `events_has_reviews` (
  `event_id` int(11) NOT NULL,
  `review_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `events_has_views`
--

CREATE TABLE IF NOT EXISTS `events_has_views` (
  `event_id` int(11) NOT NULL,
  `view_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE IF NOT EXISTS `likes` (
`id` int(11) NOT NULL,
  `flag` bit(1) NOT NULL,
  `member_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE IF NOT EXISTS `locations` (
`id` int(11) NOT NULL,
  `name` varchar(45) COLLATE utf8_bin NOT NULL,
  `country` varchar(45) COLLATE utf8_bin NOT NULL,
  `city` varchar(45) COLLATE utf8_bin NOT NULL,
  `district` varchar(45) COLLATE utf8_bin NOT NULL,
  `address` varchar(50) COLLATE utf8_bin NOT NULL,
  `google_map` text COLLATE utf8_bin NOT NULL,
  `likes_count` int(11) NOT NULL,
  `rank` float NOT NULL,
  `facebook` text COLLATE utf8_bin,
  `tel` decimal(10,0) DEFAULT NULL,
  `mobile` decimal(10,0) DEFAULT NULL,
  `email` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `website` text COLLATE utf8_bin
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `name`, `country`, `city`, `district`, `address`, `google_map`, `likes_count`, `rank`, `facebook`, `tel`, `mobile`, `email`, `website`) VALUES
(1, 'El Dawli Stadium', 'Egypt', 'Giza', 'Haram', 'Mansoriya', '', 0, 0, NULL, '9999999999', '1132344', '3awad@gmail.com', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `locations_has_likes`
--

CREATE TABLE IF NOT EXISTS `locations_has_likes` (
  `location_id` int(11) NOT NULL,
  `like_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `locations_has_photos`
--

CREATE TABLE IF NOT EXISTS `locations_has_photos` (
  `location_id` int(11) NOT NULL,
  `photo_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `locations_has_reviews`
--

CREATE TABLE IF NOT EXISTS `locations_has_reviews` (
  `location_id` int(11) NOT NULL,
  `review_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `locations_has_sports`
--

CREATE TABLE IF NOT EXISTS `locations_has_sports` (
  `location_id` int(11) NOT NULL,
  `sport_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `locations_has_views`
--

CREATE TABLE IF NOT EXISTS `locations_has_views` (
  `location_id` int(11) NOT NULL,
  `view_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE IF NOT EXISTS `members` (
`id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `name`) VALUES
(1, 'Hisham El-Sayed');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
`id` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `message` text NOT NULL,
  `reply` text,
  `members_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE IF NOT EXISTS `photos` (
`id` int(11) NOT NULL,
  `photo_link` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE IF NOT EXISTS `reviews` (
`id` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `review` text COLLATE utf8_bin NOT NULL,
  `member_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `date`, `time`, `review`, `member_id`) VALUES
(1, '2015-02-25', '06:00:00', 'He is a great coach. I am very lucky to get to know him.', 1),
(2, '2015-02-25', '11:00:00', 'Dzdz Dzdooooooooooooooz', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sponsors`
--

CREATE TABLE IF NOT EXISTS `sponsors` (
`id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `brief` text NOT NULL,
  `tel` decimal(10,0) DEFAULT NULL,
  `mobile` decimal(10,0) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `facebook` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sponsors_has_events`
--

CREATE TABLE IF NOT EXISTS `sponsors_has_events` (
  `sponsor_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sports`
--

CREATE TABLE IF NOT EXISTS `sports` (
`id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `sport_type` varchar(45) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sports`
--

INSERT INTO `sports` (`id`, `name`, `sport_type`) VALUES
(1, 'Football', 'Team'),
(2, 'Tennis', 'Individual'),
(3, 'Fitness', 'Individual'),
(4, 'Cycling', 'Individual'),
(5, 'Fishing', 'Individual');

-- --------------------------------------------------------

--
-- Table structure for table `sports_has_stores`
--

CREATE TABLE IF NOT EXISTS `sports_has_stores` (
  `sport_id` int(11) NOT NULL,
  `store_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `stores`
--

CREATE TABLE IF NOT EXISTS `stores` (
`id` int(11) NOT NULL,
  `name` varchar(45) COLLATE utf8_bin NOT NULL,
  `country` varchar(45) COLLATE utf8_bin NOT NULL,
  `city` varchar(45) COLLATE utf8_bin NOT NULL,
  `district` varchar(45) COLLATE utf8_bin NOT NULL,
  `address` varchar(100) COLLATE utf8_bin NOT NULL,
  `google_map` text COLLATE utf8_bin NOT NULL,
  `likes_count` int(10) unsigned zerofill NOT NULL,
  `rank` float unsigned zerofill NOT NULL,
  `facebook` text COLLATE utf8_bin,
  `tel` decimal(10,0) DEFAULT NULL,
  `mobile` decimal(10,0) DEFAULT NULL,
  `email` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `website` text COLLATE utf8_bin
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `stores_has_likes`
--

CREATE TABLE IF NOT EXISTS `stores_has_likes` (
  `store_id` int(11) NOT NULL,
  `like_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `stores_has_photos`
--

CREATE TABLE IF NOT EXISTS `stores_has_photos` (
  `store_id` int(11) NOT NULL,
  `photo_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `stores_has_reviews`
--

CREATE TABLE IF NOT EXISTS `stores_has_reviews` (
  `store_id` int(11) NOT NULL,
  `review_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `stores_has_views`
--

CREATE TABLE IF NOT EXISTS `stores_has_views` (
  `store_id` int(11) NOT NULL,
  `view_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `trainers`
--

CREATE TABLE IF NOT EXISTS `trainers` (
`id` int(11) NOT NULL,
  `name` varchar(45) COLLATE utf8_bin NOT NULL,
  `birthdate` date NOT NULL,
  `gender` varchar(10) COLLATE utf8_bin NOT NULL,
  `country` varchar(45) COLLATE utf8_bin NOT NULL,
  `city` varchar(45) COLLATE utf8_bin NOT NULL,
  `district` varchar(45) COLLATE utf8_bin NOT NULL,
  `location` varchar(45) COLLATE utf8_bin NOT NULL,
  `training_days` varchar(45) COLLATE utf8_bin NOT NULL,
  `time` time DEFAULT NULL,
  `likes_count` decimal(10,0) NOT NULL,
  `rank` float NOT NULL,
  `facebook` text COLLATE utf8_bin,
  `tel` decimal(10,0) DEFAULT NULL,
  `mobile` decimal(11,0) NOT NULL,
  `email` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `website` text COLLATE utf8_bin,
  `sports_id` int(11) DEFAULT NULL,
  `biography` text COLLATE utf8_bin,
  `password` varchar(300) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `trainers`
--

INSERT INTO `trainers` (`id`, `name`, `birthdate`, `gender`, `country`, `city`, `district`, `location`, `training_days`, `time`, `likes_count`, `rank`, `facebook`, `tel`, `mobile`, `email`, `website`, `sports_id`, `biography`, `password`) VALUES
(2, 'Khaled Hegazy', '1992-02-19', 'male', 'Egypt', 'Giza', 'Dokki', '28-Refaa st.', 'Thursday', NULL, '0', 0, NULL, NULL, '1014417474', 'khaled-hegazy92@hotmail.com', NULL, 1, 'I am Khaled Hegazy el shaheer bi hegarz a dedicated football trainer seeking to improve the future of football in Egypt. Please contact me for more info.', ''),
(3, 'Abdallah Khaled', '0000-00-00', '', 'Egypt', 'Giza', 'Haram', '32 Eshta-st.', 'Thursday', NULL, '0', 0, NULL, NULL, '1152892222', NULL, NULL, 1, 'Dizo Gamed Fash5', ''),
(5, '', '0000-00-00', '', '', '', '', '', '', NULL, '0', 0, NULL, NULL, '2423423', 'aka_dino@live.com', NULL, NULL, NULL, 'a'),
(10, '', '0000-00-00', '', '', '', '', '', '', NULL, '0', 0, NULL, NULL, '0', 'dinope223@gmail.com', NULL, NULL, NULL, 'a');

-- --------------------------------------------------------

--
-- Table structure for table `trainers_has_likes`
--

CREATE TABLE IF NOT EXISTS `trainers_has_likes` (
  `trainer_id` int(11) NOT NULL,
  `like_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `trainers_has_locations`
--

CREATE TABLE IF NOT EXISTS `trainers_has_locations` (
  `trainer_id` int(11) NOT NULL,
  `location_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `trainers_has_photos`
--

CREATE TABLE IF NOT EXISTS `trainers_has_photos` (
  `trainer_id` int(11) NOT NULL,
  `photo_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `trainers_has_reviews`
--

CREATE TABLE IF NOT EXISTS `trainers_has_reviews` (
  `trainer_id` int(11) NOT NULL,
  `review_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `trainers_has_reviews`
--

INSERT INTO `trainers_has_reviews` (`trainer_id`, `review_id`) VALUES
(2, 1),
(2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `trainers_has_views`
--

CREATE TABLE IF NOT EXISTS `trainers_has_views` (
  `trainer_id` int(11) NOT NULL,
  `view_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `views`
--

CREATE TABLE IF NOT EXISTS `views` (
`id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_contacts`
--
ALTER TABLE `admin_contacts`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `id_UNIQUE` (`id`);

--
-- Indexes for table `advertisements`
--
ALTER TABLE `advertisements`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `id_UNIQUE` (`id`), ADD KEY `fk_advertisements_sponsors1_idx` (`sponsors_id`);

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `id_UNIQUE` (`id`);

--
-- Indexes for table `events_has_likes`
--
ALTER TABLE `events_has_likes`
 ADD PRIMARY KEY (`event_id`,`like_id`), ADD KEY `fk_events_has_likes_likes1_idx` (`like_id`), ADD KEY `fk_events_has_likes_events1_idx` (`event_id`);

--
-- Indexes for table `events_has_photos`
--
ALTER TABLE `events_has_photos`
 ADD PRIMARY KEY (`event_id`,`photo_id`), ADD KEY `fk_events_has_photos_photos1_idx` (`photo_id`), ADD KEY `fk_events_has_photos_events1_idx` (`event_id`);

--
-- Indexes for table `events_has_reviews`
--
ALTER TABLE `events_has_reviews`
 ADD PRIMARY KEY (`event_id`,`review_id`), ADD KEY `fk_events_has_reviews_reviews1_idx` (`review_id`), ADD KEY `fk_events_has_reviews_events1_idx` (`event_id`);

--
-- Indexes for table `events_has_views`
--
ALTER TABLE `events_has_views`
 ADD PRIMARY KEY (`event_id`,`view_id`), ADD KEY `fk_events_has_views_views1_idx` (`view_id`), ADD KEY `fk_events_has_views_events1_idx` (`event_id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `id_UNIQUE` (`id`), ADD KEY `fk_Likes_members1_idx` (`member_id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `id_UNIQUE` (`id`), ADD UNIQUE KEY `name_UNIQUE` (`name`), ADD UNIQUE KEY `address_UNIQUE` (`address`);

--
-- Indexes for table `locations_has_likes`
--
ALTER TABLE `locations_has_likes`
 ADD PRIMARY KEY (`location_id`,`like_id`), ADD KEY `fk_locations_has_likes_likes1_idx` (`like_id`), ADD KEY `fk_locations_has_likes_locations1_idx` (`location_id`);

--
-- Indexes for table `locations_has_photos`
--
ALTER TABLE `locations_has_photos`
 ADD PRIMARY KEY (`location_id`,`photo_id`), ADD KEY `fk_locations_has_photos_photos1_idx` (`photo_id`), ADD KEY `fk_locations_has_photos_locations1_idx` (`location_id`);

--
-- Indexes for table `locations_has_reviews`
--
ALTER TABLE `locations_has_reviews`
 ADD PRIMARY KEY (`location_id`,`review_id`), ADD KEY `fk_locations_has_reviews_reviews1_idx` (`review_id`), ADD KEY `fk_locations_has_reviews_locations1_idx` (`location_id`);

--
-- Indexes for table `locations_has_sports`
--
ALTER TABLE `locations_has_sports`
 ADD PRIMARY KEY (`location_id`,`sport_id`), ADD KEY `fk_locations_has_sports_sports1_idx` (`sport_id`), ADD KEY `fk_locations_has_sports_locations1_idx` (`location_id`);

--
-- Indexes for table `locations_has_views`
--
ALTER TABLE `locations_has_views`
 ADD PRIMARY KEY (`location_id`,`view_id`), ADD KEY `fk_locations_has_views_views1_idx` (`view_id`), ADD KEY `fk_locations_has_views_locations1_idx` (`location_id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `id_UNIQUE` (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `id_UNIQUE` (`id`), ADD KEY `fk_messages_members_idx` (`members_id`);

--
-- Indexes for table `photos`
--
ALTER TABLE `photos`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `id_UNIQUE` (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `id_UNIQUE` (`id`), ADD KEY `fk_reviews_members1_idx` (`member_id`);

--
-- Indexes for table `sponsors`
--
ALTER TABLE `sponsors`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `id_UNIQUE` (`id`), ADD UNIQUE KEY `name_UNIQUE` (`name`);

--
-- Indexes for table `sponsors_has_events`
--
ALTER TABLE `sponsors_has_events`
 ADD PRIMARY KEY (`sponsor_id`,`event_id`), ADD KEY `fk_sponsors_has_events_events1_idx` (`event_id`), ADD KEY `fk_sponsors_has_events_sponsors1_idx` (`sponsor_id`);

--
-- Indexes for table `sports`
--
ALTER TABLE `sports`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `id_UNIQUE` (`id`);

--
-- Indexes for table `sports_has_stores`
--
ALTER TABLE `sports_has_stores`
 ADD PRIMARY KEY (`sport_id`,`store_id`), ADD KEY `fk_sports_has_stores_stores1_idx` (`store_id`), ADD KEY `fk_sports_has_stores_sports1_idx` (`sport_id`);

--
-- Indexes for table `stores`
--
ALTER TABLE `stores`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `id_UNIQUE` (`id`), ADD UNIQUE KEY `name_UNIQUE` (`name`), ADD UNIQUE KEY `address_UNIQUE` (`address`);

--
-- Indexes for table `stores_has_likes`
--
ALTER TABLE `stores_has_likes`
 ADD PRIMARY KEY (`store_id`,`like_id`), ADD KEY `fk_stores_has_likes_likes1_idx` (`like_id`), ADD KEY `fk_stores_has_likes_stores1_idx` (`store_id`);

--
-- Indexes for table `stores_has_photos`
--
ALTER TABLE `stores_has_photos`
 ADD PRIMARY KEY (`store_id`,`photo_id`), ADD KEY `fk_stores_has_photos_photos1_idx` (`photo_id`), ADD KEY `fk_stores_has_photos_stores1_idx` (`store_id`);

--
-- Indexes for table `stores_has_reviews`
--
ALTER TABLE `stores_has_reviews`
 ADD PRIMARY KEY (`store_id`,`review_id`), ADD KEY `fk_stores_has_reviews_reviews1_idx` (`review_id`), ADD KEY `fk_stores_has_reviews_stores1_idx` (`store_id`);

--
-- Indexes for table `stores_has_views`
--
ALTER TABLE `stores_has_views`
 ADD PRIMARY KEY (`store_id`,`view_id`), ADD KEY `fk_stores_has_views_views1_idx` (`view_id`), ADD KEY `fk_stores_has_views_stores1_idx` (`store_id`);

--
-- Indexes for table `trainers`
--
ALTER TABLE `trainers`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `idtrainer_UNIQUE` (`id`), ADD UNIQUE KEY `mobile_UNIQUE` (`mobile`), ADD KEY `fk_trainers_sports1_idx` (`sports_id`);

--
-- Indexes for table `trainers_has_likes`
--
ALTER TABLE `trainers_has_likes`
 ADD PRIMARY KEY (`trainer_id`,`like_id`), ADD KEY `fk_trainers_has_likes_likes1_idx` (`like_id`), ADD KEY `fk_trainers_has_likes_trainers1_idx` (`trainer_id`);

--
-- Indexes for table `trainers_has_locations`
--
ALTER TABLE `trainers_has_locations`
 ADD PRIMARY KEY (`trainer_id`,`location_id`), ADD KEY `fk_trainers_has_locations_locations1_idx` (`location_id`), ADD KEY `fk_trainers_has_locations_trainers1_idx` (`trainer_id`);

--
-- Indexes for table `trainers_has_photos`
--
ALTER TABLE `trainers_has_photos`
 ADD PRIMARY KEY (`trainer_id`,`photo_id`), ADD KEY `fk_trainers_has_photos_photos1_idx` (`photo_id`), ADD KEY `fk_trainers_has_photos_trainers1_idx` (`trainer_id`);

--
-- Indexes for table `trainers_has_reviews`
--
ALTER TABLE `trainers_has_reviews`
 ADD PRIMARY KEY (`trainer_id`,`review_id`), ADD KEY `fk_trainers_has_reviews_reviews1_idx` (`review_id`), ADD KEY `fk_trainers_has_reviews_trainers1_idx` (`trainer_id`);

--
-- Indexes for table `trainers_has_views`
--
ALTER TABLE `trainers_has_views`
 ADD PRIMARY KEY (`trainer_id`,`view_id`), ADD KEY `fk_trainers_has_views_views1_idx` (`view_id`), ADD KEY `fk_trainers_has_views_trainers1_idx` (`trainer_id`);

--
-- Indexes for table `views`
--
ALTER TABLE `views`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `id_UNIQUE` (`id`), ADD KEY `fk_views_members1_idx` (`member_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_contacts`
--
ALTER TABLE `admin_contacts`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `advertisements`
--
ALTER TABLE `advertisements`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `photos`
--
ALTER TABLE `photos`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `sponsors`
--
ALTER TABLE `sponsors`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sports`
--
ALTER TABLE `sports`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `stores`
--
ALTER TABLE `stores`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `trainers`
--
ALTER TABLE `trainers`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `views`
--
ALTER TABLE `views`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `advertisements`
--
ALTER TABLE `advertisements`
ADD CONSTRAINT `fk_advertisements_sponsors1` FOREIGN KEY (`sponsors_id`) REFERENCES `sponsors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `events_has_likes`
--
ALTER TABLE `events_has_likes`
ADD CONSTRAINT `fk_events_has_likes_events1` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `fk_events_has_likes_likes1` FOREIGN KEY (`like_id`) REFERENCES `likes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `events_has_photos`
--
ALTER TABLE `events_has_photos`
ADD CONSTRAINT `fk_events_has_photos_events1` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `fk_events_has_photos_photos1` FOREIGN KEY (`photo_id`) REFERENCES `photos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `events_has_reviews`
--
ALTER TABLE `events_has_reviews`
ADD CONSTRAINT `fk_events_has_reviews_events1` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `fk_events_has_reviews_reviews1` FOREIGN KEY (`review_id`) REFERENCES `reviews` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `events_has_views`
--
ALTER TABLE `events_has_views`
ADD CONSTRAINT `fk_events_has_views_events1` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `fk_events_has_views_views1` FOREIGN KEY (`view_id`) REFERENCES `views` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `likes`
--
ALTER TABLE `likes`
ADD CONSTRAINT `fk_Likes_members1` FOREIGN KEY (`member_id`) REFERENCES `members` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `locations_has_likes`
--
ALTER TABLE `locations_has_likes`
ADD CONSTRAINT `fk_locations_has_likes_likes1` FOREIGN KEY (`like_id`) REFERENCES `likes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `fk_locations_has_likes_locations1` FOREIGN KEY (`location_id`) REFERENCES `locations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `locations_has_photos`
--
ALTER TABLE `locations_has_photos`
ADD CONSTRAINT `fk_locations_has_photos_locations1` FOREIGN KEY (`location_id`) REFERENCES `locations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `fk_locations_has_photos_photos1` FOREIGN KEY (`photo_id`) REFERENCES `photos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `locations_has_reviews`
--
ALTER TABLE `locations_has_reviews`
ADD CONSTRAINT `fk_locations_has_reviews_locations1` FOREIGN KEY (`location_id`) REFERENCES `locations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `fk_locations_has_reviews_reviews1` FOREIGN KEY (`review_id`) REFERENCES `reviews` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `locations_has_sports`
--
ALTER TABLE `locations_has_sports`
ADD CONSTRAINT `fk_locations_has_sports_locations1` FOREIGN KEY (`location_id`) REFERENCES `locations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `fk_locations_has_sports_sports1` FOREIGN KEY (`sport_id`) REFERENCES `sports` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `locations_has_views`
--
ALTER TABLE `locations_has_views`
ADD CONSTRAINT `fk_locations_has_views_locations1` FOREIGN KEY (`location_id`) REFERENCES `locations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `fk_locations_has_views_views1` FOREIGN KEY (`view_id`) REFERENCES `views` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
ADD CONSTRAINT `fk_messages_members` FOREIGN KEY (`members_id`) REFERENCES `members` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
ADD CONSTRAINT `fk_reviews_members1` FOREIGN KEY (`member_id`) REFERENCES `members` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sponsors_has_events`
--
ALTER TABLE `sponsors_has_events`
ADD CONSTRAINT `fk_sponsors_has_events_events1` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `fk_sponsors_has_events_sponsors1` FOREIGN KEY (`sponsor_id`) REFERENCES `sponsors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sports_has_stores`
--
ALTER TABLE `sports_has_stores`
ADD CONSTRAINT `fk_sports_has_stores_sports1` FOREIGN KEY (`sport_id`) REFERENCES `sports` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `fk_sports_has_stores_stores1` FOREIGN KEY (`store_id`) REFERENCES `stores` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `stores_has_likes`
--
ALTER TABLE `stores_has_likes`
ADD CONSTRAINT `fk_stores_has_likes_likes1` FOREIGN KEY (`like_id`) REFERENCES `likes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `fk_stores_has_likes_stores1` FOREIGN KEY (`store_id`) REFERENCES `stores` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `stores_has_photos`
--
ALTER TABLE `stores_has_photos`
ADD CONSTRAINT `fk_stores_has_photos_photos1` FOREIGN KEY (`photo_id`) REFERENCES `photos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `fk_stores_has_photos_stores1` FOREIGN KEY (`store_id`) REFERENCES `stores` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `stores_has_reviews`
--
ALTER TABLE `stores_has_reviews`
ADD CONSTRAINT `fk_stores_has_reviews_reviews1` FOREIGN KEY (`review_id`) REFERENCES `reviews` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `fk_stores_has_reviews_stores1` FOREIGN KEY (`store_id`) REFERENCES `stores` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `stores_has_views`
--
ALTER TABLE `stores_has_views`
ADD CONSTRAINT `fk_stores_has_views_stores1` FOREIGN KEY (`store_id`) REFERENCES `stores` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `fk_stores_has_views_views1` FOREIGN KEY (`view_id`) REFERENCES `views` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trainers`
--
ALTER TABLE `trainers`
ADD CONSTRAINT `fk_trainers_sports1` FOREIGN KEY (`sports_id`) REFERENCES `sports` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trainers_has_likes`
--
ALTER TABLE `trainers_has_likes`
ADD CONSTRAINT `fk_trainers_has_likes_likes1` FOREIGN KEY (`like_id`) REFERENCES `likes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `fk_trainers_has_likes_trainers1` FOREIGN KEY (`trainer_id`) REFERENCES `trainers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trainers_has_locations`
--
ALTER TABLE `trainers_has_locations`
ADD CONSTRAINT `fk_trainers_has_locations_locations1` FOREIGN KEY (`location_id`) REFERENCES `locations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `fk_trainers_has_locations_trainers1` FOREIGN KEY (`trainer_id`) REFERENCES `trainers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trainers_has_photos`
--
ALTER TABLE `trainers_has_photos`
ADD CONSTRAINT `fk_trainers_has_photos_photos1` FOREIGN KEY (`photo_id`) REFERENCES `photos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `fk_trainers_has_photos_trainers1` FOREIGN KEY (`trainer_id`) REFERENCES `trainers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trainers_has_reviews`
--
ALTER TABLE `trainers_has_reviews`
ADD CONSTRAINT `fk_trainers_has_reviews_reviews1` FOREIGN KEY (`review_id`) REFERENCES `reviews` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `fk_trainers_has_reviews_trainers1` FOREIGN KEY (`trainer_id`) REFERENCES `trainers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trainers_has_views`
--
ALTER TABLE `trainers_has_views`
ADD CONSTRAINT `fk_trainers_has_views_trainers1` FOREIGN KEY (`trainer_id`) REFERENCES `trainers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `fk_trainers_has_views_views1` FOREIGN KEY (`view_id`) REFERENCES `views` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `views`
--
ALTER TABLE `views`
ADD CONSTRAINT `fk_views_members1` FOREIGN KEY (`member_id`) REFERENCES `members` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;