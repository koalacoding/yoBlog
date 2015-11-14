-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Sam 14 Novembre 2015 à 05:39
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `yoblog`
--

-- --------------------------------------------------------

--
-- Structure de la table `anti_flood`
--

CREATE TABLE IF NOT EXISTS `anti_flood` (
  `ip_address` varchar(50) NOT NULL,
  `last_request_time` int(11) NOT NULL,
  PRIMARY KEY (`ip_address`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `anti_flood`
--

INSERT INTO `anti_flood` (`ip_address`, `last_request_time`) VALUES
('::1', 1447475044);

-- --------------------------------------------------------

--
-- Structure de la table `archives_months`
--

CREATE TABLE IF NOT EXISTS `archives_months` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `month` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Contenu de la table `archives_months`
--

INSERT INTO `archives_months` (`id`, `month`, `year`) VALUES
(5, 2, 2015),
(6, 1, 2015),
(7, 3, 2015);

-- --------------------------------------------------------

--
-- Structure de la table `blogoptions`
--

CREATE TABLE IF NOT EXISTS `blogoptions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `headerBackgroundImage` text NOT NULL,
  `headerTextColor` varchar(30) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `blogoptions`
--

INSERT INTO `blogoptions` (`id`, `username`, `headerBackgroundImage`, `headerTextColor`, `title`, `description`) VALUES
(2, 'admin', 'https://upload.wikimedia.org/wikipedia/commons/8/8c/Center_of_the_Milky_Way_Galaxy_III_%E2%80%93_Chandra_(X-ray).jpg', 'rgb(255, 255, 255)', 'The up and comin''', 'The background-image property sets one or more background images for an element.'),
(3, 'johndoe', 'https://upload.wikimedia.org/wikipedia/commons/8/8c/Center_of_the_Milky_Way_Galaxy_III_%E2%80%93_Chandra_(X-ray).jpg', '', '', '');

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `author` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `post_date` datetime NOT NULL,
  `time_since_unix_epoch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=39 ;

--
-- Contenu de la table `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `author`, `email`, `comment`, `post_date`, `time_since_unix_epoch`) VALUES
(35, 13, 'bob', 'bob@live.com', 'I love my brother too. He has consoled and comforted me many, many times. I owe him so much.', '2015-02-21 22:18:10', 0),
(36, 13, 'rob', '', '*grins* Aunt B’s is without a doubt one of the best blogs out there. It’s awesome to see her getting the recognition she deserves!', '2015-02-21 22:18:21', 1424553501),
(37, 12, 'mini-mouse', '', 'sup loc', '2015-02-21 22:18:35', 1424553515),
(38, 29, 'loc', '', 'sup log', '2015-03-06 07:32:45', 1425623565);

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `content` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `postDate` datetime NOT NULL,
  `timeSinceEpoch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=84 ;

--
-- Contenu de la table `posts`
--

INSERT INTO `posts` (`id`, `username`, `title`, `content`, `postDate`, `timeSinceEpoch`) VALUES
(81, 'admin', 'my first posters', 'sup yo', '2015-11-13 02:59:49', 1447379989),
(83, 'admin', 'bonjour', 'aurevoir', '2015-11-14 04:05:24', 1447470324);

-- --------------------------------------------------------

--
-- Structure de la table `post_categories`
--

CREATE TABLE IF NOT EXISTS `post_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(17) NOT NULL,
  `category_name` varchar(36) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Contenu de la table `post_categories`
--

INSERT INTO `post_categories` (`id`, `username`, `category_name`) VALUES
(3, 'admin', 'cat2'),
(4, 'admin', 'cat3'),
(5, 'admin', 'cat1'),
(6, 'admin', 'cat66'),
(8, 'admin', '<strong>test</strong>');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `registration_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `registration_date`) VALUES
(13, 'admin2', '7a42703f64598e83e7c579112cb80f254b27b53b089c8a7cd14badc6165e78aa', 'mp', '2015-02-01 01:56:24'),
(14, 'koooooooooooooooo', 'c2f42a4d2a709a412b612ce9c6930676904c7c96d07602d5b57a046ee4f69a82', 'lolo', '2015-02-10 13:38:08'),
(15, 'jean', '689856308efb50cf3b1250c2327b17ecf12e9d6d5fa2b0615fb398c827a4cf7b', 'test@test.fr', '2015-02-10 16:40:50'),
(16, 'BIGBOSS88', '689856308efb50cf3b1250c2327b17ecf12e9d6d5fa2b0615fb398c827a4cf7b', 'test@test.fr', '2015-02-10 16:42:35'),
(17, 'jeang', '689856308efb50cf3b1250c2327b17ecf12e9d6d5fa2b0615fb398c827a4cf7b', 'test@cococococococ.fr', '2015-02-10 16:43:39'),
(18, 'johnny', '0988f4a1ebe478008013721c00b4853783648c37b5ca1e901ba1a6811942a124', 'john@gmail.com', '2015-03-14 14:06:00'),
(19, 'admin', 'cd678cdb5a3c5e70f29805f1c864111a6ff354f6d18dae076a08ab1a46cf846e', '', '2015-11-11 14:44:04'),
(20, 'johndoe', 'cd678cdb5a3c5e70f29805f1c864111a6ff354f6d18dae076a08ab1a46cf846e', '', '2015-11-11 23:04:04'),
(21, 'tyu', '86063db2ef0e73e592fd0b182cf40bab0bd4eb56dee469f76a87db9c9849b4ba', '', '2015-11-14 03:25:27'),
(22, 'lilg', 'cd678cdb5a3c5e70f29805f1c864111a6ff354f6d18dae076a08ab1a46cf846e', '', '2015-11-14 03:28:13'),
(23, 'admin3', 'cd678cdb5a3c5e70f29805f1c864111a6ff354f6d18dae076a08ab1a46cf846e', '', '2015-11-14 05:22:04');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
