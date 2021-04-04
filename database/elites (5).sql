-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 04, 2021 at 09:17 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `elites`
--

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `id_event` int(11) NOT NULL,
  `nama_event` varchar(50) NOT NULL,
  `tanggal_post` date NOT NULL,
  `deskripsi` text NOT NULL,
  `foto_event` varchar(100) NOT NULL,
  `id_user` int(15) DEFAULT NULL,
  `lokasi` text NOT NULL,
  `venue` varchar(50) NOT NULL,
  `waktu` datetime NOT NULL,
  `harga_event` double NOT NULL,
  `kuota` int(11) NOT NULL,
  `keterangan` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id_event`, `nama_event`, `tanggal_post`, `deskripsi`, `foto_event`, `id_user`, `lokasi`, `venue`, `waktu`, `harga_event`, `kuota`, `keterangan`) VALUES
(12, 'Seminar TES Bersama Bisa', '2021-03-14', '<p>Alerts are available for any length of text, as well as an optional dismiss button. For proper styling, use one of the eight required contextual classes (e.g., .alert-success). For inline dismissal, use the alerts jQuery plugin.</p>\r\n', 'Event-20210314115344.jpg', 308211325, 'Jakarta', 'Jl. Cikutra', '2020-12-23 16:09:00', 100000, 20, 'POSTING'),
(14, 'Tips Pebisnis Keren', '2021-03-14', '<p>skakhsakhsa. sjajsajskaksahkhs.&nbsp;skakhsakhsa. sjajsajskaksahkhs.&nbsp;skakhsakhsa. sjajsajskaksahkhs.&nbsp;skakhsakhsa. sjajsajskaksahkhs.&nbsp;skakhsakhsa. sjajsajskaksahkhs.&nbsp;skakhsakhsa. sjajsajskaksahkhs.&nbsp;skakhsakhsa. sjajsajskaksahkhs.&nbsp;skakhsakhsa. sjajsajskaksahkhs.&nbsp;</p>\r\n\r\n<p>skakhsakhsa. sjajsajskaksahkhs.&nbsp;skakhsakhsa. sjajsajskaksahkhs.&nbsp;skakhsakhsa. sjajsajskaksahkhs.&nbsp;skakhsakhsa. sjajsajskaksahkhs.&nbsp;skakhsakhsa. sjajsajskaksahkhs.&nbsp;skakhsakhsa. sjajsajskaksahkhs.&nbsp;skakhsakhsa. sjajsajskaksahkhs.&nbsp;skakhsakhsa. sjajsajskaksahkhs.&nbsp;</p>\r\n', 'Event-20210314115329.jpg', 308211325, 'Jakarta', 'Jl. Cikutra', '2021-01-24 15:00:00', 100000, 3, 'POSTING'),
(15, 'Testingan', '2021-03-14', '<p>sashahsa skhakhska sahksah shakhsa.</p>\r\n', 'Event-20210314115310.jpg', 308211325, 'Bandung', 'Jl. Cikutra', '2021-02-01 14:00:00', 250000, 1, 'POSTING'),
(16, 'Event Baru', '2021-03-14', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit vitae suscipit quod, iste autem minus quos ab laborum quas eveniet voluptate eius omnis ad blanditiis odit delectus sunt! Mollitia, quibusdam!</p>\r\n\r\n<p>&nbsp;</p>\r\n', 'Event-20210314115254.jpg', 308211325, 'Jelambar Selatan', 'Jl. Cikutra', '2021-04-02 16:00:00', 100000, 12, 'POSTING');

-- --------------------------------------------------------

--
-- Table structure for table `event_daftar`
--

CREATE TABLE `event_daftar` (
  `id_daftar` int(11) NOT NULL,
  `id_event` int(11) NOT NULL,
  `id_user` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `event_daftar`
--

INSERT INTO `event_daftar` (`id_daftar`, `id_event`, `id_user`) VALUES
(8, 16, 308210836);

-- --------------------------------------------------------

--
-- Table structure for table `info`
--

CREATE TABLE `info` (
  `id_info` int(11) NOT NULL,
  `jenis_info` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL,
  `tgl_info` date NOT NULL,
  `foto_info` varchar(100) NOT NULL,
  `id_user` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `info`
--

INSERT INTO `info` (`id_info`, `jenis_info`, `deskripsi`, `tgl_info`, `foto_info`, `id_user`) VALUES
(8, 'EliTES Membership', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>\r\n', '2021-03-14', 'Info-20210314125738.jpg', 308211325),
(9, 'Term and Condition', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '2021-03-08', 'Kosong', 308211325),
(10, 'Event', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>\r\n', '2021-03-14', 'Info-20210314114551.jpg', 308211325),
(11, 'Course', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>\r\n', '2021-03-14', 'Info-20210314114616.jpg', 308211325);

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `nama_kelas` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL,
  `foto_kelas` varchar(100) NOT NULL,
  `kondisi` varchar(15) NOT NULL,
  `pesan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `nama_kelas`, `deskripsi`, `foto_kelas`, `kondisi`, `pesan`) VALUES
