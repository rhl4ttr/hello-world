-- phpMyAdmin SQL Dump
-- version 2.6.4-pl3
-- http://www.phpmyadmin.net
-- 
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 28, 2012 at 05:54 PM
-- Server version: 5.0.50
-- PHP Version: 5.2.6
-- 
-- Database: `mock`
-- 

-- --------------------------------------------------------

-- 
-- Table structure for table `mock_batches`
-- 

CREATE TABLE `mock_batches` (
  `id` int(11) NOT NULL auto_increment,
  `code` varchar(20) NOT NULL,
  `location` varchar(50) NOT NULL,
  `start_date` int(11) NOT NULL,
  `end_date` int(11) NOT NULL,
  `comments` text NOT NULL,
  `institute_id` int(20) NOT NULL,
  `institute_code` varchar(20) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- 
-- Dumping data for table `mock_batches`
-- 

INSERT INTO `mock_batches` VALUES (3, 'B123', 'Andheri', 123, 233, 'my comments', 567, 'abc');

-- --------------------------------------------------------

-- 
-- Table structure for table `mock_moderators`
-- 

CREATE TABLE `mock_moderators` (
  `id` int(11) NOT NULL auto_increment,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `org_id` int(11) NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- 
-- Dumping data for table `mock_moderators`
-- 

INSERT INTO `mock_moderators` VALUES (1, 'a@a.com', '73ae1f7dee8aacfed06c33f8285f08bf', 'CHINTAN DOSHI', 1);
