-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 16, 2016 at 09:13 AM
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
-- Table structure for table `tbl_op_pl_tabel`
--

CREATE TABLE IF NOT EXISTS `tbl_op_pl_tabel` (
  `no` int(12) NOT NULL AUTO_INCREMENT,
  `item_id` varchar(255) NOT NULL,
  `division` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `mou` varchar(255) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `source` varchar(255) NOT NULL,
  `incoterm` varchar(255) NOT NULL,
  `currency` varchar(255) NOT NULL,
  `purchase_price` int(12) NOT NULL,
  `percen_ftc` int(12) NOT NULL,
  `ftc` int(12) NOT NULL,
  `ddp_price` int(12) NOT NULL,
  `ddp_idr` int(12) NOT NULL,
  `percen_crosscomp` varchar(255) NOT NULL,
  `crosscomp_price` int(12) NOT NULL,
  `percen_price_list` int(12) NOT NULL,
  `price_list` int(12) NOT NULL,
  `percen_cash` int(12) NOT NULL,
  `cash` int(12) NOT NULL,
  `percen_skbdn` int(12) NOT NULL,
  `skbdn_price` int(12) NOT NULL,
  `percen_credit_1_month` int(12) NOT NULL,
  `credit_1_month` int(12) NOT NULL,
  `percen_credit_2_month` int(12) NOT NULL,
  `credit_2_month` int(12) NOT NULL,
  `percen_credit_3_month` int(12) NOT NULL,
  `credit_3_month` int(12) NOT NULL,
  `percen_credit_4_month` int(12) NOT NULL,
  `credit_4_month` int(12) NOT NULL,
  `special_condition` varchar(255) NOT NULL,
  `khs_price` int(12) NOT NULL,
  `percen_pricelist_to_khs` int(12) NOT NULL,
  `percen_nett_cash_to_khs` int(12) NOT NULL,
  `competitor_1` int(12) NOT NULL,
  `competitor_1_name` varchar(255) NOT NULL,
  `competitor_2` int(12) NOT NULL,
  `competitor_2_name` varchar(255) NOT NULL,
  `competitor_3` int(12) NOT NULL,
  `competitor_3_name` varchar(255) NOT NULL,
  PRIMARY KEY (`no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
