-- phpMyAdmin SQL Dump
-- version 3.4.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 31, 2012 at 07:40 AM
-- Server version: 5.5.25
-- PHP Version: 5.3.15

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mock`
--

-- --------------------------------------------------------

--
-- Table structure for table `mock_batches`
--

CREATE TABLE IF NOT EXISTS `mock_batches` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(20) NOT NULL,
  `location` varchar(50) NOT NULL,
  `start_date` int(11) NOT NULL,
  `end_date` int(11) NOT NULL,
  `comments` text NOT NULL,
  `org_id` int(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `mock_batches`
--

INSERT INTO `mock_batches` (`id`, `code`, `location`, `start_date`, `end_date`, `comments`, `org_id`) VALUES
(3, 'B1237', 'Andheri', 1326911400, 1327948200, 'my comments', 567),
(4, 'B34569', 'Churchgate', 1341081000, 1342636200, 'my brand new comment', 567),
(5, 'B69<br/>', 'Thane East', 1341167400, 1343413800, 'This is chemistry thane branch...." and 1=1', 567),
(6, 'A5467', 'Navi Mumbai', 1341945000, 1342895400, 'this is navi mumbai branch...create batch working', 567);

-- --------------------------------------------------------

--
-- Table structure for table `mock_moderators`
--

CREATE TABLE IF NOT EXISTS `mock_moderators` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `org_id` int(11) NOT NULL,
  `user_role` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `mock_moderators`
--

INSERT INTO `mock_moderators` (`id`, `email`, `password`, `full_name`, `org_id`, `user_role`) VALUES
(1, 'admin@gmail.com', '1217efb236089359a0e9c7fbf186f6df', 'Rahul T', 0, 1),
(2, 'mod@gmail.com', '1217efb236089359a0e9c7fbf186f6df', 'Moderator M', 567, 2);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
