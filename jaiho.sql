-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 01, 2014 at 11:09 AM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `jaiho`
--
CREATE DATABASE IF NOT EXISTS `jaiho` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `jaiho`;

-- --------------------------------------------------------

--
-- Table structure for table `jaiho_action`
--

CREATE TABLE IF NOT EXISTS `jaiho_action` (
  `id` int(11) NOT NULL,
  `postid` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `userid` int(11) NOT NULL,
  `action_type` varchar(20) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jaiho_comment`
--

CREATE TABLE IF NOT EXISTS `jaiho_comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `postid` int(11) NOT NULL,
  `comment` text NOT NULL,
  `userid` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `jaiho_follow`
--

CREATE TABLE IF NOT EXISTS `jaiho_follow` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `follow_id` int(11) NOT NULL,
  `follower_id` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `jaiho_user`
--

CREATE TABLE IF NOT EXISTS `jaiho_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(40) NOT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `dob` date NOT NULL,
  `image` text,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `jaiho_user`
--

INSERT INTO `jaiho_user` (`id`, `username`, `password`, `name`, `email`, `phone`, `dob`, `image`, `timestamp`) VALUES
(1, 'premhalani', 'premhalani', 'Prem Halani', 'premhalani@gmail.com', '1254390020', '2014-06-17', NULL, '2014-05-01 10:46:10'),
(2, 'pratik', 'pratik', 'Pratik Doshi', 'pratik_doshi@outlook.com', '214865418', '1994-04-22', NULL, '2014-05-01 10:48:39'),
(3, 'vinit', 'vinit', 'Vinit Jasoliya', 'vinitjasoliya@gmail', '274882618', '1994-05-20', NULL, '2014-05-01 10:49:58'),
(4, 'mitchell', 'mit', 'Mitchell Dsilva', 'mitchell@gmail.com', '2143255', '2014-05-20', NULL, '2014-05-01 10:56:40');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userID` text NOT NULL,
  `description` text NOT NULL,
  `date` date NOT NULL,
  `type` varchar(10) NOT NULL,
  `is_deleted` varchar(10) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `name` varchar(20000) NOT NULL,
  `im_in` bigint(254) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `userID`, `description`, `date`, `type`, `is_deleted`, `timestamp`, `name`, `im_in`) VALUES
(1, 'premhalani', 'Testing Posts', '0000-00-00', 'Action', '', '2014-05-01 10:47:33', 'Prem Halani', 0),
(2, 'premhalani', 'Testing2', '0000-00-00', 'Concern', '', '2014-05-01 10:47:37', 'Prem Halani', 0),
(3, 'pratik', 'Im also Testing', '0000-00-00', 'Share', '', '2014-05-01 10:48:58', 'Pratik Doshi', 0),
(4, 'vinit', 'And Dont Forget Me', '0000-00-00', 'Concern', '', '2014-05-01 10:50:18', 'Vinit Jasoliya', 0),
(6, 'vinit', 'This website is awesome :p', '0000-00-00', 'Action', '', '2014-05-01 10:51:19', 'Vinit Jasoliya', 0),
(7, 'vinit', 'Hello World!', '0000-00-00', 'Action', '', '2014-05-01 10:52:35', 'Vinit Jasoliya', 0),
(8, 'premhalani', 'another test', '0000-00-00', 'Action', '', '2014-05-01 10:53:05', 'Prem Halani', 0),
(9, 'mitchell', 'good project', '0000-00-00', 'Concern', '', '2014-05-01 10:57:34', 'Mitchell Dsilva', 0),
(10, 'mitchell', 'great work!', '0000-00-00', 'Action', '', '2014-05-01 11:04:36', 'Mitchell Dsilva', 0);

-- --------------------------------------------------------

--
-- Table structure for table `profile_pic`
--

CREATE TABLE IF NOT EXISTS `profile_pic` (
  `username` varchar(1000) NOT NULL,
  `image` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profile_pic`
--

INSERT INTO `profile_pic` (`username`, `image`) VALUES
('premhalani', ''),
('pratik', ''),
('vinit', ''),
('mitchell', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
