-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 24, 2016 at 09:10 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Table structure for table `tbl_dm_agent`
--

CREATE TABLE IF NOT EXISTS `tbl_dm_agent` (
`id` int(11) NOT NULL,
  `agent_id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `service` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `phone` varchar(50) NOT NULL,
  `fax` varchar(50) NOT NULL,
  `website` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `note` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_dm_agent`
--

INSERT INTO `tbl_dm_agent` (`id`, `agent_id`, `name`, `service`, `address`, `phone`, `fax`, `website`, `email`, `note`) VALUES
(1, '', 'rf', 'ff', 'f', 'f', '', 'f', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dm_agent_subfield`
--

CREATE TABLE IF NOT EXISTS `tbl_dm_agent_subfield` (
`id` int(11) NOT NULL,
  `id_agent` int(11) NOT NULL,
  `pic` varchar(100) NOT NULL,
  `title` varchar(50) NOT NULL,
  `email_pic` varchar(100) NOT NULL,
  `mobile1` varchar(50) NOT NULL,
  `mobile2` varchar(50) NOT NULL,
  `residence` varchar(255) NOT NULL,
  `birthday` varchar(100) NOT NULL,
  `whatsapp` varchar(50) NOT NULL,
  `skype` varchar(50) NOT NULL,
  `bbm` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dm_brand`
--

CREATE TABLE IF NOT EXISTS `tbl_dm_brand` (
`id` int(11) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `registration` varchar(255) NOT NULL,
  `certificate` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dm_budget`
--

CREATE TABLE IF NOT EXISTS `tbl_dm_budget` (
`id` int(11) NOT NULL,
  `code` varchar(255) NOT NULL,
  `main` varchar(255) NOT NULL,
  `level1` varchar(255) NOT NULL,
  `level2` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_dm_budget`
--

INSERT INTO `tbl_dm_budget` (`id`, `code`, `main`, `level1`, `level2`, `description`) VALUES
(1, '001', 'test', '1', '2', 't');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dm_creditor`
--

CREATE TABLE IF NOT EXISTS `tbl_dm_creditor` (
  `code` varchar(255) NOT NULL,
  `name` text NOT NULL,
  `type` varchar(50) NOT NULL,
  `currency` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `term` varchar(50) NOT NULL,
  `area` varchar(50) NOT NULL,
  `agent` varchar(50) NOT NULL,
  `active` int(10) NOT NULL,
`id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dm_customer`
--

CREATE TABLE IF NOT EXISTS `tbl_dm_customer` (
`id` int(11) NOT NULL,
  `customer_id` varchar(100) NOT NULL,
  `manager` varchar(100) NOT NULL,
  `grade` varchar(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `postal` varchar(50) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `fax` varchar(100) NOT NULL,
  `website` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=357 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_dm_customer`
--

INSERT INTO `tbl_dm_customer` (`id`, `customer_id`, `manager`, `grade`, `name`, `address`, `postal`, `phone`, `fax`, `website`, `email`) VALUES
(4, '13OP0001', '', 'A', '3OPP CHAYAH TELKOM, PT', 'Gd. Sarinah Suite 1215 Lt. 12, Jl. MH. Thamrin - No. 11 RT.- RW.- Kel. Gondangdia Kec. Menteng Jakarta Pusat, DKI Jakarta', '', '', '', '', ''),
(5, '1AAT0001', '', 'A', 'ARYAGUNA ACCES TEKNOLOGIES, PT ', 'Jl. Soekarno Hatta 766 Bandung Ruko Graha Panyileukan Asri No. 2 Bandung', '', '022-7813300', '', '', ''),
(6, '1ABH0001', '', 'A', 'ABHIMATA CITRA ABADI, PT', 'Jl. Gunung Sahari Raya No. 60-63 Blok E8 Gunung Sahari Selatan Kemayoran , Jakarta Pusat', '', '021-5793 0304', '', '', ''),
(7, '1ABR0001', '', 'A', 'AKBAR, Bpk', '', '', '', '', '', ''),
(8, '1ADI0001', '', 'A', 'ADITYA MITRA UTAMA, PT', 'Jl. Tanjung Duren Barat Raya No. 8 Grogol Petamburan Jakarta Barat', '', '021-530 9898', '', '', ''),
(9, '1ADP0001', '', 'A', 'ANDIKA PERMANA, Bpk', 'Meruya Utara Rt. 003/04 No. 19 Jl. Kartika Kec. Kembangan', '', '', '', '', ''),
(10, '1ADR0001', '', 'A', 'ADRIAN, BPK', '', '', '082210480917', '', '', ''),
(11, '1ADY0001', '', 'A', 'ADYAWINSA TELECOMUNICATION & ELECTRICAL, PT', 'Jl. Pegangsaan Dua KM 2 No. 64 RT. 005/002 Pegangsaan Dua, Kelapan Gading Jakarta Utara', '', '021-893 6001', '', '', ''),
(12, '1AFR0001', '', 'A', 'AFRIK KURNIA FIRMANSYAH, BPK', 'Jl. Jatisari Permai VII Blok J-27 RT 05 RW 08 Pepelegi Waru Sidoarjo - Jawa Timur', '', '081939113881', '', '', ''),
(13, '1AGU0001', '', 'A', 'AGUNG, Bpk', '', '', '081391456411', '', '', ''),
(14, '1AKB0001', '', 'A', 'AKBAR SAPUTRA UTAMA, PT', '', '', '0811460080', '', '', ''),
(15, '1AKU0001', '', 'A', 'AKURASI KUATMEGA INDONESIA, PT', 'Setrasari Mall Blok C-3 No.101 Bandung 40163', '', '022-2006316', '', '', ''),
(16, '1ALI0001', '', 'A', 'ALITA PRAYA MITRA, PT.', 'Gedung Alita Jl. TB Simatupang Kav. 12 Jakarta Selatan', '', '021-2940 6750', '', '', ''),
(17, '1ALK0001', '', 'A', 'ALIK, BPK', 'Jakarta', '', '0821 1491 7271', '', '', ''),
(18, '1ALT0001', '', 'A', 'ALTELCOM, CV', 'Jl. Jakarta No. 20-22 Ruko 22 Bandung', '', '62-22-7219927', '', '', ''),
(19, '1AMA0001', '', 'A', 'AMARATIRTA NUSANTARA, PT.', 'Komplek Vila Nusa Indah 3 Blok KF 1 No. 4 Bojong Kulur, Gunung Putri, Bogor 16969', '', '021-6888 5172', '', '', ''),
(20, '1AMC0001', '', 'A', 'AMRON CITINET, PT', 'Kuningan Barat No. 08 Kuningan Barat, Mampang Prapatan Jakarta Selatan', '', '021-7995148', '', '', ''),
(21, '1ANG0001', '', 'A', 'ANGIE, Bpk', '', '', '082124677295', '', '', ''),
(22, '1ANI0001', '', 'A', 'ANIEZA, CV', 'Jl. Cikunir Barat GG Bojong Trngah No 51/149B RT 007 RW 012 Cigadung-Cibeunying Kaler', '', '', '', '', ''),
(23, '1ANK0001', '', 'A', 'AKSES NUSA KARYA INFRATEK, PT', 'Jl. Simponi III No. 3 Turangga - Lengkong Bandung - Jawa Barat', '', '022-7322 666', '', '', ''),
(24, '1ANT0001', '', 'A', 'ANTON, BPK', 'Jakarta', '', '', '', '', ''),
(25, '1APL0001', '', 'A', 'APLIKANUSA LINTASARTA, PT', 'Gedung Menara Thamrin Lt. 12 Jl. MH. Thamrin Kav. 3 Jakarta Pusat', '10250', '021-2302345', '', '', ''),
(26, '1APR0001', '', 'A', 'APRILLIA PROFESIONAL TEKNOLOGI, PT.', 'Jl. Terusan Ciliwung No. 5 RT.001 RW.011 Cihaur Geulis, Cibeunying Kaler Kota Bandung Jawa Barat', '', '022-7234 251', '', '', ''),
(27, '1ARG0001', '', 'A', 'ARGATAMA, PT - PIUTANG LAIN', '', '', '', '', '', ''),
(28, '1ARI0001', '', 'A', 'ARI, BP', 'Jakarta', '', '', '', '', ''),
(29, '1ARI0002', '', 'A', 'ARIF PURNOMO, BPK', 'Kampung Baru Kavling No. 19 RT. 05 RW. 17 Pancoran Mas Depok', '', '0812 9948 992', '', '', ''),
(30, '1ARK0001', '', 'A', 'ARKON GLOBAL INDONESIA, PT', 'Gedung Office 8, Level 18-A, SCBD Jl. Jend. Sudirman Kav. 52-53 Senayan - Kebayoran Lama Jakarta Selatan ', '12190', '', '', '', ''),
(31, '1ASA0001', '', 'A', 'ARGO SUKSES ABADI, PT.', 'Ruko Suncity Square Blok D No. 21 Jl. M. Hasibuan, Bekasi Selatan, Kota Bekasi Jawa Barat', '', '021-8886 9007', '', '', ''),
(32, '1ASD0001', '', 'A', 'ASEP DAYAT, BPK', '', '', '', '', '', ''),
(33, '1ATO0001', '', 'A', 'ANTO ARINONG, BPK', '', '', '0411-451418', '', '', ''),
(34, '1ATR0001', '', 'A', 'ATRIA, BPK', 'Jakarta', '', '', '', '', ''),
(35, '1AUT0001', '', 'A', 'ANDALAN UTAMA TELECOM, PT', 'Patra Office Tower 17th Floor, Room 1703 Jl. Gatot Subroto Kav. 32 - 34 Jakarta', '12950', '', '', '', ''),
(36, '1BAJ0001', '', 'A', 'BAJA TAMPUBOLON, BPK', 'Medan', '', '', '', '', ''),
(37, '1BAM0001', '', 'A', 'BAMBANG TRISTIANTO, BPK ', '', '', '', '', '', ''),
(38, '1BAN0001', '', 'A', 'BANGUN BERSAMA MOSPINDO, PT', 'Komp. Permata Hijau Blok A 68 RT 003 RW 015 Jelegong Rancaekek Kabupaten Bandung', '', '022-7796703', '', '', ''),
(39, '1BAP0001', '', 'A', 'BAPAK KONANG PRIHANDOKO ', '', '', '', '', '', ''),
(40, '1BAT0001', '', 'A', 'BANGTELINDO, PT', 'Jl. Mangga No. 4 Bandung Wetan Bandung - Jawa Barat', '', '022-7216 282', '', '', ''),
(41, '1BAY0001', '', 'A', 'BAYU PERDANA MITRATEL, PT', 'Jl. Garuda No. 58 RT. 004 RW. 005 Tangkerang Tengah Marpoya Damai', '', '0761-856 142', '', '', ''),
(42, '1BBG0001', '', 'A', 'BAMBANG, Bpk', 'Tebet', '', '', '', '', ''),
(43, '1BEN0001', '', 'A', 'BENTALA SAKTI UTAMA', '', '', '', '', '', ''),
(44, '1BHA0001', '', 'A', 'BHAGAWADGITA SWADAYA PRATAMA, PT', 'Jl. Raya Pasar Minggu No. 09 RT. 002 RW. 002 Pancoran Jakarta Selatan DKI Jakarta', '', '0812 1010 3468', '', '', ''),
(45, '1BIL0001', '', 'A', 'BILL MAVRIDIS, BPK', '', '', '', '', '', ''),
(46, '1BIN0001', '', 'A', 'BINAMITRA HANDAYA PERKASA, PT', '', '', '021-4534512', '', '', ''),
(47, '1BIS0001', '', 'A', 'BISMA PUTRA PERSADA, PT ', '', '', '022 - 88886805', '', '', ''),
(48, '1BNI0001', '', 'A', 'BENTALA INVESTAMA, PT', '', '', '', '', '', ''),
(49, '1BPS0001', '', 'A', 'SYARIF H SOEMANTRI, BPK', 'Jl. DR. Saharjo No. 96-G Jakarta', '12960', '', '', '', ''),
(50, '1BSA0001', '', 'A', 'BENTALA SAKTI GLOBALINDO, PT', '', '', '021-86340040', '', '', ''),
(51, '1BSE0001', '', 'A', 'BENTALA SELARAS GLOBALINDO, PT ', 'Jl. Ciputat Raya No. 100A Rt.005 Rw. 001 Kebayoran Lama Jakarta Selatan DKI Jakarta Raya', '', '', '', '', ''),
(52, '1BTB0001', '', 'A', 'BERKAH TEKNIK BERSAMA, PT', 'Jl. Taman Harapan No. 3 Rt 002 Rw 003 Cawang Kramat Jati Jakarta Timur ', '', '62-21-80887788', '', '', ''),
(53, '1BTS0001', '', 'A', 'BALI TOWERINDO SENTRA, PT', '', '', '', '', '', ''),
(54, '1CAH0001', '', 'A', 'CAHAYA ALAM, CV', 'Jl. Panasn V / F-31 RT 003 RW 013 Pondok Babadan Baru Ungaran Barat Kab Semarang', '', '', '', '', ''),
(55, '1CAL0001', '', 'A', 'CALTECHNOLOGY INDONESIA, PT ', '', '', '', '', '', ''),
(56, '1CAN0001', '', 'A', 'CENTRAL ANUGRAH NETWORK, CV.', 'Jl. Musholah No. 44 RT. 001 RW. 010 Jatirahayu Pondok Melati, Kota Bekasi - Jawa Barat', '', '021-84993302', '', '', ''),
(57, '1CAT0001', '', 'A', 'CATUR SEKAWAN ADIPRAYA, PT.', 'Jl. IR. H Juanda EE /75 RT. 004 RW. 008 Cirendeu - Ciputat Timur Tangerang Selatan', '', '', '', '', ''),
(58, '1CCC0001', '', 'A', 'CAHAYA CERIA CEMERLANG, PT', 'Jl. Raya Kebayoran Lama No. 19 Jakarta Selatan', '', '62-21-5493561, 5494239', '', '', ''),
(59, '1CCP0002', '', 'A', 'CITRA CIANJUR PRIMA, PT', '', '', '0263-270555', '', '', ''),
(60, '1CEN0001', '', 'A', 'CENTRALINDO PANCA SAKTI, PT', 'Komp. Duta Merlin Blok. C No. 49 - 50 Jl. Gajah Mada 3-5 Petojo Utara - Gambir', '', '021-6338778', '', '', ''),
(61, '1CFT0001', '', 'A', 'CURAH FAJAR TIMUR', '62-21-58902588', '', '', '', '', ''),
(62, '1CHA0001', '', 'A', 'CHANDRA RAHARJA, BPK', 'Medan', '', '', '', '', ''),
(63, '1CIN0001', '', 'A', 'CINECO TECHNOLOGY,PT', 'Jl. Danau Laut Tawat Blok A No. 68 Kel. Bendungan Hilir Jakarta Pusat', '10210', '', '', '', ''),
(64, '1CIP0001', '', 'A', 'CIPTA DAYA SELARAS, PT', 'Jl. Cimerak Selatan No. 18 RT. 006 RW. 016  Duren Sawit Jakarta Timur', '', '', '', '', ''),
(65, '1CIT0001', '', 'A', 'CITRA ADHI PRATAMA, PT', 'Jl. Bongas V Blok E-8 No. 12 Komp. Jatiwaringin Asri, Jatiwaringin, Pondokgede, Kotamadya Bekasi ', '', '(021) 86614048', '', '', ''),
(66, '1CKK0001', '', 'A', 'CIPTA KARYA KOMPUTER, PT', 'Jl. H. Marzuki No. 45 B RT. 011 RW. 003 Kebun Jeruk Jakarta Barat', '', '021- 52900252', '', '', ''),
(67, '1CKP0001', '', 'A', 'CITRA KOMUNIKASI PUTRA, PT.', 'Jl. Sapta Prasetya Utara Raya No. 2B Semarang', '', '024-7043 4372', '', '', ''),
(68, '1COR0001', '', 'A', 'COREA SYSTEM INDONESIA, PT', 'Gd. Menara Global Lt. 21 Suite A Jl. Jend. Gatot Subroto Kav.27 Kuningan Timur - Setiabudi', '', '(021) 52880131', '', '', ''),
(69, '1CPM0001', '', 'A', 'CIPTA PRIMA MANDIRI', '', '', '021-47863520', '', '', ''),
(70, '1CSK0001', '', 'A', 'CITRA SWAKARSA, PT.', 'Jl. Sukagalih No 1 RT 003 RW 010 Lengkongsari - Tawang Kota Tasikmalaya', '', '0265-313 506', '', '', ''),
(71, '1CSU0001', '', 'A', 'CAHAYA SAKTI UTAMA, PT', 'Perumahan Fanindo Blok E No. 20 Tanjung Ucang Batu Aji, Batam', '', '081277008088', '', '', ''),
(72, '1CTM0001', '', 'A', 'CITRA TELINTI MULIA, PT', 'Jl. Cipinang Muara No. 37 B RT 001/RW 003 Cipinang Muara - Jatinegara Jakarta Timur', '13420', '021-8591 4888', '', '', ''),
(73, '1CWL0001', '', 'A', 'COMMONWEALTH LIFE ', '', '', '', '', '', ''),
(74, '1DAR0001', '', 'A', 'DARIS, BPK', '', '', '', '', '', ''),
(75, '1DAT0001', '', 'A', 'DATAKOM STRATA TIGA, PT', '', '', '021-77831954', '', '', ''),
(76, '1DAU0001', '', 'A', 'AHMAD DAUD, BPK', '', '', '085695835637', '', '', ''),
(77, '1DCM0001', '', 'A', 'DADALI CITRA MANDIRI, PT', 'Jl. Karawitan No. 88 Bandung', '', '62-22-7323423', '', '', ''),
(78, '1DDN0001', '', 'A', 'DENDIN, Bpk', '', '', '', '', '', ''),
(79, '1DED0001', '', 'A', 'DEDI, Bpk', '', '', '', '', '', ''),
(80, '1DEN0001', '', 'A', 'DENBE ANUGERAH SOLUSINDO, PT', 'Jl. Danau Toba No. 104 Bendungan Hilir Tanah Abang, Jakarta Pusat', '10210', '021- 570 1505', '', '', ''),
(81, '1DHA0001', '', 'A', 'DHARMA KUMALA UTAMA,PT', 'PAHLAWAN 69 TEMBOK DUKUH BUBUTAN SURABAYA', '', '', '', '', ''),
(82, '1DIA0001', '', 'A', 'DIAN KARYA, PT.', 'Jl. Suradinaya Selatan Pekiringan Kota Madya Cirebon', '45131', '021-7883 4475', '', '', ''),
(83, '1DIC0001', '', 'A', 'DICKY, BPK', '', '', '', '', '', ''),
(84, '1DIN0001', '', 'A', 'DINAMIKA MULIA, PT.', 'Gd. Adhi Graha Lt.16 Suite 1604 Jl. Jend Gatot Subroto Kav. 56, Setiabudi Jakarta Selatan, DKI Jakarta', '12950', '021-798 3409', '', '', ''),
(85, '1DIR0001', '', 'A', 'DIRGA MANDIRI BROTHERS, PT', 'Jl. Antara No. 10, 12, 14 Pasar Baru Jakarta Pusat', '10710', '021-3483 3203', '', '', ''),
(86, '1DIT0001', '', 'A', 'DITECH CIPTAYASA, CV', 'Jl. Mirah Delima V/273 Rawalumbu, Bekasi', '', '021-82402289', '', '', ''),
(87, '1DPI0001', '', 'A', 'DWI PILAR INFRATAMA, PT.', 'Ged. Menara Hijau Lt. 11 MT. Haryono Kav. 3 Kel. Cikoko Kec. Pancoran Jakarta Selatan, DKI Jakarta Raya', '12770', '021-7919 9588', '', '', ''),
(88, '1DTM0001', '', 'A', 'DWITUNGGAL MANDIRI, CV', 'Jl. Karonsih Timur Raya II No. 30 RT. 001 RW. 002 Ngaliyan - Ngaliyan Semarang', '', '021-7985938   ', '', '', ''),
(89, '1DTS0001', '', 'A', 'DWI TRI SEKAWAN, CV', 'Jl. Kalimaya Ke. Kapuk Kec. Cengkareng - Jakarta Barat', '', '', '', '', ''),
(90, '1DUA0001', '', 'A', 'DUA BINTANG PANEL, PT', 'Jl. Kemang Anyelir 2 Blok AB No. 45A RT. 005 RW. 035 Kel. Bojong Rawa Lumbu Kec. Rawa Lumbu Kota Bekasi Jawa Barat', '', '021-8217 709', '', '', ''),
(91, '1DUR0001-DN', '', 'A', 'DURA - LINE INDIA Pvt. Ltd ', '', '', '', '', '', ''),
(92, '1DUT0001', '', 'A', 'DUTA VISUAL NUSANTARA TIVI TUJUH, PT', 'Jl. Kapten Piere Tendean Kav. 12 - 14A Mampang Prapatan, Jakarta Selatan', '', '021-7917 7000', '', '', ''),
(93, '1DWI0001', '', 'A', 'DWIYONO HARIYADI, Bpk', '', '', '', '', '', ''),
(94, '1EAP0001', '', 'A', 'EMTELLE ASIA PACIFIC (M) Sdn Bhd', '', '', '+603 7845 4406', '', '', ''),
(95, '1EBJ0001', '', 'A', 'ERA BANGUN JAYA, PT', 'Jl. T Amir Hamzah No. 50  Sei Agul Medan Barat Medan', '20117', '021-85918056', '', '', ''),
(96, '1EDI0001', '', 'A', 'EDI MARWAN, BPK', '', '', '', '', '', ''),
(97, '1EDS0001', '', 'A', 'ERA DATA SYSTEM, PT', 'Epicentrum Walk South 529A Jl. HR Rasuna Said Karet Kuningan - Setiabudi, Jakarta Selatan', '', '', '', '', ''),
(98, '1EKS0001', '', 'A', 'EKSPANINDO PRIMA MULTIMEDIA, PT.', 'Ruko Paskal Hyper Square B-41 No. 25-27 Kebun Jeruk Andir Kota Bandung Jawa Barat', '', '022-2000190', '', '', ''),
(99, '1EMS0001', '', 'A', 'EZRA MANUNGGAL SOLUSI, PT', 'Jl. Menteng Indah VI G/D6 No 5 Medan Tenggara Denai Medan', '', '', '', '', ''),
(100, '1ERA0001', '', 'A', 'ERAKOMP INFONUSA, PT.', 'Jl. Alaydrus No. 70-C Petojo Utara, Gambir , Jakarta Pusat', '', '021-6349 318', '', '', ''),
(101, '1ERI0001', '', 'A', 'ERICK,BPK', 'Jl. Gunung Anyar Kidur 2A/5 Surabaya', '', '031-871 0035', '', '', ''),
(102, '1ERL0001', '', 'A', 'ERLIN, BPK', '', '', '', '', '', ''),
(103, '1ERW0001', '', 'A', 'ERWIN, BPK', '', '', '', '', '', ''),
(104, '1EUK0001', '', 'A', 'EMTELLE UK Ltd', '', '', '', '', '', ''),
(105, '1FAC0001', '', 'A', 'FACHRUZY, BPK', 'Jl. Condet Raya No. 17 Balekembang - Jaktim', '', '021-44454095', '', '', ''),
(106, '1FAJ0001', '', 'A', 'FAJAR, BPK', 'Palembang', '', '0811 7853 333', '', '', ''),
(107, '1FAM0001', '', 'A', 'FAJAR MITRA KRIDA ABADI, PT', 'Jl. H. Toran No. 145 RT 01 RW 01 Rengas - Ciputat, Tangerang', '', '021-7375523', '', '', ''),
(108, '1FAN0001', '', 'A', 'FANNY ERLITA', 'Jl. Karya Bhakti VI. No.3/B RT 001 RW 001 Cigugur Tengah Cimahi Tengah, Cimahi', '', '0812 1255 4404', '', '', ''),
(109, '1FER0001', '', 'A', 'FERRY IRAWAN', 'Jl. Kampung Melayu Besar  Komplek Telkom RT.10/01 No. 6 Jakarta Selatan', '', '', '', '', ''),
(110, '1FIB0001', '', 'A', 'FIBER HOME TECHNOLOGIES INDONESIA, PT', 'APL Tower Lt. 30 Suite 7 Jl. Letjend S Parman Kav.28, Tanjung Duren Selatan, Grogol Petamburan Jakarta Barat DKI Jakarta', '11470', '', '', '', ''),
(111, '1FJM0001', '', 'A', 'FANAH JAYA MAINDO, PT.', 'Kawasan Industri Delta Silicon 3 Jl. Pinang Blok F.16 No. 011A/B Cikarang Pusat Bekasi Jawa Barat', '', '021-8990 8556', '', '', ''),
(112, '1FOR0001', '', 'A', 'FORTUNA TEKNOLOGI INDONESIA, PT', 'Ruko Cordoba Green Lake City Blok D No. 21 RT. 0 RW.0, Kel. Petir, Kec. Cipondoh, Tangerang Banten', '', '021-29018060', '', '', ''),
(113, '1FTT0001-DN', '', 'A', 'FTTH COUNCIL ASIA PACIFIC', '', '', '+880 17 403 9393', '', '', ''),
(114, '1FUJ0001', '', 'A', 'FUJIKURA - JAYA JO', 'Menara 8 Office  8 Building Lt. 19 Unit J SCBD Jl. Jend. Sudirman Kav. 52-53 Jakarta Selatan', '12190', '021-7883 8029', '', '', ''),
(115, '1GAD0001', '', 'A', 'GADING BHAKTI UTAMA, PT', 'Ko. Eastrn Hills Blok J No. 13 RT. 006 RW. 003 Kel. Cipadung Kec. Cibiru Bandung Jawa Barat', '', '022-732 2017', '', '', ''),
(116, '1GES0001', '', 'A', 'GESIKA MULTI ABADI,PT', 'BASOKA RAYA NO 14 RT 001/006, JOGLO, KEMBANGAN, JAKARTA BARAT', '', '', '', '', ''),
(117, '1GIG0001', '', 'A', 'GIGA DATACOM, PT', 'Jl. Joglo Baru Rt. 005/006 Joglo - Kembangan Jakarta Barat', '11640', '', '', '', ''),
(118, '1GIS0001', '', 'A', 'GISINDO INTI SOLUSI, PT.', 'Jl. Terusan Buah Batu No. 42 Batununggal, Bandung Kidul Kota Bandung - Jawa Barat', '40266', '022-7512 695', '', '', ''),
(119, '1GLO0001', '', 'A', 'GLOBAL MULTIPOWER INDONESIA, PT.', 'Jl. Tengku Bey No. 18A Simpang Tiga - Pekanbaru', '', '0761-7051 898', '', '', ''),
(120, '1GON0001', '', 'A', 'GONDO, BPK', '', '', '081383752196', '', '', ''),
(121, '1GRA0001', '', 'A', 'GRAHA KABELINDO, PT.', 'Jl. Tomang Raya No. 2 RT.001 RW.001 Kel. Jatipulo Kec. Palmerah Jakarta Barat, DKI Jakarta Raya', '11430', '', '', '', ''),
(122, '1GRA0002', '', 'A', 'GRAMASELINDO UTAMA, PT', 'Jl. Utan Kayu Raya No.1 RT.011 RW.005 Utan Kayu Utara Matraman Jakarta Timur DKI Jakarta', '', '021-2982 1601 / 02 / 03', '', '', ''),
(123, '1GS10001', '', 'A', 'GRAHA SEJAHTERA INFOKOMUNIKASI, PT', 'One Stop Sukses Mall Mobil Jl. TB. Simatupang Kav. 1 S RT 008 RW. 003 Cilandak Timur - Pasar Minggu Jakarta Selatan - DKI Jakarta', '', '+6221 7919 2229', '', '', ''),
(124, '1GSI0001', '', 'A', 'GAIA SURYA INFRASTRADA, PT', '', '', '(021) 6685880', '', '', ''),
(125, '1GUM0001', '', 'A', 'GUMILANG ARTHA LUMINTU, PT', 'Ruko Citra Gran Blok UR No. 05 Jati Karya Jati Sampurna - Kotamadya Bekasi Jawa Barat ', '', '', '', '', ''),
(126, '1GUN0001', '', 'A', 'GUNUNG ANYAR, CV', '', '', '031-8710035', '', '', ''),
(127, '1HAR0001', '', 'A', 'HARRITZ ALIYA, PT.', 'Gd. Nariba Plaza Jl. Mampang Prapatan Raya No. 39 Mampang Prapatan / Jakarta Selatan', '', '021-8297 285', '', '', ''),
(128, '1HAS0001', '', 'A', 'HASTA, BPK', '', '', '021-6311930', '', '', ''),
(129, '1HCI0001', '', 'A', 'HUTCHISON 3 INDONESIA, PT', '', '', '', '', '', ''),
(130, '1HEN0001', '', 'A', 'HENDRA, BPK', 'Jl. Cipulir V RT. 007/RW. 008 No. 4 Kebayoran Lama - Jakarta Selatan', '', '0815 3600 1791', '', '', ''),
(131, '1HES0001', '', 'A', 'HESTI AVIANTIE, IBU', 'Jl. Terusan Buah Batu No. 38-42 Bandung', '', '022-753 1247', '', '', ''),
(132, '1HIL0001', '', 'A', 'HILMI, BPK', '', '', '', '', '', ''),
(133, '1HPT0001', '', 'A', 'HASIAN PRIMA TELINDO, PT', 'Jl. Bina Marga No. 150 Rt 006 Rw 00 Cipayung - Cipayung Jakarta Timur', '', '62-31-84306775', '', '', ''),
(134, '1HRN0001', '', 'A', 'HARUN, BPK', 'Jakarta', '', '', '', '', ''),
(135, '1HUA0001', '', 'A', 'HUAWEI, PT', '', '', '', '', '', ''),
(136, '1IBS0001', '', 'A', 'INFRASTRUKTUR BISNIS SEJAHTERA, PT', 'Jl. Riau No. 23 Gondangdia, Menteng, DKI Jakarta Pusat', '10350', '62-21-3140641', '', '', ''),
(137, '1IDC0001', '', 'A', 'INDOCOM NUSANATARA, CV.', '', '', '0761-7031102', '', '', ''),
(138, '1IDM0001', '', 'A', 'INDO MULYA, PT', 'Taman Pondok Jati Blok AY-5 Geluran, Taman Sidoarjo - Jawa Timur', '', '031-7875686', '', '', ''),
(139, '1IDS0001', '', 'A', 'INDRAJAYA SEJAHTERA, PT', 'Jl. Kali Besar Barat No. 50L Jakarta Barat', '', '021-70609033', '', '', ''),
(140, '1IME0001', '', 'A', 'IMERATA MANDIRI, PT', '', '', '021-54390708', '', '', ''),
(141, '1IMI0001', '', 'A', 'INNOVATE MAS INDONESIA, PT', 'Jl. Panataran No. 9 Proklamasi Kel. Pegangsaan Kec. Menteng Jakarta Pusat DKI Jakarta', '', '021-391 2626', '', '', ''),
(142, '1IMM0001', '', 'A', 'INDOSAT MEGA MEDIA, PT', '', '', '', '', '', ''),
(143, '1IMT0001', '', 'A', 'INTERMEDIA TELEKOMUNIKASI, PT', 'Jl. Dewi Sartika No. 317 Rt. 008 Rw. 004 Cawang, Kramat Jati Jakarta Timur', '', '62-21-80873661', '', '', ''),
(144, '1INA0001', '', 'A', 'INATEL NUSANTARA, PT.', 'Jl. By Pass Ngurah Rai No. 280 D Lingk. Taman Sanur, Denpasar Selatan', '', '0361-283 914', '', '', ''),
(145, '1IND0001', '', 'A', 'INDONUSA TELEMEDIA, PT', 'Gd. Pusyantel Lt. 3 Jl. Prof. Dr. Supomo, SH. No. 139 Tebet Barat, Jakarta Selatan', '', '021-8298800', '', '', ''),
(146, '1INF0001', '', 'A', 'INFRATECH INDONESIA, PT.', 'Gedung Sona Topas Tower Lt. 11 Jl. Jend. Sudirman Kav. 26, Kel. Karet Setiabudi, Jakarta Selatan, DKI Jakarta', '12920', '021-903 7540', '', '', ''),
(147, '1INN0001', '', 'A', 'INNANDA INDAH, PT', 'Jl. Anggrek No. 1 Kelapa Dua Kebun Jeruk, Jakarta Barat', '', '021-5376677', '', '', ''),
(148, '1INS0001', '', 'A', 'INSOFT CO. LTD', '', '', '', '', '', ''),
(149, '1INT0001', '', 'A', 'INDUSTRI TELEKOMUNIKASI INDONESIA (PERSERO), PT', 'Jl. Mohammad Toha No. 77 Bandung', '', '022-5221501 Ext.2350', '', '', ''),
(150, '1IOT0001', '', 'A', 'INDONESIA OPTIC TECHNOLOGY, PT', 'Bizzpark Commercial Estate Blok A5 No.5 Bandung', '40227', '022-8778 4541', '', '', ''),
(151, '1IPM0001', '', 'A', 'INTI PINDAD MITRA SEJATI, PT.', 'Jl. Jend. Gatot Subroto No. 517 RT. 007 RW. 011 Sukapura, Kiaracondong Kota Bandung, Jawa Barat', '', '022-7302 892', '', '', ''),
(152, '1IRM0001', '', 'A', 'INTI RAYA MARGASWADAYA, PT', 'Jl. Sukajaya 2 No. 3 Grogol Petamburan Jakarta Barat', '1146', '021-68013636', '', '', ''),
(153, '1JAC0001', '', 'A', 'JACK SIAHAYA, BPK', '', '', '', '', '', ''),
(154, '1JAK0001', '', 'A', 'JAKTI SWAKARYA UTAMA, PT.', 'Jl. Basuki Rahmat No. 8 D RT.002 RW.002 Kel. Bali Mester Kec. Jatinegara Jakarta Timur, DKI Jakarta', '', '', '', '', ''),
(155, '1JAS0001', '', 'A', 'JASA TELEKOMUNIKASI UTAMA, PT', 'Gedung Menara Mulia Lt. 16 Suite 1611 Jl. Gatot Subroto Kav. 9-11 RT.002/004 Setiabudi, Jakarta Selatan, DKI Jakarta Raya', '12930', '021-8370 4949', '', '', ''),
(156, '1JAY0001', '', 'A', 'JAYA ERA NUSA ABADI, PT', 'Jl. Cempaka Putih Barat (W) No. 29 Jakarta Pusat', '10520', '021-4250540', '', '', ''),
(157, '1JDR0001', '', 'A', 'JONDRI, BPK', 'Jl. Pulo Asem utara Raya No. 45 Jakarta', '', '', '', '', ''),
(158, '1JEM0001', '', 'A', 'JEMBO CABLE COMPANY Tbk, PT', 'Jl. Pajajaran Ds. Gandasari Kec. Jatiuwung Tangerang', '15137', '021-55650468', '', '', ''),
(159, '1JEV0001', '', 'A', 'JEVANS PUTRA MANDIRI, PT.', 'Jl. Kecapi No. 58 Jelupang, Serpong Utara Tangerang', '15323', '021-5315 3734', '', '', ''),
(160, '1JHO0001', '', 'A', 'JHONSON COM INDONESIA, PT', '', '', '(021) 7251122', '', '', ''),
(161, '1JMM0001', '', 'A', 'JASA MITRA MANDIRI, PT', '', '', '021-86614865', '', '', ''),
(162, '1JOH0001', '', 'A', 'JOHAN, Bpk', 'Rawamangun', '', '081270162093', '', '', ''),
(163, '1JOI0001', '', 'A', 'JOINTER PERKASA, CV', 'Tiban Indah Permai Blok S No. 42 Batam', '', '0778-5111199', '', '', ''),
(164, '1JOM0001', '', 'A', 'JONI MATONDANG, BPK.', 'Jakarta', '', '', '', '', ''),
(165, '1JON0001', '', 'A', 'JONI, Bpk', 'Rawamangun', '', '081270162093', '', '', ''),
(166, '1JOU0001', '', 'A', 'JOUTJE RUMBAJAN, BPK', '', '', '', '', '', ''),
(167, '1JPI0001', '', 'A', 'JUPRI, Bpk', '', '', '', '', '', ''),
(168, '1JSD0001', '', 'A', 'ASURANSI JASA INDONESIA, PT', 'Jl. Wastukencana No. 10, Tamansari Bandung Wetan, Bandung', '', '022-4231890', '', '', ''),
(169, '1KAJ0001', '', 'A', 'KALIAREN JAYA, PT', 'Jl. Yos Sudarso Lorong 100/50 Tanjung Priok - Tanjung Priok Jakarta Utara', '', '021-8615929', '', '', ''),
(170, '1KAR0001', '', 'A', 'KARTEKSI DUTA DJAKARTA, PT.', 'Jl. Biak No._48-A Cideng Jakarta Pusat', '', '021-6386 3336 / 37 / 38', '', '', ''),
(171, '1KCJ0001', '', 'A', 'KOPEGTEL CAMAR JEMBER', 'Jl. Gajah Mada No. 182-184 Lt.6 Kaliwates, Kaliwates Jember', '68132', '', '', '', ''),
(172, '1KEM0001', '', 'A', 'KEMENKEU DIRJEN BEA DAN CUKAI', '', '', '', '', '', ''),
(173, '1KHA0001', '', 'A', 'KHARISMA ELSYADAI SUKSES ABADI, PT.', 'Mall CBD Ciledug Blok D/67 Jl. Hos Cokroaminoto, Karang Tengah, Tangerang, Banten', '', '021-7030 7676', '', '', ''),
(174, '1KHD0001', '', 'A', 'KHAIRUL HADI, BPK', 'Medan', '', '', '', '', ''),
(175, '1KIJ0001', '', 'A', 'KARUNIA INDAH CAHAYA, PT', 'Klampis Madya Raya 1 Blok A-1 Klampis Ngasem - Sukolilo Surabaya - Jawa Timur', '', '031-5996007', '', '', ''),
(176, '1KJY0001', '', 'A', 'KOPNATEL JAYA, PT', 'Jl. Kebagusan I No. 1 RT. 002 RW. 001 Kebagusan, Pasar Minggu, Jakarta Selatan', '', '62-21-78838029', '', '', ''),
(177, '1KKL0001', '', 'A', 'KOP. KARYAWAN LEN', 'Jl. Soekarno Hatta No. 442 Pasirluyu Regol Kota Bandung Jawa Barat', '', '022-5202 682', '', '', ''),
(178, '1KMN0001', '', 'A', 'KARYA MITRA NUGRAHA, PT', 'Jl. Veteran 63, Lempongsari Gajah Mungkur, Semarang', '50231', '024-8457070', '', '', ''),
(179, '1KOM0001', '', 'A', 'KOMBAT GLOBAL MANDIRI, PT', 'Jl. Jombang Raya No. 89 Blok A1 Bintaro Sektor 5 RT 004/RW 005 Kel. Parigi Kec. Pondok Aren, Tangerang Selatan', '', '021-2904 6386', '', '', ''),
(180, '1KOP0001', '', 'A', 'KOPEGTEL BATAM', '', '', '', '', '', ''),
(181, '1KOP0002', '', 'A', 'KOP. KOPEGTEL CILACAP Sidanegara Cilacap Tengah Cilacap', 'Jl. Katamso No 66 RT.001 RW.002 ', '', '', '', '', ''),
(182, '1KOP0003', '', 'A', 'KOPEGTEL PURWOKERTO', 'Jl. Telepon 1 RT 005 / RW 004 Kranji - Purwokerto Timur Purwokerto - Jawa Tengah', '', '0281-640 321', '', '', ''),
(183, '1KOP0004', '', 'A', 'KOPEGTEL HARKAT SUBANG', 'Jl. Otista No 213 Karang Anyar Subang', '', '', '', '', ''),
(184, '1KOP0005', '', 'A', 'KOPERASI KARYAWAN LINTASARTA', 'Gedung Menara Thamrin Lt. 12 Jl. M.H. Thamrin Kav. 3, Kampung Bali  Tanah Abang Jakarta Pusat', '10250', '021-7590 9424', '', '', ''),
(185, '1KPB0002', '', 'A', 'KOPEGTEL PEKANBARU', 'Jl. Jend. Sudirman No. 199 Pekanbaru', '', '0761-47022', '', '', ''),
(186, '1KRI0001', '', 'A', 'KRIDA TEKNOLOGI INDONESIA, PT.', 'Rukan Puri Botanical H9 No. 22-23 RT.007 RW.001 Kel. Joglo Kec. Kembangan Jakarta Barat, DKI Jakarta', '', '021-5890 5600', '', '', ''),
(187, '1KRI0002', '', 'A', 'KRIDA HASTA TAMA, PT', 'Jl. Arjuna Utara No. 50 Duri Kepa, Duri Kepa - Kebon Jeruk Jakarta Barat DKI Jakarta', '11510', '021-564 4843', '', '', ''),
(188, '1KSS0001', '', 'A', 'KARISMA SYSTEM SOLUTION, PT', 'Jl. Raya Warung Buncit DE No. 18 RT 18 RW 005 Kalibata Pancoran  Jakarta Selatan DKI Jakarta Raya', '12740', '021-7981108', '', '', ''),
(189, '1KTR0001', '', 'A', 'KETROSDEN TRIASMITRA, PT', 'Jl. KH. Abdullah Syafe''i No. 27 RT. 012 RW. 001 Tebet Barat, Tebet Jakarta Selatan', '', '021-71671188', '', '', ''),
(190, '1KUA0001', '', 'A', 'KUALA MAKMUR, PT', 'Komp. Pemda No. 12 - B Blang Paseh - Pidie Kab. Pidie', '', '0653-22638', '', '', ''),
(191, '1LEN0001', '', 'A', 'LEN INDUSTRI (Persero), PT', 'Jl. Soekarno Hatta No. 442 Pasirluyu Regol Bandung Jawa Barat', '40254', '022-5202682', '', '', ''),
(192, '1LEX0001', '', 'A', 'LEXCORP INDONESIA, PT.', 'Jl. H. Nawi No. 10A Gandaria Selatan, Cilandak Jakarta Selatan', '', '021-7202 394', '', '', ''),
(193, '1LKN0001', '', 'A', 'LINK NET TBK, PT.', 'Gedung Beritasatu Plaza Lantai 4 Jl. Jend. Gatot Subroto Kav. 35 - 36 Jakarta', '', '62-21-55777755', '', '', ''),
(194, '1LOH0001', '', 'A', 'LOHOT HUTABARAT, BPK', 'Jakarta', '', '0778-7020 255', '', '', ''),
(195, '1LOH0001-DN', '', 'A', 'LOHOT HUTABARAT, BPK', 'Jakarta', '', '0778-7020 255', '', '', ''),
(196, '1LPP0001', '', 'A', 'BEND.LEMB.PENYIARAN PUBLIK TVRI STASIUN SULAWESI SELATAN', 'Jl. Kakatua No.14 RT. RW. Mattoangin, Mariso Kota Makassar', '', '0411-871621', '', '', ''),
(197, '1LUD0001', '', 'A', 'LUDO LUSTROUS, BPK', '', '', '021-29378431', '', '', ''),
(198, '1MAJ0001', '', 'A', 'MAJU JAYA, CV', 'Komp. Bumi Sindang Jaya No. A-20 Jl. Sekepeer Bandung', '40195', '62-22-70031740', '', '', ''),
(199, '1MAJ0002', '', 'A', 'MAJU JAYA TEKNOLOGI, PT', 'Jl. Puri Dago III No. 11 RT 005 RW 015 Kelurahan Sukamiskin Kecamatan Arcamanik Bandung, Jawa Barat', '', '', '', '', ''),
(200, '1MAR0001', '', 'A', 'MARSHUS ENGINEERING, PT', '', '', '', '', '', ''),
(201, '1MAR0002', '', 'A', 'MARALUS SILITONGA, Bpk', 'Medan', '', '', '', '', ''),
(202, '1MAR0003', '', 'A', 'MARSA KANINA BESTARI, PT', '', '', '022-7316279', '', '', ''),
(203, '1MDO0001', '', 'A', 'MANDALA OPTIMA, PT', 'Jl. Talang Betutu No. 17 GD. Pusako Lt.2 Kebon Melati - Tanah Abang Jakarta Pusat', '', '62-21-47800936', '', '', ''),
(204, '1MDR0001', '', 'A', 'MDR INDONESIA, PT', 'Gd. Plaza Abda Lt. 15 Jl. Jend. Soedirman Kav. 59 Kebayoran Baru - Jakarta Selatan', '12190', '021-8088 3690', '', '', ''),
(205, '1MED0001', '', 'A', 'MEDIA PENTA TECHNOLOGY, PT', 'Menara Standard Chartered Lt. 30 Jl. Prof. DR. Satrio No. 164 RT.003/004 Karet Semanggi Setiabudi Jakarta Selatan DKI Jakarta Raya', '12930', '', '', '', ''),
(206, '1MED0002', '', 'A', 'MEDIA KARYA, CV', 'Jl Kebonsari Damai No 5 RT 002 RW 002 Kebon Sari, Jambangan, Surabaya Jawa Timur', '', '', '', '', ''),
(207, '1MEG0001', '', 'A', 'MEGA TOWER, PT.', 'Jl. Kemang Raya No.15 Bangka / Mampang Prapatan Jakarta Selatan', '12730', '021-7179 4584', '', '', ''),
(208, '1MEI0001', '', 'A', 'MEILINDA OMPUSUNGGU, IBU', 'Medan', '', '', '', '', ''),
(209, '1MEL0001', '', 'A', 'MELATI TECHNOFO INDONESIA, PT', 'Jl. Tebet Timur Dalam Raya No.95A Jakarta Selatan', '', '+62-21-8300789', '', '', ''),
(210, '1MET0001', '', 'A', 'METAPLAS HARMONI, PT.', 'Jl. Kedoya Elok Plaza Blok DE/6-7 Kel. Kedoya Selatan RT. 019/04 Kec. Kebun Jeruk, Jakarta Barat', '11520', '021-581 2785', '', '', ''),
(211, '1MET0002', '', 'A', 'METEOR INTI RAYA, PT', '', '', '021-58904539', '', '', ''),
(212, '1MGI0001', '', 'A', 'MITRA GRAHA INTI UTAMA, PT', '', '', '', '', '', ''),
(213, '1MIL0001-DN', '', 'A', 'MILLIKEN INFRASTRUCTURE SOLUTIONS,LLC', '', '', '+65 6593 1332', '', '', ''),
(214, '1MIT0001', '', 'A', 'MITKOM PERSADA, PT', 'Jl. Jemur Handayani No. 50 Blok B 70 - 71 Surabaya', '', '031-70904088', '', '', ''),
(215, '1MIT0002', '', 'A', 'MITRATAMA GLOBAL MANDIRI, PT', 'Jl. TB. Simatupang RT 008 RW 03 Cilandak Timur - Pasar Minggu Jakarta Selatan DKI Jakarta', '', '021-7884 9849', '', '', ''),
(216, '1MIT0003', '', 'A', 'MITRA MEDIA SELARAS, PT', '', '', '', '', '', ''),
(217, '1MNC0001', '', 'A', 'MNC KABEL MEDIACOM, PT', '', '', '(021) 10340', '', '', ''),
(218, '1MOR0001', '', 'A', 'MORA TELEMATIKA INDONESIA, PT', 'Gedung Graha 9 Lt 6, Jl. Penataran No 9 Proklamasi Pegangsaan - Menteng Jakarta Pusat', '10320', '021-3199 8600', '', '', ''),
(219, '1MOR0002', '', 'A', 'MORI ABADI, PT', 'Komplek Pertokoan Green Land Blok P No. 7, Batam Centre', '', '0778-464768', '', '', ''),
(220, '1MOT0001', '', 'A', 'MOTMAINNAH SEJAHTERA, PT.', 'Jl. Pegangsaan Dua No. 31 RT. 006 RW. 002 Pegangsaan Dua, Kelapa Gading Jakarta Utara', '', '', '', '', ''),
(221, '1MPS0001', '', 'A', 'MERBAU PRIMA SAKTI, PT', 'Rukan Kencana Niaga Blok D1-2G Lt. 1 Taman Aries Meruya Utara - Kembangan Jakarta Barat', '', '62-21-5858309', '', '', ''),
(222, '1MPU0001', '', 'A', 'MAJA PERDANA UTAMA, PT', 'Wisma PEDE Lt. 5 Jl. Let. Jend. MT Haryono Kav. 17 Tebet Barat, Tebet Jakarta Selatan', '12810', '021-83792809', '', '', ''),
(223, '1MQM0001', '', 'A', 'MORA QUATRO MULTIMEDIA, PT', '', '', '', '', '', ''),
(224, '1MRA0001', '', 'A', 'MARIA APRIYANTI, IBU', 'Jl. Cipinang Muara Ilir Gang Taman 9 No. 76', '', '', '', '', ''),
(225, '1MRA0001-DN', '', 'A', 'Mr. ANIL PANDE ', '', '', '', '', '', ''),
(226, '1MSA0001', '', 'A', 'MITRA SINERGI ADHITAMA, PT', 'Jl. Ciputat Raya No. 14 F Rt/Rw. 006/001, Pondok Pinang Kebayoran Lama, Jakarta Selatan', '', '', '', '', ''),
(227, '1MTL0001', '', 'A', 'DAYAMITRA TELEKOMUNIKASI, PT', 'Gedung Graha Pratama Lt. 5 Jl. MT Haryono Kav. 15 Tebet Jakarta Selatan DKI Jakarta Raya', '12810', '62-21-83709592', '', '', ''),
(228, '1MUH0001', '', 'A', 'MUHAMMAD TEGUH DR', '', '', '0812 9126 9176', '', '', ''),
(229, '1MUL0001', '', 'A', 'MULIA KARYA, CV', '', '', '022-76093053', '', '', ''),
(230, '1MUL0002', '', 'A', 'MULTI KONTROL NUSANTARA, PT', 'Gd. Wisma Bakrie Lt. 2 Jl. HR Rasuna Said Kav B-1 Karet - Setiabudi Jakarta Selatan - DKI Jakarta', '', '', '', '', ''),
(231, '1MUN0001', '', 'A', 'MASINDO UTAMA NUSANTARA, PT', 'KOPMP.Golden Fatmawati Blk. C 19 Jl. Fatmawati 15 Gandaria Selatan, Cilandak Jakarta Selatan', '', '021-7697070', '', '', ''),
(232, '1MUR0001', '', 'A', 'MURDITO, BPK', 'Jakarta', '', '', '', '', ''),
(233, '1NAT0001', '', 'A', 'NATA KREASI,CV', '', '', '', '', '', ''),
(234, '1NAV0001', '', 'A', 'NAVITA ORIGO SOLUTIONS, PT', 'Grand Aston Soho Lt. 9 Unit J Jl. Let Jen S Parman Kav. 22-24 Jakarta Barat, DKI Jakarta Raya ', '11480', '021-2902 1898', '', '', ''),
(235, '1NEO0001', '', 'A', 'NEORA SOLUTIONS, CV', '', '', '061-80033800', '', '', ''),
(236, '1NKP0001', '', 'A', 'NASIO KARYA PRATAMA, PT', 'Jl. Pejaten Raya No. 5E Pejaten Barat Pasar Minggu Jakarta Selatan ', '', '62-21-7907935', '', '', ''),
(237, '1OKY0001', '', 'A', 'OKY YUDHA SAPUTRA, BPK', '', '', '', '', '', ''),
(238, '1OPT0001', '', 'A', 'OPTIMA TELECOMMUNICATION, CV', 'Jl. Karya Wakaf No. 7 LK. XV Sei Agul - Medan Barat Medan', '20117', '061-30039118', '', '', ''),
(239, '1PAD0001', '', 'A', 'PAS ADITAMA, PT.', 'Jl. P. Tanimbar 9 No. 248 Perumnas III RT. 003 RW. 007 Aren Jaya, Bekasi Timur Kotamadya Bekasi', '', '', '', '', ''),
(241, '1PAJ0001', '', 'A', 'PEWEKA ABADI JAYA, PT', 'Jl. Pelajar No.98 Teladan Timur, Medan Kota Medan', '', '081375046748', '', '', ''),
(242, '1PAN0001', '', 'A', 'PANCA JAYA KOMUNIKA, PT.', 'DSB. Delta Fortuna 89 RT.032/RW.011 Ngingas, Waru - Sidoarjo', '61256', '031-853 7967', '', '', ''),
(243, '1PAP0001', '', 'A', 'PAPUA MITRA PERKASA, PT', 'Perum Jaya Asri Blok AC No. 8 Rt. 004 Rw. 004 Entrop Jayapura Selatan Kota Jayapura Papua', '', '0967 - 535162', '', '', ''),
(244, '1PAR0001', '', 'A', 'PARK KYEONG WON, MR.', 'Bandung', '', '', '', '', ''),
(245, '1PAS0001', '', 'A', 'PUTERATEL ANDALAN SUKSES, PT', 'Jl. Danau Sunter Utara  Perkantoran Sunter Permai Blok D No. 18 Jakarta', '14350', '62-21-6511912', '', '', ''),
(246, '1PAT0001', '', 'A', 'PATRICIA, IBU', '', '', '', '', '', ''),
(247, '1PAY0001', '', 'A', 'PAY RIDAVA, BPK', '', '', '08111717175', '', '', ''),
(248, '1PCO0001-USD', '', 'A', 'PCOM', '', '', '', '', '', ''),
(249, '1PDC0001', '', 'A', 'PERMATA DIAMOND CEMERLANG, PT', '021-29641431', '', '', '', '', ''),
(250, '1PEK0001', '', 'A', 'PEKALONGAN SUKAMANDIRI, PT', 'Ruko Emerald Avenue C Blok EA/A.37 RT. 003 RW. 008 Perigi - Pondok Aren, Tangerang Selatan', '', '', '', '', ''),
(251, '1PEN0001', '', 'A', 'PENA SAKTI JAYA, PT', 'Jl. Hertasning II Blok E No. 3B Tidung - Rappocini Kota - Makassar', '', '0411-841324', '', '', ''),
(252, '1PER0001', '', 'A', 'PERSADA CATURYASA ABADI, PT.', 'Komp. Rawa Bambu I Jl. B No. 20 RT 006 RT 006, Kelurahan Pasar Minggu, Kecamatan Pasar Minggu Jakarta Selatan, DKI Jakarta Raya', '12520', '021-782 0011', '', '', ''),
(253, '1PET0001', '', 'A', 'PETER HALOHO, BPK', 'Perumahan D Minimalis Kav 32 Bekasi Timur', '', '', '', '', ''),
(254, '1PGJ0001', '', 'A', 'KOPEGTEL JAYA', 'Jl. Jend. Gatot Subroto Kav. 52 Jakarta Selatan', '', '62-21-5215285', '', '', ''),
(255, '1PHA0001', '', 'A', 'PHALGUNA ADHIGAMA, PT.', 'Jl. Rajawali No. 56 Sunggal, Medan Sunggal -Medan', '', '', '', '', ''),
(256, '1PIN0001', '', 'A', 'PINS INDONESIA, PT', 'Plaza Kuningan Gedung ANNEX Lt. 7 Suite 702 Jl. HR Rasuna Said Kav.C.11-14, Setiabudi Jakarta Selatan ', '12940', '021-5202560', '', '', ''),
(257, '1PKS0001', '', 'A', 'PERKONSUMA, PT.', 'Jl. Sudirman No. 119A Manado - Sulut', '', '021-3901 486', '', '', ''),
(258, '1PLM0001', 'PILLAR MUTIARA, PT', 'A', '', 'Jln. Raya Pasar Minggu No. 20 Rt. 007 Rw. 002 Pancoran Jakarta Selatan', '12780', '', '', '', ''),
(259, '1PMT0001', '', 'A', 'PUTRA MULIA TELECOMMNUCATION, PT.', 'Patra Office TowerLt. 18 Room 1811 Jl. Jend. Gatot Subroto Kav. 32-34 Setiabudi, Jakarta Selatan, DKI Jakarta ', '12950', '021-5290 1170', '', '', ''),
(260, '1PRA0001', '', 'A', 'PRATAMA JAYA, CV', '', '', '031-5313432', '', '', ''),
(261, '1PRO0001', '', 'A', 'PROAKSES NETWORK INDONESIA, PT.', '', '', '0812 99161837', '', '', ''),
(262, '1PUT0001', '', 'A', 'PUTRA TIMUR JAYA, PT', 'Jl. Basuki Rahmat No. 8 D Kampung Melayu - Jakarta Timur', '13310', '021-8517174', '', '', ''),
(263, '1PUT0002', '', 'A', 'PUTRANTO, BPK', '', '', '', '', '', ''),
(264, '1QDC0001', '', 'A', 'QDC TECHNOLOGIES, PT.', 'Gedung Graha QDC,Jl. Mampang Prapatan Raya Blok C No.28 Mampang Prapatan Jakarta Selatan, DKI Jakarta', '12790', '+62 21 79191234', '', '', ''),
(265, '1RAH0001', '', 'A', 'RAHMAN, BPK', 'Jakarta', '', '', '', '', ''),
(266, '1RAK0001-DN', '', 'A', 'RAKIDA SURYA MANDIRI, PT', 'Jl. Sidomulyo VI No. 32 Muktiharjo Kidul Pedurungan - Semarang', '', '', '', '', ''),
(267, '2SNY0001', '', 'A', 'SONY, Bpk', '', '', '', '', '', ''),
(269, '1REI0001', '', 'A', 'REINAD CITRA MANDIRI, PT', 'Jl. Pinus V No. 199 Blok A2 Duren Jaya Bekasi Timur Kotamadya Bekasi - Jawa Barat', '', '(021) 88349548', '', '', ''),
(270, '1REK0001', '', 'A', 'REKA CIPTA SOLUSINDO UTAMA, CV', 'Jl. Sakura I G-1/5 Puspita Loka RT. 03 RW. 05 Lengkong Gudang Serpong - Tangerang', '', '(021) 30450016', '', '', ''),
(271, '1ZUL0001', '', 'A', 'ZUL AKBAR, BPK', '', '', '', '', '', ''),
(272, '1ZTE0001', '', 'A', 'ZTE INDONESIA, PT', '', '', '082122320868', '', '', ''),
(273, '1REK0002', '', 'A', 'REKASEL NEOKOMUNIKASI INTERNUSA, PT', 'Gd. MLI 2 Lt. 3 Jl. MT. Haryono Kav. 49 No. RT. RW. Kel. Cikoko Kec. Pancoran Jakarta Selatan DKI Jakarta', '', '021-7901 460', '', '', ''),
(274, '1ZET0001', '', 'A', 'ZULHAM EFFENDI TANJUNG, BPK', 'Medan', '', '', '', '', ''),
(275, '1ZAM0001', '', 'A', 'ZAMRI, BPK.', 'Medan', '', '', '', '', ''),
(276, '1REL0001', '', 'A', 'RELINDO UTAMA, PT', 'Jl. Suci No. 1 RT.008 RW.06 Susukan, Ciracas Jakarta Timur', '', '021-8778 0808', '', '', ''),
(277, '1YUN0001', '', 'A', 'YUNES PRAWIRA, BPK', 'Padang', '', '081536104040', '', '', ''),
(278, '1REZ0001', '', 'A', 'REZA, BPK', '', '', '', '', '', ''),
(279, '1YOS0001', '', 'A', 'YOSIRKOM SEJAHTERA, PT', 'Taman Duren Sawit F6-1 RT. 009 RW. 016 Duren Sawit Jakarta Timur', '', '021-84999107', '', '', ''),
(280, '1ROB0001', '', 'A', 'ROBIN, BPK', 'Jakarta', '', '0821 2208 1983', '', '', ''),
(281, '1XTR0002', '', 'A', 'XTRALINK SOLUSI JARINGAN, PT', 'Jl.RS Fatmawati (Fatmawati Grand Centre) Blok A 1 Lt. 2 Kav. No.108 RT.005 RW.010 Cilandak Barat, Jakarta Selatan', '', '', '', '', ''),
(282, '1ROH0001', '', 'A', 'ROHMAN, BPK', 'Jl. Raya Serpong KM 15 Ruko No. 17/D BSD City', '', '', '', '', ''),
(283, '1XLA0001', '', 'A', 'XL AXIATA Tbk, PT', 'Gedung Grha XL Jl. DR. Ide Anak Agung Gde Agung Lot E4-7 No. 1 Kuningan Timur, Setiabudi Jakarta Selatan - DKI Jakarta Raya ', '12950', '62-21-5761881', '', '', ''),
(284, '1ROL0001', '', 'A', 'ROL NATAMARO INDONESIA, PT.', 'Ruko PTC Blok. 8 H No. 23 Rawa Terate, Cakung, Jakarta Timur DKI Jakarta', '', '021-4680 0708 / 709', '', '', ''),
(285, '1WSM0001', '', 'A', 'WIRA SURYA MANDIRI, PT', 'Taman Kebon Jeruk Blok AA. 1  No. 17 Meruya Selatan Kembangan Jakarta Barat DKI Jakarta Raya ', '11850', '62-21-9825219', '', '', ''),
(286, '1RSM0001', '', 'A', 'RAKIDA SURYA MANDIRI, PT', 'Jl. Sidomulyo VI No. 32 Muktiharjo Kidul Pedurungan - Semarang', '', '', '', '', ''),
(287, '1WRE0001', '', 'A', 'WREDATAMA MITRA TELEMATIKA, PT', 'Jl. Gajah No. 14 RT/RW 001/009 Malabar, Lengkong Kota Bandung - Jawa barat ', '40262', '022-731 5667', '', '', ''),
(288, '1RUM0001', '', 'A', 'RUMANIA, IBU', 'Jakarta', '', '', '', '', ''),
(289, '1WOO0001', '', 'A', 'WOORIRO TELECOM INDONESIA, PT', 'Moch Toha Gedung Kantor Pusat PT INTI Lt.3 No.77 RT. RW.004 Kel. Cigereleng Kec. Regol Kota Bandung, Jawa Barat', '', '022-5202 852', '', '', ''),
(290, '1SAG0001', '', 'A', 'SAGA CONSTRUCTION, PT', 'Ruko Karinda Plaza Blk. I / 16 Jl. Karang Tengah RT.002 RW.009 Lebak Bulus - Jakarta Selatan', '', '', '', '', ''),
(291, '1WIL0001', '', 'A', 'WILSON, Bpk', '', '', '', '', '', ''),
(292, '1SAJ0001', '', 'A', 'SANTOSA ASIH JAYA, PT', 'Jl. Condet Raya No. 17 Balekambang, Jakarta Timur', '', '021-44454095', '', '', ''),
(293, '1SAL0001', '', 'A', 'SALIRA PUTRA PRIMA, PT', 'Jl. Raya Pondok Kelapa Blok C8 No. 24 Duren Sawit, Jakarta', '', '021-8646706', '', '', ''),
(294, '1SAM0001', '', 'A', 'SIDO AGUNG MANDIRI, PT', 'Jl. KS Tubun Raya RT 001 RW 002 Palmerah - Jakarta Barat DKI Jakarta Raya', '11420', '021-56972767', '', '', ''),
(295, '1SAM0002', '', 'A', 'SAMPURNA, Bpk', 'Medan', '', '', '', '', ''),
(296, '1SAN0001', 'SANBE PRAKARSA HUSADA, PT.', 'A', '', 'Jl. Kebon Jati No. 38 Kebun Jeruk - Andir Bandung', '', '022-4248 333', '', '', ''),
(297, '1SAN0002', '', 'A', 'SANWA COMSYS ENGINEERING CORPORATION, BUT', 'JL.KAPTEN P.TENDEAN NO.51C RT.001/06 MAMPANG PRAPATAN, JAKARTA SELATAN DKI JAKARTA RAYA', '12710', '5274779', '', '', ''),
(298, '1SAN0003-DN', '', 'A', 'SANTOSO JAYA EKSPRESS, PT ', '', '', '021-58905340-41', '', '', ''),
(299, '1SAP0001', '', 'A', 'SANTOSA ADI PERKASA, PT', 'Metro Indah Mall H-9 Jl. Soekarno Hatta 590 Kel. Sekejati Kec. Buahbatu Kota Bandung Jawa barat', '', '022-7567899', '', '', ''),
(300, '1SAR0001', '', 'A', 'SARANA JARINGAN MAS, PT', 'Jl. Taman Aries Rukan Puri Kencana Blok D-1-1J Kembangan Utara - Kembangan Jakarta Barat - DKI Jakarta', '11610', '(021) 5862010', '', '', ''),
(301, '1SBS0001', '', 'A', 'SABAR SISWANTO, Bpk', '', '', '', '', '', ''),
(302, '1SCK0001', '', 'A', 'SUMBER CEMERLANG KENCANA PERMAI, PT', 'Jl. Hidup Baru No. 273 Pademangan Barat Rt. 010/003 Jakarta Utara', '', '021-5846803', '', '', ''),
(303, '1SCN0001', '', 'A', 'SUNVONE COMMUNICATION NETWORK, PT', '', '', '', '', '', ''),
(304, '1SGA0001', '', 'A', 'SENTOSA GUMILANG ABADI, PT', 'Rukan Artha Gading Niaga Blok D No. 7 Kelapa Gading Barat, Kelapa Gading,Jakarta Utara, DKI Jakarta', '', '081219549', '', '', ''),
(305, '1SIN0001', '', 'A', 'SINTATA KARYASARI, PT', 'Jl Raya Ceger No 70 RT 005/01 Ceger Cipayung Jakarta Timur', '', '021-84599176', '', '', ''),
(306, '1SKP0001', '', 'A', 'SARANA KOMUNIKASI PERTIWI, PT', 'Jl. Raya Pertanian III No. 62 Pasar Minggu - Jakarta Selatan', '12520', '021-78843481', '', '', ''),
(307, '1SLK0001', '', 'A', 'SILKAR NATIONAL, PT', 'Jl. Daan Mogot No. 165 Jakarta', '11520', '62-21-5663730', '', '', ''),
(308, '1SMA0001', '', 'A', 'SMART DATA GLOBAL, PT', 'Jl. Danau Toba Raya No 126 Bendungan Hilir - Tanah Abang Jakarta Pusat', '10210', '021-5790 5069', '', '', ''),
(309, '1SML0001', '', 'A', 'SAMUEL, BPK', 'Jakarta', '', '', '', '', ''),
(310, '1SMT0001', '', 'A', 'SMART TELECOM, PT', '', '', '62-21-31922255', '', '', ''),
(311, '1SON0001', '', 'A', 'SONG, MR.', '', '', '', '', '', ''),
(312, '1SPK0001', '', 'A', 'SAMUDERA PUTRA KENCANA, CV', 'Jl. Abadi Perum Villa Tiga Dara Permai II Blok A/4 RT. RW. Delima Kec. Tampan Kota Pekanbaru', '', '(0761) 562200', '', '', ''),
(313, '1SPM0001', '', 'A', 'SANDHY PUTRA MAKMUR, PT', 'Jl. Gatot Subroto 52 Kuningan Barat I Kuningan Barat - Mampang Prapatan Jakarta Selatan - DKI Jakarta', '', '021-7257 368', '', '', ''),
(314, '1SPO0001', '', 'A', 'SPOTELINDO MITRA UTAMA, PT', 'Jl. Tanjung Duren Barat No. 8 Grogol Petamburan, Jakarta Barat DKI Jakarta', '11470', '(021) 70489270', '', '', ''),
(315, '1SPP0001', '', 'A', 'SIMAR PUTRA PERKASA, PT', '', '', '', '', '', ''),
(316, '1SRB0001', '', 'A', 'SURADI BAMBANG, Bpk', 'Bandung', '', '0811644827', '', '', ''),
(317, '1SSM0001', '', 'A', 'SUMBER SINAR MENTARI, PT', '', '', '021 - 87920477', '', '', ''),
(318, '1SUF0001', '', 'A', 'SUFIA TECHNOLOGIES, PT', '', '', '022 - 7531247', '', '', ''),
(319, '1SUK0001', '', 'A', 'SUKARAJA INFOTEL, PT', 'Taman Kebon Jeruk Blok AA.I No.18 RT 004/007 Meruya Selatan - Kembangan Jakarta Barat - DKI Jakarta Raya', '11650', '021-5846809', '', '', ''),
(320, '1SUP0001', '', 'A', 'SUPRIATNA, BPK', 'Jl. Bengawan No. 81 Bandung', '', '085220318100', '', '', ''),
(321, '1SYA0001', '', 'A', 'SYAMSUDDIN, BPK', 'Medan', '', '', '', '', ''),
(322, '1TAP0001', '', 'A', 'TAPAN MAS, PT', 'Jl. Malaka Raya No. 88 - 89 Malaka Residence, Jakarta Timur', '', '021-84592288', '', '', ''),
(323, '1TAS0001', '', 'A', 'TELKOM AKSES, PT', 'Gd. Graha Citra Caraka Jl. Gatot Subroto Kav. 52 Kuningan Barat Mampang Prapatan Jakarta Selatan', '12710', '021-29337000', '', '', ''),
(324, '1TAU0001', '', 'A', 'TAUFIK HIDAYAH, BPK', 'Jakarta', '', '', '', '', ''),
(325, '1TBJ0001', '', 'A', 'TOKO BUANA JAYA', '', '', '', '', '', ''),
(326, '1TDI0001', '', 'A', 'TELKOM DIVISI ENTERPRISE', '', '', '', '', '', ''),
(327, '1TDS0001', '', 'A', 'TELKOM DIVA DENPASAR', '', '', '', '', '', ''),
(328, '1TEC0001', '', 'A', 'TECHNOLOGY DATA INDONESIA, PT', 'Kompleks Perkantoran Duta Merlin Blok C 49-50, Jl. Gajah Mada No. 3 Jakarta', '10130', '021-6338778', '', '', ''),
(329, '1TEL0001', '', 'A', 'TELEKOMUNIKASI INDONESIA Tbk, PT', 'Jl. Japati No. 1 Bandung', '', '', '', '', ''),
(330, '1TEL0005', '', 'A', 'TELKOM ARNET PALU, PT', 'Jl. Japati No. 1 Bandung', '', '', '', '', ''),
(331, '1TIN0001', '', 'A', 'TRANS INDONESIA NETWORK, PT', '', '', '', '', '', ''),
(332, '1TKM0001', '', 'A', 'TECHNOLOGY KARYA MANDIRI, PT', 'Rukan Puri Botanical Blok H8 No. 22 Joglo Kembangan - Jakarta', '', '021-5855552', '', '', ''),
(333, '1TKS0001', '', 'A', 'TELEKOMUNIKASI SELULAR, PT', 'Wisma Mulia Lt. M-19 Jl. Jend. Gatot Subroto Kav. 42 Kuningan Barat Mampang Prapatan Jakarta Selatan DKI Jakarta Raya ', '12710', '021-5240811', '', '', ''),
(334, '1TMS0001', '', 'A', 'TADYA MANDIRI SINERGI, PT', 'Jl. Makmur No. 16 Rt. 002 Rw. 002 Susuka Ciracas, Jakarta Timur', '', '089659186476', '', '', ''),
(335, '1TNP0001', '', 'A', 'TEKKEN PRATAMA, PT', 'Jl. Raya Pasar Minggu RT. 007 RW. 005 Pejaten Barat - Pasar Minggu Jakarta Selatan', '', '021-94029493', '', '', ''),
(336, '1TOW0001', '', 'A', 'TOWER BERSAMA GROUP, PT ', '', '', '', '', '', ''),
(337, '1TPB0001', '', 'A', 'TELEKOMINDO PRIMAKARYA , PT', 'Jl. Aceh No. 64 Merdeka Sumur Bandung', '', '62-22-4261481', '', '', ''),
(338, '1TRA0001', '', 'A', 'TRANSDATA SATKOMINDO, PT', 'Jl. Kebayoran Baru Komp. Kebayoran Baru Mall No. 24 Jakarta - Selatan ', '', '', '', '', ''),
(339, '1TRA0002', '', 'A', 'TRACKOMINDO SEJAHTERA, PT', '', '', '081329292904', '', '', ''),
(340, '1TRI0001', '', 'A', 'TRITUNAS NUSANTARA, PT.', 'Jl. Biak Raya Blok BB No. 15C RT.002/05 Cideng, Gambir -  Jakarta Pusat', '', '', '', '', ''),
(341, '1TRP0001', '', 'A', 'TRIPOLA PANATA, PT.', 'Jl. Kota Bambu Utara No. 1 Rt.007 Rw.003 Palmerah Jakarta Barat', '', '021-5697 2767', '', '', ''),
(342, '1TSE0001', '', 'A', 'T. SETIAWAN, BPK', 'Jl. Kramat Ganceng, KP. Kranggan Kulon RT. 006 RW. 008 No. 21 Jatiraden', '', '085283754304', '', '', ''),
(343, '1TUL0001', '', 'A', 'TULUS, BPK', 'Jakarta', '', '', '', '', ''),
(344, '1UCE0001', '', 'A', 'UCE INDONESIA, PT', 'Jl. Satelite Indah IX Blk. GN-14, Tanjungsari, Sukomanunggal, Surabaya, Jawa timur', '', '021-720 2155', '', '', ''),
(345, '1WIJ0001', '', 'A', 'WIJAYA TEHNIK, CV.', 'Jl. Raya Serdang No. 88 Serdang, Kemayoran Jakarta Pusat', '', '021-4202 188', '', '', ''),
(346, '1ULT0001', '', 'A', 'ULTRAJAYA MILK INDUSTRY & TRAD.CO.Tbk, PT.', 'Jl. Raya Cimareme No. 131 Padalarang, Bandung Indonesia', '40552', '022-8670 0700', '', '', ''),
(347, '1WES0001', '', 'A', 'WAHANA ERA SEJAHTERA, PT', '', '', '0341-586500', '', '', ''),
(348, '1UND0001', '', 'A', 'UNDANG SURYANA, BPK', '', '', '', '', '', ''),
(349, '1WAT0001', '', 'A', 'WAHYU AGUNG TELEKOMUNIKASI, PT', 'Jl. Dewi Sartika No. 317 RT. 008 RW. 004 Cawang - Kramat Jati Jakarta Timur', '', '(021) 26337760', '', '', ''),
(350, '1WAL0001', '', 'A', 'WALUYO, BPK', 'Jakarta', '', '', '', '', ''),
(351, '1UNI0001', '', 'A', 'UNITECH MITRANUSA, PT', 'Jl. Joglo Raya Komp Ruko Botanical Blok H7/21 Joglo, Kembangan Jakarta Barat', '11640', '021-7393872', '', '', ''),
(352, '1WAH0001', '', 'A', 'WAHANA ELEKSIA TECHNOLOGY, PT', 'Komp. Ruko Anggatra Pusdikkes PP-11 Lt. 2 Jl. Raya Kramat Jati - Kramat Jati  Jakarta Timur', '13510', '021-7511 909', '', '', ''),
(353, '1UNR0001', '', 'A', 'TELEKOMUNIKASI INDONESIA - UNER III, PT', '', '', '62-22-', '', '', ''),
(354, '1VER0001', '', 'A', 'VERDI, BPK', '', '', '', '', '', ''),
(355, '1UPA0001', '', 'A', 'UPAYA TEHNIK, PT', '', '', '021-7948060', '', '', ''),
(356, '1VAL0001', '', 'A', 'VALENSIA ANUGERAH UTAMA, PT.', 'Jl. Kelapa Dua Raya No. 21 RT/RW 002/002 Kelapa Dua - Kebun Jeruk Jakarta Barat - DKI Jakarta', '', '021-7025 8889', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dm_customer_subfield`
--

CREATE TABLE IF NOT EXISTS `tbl_dm_customer_subfield` (
`id` int(11) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `pic` varchar(100) NOT NULL,
  `title` varchar(50) NOT NULL,
  `email_pic` varchar(100) NOT NULL,
  `mobile1` varchar(50) NOT NULL,
  `mobile2` varchar(50) NOT NULL,
  `residence` varchar(255) NOT NULL,
  `birthday` varchar(100) NOT NULL,
  `whatsapp` varchar(50) NOT NULL,
  `skype` varchar(50) NOT NULL,
  `bbm` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dm_forwarder`
--

CREATE TABLE IF NOT EXISTS `tbl_dm_forwarder` (
`id` int(11) NOT NULL,
  `forwarder_id` varchar(50) NOT NULL,
  `name` varchar(255) NOT NULL,
  `category` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `phone` varchar(100) NOT NULL,
  `fax` varchar(50) NOT NULL,
  `website` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `notes` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_dm_forwarder`
--

INSERT INTO `tbl_dm_forwarder` (`id`, `forwarder_id`, `name`, `category`, `address`, `phone`, `fax`, `website`, `email`, `notes`) VALUES
(1, 'F001', 'forwarder', 'domestic', 'bandung', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dm_forwarder_legal`
--

CREATE TABLE IF NOT EXISTS `tbl_dm_forwarder_legal` (
`id` int(11) NOT NULL,
  `id_forwarder` int(11) NOT NULL,
  `pendirian` varchar(255) NOT NULL,
  `pendirian_no` varchar(255) NOT NULL,
  `pendirian_date` varchar(255) NOT NULL,
  `pendirian_notary` varchar(255) NOT NULL,
  `menkeh` varchar(255) NOT NULL,
  `menkeh_no` varchar(255) NOT NULL,
  `menkeh_date` varchar(255) NOT NULL,
  `perubahan` varchar(255) NOT NULL,
  `perubahan_no` varchar(50) NOT NULL,
  `perubahan_date` varchar(255) NOT NULL,
  `perubahan_notary` varchar(255) NOT NULL,
  `menkeh_perubahan` varchar(255) NOT NULL,
  `menkeh_perubahan_no` varchar(255) NOT NULL,
  `menkeh_perubahan_date` varchar(255) NOT NULL,
  `tdp` varchar(255) NOT NULL,
  `tdp_no` varchar(255) NOT NULL,
  `tdp_date` varchar(255) NOT NULL,
  `tdp_expire` varchar(255) NOT NULL,
  `siup` varchar(255) NOT NULL,
  `siup_no` varchar(255) NOT NULL,
  `siup_date` varchar(255) NOT NULL,
  `siup_expire` varchar(255) NOT NULL,
  `siujt` varchar(255) NOT NULL,
  `siujt_no` varchar(255) NOT NULL,
  `siujt_date` varchar(255) NOT NULL,
  `siujt_expire` varchar(255) NOT NULL,
  `npwp` varchar(255) NOT NULL,
  `npwp_no` varchar(255) NOT NULL,
  `npwp_date` varchar(255) NOT NULL,
  `pkp` varchar(255) NOT NULL,
  `pkp_no` varchar(255) NOT NULL,
  `pkp_date` varchar(255) NOT NULL,
  `domisili` varchar(25) NOT NULL,
  `domisili_no` varchar(255) NOT NULL,
  `domisili_date` varchar(255) NOT NULL,
  `domisili_expire` varchar(255) NOT NULL,
  `lisensi1` varchar(25) NOT NULL,
  `lisensi1_name` varchar(255) NOT NULL,
  `lisensi1_no` varchar(255) NOT NULL,
  `lisensi1_date` varchar(255) NOT NULL,
  `lisensi1_expire` varchar(255) NOT NULL,
  `lisensi2` varchar(255) NOT NULL,
  `lisensi2_name` varchar(255) NOT NULL,
  `lisensi2_no` varchar(255) NOT NULL,
  `lisensi2_date` varchar(255) NOT NULL,
  `lisensi2_expire` varchar(255) NOT NULL,
  `pks` varchar(255) NOT NULL,
  `pks_no` varchar(255) NOT NULL,
  `pks_date` varchar(255) NOT NULL,
  `pks_expire` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_dm_forwarder_legal`
--

INSERT INTO `tbl_dm_forwarder_legal` (`id`, `id_forwarder`, `pendirian`, `pendirian_no`, `pendirian_date`, `pendirian_notary`, `menkeh`, `menkeh_no`, `menkeh_date`, `perubahan`, `perubahan_no`, `perubahan_date`, `perubahan_notary`, `menkeh_perubahan`, `menkeh_perubahan_no`, `menkeh_perubahan_date`, `tdp`, `tdp_no`, `tdp_date`, `tdp_expire`, `siup`, `siup_no`, `siup_date`, `siup_expire`, `siujt`, `siujt_no`, `siujt_date`, `siujt_expire`, `npwp`, `npwp_no`, `npwp_date`, `pkp`, `pkp_no`, `pkp_date`, `domisili`, `domisili_no`, `domisili_date`, `domisili_expire`, `lisensi1`, `lisensi1_name`, `lisensi1_no`, `lisensi1_date`, `lisensi1_expire`, `lisensi2`, `lisensi2_name`, `lisensi2_no`, `lisensi2_date`, `lisensi2_expire`, `pks`, `pks_no`, `pks_date`, `pks_expire`) VALUES
(1, 1, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dm_forwarder_subfield`
--

CREATE TABLE IF NOT EXISTS `tbl_dm_forwarder_subfield` (
`id` int(11) NOT NULL,
  `id_supplier` int(11) NOT NULL,
  `pic` varchar(100) NOT NULL,
  `title` varchar(50) NOT NULL,
  `email_pic` varchar(100) NOT NULL,
  `mobile1` varchar(50) NOT NULL,
  `mobile2` varchar(50) NOT NULL,
  `residence` varchar(255) NOT NULL,
  `birthday` varchar(100) NOT NULL,
  `whatsapp` varchar(50) NOT NULL,
  `skype` varchar(50) NOT NULL,
  `bbm` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dm_item`
--

CREATE TABLE IF NOT EXISTS `tbl_dm_item` (
`id` int(11) NOT NULL,
  `code` varchar(255) NOT NULL,
  `devisi` varchar(255) NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `sat` varchar(255) NOT NULL,
  `merk` varchar(255) NOT NULL,
  `dimension` varchar(255) NOT NULL,
  `weight` varchar(255) NOT NULL,
  `weight_note` varchar(255) NOT NULL,
  `id_hs` varchar(255) NOT NULL,
  `tax` varchar(255) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `brochure` varchar(255) NOT NULL,
  `spek` varchar(255) NOT NULL,
  `catatan` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=378 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_dm_item`
--

INSERT INTO `tbl_dm_item` (`id`, `code`, `devisi`, `kategori`, `nama`, `sat`, `merk`, `dimension`, `weight`, `weight_note`, `id_hs`, `tax`, `picture`, `brochure`, `spek`, `catatan`) VALUES
(1, '03100002', 'WLS', 'ADAPTOR WLS', 'Adaptor Din-Female to N-Male', '', '', '', '', '', '2', '', '', '', '', ''),
(2, '03100005', 'WLS', 'ADAPTOR WLS', 'Adaptor DIN-Male to DIN-Female Right Angel', '', '', '', '', '', '2', '', '', '', '', ''),
(3, '01110021', 'WLN', 'ADAPTOR WLN', 'Adaptor FC/APC', '', '', '', '', '', '2', '', '', '', '', ''),
(4, '01110008', 'WLN', 'ADAPTOR WLN', 'Adaptor FC/UPC Round', '', '', '', '', '', '2', '', '', '', '', ''),
(5, '01110001', 'WLN', 'ADAPTOR WLN', 'Adaptor FC/UPC Square', '', '', '', '', '', '2', '', '', '', '', ''),
(6, '01110003', 'WLN', 'ADAPTOR WLN', 'Adaptor LC/APC Duplex', '', '', '', '', '', '2', '', '', '', '', ''),
(7, '01110004', 'WLN', 'ADAPTOR WLN', 'Adaptor LC/UPC Duplex', '', '', '', '', '', '2', '', '', '', '', ''),
(8, '01110011', 'WLN', 'ADAPTOR WLN', 'Adaptor SC/APC', '', '', '', '', '', '2', '', '', '', '', ''),
(9, '01110006', 'WLN', 'ADAPTOR WLN', 'Adaptor SC/UPC Simplex', '', '', '', '', '', '2', '', '', '', '', ''),
(10, '01140002', 'WLN', 'ATTENU WLN', 'Air Gap Attenuator - SC/PC-SC/APC', '', '', '', '', '', '2', '', '', '', '', ''),
(11, '01140001', 'WLN', 'ATTENU WLN', 'Air Gap Attenuator - SC/PC-SC/PC', '', '', '', '', '', '2', '', '', '', '', ''),
(12, '03020005', 'WLS', 'ANTENNA', 'Antenna Celling (Omni) 800-2500 MHz, 5dBi', '', '', '', '', '', '2', '', '', '', '', ''),
(13, '03020006', 'WLS', 'ANTENNA', 'Antenna Outdoor Directional 824-2500 MHz, 16 dBi', '', '', '', '', '', '2', '', '', '', '', ''),
(14, '03020004', 'WLS', 'ANTENNA', 'Antenna Service Panel Single Polarization ISAT Band GSM, 16 dBi', '', '', '', '', '', '2', '', '', '', '', ''),
(15, '03110003', 'WLS', 'ATTENU WLS', 'Attenuator 30 watts, 10 dBi', '', '', '', '', '', '2', '', '', '', '', ''),
(16, '03110004', 'WLS', 'ATTENU WLS', 'Attenuator 30 watts, 20 dBi', '', '', '', '', '', '2', '', '', '', '', ''),
(17, '03110006', 'WLS', 'ATTENU WLS', 'Attenuator 50 watts, 20 dBi', '', '', '', '', '', '2', '', '', '', '', ''),
(18, '01080005', 'WLN', 'ODC', 'Base Tray ODC per 12 Fiber', '', '', '', '', '', '2', '', '', '', '', ''),
(19, '01080045', 'WLN', 'ODC', 'Base Tray Per 12 Fiber For ODC 144C With LC/UPC Adapter & Pigtail', '', '', '', '', '', '2', '', '', '', '', ''),
(20, '01080019', 'WLN', 'ODC', 'Base Tray Per 12 Fiber For ODC-C 144C With SC/UPC Adaptor & Pigtail', '', '', '', '', '', '2', '', '', '', '', ''),
(21, '01080020', 'WLN', 'ODC', 'Base Tray Per 12 Fiber For ODC-C 288C With SC/UPC Adaptor & Pigtail', '', '', '', '', '', '2', '', '', '', '', ''),
(22, '03050010', 'WLS', 'ACCS WLS', 'Battery 12V, 33 AH, LIP1233', '', '', '', '', '', '2', '', '', '', '', ''),
(23, '03050011', 'WLS', 'ACCS WLS', 'Battery Bank UB4840 ICA', '', '', '', '', '', '2', '', '', '', '', ''),
(24, '01210046', 'WLN', 'ACCS WLN', 'Box Splitter For 1x16/1x32 Modular Splitter', '', '', '', '', '', '2', '', '', '', '', ''),
(25, '03010001', 'WLS', 'REPEATER', 'BTS Hotel GSM/DCS/WCDMA', '', '', '', '', '', '2', '', '', '', '', ''),
(26, '01260001', 'WLN', 'HANDHOLE', 'BULK3N071 SHIELD 1730 LID KIT, NO LOGO, L-BOLT', '', '', '', '', '', '2', '', '', '', '', ''),
(27, '01150040', 'WLN', 'PIGTAIL', 'Buncy Pigtail FC/PC, SM, G.652D, 0,9mm, 3 mtr', '', '', '', '', '', '2', '', '', '', '', ''),
(28, '01200011', 'WLN', 'RACK ', 'Cabinet FTM 900W 600D 2000Hmm', '', '', '', '', '', '2', '', '', '', '', ''),
(29, '1210025', 'WLN', 'ACCS WLN', 'Cleaver SS-6S type', '', '', '', '', '', '2', '', '', '', '', ''),
(30, '01200003', 'WLN', 'RACK ', 'Close Rack 19" 42U', '', '', '', '', '', '2', '', '', '', '', ''),
(31, '03030002', 'WLS', 'COMBINER', 'Combiner 2 In, 1 Out Wifi/Celluler', '', '', '', '', '', '2', '', '', '', '', ''),
(32, '03030004', 'WLS', 'COMBINER', 'Combiner 3 In, 1 Out Wideband', '', '', '', '', '', '2', '', '', '', '', ''),
(33, '03030005', 'WLS', 'COMBINER', 'Combiner 4 In, 1 Out wideband', '', '', '', '', '', '2', '', '', '', '', ''),
(34, '03030006', 'WLS', 'COMBINER', 'Combiner 4 In, 1 Out wideband Wifi/Cellular', '', '', '', '', '', '2', '', '', '', '', ''),
(35, '03030011', 'WLS', 'COMBINER', 'Combiner GSM 900/3G CDMA 2000', '', '', '', '', '', '2', '', '', '', '', ''),
(36, '03090002', 'WLS', 'CONECTOR WLS', 'Connector 1 1/4" N-Female', '', '', '', '', '', '2', '', '', '', '', ''),
(37, '03090004', 'WLS', 'CONECTOR WLS', 'Connector 1 5/8" N-Female', '', '', '', '', '', '2', '', '', '', '', ''),
(38, '03090009', 'WLS', 'CONECTOR WLS', 'Connector 1/2" Din-Female', '', '', '', '', '', '2', '', '', '', '', ''),
(39, '03090008', 'WLS', 'CONECTOR WLS', 'Connector 1/2" Din-Male', '', '', '', '', '', '2', '', '', '', '', ''),
(40, '03090010', 'WLS', 'CONECTOR WLS', 'Connector 1/2" NM', '', '', '', '', '', '2', '', '', '', '', ''),
(41, '03090011', 'WLS', 'CONECTOR WLS', 'Connector 7/8" Din-Female', '', '', '', '', '', '2', '', '', '', '', ''),
(42, '03090001', 'WLS', 'CONECTOR WLS', 'Connector N-Male RG-8, Merk Amphenol', '', '', '', '', '', '2', '', '', '', '', ''),
(43, '01240001', 'WLN', 'CONECTOR WLN', 'Connector UY2P', '', '', '', '', '', '2', '', '', '', '', ''),
(44, '01240001', 'WLN', 'CONECTOR WLN', 'Connector UY2P', '', '', '', '', '', '2', '', '', '', '', ''),
(45, '01170005', 'WLN', 'PEDESTAL', 'CPH1122 - Pedestal 11" Light Green B1 Bracket & Self Lock', '', '', '', '', '', '2', '', '', '', '', ''),
(46, '01170003', 'WLN', 'PEDESTAL', 'CPH12126 - Pedestal 12" Light Green Square B1 Bracket and Self Lock ', '', '', '', '', '', '2', '', '', '', '', ''),
(47, '01170004', 'WLN', 'PEDESTAL', 'CPH920 - Pedestal 9" Light Green B1 Bracket and Self Lock ', '', '', '', '', '', '2', '', '', '', '', ''),
(48, '01170004', 'WLN', 'PEDESTAL', 'CPH920 - Pedestal 9" Light Green B1 Bracket and Self Lock ', '', '', '', '', '', '2', '', '', '', '', ''),
(49, '01180005', 'WLN', 'CABLE FO', 'Drop Cable FO Aerial / Direct, Burried 2 Core, SM, G657A', '', '', '', '', '', '2', '', '', '', '', ''),
(50, '06180009', 'RND', 'CABLE FO', 'Drop Cable FO Aerial, LSZH, G657A, 2 Core', '', '', '', '', '', '2', '', '', '', '', ''),
(52, '06180012', 'RND', 'CABLE FO', 'Drop Cable FO Aerial, LSZH,G657A, 1 Core ', '', '', '', '', '', '2', '', '', '', '', ''),
(54, '01110001', 'WLN', 'ADAPTOR WLN', 'Adaptor FC/UPC Square', '', '', '', '', '', '2', '', '', '', '', ''),
(55, '01500015', 'WLN', 'ENCODER', 'E2CMTS', '', '', '', '', '', '2', '', '', '', '', ''),
(56, '01180006', 'WLN', 'CABLE FO', 'Fabric Innerduct Maxcell Type: 6428-3', '', '', '', '', '', '2', '', '', '', '', ''),
(57, '04060003', 'FTTH ', 'CABLE FO', 'Feeder Cable SM G652D 48 core ', '', '', '', '', '', '2', '', '', '', '', ''),
(58, '04060012S', 'FTTH ', 'CABLE FO', 'Fiber Optic Cable Easy Split G652D Aerial 12C', '', '', '', '', '', '2', '', '', '', '', ''),
(59, '04060012V', 'FTTH ', 'CABLE FO', 'Fiber Optic Cable Easy Split G652D Aerial 12C', '', '', '', '', '', '2', '', '', '', '', ''),
(60, '04060005', 'FTTH ', 'CABLE FO', 'Fiber Optic Cable Easy Split G652D Aerial 24C', '', '', '', '', '', '2', '', '', '', '', ''),
(61, '04060013S', 'FTTH ', 'CABLE FO', 'Fiber Optic Cable G652, Duct SM 144C', '', '', '', '', '', '2', '', '', '', '', ''),
(62, '04060014', 'FTTH ', 'CABLE FO', 'Fiber Optic Cable G652, Duct SM 264C', '', '', '', '', '', '2', '', '', '', '', ''),
(63, '04060015', 'FTTH ', 'CABLE FO', 'Fiber Optic Cable G652, Duct SM 288C', '', '', '', '', '', '2', '', '', '', '', ''),
(64, '04060011', 'FTTH ', 'CABLE FO', 'Fiber Optic Cable G652, Duct SM 96C', '', '', '', '', '', '2', '', '', '', '', ''),
(65, '04060001', 'FTTH ', 'CABLE FO', 'Fiber Optic Cable G652D Aerial SM Cap. 12 core', '', '', '', '', '', '2', '', '', '', '', ''),
(66, '04060002', 'FTTH ', 'CABLE FO', 'Fiber Optic Cable G652D Aerial SM Cap. 24 core', '', '', '', '', '', '2', '', '', '', '', ''),
(67, '04060004', 'FTTH ', 'CABLE FO', 'Fiber Optic Cable G652D, Duct SM 24C', '', '', '', '', '', '2', '', '', '', '', ''),
(68, '04060007', 'FTTH ', 'CABLE FO', 'Fiber Optic Cable, Easy Split (Single Core) G652D, Duct, SM 12 C', '', '', '', '', '', '2', '', '', '', '', ''),
(69, '04060009', 'FTTH ', 'CABLE FO', 'Fiber Optic Cable, Easy Split (Single Core), G652D, Duct24 C', '', '', '', '', '', '2', '', '', '', '', ''),
(70, '03030008', 'WLS', 'COMBINER', 'Filter BTS CDMA 1900', '', '', '', '', '', '2', '', '', '', '', ''),
(71, '03030009', 'WLS', 'COMBINER', 'Filter BTS WCDMA 2100Filter BTS WCDMA 2100', '', '', '', '', '', '2', '', '', '', '', ''),
(72, '01020002', 'WLN', 'CLODOME', 'FO Closure Dome Type Cap. 24C With Splice Tray ', '', '', '', '', '', '2', '', '', '', '', ''),
(73, '01020001', 'WLN', 'CLODOME', 'FO Closure Dome Type Cap. 48C With Splice Tray ', '', '', '', '', '', '2', '', '', '', '', ''),
(74, '01010003', 'WLN', 'CLOINL', 'FO Closure Inline Type Cap. 144 Core (FOCM) With OST-A ', '', '', '', '', '', '2', '', '', '', '', ''),
(75, '01010005', 'WLN', 'CLOINL', 'FO Closure Inline Type Cap. 384C (FOCL) With OST-C ', '', '', '', '', '', '2', '', '', '', '', ''),
(76, '01010002', 'WLN', 'CLOINL', 'FO Closure Inline Type Cap. 96 Core (FOCM) With OST-A ', '', '', '', '', '', '2', '', '', '', '', ''),
(77, '01010028', 'WLN', 'CLOINL', 'FO Closure Inline Type Cap. 96 Core (FOCM) without Splice Tray', '', '', '', '', '', '2', '', '', '', '', ''),
(78, '01010004', 'WLN', 'CLOINL', 'FO Closure Inline Type Kap. 48C (GPJ09H4-C1) With Splice Tray ', '', '', '', '', '', '2', '', '', '', '', ''),
(79, '01010012', 'WLN', 'CLOINL', 'FO Closure Inline Type Kap. 96C (GPJ09H4-C1) With Splice Tray ', '', '', '', '', '', '2', '', '', '', '', ''),
(80, '01170002', 'WLN', 'DP OPTIC', 'FTTH FO Terminal Box Cap. Max. 4 Core GP62FN-1', '', '', '', '', '', '2', '', '', '', '', ''),
(81, '01170002', 'WLN', 'DP OPTIC', 'FTTH FO Terminal Box Cap. Max. 4 Core GP62FN-1', '', '', '', '', '', '2', '', '', '', '', ''),
(82, '01210027', 'WLN', 'ACCS WLN', 'FTTH Optical Fiber Socket 1 Core, type OFS-QTE', '', '', '', '', '', '2', '', '', '', '', ''),
(83, '01210027', 'WLN', 'ACCS WLN', 'FTTH Optical Fiber Socket 1 Core, type OFS-QTE', '', '', '', '', '', '2', '', '', '', '', ''),
(84, '01210028', 'WLN', 'ACCS WLN', 'FTTH Optical Fiber Socket 2 Core, type OFS-QTE', '', '', '', '', '', '2', '', '', '', '', ''),
(85, '01210050', 'WLN', 'ACCS WLN', 'FTTH Optical Fiber Socket 2 Core, type OFS-QTE & Pigtail SC/APC', '', '', '', '', '', '2', '', '', '', '', ''),
(86, '06180001', 'RND', 'CABLE FO', 'G.657B3 Transparent Optic Cable', '', '', '', '', '', '2', '', '', '', '', ''),
(87, '04040001', 'FTTH ', 'HANDHOLE', 'GLB1111-61T11 HH-PIT-HA', '', '', '', '', '', '2', '', '', '', '', ''),
(88, '06250002', 'RND', 'GPS', 'GPS Tracker - OT08', '', '', '', '', '', '2', '', '', '', '', ''),
(89, '01100001', 'WLN', 'SLEEVE', 'Heatshrinkable Sleeve', '', '', '', '', '', '2', '', '', '', '', ''),
(90, '01100001', 'WLN', 'SLEEVE', 'Heatshrinkable Sleeve', '', '', '', '', '', '2', '', '', '', '', ''),
(91, '03020013', 'WLS', 'ANTENNA', 'High Gain Antenna Wideband 825-2500, 16 dBi, GHD825V1665A', '', '', '', '', '', '2', '', '', '', '', ''),
(92, '01170023', 'WLN', 'DP OPTIC', 'Household Information Box SPX2-B1 (Wall Mounted)', '', '', '', '', '', '2', '', '', '', '', ''),
(93, '03010008', 'WLS', 'REPEATER', 'Inline Amplifier GSM/WCMA 20 Watt', '', '', '', '', '', '2', '', '', '', '', ''),
(94, '01280002', 'WLN', 'ACCS NSL', 'IP Decoder H.264, Support MPEG-2/H.264,Gbe100/1000 Mbps Input & Output', '', '', '', '', '', '2', '', '', '', '', ''),
(95, '01210026', 'WLN', 'ACCS WLN', 'Jacket Stripper', '', '', '', '', '', '2', '', '', '', '', ''),
(96, '01210026', 'WLN', 'ACCS WLN', 'Jacket Stripper', '', '', '', '', '', '2', '', '', '', '', ''),
(97, '03080006', 'WLS', 'JUMPER CABLE', 'Jumper Cable 1M  superflexible  with 1/2" N-male and N-male connector', '', '', '', '', '', '2', '', '', '', '', ''),
(98, '03080009', 'WLS', 'JUMPER CABLE', 'Jumper Cable 3M  superflexible  with 1/2" DIN-male to DIN-male connector', '', '', '', '', '', '2', '', '', '', '', ''),
(99, '03080013', 'WLS', 'JUMPER CABLE', 'Jumper Cable 3M  superflexible  with 1/2" N-male and N-male Right Angle', '', '', '', '', '', '2', '', '', '', '', ''),
(100, '03080015', 'WLS', 'JUMPER CABLE', 'Jumper Cable 5 m 1/2" Superflexible Din Male to Din-Male', '', '', '', '', '', '2', '', '', '', '', ''),
(101, '03080008', 'WLS', 'JUMPER CABLE', 'Jumper Cable 5M  superflexible  with 1/2" N-male and N-male connector', '', '', '', '', '', '2', '', '', '', '', ''),
(102, '03080014', 'WLS', 'JUMPER CABLE', 'Jumper Cable 5M  superflexible  with 1/2" N-male and N-male connector', '', '', '', '', '', '2', '', '', '', '', ''),
(103, '03080016', 'WLS', 'JUMPER CABLE', 'Jumper Cable 5M superflexible with 1/2" N-male and N-female connector ', '', '', '', '', '', '2', '', '', '', '', ''),
(104, '06720001', 'RND', 'MGN LCK', 'Magnetic Lock', '', '', '', '', '', '2', '', '', '', '', ''),
(105, '03010015', 'WLS', 'REPEATER', 'MCPA GSM 900 8 Carrier 200 Watt, Indosats Band', '', '', '', '', '', '2', '', '', '', '', ''),
(106, '03010014', 'WLS', 'REPEATER', 'MCPA GSM 900 Mhz 200 Watts, 8 Carriers (XL)', '', '', '', '', '', '2', '', '', '', '', ''),
(107, '03010016', 'WLS', 'REPEATER', 'MCPA WCDMA (3G) 100 Watt (XL band)', '', '', '', '', '', '2', '', '', '', '', ''),
(108, '01250003', 'RND', 'UPS ', 'Mini UPS 12V 3A', '', '', '', '', '', '2', '', '', '', '', ''),
(109, '03030012', 'WLS', 'COMBINER', 'Multi Combiner 6 in 4 out, IMD-150', '', '', '', '', '', '2', '', '', '', '', ''),
(110, '03030013', 'WLS', 'COMBINER', 'Multi Operator Combiner (POI) 16 In, 4 Out', '', '', '', '', '', '2', '', '', '', '', ''),
(111, '03120004', 'WLS', 'COUPLER', 'Multiband 10 dB directional coupler', '', '', '', '', '', '2', '', '', '', '', ''),
(112, '03120005', 'WLS', 'COUPLER', 'Multiband 13 dB directional coupler', '', '', '', '', '', '2', '', '', '', '', ''),
(113, '03120006', 'WLS', 'COUPLER', 'Multiband 15 dB directional coupler with wall mounting bracket, ', '', '', '', '', '', '2', '', '', '', '', ''),
(114, '03120007', 'WLS', 'COUPLER', 'Multiband 20 dB directional coupler with wall mounting bracket, ', '', '', '', '', '', '2', '', '', '', '', ''),
(115, '03120008', 'WLS', 'COUPLER', 'Multiband 5 dB power coupler with wall mounting bracket,100W,N-F connectors', '', '', '', '', '', '2', '', '', '', '', ''),
(116, '03120001', 'WLS', 'COUPLER', 'Multiband 6 dB directional coupler', '', '', '', '', '', '2', '', '', '', '', ''),
(117, '03120009', 'WLS', 'COUPLER', 'Multiband 6 dB power coupler with wall mounting bracket,100W,N-F Connector', '', '', '', '', '', '2', '', '', '', '', ''),
(118, '03120002', 'WLS', 'COUPLER', 'Multiband 7 dB directional coupler with wall mounting bracket, ', '', '', '', '', '', '2', '', '', '', '', ''),
(119, '03120003', 'WLS', 'COUPLER', 'Multiband 8 dB directional coupler with wall mounting bracket,', '', '', '', '', '', '2', '', '', '', '', ''),
(120, '06250001', 'RND', 'GPS', 'OBD II GPS Tracker - OT01', '', '', '', '', '', '2', '', '', '', '', ''),
(121, '01080036', 'WLN', 'ODC', 'ODC C FTTX Cap 144C Type SC/APC', '', '', '', '', '', '2', '', '', '', '', ''),
(122, '01080015', 'WLN', 'ODC', 'ODC C FTTX Cap 144C Type SC/UPC', '', '', '', '', '', '2', '', '', '', '', ''),
(124, '01080001', 'WLN', 'ODC', 'ODC C FTTX Cap 288C Type SC/UPC', '', '', '', '', '', '2', '', '', '', '', ''),
(125, '01080030', 'WLN', 'ODC', 'ODC C FTTX Cap 288C Type SC/UPC', '', '', '', '', '', '2', '', '', '', '', ''),
(126, '01080018', 'WLN', 'ODC', 'ODC C FTTX Cap 576C Type SC/UPC', '', '', '', '', '', '2', '', '', '', '', ''),
(127, '01170008', 'WLN', 'DP OPTIC', 'ODC-B Pole Cap. 48C With FC/UPC Adaptor', '', '', '', '', '', '2', '', '', '', '', ''),
(128, '01170021', 'WLN', 'DP OPTIC', 'ODC-C Pole Cap. 48C With SC/UPC Adaptor & Pigtail', '', '', '', '', '', '2', '', '', '', '', ''),
(130, '01170022', 'WLN', 'DP OPTIC', 'ODF Modular 144C SC/UPC Adaptor & Pigtail', '', '', '', '', '', '2', '', '', '', '', ''),
(131, '01170022', 'WLN', 'DP OPTIC', 'ODF Modular 144C SC/UPC Adaptor & Pigtail', '', '', '', '', '', '2', '', '', '', '', ''),
(132, '01170022', 'WLN', 'DP OPTIC', 'ODF Modular 144C SC/UPC Adaptor & Pigtail', '', '', '', '', '', '2', '', '', '', '', ''),
(133, '01170015', 'WLN', 'DP OPTIC', 'ODP Closure Aerial Cap. 8C', '', '', '', '', '', '2', '', '', '', '', ''),
(134, '01170015', 'WLN', 'DP OPTIC', 'ODP Closure Aerial Cap. 8C', '', '', '', '', '', '2', '', '', '', '', ''),
(135, '01170015', 'WLN', 'DP OPTIC', 'ODP Closure Aerial Cap. 8C', '', '', '', '', '', '2', '', '', '', '', ''),
(136, '01170054', 'WLN', 'DP OPTIC', 'ODP Closure Aerial Cap. 8C Without Cassete & Pigtail', '', '', '', '', '', '2', '', '', '', '', ''),
(137, '01170026', 'WLN', 'DP OPTIC', 'ODP Pedestal 11" Cap. 16C SC/UPC Adaptor & Pigtail', '', '', '', '', '', '2', '', '', '', '', ''),
(138, '01170049', 'WLN', 'DP OPTIC', 'ODP Pedestal 9" Cap. 8C SC/APC Adaptor & Pigtail', '', '', '', '', '', '2', '', '', '', '', ''),
(139, '01170018', 'WLN', 'DP OPTIC', 'ODP Pole/Wall Cap. 12C With SC/APC Adaptor & Pigtail', '', '', '', '', '', '2', '', '', '', '', ''),
(140, '01170029', 'WLN', 'DP OPTIC', 'ODP Pole/Wall Cap. 12C With SC/UPC Adaptor & Pigtail', '', '', '', '', '', '2', '', '', '', '', ''),
(141, '01170038', 'WLN', 'DP OPTIC', 'ODP Pole/Wall Cap. 16C With SC/APC Adaptor & Pigtail', '', '', '', '', '', '2', '', '', '', '', ''),
(142, '01170012', 'WLN', 'DP OPTIC', 'ODP Pole/Wall Cap. 16C With SC/UPC Adaptor & Pigtail', '', '', '', '', '', '2', '', '', '', '', ''),
(143, '01170019', 'WLN', 'DP OPTIC', 'ODP Pole/Wall Cap. 16C With SC/UPC Adaptor & Pigtail', '', '', '', '', '', '2', '', '', '', '', ''),
(144, '01170050', 'WLN', 'DP OPTIC', 'ODP Pole/Wall Cap. 8C With SC/UPC Adaptor & Pigtail', '', '', '', '', '', '2', '', '', '', '', ''),
(145, '01200004', 'WLN', 'RACK ', 'Open Rack 19" 40U', '', '', '', '', '', '2', '', '', '', '', ''),
(146, '01200005', 'WLN', 'RACK ', 'Open Rack 19" 42U', '', '', '', '', '', '2', '', '', '', '', ''),
(147, '01040021', 'WLN', 'OTB DRAWER', 'OTB Rack Mounted Drawer Type Cap. 24C Transparant Door Box Only', '', '', '', '', '', '2', '', '', '', '', ''),
(148, '01040004', 'WLN', 'OTB DRAWER', 'OTB Rack Mounted Drawer Type Cap. 24C Transparant Door With FC/UPC Adaptor', '', '', '', '', '', '2', '', '', '', '', ''),
(149, '01040023', 'WLN', 'OTB DRAWER', 'OTB Rack Mounted Drawer Type Cap. 72C Transparant Door Only Box', '', '', '', '', '', '2', '', '', '', '', ''),
(150, '01040009', 'WLN', 'OTB DRAWER', 'OTB Rack Mounted Drawer Type Cap. 72C Transparant Door With FC/UPC Adaptor', '', '', '', '', '', '2', '', '', '', '', ''),
(151, '01040020', 'WLN', 'OTB DRAWER', 'OTB Rack Mounted Drawer Type Cap. 96C Transparant Door Box Only Include Sleeve', '', '', '', '', '', '2', '', '', '', '', ''),
(152, '01040011', 'WLN', 'OTB DRAWER', 'OTB Rack Mounted Drawer Type Cap. 96C Transparant Door With FC/UPC Adaptor', '', '', '', '', '', '2', '', '', '', '', ''),
(153, '01040014', 'WLN', 'OTB DRAWER', 'OTB Rack Mounted Drawer Type Cap. 96C Transparant Door With FC/UPC Adaptor & Storage With Pigtail', '', '', '', '', '', '2', '', '', '', '', ''),
(154, '01030026', 'WLN', 'OTB FIXED', 'OTB Rack Mounted Fixed Type Cap. 12C Metal Door Box Only', '', '', '', '', '', '2', '', '', '', '', ''),
(155, '01030051', 'WLN', 'OTB FIXED', 'OTB Rack Mounted Fixed Type Cap. 144C Transparant Door Box Only Include Sleeve', '', '', '', '', '', '2', '', '', '', '', ''),
(156, '01030015', 'WLN', 'OTB FIXED', 'OTB Rack Mounted Fixed Type Cap. 144C Transparant Door With FC/UPC Adaptor', '', '', '', '', '', '2', '', '', '', '', ''),
(157, '01030002', 'WLN', 'OTB FIXED', 'OTB Rack Mounted Fixed Type Cap. 144C Transparant Door With SC/UPC Adaptor ', '', '', '', '', '', '2', '', '', '', '', ''),
(158, '01030052', 'WLN', 'OTB FIXED', 'OTB Rack Mounted Fixed Type Cap. 24C Metal Door Box Only', '', '', '', '', '', '2', '', '', '', '', ''),
(159, '01030010', 'WLN', 'OTB FIXED', 'OTB Rack Mounted Fixed Type Cap. 24C Metal Door With SC/UPC Adaptor ', '', '', '', '', '', '2', '', '', '', '', ''),
(160, '01030033', 'WLN', 'OTB FIXED', 'OTB Rack Mounted Fixed Type Cap. 48C Box Only', '', '', '', '', '', '2', '', '', '', '', ''),
(161, '01030020', 'WLN', 'OTB FIXED', 'OTB Rack Mounted Fixed Type Cap. 48C Metal Door With FC/UPC Adaptor', '', '', '', '', '', '2', '', '', '', '', ''),
(162, '01030008', 'WLN', 'OTB FIXED', 'OTB Rack Mounted Fixed Type Cap. 48C Metal Door With SC/UPC Adaptor ', '', '', '', '', '', '2', '', '', '', '', ''),
(163, '01030043', 'WLN', 'OTB FIXED', 'OTB Rack Mounted Fixed Type Cap. 96C Box Only', '', '', '', '', '', '2', '', '', '', '', ''),
(164, '01070001', 'WLN', 'OTB WALL', 'OTB Wall Mounted Fixed Type Cap. 24C With FC/UPC Adaptor', '', '', '', '', '', '2', '', '', '', '', ''),
(165, '01070003', 'WLN', 'OTB WALL', 'OTB Wall Mounted Fixed Type Cap. 24C With FC/UPC Adaptor', '', '', '', '', '', '2', '', '', '', '', ''),
(166, '01070004', 'WLN', 'OTB WALL', 'OTB Wall Mounted Fixed Type Cap. 24C With FC/UPC Adaptor', '', '', '', '', '', '2', '', '', '', '', ''),
(167, '01070002', 'WLN', 'OTB WALL', 'OTB Wall Mounted Fixed Type Cap. 48C With FC/UPC Adaptor', '', '', '', '', '', '2', '', '', '', '', ''),
(168, '03020001', 'WLS', 'ANTENNA', 'Panel Antenna BS directional DB8982665E-M', '', '', '', '', '', '2', '', '', '', '', ''),
(169, '03020009', 'WLS', 'ANTENNA', 'Panel Antenna GHD 3500 V15120K, 3300-3800 MHz, 15 dBi', '', '', '', '', '', '2', '', '', '', '', ''),
(170, '03020003', 'WLS', 'ANTENNA', 'Panel antenna Wideband 1/2M  13 dBi', '', '', '', '', '', '2', '', '', '', '', ''),
(171, '01120035', 'WLN', 'PANEL ADAPTR', 'Panel OTB Drawer Rack Type Cap. 24C FC/UPC', '', '', '', '', '', '2', '', '', '', '', ''),
(172, '01120016', 'WLN', 'PANEL ADAPTR', 'Panel OTB Drawer Rack Type Cap. 72C FC/UPC', '', '', '', '', '', '2', '', '', '', '', ''),
(173, '01120032', 'WLN', 'PANEL ADAPTR', 'Panel OTB Drawer Rack Type Cap. 96C FC/UPC', '', '', '', '', '', '2', '', '', '', '', ''),
(174, '01120017', 'WLN', 'PANEL ADAPTR', 'Panel OTB Drawer Rack Type Cap. 96C SC/UPC', '', '', '', '', '', '2', '', '', '', '', ''),
(175, '01120001', 'WLN', 'PANEL ADAPTR', 'Panel OTB Fixed Rack Type Cap. 12C FC/UPC', '', '', '', '', '', '2', '', '', '', '', ''),
(176, '01120034', 'WLN', 'PANEL ADAPTR', 'Panel OTB Fixed Rack Type Cap. 12C FC/UPC Inc Adaptor', '', '', '', '', '', '2', '', '', '', '', ''),
(177, '01120014', 'WLN', 'PANEL ADAPTR', 'Panel OTB Fixed Rack Type Cap. 12C LC/UPC Duplex', '', '', '', '', '', '2', '', '', '', '', ''),
(178, '01120022', 'WLN', 'PANEL ADAPTR', 'Panel OTB Fixed Rack Type Cap. 144C FC/UPC', '', '', '', '', '', '2', '', '', '', '', ''),
(179, '01120006', 'WLN', 'PANEL ADAPTR', 'Panel OTB Fixed Rack Type Cap. 144C FC/UPC Inc Adaptor', '', '', '', '', '', '2', '', '', '', '', ''),
(180, '01120009', 'WLN', 'PANEL ADAPTR', 'Panel OTB Fixed Rack Type Cap. 144C SC/UPC', '', '', '', '', '', '2', '', '', '', '', ''),
(181, '01120002', 'WLN', 'PANEL ADAPTR', 'Panel OTB Fixed Rack Type Cap. 24C FC/UPC', '', '', '', '', '', '2', '', '', '', '', ''),
(182, '01120015', 'WLN', 'PANEL ADAPTR', 'Panel OTB Fixed Rack Type Cap. 24C LC/UPC Duplex', '', '', '', '', '', '2', '', '', '', '', ''),
(183, '01120018', 'WLN', 'PANEL ADAPTR', 'Panel OTB Fixed Rack Type Cap. 24C SC/UPC', '', '', '', '', '', '2', '', '', '', '', ''),
(184, '01120031', 'WLN', 'PANEL ADAPTR', 'Panel OTB Fixed Rack Type Cap. 24C SC/UPC Inc Adaptor', '', '', '', '', '', '2', '', '', '', '', ''),
(185, '01120023', 'WLN', 'PANEL ADAPTR', 'Panel OTB Fixed Rack Type Cap. 264C SC/UPC', '', '', '', '', '', '2', '', '', '', '', ''),
(186, '01120003', 'WLN', 'PANEL ADAPTR', 'Panel OTB Fixed Rack Type Cap. 48C FC/UPC', '', '', '', '', '', '2', '', '', '', '', ''),
(187, '01120036', 'WLN', 'PANEL ADAPTR', 'Panel OTB Fixed Rack Type Cap. 48C FC/UPC Inc Adaptor', '', '', '', '', '', '2', '', '', '', '', ''),
(188, '01120011', 'WLN', 'PANEL ADAPTR', 'Panel OTB Fixed Rack Type Cap. 48C SC/UPC', '', '', '', '', '', '2', '', '', '', '', ''),
(189, '01120028', 'WLN', 'PANEL ADAPTR', 'Panel OTB Fixed Rack Type Cap. 48C SC/UPC Inc Adaptor', '', '', '', '', '', '2', '', '', '', '', ''),
(190, '01120021', 'WLN', 'PANEL ADAPTR', 'Panel OTB Fixed Rack Type Cap. 72C FC/UPC', '', '', '', '', '', '2', '', '', '', '', ''),
(191, '01120012', 'WLN', 'PANEL ADAPTR', 'Panel OTB Fixed Rack Type Cap. 72C SC/UPC', '', '', '', '', '', '2', '', '', '', '', ''),
(192, '01120037', 'WLN', 'PANEL ADAPTR', 'Panel OTB Fixed Rack Type Cap. 96C FC/UPC Inc Adaptor', '', '', '', '', '', '2', '', '', '', '', ''),
(193, '01120013', 'WLN', 'PANEL ADAPTR', 'Panel OTB Fixed Rack Type Cap. 96C SC/UPC', '', '', '', '', '', '2', '', '', '', '', ''),
(194, '01120029', 'WLN', 'PANEL ADAPTR', 'Panel OTB Fixed Rack Type Cap. 96C SC/UPC Inc Adaptor', '', '', '', '', '', '2', '', '', '', '', ''),
(195, '01120004', 'WLN', 'PANEL ADAPTR', 'Panel OTB Swing Rack Type Cap. 24C FC/UPC', '', '', '', '', '', '2', '', '', '', '', ''),
(196, '03020017', 'WLS', 'ANTENNA', 'Parabolic Antenna, TS-OADPA-806/960-16.5-18', '', '', '', '', '', '2', '', '', '', '', ''),
(197, '03020008', 'WLS', 'ANTENNA', 'Parabolic Grid Antenna 900 MHz, 17 dBi', '', '', '', '', '', '2', '', '', '', '', ''),
(198, '01160003', 'WLN', 'PATCHCORD', 'Patchcord FC/UPC-FC/UPC, SM, DP, G.652D, 3.0 mm, 5 mtr', '', '', '', '', '', '2', '', '', '', '', ''),
(199, '01160044', 'WLN', 'PATCHCORD', 'Patchcord FC/UPC-FC/UPC, SM, SP, G.652D, 3.0 mm, 1 mtr', '', '', '', '', '', '2', '', '', '', '', ''),
(200, '01160047', 'WLN', 'PATCHCORD', 'Patchcord FC/UPC-FC/UPC, SM, SP, G.652D, 3.0 mm, 15 mtr', '', '', '', '', '', '2', '', '', '', '', ''),
(202, '01160045', 'WLN', 'PATCHCORD', 'Patchcord FC/UPC-FC/UPC, SM, SP, G.652D, 3.0 mm, 2 mtr', '', '', '', '', '', '2', '', '', '', '', ''),
(203, '01160048', 'WLN', 'PATCHCORD', 'Patchcord FC/UPC-FC/UPC, SM, SP, G.652D, 3.0 mm, 20 mtr', '', '', '', '', '', '2', '', '', '', '', ''),
(204, '01280003', 'WLN', 'ACCS NSL', 'Zoom modem, anderson, model AD-RT-ETH/USB-X5', '', '', '', '', '', '2', '', '', '', '', ''),
(205, '03020016', 'WLS', 'ANTENNA', 'Yagi Antenna, TS-IADYG-2000-50-12, WCDMA 2100 3G', '', '', '', '', '', '2', '', '', '', '', ''),
(206, '03020012', 'WLS', 'ANTENNA', 'Yagi Antenna GSM900 MHz, 12 dBi', '', '', '', '', '', '2', '', '', '', '', ''),
(207, '03020011', 'WLS', 'ANTENNA', 'Yagi Antenna DCS1800 MHz, 12 dBi', '', '', '', '', '', '2', '', '', '', '', ''),
(208, '03050012', 'WLS', 'ACCS WLS', 'UPS ICA 2000 VA/1000 Watt', '', '', '', '', '', '2', '', '', '', '', ''),
(209, '03010023', 'WLS', 'REPEATER', 'TS-OR15RC-43, Repeater CDMA 20 watt', '', '', '', '', '', '2', '', '', '', '', ''),
(210, '03020015', 'WLS', 'ANTENNA', 'TS-CUDYG-1800-50-12, Antenna Yagi DCS1800 (1710-1885 MHz) 12 dBi', '', '', '', '', '', '2', '', '', '', '', ''),
(211, '03010017', 'WLS', 'REPEATER', 'Triple Band Pico Repeater GSM/DCS/WCDMA 15 dBm XL Band', '', '', '', '', '', '2', '', '', '', '', ''),
(212, '03010029', 'WLS', 'REPEATER', 'TMB GSM 900 MHz, 100 Watt, 52 dBm 4 carries', '', '', '', '', '', '2', '', '', '', '', ''),
(213, '03010029', 'WLS', 'REPEATER', 'TMB GSM 900 MHz, 100 Watt, 52 dBm 4 carries', '', '', '', '', '', '2', '', '', '', '', ''),
(214, '03010018', 'WLS', 'REPEATER', 'TMB DCS 1800 MHz, 100 Watt 4 carries', '', '', '', '', '', '2', '', '', '', '', ''),
(215, '03010028', 'WLS', 'REPEATER', 'TMB DCS 1800 MHz 4, 100 Watt, 4 Carries', '', '', '', '', '', '2', '', '', '', '', ''),
(216, '01280001', 'WLN', 'ACCS NSL', 'Sumavision EMRV-3 Blue Chassis, 6 slots, dual power 1xC150 HD License 1xSFP 100', '', '', '', '', '', '2', '', '', '', '', ''),
(217, '01500001', 'WLN', 'ENCODER', 'Sumavision EMRD8020 H.264 Decoder', '', '', '', '', '', '2', '', '', '', '', ''),
(218, '04010002', 'FTTH ', 'SUBDUCT', 'Subduct HDPE Unilon Stel 27/32mm Hitam-Biru 400M', '', '', '', '', '', '2', '', '', '', '', ''),
(219, '01210069', 'WLN', 'ACCS WLN', 'Splitter Modular PLC 1x8 SC/APC, In 1m Out 1m, dia 2.0mm', '', '', '', '', '', '2', '', '', '', '', ''),
(220, '01210067', 'WLN', 'ACCS WLN', 'Splitter Modular PLC 1x8 SC/APC, In 0.75m Out 0.75m, dia 2.0mm', '', '', '', '', '', '2', '', '', '', '', ''),
(221, '01210032', 'WLN', 'ACCS WLN', 'Splitter Modular PLC 1x4 SC/UPC, In 1.5m Out 2.0m, dia 2.0mm', '', '', '', '', '', '2', '', '', '', '', ''),
(222, '01210030', 'WLN', 'ACCS WLN', 'Splitter Modular PLC 1x4 SC/UPC, In 1.5m Out 1.5m, dia 2.0mm', '', '', '', '', '', '2', '', '', '', '', ''),
(223, '01210064', 'WLN', 'ACCS WLN', 'Splitter Modular PLC 1x4 SC/APC, In 1.5m Out 1.5m, dia 2.0mm', '', '', '', '', '', '2', '', '', '', '', ''),
(224, '01210048', 'WLN', 'ACCS WLN', 'Splitter Modular PLC 1x32 SC/UPC, In 1.5m Out 2.0m, dia 2.0mm', '', '', '', '', '', '2', '', '', '', '', ''),
(225, '01210007', 'WLN', 'ACCS WLN', 'Splitter Modular PLC 1x32 SC/UPC, In 1.5m Out 1.5m, dia 2.0mm', '', '', '', '', '', '2', '', '', '', '', ''),
(226, '01210029', 'WLN', 'ACCS WLN', 'Splitter Modular PLC 1x2 SC/UPC, In 2m Out 2m, dia 2.0mm', '', '', '', '', '', '2', '', '', '', '', ''),
(227, '01210014', 'WLN', 'ACCS WLN', 'Splitter Micro PLC 2x8 SC/APC, In 1m Out 1m, dia 0.9mm', '', '', '', '', '', '2', '', '', '', '', ''),
(228, '01210054', 'WLN', 'ACCS WLN', 'Splitter Micro PLC 2x8 LC/APC, In 0.5m Out 0.5m, dia 0.9mm', '', '', '', '', '', '2', '', '', '', '', ''),
(229, '01210019', 'WLN', 'ACCS WLN', 'Splitter Micro PLC 2x4 SC/UPC, In 1m Out 2m, dia 0.9mm', '', '', '', '', '', '2', '', '', '', '', ''),
(230, '01210015', 'WLN', 'ACCS WLN', 'Splitter Micro PLC 2x16 SC/APC, In 1.5m Out 1.5m, dia 0.9mm', '', '', '', '', '', '2', '', '', '', '', ''),
(231, '01210031', 'WLN', 'ACCS WLN', 'Splitter Micro PLC 1x8 SC/UPC, In 0.5m Out 0.5m, dia 0.9mm', '', '', '', '', '', '2', '', '', '', '', ''),
(232, '01210070', 'WLN', 'ACCS WLN', 'Splitter Micro PLC 1x8 SC/APC, In 0.8m Out 0.8m, dia 0.9mm', '', '', '', '', '', '2', '', '', '', '', ''),
(233, '01210002', 'WLN', 'ACCS WLN', 'Splitter Micro PLC 1x4 SC/UPC, In 1.5m Out 1.5m, Dia 0.9 mm', '', '', '', '', '', '2', '', '', '', '', ''),
(234, '01090006', 'WLN', 'SPLICE TRAY', 'Splice Tray OST-C-1, 24/48 Fiber', '', '', '', '', '', '2', '', '', '', '', ''),
(235, '01090004', 'WLN', 'SPLICE TRAY', 'Splice Tray OST-B-1, 06/12 Fiber', '', '', '', '', '', '2', '', '', '', '', ''),
(236, '01090005', 'WLN', 'SPLICE TRAY', 'Splice Tray OST-A-1, 12/24 Fiber', '', '', '', '', '', '2', '', '', '', '', ''),
(237, '01090002', 'WLN', 'SPLICE TRAY', 'Splice Tray Inline Q-Tech', '', '', '', '', '', '2', '', '', '', '', ''),
(238, '01090001', 'WLN', 'SPLICE TRAY', 'Splice Tray Dome Type', '', '', '', '', '', '2', '', '', '', '', ''),
(239, '01090001', 'WLN', 'SPLICE TRAY', 'Splice Tray Dome Type', '', '', '', '', '', '2', '', '', '', '', ''),
(240, '01090003', 'WLN', 'SPLICE TRAY', 'Splice Organizer for Splice Tray Inline CHQ', '', '', '', '', '', '2', '', '', '', '', ''),
(241, '01170007', 'WLN', 'PEDESTAL', 'SPH920 - Pedestal 9" Light Green Bracket and Self Lock', '', '', '', '', '', '2', '', '', '', '', ''),
(242, '01170006', 'WLN', 'PEDESTAL', 'SPH710 - Pedestal 7" Light Green B1 Bracket and Self Lock', '', '', '', '', '', '2', '', '', '', '', ''),
(243, '01190001', 'WLN', 'PEDESTAL', 'SPH10106C3B2L01 - Signature Pedestal Housing', '', '', '', '', '', '2', '', '', '', '', ''),
(244, '03020014', 'WLS', 'ANTENNA', 'Smoke sensor ceiling mount, antenna: TQJ-0825, Freq: 800-2500 mhz', '', '', '', '', '', '2', '', '', '', '', ''),
(245, '01180004', 'WLN', 'CABLE FO', 'SI-01 fiber optical cable stripper (vertical)', '', '', '', '', '', '2', '', '', '', '', ''),
(246, '01180004', 'WLN', 'CABLE FO', 'SI-01 fiber optical cable stripper (vertical)', '', '', '', '', '', '2', '', '', '', '', ''),
(247, '01180004', 'WLN', 'CABLE FO', 'SI-01 fiber optical cable stripper (vertical)', '', '', '', '', '', '2', '', '', '', '', ''),
(248, '01260007', 'WLN', 'HANDHOLE', 'SGLB243631T11004,SGLB 36" Deep, Green Plastic LID, Telecomm. Logo, L-Bolt, With Marker, No Floor', '', '', '', '', '', '2', '', '', '', '', ''),
(249, '01260010', 'WLN', 'HANDHOLE', 'SGLB24361B41 SGLB LID', '', '', '', '', '', '2', '', '', '', '', ''),
(250, '01260005', 'WLN', 'HANDHOLE', 'SGLB2436 Extension 10 Inch', '', '', '', '', '', '2', '', '', '', '', ''),
(251, '01260014', 'WLN', 'HANDHOLE', 'SGLB173021T11010, SGLB1730, Green Plastic LID, L-Bolt, Floor, Telco Logo, 24” Depth', '', '', '', '', '', '2', '', '', '', '', ''),
(252, '01260013', 'WLN', 'HANDHOLE', 'SGLB173021T110, SGLB1730, Green Plastic LID, L-Bolt, No Floor, Telco Logo, 24” Depth', '', '', '', '', '', '2', '', '', '', '', ''),
(253, '01260012', 'WLN', 'HANDHOLE', 'SGLB1730 Floor', '', '', '', '', '', '2', '', '', '', '', ''),
(254, '01330002', 'WLN', 'SFP MODULES', 'SFP BWDM SMF TX1550/RX1310 LC 10 KM DOM For Sisco Comp.', '', '', '', '', '', '2', '', '', '', '', ''),
(255, '01330001', 'WLN', 'SFP MODULES', 'SFP BWDM SMF TX1310/RX1550 LC 10 KM DOM For Sisco Comp.', '', '', '', '', '', '2', '', '', '', '', ''),
(256, '03050001', 'WLS', 'ACCS WLS', 'Roll Cable RG-8, merk Daichi', '', '', '', '', '', '2', '', '', '', '', ''),
(257, '01100005', 'WLN', 'SLEEVE', 'Ribbon Sleeve per 4 fiber, 60 mm', '', '', '', '', '', '2', '', '', '', '', ''),
(258, '03010020', 'WLS', 'REPEATER', 'Repeater ICS WCDMA 20 watt Next Link', '', '', '', '', '', '2', '', '', '', '', ''),
(259, '03010007', 'WLS', 'REPEATER', 'Repeater GSM/DCS/WCDMA 20 Watt', '', '', '', '', '', '2', '', '', '', '', ''),
(260, '03010027', 'WLS', 'REPEATER', 'Repeater GSM 900 MHz Band Selective 20 watt, 43 DBm', '', '', '', '', '', '2', '', '', '', '', ''),
(261, '03010002', 'WLS', 'REPEATER', 'Repeater CDMA 800 MHz Band Selective 20 Watt', '', '', '', '', '', '2', '', '', '', '', ''),
(262, '06710001', 'RND', 'FGR PRNT', 'Reader Finger Print Based on IP MGS 100', '', '', '', '', '', '2', '', '', '', '', ''),
(263, '01200009', 'WLN', 'RACK ', 'Rack FTM DImension : 19" t=2.2 m', '', '', '', '', '', '2', '', '', '', '', ''),
(264, '01110019', 'WLN', 'ADAPTOR WLN', 'Quick Assembly Connector SC/PC', '', '', '', '', '', '2', '', '', '', '', ''),
(265, '01110019', 'WLN', 'ADAPTOR WLN', 'Quick Assembly Connector SC/PC', '', '', '', '', '', '2', '', '', '', '', ''),
(266, '01110017', 'WLN', 'ADAPTOR WLN', 'Quick Assembly Connector SC/APC', '', '', '', '', '', '2', '', '', '', '', ''),
(267, '01110016', 'WLN', 'ADAPTOR WLN', 'Quick Assembly Connector FC/UPC', '', '', '', '', '', '2', '', '', '', '', ''),
(268, '01160046', 'WLN', 'PATCHCORD', 'Patchcord FC/UPC-FC/UPC, SM, SP, G.652D, 3.0 mm, 3 mtr', '', '', '', '', '', '2', '', '', '', '', ''),
(269, '01160046', 'WLN', 'PATCHCORD', 'Patchcord FC/UPC-FC/UPC, SM, SP, G.652D, 3.0 mm, 3 mtr', '', '', '', '', '', '2', '', '', '', '', ''),
(270, '01160007', 'WLN', 'PATCHCORD', 'Patchcord FC/UPC-FC/UPC, SM, SP, G.652D, 3.0 mm, 5 mtr', '', '', '', '', '', '2', '', '', '', '', ''),
(271, '01160052', 'WLN', 'PATCHCORD', 'Patchcord FC/UPC-FC/UPC, SM, SP, G.655C, 3.0 mm, 10 mtr', '', '', '', '', '', '2', '', '', '', '', ''),
(272, '01160053', 'WLN', 'PATCHCORD', 'Patchcord FC/UPC-FC/UPC, SM, SP, G.655C, 3.0 mm, 15 mtr', '', '', '', '', '', '2', '', '', '', '', ''),
(273, '01160054', 'WLN', 'PATCHCORD', 'Patchcord FC/UPC-FC/UPC, SM, SP, G.655C, 3.0 mm, 20 mtr', '', '', '', '', '', '2', '', '', '', '', ''),
(274, '01160051', 'WLN', 'PATCHCORD', 'Patchcord FC/UPC-FC/UPC, SM, SP, G.655C, 3.0 mm, 5 mtr', '', '', '', '', '', '2', '', '', '', '', ''),
(275, '01160002', 'WLN', 'PATCHCORD', 'Patchcord FC/UPC-FC/UPC, SM, SP, G652D, 3.0 mm, 1 mtr', '', '', '', '', '', '2', '', '', '', '', ''),
(276, '03050008', 'WLS', 'ACCS WLS', 'Power Terminator (dummy load) 50 watt', '', '', '', '', '', '2', '', '', '', '', ''),
(277, '03050002', 'WLS', 'ACCS WLS', 'Power Terminator (dummy load) 100 watt', '', '', '', '', '', '2', '', '', '', '', ''),
(278, '03050003', 'WLS', 'ACCS WLS', 'Power Terminator (dummy load) 10 watt', '', '', '', '', '', '2', '', '', '', '', ''),
(279, '01150012', 'WLN', 'PIGTAIL', 'Pigtail ST/UPC, HMM, SP, G.652D, 3.0mm , 1 mtr', '', '', '', '', '', '2', '', '', '', '', ''),
(280, '01150035', 'WLN', 'PIGTAIL', 'Pigtail SC/UPC, SM, SP, G655C, 0.9 mm, 1.8 Mtr', '', '', '', '', '', '2', '', '', '', '', ''),
(281, '01150032', 'WLN', 'PIGTAIL', 'Pigtail SC/UPC, SM, SP, G652D, 0.9mm, 1.8m', '', '', '', '', '', '2', '', '', '', '', ''),
(282, '01150020', 'WLN', 'PIGTAIL', 'Pigtail SC/UPC, SM, SP, G.652, 3.0 mm, 3 mtr', '', '', '', '', '', '2', '', '', '', '', ''),
(283, '01150010', 'WLN', 'PIGTAIL', 'Pigtail SC/UPC, SM, G.652D, 0.9 mm, 2 mtr', '', '', '', '', '', '2', '', '', '', '', ''),
(284, '01150005', 'WLN', 'PIGTAIL', 'Pigtail SC/UPC, SM, G.652D, 0.9 mm, 1.8 mtr', '', '', '', '', '', '2', '', '', '', '', ''),
(285, '01150021', 'WLN', 'PIGTAIL', 'Pigtail SC/UPC , SM, SP, G657A1, 2.0 mm, 1 mtr', '', '', '', '', '', '2', '', '', '', '', ''),
(286, '01150023', 'WLN', 'PIGTAIL', 'Pigtail SC/PC, SM, SP, G.652D, 3.0 mm, 3 mtr', '', '', '', '', '', '2', '', '', '', '', ''),
(287, '01150006', 'WLN', 'PIGTAIL', 'Pigtail SC/APC, SM, G.652D, 0.9 mm, 1.8 mtr', '', '', '', '', '', '2', '', '', '', '', ''),
(288, '01150042', 'WLN', 'PIGTAIL', 'Pigtail SC/APC, SM, G.652D, 0.9 mm, 1.5 mtr', '', '', '', '', '', '2', '', '', '', '', ''),
(289, '01150007', 'WLN', 'PIGTAIL', 'Pigtail LC/UPC, SM, G.652D, 0,9mm, 1,8 Mtr', '', '', '', '', '', '2', '', '', '', '', ''),
(290, '01150008', 'WLN', 'PIGTAIL', 'Pigtail LC/APC, SM, SP, G652D, 0.9mm, 2 mtr', '', '', '', '', '', '2', '', '', '', '', ''),
(291, '01160008', 'WLN', 'PATCHCORD', 'Patchcord FC/UPC-FC/UPC, SM, SP, G652D, 3.0 mm, 10 mtr', '', '', '', '', '', '2', '', '', '', '', ''),
(292, '01160004', 'WLN', 'PATCHCORD', 'Patchcord FC/UPC-FC/UPC, SM, SP, G652D, 3.0 mm, 2 mtr', '', '', '', '', '', '2', '', '', '', '', ''),
(293, '01160023', 'WLN', 'PATCHCORD', 'Patchcord FC/UPC-LC/UPC, SM, SP, G.652D, 3.0 mm, 10 mtr', '', '', '', '', '', '2', '', '', '', '', ''),
(294, '01160024', 'WLN', 'PATCHCORD', 'Patchcord FC/UPC-LC/UPC, SM, SP, G.652D, 3.0 mm, 20 mtr', '', '', '', '', '', '2', '', '', '', '', ''),
(295, '01160025', 'WLN', 'PATCHCORD', 'Patchcord FC/UPC-LC/UPC, SM, SP, G.652D, 3.0 mm, 30 mtr', '', '', '', '', '', '2', '', '', '', '', ''),
(296, '01160013', 'WLN', 'PATCHCORD', 'Patchcord FC/UPC-LC/UPC, SM, SP, G.655C, 3.0 mm, 10 mtr', '', '', '', '', '', '2', '', '', '', '', ''),
(297, '01160056', 'WLN', 'PATCHCORD', 'Patchcord FC/UPC-LC/UPC, SM, SP, G.655C, 3.0 mm, 20 mtr', '', '', '', '', '', '2', '', '', '', '', ''),
(298, '01150039', 'WLN', 'PIGTAIL', 'Pigtail LC/APC, SM, SP, G652D, 0.9mm, 1.8 mtr', '', '', '', '', '', '2', '', '', '', '', ''),
(299, '01150017', 'WLN', 'PIGTAIL', 'Pigtail FC/UPC,SM, SP, G.652D, 2.0 mm, 3 mtr', '', '', '', '', '', '2', '', '', '', '', ''),
(300, '01150018', 'WLN', 'PIGTAIL', 'Pigtail FC/UPC, SM, SP, G.652D, 2.0 mm, 5 mtr', '', '', '', '', '', '2', '', '', '', '', ''),
(301, '01150026', 'WLN', 'PIGTAIL', 'Pigtail FC/UPC, SM, SP, G.652D, 0.9 mm, 2 mtr', '', '', '', '', '', '2', '', '', '', '', ''),
(302, '01150014', 'WLN', 'PIGTAIL', 'Pigtail FC/UPC, SM, SP, G.652, 3.0mm, 3 mtr (NZDSF)', '', '', '', '', '', '2', '', '', '', '', ''),
(303, '01150016', 'WLN', 'PIGTAIL', 'Pigtail FC/UPC, SM, SP, G.652, 2.4 mm, 5 mtr', '', '', '', '', '', '2', '', '', '', '', ''),
(304, '01150013', 'WLN', 'PIGTAIL', 'Pigtail FC/UPC, SM, SP, G.652, 2.0 mm, 2 mtr', '', '', '', '', '', '2', '', '', '', '', ''),
(305, '01150001', 'WLN', 'PIGTAIL', 'Pigtail FC/UPC, SM, G.652D, 0.9mm, 2 mtr', '', '', '', '', '', '2', '', '', '', '', ''),
(306, '01150002H', 'WLN', 'PIGTAIL', 'Pigtail FC/UPC, SM, G.652D, 0.9mm, 1.8 mtr', '', '', '', '', '', '2', '', '', '', '', ''),
(307, '01150011', 'WLN', 'PIGTAIL', 'Pigtail FC/UPC, SM, G.652, 3.0mm, 5 mtr', '', '', '', '', '', '2', '', '', '', '', ''),
(308, '01150030', 'WLN', 'PIGTAIL', 'Pigtail FC/UPC, MM, SP, G.652D, 3.0mm, 3 mtr', '', '', '', '', '', '2', '', '', '', '', ''),
(309, '01150022', 'WLN', 'PIGTAIL', 'Pigtail FC/APC, SM, SP, G652D, 3.0 mm, 2 Mtr', '', '', '', '', '', '2', '', '', '', '', ''),
(310, '03010030', 'WLS', 'REPEATER', 'Pico Repeater WCDMA (3G) 2100 MHz, 20 dBM', '', '', '', '', '', '2', '', '', '', '', ''),
(311, '03010019', 'WLS', 'REPEATER', 'Pico Repeater WCDMA (3G) 2100 MHz, 20 dBM', '', '', '', '', '', '2', '', '', '', '', ''),
(312, '01160011', 'WLN', 'PATCHCORD', 'Patchcord FC/UPC-LC/UPC, SM, SP, G.655C, 3.0 mm, 3 mtr', '', '', '', '', '', '2', '', '', '', '', ''),
(313, '01160057', 'WLN', 'PATCHCORD', 'Patchcord FC/UPC-LC/UPC, SM, SP, G.655C, 3.0 mm, 30 mtr', '', '', '', '', '', '2', '', '', '', '', ''),
(314, '03010013', 'WLS', 'REPEATER', 'Pico Repeater GSM 900 Elevator', '', '', '', '', '', '2', '', '', '', '', ''),
(315, '03010012', 'WLS', 'REPEATER', 'Pico Repeater GSM 900 AGC 15 dBm Telkomsel Band', '', '', '', '', '', '2', '', '', '', '', ''),
(316, '03010011', 'WLS', 'REPEATER', 'Pico Repeater GSM 900 AGC 15 dBm Indosat Band', '', '', '', '', '', '2', '', '', '', '', ''),
(317, '03010010', 'WLS', 'REPEATER', 'Pico Repeater GSM 900 20 dBm, 7.5 MHz', '', '', '', '', '', '2', '', '', '', '', ''),
(318, '03010009', 'WLS', 'REPEATER', 'Pico Repeater GSM 900 20 dBm', '', '', '', '', '', '2', '', '', '', '', ''),
(319, '01160058', 'WLN', 'PATCHCORD', 'Patchcord FC/UPC-LC/UPC, SM, SP, G.655C, 3.0 mm, 40 mtr', '', '', '', '', '', '2', '', '', '', '', ''),
(320, '01160012', 'WLN', 'PATCHCORD', 'Patchcord FC/UPC-LC/UPC, SM, SP, G.655C, 3.0 mm, 5 mtr', '', '', '', '', '', '2', '', '', '', '', ''),
(321, '01160009', 'WLN', 'PATCHCORD', 'Patchcord FC/UPC-LC/UPC, SM, SP, G652D, 2.4 mm, 10 mtr', '', '', '', '', '', '2', '', '', '', '', ''),
(322, '01160026', 'WLN', 'PATCHCORD', 'Patchcord FC/UPC-LC/UPC, SM, SP, G657A, 3.0 mm, 5 mtr', '', '', '', '', '', '2', '', '', '', '', ''),
(323, '01160026', 'WLN', 'PATCHCORD', 'Patchcord FC/UPC-LC/UPC, SM, SP, G657A, 3.0 mm, 5 mtr', '', '', '', '', '', '2', '', '', '', '', ''),
(324, '01160055', 'WLN', 'PATCHCORD', 'Patchcord FC/UPC-SC/APC, SM, SP, G.652, 3.0 mm, 10 mtr', '', '', '', '', '', '2', '', '', '', '', ''),
(325, '01160001', 'WLN', 'PATCHCORD', 'Patchcord FC/UPC-SC/UPC, SM, DP, G652D, 3.0 mm, 3 mtr', '', '', '', '', '', '2', '', '', '', '', ''),
(326, '01160084', 'WLN', 'PATCHCORD', 'Patchcord FC/UPC-SC/UPC, SM, SP, G.652D, 3.0 mm, 3 mtr', '', '', '', '', '', '2', '', '', '', '', ''),
(327, '03010025', 'WLS', 'REPEATER', 'Pico Repeater Dual Band GSM900 & DCS1800 20 dBm', '', '', '', '', '', '2', '', '', '', '', ''),
(328, '03010025', 'WLS', 'REPEATER', 'Pico Repeater Dual Band GSM900 & DCS1800 20 dBm', '', '', '', '', '', '2', '', '', '', '', ''),
(329, '03010024', 'WLS', 'REPEATER', 'Pico Repeater Dual Band GSM/WCDMA 20 dBm', '', '', '', '', '', '2', '', '', '', '', ''),
(330, '01160063', 'WLN', 'PATCHCORD', 'Patchcord LC/UPC-LC/UPC, SM, DP, G.652D, 3.0 mm, 2 mtr', '', '', '', '', '', '2', '', '', '', '', ''),
(331, '01160042', 'WLN', 'PATCHCORD', 'Patchcord LC/UPC-LC/UPC, SM, SP, G657A, 3.0 mm, 2 mtr', '', '', '', '', '', '2', '', '', '', '', ''),
(332, '01160005', 'WLN', 'PATCHCORD', 'Patchcord LC/UPC-SC/APC, SM, SP, G.652D, 3.0 mm, 4 mtr', '', '', '', '', '', '2', '', '', '', '', ''),
(333, '01160062', 'WLN', 'PATCHCORD', 'Patchcord SC/APC-LC/UPC, SM, SP, G.652D, 3.0 mm, 10 mtr', '', '', '', '', '', '2', '', '', '', '', ''),
(334, '03010006', 'WLS', 'REPEATER', 'Pico Repeater DCS 900 20 dBm, 7.5 MHz', '', '', '', '', '', '2', '', '', '', '', ''),
(335, '03010005', 'WLS', 'REPEATER', 'Pico Repeater DCS 1800 20 Dbm', '', '', '', '', '', '2', '', '', '', '', ''),
(336, '03010026', 'WLS', 'REPEATER', 'Pico Repeater DCS 1800 20 dBm', '', '', '', '', '', '2', '', '', '', '', ''),
(337, '03010004', 'WLS', 'REPEATER', 'Pico Repeater CDMA 800 AGC 15 dBm 2 Fix Band', '', '', '', '', '', '2', '', '', '', '', ''),
(338, '03010003', 'WLS', 'REPEATER', 'Pico Repeater CDMA 800 20 dBm 2 Fix Band (Flexi Band)', '', '', '', '', '', '2', '', '', '', '', ''),
(339, '03010022', 'WLS', 'REPEATER', 'Pico Repeater 20dBm, GSM 900, Fix Band, MR01RB-20', '', '', '', '', '', '2', '', '', '', '', ''),
(340, '01160014', 'WLN', 'PATCHCORD', 'Patchcord, SC/UPC-SC/UPC, SM, SP, G.652, 2.4 mm, 15 mtr', '', '', '', '', '', '2', '', '', '', '', ''),
(341, '01160062', 'WLN', 'PATCHCORD', 'Patchcord SC/APC-LC/UPC, SM, SP, G.652D, 3.0 mm, 10 mtr', '', '', '', '', '', '2', '', '', '', '', ''),
(342, '01160018', 'WLN', 'PATCHCORD', 'Patchcord SC/APC-SC/APC, SM, SP, G.652D, 3.0 mm, 20 Mtr', '', '', '', '', '', '2', '', '', '', '', ''),
(343, '01160059', 'WLN', 'PATCHCORD', 'Patchcord SC/APC-SC/APC, SM, SP, G.652D, 3.0 mm, 4 mtr', '', '', '', '', '', '2', '', '', '', '', ''),
(344, '01160032', 'WLN', 'PATCHCORD', 'Patchcord SC/APC-SC/APC, SM, SP, G.657A, 2.0 mm, 2 mtr', '', '', '', '', '', '2', '', '', '', '', ''),
(345, '01160032', 'WLN', 'PATCHCORD', 'Patchcord SC/APC-SC/APC, SM, SP, G.657A, 2.0 mm, 2 mtr', '', '', '', '', '', '2', '', '', '', '', ''),
(346, '01160071', 'WLN', 'PATCHCORD', 'Patchcord SC/APC-SC/APC, SM, SP, G657A, 3.0 mm, 10 mtr', '', '', '', '', '', '2', '', '', '', '', ''),
(347, '01160071', 'WLN', 'PATCHCORD', 'Patchcord SC/APC-SC/APC, SM, SP, G657A, 3.0 mm, 10 mtr', '', '', '', '', '', '2', '', '', '', '', ''),
(348, '01160069', 'WLN', 'PATCHCORD', 'Patchcord SC/APC-SC/APC, SM, SP, G657A, 3.0 mm, 2 mtr', '', '', '', '', '', '2', '', '', '', '', ''),
(349, '01160069', 'WLN', 'PATCHCORD', 'Patchcord SC/APC-SC/APC, SM, SP, G657A, 3.0 mm, 2 mtr', '', '', '', '', '', '2', '', '', '', '', ''),
(350, '01160073', 'WLN', 'PATCHCORD', 'Patchcord SC/APC-SC/APC, SM, SP, G657A, 3.0 mm, 20 mtr', '', '', '', '', '', '2', '', '', '', '', ''),
(351, '01160073', 'WLN', 'PATCHCORD', 'Patchcord SC/APC-SC/APC, SM, SP, G657A, 3.0 mm, 20 mtr', '', '', '', '', '', '2', '', '', '', '', ''),
(352, '01160072', 'WLN', 'PATCHCORD', 'Patchcord SC/APC-SC/APC, SM, SP, G657A, 3.0 mm, 30 mtr', '', '', '', '', '', '2', '', '', '', '', ''),
(353, '01160072', 'WLN', 'PATCHCORD', 'Patchcord SC/APC-SC/APC, SM, SP, G657A, 3.0 mm, 30 mtr', '', '', '', '', '', '2', '', '', '', '', ''),
(354, '01160070', 'WLN', 'PATCHCORD', 'Patchcord SC/APC-SC/APC, SM, SP, G657A, 3.0 mm, 5 mtr', '', '', '', '', '', '2', '', '', '', '', ''),
(355, '01160070', 'WLN', 'PATCHCORD', 'Patchcord SC/APC-SC/APC, SM, SP, G657A, 3.0 mm, 5 mtr', '', '', '', '', '', '2', '', '', '', '', ''),
(356, '01160067', 'WLN', 'PATCHCORD', 'Patchcord SC/APC-SC/UPC,SM,SP,G657A Roset to ONT Bend Insensitive 3.0mm 2 meter', '', '', '', '', '', '2', '', '', '', '', ''),
(357, '01160067', 'WLN', 'PATCHCORD', 'Patchcord SC/APC-SC/UPC,SM,SP,G657A Roset to ONT Bend Insensitive 3.0mm 2 meter', '', '', '', '', '', '2', '', '', '', '', ''),
(358, '01160068', 'WLN', 'PATCHCORD', 'Patchcord SC/APC-SC/UPC,SM,SP,G657A Roset to ONT Bend Insensitive 3.0mm 5 meter', '', '', '', '', '', '2', '', '', '', '', ''),
(359, '01160068', 'WLN', 'PATCHCORD', 'Patchcord SC/APC-SC/UPC,SM,SP,G657A Roset to ONT Bend Insensitive 3.0mm 5 meter', '', '', '', '', '', '2', '', '', '', '', ''),
(360, '01160019', 'WLN', 'PATCHCORD', 'Patchcord SC/APC-ST/UPC, SM, SP, G.652, 3.0 mm, 10 mtr', '', '', '', '', '', '2', '', '', '', '', ''),
(361, '01160020', 'WLN', 'PATCHCORD', 'Patchcord SC/APC-ST/UPC, SM, SP, G.652D, 3.0 mm, 4 mtr', '', '', '', '', '', '2', '', '', '', '', ''),
(362, '01160061', 'WLN', 'PATCHCORD', 'Patchcord SC/APC-ST/UPC, SM, SP, G.652D, 3.0 mm, 4 mtr', '', '', '', '', '', '2', '', '', '', '', ''),
(363, '01160035', 'WLN', 'PATCHCORD', 'Patchcord SC/UPC-LC/UPC, SM, SP, G.652D, 3.0 mm, 2 mtr', '', '', '', '', '', '2', '', '', '', '', ''),
(364, '01160092', 'WLN', 'PATCHCORD', 'Patchcord SC/UPC-SC/APC, SM, SP, G.652D, 3.0 mm, 10 mtr', '', '', '', '', '', '2', '', '', '', '', ''),
(365, '01160033', 'WLN', 'PATCHCORD', 'Patchcord SC/UPC-SC/APC, SM, SP, G.657A, 2.0 mm, 30 mtr', '', '', '', '', '', '2', '', '', '', '', ''),
(366, '01160016', 'WLN', 'PATCHCORD', 'Patchcord SC/UPC-SC/UPC, MM, DP, G.652, 3.0 mm, 4 mtr', '', '', '', '', '', '2', '', '', '', '', ''),
(367, '01160006', 'WLN', 'PATCHCORD', 'Patchcord SC/UPC-SC/UPC, MM, DP, G.652D, 3.0 mm, 13 mtr', '', '', '', '', '', '2', '', '', '', '', ''),
(368, '01160015', 'WLN', 'PATCHCORD', 'Patchcord SC/UPC-SC/UPC, MM, SP, G.652D, 3.0 mm, 8 mtr', '', '', '', '', '', '2', '', '', '', '', ''),
(369, '01160040', 'WLN', 'PATCHCORD', 'Patchcord SC/UPC-SC/UPC, SM, DP, G652D, 3.0 mm, 30 mtr', '', '', '', '', '', '2', '', '', '', '', ''),
(370, '01160031', 'WLN', 'PATCHCORD', 'Patchcord SC/UPC-SC/UPC, SM, SP, G.652D 3.0 mm, 30 mtr', '', '', '', '', '', '2', '', '', '', '', ''),
(371, '01160031', 'WLN', 'PATCHCORD', 'Patchcord SC/UPC-SC/UPC, SM, SP, G.652D 3.0 mm, 30 mtr', '', '', '', '', '', '2', '', '', '', '', ''),
(372, '01160029', 'WLN', 'PATCHCORD', 'Patchcord SC/UPC-SC/UPC, SM, SP, G.652D, 2.0 mm, 3 mtr', '', '', '', '', '', '2', '', '', '', '', ''),
(373, '01160090', 'WLN', 'PATCHCORD', 'Patchcord SC/UPC-SC/UPC, SM, SP, G.652D, 3.0 mm, 3 mtr', '', '', '', '', '', '2', '', '', '', '', ''),
(374, '01160080', 'WLN', 'PATCHCORD', 'Patchcord SC/UPC-SC/UPC, SM, SP, G652D, 3.0 mm, 20 mtr', '', '', '', '', '', '2', '', '', '', '', ''),
(375, '01160017', 'WLN', 'PATCHCORD', 'Patchcord SC/UPC-ST/UPC, SM, DP, G.652, 3.0 mm, 80 mtr', '', '', '', '', '', '2', '', '', '', '', ''),
(376, '01160021', 'WLN', 'PATCHCORD', 'Patchcord ST/UPC-ST/UPC, HMM, DP, G.652, 3.0 mm, 20 mtr', '', '', '', '', '', '2', '', '', '', '', ''),
(377, '01080001', 'WLN', 'ODC', 'ODC C FTTX Cap 288C Type SC/UPC', '', '', '', '', '', '2', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dm_operator`
--

CREATE TABLE IF NOT EXISTS `tbl_dm_operator` (
`id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `product` varchar(255) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `postal` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `fax` varchar(50) NOT NULL,
  `website` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_dm_operator`
--

INSERT INTO `tbl_dm_operator` (`id`, `name`, `product`, `brand`, `address`, `postal`, `phone`, `fax`, `website`) VALUES
(1, 'op', 'o', 'o', 'o', 'o', 'o', 'o', 'o');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dm_personnel`
--

CREATE TABLE IF NOT EXISTS `tbl_dm_personnel` (
`id` int(11) NOT NULL,
  `id_personnel` varchar(100) NOT NULL,
  `name` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `join_date` varchar(255) NOT NULL,
  `join_date_div` varchar(255) NOT NULL,
  `residence` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `mobile1` varchar(255) NOT NULL,
  `mobile2` varchar(255) NOT NULL,
  `whatsapp` varchar(255) NOT NULL,
  `bbm` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_dm_personnel`
--

INSERT INTO `tbl_dm_personnel` (`id`, `id_personnel`, `name`, `position`, `join_date`, `join_date_div`, `residence`, `phone`, `mobile1`, `mobile2`, `whatsapp`, `bbm`, `image`) VALUES
(1, '001', 'Gia Nuralamsyah', '1', '21-05-2015', '21-05-2015', 'Bandung', '', '081312449952', '', '081312449952', '', 'image/personnel/avatar.png'),
(2, 'ID-01', 'nama', '2', '27 Mar 2016', '01 Mar 2016', 'Bandung', '081', '0', '0', '0', '0', 'image/personnel/20141021_094349.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dm_stock`
--

CREATE TABLE IF NOT EXISTS `tbl_dm_stock` (
`id` int(11) NOT NULL,
  `code` varchar(50) NOT NULL,
  `location` varchar(50) NOT NULL,
  `uom` varchar(50) NOT NULL,
  `group` varchar(50) NOT NULL,
  `type` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `method` varchar(255) NOT NULL,
  `qty` varchar(255) NOT NULL,
  `total` varchar(255) NOT NULL,
  `average` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dm_supplier`
--

CREATE TABLE IF NOT EXISTS `tbl_dm_supplier` (
`id` int(11) NOT NULL,
  `supplier_id` varchar(255) NOT NULL,
  `kategori` varchar(100) NOT NULL,
  `status` varchar(255) NOT NULL,
  `supplier` varchar(255) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `postal` varchar(50) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `fax` varchar(100) NOT NULL,
  `website` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `product` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=213 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_dm_supplier`
--

INSERT INTO `tbl_dm_supplier` (`id`, `supplier_id`, `kategori`, `status`, `supplier`, `brand`, `address`, `postal`, `phone`, `fax`, `website`, `email`, `product`) VALUES
(2, '26APM001', 'lokal', 'exclusive', 'ALITA PRAYA MITRA, PT', '', '', '', '', '', '', '', ''),
(3, '26ITN0001', 'lokal', 'exclusive', 'INTAN, Mrs', '', '', '', '', '', '', '', ''),
(4, '26NKP001', 'lokal', 'exclusive', 'NASIO KARYA PRATAMA, PT - AFF', '', '', '', '021 - 7901935', '', '', '', ''),
(5, '26SON001', 'overseas', 'exclusive', 'SONG, MR', '', '', '', '', '', '', '', ''),
(6, '2ABA0001', 'lokal', 'exclusive', 'ABACUS KENCANA INDUSTRIES, PT', '', '', '', '(021) 8900865', '', '', '', ''),
(7, '2ABC0001', 'lokal', 'exclusive', 'ABC TOOLS', '', '', '', '', '', '', '', ''),
(8, '2ABE0001', 'lokal', 'exclusive', 'ABDI PERDANA EKSPRESS, PT', '', '', '', '', '', '', '', ''),
(9, '2ADI0001', 'lokal', 'exclusive', 'ADITECH MATRA, PT', '', '', '', '021-29389888', '', '', '', ''),
(10, '2ADS0001', 'lokal', 'exclusive', 'AVNET DATAMATION SOLUTIONS, PT', '', '', '', '+6221 3448848', '', '', '', ''),
(11, '2ADV0001', 'lokal', 'exclusive', 'ADVANCEDNET INDONESIA, CV', '', '', '', '0811955021', '', '', '', ''),
(12, '2ADV0002', 'lokal', 'exclusive', 'ADVENTURE INDONESIA ', '', '', '', '', '', '', '', ''),
(13, '2AGT0001', 'lokal', 'exclusive', 'AMINTA GRIYATAMA, PT', '', '', '', '(021) 7511915', '', '', '', ''),
(14, '2AJS0001', 'lokal', 'exclusive', 'ANUGRAH JAYA SEJAHTERA, CV.', '', '', '', '08111903617', '', '', '', ''),
(15, '2AJW0001-USD', 'overseas', 'exclusive', 'A.J. WORLD Co., LTD', '', '', '', '82-2-5675216 (407)', '', '', '', ''),
(16, '2ALE0001', 'lokal', 'exclusive', 'ALEXINDO PUTRA MANDIRI, PT', '', '', '', '', '', '', '', ''),
(17, '2ALE0002', 'lokal', 'exclusive', 'ALEXA ISMANA, PT', '', '', '', '', '', '', '', ''),
(19, '2ALI0001', 'lokal', 'exclusive', 'ALITA PRAYA MITRA, IDR', '', '', '', '62-21-7661932', '', '', '', ''),
(20, '2ALT0001', 'lokal', 'exclusive', 'ALTELCOM, CV', '', '', '', '(022) 7219927', '', '', '', ''),
(21, '2AMD0001', 'lokal', 'exclusive', 'ARMADA JAYA, PT', '', '', '', '021-6255188', '', '', '', ''),
(22, '2AMT0001', 'lokal', 'exclusive', 'ADITYA MITRA UTAMA, PT', '', '', '', '62-21-5638415', '', '', '', ''),
(23, '2ANT0001', 'lokal', 'exclusive', 'ANUGERAH MANDIRI TELECOMMUNICATION, PT', '', '', '', '', '', '', '', ''),
(24, '2ANU0001', 'lokal', 'exclusive', ' ANUGERAH PUTRA PRATAMA, CV', '', '', '', '', '', '', '', ''),
(25, '2ARD0001', 'lokal', 'exclusive', 'ARDHINUSA MITRATEL, PT', '', '', '', '', '', '', '', ''),
(26, '2ARR0001', 'lokal', 'exclusive', 'ARRIE ANGENDHARMA ', '', '', '', '', '', '', '', ''),
(27, '2ASR0001', 'lokal', 'exclusive', 'ASURANSI RAMAYANA', '', '', '', '021-3913864', '', '', '', ''),
(28, '2ASU0002', 'lokal', 'exclusive', 'ASURANSI RAKSA', '', '', '', '021 - 7226865', '', '', '', ''),
(29, '2AUT0001', 'lokal', 'exclusive', 'AUTOCOUNT INDONESIA, PT ', '', '', '', '021 - 30042061', '', '', '', ''),
(30, '2BAK0001', 'lokal', 'exclusive', 'BAKHTERA FREIGHT WORLDWIDE', '', '', '', '021 - 54333660', '', '', '', ''),
(31, '2BAM0001', 'lokal', 'exclusive', 'BAMBANG TRISTIYANTO, BPK', '', '', '', '', '', '', '', ''),
(32, '2BAS0001', 'lokal', 'exclusive', 'BENTALA SAKTI GLOBALINDO, PT', '', '', '', '021 - 72781911', '', '', '', ''),
(33, '2BES0001', 'lokal', 'exclusive', 'BENTALA SELARAS GLOBALINDO, PT', '', '', '', '', '', '', '', ''),
(34, '2BHI0001', 'lokal', 'exclusive', 'BHINNEKA.COM - ONLINE STORE', '', '', '', '021 – 29292828', '', '', '', ''),
(35, '2BIS0001', 'lokal', 'exclusive', 'BISMA PUTRA PERSADA, PT ', '', '', '', '022 - 88886805', '', '', '', ''),
(36, '2BKS0001', 'lokal', 'exclusive', 'BERKAH SINERGI UTAMA, PT', '', '', '', '021 - 75997958', '', '', '', ''),
(37, '2BRA0001', 'lokal', 'exclusive', 'BRAND MEDIA APAAJA, PT ', '', '', '', '', '', '', '', ''),
(38, '2BRY0001', 'lokal', 'exclusive', 'BRIMBUN RAYA INDAH, PT', '', '', '', '62-21-53676192', '', '', '', ''),
(39, '2BSA0001', 'lokal', 'exclusive', 'BANGUN SEJAHTERA, CV', '', '', '', '', '', '', '', ''),
(40, '2CAL0001', 'lokal', 'exclusive', 'CALTECHNOLOGY INDONESIA, PT ', '', '', '', '', '', '', '', ''),
(41, '2CCM0001', 'lokal', 'exclusive', 'CIPTA CORE MANDIRI, CV ', '', '', '', '022-77809556', '', '', '', ''),
(42, '2CEM0001', 'lokal', 'exclusive', 'CEMERLANG REFILL', '', '', '', '', '', '', '', ''),
(43, '2CHA0001-USD', 'overseas', 'exclusive', 'CHANNELL Pty., LTD', '', '', '', '+61 2 8884 4111', '', '', '', ''),
(44, '2CHQ0001-USD', 'overseas', 'exclusive', 'ZHEJIANG CHAOQIAN COMMUNICATION EQUIPMENT CO. LTD.', '', '', '', '86-576-83986755', '', '', '', ''),
(45, '2CIT0001', 'lokal', 'exclusive', 'CITRA VAN TITIPAN KILAT, PT', '', '', '', '021 - 31922309', '', '', '', ''),
(46, '2CLJ0001', 'lokal', 'exclusive', 'CELINDO JAYA, CV', '', '', '', '62-21-33153030', '', '', '', ''),
(47, '2CLS0001', 'lokal', 'exclusive', 'CENTRALINK SENTOSA, PT', '', '', '', '62-21-45840566', '', '', '', ''),
(48, '2COM0001', 'lokal', 'exclusive', 'COMMONWEALTH LIFE ', '', '', '', '', '', '', '', ''),
(49, '2CQC0001', 'lokal', 'exclusive', 'CHENGDU QIANHONG COMMUNICATION', '', '', '', '', '', '', '', ''),
(50, '2CTY0001-USD', 'overseas', 'exclusive', 'CAYIN TECHNOLOGY CO., LTD', '', '', '', '+886-2-2595-1005', '', '', '', ''),
(51, '2CVS0001', 'lokal', 'exclusive', 'SUMBER JAYA MANDIRI, CV', '', '', '', '', '', '', '', ''),
(52, '2DCS0001', 'lokal', 'exclusive', 'DELTA CAKRA SEMPURNA, PT', '', '', '', '021-54369912', '', '', '', ''),
(53, '2DFI0001', 'lokal', 'exclusive', 'DFI LOGISTIC ', '', '', '', '021 - 65306503', '', '', '', ''),
(54, '2DHL0001', 'lokal', 'exclusive', 'DHL EXPRESS', '', '', '', '021-29537000', '', '', '', ''),
(55, '2DIW0001-USD', 'overseas', 'exclusive', 'DIWEI MACHINERY CO;Ltd', '', '', '', '+86 0755 8148 2396', '', '', '', ''),
(56, '2DJA0001', 'lokal', 'exclusive', 'DJUN JAYA ABADI', '', '', '', '62-21-6288068', '', '', '', ''),
(57, '2DNS0001', 'lokal', 'exclusive', 'DENSION BROADBAND SYSTEM KFT', '', '', '', '36-1-4630470', '', '', '', ''),
(58, '2DTD0001', 'lokal', 'exclusive', 'DATACOMM DIANGRAHA, PT', '', '', '', '62-21-29979797', '', '', '', ''),
(59, '2DWI0001', 'lokal', 'exclusive', 'DWI TUNGGAL JAYA', '', '', '', '', '', '', '', ''),
(60, '2EKA0001', 'lokal', 'exclusive', 'EKADHARMA INTERNATIONAL, PT', '', '', '', '021-5900160', '', '', '', ''),
(61, '2ELC0001', 'lokal', 'exclusive', 'ELECTRIC CASTLE', '', '', '', '', '', '', '', ''),
(62, '2ELE0001', 'lokal', 'exclusive', 'ELECTRONIC SOLUTION INDONESIA, PT', '', '', '', '', '', '', '', ''),
(63, '2EMS0001', 'lokal', 'exclusive', 'EZRA MANUNGGAL SOLUSI, PT', '', '', '', '', '', '', '', ''),
(64, '2ENG0001', 'lokal', 'exclusive', 'ENGLISH TODAY', '', '', '', '021 - 7456296', '', '', '', ''),
(65, '2ERA0001', 'lokal', 'exclusive', 'ERA BANGUN JAYA, PT', '', '', '', '', '', '', '', ''),
(66, '2FAJ0001', 'lokal', 'exclusive', 'FAJAR MITRA KRIDA ABADI, PT', '', '', '', '021-7375 523', '', '', '', ''),
(67, '2FDX0001-USD', 'overseas', 'exclusive', 'REPEX PERDANA INTERNATIONAL, PT', '', '', '', '', '', '', '', ''),
(68, '2FIT0001-USD', 'overseas', 'exclusive', 'FITEK PHOTONICS CORPORATION', '', '', '', '886 3 3626789', '', '', '', ''),
(69, '2FOS0001', 'lokal', 'exclusive', 'FOSSIL S', '', '', '', '', '', '', '', ''),
(70, '2FOS0002', 'lokal', 'exclusive', 'FOSCAM INDONESIA', '', '', '', '021-51482128', '', '', '', ''),
(71, '2FRE0001', 'lokal', 'exclusive', 'FREIGHT EXPRESS, PT', '', '', '', '021-3506626', '', '', '', ''),
(72, '2FWT0001-USD', 'overseas', 'exclusive', 'FORTUNE WAVE TECHNOLOGY CO. LTD. ', '', '', '', '86-755-26674947', '', '', '', ''),
(73, '2GAP0001', 'lokal', 'exclusive', 'GLOBAL ADHI PRATAMA, PT', '', '', '', '021-58901514', '', '', '', ''),
(74, '2GEL0001', 'lokal', 'exclusive', 'GELANG SURYA, CV', '', '', '', '', '', '', '', ''),
(75, '2GFL0001', 'lokal', 'exclusive', 'GF LINES, PT  ', '', '', '', '021 - 46830907', '', '', '', ''),
(76, '2GGP0001', 'lokal', 'exclusive', 'GIGANTIKA PRATAMA, PT', '', '', '', '', '', '', '', ''),
(77, '2GLO0001', 'lokal', 'exclusive', 'GLOBAL XPERTINDO', '', '', '', '021 - 29303690', '', '', '', ''),
(78, '2GOD0001', 'lokal', 'exclusive', 'GOODRICH GLOBAL, CV', '', '', '', '', '', '', '', ''),
(79, '2GOL0001', 'lokal', 'exclusive', 'GOLDEN RAMA ', '', '', '', '021 - 231 3131', '', '', '', ''),
(80, '2GPR0001', 'lokal', 'exclusive', 'GLOBAL PRATAMA PERSADA, PT', '', '', '', '62-21-51258036', '', '', '', ''),
(81, '2GSS0001', 'lokal', 'exclusive', 'GENERAL SUPPLY & SERVICE INDONESIA (Gexpro), PT', '', '', '', '', '', '', '', ''),
(82, '2HAD0001', 'lokal', 'exclusive', 'HADORI SUGIARTO & REKAN ', '', '', '', '', '', '', '', ''),
(83, '2HAN0001-USD', 'overseas', 'exclusive', 'HANGZHOU HUATAI OPTIC TECH. CO., LTD.', '', '', '', '+86-571-85121625', '', '', '', ''),
(84, '2HAR0001', 'lokal', 'exclusive', 'HARAPAN WIDYATAMA PERTIWI, PT', '', '', '', '', '', '', '', ''),
(85, '2HIL0001', 'lokal', 'exclusive', 'HILMI BUDIYANTO, BPK', '', '', '', '', '', '', '', ''),
(86, '2HLT0001-USD', 'lokal', 'exclusive', 'HANGZHOU LAODE TRADING CO.,LTD', '', '', '', '0086-(0)571-61077787', '', '', '', ''),
(87, '2HMI0001-USD', 'overseas', 'exclusive', '2HMI0001-USD	NANJING HUAMAI TECHNOLOGY Co. Ltd.', '', '', '', '86-25-52707128', '', '', '', ''),
(88, '2HRD0001', 'lokal', 'exclusive', 'HARTROD', '', '', '', '', '', '', '', ''),
(89, '2HST0001', 'lokal', 'exclusive', 'HASTA YAHYA MALIK', '', '', '', '0816763433', '', '', '', ''),
(90, '2HYP0001', 'lokal', 'exclusive', 'HYPERMART ', '', '', '', '', '', '', '', ''),
(91, '2ICA0001', 'lokal', 'exclusive', 'INTI CAKRA ANUGRAH, PT', '', '', '', '(021) 34833472', '', '', '', ''),
(92, '2IDR0001', 'lokal', 'exclusive', 'INDORENT, PT', '', '', '', '021 - 86610999', '', '', '', ''),
(93, '2ILI0001', 'lokal', 'exclusive', 'ILIAS,Bpk', '', '', '', '', '', '', '', ''),
(94, '2IMT0001', 'lokal', 'exclusive', 'INTER MEDIA TELEKOMUNIKASI, PT', '', '', '', '62-21-80873661', '', '', '', ''),
(95, '2IND0001', 'lokal', 'exclusive', 'INDO INTERNET, PT', '', '', '', '021 - 73882525', '', '', '', ''),
(96, '2IND0002', 'lokal', 'exclusive', 'INDRAPURI WAHANA ASIA, PT ', '', '', '', '021 - 72781911', '', '', '', ''),
(97, '2INF0001', 'lokal', 'exclusive', 'INFORMA INDONESIA', '', '', '', '', '', '', '', ''),
(98, '2INT0001', 'lokal', 'exclusive', 'INTIME PARIS VAN JAVA ', '', '', '', '', '', '', '', ''),
(99, '2IOT0001', 'lokal', 'exclusive', 'INDONESIA OPTIC TECHNOLOGY, PT', '', '', '', '+62 22 8778 4541', '', '', '', ''),
(100, '2ISA0001', 'lokal', 'exclusive', 'ISA NASUTION, Bpk', '', '', '', '', '', '', '', ''),
(101, '2ITH0001', 'lokal', 'exclusive', 'INTI HEKSA, PT', '', '', '', '', '', '', '', ''),
(102, '2JEN0001', 'lokal', 'exclusive', 'JENDELA TOURS & TRAVEL ', '', '', '', '021-2702702', '', '', '', ''),
(103, '2JFO0001-USD', 'overseas', 'exclusive', 'SHENZHEN JIAFU OPTICAL COMMUNICATION CO., LTD', '', '', '', '86-755-8357 0642', '', '', '', ''),
(104, '2JKI0001', 'lokal', 'exclusive', 'JARINGAN KOMUNIKASI INDONESIA, PT', '', '', '', '081586826553', '', '', '', ''),
(105, '2JOT0001-USD', 'overseas', 'exclusive', 'JOINTWIT OPTOELECTRONIC TECH. CO., LTD', '', '', '', '86-21-51591629', '', '', '', ''),
(106, '2JPC0001', 'lokal', 'exclusive', 'JIANGXI POTELECOM CABLE Co., Ltd.', '', '', '', '+86 7918347287', '', '', '', ''),
(107, '2KAT0001', 'lokal', 'exclusive', 'KIAT ABADI TEKNIK, CV', '', '', '', '', '', '', '', ''),
(108, '2KEM0001', 'lokal', 'exclusive', 'KEMASINDO CEMERLANG, PT', '', '', '', '021-87974213', '', '', '', ''),
(109, '2KIA0001', 'lokal', 'exclusive', 'KIANIS PRATAMA, PT', '', '', '', '021-4683 0705', '', '', '', ''),
(110, '2KJP0001', 'lokal', 'exclusive', 'KJPP KARMANTO & REKAN ', '', '', '', '021 - 80885003', '', '', '', ''),
(111, '2KKA0001', 'lokal', 'exclusive', 'KOPERASI KARYAWAN ALITA', '', '', '', '', '', '', '', ''),
(112, '2KUN0001', 'lokal', 'exclusive', 'KUN ADI WIDODO, BPK', '', '', '', '', '', '', '', ''),
(113, '2LAK0001', 'lokal', 'exclusive', 'LENTERA AGUNG KENCANA, PT', '', '', '', '021-6586 8058', '', '', '', ''),
(114, '2LAR0001', 'lokal', 'exclusive', 'LARYZZA FLORAL GALLERY', '', '', '', '021-7227222', '', '', '', ''),
(115, '2LJK0001', 'lokal', 'exclusive', 'LINA JAYA KOMPUTER', '', '', '', '', '', '', '', ''),
(116, '2LKM0001', 'lokal', 'exclusive', 'LOKAL MARKET', '', '', '', '', '', '', '', ''),
(117, '2LMM0001', 'lokal', 'exclusive', 'LASER METAL MANDIRI, PT', '', '', '', '(021) 89833220', '', '', '', ''),
(118, '2LNT0001', 'lokal', 'exclusive', 'LENTERA SURYA ABADI, PT', '', '', '', '', '', '', '', ''),
(119, '2LTK0001-USD', 'overseas', 'exclusive', 'LIGHT KING CO. LTD', '', '', '', '886-2-29181010', '', '', '', ''),
(120, '2M2L0001', 'lokal', 'exclusive', 'M2-LESTARI', '', '', '', '', '', '', '', ''),
(121, '2MAE0001', 'lokal', 'exclusive', 'MILENIA ARMADA EKSPRESS, PT', '', '', '', '', '', '', '', ''),
(122, '2MAJ0001', 'lokal', 'exclusive', 'MAJU JAYA, CV', '', '', '', '022-88883522', '', '', '', ''),
(123, '2MAJ0002', 'lokal', 'exclusive', 'MAJU JAYA TEKNOLOGI, PT', '', '', '', '', '', '', '', ''),
(124, '2MAS0001', 'lokal', 'exclusive', 'MITRA AKTUARI SOLUSI', '', '', '', '+62 21 3508535', '', '', '', ''),
(125, '2MDC0001', 'lokal', 'exclusive', 'MD CREATION', '', '', '', '', '', '', '', ''),
(126, '2MED0001', 'lokal', 'exclusive', 'MEDIA ADHIKARYA GEMPITA, PT', '', '', '', '', '', '', '', ''),
(127, '2MEG0001', 'lokal', 'exclusive', 'MEGA KREASI UTAMA, CV', '', '', '', '', '', '', '', ''),
(128, '2MEN0001', 'lokal', 'exclusive', 'MENARA ASIA GLOBAL, PT', '', '', '', '', '', '', '', ''),
(129, '2MER0001', 'lokal', 'exclusive', 'MERBAU PRIMA SAKTI, PT', '', '', '', '62-21-5858309', '', '', '', ''),
(130, '2MET0001', 'lokal', 'exclusive', 'METRO TARA, PT', '', '', '', '', '', '', '', ''),
(131, '2MGJ0001', 'lokal', 'exclusive', 'MULTI GROW JAYA, PT', '', '', '', '021-29569788', '', '', '', ''),
(132, '2MIC0001', 'lokal', 'exclusive', 'MICRO CABLE SOLUTION CO.,Ltd', '', '', '', '+86-21-3872 6791 / 6792', '', '', '', ''),
(133, '2MIL0001-USD', 'overseas', 'exclusive', 'MILLIKEN INFRASTRUCTURE SOLUTIONS, LLC', '', '', '', '+65 6593 1332', '', '', '', ''),
(134, '2MIT0001', 'lokal', 'exclusive', 'MITRA MAKMUR SAHABAT, PT', '', '', '', '', '', '', '', ''),
(135, '2MJP0001', 'lokal', 'exclusive', 'MULTIPRO JAYA PRIMA, PT', '', '', '', '021- 6627 567', '', '', '', ''),
(136, '2MMA0001', 'lokal', 'exclusive', 'MANDARA MULYAGRAHA ADHIKA, PT', '', '', '', '', '', '', '', ''),
(137, '2MOD0001-USD', 'overseas', 'exclusive', 'MODUS', '', '', '', '', '', '', '', ''),
(138, '2MSA0001', 'lokal', 'exclusive', 'MITRA SELARAS ADVERTISING', '', '', '', '021-68003013', '', '', '', ''),
(139, '2MTM0001', 'lokal', 'exclusive', 'MEDIA TELEKOMUNIKASI MANDIRI, PT', '', '', '', '', '', '', '', ''),
(140, '2MUL0001', 'lokal', 'exclusive', 'MULTICOM PERSADA INTERNATIONAL - MUGEN FINGERPRINT, PT', '', '', '', '021-22543009', '', '', '', ''),
(141, '2MVP0001', 'lokal', 'exclusive', 'MITSINDO VISUAL PRATAMA, PT', '', '', '', '021-6692467', '', '', '', ''),
(142, '2NAN0001', 'lokal', 'exclusive', 'NANA SERVICE', '', '', '', '021 - 54360405', '', '', '', ''),
(143, '2NAS0001', 'lokal', 'exclusive', 'NASIO KARYA PRATAMA, PT', '', '', '', '021 - 7901935', '', '', '', ''),
(144, '2NES0001', 'lokal', 'exclusive', 'NETWORK ENGINEERING SOLUSINDO, PT', '', '', '', '021 57931680', '', '', '', ''),
(145, '2NTK0001', 'lokal', 'exclusive', 'NATA KREASI, CV', '', '', '', '', '', '', '', ''),
(146, '2NUT0001', 'lokal', 'exclusive', 'NUTECH INTEGRASI, PT', '', '', '', '', '', '', '', ''),
(147, '2NWC001-USD', 'overseas', 'exclusive', 'NETWORK CABLE CO. LTD.', '', '', '', '82-31-4643777', '', '', '', ''),
(148, '2OMN0001', 'lokal', 'exclusive', 'OMNIA TELLUS, CV', '', '', '', '', '', '', '', ''),
(149, '2ORB0001', 'lokal', 'exclusive', 'ORBIT, CV', '', '', '', '', '', '', '', ''),
(150, '2PAN0001', 'lokal', 'exclusive', 'PANCA BUANA', '', '', '', '', '', '', '', ''),
(151, '2PAR0001', 'lokal', 'exclusive', 'PARADISE COMMUNICATIONS, PT', '', '', '', '021 574 7063', '', '', '', ''),
(152, '2PDM0001', 'lokal', 'exclusive', 'PD MERPATI ', '', '', '', '021 - 7946126', '', '', '', ''),
(153, '2PJA0001', 'lokal', 'exclusive', 'PRIMA JAYA ABADI, CV', '', '', '', '021-7310285', '', '', '', ''),
(154, '2PLM0001', 'lokal', 'exclusive', 'PILAR MANDIRI, PT', '', '', '', '', '', '', '', ''),
(155, '2PNS0001', 'lokal', 'exclusive', 'PUTRA NUANSA SURYANUSA, PT.', '', '', '', '62-21-6295696', '', '', '', ''),
(156, '2PRA0001', 'lokal', 'exclusive', 'PRATAMA TEKNIK', '', '', '', '', '', '', '', ''),
(157, '2PUT0001', 'lokal', 'exclusive', 'PUTERATEL PERKASA, CV', '', '', '', '021-6511912', '', '', '', ''),
(158, '2PUT0002', 'lokal', 'exclusive', 'PUTERATEL ANDALAN SUKSES, PT', '', '', '', '', '', '', '', ''),
(159, '2PWM0001', 'lokal', 'exclusive', ' PRADANA WANA MANDIRI, CV  ', '', '', '', '', '', '', '', ''),
(160, '2RAS0001', 'lokal', 'exclusive', 'RAS ACTUARIAL CONSULTING, PT ', '', '', '', '', '', '', '', ''),
(161, '2RET0001', 'lokal', 'exclusive', 'RETAILINDO TECHNOLOGY, PT', '', '', '', '021-3440717', '', '', '', ''),
(162, '2RMT0001-USD', 'overseas', 'exclusive', 'RM TECH CO., LTD', '', '', '', '+82 70 7004 2802  ', '', '', '', ''),
(163, '2SAR0001', 'lokal', 'exclusive', 'SARANA SUKSES BERSAMA, PT', '', '', '', '021-99592551', '', '', '', ''),
(164, '2SDI0001', 'lokal', 'exclusive', 'SUMBER DATA INDONESIA, PT', '', '', '', '+622183708875', '', '', '', ''),
(165, '2SER0001', 'lokal', 'exclusive', 'SERASI AUTORAYA, PT', '', '', '', '021-8404040', '', '', '', ''),
(166, '2SHE0001-USD', 'overseas', 'exclusive', 'SHENZHEN HWNET TIMES TECH CO.,Ltd', '', '', '', '+86-755-83265948', '', '', '', ''),
(167, '2SID0001', 'lokal', 'exclusive', 'SIDAJAYA SAMPURNA RAHARJA, PT', '', '', '', '021-6342370', '', '', '', ''),
(168, '2SID0002', 'lokal', 'exclusive', 'SIDO AGUNG MANDIRI, PT', '', '', '', '', '', '', '', ''),
(169, '2SJE0001', 'lokal', 'exclusive', 'SANTOSA JAYA EKSPRESS, PT', '', '', '', '021-58905340-41', '', '', '', ''),
(170, '2SJU0001', 'lokal', 'exclusive', 'SARANA JANESIA UTAMA, PT ', '', '', '', '(022) 7322556', '', '', '', ''),
(171, '2SMG0001', 'lokal', 'exclusive', 'SMART GLOBAL', '', '', '', '', '', '', '', ''),
(172, '2SMP0001', 'lokal', 'exclusive', 'SAMPAI EXPRESS SERVICE AGENCIES PTE. LTD', '', '', '', '65-67435051', '', '', '', ''),
(173, '2SMS0001', 'lokal', 'exclusive', 'SEDAYA MITRA SEJAHTERA', '', '', '', '', '', '', '', ''),
(174, '2SMV0001-USD', 'overseas', 'exclusive', 'SUMAVISION TECHNOLOGY CO. LTD.', '', '', '', '+86 10 82345871', '', '', '', ''),
(175, '2SNS0001-USD', 'lokal', 'exclusive', 'SUNSEA TELECOMMUNICATIONS CO. LTD.', '', '', '', '86-755 27521988', '', '', '', ''),
(176, '2SPO0001', 'lokal', 'exclusive', 'SPOTELINDO MITRA UTAMA, PT', '', '', '', '', '', '', '', ''),
(177, '2STI0001', 'lokal', 'exclusive', 'SISTEMA INDONESIA, PT', '', '', '', '', '', '', '', ''),
(178, '2STK0001', 'lokal', 'exclusive', 'SINTATA KARYASARI, PT', '', '', '', '', '', '', '', ''),
(179, '2SUM0001', 'lokal', 'exclusive', 'SUMITOMO ELECTRIC INTERCONNECT PTE.LTD', '', '', '', '65 - 62613388', '', '', '', ''),
(180, '2SUR0001', 'lokal', 'exclusive', 'SURYA CIPTA LESTARI I', '', '', '', '', '', '', '', ''),
(181, '2TAI0001', 'lokal', 'exclusive', 'TAIACE INDONESIA, PT', '', '', '', '021- 89844493', '', '', '', ''),
(182, '2TDS0001', 'lokal', 'exclusive', 'TRANS DATA SATKOMINDO, PT', '', '', '', '62-21-3458687', '', '', '', ''),
(183, '2TEL0001', 'lokal', 'exclusive', 'TELAGA PALMA ANUGERAH, PT', '', '', '', '021 - 4715701', '', '', '', ''),
(184, '2TEN0001', 'lokal', 'exclusive', 'TENMA INDONESIA, PT', '', '', '', '', '', '', '', ''),
(185, '2TEN0002', 'lokal', 'exclusive', 'TENT MITRA NUSANTARA, PT.', '', '', '', '', '', '', '', ''),
(186, '2TKI0001', 'lokal', 'exclusive', 'TOKO KENARI', '', '', '', '', '', '', '', ''),
(187, '2TKJ0001', 'lokal', 'exclusive', 'TOKO KURNIA JAYA', '', '', '', '', '', '', '', ''),
(188, '2TLE0001', 'lokal', 'exclusive', 'TRANSTAMA LOGISTICS EXPRESS, PT', '', '', '', '62-21-57852609', '', '', '', ''),
(189, '2TMB0001', 'lokal', 'exclusive', 'TOKO MEDIA BAJA', '', '', '', '', '', '', '', ''),
(190, '2TOK0001', 'lokal', 'exclusive', 'TOKO SEDAYA MITRA ', '', '', '', '', '', '', '', ''),
(191, '2TPG0001', 'lokal', 'exclusive', 'TEKNIK TEPAT GUNA, PT', '', '', '', '', '', '', '', ''),
(192, '2TRA0001', 'lokal', 'exclusive', 'TRANSTEL UNIVERSAL, PT', '', '', '', '021-45846292', '', '', '', ''),
(193, '2TRI0001', 'lokal', 'exclusive', 'TRIBHUANA GARDA SAKTI, PT', '', '', '', '', '', '', '', ''),
(194, '2TSJ0001', 'lokal', 'exclusive', 'TOKO SUMBER JAYA', '', '', '', '', '', '', '', ''),
(195, '2TSM0001', 'lokal', 'exclusive', 'TRI SATKOM MANDIRI, PT.', '', '', '', '021 8835 2789 ', '', '', '', ''),
(196, '2TSS0001', 'lokal', 'exclusive', 'TOKO SEDAYA MITRA SEJAHTERA', '', '', '', '', '', '', '', ''),
(197, '2TSU0001', 'lokal', 'exclusive', 'TRIASA UTAMA, CV', '', '', '', '62-21-71526564', '', '', '', ''),
(198, '2TTA0001', 'lokal', 'exclusive', 'TOKO TEKNIK ABADI', '', '', '', '', '', '', '', ''),
(199, '2TTG0001', 'lokal', 'exclusive', 'TATANG, Bpk', '', '', '', '', '', '', '', ''),
(200, '2TUN0001', 'lokal', 'exclusive', 'TUNAS SEJAHTERA LOGISTICS, PT', '', '', '', '', '', '', '', ''),
(201, '2UBS0001', 'lokal', 'exclusive', 'UNGGUL BISNIS SOLUSINDO, PT', '', '', '', '', '', '', '', ''),
(202, '2UDM0001', 'lokal', 'exclusive', 'UD. MORI SEJAHTERA', '', '', '', '', '', '', '', ''),
(203, '2URA0001', 'lokal', 'exclusive', 'URASIMA NASA KARYA, PT', '', '', '', '021 - 82414221', '', '', '', ''),
(205, '2WAH0001', 'lokal', 'exclusive', 'WAHYU GANESHA, PT', '', '', '', '021-8489449', '', '', '', ''),
(206, '2WIR0001', 'lokal', 'exclusive', 'WIRALAND PROPERTY GROUP ', '', '', '', '061 - 80025888', '', '', '', ''),
(207, '2WIY0001', 'lokal', 'exclusive', 'WIYAKA, PT', '', '', '', '', '', '', '', ''),
(208, '2WKU0001', 'lokal', 'exclusive', 'WAHYU KREASI UTAMA, PT ', '', '', '', '021 - 4354267', '', '', '', ''),
(209, '2WNT001-USD', 'overseas', 'exclusive', 'WANTUS Co. Ltd. ', '', '', '', '+82 32 674 5525', '', '', '', ''),
(210, '2YAN0001', 'lokal', 'exclusive', 'YANTO YADANI, Bpk ', '', '', '', '08127905430', '', '', '', ''),
(211, '2YAN0002-USD', 'lokal', 'exclusive', 'YANGTZE OPTICAL FIBRE AND CABLE JOINT STOCK LIMITED COMPANY', '', '', '', '+86 27 6788 7327', '', '', '', ''),
(212, '2YPS0001', 'lokal', 'exclusive', 'YARIS PHILIA SEJAHTERA, PT', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dm_supplier_subfield`
--

CREATE TABLE IF NOT EXISTS `tbl_dm_supplier_subfield` (
`id` int(11) NOT NULL,
  `id_supplier` int(11) NOT NULL,
  `pic` varchar(100) NOT NULL,
  `title` varchar(50) NOT NULL,
  `email_pic` varchar(100) NOT NULL,
  `mobile1` varchar(50) NOT NULL,
  `mobile2` varchar(50) NOT NULL,
  `residence` varchar(255) NOT NULL,
  `birthday` varchar(100) NOT NULL,
  `whatsapp` varchar(50) NOT NULL,
  `skype` varchar(50) NOT NULL,
  `bbm` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_group`
--

CREATE TABLE IF NOT EXISTS `tbl_group` (
`id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `d1` int(11) NOT NULL,
  `d2` int(11) NOT NULL,
  `d3` int(11) NOT NULL,
  `d4` int(11) NOT NULL,
  `d5` int(11) NOT NULL,
  `d6` int(11) NOT NULL,
  `d7` int(11) NOT NULL,
  `d8` int(11) NOT NULL,
  `d9` int(11) NOT NULL,
  `d10` int(11) NOT NULL,
  `d11` int(11) NOT NULL,
  `d12` int(11) NOT NULL,
  `d13` int(11) NOT NULL,
  `d14` int(11) NOT NULL,
  `d15` int(11) NOT NULL,
  `d16` int(11) NOT NULL,
  `d17` int(11) NOT NULL,
  `d18` int(11) NOT NULL,
  `d19` int(11) NOT NULL,
  `d20` int(11) NOT NULL,
  `d21` int(11) NOT NULL,
  `d22` int(11) NOT NULL,
  `d23` int(11) NOT NULL,
  `d24` int(11) NOT NULL,
  `d25` int(11) NOT NULL,
  `d26` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_group`
--

INSERT INTO `tbl_group` (`id`, `name`, `d1`, `d2`, `d3`, `d4`, `d5`, `d6`, `d7`, `d8`, `d9`, `d10`, `d11`, `d12`, `d13`, `d14`, `d15`, `d16`, `d17`, `d18`, `d19`, `d20`, `d21`, `d22`, `d23`, `d24`, `d25`, `d26`) VALUES
(1, 'BOD', 1, 0, 0, 1, 1, 0, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 1, 1, 0, 0, 0),
(2, 'GM', 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2),
(3, 'Sales Mgr', 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 1, 1, 0, 0),
(4, 'AM', 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 1, 2, 0, 0),
(5, 'Admin', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(6, 'Spv Ops', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(7, 'Pch', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(8, 'Log', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(9, 'Ops', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(10, 'finance', 1, 0, 0, 0, 0, 0, 0, 0, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_op_hs`
--

CREATE TABLE IF NOT EXISTS `tbl_op_hs` (
`id` int(11) NOT NULL,
  `code` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `uraian` text NOT NULL,
  `duty` varchar(255) NOT NULL,
  `lartas` varchar(255) NOT NULL,
  `jenis` varchar(255) NOT NULL,
  `catatan` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_op_hs`
--

INSERT INTO `tbl_op_hs` (`id`, `code`, `description`, `uraian`, `duty`, `lartas`, `jenis`, `catatan`) VALUES
(2, 'C01', '2', '3', '4', '5', '6', '7');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_op_incoming`
--

CREATE TABLE IF NOT EXISTS `tbl_op_incoming` (
`id` int(11) NOT NULL,
  `nomer` varchar(255) NOT NULL,
  `tanggal` varchar(255) NOT NULL,
  `tujuan` varchar(255) NOT NULL,
  `perihal` varchar(255) NOT NULL,
  `terima` varchar(255) NOT NULL,
  `pembuat` varchar(255) NOT NULL,
  `letak` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_op_incoming`
--

INSERT INTO `tbl_op_incoming` (`id`, `nomer`, `tanggal`, `tujuan`, `perihal`, `terima`, `pembuat`, `letak`, `file`) VALUES
(4, 'asdf', '01 Jan 2016', 'asdf', 'asdf', '31 Dec 2015', 'asdfasdf', 'asdf', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_op_internal_memo`
--

CREATE TABLE IF NOT EXISTS `tbl_op_internal_memo` (
`id` int(11) NOT NULL,
  `memo_id` varchar(255) NOT NULL,
  `kepada` varchar(255) NOT NULL,
  `tembusan` varchar(255) NOT NULL,
  `devisi` varchar(255) NOT NULL,
  `tempo` varchar(255) NOT NULL,
  `pembayaran` varchar(255) NOT NULL,
  `diajukan` varchar(255) NOT NULL,
  `diketahui` varchar(255) NOT NULL,
  `diverifikasi` varchar(255) NOT NULL,
  `ref` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_op_internal_memo`
--

INSERT INTO `tbl_op_internal_memo` (`id`, `memo_id`, `kepada`, `tembusan`, `devisi`, `tempo`, `pembayaran`, `diajukan`, `diketahui`, `diverifikasi`, `ref`) VALUES
(3, '01', 'Gia Nuralamsyah', 'Gia Nuralamsyah', '1.Wireline', '2016-Jan-12', 'cash', 'Gia Nuralamsyah', 'Gia Nuralamsyah', 'Gia Nuralamsyah', '02');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_op_internal_memo_subfield`
--

CREATE TABLE IF NOT EXISTS `tbl_op_internal_memo_subfield` (
`id` int(11) NOT NULL,
  `id_memo` int(11) NOT NULL,
  `cost_id` varchar(255) NOT NULL,
  `vendor` varchar(255) NOT NULL,
  `rate` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `uraian` varchar(255) NOT NULL,
  `invoice` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_op_internal_memo_subfield`
--

INSERT INTO `tbl_op_internal_memo_subfield` (`id`, `id_memo`, `cost_id`, `vendor`, `rate`, `amount`, `uraian`, `invoice`) VALUES
(4, 2, '6. Facilitator''s Fee', 'forwarder', 'USD', '1200000', 'rame', '001');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_op_outgoing`
--

CREATE TABLE IF NOT EXISTS `tbl_op_outgoing` (
`id` int(11) NOT NULL,
  `nomer` varchar(255) NOT NULL,
  `tanggal` varchar(255) NOT NULL,
  `tujuan` varchar(255) NOT NULL,
  `perihal` varchar(255) NOT NULL,
  `terima` varchar(255) NOT NULL,
  `pembuat` varchar(255) NOT NULL,
  `jawab` varchar(255) NOT NULL,
  `letak` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_op_outgoing`
--

INSERT INTO `tbl_op_outgoing` (`id`, `nomer`, `tanggal`, `tujuan`, `perihal`, `terima`, `pembuat`, `jawab`, `letak`, `file`) VALUES
(4, '1', '06 Jan 2016', 'HFDFGHJK', 'GFYHGJU', '0', 'Gia Nuralamsyah', 'JIKKKK', 'FG', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_op_price_list`
--

CREATE TABLE IF NOT EXISTS `tbl_op_price_list` (
`id` int(11) NOT NULL,
  `division` varchar(255) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `item_name` varchar(255) DEFAULT NULL,
  `mou` varchar(255) DEFAULT NULL,
  `brand` varchar(255) DEFAULT NULL,
  `source` varchar(255) DEFAULT NULL,
  `incoterm` varchar(255) DEFAULT NULL,
  `currency` varchar(255) DEFAULT NULL,
  `purchase_price` decimal(10,0) DEFAULT NULL,
  `perc_FTC` varchar(255) DEFAULT NULL,
  `FTC` decimal(10,0) DEFAULT NULL,
  `DDP_price` decimal(10,0) DEFAULT NULL,
  `DDP_IDR` decimal(10,0) DEFAULT NULL,
  `perc_crosscomp` varchar(255) DEFAULT NULL,
  `crosscomp_price` decimal(10,0) DEFAULT NULL,
  `perc_pricelist` varchar(255) DEFAULT NULL,
  `pricelist` decimal(10,0) DEFAULT NULL,
  `perc_cash` varchar(255) DEFAULT NULL,
  `cash` decimal(10,0) DEFAULT NULL,
  `perc_skbdn` varchar(255) DEFAULT NULL,
  `skbdn_price` decimal(10,0) DEFAULT NULL,
  `perc_credit_1` varchar(255) DEFAULT NULL,
  `credit_1` decimal(10,0) DEFAULT NULL,
  `perc_credit_2` varchar(255) DEFAULT NULL,
  `credit_2` decimal(10,0) DEFAULT NULL,
  `perc_credit_3` varchar(255) DEFAULT NULL,
  `credit_3` decimal(10,0) DEFAULT NULL,
  `perc_credit_4` varchar(255) DEFAULT NULL,
  `credit_4` decimal(10,0) DEFAULT NULL,
  `special_condition` text,
  `khs_price` decimal(10,0) DEFAULT NULL,
  `perc_price_khs` varchar(255) DEFAULT NULL,
  `perc_nett_khs` varchar(255) DEFAULT NULL,
  `competitor_1` decimal(10,0) DEFAULT NULL,
  `competitor_name_1` varchar(255) DEFAULT NULL,
  `competitor_2` decimal(10,0) DEFAULT NULL,
  `competitor_name_2` varchar(255) DEFAULT NULL,
  `competitor_3` decimal(10,0) DEFAULT NULL,
  `competitor_name_3` varchar(255) NOT NULL,
  `created_dt` varchar(255) DEFAULT NULL,
  `presented_dt` varchar(255) DEFAULT NULL,
  `shared_dt` varchar(255) DEFAULT NULL,
  `effective_from` varchar(255) DEFAULT NULL,
  `effective_till` varchar(255) DEFAULT NULL,
  `conv_rate_USD` varchar(255) DEFAULT NULL,
  `conv_rate_SGD` varchar(255) DEFAULT NULL,
  `conv_rate_EUR` varchar(255) DEFAULT NULL,
  `price_term` text,
  `delivery_term` text,
  `validity_term` text,
  `other_term` text
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_op_price_list`
--

INSERT INTO `tbl_op_price_list` (`id`, `division`, `category`, `item_name`, `mou`, `brand`, `source`, `incoterm`, `currency`, `purchase_price`, `perc_FTC`, `FTC`, `DDP_price`, `DDP_IDR`, `perc_crosscomp`, `crosscomp_price`, `perc_pricelist`, `pricelist`, `perc_cash`, `cash`, `perc_skbdn`, `skbdn_price`, `perc_credit_1`, `credit_1`, `perc_credit_2`, `credit_2`, `perc_credit_3`, `credit_3`, `perc_credit_4`, `credit_4`, `special_condition`, `khs_price`, `perc_price_khs`, `perc_nett_khs`, `competitor_1`, `competitor_name_1`, `competitor_2`, `competitor_name_2`, `competitor_3`, `competitor_name_3`, `created_dt`, `presented_dt`, `shared_dt`, `effective_from`, `effective_till`, `conv_rate_USD`, `conv_rate_SGD`, `conv_rate_EUR`, `price_term`, `delivery_term`, `validity_term`, `other_term`) VALUES
(1, '123', '1231', '13', '132', '13', '131', '32', '1', '31', '321', '3213', '123', '1', '32132', '1', '321', '231', '32', '132', '12', '31', '32', '123', '12', '31', '23', '132', '12', '31', '32', '123', '123', '123', '23', '1', '32', '132', '132', '', '123', '12', '3', '321', '23', '123', '321', '32', '11', '12', '12', '32'),
(3, 'WLS', 'ADAPTOR WLS', 'Adaptor Din-Female to N-Male', 'Adaptor Din-Female to N-Male', 'Adaptor Din-Female to N-Male', 'Local', 'EXW', 'USD', '12300', '10', '1230', NULL, NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', '0', NULL, NULL, '0', '', '0', '', '0', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(4, 'WLN', 'ADAPTOR WLS', 'Adaptor Din-Female to N-Male', 'Adaptor Din-Female to N-Male', 'Adaptor Din-Female to N-Male', 'Local', 'EXW', 'USD', '100', '10', '10', '110', '11000', '10', '12222', '10', '12222', '10', '12222', '10', '12222', '10', '12222', '10', '12222', '10', '12222', '10', '11000', '100', '100', '-121.22222222222', '-121.22222222222', '100', '100', '100', '100', '100', '100', '01 Jan 2016', '01 Jan 2016', '01 Jan 2016', '01 Jan 2016', '01 Jan 2016', '100', '100', '100', '100', '100', '100', '100');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_position`
--

CREATE TABLE IF NOT EXISTS `tbl_position` (
`id` int(11) NOT NULL,
  `position` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_position`
--

INSERT INTO `tbl_position` (`id`, `position`) VALUES
(1, 'Account Manager'),
(2, 'Other');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sale_direksi`
--

CREATE TABLE IF NOT EXISTS `tbl_sale_direksi` (
`id` int(11) NOT NULL,
  `no` text NOT NULL,
  `date` text NOT NULL,
  `add_to` text NOT NULL,
  `subject` text NOT NULL,
  `masalah` text NOT NULL,
  `pertimbangan` text NOT NULL,
  `usulan` text NOT NULL,
  `file` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sale_incoming`
--

CREATE TABLE IF NOT EXISTS `tbl_sale_incoming` (
`id` int(11) NOT NULL,
  `nomer` varchar(255) NOT NULL,
  `tanggal` varchar(255) NOT NULL,
  `tujuan` varchar(255) NOT NULL,
  `perihal` varchar(255) NOT NULL,
  `terima` varchar(255) NOT NULL,
  `pembuat` varchar(255) NOT NULL,
  `letak` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_sale_incoming`
--

INSERT INTO `tbl_sale_incoming` (`id`, `nomer`, `tanggal`, `tujuan`, `perihal`, `terima`, `pembuat`, `letak`, `file`) VALUES
(1, 'xxxxxx', '01 Feb 2016', 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx', 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx', '29 Feb 2016', 'xxxxxxxxxxxxxx', 'xxxxxxxxxxxxxxxx', 'image/s_incoming/db_dbs(1).sql'),
(2, 'ccccccccc', '02 Feb 2016', 'ebelum membuat form ini, tampilan di depan adalah tabel tampilan daftar Internal Memo yang telah dibuat, merupakan generate dari field2 pada form tersebut', 'ebelum membuat form ini, tampilan di depan adalah tabel tampilan daftar Internal Memo yang telah dibuat, merupakan generate dari field2 pada form tersebut', '28 Feb 2016', 'ebelum membuat form ini, tampilan di depan adalah tabel tampilan daftar Internal Memo yang telah dibuat, merupakan generate dari field2 pada form tersebut', 'ebelum membuat form ini, tampilan di depan adalah tabel tampilan daftar Internal Memo yang telah dibuat, merupakan generate dari field2 pada form tersebut', 'image/s_incoming/tbl_multi.sql');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sale_internal_memo`
--

CREATE TABLE IF NOT EXISTS `tbl_sale_internal_memo` (
`id` int(11) NOT NULL,
  `memo_id` varchar(255) NOT NULL,
  `kepada` varchar(255) NOT NULL,
  `tembusan` varchar(255) NOT NULL,
  `devisi` varchar(255) NOT NULL,
  `tempo` varchar(255) NOT NULL,
  `pembayaran` varchar(255) NOT NULL,
  `diajukan` varchar(255) NOT NULL,
  `diketahui` varchar(255) NOT NULL,
  `diverifikasi` varchar(255) NOT NULL,
  `ref` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_sale_internal_memo`
--

INSERT INTO `tbl_sale_internal_memo` (`id`, `memo_id`, `kepada`, `tembusan`, `devisi`, `tempo`, `pembayaran`, `diajukan`, `diketahui`, `diverifikasi`, `ref`) VALUES
(3, 'we', 'Gia Nuralamsyah', 'Gia Nuralamsyah', '1.Wireline', '2016-01-01', 'w21r', 'Gia Nuralamsyah', 'Gia Nuralamsyah', 'Gia Nuralamsyah', 'www');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sale_internal_memo_subfield`
--

CREATE TABLE IF NOT EXISTS `tbl_sale_internal_memo_subfield` (
`id` int(11) NOT NULL,
  `id_memo` int(11) NOT NULL,
  `cost_id` varchar(255) NOT NULL,
  `vendor` varchar(255) NOT NULL,
  `rate` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `uraian` varchar(255) NOT NULL,
  `invoice` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_sale_internal_memo_subfield`
--

INSERT INTO `tbl_sale_internal_memo_subfield` (`id`, `id_memo`, `cost_id`, `vendor`, `rate`, `amount`, `uraian`, `invoice`) VALUES
(4, 2, '6. Facilitator''s Fee', 'forwarder', 'USD', '1200000', 'rame', '001'),
(5, 1, '0', '0', '0', '0', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sale_outgoing`
--

CREATE TABLE IF NOT EXISTS `tbl_sale_outgoing` (
`id` int(11) NOT NULL,
  `nomer` varchar(255) NOT NULL,
  `tanggal` varchar(255) NOT NULL,
  `tujuan` varchar(255) NOT NULL,
  `perihal` varchar(255) NOT NULL,
  `terima` varchar(255) NOT NULL,
  `pembuat` varchar(255) NOT NULL,
  `jawab` varchar(255) NOT NULL,
  `letak` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL,
  `desc` text NOT NULL,
  `archive_code` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_sale_outgoing`
--

INSERT INTO `tbl_sale_outgoing` (`id`, `nomer`, `tanggal`, `tujuan`, `perihal`, `terima`, `pembuat`, `jawab`, `letak`, `file`, `desc`, `archive_code`) VALUES
(6, '1', '06 Jan 2016', 'MBVCX', 'UIJKL', '0', 'Gia Nuralamsyah', 'DFGHJKL', 'F4', '', '', ''),
(7, '2', '01 Mar 2016', 'bandung', '1', '0', 'Gia Nuralamsyah', '-', '-', 'image/s_outgoing/Elliptical Ends Horizontal Cylindrical Tank Volume.xlsx', '', ''),
(8, '3', '16 Mar 2016', '', 'a', '0', 'Gia Nuralamsyah', '', '', '', '', ''),
(9, '4', '08 Mar 2016', 'a', 'a', '0', 'Gia Nuralamsyah', 'a', 'a', '', 'a', 'a'),
(10, '5', '02 Mar 2016', '-', '-', '0', 'Gia Nuralamsyah', '-', '-', 'image/s_outgoing/Konsep Sales & Ops Dashboard(2).docx', '-', '-');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sale_so`
--

CREATE TABLE IF NOT EXISTS `tbl_sale_so` (
`id` int(11) NOT NULL,
  `so_no` varchar(255) NOT NULL,
  `so_date` varchar(255) NOT NULL,
  `po_no` varchar(255) NOT NULL,
  `po_date` varchar(255) NOT NULL,
  `customer_id` varchar(255) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `fax` varchar(255) NOT NULL,
  `am` varchar(255) NOT NULL,
  `division` varchar(255) NOT NULL,
  `operator` varchar(255) NOT NULL,
  `pn` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `payment_term` varchar(255) NOT NULL,
  `delivery_term` varchar(255) NOT NULL,
  `delivery_cost_term` varchar(255) NOT NULL,
  `other_term` varchar(255) NOT NULL,
  `other_status` varchar(255) NOT NULL,
  `softcopy` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_sale_so`
--

INSERT INTO `tbl_sale_so` (`id`, `so_no`, `so_date`, `po_no`, `po_date`, `customer_id`, `customer_name`, `address`, `phone`, `fax`, `am`, `division`, `operator`, `pn`, `description`, `payment_term`, `delivery_term`, `delivery_cost_term`, `other_term`, `other_status`, `softcopy`) VALUES
(3, 'SO-1', '01 Mar 2016', 'PO-11111111', '02 Mar 2016', 'a', '4', '-', '-', '-', '1', '', '1', '-', '-', '-', '-', '-', '-', '-', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sale_so_cost`
--

CREATE TABLE IF NOT EXISTS `tbl_sale_so_cost` (
`id` int(11) NOT NULL,
  `id_so` int(11) NOT NULL,
  `sales_com` varchar(255) NOT NULL,
  `sales` varchar(255) NOT NULL,
  `bank_interest` varchar(255) NOT NULL,
  `bank` varchar(255) NOT NULL,
  `transport` varchar(255) NOT NULL,
  `adm` varchar(255) NOT NULL,
  `other` varchar(255) NOT NULL,
  `extcom` varchar(255) NOT NULL,
  `extcom_pro` varchar(25) NOT NULL,
  `income` varchar(255) NOT NULL,
  `nett` varchar(255) NOT NULL,
  `receiver` varchar(255) NOT NULL,
  `approved` varchar(255) NOT NULL,
  `payment_date` varchar(255) NOT NULL,
  `through` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_sale_so_cost`
--

INSERT INTO `tbl_sale_so_cost` (`id`, `id_so`, `sales_com`, `sales`, `bank_interest`, `bank`, `transport`, `adm`, `other`, `extcom`, `extcom_pro`, `income`, `nett`, `receiver`, `approved`, `payment_date`, `through`) VALUES
(1, 1, '1', '1', '13 Jan 2016', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '13 Jan 2016', '16');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sale_so_delivery`
--

CREATE TABLE IF NOT EXISTS `tbl_sale_so_delivery` (
`id` int(11) NOT NULL,
  `id_so` varchar(255) NOT NULL,
  `do_no` varchar(255) NOT NULL,
  `do_date` varchar(255) NOT NULL,
  `delivery` varchar(255) NOT NULL,
  `delivery_by` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `method` varchar(255) NOT NULL,
  `awb_no` varchar(255) NOT NULL,
  `depart` varchar(255) NOT NULL,
  `received` varchar(255) NOT NULL,
  `received_by` varchar(255) NOT NULL,
  `nett` varchar(255) NOT NULL,
  `awb_file` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_sale_so_delivery`
--

INSERT INTO `tbl_sale_so_delivery` (`id`, `id_so`, `do_no`, `do_date`, `delivery`, `delivery_by`, `name`, `method`, `awb_no`, `depart`, `received`, `received_by`, `nett`, `awb_file`) VALUES
(1, '', '1', '03 Jan 2016', '02 Jan 2016', '2', '3', 'charter', '4', '5', '6', '7', '8', 'image/s_delivery/password.png'),
(2, '1', '1', '10 Jan 2016', '10 Jan 2016', '4', '5', 'land', '7', '8', '9', '10', '11', 'image/s_delivery/chosen-sprite.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sale_so_detail`
--

CREATE TABLE IF NOT EXISTS `tbl_sale_so_detail` (
`id` int(11) NOT NULL,
  `id_so` int(11) NOT NULL,
  `item` varchar(255) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `mou` varchar(255) NOT NULL,
  `qty` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `disc` varchar(255) NOT NULL,
  `nett` varchar(255) NOT NULL,
  `total` varchar(255) NOT NULL,
  `subtotal` varchar(255) NOT NULL,
  `discount` varchar(255) NOT NULL,
  `delivery` varchar(255) NOT NULL,
  `nett_tax` varchar(255) NOT NULL,
  `vat` varchar(255) NOT NULL,
  `grand_total` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sale_so_invoicing`
--

CREATE TABLE IF NOT EXISTS `tbl_sale_so_invoicing` (
`id` int(11) NOT NULL,
  `id_so` int(11) NOT NULL,
  `no` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `desc` varchar(255) NOT NULL,
  `due` varchar(255) NOT NULL,
  `sent` varchar(255) NOT NULL,
  `sent_by` varchar(255) NOT NULL,
  `received_by` varchar(255) NOT NULL,
  `received_date` varchar(255) NOT NULL,
  `receipt_no` varchar(255) NOT NULL,
  `receipt_file` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_sale_so_invoicing`
--

INSERT INTO `tbl_sale_so_invoicing` (`id`, `id_so`, `no`, `date`, `amount`, `desc`, `due`, `sent`, `sent_by`, `received_by`, `received_date`, `receipt_no`, `receipt_file`) VALUES
(1, 1, '121', '1 Jan 2016', '13123', 'asdas', '5 Jan 2016', 'asdas', 'asdsa', 'asdsa', '6 Jan 2016', '123213', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sale_so_payment`
--

CREATE TABLE IF NOT EXISTS `tbl_sale_so_payment` (
`id` int(11) NOT NULL,
  `id_so` int(11) NOT NULL,
  `reference` varchar(255) NOT NULL,
  `due_date` varchar(255) NOT NULL,
  `payment_date` varchar(255) NOT NULL,
  `through` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `account` varchar(255) NOT NULL,
  `remark` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_sale_so_payment`
--

INSERT INTO `tbl_sale_so_payment` (`id`, `id_so`, `reference`, `due_date`, `payment_date`, `through`, `amount`, `account`, `remark`) VALUES
(1, 1, 'dasdasd', '11/01/2015', '14/01/2016', 'asda', '13123', '123123', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_setting_tahun`
--

CREATE TABLE IF NOT EXISTS `tbl_setting_tahun` (
`id` int(11) NOT NULL,
  `tahun` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_setting_tahun`
--

INSERT INTO `tbl_setting_tahun` (`id`, `tahun`) VALUES
(1, '2016');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE IF NOT EXISTS `tbl_user` (
`id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `id_group` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `username`, `password`, `id_group`) VALUES
(1, 'gm', '7c4a8d09ca3762af61e59520943dc26494f8941b', 2),
(2, 'bod', '7c4a8d09ca3762af61e59520943dc26494f8941b', 1),
(3, 'sales', '7c4a8d09ca3762af61e59520943dc26494f8941b', 3),
(4, 'am', '7c4a8d09ca3762af61e59520943dc26494f8941b', 4),
(5, 'admin', '7c4a8d09ca3762af61e59520943dc26494f8941b', 5),
(6, 'spvops', '7c4a8d09ca3762af61e59520943dc26494f8941b', 6),
(7, 'pch', '7c4a8d09ca3762af61e59520943dc26494f8941b', 7),
(8, 'log', '7c4a8d09ca3762af61e59520943dc26494f8941b', 8),
(9, 'ops', '7c4a8d09ca3762af61e59520943dc26494f8941b', 9),
(10, 'finance', '7c4a8d09ca3762af61e59520943dc26494f8941b', 10);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_dm_agent`
--
ALTER TABLE `tbl_dm_agent`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_dm_agent_subfield`
--
ALTER TABLE `tbl_dm_agent_subfield`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_dm_brand`
--
ALTER TABLE `tbl_dm_brand`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_dm_budget`
--
ALTER TABLE `tbl_dm_budget`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_dm_creditor`
--
ALTER TABLE `tbl_dm_creditor`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_dm_customer`
--
ALTER TABLE `tbl_dm_customer`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_dm_customer_subfield`
--
ALTER TABLE `tbl_dm_customer_subfield`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_dm_forwarder`
--
ALTER TABLE `tbl_dm_forwarder`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_dm_forwarder_legal`
--
ALTER TABLE `tbl_dm_forwarder_legal`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_dm_forwarder_subfield`
--
ALTER TABLE `tbl_dm_forwarder_subfield`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_dm_item`
--
ALTER TABLE `tbl_dm_item`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_dm_operator`
--
ALTER TABLE `tbl_dm_operator`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_dm_personnel`
--
ALTER TABLE `tbl_dm_personnel`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_dm_stock`
--
ALTER TABLE `tbl_dm_stock`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_dm_supplier`
--
ALTER TABLE `tbl_dm_supplier`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_dm_supplier_subfield`
--
ALTER TABLE `tbl_dm_supplier_subfield`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_group`
--
ALTER TABLE `tbl_group`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_op_hs`
--
ALTER TABLE `tbl_op_hs`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_op_incoming`
--
ALTER TABLE `tbl_op_incoming`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_op_internal_memo`
--
ALTER TABLE `tbl_op_internal_memo`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_op_internal_memo_subfield`
--
ALTER TABLE `tbl_op_internal_memo_subfield`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_op_outgoing`
--
ALTER TABLE `tbl_op_outgoing`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_op_price_list`
--
ALTER TABLE `tbl_op_price_list`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_position`
--
ALTER TABLE `tbl_position`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_sale_direksi`
--
ALTER TABLE `tbl_sale_direksi`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_sale_incoming`
--
ALTER TABLE `tbl_sale_incoming`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_sale_internal_memo`
--
ALTER TABLE `tbl_sale_internal_memo`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_sale_internal_memo_subfield`
--
ALTER TABLE `tbl_sale_internal_memo_subfield`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_sale_outgoing`
--
ALTER TABLE `tbl_sale_outgoing`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_sale_so`
--
ALTER TABLE `tbl_sale_so`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_sale_so_cost`
--
ALTER TABLE `tbl_sale_so_cost`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_sale_so_delivery`
--
ALTER TABLE `tbl_sale_so_delivery`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_sale_so_detail`
--
ALTER TABLE `tbl_sale_so_detail`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_sale_so_invoicing`
--
ALTER TABLE `tbl_sale_so_invoicing`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_sale_so_payment`
--
ALTER TABLE `tbl_sale_so_payment`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_setting_tahun`
--
ALTER TABLE `tbl_setting_tahun`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_dm_agent`
--
ALTER TABLE `tbl_dm_agent`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_dm_agent_subfield`
--
ALTER TABLE `tbl_dm_agent_subfield`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_dm_brand`
--
ALTER TABLE `tbl_dm_brand`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_dm_budget`
--
ALTER TABLE `tbl_dm_budget`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_dm_creditor`
--
ALTER TABLE `tbl_dm_creditor`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_dm_customer`
--
ALTER TABLE `tbl_dm_customer`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=357;
--
-- AUTO_INCREMENT for table `tbl_dm_customer_subfield`
--
ALTER TABLE `tbl_dm_customer_subfield`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_dm_forwarder`
--
ALTER TABLE `tbl_dm_forwarder`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_dm_forwarder_legal`
--
ALTER TABLE `tbl_dm_forwarder_legal`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_dm_forwarder_subfield`
--
ALTER TABLE `tbl_dm_forwarder_subfield`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_dm_item`
--
ALTER TABLE `tbl_dm_item`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=378;
--
-- AUTO_INCREMENT for table `tbl_dm_operator`
--
ALTER TABLE `tbl_dm_operator`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_dm_personnel`
--
ALTER TABLE `tbl_dm_personnel`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_dm_stock`
--
ALTER TABLE `tbl_dm_stock`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_dm_supplier`
--
ALTER TABLE `tbl_dm_supplier`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=213;
--
-- AUTO_INCREMENT for table `tbl_dm_supplier_subfield`
--
ALTER TABLE `tbl_dm_supplier_subfield`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_group`
--
ALTER TABLE `tbl_group`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tbl_op_hs`
--
ALTER TABLE `tbl_op_hs`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_op_incoming`
--
ALTER TABLE `tbl_op_incoming`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_op_internal_memo`
--
ALTER TABLE `tbl_op_internal_memo`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_op_internal_memo_subfield`
--
ALTER TABLE `tbl_op_internal_memo_subfield`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_op_outgoing`
--
ALTER TABLE `tbl_op_outgoing`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_op_price_list`
--
ALTER TABLE `tbl_op_price_list`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_position`
--
ALTER TABLE `tbl_position`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_sale_direksi`
--
ALTER TABLE `tbl_sale_direksi`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_sale_incoming`
--
ALTER TABLE `tbl_sale_incoming`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_sale_internal_memo`
--
ALTER TABLE `tbl_sale_internal_memo`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_sale_internal_memo_subfield`
--
ALTER TABLE `tbl_sale_internal_memo_subfield`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_sale_outgoing`
--
ALTER TABLE `tbl_sale_outgoing`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tbl_sale_so`
--
ALTER TABLE `tbl_sale_so`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_sale_so_cost`
--
ALTER TABLE `tbl_sale_so_cost`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_sale_so_delivery`
--
ALTER TABLE `tbl_sale_so_delivery`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_sale_so_detail`
--
ALTER TABLE `tbl_sale_so_detail`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_sale_so_invoicing`
--
ALTER TABLE `tbl_sale_so_invoicing`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_sale_so_payment`
--
ALTER TABLE `tbl_sale_so_payment`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_setting_tahun`
--
ALTER TABLE `tbl_setting_tahun`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
