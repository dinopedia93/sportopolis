-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 01, 2015 at 08:50 PM
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
  `first_name` varchar(45) NOT NULL,
  `last_name` varchar(45) NOT NULL,
  `gender` varchar(10) NOT NULL,
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
  `title` varchar(100) COLLATE utf8_bin NOT NULL,
  `article_date` date NOT NULL,
  `article_time` time NOT NULL,
  `member_id` int(11) NOT NULL,
  `article_content` longtext COLLATE utf8_bin NOT NULL,
  `sport_id` int(11) NOT NULL,
  `status` varchar(10) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `title`, `article_date`, `article_time`, `member_id`, `article_content`, `sport_id`, `status`) VALUES
(1, 'Men who exercise more have better erectile and sexual function', '2015-03-26', '09:27:28', 23, 'Washington: A new study has examined that men who exercise more have better erectile and sexual function, regardless of race.\r\n\r\nThe study conducted at Cedars-Sinai Medical Center is the first to link the benefits of exercise in relation to improved erectile and sexual function in a racially diverse group of patients.\r\n\r\nNearly 300 study participants self-reported their activity levels, which researchers then categorized as sedentary, mildly active, moderately active or highly active. The subjects also self-reported their sexual function, including the ability to have erections, orgasms, the quality and frequency of erections and overall sexual function.\r\n\r\nResults found that men who reported more frequent exercise, a total of 18 metabolic equivalents, or METS, per week, had higher sexual function scores, regardless of race. MET hours reflect both the total time of exercise and the intensity of exercise. A total of 18 METS can be achieved by combining exercises with different intensities, but is the equivalent of two hours of strenuous exercise, such as running or swimming, 3.5 hours of moderate exercise, or six hours of light exercise.\r\n\r\nStephen Freedland, MD, co-author on the study and director of the Center for Integrated Research in Cancer and Lifestyle in the Cedars-Sinai Samuel Oschin Comprehensive Cancer Institute, cautions that exercise should be tailored for each individual.\r\n\r\nFreedland added that when it came to exercise, there was no one-size-fits-all approach, however, they were confident that even some degree of exercise, even if less intense, was better than no exercise at all.\r\n\r\nThe study is published in the Journal of Sexual Medicine', 4, 'accepted');

-- --------------------------------------------------------

--
-- Table structure for table `articles_has_likes`
--

