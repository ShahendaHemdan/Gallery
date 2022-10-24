-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 24, 2022 at 03:09 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(300) NOT NULL,
  `Image` varchar(300) NOT NULL,
  `date` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `Image`, `date`) VALUES
(8, 'sports', 'images/1550452353cr7.jpeg', '2022-09-23 07:49:14'),
(15, 'cars', 'images/18694739333.jpg', '2022-09-23 08:10:00'),
(18, 'beauty', 'images/1273293981607555694.jpg', '2022-09-24 06:43:11'),
(19, 'fashion', 'images/1899101063sunglasses.56fc0299.jpg', '2022-09-24 06:43:51'),
(23, 'test', 'images/doctor-01.jpg', '2022-09-27 04:38:10');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `name` varchar(300) NOT NULL,
  `postId` int(11) NOT NULL,
  `email` varchar(300) NOT NULL,
  `comment` varchar(300) NOT NULL,
  `status` varchar(300) NOT NULL DEFAULT 'unapproved',
  `date` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `name`, `postId`, `email`, `comment`, `status`, `date`) VALUES
(7, 'shahy', 26, 'shahindahemdan132@gmail.com', 'great', 'approved', '2022-09-25 13:09:52'),
(8, 'shahy', 15, 'shahindahemdan132@gmail.com', 'fsgasf', 'approved', '2022-09-26 08:56:17'),
(9, 'shahenda', 27, 'shahindahemdan132@gmail.com', 'anythong', 'approved', '2022-09-27 04:33:00'),
(10, 'shahenda', 20, 'shahindahemdan132@gmail.com', 'great', 'approved', '2022-09-27 04:37:04');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `image` varchar(300) NOT NULL,
  `title` varchar(300) NOT NULL,
  `description` text NOT NULL,
  `categoryid` int(11) NOT NULL,
  `writerid` int(11) NOT NULL,
  `ststus` varchar(300) NOT NULL,
  `date` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `image`, `title`, `description`, `categoryid`, `writerid`, `ststus`, `date`) VALUES