(3, 'KELAS 1', '<p><strong>Keterangan:</strong></p>\r\n\r\n<p>akakjajja hahAK ahhakakhkhak ahkhAKha ahkahk.&nbsp;akakjajja hahAK ahhakakhkhak ahkhAKha ahkahk.&nbsp;akakjajja hahAK ahhakakhkhak ahkhAKha ahkahk.&nbsp;akakjajja hahAK ahhakakhkhak ahkhAKha ahkahk.&nbsp;akakjajja hahAK ahhakakhkhak ahkhAKha ahkahk.&nbsp;akakjajja hahAK ahhakakhkhak ahkhAKha ahkahk.</p>\r\n', 'Kelas-20210314114706.jpg', 'POSTING', 'Pesan Singkat yeah'),
(4, 'KELAS 2', '<p>asajskajs sakskajska sakjska.&nbsp;asajskajs sakskajska sakjska.&nbsp;asajskajs sakskajska sakjska.&nbsp;asajskajs sakskajska sakjska.&nbsp;asajskajs sakskajska sakjska.&nbsp;asajskajs sakskajska sakjska.&nbsp;asajskajs sakskajska sakjska.&nbsp;asajskajs sakskajska sakjska.&nbsp;asajskajs sakskajska sakjska.&nbsp;asajskajs sakskajska sakjska.</p>\r\n', 'Kelas-20210314114728.jpg', 'POSTING', ''),
(5, 'KELAS 3', '<p>sanskaksjka saksak.&nbsp;sanskaksjka saksak.&nbsp;&nbsp;sanskaksjka saksak.&nbsp;sanskaksjka saksak.&nbsp;sanskaksjka saksak.&nbsp;&nbsp;sanskaksjka saksak.&nbsp;sanskaksjka saksak.&nbsp;sanskaksjka saksak.&nbsp;&nbsp;sanskaksjka saksak.&nbsp;sanskaksjka saksak.&nbsp;sanskaksjka saksak.&nbsp;&nbsp;sanskaksjka saksak.&nbsp;sanskaksjka saksak.&nbsp;sanskaksjka saksak.&nbsp;&nbsp;sanskaksjka saksak.&nbsp;sanskaksjka saksak.&nbsp;sanskaksjka saksak.&nbsp;&nbsp;sanskaksjka saksak.&nbsp;</p>\r\n\r\n<p>sanskaksjka saksak.&nbsp;sanskaksjka saksak.&nbsp;&nbsp;sanskaksjka saksak.&nbsp;sanskaksjka saksak.&nbsp;sanskaksjka saksak.&nbsp;&nbsp;sanskaksjka saksak.&nbsp;</p>\r\n', 'Kelas-20210314114745.jpg', 'POSTING', ''),
(6, 'KELAS 4', '<p>sajsakjksa sakshjkajska skhjahska.&nbsp;sajsakjksa sakshjkajska skhjahska.&nbsp;sajsakjksa sakshjkajska skhjahska.&nbsp;sajsakjksa sakshjkajska skhjahska.sajsakjksa sakshjkajska skhjahska.&nbsp;sajsakjksa sakshjkajska skhjahska.sajsakjksa sakshjkajska skhjahska.&nbsp;sajsakjksa sakshjkajska skhjahska.sajsakjksa sakshjkajska skhjahska.&nbsp;sajsakjksa sakshjkajska skhjahska.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n', 'Kelas-20210314114803.jpg', 'POSTING', ''),
(7, 'KELAS 5', '<p>sajsakjksa sakshjkajska skhjahska.&nbsp;sajsakjksa sakshjkajska skhjahska.sajsakjksa sakshjkajska skhjahska.&nbsp;sajsakjksa sakshjkajska skhjahska.sajsakjksa sakshjkajska skhjahska.&nbsp;sajsakjksa sakshjkajska skhjahska.sajsakjksa sakshjkajska skhjahska.&nbsp;sajsakjksa sakshjkajska skhjahska.sajsakjksa sakshjkajska skhjahska.&nbsp;sajsakjksa sakshjkajska skhjahska.sajsakjksa sakshjkajska skhjahska.&nbsp;sajsakjksa sakshjkajska skhjahska.</p>\r\n', 'Kelas-20210314114815.jpg', 'POSTING', '');

-- --------------------------------------------------------

--
-- Table structure for table `kontak_kami`
--

