-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 17 أبريل 2019 الساعة 16:31
-- إصدار الخادم: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gymguider`
--

-- --------------------------------------------------------

--
-- بنية الجدول `favouritegyms`
--

CREATE TABLE `favouritegyms` (
  `id` int(11) NOT NULL,
  `gym_id` int(11) NOT NULL,
  `customer` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Stand-in structure for view `favouritegyms_vw`
-- (See below for the actual view)
--
CREATE TABLE `favouritegyms_vw` (
`fav_id` int(11)
,`gym_id` int(11)
,`customer_id` varchar(100)
,`gym_name` varchar(300)
,`country` varchar(100)
,`city` varchar(100)
,`image` varchar(200)
);

-- --------------------------------------------------------

--
-- بنية الجدول `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `rate` tinyint(4) NOT NULL,
  `description` varchar(200) NOT NULL,
  `isvalid` tinyint(4) NOT NULL DEFAULT '0',
  `usertype` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- إرجاع أو استيراد بيانات الجدول `feedback`
--

INSERT INTO `feedback` (`id`, `username`, `rate`, `description`, `isvalid`, `usertype`) VALUES
(1, 'Reema11!', 4, 'good web site', 1, 'Customer');

-- --------------------------------------------------------

--
-- Stand-in structure for view `feedback_vw`
-- (See below for the actual view)
--
CREATE TABLE `feedback_vw` (
`customer` varchar(100)
,`allrate` tinyint(4)
,`description` varchar(500)
,`isvalid` tinyint(4)
,`isseen` tinyint(4)
,`id` int(11)
,`name` varchar(300)
,`owner` varchar(100)
);

-- --------------------------------------------------------

--
-- بنية الجدول `gym`
--

CREATE TABLE `gym` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(500) NOT NULL,
  `price` float NOT NULL,
  `email` varchar(300) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `country` varchar(300) NOT NULL,
  `city` varchar(300) NOT NULL,
  `district` varchar(300) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `petfriendly` tinyint(4) NOT NULL,
  `latitude` float NOT NULL,
  `logitude` float NOT NULL,
  `owner` varchar(100) NOT NULL,
  `services` varchar(500) NOT NULL,
  `facilities` varchar(500) NOT NULL,
  `working_days` varchar(500) NOT NULL,
  `wstart_at` time NOT NULL,
  `wend_at` time NOT NULL,
  `special_days` varchar(500) NOT NULL,
  `sstart_at` time NOT NULL,
  `send_at` time NOT NULL,
  `isActive` tinyint(4) NOT NULL DEFAULT '0',
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- بنية الجدول `gyms`
--