(15, 'images/pexels-pixabay-210019.jpg', 'CAR1', '<p><span style=\"color: rgb(34, 34, 34); font-family: Merriweather, serif; font-size: 12px; letter-spacing: 1px;\">Qui consequatur nemo et debitis repudiandae aut quibusdam veritatis. Et obcaecati sint qui vitae unde qui unde aliquid qui voluptatibus recusandae. Ea ducimus aliquam aut voluptate alias quo voluptas velit sed necessitatibus consequatur</span><br></p> ', 15, 2, 'active ', '2022-09-24 14:55:20'),
(16, 'images/pexels-albin-berlin-919073.jpg', 'car2', '<p><span style=\"color: rgb(34, 34, 34); font-family: Merriweather, serif; font-size: 12px; letter-spacing: 1px;\">Qui consequatur nemo et debitis repudiandae aut quibusdam veritatis. Et obcaecati sint qui vitae unde qui unde aliquid qui voluptatibus recusandae. Ea ducimus aliquam aut voluptate alias quo voluptas velit sed necessitatibus consequatur</span><br></p> ', 15, 5, 'active ', '2022-09-24 14:56:20'),
(17, 'images/549697964thumb_61069_default_news_size_5.jpeg', 'mo salah', '<p><span style=\"color: rgb(34, 34, 34); font-family: Merriweather, serif; font-size: 12px; letter-spacing: 1px;\">Qui consequatur nemo et debitis repudiandae aut quibusdam veritatis. Et obcaecati sint qui vitae unde qui unde aliquid qui voluptatibus recusandae. Ea ducimus aliquam aut voluptate alias quo voluptas velit sed necessitatibus consequatur</span><br></p> ', 8, 1, 'active ', '2022-09-24 14:57:32'),
(18, 'images/1550452353cr7.jpeg', 'Ronaldo', '<p><span style=\"color: rgb(34, 34, 34); font-family: Merriweather, serif; font-size: 12px; letter-spacing: 1px;\">Qui consequatur nemo et debitis repudiandae aut quibusdam veritatis. Et obcaecati sint qui vitae unde qui unde aliquid qui voluptatibus recusandae. Ea ducimus aliquam aut voluptate alias quo voluptas velit sed necessitatibus consequatur</span><br></p> ', 8, 2, 'active ', '2022-09-24 14:57:55'),
(19, 'images/pexels-pixabay-235922.jpg', 'RUNNING', '<p><span style=\"color: rgb(34, 34, 34); font-family: Merriweather, serif; font-size: 12px; letter-spacing: 1px;\">Qui consequatur nemo et debitis repudiandae aut quibusdam veritatis. Et obcaecati sint qui vitae unde qui unde aliquid qui voluptatibus recusandae. Ea ducimus aliquam aut voluptate alias quo voluptas velit sed necessitatibus consequatur</span><br></p> ', 8, 1, 'active ', '2022-09-24 15:01:47'),
(20, 'images/pexels-andrea-piacquadio-3979134.jpg', 'Girl1', '<p><span style=\"color: rgb(34, 34, 34); font-family: Merriweather, serif; font-size: 12px; letter-spacing: 1px;\">Qui consequatur nemo et debitis repudiandae aut quibusdam veritatis. Et obcaecati sint qui vitae unde qui unde aliquid qui voluptatibus recusandae. Ea ducimus aliquam aut voluptate alias quo voluptas velit sed necessitatibus consequatur</span><br></p> ', 18, 1, 'active ', '2022-09-24 15:05:05'),
(21, 'images/pexels-moose-photos-1029896.jpg', 'Girl2 beayty caregory', '<p><span style=\"color: rgb(34, 34, 34); font-family: Merriweather, serif; font-size: 12px; letter-spacing: 1px;\">Qui consequatur nemo et debitis repudiandae aut quibusdam veritatis. Et obcaecati sint qui vitae unde qui unde aliquid qui voluptatibus recusandae. Ea ducimus aliquam aut voluptate alias quo voluptas velit sed necessitatibus consequatur</span><br></p> ', 18, 2, 'active ', '2022-09-24 15:05:48'),
(23, 'images/pexels-maria-lindsey-content-creator-1536356.jpg', 'girl 3 beauty category ', '<p><span style=\"color: rgb(34, 34, 34); font-family: Merriweather, serif; font-size: 12px; letter-spacing: 1px;\">Qui consequatur nemo et debitis repudiandae aut quibusdam veritatis. Et obcaecati sint qui vitae unde qui unde aliquid qui voluptatibus recusandae. Ea ducimus aliquam aut voluptate alias quo voluptas velit sed necessitatibus consequatur</span><br></p> ', 18, 1, 'active ', '2022-09-24 15:07:41'),
(24, 'images/woman-black-trousers-purple-blouse.jpg', 'fashion post one', '<p><span style=\"color: rgb(34, 34, 34); font-family: Merriweather, serif; font-size: 12px; letter-spacing: 1px;\">Qui consequatur nemo et debitis repudiandae aut quibusdam veritatis. Et obcaecati sint qui vitae unde qui unde aliquid qui voluptatibus recusandae. Ea ducimus aliquam aut voluptate alias quo voluptas velit sed necessitatibus consequatur</span><br></p> ', 19, 1, 'active ', '2022-09-24 15:11:01'),
(26, 'images/high-fashion-portrait-young-elegant-blonde-woman-black-wool-ha.jpg', 'fashion post three', '<p><span style=\"color: rgb(34, 34, 34); font-family: Merriweather, serif; font-size: 12px; letter-spacing: 1px;\">Qui consequatur nemo et debitis repudiandae aut quibusdam veritatis. Et obcaecati sint qui vitae unde qui unde aliquid qui voluptatibus recusandae. Ea ducimus aliquam aut voluptate alias quo voluptas velit sed necessitatibus consequatur</span><br></p> ', 19, 5, 'active ', '2022-09-24 15:12:30'),
(27, 'images/modern-pretty-girl-beige-coat-stan er-face-makeup-styli _343629-69.jpg', 'title', '<p>vcxcdd</p> ', 18, 1, 'active ', '2022-09-26 08:58:30');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(300) NOT NULL,
  `password` varchar(300) NOT NULL,
  `date` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `password`, `date`) VALUES
(9, 'shahenda', 'e10adc3949ba59abbe56e057f20f883e', '2022-09-24 13:45:02'),
(10, 'shahy', '25f9e794323b453885f5181f1b624d0b', '2022-09-24 13:48:44'),
(11, 'Admin', '81dc9bdb52d04dc20036dbd8313ed055', '2022-09-27 04:39:38');

-- --------------------------------------------------------

--
-- Table structure for table `writers`
--

CREATE TABLE `writers` (
  `id` int(11) NOT NULL,
  `name` varchar(300) NOT NULL,
  `position` varchar(300) NOT NULL,
  `date` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `writers`
--

INSERT INTO `writers` (`id`, `name`, `position`, `date`) VALUES
(1, 'shahy', 'editor', '2022-09-23 08:23:09'),
(2, 'shahenda', 'vanger', '2022-09-23 08:27:19'),
(5, 'Gehad Mohamed', 'vanger', '2022-09-24 06:44:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `postId` (`postId`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categoryid` (`categoryid`),
  ADD KEY `writerid` (`writerid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `writers`
--
ALTER TABLE `writers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `writers`
--
ALTER TABLE `writers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`postId`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`categoryid`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `posts_ibfk_2` FOREIGN KEY (`writerid`) REFERENCES `writers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