CREATE TABLE `kontak_kami` (
  `id_kontak` int(11) NOT NULL,
  `nama_kontak` varchar(50) NOT NULL,
  `email` varchar(25) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kontak_kami`
--

INSERT INTO `kontak_kami` (`id_kontak`, `nama_kontak`, `email`, `deskripsi`) VALUES
(1, 'Willy', 'wilnus@gmail.com', 'Yeah'),
(2, 'Aristyo Budiman', 'aridto@gmail.com', 'Keren');

-- --------------------------------------------------------

--
-- Table structure for table `kursus`
--

CREATE TABLE `kursus` (
  `id_kursus` int(11) NOT NULL,
  `nama_kursus` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL,
  `foto_kursus` varchar(100) NOT NULL,
  `id_pilar` int(11) DEFAULT NULL,
  `id_paket` int(11) DEFAULT NULL,
  `id_kelas` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kursus`
--

INSERT INTO `kursus` (`id_kursus`, `nama_kursus`, `deskripsi`, `foto_kursus`, `id_pilar`, `id_paket`, `id_kelas`) VALUES
(28, 'GEM 1 - Dasar Bisnis', '<p><strong>Keterangan:</strong></p>\r\n\r\n<p><strong>Untuk tau aja ya</strong></p>\r\n\r\n<p>akakjajja hahAK ahhakakhkhak ahkhAKha ahkahk.&nbsp;akakjajja hahAK ahhakakhkhak ahkhAKha ahkahk.&nbsp;akakjajja hahAK ahhakakhkhak ahkhAKha ahkahk.&nbsp;akakjajja hahAK ahhakakhkhak ahkhAKha ahkahk.&nbsp;akakjajja hahAK ahhakakhkhak ahkhAKha ahkahk.&nbsp;akakjajja hahAK ahhakakhkhak ahkhAKha ahkahk.</p>\r\n', 'kursus-20210314103615.jpg', 1, 5, 3),
(29, 'GEM 2 - Bisnis Berkembang', '<p><strong>Keterangan:</strong></p>\r\n\r\n<p>akakjajja hahAK ahhakakhkhak ahkhAKha ahkahk.&nbsp;akakjajja hahAK ahhakakhkhak ahkhAKha ahkahk.&nbsp;akakjajja hahAK ahhakakhkhak ahkhAKha ahkahk.&nbsp;akakjajja hahAK ahhakakhkhak ahkhAKha ahkahk.&nbsp;akakjajja hahAK ahhakakhkhak ahkhAKha ahkahk.&nbsp;akakjajja hahAK ahhakakhkhak ahkhAKha ahkahk.</p>\r\n', 'kursus-20210314103631.jpg', 1, 5, 3),
(30, 'GEM 3 - Visi Misi Bisnis', '<p><strong>Keterangan:</strong></p>\r\n\r\n<p>akakjajja hahAK ahhakakhkhak ahkhAKha ahkahk.&nbsp;akakjajja hahAK ahhakakhkhak ahkhAKha ahkahk.&nbsp;akakjajja hahAK ahhakakhkhak ahkhAKha ahkahk.&nbsp;akakjajja hahAK ahhakakhkhak ahkhAKha ahkahk.&nbsp;akakjajja hahAK ahhakakhkhak ahkhAKha ahkahk.&nbsp;akakjajja hahAK ahhakakhkhak ahkhAKha ahkahk.</p>\r\n', 'kursus-20210314103647.jpg', 2, 5, 3),
(31, 'GEM 4 - Yoyoyo', '<p><strong>Keterangan:</strong></p>\r\n\r\n<p>akakjajja hahAK ahhakakhkhak ahkhAKha ahkahk.&nbsp;akakjajja hahAK ahhakakhkhak ahkhAKha ahkahk.&nbsp;akakjajja hahAK ahhakakhkhak ahkhAKha ahkahk.&nbsp;akakjajja hahAK ahhakakhkhak ahkhAKha ahkahk.&nbsp;akakjajja hahAK ahhakakhkhak ahkhAKha ahkahk.&nbsp;akakjajja hahAK ahhakakhkhak ahkhAKha ahkahk.</p>\r\n', 'kursus-20210314103719.jpg', 1, 6, 3),
(32, 'Belajar Sukses', '<p><strong>Keterangan:</strong></p>\r\n\r\n<p>akakjajja hahAK ahhakakhkhak ahkhAKha ahkahk.&nbsp;akakjajja hahAK ahhakakhkhak ahkhAKha ahkahk.&nbsp;akakjajja hahAK ahhakakhkhak ahkhAKha ahkahk.&nbsp;akakjajja hahAK ahhakakhkhak ahkhAKha ahkahk.&nbsp;akakjajja hahAK ahhakakhkhak ahkhAKha ahkahk.&nbsp;akakjajja hahAK ahhakakhkhak ahkhAKha ahkahk.</p>\r\n', 'kursus-20210314103700.jpg', 2, 5, 3),
(33, 'Zoo', '<p>asajskajs sakskajska sakjska.&nbsp;asajskajs sakskajska sakjska.&nbsp;asajskajs sakskajska sakjska.&nbsp;asajskajs sakskajska sakjska.&nbsp;asajskajs sakskajska sakjska.&nbsp;asajskajs sakskajska sakjska.&nbsp;asajskajs sakskajska sakjska.&nbsp;asajskajs sakskajska sakjska.&nbsp;asajskajs sakskajska sakjska.&nbsp;asajskajs sakskajska sakjska.</p>\r\n', 'kursus-20210314103733.jpg', 3, 6, 4),
(34, 'Towewew', '<p>asajskajs sakskajska sakjska.&nbsp;asajskajs sakskajska sakjska.&nbsp;asajskajs sakskajska sakjska.&nbsp;asajskajs sakskajska sakjska.&nbsp;asajskajs sakskajska sakjska.&nbsp;asajskajs sakskajska sakjska.&nbsp;asajskajs sakskajska sakjska.&nbsp;asajskajs sakskajska sakjska.&nbsp;asajskajs sakskajska sakjska.&nbsp;asajskajs sakskajska sakjska.</p>\r\n', 'kursus-20210314103748.jpg', 4, 6, 4),
(35, 'Meeting Hari Ini', '<p>sanskaksjka saksak.&nbsp;sanskaksjka saksak.&nbsp;&nbsp;sanskaksjka saksak.&nbsp;sanskaksjka saksak.&nbsp;sanskaksjka saksak.&nbsp;&nbsp;sanskaksjka saksak.&nbsp;sanskaksjka saksak.&nbsp;sanskaksjka saksak.&nbsp;&nbsp;sanskaksjka saksak.&nbsp;sanskaksjka saksak.&nbsp;sanskaksjka saksak.&nbsp;&nbsp;sanskaksjka saksak.&nbsp;sanskaksjka saksak.&nbsp;sanskaksjka saksak.&nbsp;&nbsp;sanskaksjka saksak.&nbsp;sanskaksjka saksak.&nbsp;sanskaksjka saksak.&nbsp;&nbsp;sanskaksjka saksak.&nbsp;</p>\r\n\r\n<p>sanskaksjka saksak.&nbsp;sanskaksjka saksak.&nbsp;&nbsp;sanskaksjka saksak.&nbsp;sanskaksjka saksak.&nbsp;sanskaksjka saksak.&nbsp;&nbsp;sanskaksjka saksak.&nbsp;</p>\r\n', 'kursus-20210314103801.jpg', 5, 6, 5),
(36, 'Bisnis di Kota YU', '<p>sanskaksjka saksak.&nbsp;sanskaksjka saksak.&nbsp;&nbsp;sanskaksjka saksak.&nbsp;sanskaksjka saksak.&nbsp;sanskaksjka saksak.&nbsp;&nbsp;sanskaksjka saksak.&nbsp;sanskaksjka saksak.&nbsp;sanskaksjka saksak.&nbsp;&nbsp;sanskaksjka saksak.&nbsp;sanskaksjka saksak.&nbsp;sanskaksjka saksak.&nbsp;&nbsp;sanskaksjka saksak.&nbsp;sanskaksjka saksak.&nbsp;sanskaksjka saksak.&nbsp;&nbsp;sanskaksjka saksak.&nbsp;sanskaksjka saksak.&nbsp;sanskaksjka saksak.&nbsp;&nbsp;sanskaksjka saksak.&nbsp;</p>\r\n\r\n<p>sanskaksjka saksak.&nbsp;sanskaksjka saksak.&nbsp;&nbsp;sanskaksjka saksak.&nbsp;sanskaksjka saksak.&nbsp;sanskaksjka saksak.&nbsp;&nbsp;sanskaksjka saksak.&nbsp;</p>\r\n', 'kursus-20210314103817.jpg', 3, 6, 5);

-- --------------------------------------------------------

--
-- Table structure for table `paket_kelas`
--

CREATE TABLE `paket_kelas` (
  `id_paketkelas` int(11) NOT NULL,
  `id_paket` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `paket_kelas`
--

INSERT INTO `paket_kelas` (`id_paketkelas`, `id_paket`, `id_kelas`) VALUES
(14, 5, 3),
(15, 6, 3),
(16, 6, 4),
(17, 6, 5),
(18, 7, 3),
(19, 7, 4),
(20, 7, 5),
(23, 7, 4),
(24, 7, 6);

-- --------------------------------------------------------

--
-- Table structure for table `paket_member`
--

CREATE TABLE `paket_member` (
  `id_paket` int(11) NOT NULL,
  `nama_paket` varchar(50) NOT NULL,
  `harga_member` double NOT NULL,
  `deskripsi_paket` text NOT NULL,
  `kondisi` varchar(10) NOT NULL,
  `jumlah_kelas` int(11) NOT NULL,
  `foto_paket` varchar(100) NOT NULL,
  `masa_berlaku` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `paket_member`
--

INSERT INTO `paket_member` (`id_paket`, `nama_paket`, `harga_member`, `deskripsi_paket`, `kondisi`, `jumlah_kelas`, `foto_paket`, `masa_berlaku`) VALUES
(5, 'Free User', 0, '<p>lsalsjsaksjajs shakhsa sahkshakhsa sjasjagjsga .&nbsp;ajskajksjak sahskahhsa shahskahksa hskahksa sahkhskahsa sakhskaha hsakhkah.</p>\r\n', 'POSTING', 1, 'paket-20201219105108.jpg', 'Free'),
(6, 'Self Employee', 2000000, '<p>lsalsjsaksjajs shakhsa sahkshakhsa sjasjagjsga .&nbsp;ajskajksjak sahskahhsa shahskahksa hskahksa sahkhskahsa sakhskaha hsakhkah.</p>\r\n', 'POSTING', 3, 'paket-20201219105125.jpg', '1 Tahun'),
(7, 'Enterpreneur', 4000000, '<p>lsalsjsaksjajs shakhsa sahkshakhsa sjasjagjsga .&nbsp;ajskajksjak sahskahhsa shahskahksa hskahksa sahkhskahsa sakhskaha hsakhkah.</p>\r\n', 'POSTING', 6, 'paket-20201219105143.jpg', '1 Tahun');

-- --------------------------------------------------------

--
-- Table structure for table `pilar`
--

CREATE TABLE `pilar` (
  `id_pilar` int(11) NOT NULL,
  `nama_pilar` varchar(50) NOT NULL,
  `desk_pilar` text NOT NULL,
  `id_kelas` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pilar`
--

INSERT INTO `pilar` (`id_pilar`, `nama_pilar`, `desk_pilar`, `id_kelas`) VALUES
(1, 'GEM', 'khsakhska', 3),
(2, 'BA', '<p>Yes</p>\r\n', 3),
(3, 'BKT', '<p>Bangkit</p>\r\n', 4),
(4, 'SUS', '<p>Sukses</p>\r\n', 4),
(5, 'RUN', '<p>Lari</p>\r\n', 5),
(6, 'FAS', '<p>Fast</p>\r\n', 6),
(7, 'ARN', '<p>Wes</p>\r\n', 7),
(9, 'PIL (Pilihan itu Laksanakan)', '<p>yeah</p>\r\n', 7);

-- --------------------------------------------------------

--
-- Table structure for table `provinsi`
--

CREATE TABLE `provinsi` (
  `id_provinsi` int(11) NOT NULL,
  `nama_provinsi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `provinsi`
--

INSERT INTO `provinsi` (`id_provinsi`, `nama_provinsi`) VALUES
(1, 'BANTEN'),
(2, 'DKI JAKARTA'),
(3, 'JAWA BARAT'),
(4, 'JAWA TENGAH'),
(5, 'DI YOGYAKARTA'),
(6, 'JAWA TIMUR'),
(7, 'BALI'),
(8, 'NANGGROE ACEH DARUSSALAM (NAD)'),
(9, 'SUMATERA UTARA'),
(10, 'SUMATERA BARAT'),
(11, 'RIAU'),
(12, 'KEPULAUAN RIAU'),
(13, 'JAMBI'),
(14, 'BENGKULU'),
(15, 'SUMATERA SELATAN'),
(16, 'BANGKA BELITUNG'),
(17, 'LAMPUNG'),
(18, 'KALIMANTAN BARAT'),
(19, 'KALIMANTAN TENGAH'),
(20, 'KALIMANTAN SELATAN'),
(21, 'KALIMANTAN TIMUR'),
(22, 'KALIMANTAN UTARA'),
(23, 'SULAWESI BARAT'),
(24, 'SULAWESI SELATAN'),
(25, 'SULAWESI TENGGARA'),
(26, 'SULAWESI TENGAH'),
(27, 'GORONTALO'),
(28, 'SULAWESI UTARA'),
(29, 'MALUKU'),
(30, 'MALUKU UTARA'),
(31, 'NUSA TENGGARA BARAT (NTB)'),
(32, 'NUSA TENGGARA TIMUR (NTT)'),
(33, 'PAPUA BARAT'),
(34, 'PAPUA');

-- --------------------------------------------------------

--
-- Table structure for table `rating_kelas`
--

CREATE TABLE `rating_kelas` (
  `id_rating` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `level_rating` int(11) NOT NULL,
  `komentar` text NOT NULL,
  `id_user` int(11) NOT NULL,
  `tgl_komen` date NOT NULL,
  `ket_rating` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rating_kelas`
--

INSERT INTO `rating_kelas` (`id_rating`, `id_kelas`, `level_rating`, `komentar`, `id_user`, `tgl_komen`, `ket_rating`) VALUES
(2, 3, 0, 'yo', 313211152, '2021-03-31', 'Belum dibaca'),
(3, 4, 0, 'Kelas 2 ini bagus banget, menambah wawasan saya', 308210836, '2021-03-31', 'Belum dibaca'),
(6, 6, 0, 'belum ada isinya', 308210836, '2021-03-31', 'Sudah dibaca'),
(8, 5, 0, 'Kok cuma 1 pelajaran aja?', 313211152, '2021-03-31', 'Sudah dibaca'),
(9, 3, 0, 'Bagus', 313211152, '2021-03-31', 'Belum dibaca');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id_slider` int(11) NOT NULL,
  `foto_slider` varchar(100) NOT NULL,
  `alt` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id_slider`, `foto_slider`, `alt`) VALUES
(5, 'slider-20210314124201.jpg', 'Event'),
(6, 'slider-20210314124213.jpg', 'Kelas'),
(7, 'slider-20210331112639.jpg', 'Sukseskan');

-- --------------------------------------------------------

--
-- Table structure for table `sosmed`
--

CREATE TABLE `sosmed` (
  `id_sosmed` int(11) NOT NULL,
  `nama_sosmed` varchar(50) NOT NULL,
  `link_sosmed` varchar(50) NOT NULL,
  `logo_sosmed` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sosmed`
--

INSERT INTO `sosmed` (`id_sosmed`, `nama_sosmed`, `link_sosmed`, `logo_sosmed`) VALUES
(1, 'Website', 'https://te-society.com/', 'sosmed-20201219091258.jpg'),
(2, 'Facebook', 'https://www.facebook.com/thesociety/', 'sosmed-20201219084006.jpg'),
(3, 'Instagram', 'https://www.instagram.com/', 'sosmed-20201219084349.jpg'),
(4, 'Youtube', 'https://www.youtube.com/', 'sosmed-20201219084815.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `nama_transaksi` varchar(50) NOT NULL,
  `no_rek` varchar(50) NOT NULL,
  `bank_asal` varchar(25) DEFAULT NULL,
  `nama_rekening` varchar(50) NOT NULL,
  `tgl_transaksi` date NOT NULL,
  `id_paket` int(11) DEFAULT NULL,
  `id_event` int(11) DEFAULT NULL,
  `id_user` int(15) DEFAULT NULL,
  `biaya_transaksi` double NOT NULL,
  `keterangan` varchar(25) NOT NULL,
  `baca_admin` varchar(20) NOT NULL,
  `baca_member` varchar(20) NOT NULL,
  `foto_struk` varchar(100) DEFAULT NULL,
  `tgl_berakhir` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `nama_transaksi`, `no_rek`, `bank_asal`, `nama_rekening`, `tgl_transaksi`, `id_paket`, `id_event`, `id_user`, `biaya_transaksi`, `keterangan`, `baca_admin`, `baca_member`, `foto_struk`, `tgl_berakhir`) VALUES
(61, 'Upgrade Membership ke-Self Employee', '12348308', '', 'Danny Julian Pratama', '2021-03-11', 6, NULL, 308210836, 2000000, 'Ok', 'Sudah dibaca', 'Sudah dibaca', 'Struk_paketMember-20210310011202.jpg', '2022-03-11'),
(63, 'Upgrade Membership ke-Enterpreneur', '123456', '', 'Danny Julian', '2021-03-14', 7, NULL, 308210836, 4000000, 'Ok', 'Sudah dibaca', 'Sudah dibaca', 'Struk_paketMember-20210314112831.jpg', '2022-03-14'),
(64, 'Mengikuti Event Event Baru', 'Danny Julian', 'BCA', '123232', '2021-03-22', NULL, 16, 308210836, 100000, 'Expired', 'Sudah dibaca', 'Sudah dibaca', 'Struk_event-20210322101851.jpg', '2021-03-22'),
(65, 'Mengikuti Event Event Baru', '1212121', 'Bank Danamon', 'Danny Julian', '2021-03-24', NULL, 16, 324211100, 100000, 'Expired', 'Belum dibaca', 'Belum dibaca', 'Struk_event-20210324110404.jpg', '2021-03-24'),
(67, 'Upgrade Membership ke-Enterpreneur', '1233434', 'BCA', 'Mitarashi Anko', '2021-03-31', 7, NULL, 313211152, 4000000, 'Ok', 'Sudah dibaca', 'Sudah dibaca', 'Struk_paketMember-20210331032408.jpg', '2022-03-31');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(15) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jenis_kelamin` varchar(15) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(15) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `hak_akses` varchar(15) NOT NULL,
  `status` varchar(15) NOT NULL,
  `setuju` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `alamat`, `tgl_lahir`, `jenis_kelamin`, `no_hp`, `email`, `password`, `foto`, `hak_akses`, `status`, `setuju`) VALUES
(308210836, 'Danny Julian', 'Antapani', '1990-08-29', 'Laki-laki', '08989898989', 'julianpratamad@gmail.com', '123456', 'user-20210308084521.jpg', 'Member', 'Aktif', 'on'),
(308211325, 'Admin', 'Burangrang', '2021-03-08', 'Laki-laki', '08989898989', 'evenan@mail.com', '123456', 'Kosong', 'Administrator', 'Aktif', 'ya'),
(313211152, 'Mita Januar', 'Lengkong', '1992-03-29', 'Perempuan', '089899899898', 'mitaan@gmail.com', '123456', 'user-20210401084040.jpg', 'Member', 'Aktif', 'on'),
(314210801, 'Joni Lengke', 'Desa Konoha', '1992-03-10', 'Laki-laki', '08989898989', 'jonileng@gmail.com', '123456', 'User-20210314080139.jpg', 'Administrator', 'Aktif', 'Ya'),
(324211100, 'omat', 'sasasa', '1990-10-10', 'Laki-laki', '21212', 'otamat@gmail.com', '123456', 'Kosong', 'Member', 'Aktif', 'on');

-- --------------------------------------------------------

--
-- Table structure for table `user_preneur`
--

CREATE TABLE `user_preneur` (
  `id_userpreneur` int(11) NOT NULL,
  `nama_bisnis` varchar(50) NOT NULL,
  `tahun_dirikan` year(4) NOT NULL,
  `bidang_usaha` varchar(50) NOT NULL,
  `akun_instagram` varchar(25) DEFAULT NULL,
  `page_facebook` varchar(50) DEFAULT NULL,
  `website_bisnis` varchar(25) DEFAULT NULL,
  `omset_bulanan` varchar(27) NOT NULL,
  `jumlah_karyawan` varchar(27) NOT NULL,
  `deskripsi_usaha` text NOT NULL,
  `id_user` int(15) NOT NULL,
  `id_provinsi` int(11) NOT NULL,
  `alamat_bisnis` varchar(100) NOT NULL,
  `email_bisnis` varchar(50) NOT NULL,
  `telp_bisnis` varchar(15) NOT NULL,
  `foto_usaha` varchar(100) NOT NULL,
  `industri` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_preneur`
--

INSERT INTO `user_preneur` (`id_userpreneur`, `nama_bisnis`, `tahun_dirikan`, `bidang_usaha`, `akun_instagram`, `page_facebook`, `website_bisnis`, `omset_bulanan`, `jumlah_karyawan`, `deskripsi_usaha`, `id_user`, `id_provinsi`, `alamat_bisnis`, `email_bisnis`, `telp_bisnis`, `foto_usaha`, `industri`) VALUES
(15, 'Kucing SD', 2021, 'Produk & Jasa', '', '', '', 'Rp 25 Juta - Rp 50 Juta', '10-50 Orang', 'Kami keren', 308210836, 3, 'Lembang', 'julianpratamad@gmail.com', '088989898989', 'Bisnis_308210836-20210322085753.jpg', 'Lainnya'),
(16, 'Testingan', 2010, 'Jasa', '', '', '', 'Rp 50 Juta - Rp 100 Juta', '< 10 Orang', 'yeah, cool banget, kita baju masa depan', 324211100, 1, 'Pasir', 'dannyjp70@yahoo.co.id', '1212121', 'Bisnis_324211100-20210324110729.jpg', 'Pakaian Jadi');

-- --------------------------------------------------------

--
-- Table structure for table `user_status`
--

CREATE TABLE `user_status` (
  `id_userstats` int(11) NOT NULL,
  `id_user` int(15) NOT NULL,
  `id_paket` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_status`
--

INSERT INTO `user_status` (`id_userstats`, `id_user`, `id_paket`) VALUES
(39, 308210836, 7),
(40, 313211152, 7),
(44, 324211100, 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id_event`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `event_daftar`
--
ALTER TABLE `event_daftar`
  ADD PRIMARY KEY (`id_daftar`),
  ADD KEY `id_event` (`id_event`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `info`
--
ALTER TABLE `info`
  ADD PRIMARY KEY (`id_info`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `kontak_kami`
--
ALTER TABLE `kontak_kami`
  ADD PRIMARY KEY (`id_kontak`);

--
-- Indexes for table `kursus`
--
ALTER TABLE `kursus`
  ADD PRIMARY KEY (`id_kursus`),
  ADD KEY `id_pilar` (`id_pilar`),
  ADD KEY `id_paket` (`id_paket`),
  ADD KEY `id_kelas` (`id_kelas`);

--
-- Indexes for table `paket_kelas`
--
ALTER TABLE `paket_kelas`
  ADD PRIMARY KEY (`id_paketkelas`),
  ADD KEY `id_paket` (`id_paket`),
  ADD KEY `id_kelas` (`id_kelas`);

--
-- Indexes for table `paket_member`
--
ALTER TABLE `paket_member`
  ADD PRIMARY KEY (`id_paket`);

--
-- Indexes for table `pilar`
--
ALTER TABLE `pilar`
  ADD PRIMARY KEY (`id_pilar`),
  ADD KEY `id_kelas` (`id_kelas`);

--
-- Indexes for table `provinsi`
--
ALTER TABLE `provinsi`
  ADD PRIMARY KEY (`id_provinsi`);

--
-- Indexes for table `rating_kelas`
--
ALTER TABLE `rating_kelas`
  ADD PRIMARY KEY (`id_rating`),
  ADD KEY `id_kelas` (`id_kelas`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id_slider`);

--
-- Indexes for table `sosmed`
--
ALTER TABLE `sosmed`
  ADD PRIMARY KEY (`id_sosmed`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_paket` (`id_paket`),
  ADD KEY `id_event` (`id_event`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `user_preneur`
--
ALTER TABLE `user_preneur`
  ADD PRIMARY KEY (`id_userpreneur`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_provinsi` (`id_provinsi`);

--
-- Indexes for table `user_status`
--
ALTER TABLE `user_status`
  ADD PRIMARY KEY (`id_userstats`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_paket` (`id_paket`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id_event` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `event_daftar`
--
ALTER TABLE `event_daftar`
  MODIFY `id_daftar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `info`
--
ALTER TABLE `info`
  MODIFY `id_info` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `kontak_kami`
--
ALTER TABLE `kontak_kami`
  MODIFY `id_kontak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kursus`
--
ALTER TABLE `kursus`
  MODIFY `id_kursus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `paket_kelas`
--
ALTER TABLE `paket_kelas`
  MODIFY `id_paketkelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `paket_member`
--
ALTER TABLE `paket_member`
  MODIFY `id_paket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pilar`
--
ALTER TABLE `pilar`
  MODIFY `id_pilar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `provinsi`
--
ALTER TABLE `provinsi`
  MODIFY `id_provinsi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `rating_kelas`
--
ALTER TABLE `rating_kelas`
  MODIFY `id_rating` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id_slider` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `sosmed`
--
ALTER TABLE `sosmed`
  MODIFY `id_sosmed` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `user_preneur`
--
ALTER TABLE `user_preneur`
  MODIFY `id_userpreneur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `user_status`
--
ALTER TABLE `user_status`
  MODIFY `id_userstats` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `event`
--
ALTER TABLE `event`
  ADD CONSTRAINT `event_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `event_daftar`
--
ALTER TABLE `event_daftar`
  ADD CONSTRAINT `event_daftar_ibfk_1` FOREIGN KEY (`id_event`) REFERENCES `event` (`id_event`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `info`
--
ALTER TABLE `info`
  ADD CONSTRAINT `info_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kursus`
--
ALTER TABLE `kursus`
  ADD CONSTRAINT `kursus_ibfk_2` FOREIGN KEY (`id_pilar`) REFERENCES `pilar` (`id_pilar`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kursus_ibfk_4` FOREIGN KEY (`id_paket`) REFERENCES `paket_member` (`id_paket`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kursus_ibfk_5` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `paket_kelas`
--
ALTER TABLE `paket_kelas`
  ADD CONSTRAINT `kelas` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `paket_kelas_ibfk_1` FOREIGN KEY (`id_paket`) REFERENCES `paket_member` (`id_paket`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pilar`
--
ALTER TABLE `pilar`
  ADD CONSTRAINT `pilar_ibfk_1` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rating_kelas`
--
ALTER TABLE `rating_kelas`
  ADD CONSTRAINT `rating_kelas_ibfk_1` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rating_kelas_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `event` FOREIGN KEY (`id_event`) REFERENCES `event` (`id_event`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `paket` FOREIGN KEY (`id_paket`) REFERENCES `paket_member` (`id_paket`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_preneur`
--
ALTER TABLE `user_preneur`
  ADD CONSTRAINT `id_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_preneur_ibfk_2` FOREIGN KEY (`id_provinsi`) REFERENCES `provinsi` (`id_provinsi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_status`
--
ALTER TABLE `user_status`
  ADD CONSTRAINT `paketan` FOREIGN KEY (`id_paket`) REFERENCES `paket_member` (`id_paket`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
