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
-- Struktur dari tabel `tbl_op_jobdesc_kpi`
--

CREATE TABLE IF NOT EXISTS `tbl_op_jobdesc_kpi` (
  `no` int(11) NOT NULL AUTO_INCREMENT,
  `am` varchar(255) NOT NULL,
  `fungsi_posisi` varchar(255) NOT NULL,
  `jobdesc` text NOT NULL,
  `kpi` text NOT NULL,
  `parent` varchar(3) NOT NULL,
  PRIMARY KEY (`no`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data untuk tabel `tbl_op_jobdesc_kpi`
--

INSERT INTO `tbl_op_jobdesc_kpi` (`no`, `am`, `fungsi_posisi`, `jobdesc`, `kpi`, `parent`) VALUES
(1, '2', 'BBB', 'image/op_jobdesc/indihome rquirement.txt', 'image/op_kpi/sticky notes.txt', '0'),
(2, '1', 'asdasd', '', '', '1'),
(3, '2', 'aaaa', '', '', '00'),
(6, '1', 'xcxca', '', '', '2'),
(9, '1', 'nnn', '', '', '2'),
(10, '1', 'xxx', '', '', '2'),
(13, '1', 'mmmm', '', '', '9');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
