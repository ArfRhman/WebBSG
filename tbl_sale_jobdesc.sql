-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Waktu pembuatan: 12. April 2016 jam 14:07
-- Versi Server: 5.5.16
-- Versi PHP: 5.3.8

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
-- Struktur dari tabel `tbl_sale_jobdesc`
--

CREATE TABLE IF NOT EXISTS `tbl_sale_jobdesc` (
  `no` int(11) NOT NULL AUTO_INCREMENT,
  `am` varchar(255) NOT NULL,
  `fungsi` varchar(255) NOT NULL,
  `jobdesc` text NOT NULL,
  `kpi` text NOT NULL,
  `parent` varchar(3) NOT NULL,
  PRIMARY KEY (`no`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data untuk tabel `tbl_sale_jobdesc`
--

INSERT INTO `tbl_sale_jobdesc` (`no`, `am`, `fungsi`, `jobdesc`, `kpi`, `parent`) VALUES
(6, '1', 'AAA', 'image/s_jobdesc/Software Architecture.jpg', 'image/s_jobdesc/usecase diagram 1.0.jpg', '0');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
