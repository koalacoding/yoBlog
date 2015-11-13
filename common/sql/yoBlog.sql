-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 13, 2015 at 08:59 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `yoBlog`
--

-- --------------------------------------------------------

--
-- Table structure for table `archives_months`
--

CREATE TABLE IF NOT EXISTS `archives_months` (
`id` int(11) NOT NULL,
  `month` int(11) NOT NULL,
  `year` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `archives_months`
--

INSERT INTO `archives_months` (`id`, `month`, `year`) VALUES
(5, 2, 2015),
(6, 1, 2015),
(7, 3, 2015);

-- --------------------------------------------------------

--
-- Table structure for table `blogOptions`
--

CREATE TABLE IF NOT EXISTS `blogOptions` (
`id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `headerBackgroundImage` text NOT NULL,
  `headerTextColor` varchar(30) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blogOptions`
--

INSERT INTO `blogOptions` (`id`, `username`, `headerBackgroundImage`, `headerTextColor`, `title`, `description`) VALUES
(2, 'admin', 'https://upload.wikimedia.org/wikipedia/commons/8/8c/Center_of_the_Milky_Way_Galaxy_III_%E2%80%93_Chandra_(X-ray).jpg', 'rgb(255, 255, 255)', 'The up and comin''', 'The background-image property sets one or more background images for an element.'),
(3, 'johndoe', 'https://upload.wikimedia.org/wikipedia/commons/8/8c/Center_of_the_Milky_Way_Galaxy_III_%E2%80%93_Chandra_(X-ray).jpg', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
`id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `author` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `post_date` datetime NOT NULL,
  `time_since_unix_epoch` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `author`, `email`, `comment`, `post_date`, `time_since_unix_epoch`) VALUES
(35, 13, 'bob', 'bob@live.com', 'I love my brother too. He has consoled and comforted me many, many times. I owe him so much.', '2015-02-21 22:18:10', 0),
(36, 13, 'rob', '', '*grins* Aunt B’s is without a doubt one of the best blogs out there. It’s awesome to see her getting the recognition she deserves!', '2015-02-21 22:18:21', 1424553501),
(37, 12, 'mini-mouse', '', 'sup loc', '2015-02-21 22:18:35', 1424553515),
(38, 29, 'loc', '', 'sup log', '2015-03-06 07:32:45', 1425623565);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
`id` int(11) NOT NULL,
  `username` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `content` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `postDate` datetime NOT NULL,
  `timeSinceEpoch` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=83 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `username`, `title`, `content`, `postDate`, `timeSinceEpoch`) VALUES
(81, 'admin', 'my first posters', 'sup yo', '2015-11-13 02:59:49', 1447379989),
(82, 'admin', 'retaaa6666', 'zaa', '2015-11-13 03:00:08', 1447380008);

-- --------------------------------------------------------

--
-- Table structure for table `post_categories`
--

CREATE TABLE IF NOT EXISTS `post_categories` (
`id` int(11) NOT NULL,
  `username` varchar(17) NOT NULL,
  `category_name` varchar(36) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post_categories`
--

INSERT INTO `post_categories` (`id`, `username`, `category_name`) VALUES
(3, 'admin', 'cat2'),
(4, 'admin', 'cat3'),
(5, 'admin', 'cat1'),
(6, 'admin', 'cat66'),
(8, 'admin', '<strong>test</strong>');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `registration_date` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `registration_date`) VALUES
(13, 'admin2', '7a42703f64598e83e7c579112cb80f254b27b53b089c8a7cd14badc6165e78aa', 'mp', '2015-02-01 01:56:24'),
(14, 'koooooooooooooooo', 'c2f42a4d2a709a412b612ce9c6930676904c7c96d07602d5b57a046ee4f69a82', 'lolo', '2015-02-10 13:38:08'),
(15, 'jean', '689856308efb50cf3b1250c2327b17ecf12e9d6d5fa2b0615fb398c827a4cf7b', 'test@test.fr', '2015-02-10 16:40:50'),
(16, 'BIGBOSS88', '689856308efb50cf3b1250c2327b17ecf12e9d6d5fa2b0615fb398c827a4cf7b', 'test@test.fr', '2015-02-10 16:42:35'),
(17, 'jeang', '689856308efb50cf3b1250c2327b17ecf12e9d6d5fa2b0615fb398c827a4cf7b', 'test@cococococococ.fr', '2015-02-10 16:43:39'),
(18, 'johnny', '0988f4a1ebe478008013721c00b4853783648c37b5ca1e901ba1a6811942a124', 'john@gmail.com', '2015-03-14 14:06:00'),
(19, 'admin', 'cd678cdb5a3c5e70f29805f1c864111a6ff354f6d18dae076a08ab1a46cf846e', '', '2015-11-11 14:44:04'),
(20, 'johndoe', 'cd678cdb5a3c5e70f29805f1c864111a6ff354f6d18dae076a08ab1a46cf846e', '', '2015-11-11 23:04:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `archives_months`
--
ALTER TABLE `archives_months`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogOptions`
--
ALTER TABLE `blogOptions`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post_categories`
--
ALTER TABLE `post_categories`
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
-- AUTO_INCREMENT for table `archives_months`
--
ALTER TABLE `archives_months`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `blogOptions`
--
ALTER TABLE `blogOptions`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=83;
--
-- AUTO_INCREMENT for table `post_categories`
--
ALTER TABLE `post_categories`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
