-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 16, 2016 at 09:11 AM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_dbs`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_op_pl_header`
--

CREATE TABLE IF NOT EXISTS `tbl_op_pl_header` (
  `no` int(11) NOT NULL AUTO_INCREMENT,
  `created_date` varchar(255) NOT NULL,
  `presented_date` varchar(255) NOT NULL,
  `shared_date` varchar(255) NOT NULL,
  `effective_from` varchar(255) NOT NULL,
  `effective_fill` varchar(255) NOT NULL,
  `usd` int(12) NOT NULL,
  `sgd` int(12) NOT NULL,
  `eur` int(12) NOT NULL,
  `price_term` varchar(255) NOT NULL,
  `delivery_term` varchar(255) NOT NULL,
  `validity_term` varchar(255) NOT NULL,
  `other_term` varchar(255) NOT NULL,
  PRIMARY KEY (`no`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_op_pl_header`
--

INSERT INTO `tbl_op_pl_header` (`no`, `created_date`, `presented_date`, `shared_date`, `effective_from`, `effective_fill`, `usd`, `sgd`, `eur`, `price_term`, `delivery_term`, `validity_term`, `other_term`) VALUES
(1, '01 Apr 2016', '02 Apr 2016', '03 Apr 2016', '04 Apr 2016', '05 Apr 2016', 1, 2, 3, '1', '2', '3', '4');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