CREATE TABLE `gyms` (
  `id` int(11) NOT NULL,
  `name` varchar(300) NOT NULL,
  `description` varchar(500) NOT NULL,
  `price` float NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `country` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `district` varchar(100) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `petfriendly` tinyint(4) NOT NULL,
  `latitude` float NOT NULL,
  `longitude` float NOT NULL,
  `owner` varchar(100) NOT NULL,
  `swimsuit` tinyint(4) NOT NULL,
  `changeroom` tinyint(4) NOT NULL,
  `wifi` tinyint(4) NOT NULL,
  `lockers` tinyint(4) NOT NULL,
  `carparking` tinyint(4) NOT NULL,
  `swimpool` tinyint(4) NOT NULL,
  `basketball` tinyint(4) NOT NULL,
  `saunapath` tinyint(4) NOT NULL,
  `football` tinyint(4) NOT NULL,
  `cardiomachine` tinyint(4) NOT NULL,
  `weightmachine` tinyint(4) NOT NULL,
  `classes` tinyint(4) NOT NULL,
  `tabletenis` tinyint(4) NOT NULL,
  `volleyball` tinyint(4) NOT NULL,
  `working_days` varchar(500) NOT NULL,
  `wstart_at` time NOT NULL,
  `wend_at` time NOT NULL,
  `special_days` varchar(500) NOT NULL,
  `sstart_at` time NOT NULL,
  `send_at` time NOT NULL,
  `isActive` tinyint(4) NOT NULL,
  `image` varchar(200) NOT NULL,
  `image2` varchar(200) NOT NULL DEFAULT 'noimage',
  `image3` varchar(200) NOT NULL DEFAULT 'noimage',
  `image4` varchar(200) NOT NULL DEFAULT 'noimage',
  `image5` varchar(200) NOT NULL DEFAULT 'noimage',
  `no_rates` int(11) NOT NULL DEFAULT '0',
  `rate` tinyint(4) NOT NULL,
  `c1` tinyint(4) NOT NULL,
  `c2` tinyint(4) NOT NULL,
  `c3` tinyint(4) NOT NULL,
  `c4` tinyint(4) NOT NULL,
  `c5` tinyint(4) NOT NULL,
  `c6` tinyint(4) NOT NULL,
  `c7` tinyint(4) NOT NULL,
  `c8` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- إرجاع أو استيراد بيانات الجدول `gyms`
--

INSERT INTO `gyms` (`id`, `name`, `description`, `price`, `email`, `phone`, `country`, `city`, `district`, `gender`, `petfriendly`, `latitude`, `longitude`, `owner`, `swimsuit`, `changeroom`, `wifi`, `lockers`, `carparking`, `swimpool`, `basketball`, `saunapath`, `football`, `cardiomachine`, `weightmachine`, `classes`, `tabletenis`, `volleyball`, `working_days`, `wstart_at`, `wend_at`, `special_days`, `sstart_at`, `send_at`, `isActive`, `image`, `image2`, `image3`, `image4`, `image5`, `no_rates`, `rate`, `c1`, `c2`, `c3`, `c4`, `c5`, `c6`, `c7`, `c8`) VALUES
(11, 'champions gym', 'we are recently open and we hope to get your stratification ', 108, 'championsGym@gmail.com', '1234567890', 'Saudi Arabia', 'Riyadh', 'shifa', 'male', 1, 24.7136, 46.6753, 'Ahmad', 1, 1, 1, 0, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, '-saturday-sunday-monday-tuesday', '02:00:00', '13:00:00', '', '13:00:00', '17:00:00', 1, 'bv.jpg', 'ch.jpg', 'sw.jpg', 'kk.jpg', 'mb.jpg', 3, 5, 5, 5, 5, 5, 5, 5, 5, 5),
(12, 'fitness time', 'We try hard to raise your fitness,and support your health', 100, 'fitnesstime@gmail.com', '1234567890', 'Saudi Arabia', 'Riyadh', 'Olaya street', 'male', 1, 24.5576, 46.693, 'Salm', 1, 1, 1, 0, 0, 1, 0, 0, 0, 1, 0, 0, 0, 1, '-saturday-sunday-monday', '13:00:00', '01:00:00', '', '15:01:00', '17:00:00', 1, 'ginaym.jpg', 'chian.jpg', 'swim.jpg', 'chang.jpg', 'lokcer.jpg', 1, 5, 5, 5, 5, 5, 5, 5, 5, 5),
(13, 'Body master', 'you should to improve your fitness so visit us', 112, 'Bodymaster@gmail.com', '1234567890', 'Afghanistan', 'Select city', 'swidi', 'male', 1, 24.7136, 46.6753, 'Kareem', 0, 0, 1, 1, 1, 1, 0, 0, 1, 0, 0, 0, 0, 1, '-monday-tuesday-wednesday-thursday', '14:00:00', '10:02:00', '', '01:00:00', '05:02:00', 1, 'u.jpg', 'sw2.jpg', 'fitness-gym.jpg', 'si.jpg', 'jn.jpg', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- بنية الجدول `gym_rate`
--

CREATE TABLE `gym_rate` (
  `id` int(11) NOT NULL,
  `gym_id` int(11) NOT NULL,
  `customer` varchar(100) NOT NULL,
  `c1` tinyint(4) NOT NULL,
  `c2` tinyint(4) NOT NULL,
  `c3` tinyint(4) NOT NULL,
  `c4` tinyint(4) NOT NULL,
  `c5` tinyint(4) NOT NULL,
  `c6` tinyint(4) NOT NULL,
  `c7` tinyint(4) NOT NULL,
  `c8` tinyint(4) NOT NULL,
  `allrate` tinyint(4) NOT NULL,
  `description` varchar(500) NOT NULL,
  `no_like` int(11) NOT NULL DEFAULT '0',
  `no_dislike` int(11) NOT NULL DEFAULT '0',
  `isvalid` tinyint(4) NOT NULL DEFAULT '0',
  `isseen` tinyint(4) NOT NULL DEFAULT '0',
  `customer_like` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- إرجاع أو استيراد بيانات الجدول `gym_rate`
--

INSERT INTO `gym_rate` (`id`, `gym_id`, `customer`, `c1`, `c2`, `c3`, `c4`, `c5`, `c6`, `c7`, `c8`, `allrate`, `description`, `no_like`, `no_dislike`, `isvalid`, `isseen`, `customer_like`) VALUES
(9, 11, 'ghadah', 5, 5, 5, 5, 5, 5, 5, 5, 5, 'good services', 0, 0, 1, 0, ''),
(10, 11, 'Reema11!', 5, 5, 5, 5, 5, 5, 5, 5, 5, '', 0, 0, 0, 0, ''),
(12, 12, 'Reema11!', 5, 5, 5, 5, 5, 5, 5, 5, 5, 'I love it , good gym', 0, 0, 1, 0, ''),
(13, 13, 'Reema11!', 1, 1, 1, 1, 1, 1, 1, 1, 1, 'Bad gym ,bad services', 0, 0, 1, 0, '');

-- --------------------------------------------------------

--
-- بنية الجدول `reportreview`
--

CREATE TABLE `reportreview` (
  `id` int(11) NOT NULL,
  `customer` varchar(100) NOT NULL,
  `rate_id` int(11) NOT NULL,
  `feedback` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- بنية الجدول `searchhistory`
--

CREATE TABLE `searchhistory` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `query` varchar(100) NOT NULL,
  `search_by` varchar(20) NOT NULL,
  `no_results` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- إرجاع أو استيراد بيانات الجدول `searchhistory`
--

INSERT INTO `searchhistory` (`id`, `username`, `datetime`, `query`, `search_by`, `no_results`) VALUES
(1, '', '2019-04-17 17:19:24', 'fitness time', 'byname', 1),
(2, 'Reema11!', '2019-04-17 17:19:47', 'fitness time', 'byname', 1),
(3, 'Reema11!', '2019-04-17 17:26:16', 'fitness time', 'byname', 1),
(4, 'Reema11!', '2019-04-17 17:26:31', 'body master', 'byname', 1);

-- --------------------------------------------------------

--
-- بنية الجدول `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `type` varchar(20) NOT NULL,
  `isActive` tinyint(4) NOT NULL,
  `country` varchar(200) NOT NULL,
  `city` varchar(200) NOT NULL,
  `age` int(11) NOT NULL,
  `gender` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- إرجاع أو استيراد بيانات الجدول `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `email`, `phone`, `type`, `isActive`, `country`, `city`, `age`, `gender`) VALUES
(2, 'zsdfg', 'adminsdf   ', 'Aa!12345', 'arwa333mm@gmail.com', '23456789', 'Customer', 1, 'Afghanistan', 'Select city', 12, 'male'),
(3, 'ARWA22!b', 'ARWA22!b', 'ARWA22!b', 'hh@gmail.com', '1234567890', 'Customer', 1, 'Belgium', 'Aalbeke', 21, 'male'),
(5, 'admin', 'admin', 'admin', 'admin@gmail.com', '1234567890', 'Admin', 1, 'Saudi Arabia', 'Riyadh', 30, 'male'),
(8, 'BmmBB11@', 'BmmBB11@', 'BmmBB11@', 'BmmBB11@gmail.com', '123456789', 'Customer', 1, 'Barbados', 'Wanstead', 20, 'male'),
(15, 'Reema11!', 'Reema11!', 'Reema11!', 'Reema@gmail.com', '1234567890', 'Customer', 1, 'Afghanistan', 'Select city', 0, 'male'),
(18, 'Dena Ahmad#1', 'Dena Ahmad#1', 'Dd#1234567', 'Dena#1@gmail.com', '0500031633', 'Customer', 1, 'Barbados', 'Rendezvous', 16, 'female'),
(19, 'ghadah', 'ghadah', 'ghadahA1!', 'ghadah@gmail.com', '123456789', 'Customer', 1, 'Bosnia and Herzegovina', 'Mostar', 50, 'female'),
(20, 'nouraGg11!', 'nouraGg11!', 'nouraGg11!', 'nh@gmail.com', '123456789', 'Customer', 1, 'Afghanistan', 'Select city', 50, 'male'),
(21, 'noura fahadmN!1', 'noura fahadmN!1', 'noura fahadmN!1', 'norahfaBm15@hotmail.com', '556384666', 'Customer', 1, 'Afghanistan', 'Select city', 0, 'male'),
(22, 'Ahmad', 'Ahmad', 'Ahmad11!', 'Ahmad@gmail.com', '1234567890', 'Owner', 1, '', '', 0, ''),
(23, 'Salm', 'Salm', 'Salm111!', 'Salm@gmail.com', '1234567890', 'Owner', 1, '', '', 0, ''),
(24, 'Kareem', 'Kareem', 'Kareem1!', 'Kareem@gmail.com', '1234567890', 'Owner', 1, '', '', 0, '');

-- --------------------------------------------------------

--
-- Structure for view `favouritegyms_vw`
--
DROP TABLE IF EXISTS `favouritegyms_vw`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `favouritegyms_vw`  AS  select `favouritegyms`.`id` AS `fav_id`,`favouritegyms`.`gym_id` AS `gym_id`,`favouritegyms`.`customer` AS `customer_id`,`gyms`.`name` AS `gym_name`,`gyms`.`country` AS `country`,`gyms`.`city` AS `city`,`gyms`.`image` AS `image` from (`favouritegyms` join `gyms`) where (`favouritegyms`.`gym_id` = `gyms`.`id`) ;

-- --------------------------------------------------------

--
-- Structure for view `feedback_vw`
--
DROP TABLE IF EXISTS `feedback_vw`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `feedback_vw`  AS  select `gym_rate`.`customer` AS `customer`,`gym_rate`.`allrate` AS `allrate`,`gym_rate`.`description` AS `description`,`gym_rate`.`isvalid` AS `isvalid`,`gym_rate`.`isseen` AS `isseen`,`gym_rate`.`id` AS `id`,`gyms`.`name` AS `name`,`gyms`.`owner` AS `owner` from (`gym_rate` join `gyms`) where (`gym_rate`.`gym_id` = `gyms`.`id`) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `favouritegyms`
--
ALTER TABLE `favouritegyms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gym_id` (`gym_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gym`
--
ALTER TABLE `gym`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gyms`
--
ALTER TABLE `gyms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gym_rate`
--
ALTER TABLE `gym_rate`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gym_id` (`gym_id`);

--
-- Indexes for table `reportreview`
--
ALTER TABLE `reportreview`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `searchhistory`
--
ALTER TABLE `searchhistory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `favouritegyms`
--
ALTER TABLE `favouritegyms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `gym`
--
ALTER TABLE `gym`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gyms`
--
ALTER TABLE `gyms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `gym_rate`
--
ALTER TABLE `gym_rate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `reportreview`
--
ALTER TABLE `reportreview`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `searchhistory`
--
ALTER TABLE `searchhistory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- قيود الجداول المحفوظة
--

--
-- القيود للجدول `favouritegyms`
--
ALTER TABLE `favouritegyms`
  ADD CONSTRAINT `favouritegyms_ibfk_1` FOREIGN KEY (`gym_id`) REFERENCES `gyms` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- القيود للجدول `gym_rate`
--
ALTER TABLE `gym_rate`
  ADD CONSTRAINT `gym_rate_ibfk_1` FOREIGN KEY (`gym_id`) REFERENCES `gyms` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