CREATE TABLE IF NOT EXISTS `articles_has_likes` (
  `article_id` int(11) NOT NULL,
  `like_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `articles_has_photos`
--

CREATE TABLE IF NOT EXISTS `articles_has_photos` (
  `article_id` int(11) NOT NULL,
  `photo_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `articles_has_reviews`
--

CREATE TABLE IF NOT EXISTS `articles_has_reviews` (
  `article_id` int(11) NOT NULL,
  `review_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `website` text COLLATE utf8_bin,
  `views` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `name`, `country`, `city`, `district`, `address`, `google_map`, `likes_count`, `rank`, `facebook`, `tel`, `mobile`, `email`, `website`, `views`) VALUES
(1, 'El Dawly Stadium', 'Egypt', 'Giza', 'Haram', 'Mansoriya', '', 0, 0, NULL, '1231412', '32412', 'Awad123@Gmail.com', '', 0);

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

--
-- Dumping data for table `locations_has_sports`
--

INSERT INTO `locations_has_sports` (`location_id`, `sport_id`) VALUES
(1, 1),
(1, 4);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

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
(2, 'Cycling', 'Individual'),
(3, 'Tennis', 'Both'),
(4, 'Fitness', 'Individual'),
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
  `website` text COLLATE utf8_bin,
  `views` int(11) NOT NULL
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
-- Table structure for table `trainers`
--

CREATE TABLE IF NOT EXISTS `trainers` (
`id` int(11) NOT NULL,
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
  `user_id` int(11) NOT NULL,
  `views` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `trainers`
--

INSERT INTO `trainers` (`id`, `country`, `city`, `district`, `location`, `training_days`, `time`, `likes_count`, `rank`, `facebook`, `tel`, `mobile`, `email`, `website`, `sports_id`, `biography`, `user_id`, `views`) VALUES
(2, 'Egypt', 'Giza', 'Dokki', '28-Refaa st.', 'Thursday', NULL, '0', 0, NULL, NULL, '1014417474', 'khaled-hegazy92@hotmail.com', NULL, 2, 'I am Khaled Hegazy a dedicated football trainer seeking to improve the future of football in Egypt. Please contact me for more info.', 13, 8),
(3, 'Egypt', 'Giza', 'Haram', '32 Eshta-st.', 'Thursday', NULL, '0', 0, NULL, NULL, '1152892222', NULL, NULL, 3, 'Dizo Gamed Fash5', 15, 1),
(6, '-1', '', '', 'Fa5ayda', '', NULL, '0', 0, NULL, NULL, '123214465', NULL, NULL, 1, 'Beyombroblo el masal', 23, 2),
(7, '', '', '', '', '', NULL, '0', 0, NULL, NULL, '0', NULL, NULL, NULL, NULL, 25, 0);

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

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) NOT NULL,
  `first_name` varchar(45) CHARACTER SET latin1 NOT NULL,
  `last_name` varchar(45) CHARACTER SET latin1 NOT NULL,
  `gender` varchar(10) NOT NULL,
  `birthdate` date NOT NULL,
  `email` varchar(45) CHARACTER SET latin1 NOT NULL,
  `password` varchar(128) CHARACTER SET latin1 NOT NULL,
  `user_type` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `gender`, `birthdate`, `email`, `password`, `user_type`) VALUES
(13, 'Khaled', 'Hegazy', 'Male', '1990-12-10', 'khaled-hegazy92@hotmail.com', '1c01d67b05ed9d3dab9a58fa438e17bae00a0c0a', 3),
(15, 'Abdallah', 'Khaled', 'Male', '1990-12-10', 'dinopedia93@gmail.com', '2db7e9f1bc905c83630d097815eb5091e01678e4', 1),
(23, 'youssef', 'Khory', 'Male', '1990-12-11', 'aka@gfail.com', 'fcfa68164162b0988c41faf7f2aedfb2af54ee31', 1),
(24, '', '', 'Male', '1990-12-10', 'new@new.com', '477c5714202f60f75133dd941607074a11bb4ce2', 1),
(25, '', '', '', '0000-00-00', 'k_h_57@hotmail.com', '1c01d67b05ed9d3dab9a58fa438e17bae00a0c0a', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users_rating_trainers`
--

CREATE TABLE IF NOT EXISTS `users_rating_trainers` (
`id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `trainer_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_rating_trainers`
--

INSERT INTO `users_rating_trainers` (`id`, `user_id`, `rating`, `trainer_id`) VALUES
(1, 13, 4, 6);

-- --------------------------------------------------------

--
-- Table structure for table `user_types`
--

CREATE TABLE IF NOT EXISTS `user_types` (
`id` int(11) NOT NULL,
  `user_type` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_types`
--

INSERT INTO `user_types` (`id`, `user_type`) VALUES
(1, 'Trainer'),
(2, 'Store'),
(3, 'Normal'),
(4, 'Location');

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
 ADD PRIMARY KEY (`id`), ADD KEY `fk_articles_members1_idx` (`member_id`), ADD KEY `fk_Articles_sports1_idx` (`sport_id`);

--
-- Indexes for table `articles_has_likes`
--
ALTER TABLE `articles_has_likes`
 ADD PRIMARY KEY (`article_id`,`like_id`), ADD KEY `fk_articles_has_likes_likes1_idx` (`like_id`), ADD KEY `fk_articles_has_likes_articles1_idx` (`article_id`);

--
-- Indexes for table `articles_has_photos`
--
ALTER TABLE `articles_has_photos`
 ADD PRIMARY KEY (`article_id`,`photo_id`), ADD KEY `fk_articles_has_photos_photos1_idx` (`photo_id`), ADD KEY `fk_articles_has_photos_articles1_idx` (`article_id`);

--
-- Indexes for table `articles_has_reviews`
--
ALTER TABLE `articles_has_reviews`
 ADD PRIMARY KEY (`article_id`,`review_id`), ADD KEY `fk_articles_has_reviews_reviews1_idx` (`review_id`), ADD KEY `fk_articles_has_reviews_articles1_idx` (`article_id`);

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
-- Indexes for table `trainers`
--
ALTER TABLE `trainers`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `idtrainer_UNIQUE` (`id`), ADD UNIQUE KEY `mobile_UNIQUE` (`mobile`), ADD KEY `fk_trainers_sports1_idx` (`sports_id`), ADD KEY `user_id` (`user_id`);

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
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `id_UNIQUE` (`id`), ADD KEY `user_type` (`user_type`);

--
-- Indexes for table `users_rating_trainers`
--
ALTER TABLE `users_rating_trainers`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_types`
--
ALTER TABLE `user_types`
 ADD PRIMARY KEY (`id`);

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
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
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
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
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
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `users_rating_trainers`
--
ALTER TABLE `users_rating_trainers`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `user_types`
--
ALTER TABLE `user_types`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `advertisements`
--
ALTER TABLE `advertisements`
ADD CONSTRAINT `fk_advertisements_sponsors1` FOREIGN KEY (`sponsors_id`) REFERENCES `sponsors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `articles`
--
ALTER TABLE `articles`
ADD CONSTRAINT `fk_articles_members1` FOREIGN KEY (`member_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `fk_articles_sports1` FOREIGN KEY (`sport_id`) REFERENCES `sports` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `articles_has_likes`
--
ALTER TABLE `articles_has_likes`
ADD CONSTRAINT `fk_articles_has_likes_articles1` FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `fk_articles_has_likes_likes1` FOREIGN KEY (`like_id`) REFERENCES `likes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `articles_has_photos`
--
ALTER TABLE `articles_has_photos`
ADD CONSTRAINT `fk_articles_has_photos_articles1` FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `fk_articles_has_photos_photos1` FOREIGN KEY (`photo_id`) REFERENCES `photos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `articles_has_reviews`
--
ALTER TABLE `articles_has_reviews`
ADD CONSTRAINT `fk_articles_has_reviews_articles1` FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `fk_articles_has_reviews_reviews1` FOREIGN KEY (`review_id`) REFERENCES `reviews` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
-- Constraints for table `likes`
--
ALTER TABLE `likes`
ADD CONSTRAINT `fk_Likes_members1` FOREIGN KEY (`member_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
-- Constraints for table `messages`
--
ALTER TABLE `messages`
ADD CONSTRAINT `fk_messages_members` FOREIGN KEY (`members_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
ADD CONSTRAINT `fk_reviews_members1` FOREIGN KEY (`member_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
-- Constraints for table `trainers`
--
ALTER TABLE `trainers`
ADD CONSTRAINT `fk_trainers_sports1` FOREIGN KEY (`sports_id`) REFERENCES `sports` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `trainers_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

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
-- Constraints for table `users`
--
ALTER TABLE `users`
ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`user_type`) REFERENCES `user_types` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
