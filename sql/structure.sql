-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 14, 2015 at 01:33 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `blog`
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
-- Table structure for table `blog_options`
--

CREATE TABLE IF NOT EXISTS `blog_options` (
`id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `short_about` text NOT NULL,
  `about` text NOT NULL,
  `contact` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blog_options`
--

INSERT INTO `blog_options` (`id`, `username`, `short_about`, `about`, `contact`) VALUES
(2, 'admin', 'short abouttez', 'big about					', 'admin@gmail.com');

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
  `author` varchar(255) NOT NULL,
  `category` varchar(36) NOT NULL,
  `title` varchar(255) NOT NULL,
  `post` text NOT NULL,
  `post_date` datetime NOT NULL,
  `time_since_unix_epoch` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `author`, `category`, `title`, `post`, `post_date`, `time_since_unix_epoch`) VALUES
(10, 'admin', '', 'test', 'koko', '2015-02-20 04:46:02', 1424403962),
(12, 'admin', '', 'Elle Effect', 'have been sitting on reporting this best blog for a little while now (work, school, and such has kept me distracted) but now it is time to let it out of the box.\r\n\r\nAbout a week and a half ago I was browsing around the tag surfer when I (happily) stumbled across Elle Effect. Lauren, the author, is an eighteen year old artist who not only gives us a glimpse into her artistic works but also into the thoughts and situations of her daily life.\r\n\r\nWhat I quickly discoved is that this young girl possesses a mind able to delve into the deeper end of life through both the visual arts as well as the written word.\r\n\r\nAll this is why I consider Elle Effect a best blog.', '2015-02-21 22:16:04', 1424553364),
(13, 'admin', '', 'Tiny Cat Pants', 'According to the Blog Stats sidebar widget, Tiny Cat Pants — a very smart, funny, idiosyncratic blog — has tallied more than 23,000 hits since coming to WordPress March 03, 2007. Written semi-anonymously, by someone who calls herself Aunt B., Tiny Cat Pants takes on all comers, doles out sharp criticism for idiot politicians, picks fights with other bloggers, periodically redefines feminism to suit its author’s mood, and in general, has a heck of a good time not taking itself very seriously.', '2015-02-21 22:17:30', 1424553450),
(14, 'admin', '', 'test', 'test', '2015-02-21 22:40:22', 1424554822),
(15, 'admin', '', 'koko', 'kaka', '2015-02-21 22:40:50', 1424554850),
(16, 'admin', '', 'zz', 'zz', '2015-02-21 22:43:13', 1424554993),
(17, 'admin', '', 'ee', 'zz', '2015-02-21 22:43:25', 1424555005),
(18, 'admin', '', '3', '3', '2015-02-22 03:30:21', 1424572221),
(19, 'admin', '', '4', '4', '2015-02-22 03:30:53', 1424572253),
(20, 'admin', '', '5', '5', '2015-02-22 03:31:11', 1424572271),
(21, 'admin', '', '6', '6', '2015-02-22 03:31:23', 1424572283),
(22, 'admin', '', '7', '7', '2015-02-22 03:32:05', 1424572325),
(23, 'admin', '', '8', '8', '2015-02-22 03:33:03', 1424572383),
(24, 'admin', '', 'january article', 'some sh', '2015-01-22 03:33:03', 1421961364),
(25, 'admin', 'No category', 'rr', 'rr', '2015-03-04 12:09:56', 1425467396),
(26, 'admin', 'No category', 'tt', 'yy', '2015-03-04 12:10:52', 1425467452),
(27, 'admin', 'No category', 'rtr', 'rr', '2015-03-04 12:11:14', 1425467474),
(28, 'admin', 'cat2', 'test cat2', 'cat2 post\r\n', '2015-03-04 18:15:35', 1425489335),
(29, 'admin', 'cat66', 'Elle Effect', 'I have been sitting on reporting this best blog for a little while now (work, school, and such has kept me distracted) but now it is time to let it out of the box.\r\n\r\nAbout a week and a half ago I was browsing around the tag surfer when I (happily) stumbled across Elle Effect. Lauren, the author, is an eighteen year old artist who not only gives us a glimpse into her artistic works but also into the thoughts and situations of her daily life.\r\n\r\nWhat I quickly discoved is that this young girl possesses a mind able to delve into the deeper end of life through both the visual arts as well as the written word.\r\n\r\nAll this is why I consider Elle Effect a best blog.\r\n', '2015-03-04 18:21:31', 1425489691);

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
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `registration_date`) VALUES
(7, 'admin', '7a42703f64598e83e7c579112cb80f254b27b53b089c8a7cd14badc6165e78aa', 'admin@me.com', '2015-01-31 07:59:24'),
(13, 'admin2', '7a42703f64598e83e7c579112cb80f254b27b53b089c8a7cd14badc6165e78aa', 'mp', '2015-02-01 01:56:24'),
(14, 'koooooooooooooooo', 'c2f42a4d2a709a412b612ce9c6930676904c7c96d07602d5b57a046ee4f69a82', 'lolo', '2015-02-10 13:38:08'),
(15, 'jean', '689856308efb50cf3b1250c2327b17ecf12e9d6d5fa2b0615fb398c827a4cf7b', 'test@test.fr', '2015-02-10 16:40:50'),
(16, 'BIGBOSS88', '689856308efb50cf3b1250c2327b17ecf12e9d6d5fa2b0615fb398c827a4cf7b', 'test@test.fr', '2015-02-10 16:42:35'),
(17, 'jeang', '689856308efb50cf3b1250c2327b17ecf12e9d6d5fa2b0615fb398c827a4cf7b', 'test@cococococococ.fr', '2015-02-10 16:43:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `archives_months`
--
ALTER TABLE `archives_months`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_options`
--
ALTER TABLE `blog_options`
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
-- AUTO_INCREMENT for table `blog_options`
--
ALTER TABLE `blog_options`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `post_categories`
--
ALTER TABLE `post_categories`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
