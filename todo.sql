-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 11, 2015 at 10:47 PM
-- Server version: 5.1.37
-- PHP Version: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `todo`
--

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE IF NOT EXISTS `task` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `title` varchar(250) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=45 ;

--
-- Dumping data for table `task`
--

INSERT INTO `task` (`id`, `title`, `status`, `timestamp`) VALUES
(3, 'okehaaaa', 1, '2015-07-11 16:35:17'),
(4, 'mantap jg', 1, '2015-07-11 16:45:06');
